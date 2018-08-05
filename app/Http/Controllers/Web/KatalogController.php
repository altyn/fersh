<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

use App\Models\Spec\ModelName as Spec;
use App\Models\UserDetails\ModelName as UserDetails;

class KatalogController extends Controller
{
    public function index(Request $request) 
    {
        $specs = Spec::select('id', 'title')->get();
        $users = UserDetails::where('freelancer', 1)->whereNotNull('avatar')->paginate(45);

        if($request->ajax()){
            $keyword = $request->search;
            $output = "";
            $freelancers = UserDetails::where(function ($query) use($keyword) {
                    $query->where('first_name', 'like', '%' . $keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $keyword . '%')->where('freelancer', 1)->whereNotNull('avatar');
                })
            ->get();

            if($freelancers){
                
                foreach ($freelancers as $user) {
                    $output.='<div class="col-lg-4 col-md-6 col-sm-12">'.
                        '<div class="user-item">'.
                            '<div class="user-item-picture">'.
                                '<div class="user-item-img">'.
                                    '<img class="img-fluid"  src='.asset($user->avatar["200x200"]).'>'.
                                '</div>'.
                            '</div>'.
                            '<div class="user-item-info">'.
                                '<div class="user-item-info-name"><a href="/'.app()->getLocale().'/freelancer/'.$user->user_id.'">'.$user->getFio().'</a></div>'.
                                '<div class="user-item-info-desc"><article>'.$user->getShortBio().'</article></div>'.
                            '</div>'.
                        '</div>'.
                    '</div>';
                }
                return response($output);
            }
        }

        return view('web.pages.freelancers.index', compact('specs', 'users'));
    }

    public function sphere($lang, $id) 
    {
        $sphere = Spec::findOrFail($id);
        // $users = UserDetails::where('spec->ru->sphere', $id)->where('freelancer', 1)->whereNotNull('avatar')->take(45)->get();
        $users = UserDetails::where('freelancer', 1)->whereNotNull('avatar')->paginate(45);
        return view('web.pages.freelancers.sphere', compact('sphere', 'users'));
    }
}
