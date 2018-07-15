<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

// use Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new LoginController instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//    /**
//     * @param Request $request
//     * @return \Illuminate\Http\RedirectResponse
//     */
//    public function login(Request $request)
//    {
//        $credentials = $request->only('email', 'password');
//
//        if (auth()->attempt($credentials)) {
//            return redirect()->intended(app()->getLocale().'/profile/info/');
//        } else {
//            return Redirect::back()->withErrors('Пароль или логин введен неверно.');
//        }
//    }

//    /**
//     * @return \Illuminate\Http\RedirectResponse
//     */
//    public function logout() {
//        Auth::logout();
//        return redirect()->route('home');
//    }


    public function authenticated(Request $request, $user)
    {
        if(!$user->activated){
            auth()->logout();
            return back()->
                with('warning', 'Ваша почта не подтверждена. Пожалуйста проверьте почту, мы отправили Вам ссылку для активации.');
        }
        return redirect()->intended($this->redirectPath());
    }
}
