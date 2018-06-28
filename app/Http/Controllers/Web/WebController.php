<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index () 
    {
        $userinfo = DB::table('user_details')->where('user_id', auth()->id())->select('first_name', 'last_name', 'avatar')->first();
        // dd(json_decode($userinfo->avatar, true)['50x50']);
        // dd($userinfo->avatar['50x50']);
        return view('web.index');
    }


}
