<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Country\ModelName as Country;
use App\Http\Controllers\Controller;
use App\Models\UserDetails\ModelName as UserDetails;

class FreelancerController extends Controller
{

    public function index(){
        $freelancer = UserDetails::where('user_id', auth()->id())->first();
        return view('web.user.profile.freelancer.index', compact('freelancer'));
//        return $freelancer;
    }

    public function personal(){

        $data['countries'] = Country::orderBy('country_id', 'asc')->get();
        return view('web.user.profile.freelancer.edit.personal', $data);
    }

    public function contacts(){

        return view('web.user.profile.freelancer.edit.contacts');
    }

    public function specialization(){

        return view('web.user.profile.freelancer.edit.specialization');
    }

    public function portfolio(){

        return view('web.user.profile.freelancer.edit.portfolio');
    }

    public function changepassword(){

        return view('web.user.profile.freelancer.edit.changepassword');
    }

    public function notifications(){

        return view('web.user.profile.freelancer.edit.notifications');
    }

}
