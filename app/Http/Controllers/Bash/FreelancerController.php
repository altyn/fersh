<?php

namespace App\Http\Controllers\Bash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserDetails\ModelName as UserDetails;
use App\Models\User\ModelName as User;

class FreelancerController extends Controller
{

    public function index(){
        $freelancers = UserDetails::where('freelancer',1)->paginate();
        return view('bashkaruu.freelancer.index', compact('freelancers'));
    }

    public function create(){}

    public function show($id){
        $freelancer = UserDetails::findOrFail($id);
        $user = User::find($freelancer->user_id);
        return view('bashkaruu.freelancer.show',compact('freelancer'));
//        return $freelancer;
    }

    public function edit(){}

    public function destroy(){}

}
