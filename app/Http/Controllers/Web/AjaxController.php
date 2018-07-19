<?php

namespace App\Http\Controllers\Web;

use Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request as Xrequest;

use App\Models\UserView\ModelName as UserView;

class AjaxController extends Controller
{

    public function showPhone(Xrequest $request){

        $user_id = $request->input('id');
        $ip = Request::ip();

        if(auth()->id()){
            $auth = auth()->id();
        }else{
            $auth = '0';
        }

        $row = UserView::create([
            'user_id' => $user_id,
            'auth_id' => auth()->id(),
            'profile_phone' => true,
            'ip_address' => $ip,
        ]);
    }

    public function showEmail(Xrequest $request){

        $user_id = $request->input('id');
        $ip = Request::ip();

        if(auth()->id()){
            $auth = auth()->id();
        }else{
            $auth = '0';
        }

        $row = UserView::create([
            'user_id' => $user_id,
            'auth_id' => auth()->id(),
            'profile_email' => true,
            'ip_address' => $ip,
        ]);
    }
}
