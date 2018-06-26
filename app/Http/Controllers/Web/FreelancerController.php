<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Country\ModelName as Country;
use App\Http\Controllers\Controller;

class FreelancerController extends Controller
{

    public function index(){

        return view('web.user.profile.freelancer.index');
    }

    public function personal(){

        $data['countries'] = Country::orderBy('country_id', 'asc')->get();
        return view('web.user.profile.freelancer.edit.personal', $data);
    }

    public function contacts(){

        return view('web.user.profile.freelancer.edit.contacts');
    }

}
