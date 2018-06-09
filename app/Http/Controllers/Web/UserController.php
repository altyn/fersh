<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function signIn() 
    {
    	return view('web.user.sign_in');
    }

    public function signUp() 
    {
    	return view('web.user.sign_up');
    }
    
    public function signInSuccess() 
    {
    	return view('web.user.success');
    }
}
