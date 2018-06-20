<?php

namespace App\Http\Controllers\Bash\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('bashkaruu.layouts.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('bashkaruu/');
        } else {
            return redirect()->away('login');
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() {
        Auth::logout();     
        return redirect()->away('/bashkaruu');
    }

}
