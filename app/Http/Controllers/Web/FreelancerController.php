<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FreelancerController extends Controller
{

    public function index(){

        return view('web.user.profile.freelancer.index');
    }



}
