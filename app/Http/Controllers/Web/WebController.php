<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use App\Models\Spec\ModelName as Spec;
use App\Models\UserDetails\ModelName as UserDetails;
use App\Models\Home\ModelName as Home;
use App\Models\Blog\ModelName as Blog;

class WebController extends Controller
{
    public function index() 
    {
        $userinfo = DB::table('user_details')->where('user_id', auth()->id())->select('first_name', 'last_name', 'avatar')->first();
        return view('web.index');
    }

    public function beta() 
    {
        $userinfo = DB::table('user_details')
                        ->where('user_id', auth()->id())
                        ->select('first_name', 'last_name', 'avatar')->first();
        $specs = Spec::select('id', 'title')->get();
        $users = UserDetails::where('freelancer', 1)->orderByRaw('-avatar DESC')->take(45)->get();

        $homeinfo = Home::where('id', 1)->first();

        $active_users_explode = explode(',', $homeinfo->active_users);
        $active_users_array = str_replace( array('[',']') , ''  , $active_users_explode );
        
        $active_users = array();
        foreach ($active_users_array as $key => $test) {
            $frees = UserDetails::where('user_id', $test)->first();
            $active_users[] = $frees;
        }

        return view('web.beta', compact('specs', 'users', 'homeinfo', 'active_users'));
    }

    public function alpha() 
    {
        $userinfo = DB::table('user_details')->where('user_id', auth()->id())->select('first_name', 'last_name', 'avatar')->first();
        $specs = Spec::select('id', 'title')->get();
        $users = UserDetails::where('freelancer', 1)->whereNotNull('avatar')->take(44)->get();
        
        $homeinfo = Home::where('id', 1)->first();

        $active_users_explode = explode(',', $homeinfo->active_users);
        $active_users_array = str_replace( array('[',']') , ''  , $active_users_explode );
        
        $active_users = array();
        foreach ($active_users_array as $key => $test) {
            $frees = UserDetails::where('user_id', $test)->first();
            $active_users[] = $frees;
        }

        return view('web.alpha', compact('specs', 'users', 'homeinfo', 'active_users'));
    }

    public function sphere($lang, $id) 
    {
        $sphere = Spec::findOrFail($id);
        // $users = UserDetails::where('spec->ru->sphere', $id)->where('freelancer', 1)->whereNotNull('avatar')->take(45)->get();
        $users = UserDetails::where('freelancer', 1)->whereNotNull('avatar')->take(45)->get();
        return view('web.pages.sphere.index', compact('sphere', 'users'));
    }

    // Blogs 
    public function blogs($lang) 
    {
        $blogs = Blog::where('status', 1)->orderby('id', 'desc')->get();
        return view('web.pages.blog.index', compact('blogs'));
    }

    public function blog($lang, $id) 
    {
        $blog = Blog::findOrFail($id);
        return view('web.pages.blog.blog', compact('blog'));
    }

    public function privacy() 
    {
        return view('web.pages.privacy');
    }

}
