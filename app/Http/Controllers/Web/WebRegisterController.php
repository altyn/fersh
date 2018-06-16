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
                    'login'                 => 'required|max:255|unique:users',
                    'email'                 => 'required|email|max:255|unique:users',
                    'password'              => 'required|min:6|max:30|confirmed',
                    'password_confirmation' => 'required|same:password',
                ],
                [
                    'login.unique'          => trans('auth.userNameTaken'),
                    'login.required'        => trans('auth.userNameRequired'),
                    'email.required'        => trans('auth.emailRequired'),
                    'email.email'           => trans('auth.emailInvalid'),
                    'password.required'     => trans('auth.passwordRequired'),
                    'password.min'          => trans('auth.PasswordMin'),
                    'password.max'          => trans('auth.PasswordMax'),
                ]
            );

        // The user data is valid...
        if($validatedData)
        {
            $data['password'] = Hash::make($data['password']);
            $row = User::create($data);

            if($row)
            {
                session()->flash(
                    'message', "Your account has now been created!"
                );
                return redirect()->route('register.success');
            }
        }
    }
}