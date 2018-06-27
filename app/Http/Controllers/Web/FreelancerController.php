<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserDetails\ModelName as UserDetails;

class FreelancerController extends Controller
{

    public function index(){
        $freelancer = UserDetails::where('user_id', auth()->id())->first();
        return view('web.user.profile.freelancer.index', compact('freelancer'));
//        return $freelancer;
    }



}
