<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

use App\Models\Spec\ModelName as Spec;
use App\Models\UserDetails\ModelName as UserDetails;
use App\Models\User\ModelName as User;

class KatalogController extends Controller
{
    public function index(Request $request) 
    {
        $specs = Spec::select('id', 'title')->get();


        $users = UserDetails::where('freelancer', 1)->orderByRaw('-avatar DESC')->paginate(45);
        // $users = UserDetails::where('freelancer', 1)->orderByRaw('-avatar DESC')->withCount('portfolio')->paginate(45);
        // dd($users->portfolio->get());

        if($request->ajax()){
            $keyword = $request->search;
            $output = "";
            $freelancers = UserDetails::where(function ($query) use($keyword) {
                    $query->where('spec->ru->skills', 'like', '%' . $keyword . '%')
                        ->orWhere('spec->ru->skills', 'like', '%' . ucfirst($keyword) . '%')
                        ->orWhere('spec->ru->skills', 'like', '%' . lcfirst($keyword) . '%')
                        ->orWhere('spec->ru->skills', 'like', '%' . strtoupper($keyword) . '%')
                        ->orWhere('spec->ru->skills', 'like', '%' . strtolower($keyword) . '%')
                        ->where('freelancer', 1);
                })->orderByRaw('-avatar DESC')
            ->get();
            if($freelancers){
                
                foreach ($freelancers as $user) {
                    if(isset($user->getSphere()->title)){
                        $spheretext = $user->getsphere()->title['ru'];
                    }else{
                        $spheretext = '';
                    }

                    if(isset($user->avatar["360x360"])){ 
                        $avatar = '<img class="img-fluid"  src='.asset($user->avatar["360x360"]).'>';
                    }else{
                        if($user->sex == 0){
                            $avatar = '<img class="img-fluid"  src='.asset("img/icons/woman.jpg").'>';
                        }else{
                            $avatar = '<img class="img-fluid"  src='.asset("img/icons/man.jpg").'>';
                        }
                    }
                    
                    $output.='<div class="col-lg-4 col-md-6 col-sm-12">'.
                        '<div class="user-item">'.
                            '<div class="user-item-picture">'.
                                '<div class="user-item-img">'. $avatar .'</div>'.
                            '</div>'.
                            '<div class="user-item-info">'.
                                '<div class="user-item-info-name"><a href="/'.app()->getLocale().'/freelancer/'.$user->user_id.'">'.$user->getFio().'</a></div>'.
                                '<div class="user-item-info-spec"><a href="/'.app()->getLocale().'/freelancer/'.$user->user_id.'">'.$spheretext.'</a></div>'.
                                '<div class="user-item-info-desc"><article>'.strip_tags($user->getShortBio()).'</article></div>'.
                            '</div>'.
                        '</div>'.
                    '</div>';
                }
                return response($output);
            }
        }

        return view('web.pages.freelancers.index', compact('specs', 'users'));
    }

    public function searchBySphere(Request $request)
    {
        $specs = Spec::select('id', 'title')->get();
        $users = UserDetails::where('freelancer', 1)->whereNotNull('avatar')->paginate(45);

        if($request->ajax()){
            $keyword = $request->search;
            $sphere_id = $request->sphere;
            $output = "";
            $freelancers = UserDetails::where('spec->ru->sphere', $sphere_id)->where(function ($query) use($keyword) {
                $query->where('spec->ru->skills', 'like', '%' . $keyword . '%')
                    ->orWhere('spec->ru->skills', 'like', '%' . ucfirst($keyword) . '%')
                    ->orWhere('spec->ru->skills', 'like', '%' . lcfirst($keyword) . '%')
                    ->orWhere('spec->ru->skills', 'like', '%' . strtoupper($keyword) . '%')
                    ->orWhere('spec->ru->skills', 'like', '%' . strtolower($keyword) . '%')
                    ->where('freelancer', 1)
                    ->whereNotNull('avatar');
            })
                ->get();

            if($freelancers){

                foreach ($freelancers as $user) {
                    if(isset($user->getSphere()->title)){
                        $spheretext = $user->getsphere()->title['ru'];
                    }else{
                        $spheretext = '';
                    }
                    $output.='<div class="col-lg-4 col-md-6 col-sm-12">'.
                        '<div class="user-item">'.
                        '<div class="user-item-picture">'.
                        '<div class="user-item-img">'.
                        '<img class="img-fluid"  src='.asset($user->avatar["200x200"]).'>'.
                        '</div>'.
                        '</div>'.
                        '<div class="user-item-info">'.
                        '<div class="user-item-info-name"><a href="/'.app()->getLocale().'/freelancer/'.$user->user_id.'">'.$user->getFio().'</a></div>'.
                        '<div class="user-item-info-spec"><a href="/'.app()->getLocale().'/freelancer/'.$user->user_id.'">'.$spheretext.'</a></div>'.
                        '<div class="user-item-info-desc"><article>'.strip_tags($user->getShortBio()).'</article></div>'.
                        '</div>'.
                        '</div>'.
                        '</div>';
                }
                return response($output);
            }
        }

        return view('web.pages.freelancers.sphere', compact('specs', 'users'));
    }

    public function sphere($lang, $id) 
    {
        $sphere = Spec::findOrFail($id);
         $users = UserDetails::where('spec->ru->sphere', $id)->where('freelancer', 1)->whereNotNull('avatar')->paginate(45);
//        $users = UserDetails::where('freelancer', 1)->whereNotNull('avatar')->paginate(45);
        return view('web.pages.freelancers.sphere', compact('sphere', 'users'));
    }
}
