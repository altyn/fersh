<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Country\ModelName as Country;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function signUp() 
    {
    	return view('web.user.sign_up');
    }
    
    public function profileInfo() 
    {
        $data['countries'] = Country::orderBy('country_id', 'asc')->get();
    	return view('web.user.profile.info', $data);
    }

}
