<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function signUp() 
    {
    	return view('web.user.sign_up');
    }
    
    public function signInSuccess() 
    {
    	return view('web.user.success');
    }
    
    public function profileInfo() 
    {
    	return view('web.user.profile.info');
    }
}
