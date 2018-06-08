<?php

namespace App\Http\Controllers\Bash\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User\ModelName as User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('bashkaruu.auth.login');
    }

    public function login(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        if (auth()->attempt(['login' => $login, 'password' => $password])) {
            return redirect()->intended('bashkaruu/');
        } else {
            return redirect()->away('login');
        }
    }

    public function logout() {
        Auth::logout();     
        return redirect()->away('/bashkaruu');
    }
}
