<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Bash\Auth\RegisterController;
use Illuminate\Http\Request;
use App\Models\User\ModelName as User;
use App\Models\UserDetails\ModelName as UserDetails;
use App\Models\UserVerify\ModelName as VerifyUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\WelcomeInfoMail;
use Illuminate\Support\Facades\Mail;
use Image;


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
        $data['newsletter'] =  is_null($request->get('newsletter')) ? 0 : 1;
        $validator = Validator::make($data,
                [
                    'login'                 => 'bail|required|max:255|unique:users',
                    'email'                 => 'bail|required|email|max:255|unique:users',
                    'password'              => 'bail|required|min:6|max:30|confirmed',
                    'newsletter'              => 'bail|required',
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

            if($request->input('avatar'))
            {
                $file = file_get_contents(public_path().$request->input('avatar'));
                $dir  = 'img/freelancer/avatar/'.$row->id.'/';
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }
                $ext = pathinfo(public_path().$request->input('avatar'), PATHINFO_EXTENSION);

                $btw = time();

                $name50 = $btw.uniqid().'_50.'.$ext;
                $name100 = $btw.uniqid().'_100.'.$ext;
                $name200 = $btw.uniqid().'_200.'.$ext;
                $name360 = $btw.uniqid().'_360.'.$ext;

                Image::make($file)->fit(50, 50)->save($dir.$name50);
                Image::make($file)->fit(100, 100)->save($dir.$name100);
                Image::make($file)->fit(200, 200)->save($dir.$name200);
                Image::make($file)->fit(360, 360)->save($dir.$name360);

                $avatar['50x50'] = $dir.$name50;
                $avatar['100x100'] = $dir.$name100;
                $avatar['200x200'] = $dir.$name200;
                $avatar['360x360'] = $dir.$name360;

                $user_avatar = $avatar;
            }

            if (!is_null($data['provider_name'])){
                UserDetails::create([
                    "user_id" => $row->id,
                    "first_name" => $data['first_name'],
                    "last_name" => $data['last_name'],
                    "avatar" => $user_avatar
                ]);
            }
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