<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Bash\Auth\RegisterController;
use Illuminate\Http\Request;
use App\Models\User\ModelName as User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class WebRegisterController extends RegisterController
{
    protected $reditectTo = 'profile/info';

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
        $validatedData = Validator::make($data,
                [
                    'login'                 => 'bail|required|max:255|unique:users',
                    'email'                 => 'bail|required|email|max:255|unique:users',
                    'password'              => 'required|min:6|max:30|confirmed',
                    'password_confirmation' => 'required|same:password',
                ],
                [
//                    'login.unique'          => trans('auth.userNameTaken'),
                    'login.unique'          => 'Пользователь с таким именем уже существует',
//                    'login.required'        => trans('auth.userNameRequired'),
                    'login.required'        => 'Нужно ввести имя пользователя',
//                    'email.required'        => trans('auth.emailRequired'),
                    'email.unique'          => 'Пользователь с такой почтой уже существует',
                    'email.required'        => 'Нужно ввести email пользователя',
//                    'email.email'           => trans('auth.emailInvalid'),
                    'email.email'           => 'Email должен быть вида email@email.com',
//                    'password.required'     => trans('auth.passwordRequired'),
                    'password.required'     => trans('auth.passwordRequired'),
//                    'password.min'          => trans('auth.PasswordMin'),
                    'password.min'          => trans('auth.PasswordMin'),
//                    'password.max'          => trans('auth.PasswordMax'),
                    'password.max'          => trans('auth.PasswordMax'),
                ]
            );

//        dd($validatedData->errors());
        // The user data is valid...
        if($validatedData->fails()){
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'username or email exists!');
//            session()->flash(
//                'message', "Your account has now been created!"
//            );
//            dd($validatedData);
            return back()->withErrors($validatedData);
        } else {
            $data['password'] = Hash::make($data['password']);
            $row = User::create($data);

            if($row)
            {
                $to_email = $data['email'];
                $request->session()->flash('message.level', 'success');
                $request->session()->flash('message.content', 'Post was successfully added!');
//                session()->flash(
//                    'message', "Your account has now been created!"
//                );
                return view('web.user.success', compact('to_email'));
            } else {
                return back();
            }
        }

    }

}