<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use App\Models\Spec\ModelName as Spec;
use App\Models\UserDetails\ModelName as UserDetails;

class WebController extends Controller
{
    public function index() 
    {
        $userinfo = DB::table('user_details')->where('user_id', auth()->id())->select('first_name', 'last_name', 'avatar')->first();
        return view('web.index');
    }

    public function beta() 
    {
        $userinfo = DB::table('user_details')->where('user_id', auth()->id())->select('first_name', 'last_name', 'avatar')->first();
        $specs = Spec::select('id', 'title')->get();
        $users = UserDetails::where('freelancer', 1)->whereNotNull('avatar')->take(45)->get();
        return view('web.beta', compact('specs', 'users'));
    }

    public function alpha() 
    {
        $userinfo = DB::table('user_details')->where('user_id', auth()->id())->select('first_name', 'last_name', 'avatar')->first();
        $specs = Spec::select('id', 'title')->get();
        $users = UserDetails::where('freelancer', 1)->whereNotNull('avatar')->take(44)->get();
        return view('web.alpha', compact('specs', 'users'));
    }

    public function sphere($lang, $id) 
    {
        $sphere = Spec::findOrFail($id);
        // $users = UserDetails::where('spec->ru->sphere', $id)->where('freelancer', 1)->whereNotNull('avatar')->take(45)->get();
        $users = UserDetails::where('freelancer', 1)->whereNotNull('avatar')->take(45)->get();
        return view('web.pages.sphere.index', compact('sphere', 'users'));
    }

    public function privacy() 
    {
        return view('web.pages.privacy');
    }

}
