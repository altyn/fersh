<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Bash\Auth\RegisterController;
use Illuminate\Http\Request;
use App\Models\User\ModelName as User;
use App\Models\UserVerify\ModelName as VerifyUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\WelcomeInfoMail;
use Illuminate\Support\Facades\Mail;


class WebRegisterController extends RegisterController
{
    protected $reditectTo = 'profile/info';

    /**
     * WebRegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $data = $request->all();
        $data['provider_user_id'] = $request->session()->get('user_soc_id');
        $data['provider_name'] = $request->session()->get('user_provider');
        $validator = Validator::make($data,
                [
                    'login'                 => 'bail|required|max:255|unique:users',
                    'email'                 => 'bail|required|email|max:255|unique:users',
                    'password'              => 'bail|required|min:6|max:30|confirmed',
                ],
                [
                    'login.unique'          => 'Пользователь с таким именем уже существует',
                    'login.required'        => 'Нужно ввести имя пользователя',
                    'email.unique'          => 'Пользователь с такой почтой уже существует',
                    'email.required'        => 'Нужно ввести email пользователя',
                    'email.email'           => 'Email должен быть вида email@email.com',
                    'password.required'     => 'Требуется ввести пароль',
                    'password.min'          => 'Пароль не может быть меньше 6 символов',
                    'password.max'          => 'Пароль не может превышать 30 символов',
                    'password.confirmed'    => 'Введенные пароли не совпадают',
                ]
            );

        // The user data is valid...
        if($validator->fails()){
            return redirect(app()->getLocale().'/sign_up')->withErrors($validator)->withInput();
        } else {
            $data['password'] = Hash::make($data['password']);
            $row = User::create($data);
            $verifyUser = VerifyUsers::create([
                'user_id' => $row->id,
                'token' => str_random(40)
            ]);

            if($row)
            {
                $to_email = $data['email'];
                $token = $verifyUser->token;
                Mail::to($to_email)->send(new WelcomeInfoMail($row, $token));
                return view('web.user.success', compact('to_email'));
            } else {
                return back();
            }
        }

    }

}