<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Country\ModelName as Country;
use App\Http\Controllers\Controller;

use App\Models\User\ModelName as User;
use App\Models\UserDetails\ModelName as UserDetails;
use App\Models\UserPortfolio\ModelName as UserPortfolio;
use App\Models\UserView\ModelName as UserView;
use App\Models\Spec\ModelName as Spec;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Input;
use Illuminate\Support\Facades\Redirect;
use DB;

use Request as XRequest;

use File;

use Intervention\Image\ImageManagerStatic as Image;

class FreelancerController extends Controller
{
    /**
     * FreelancerController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param $lang
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index($lang, $id){

        $isUser =  User::findOrFail($id);
        if (isset($isUser)) {
            $user_id = $id;
            $ip = XRequest::ip();
    
            if(auth()->id()){
                $auth = auth()->id();
            }else{
                $auth = false;
            }
    
            if(auth()->id() != $id){
                UserView::create([
                    'user_id' => $user_id,
                    'auth_id' => $auth,
                    'profile' => true,
                    'ip_address' => $ip,
                ]);
            }   
        }else{
            $user_id = false;
        }
        

        $views = UserView::where('user_id', $id)->sum('profile');

        if (0 != \auth()->user()->isAdmin){
            $freelancer = UserDetails::where('user_id', $id)->first();
            $user = User::where('id', $id)->first();
            $portfolios = UserPortfolio::where('user_id', $id)->orderBy('id', 'desc')->get();
            if($freelancer == null){
                return redirect(app()->getLocale().'/profile/info');
            }else{
                $country = Country::where('country_id', $freelancer->country)->first();
                $isVerify = User::where('id', auth()->user()->getAuthIdentifier())->first();
                if(isset($freelancer->spec['ru']['sphere'])){
                    $usersphere = $freelancer->spec['ru']['sphere'];
                }else{
                    $usersphere = '0';
                }

                $sphere = Spec::where('id', $usersphere)->first();
                if(!empty($freelancer->spec['ru']['skills'])) {
                    $skills = explode(',', $freelancer->spec['ru']['skills']);
                }
                $services = false;
                if(
                    isset($freelancer->spec[app()->getLocale()]['rate']) ||
                    isset($freelancer->spec[app()->getLocale()]['experience']) ||
                    isset($freelancer->spec[app()->getLocale()]['firm']) ||
                    isset($freelancer->spec[app()->getLocale()]['payment_method']) ||
                    isset($freelancer->bio[app()->getLocale()]['short']) ||
                    isset($freelancer->bio[app()->getLocale()]['full'])
                ){
                    $services = true;
                }

                return view('web.user.profile.freelancer.index',
                    compact('user', 'freelancer', 'country', 'age', 'isVerify', 'skills', 'portfolios', 'sphere', 'views', 'services'));
            }
        } else {
            $freelancer = UserDetails::where('user_id', auth()->user()->getAuthIdentifier())->first();
            $user = User::where('id', auth()->user()->getAuthIdentifier())->first();
            $portfolios = UserPortfolio::where('user_id', auth()->user()->getAuthIdentifier())->orderBy('id', 'desc')->get();
            if($freelancer == null){
                return redirect(app()->getLocale().'/profile/info');
            }else {
                $country = Country::where('country_id', $freelancer->country)->first();
                $isVerify = User::where('id', auth()->user()->getAuthIdentifier())->first();
                if(isset($freelancer->spec['ru']['sphere'])){
                    $usersphere = $freelancer->spec['ru']['sphere'];
                }else{
                    $usersphere = '0';
                }
                $sphere = Spec::where('id', $usersphere)->first();

                if(!empty($freelancer->spec['ru']['skills'])) {
                    $skills = explode(',', $freelancer->spec['ru']['skills']);
                }
                
                $services = false;
                if(
                    isset($freelancer->spec[app()->getLocale()]['rate']) ||
                    isset($freelancer->spec[app()->getLocale()]['experience']) ||
                    isset($freelancer->spec[app()->getLocale()]['firm']) ||
                    isset($freelancer->spec[app()->getLocale()]['payment_method']) ||
                    isset($freelancer->bio[app()->getLocale()]['short']) ||
                    isset($freelancer->bio[app()->getLocale()]['full'])
                ){
                    $services = true;
                }
                
                // dd($freelancer->spec['ru']['skills']);
                return view('web.user.profile.freelancer.index',
                    compact('user', 'freelancer', 'country', 'age', 'isVerify', 'skills', 'portfolios', 'sphere', 'views', 'services'));
            }
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function personal(){
        $freelancer = UserDetails::where('user_id', auth()->id())->first();
        $countries = Country::orderBy('country_id', 'asc')->get();
        return view('web.user.profile.freelancer.edit.personal', compact('freelancer', 'countries'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contacts(){
        $freelancer = UserDetails::where('user_id', auth()->id())->first();
        return view('web.user.profile.freelancer.edit.contacts', compact('freelancer'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function specialization(){
        $freelancer = UserDetails::where('user_id', auth()->id())->first();
        $spec = Spec::select('id', 'title')->get();
        $json_a = json_decode($spec,true);

        foreach ($json_a as $key => $value){
            if($freelancer->spec['ru']['sphere'] == $value['id']){
                $sphere = $value;
                break;
            } else {
                $sphere['title'][app()->getLocale()] = "No";
            }
        }
        return view('web.user.profile.freelancer.edit.specialization', compact('freelancer', 'sphere'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateFreelancer(Request $request){
        $row = UserDetails::where('user_id', auth()->id())->first();
        $row->update($request->except('avatar'));

        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $dir  = 'img/freelancer/avatar/'.$row->id.'/';

            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $btw = time();

            $name50 = $btw.uniqid().'_50.'.$file->getClientOriginalExtension();
            $name100 = $btw.uniqid().'_100.'.$file->getClientOriginalExtension();
            $name200 = $btw.uniqid().'_200.'.$file->getClientOriginalExtension();
            $name360 = $btw.uniqid().'_360.'.$file->getClientOriginalExtension();
            Image::make($_FILES['avatar']['tmp_name'])->fit(50, 50)->save($dir.$name50);
            Image::make($_FILES['avatar']['tmp_name'])->fit(100, 100)->save($dir.$name100);
            Image::make($_FILES['avatar']['tmp_name'])->fit(200, 200)->save($dir.$name200);
            Image::make($_FILES['avatar']['tmp_name'])->fit(360, 360)->save($dir.$name360);

            $avatar['50x50'] = $dir.$name50;
            $avatar['100x100'] = $dir.$name100;
            $avatar['200x200'] = $dir.$name200;
            $avatar['360x360'] = $dir.$name360;

            $row->avatar = $avatar;
            $row->save();
        }
        
        return Redirect::back()->withSuccess('Информация обновлена');
    }
    
    /**
     * @param Request $request
     * @return mixed
     */
    public function updateSpec(Request $request){

        $row = UserDetails::where('user_id', auth()->id())->first();
        $data = $request->except('spec');
        $row->update($data);

        if (array_key_exists('experience', $request->spec[app()->getLocale()])) {
            $experience = $request->spec[app()->getLocale()]['experience'];            
            if($experience){
                $row['spec->'.app()->getLocale().'->experience'] = $experience;
                $row->save();
            }
        }
       
        if (array_key_exists('currency', $request->spec[app()->getLocale()])) {
            $currency = $request->spec[app()->getLocale()]['currency'];            
            if($currency){
                $row['spec->'.app()->getLocale().'->currency'] = $currency;
                $row->save();
            }
        }

        if(isset($request->spec[app()->getLocale()]['sphere'])){
            $row['spec->'.app()->getLocale().'->sphere'] = $request->spec[app()->getLocale()]['sphere'];
        }
        if(isset($request->spec[app()->getLocale()]['skills'])){
            $row['spec->'.app()->getLocale().'->skills'] = $request->spec[app()->getLocale()]['skills'];
        }else{
            $row['spec->'.app()->getLocale().'->skills'] = null;
        }
        if(isset($request->spec[app()->getLocale()]['rate'])){
            $row['spec->'.app()->getLocale().'->rate'] = $request->spec[app()->getLocale()]['rate'];
        }
        if(isset($request->spec[app()->getLocale()]['payment_method'])){
            $row['spec->'.app()->getLocale().'->payment_method'] = $request->spec[app()->getLocale()]['payment_method'];
        }
        if(isset($request->spec[app()->getLocale()]['firm'])){
            $row['spec->'.app()->getLocale().'->firm'] = $request->spec[app()->getLocale()]['firm'];
        }
        $row->save();



        
        return Redirect::back()->withSuccess('Информация обновлена');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function deleteFreelancerAvatar(Request $request){
        $row = UserDetails::where('user_id', auth()->id())->first();
        if(!file_exists(asset($row->avatar['50x50']))){
            $row->avatar = null;
            $row->save();
            // return Redirect::back()->withSuccess('Аватар удалён или временно перемещен в другое мест. Рекомендуем загрузить новый аватар');
            return Redirect::back()->withSuccess('Аватар удалён.');
        }else{
            if($row->avatar['50x50']) unlink($row->avatar['50x50']);
            if($row->avatar['100x100']) unlink($row->avatar['100x100']);
            if($row->avatar['200x200']) unlink($row->avatar['200x200']);
            if($row->avatar['360x360']) unlink($row->avatar['360x360']);
            
            $row->avatar = null;
            $row->save();
            return Redirect::back()->withSuccess('Аватар удалён');
        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function portfolio($lang, $id){

        $isUser =  User::findOrFail($id);
        if (isset($isUser)) {
            $user_id = $id;
            $ip = XRequest::ip();
    
            if(auth()->id()){
                $auth = auth()->id();
            }else{
                $auth = false;
            }
    
            if(auth()->id() != $id){
                UserView::create([
                    'user_id' => $user_id,
                    'auth_id' => $auth,
                    'profile' => true,
                    'ip_address' => $ip,
                ]);
            }   
        }else{
            $user_id = false;
        }

        $views = UserView::where('user_id', $id)->sum('portfolio_project');

        if (0 != \auth()->user()->isAdmin){

            $freelancer = UserDetails::where('user_id', $id)->first();
            $portfolios = UserPortfolio::where('user_id', $id)->orderBy('id', 'desc')->get();

            if($freelancer == null){
                return redirect(app()->getLocale().'/profile/info');
            }else{
                $country = Country::where('country_id', $freelancer->country)->first();
                $isVerify = User::where('id', $id)->first();
                if(isset($freelancer->spec['ru']['sphere'])){
                    $usersphere = $freelancer->spec['ru']['sphere'];
                }else{
                    $usersphere = '0';
                }
                $sphere = Spec::where('id', $usersphere)->first();
                if(isset($freelancer->spec['ru']['skills'])){
                    $skills = $freelancer->spec['ru']['skills'];
                }else{
                    $skills = '0';
                }

                return view('web.user.profile.freelancer.portfolio.index',
                    compact('freelancer', 'country', 'age', 'isVerify', 'skills', 'portfolios', 'sphere', 'views'));
            }
        }else{
            $freelancer = UserDetails::where('user_id', auth()->user()->getAuthIdentifier())->first();            
            $portfolios = UserPortfolio::where('user_id', auth()->user()->getAuthIdentifier())->orderBy('id', 'desc')->get();
            if($freelancer == null){
                return redirect(app()->getLocale().'/profile/info');
            }else{
                $country = Country::where('country_id', $freelancer->country)->first();
                $isVerify = User::where('id', $id)->first();
                if(isset($freelancer->spec['ru']['sphere'])){
                    $usersphere = $freelancer->spec['ru']['sphere'];
                }else{
                    $usersphere = '0';
                }
                $sphere = Spec::where('id', $usersphere)->first();

                if(isset($freelancer->spec['ru']['skills'])){
                    $skills = $freelancer->spec['ru']['skills'];
                }else{
                    $skills = '0';
                }

                return view('web.user.profile.freelancer.portfolio.index',
                    compact('freelancer', 'country', 'age', 'isVerify', 'skills', 'portfolios', 'sphere', 'views'));
            }
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function portfolioAdd(){
        return view('web.user.profile.freelancer.portfolio.add');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function portfolioCreate(Request $request){

        $row = UserPortfolio::create($request->except('file', 'cover'));
        $row->user_id = auth()->user()->getAuthIdentifier();
        $row->save();

        $validator = Validator::make($request->all(), [
            'cover' => 'max:100000',
            'files' => 'max:100000',
        ]);

        if($request->hasFile('cover')){
            $cover = $request->file('cover');
            $directory  = 'img/freelancer/portfolio/'.$row->id.'/'.'cover/';
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
            $btw = time();
            $title = $btw.uniqid().'_400x300.'.$cover->getClientOriginalExtension();
            Image::make($_FILES['cover']['tmp_name'])->fit(400, 300)->save($directory.$title);

            $image = $directory.$title;
            $row->cover = $image;
            $row->save();
        }

        $files = $request->file('files');

        if($files){
            $i = 0;
            foreach($files as $file)
            {
                $i++;
                $dir  = 'img/freelancer/portfolio/'.$row->id.'/'.'attachment/';
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }
    
                $btw = time();
                $thumb = $btw.uniqid().'_thumb.'.$file->getClientOriginalExtension();
                $full = $btw.uniqid().'.'.$file->getClientOriginalExtension();
                
                Image::make($file)->fit(180, 180)->save($dir.$thumb);
                Image::make($file)->save($dir.$full);
    
                $thumbs = array(
                    'title' => "File $i",
                    'file' => $dir.$thumb
                );
    
                $fulls = array(
                    'title' => "File $i",
                    'file' => $dir.$full
                );
    
                $links['thumbs'][$i] = $thumbs;
                $links['fulls'][$i] = $fulls;
            }
    
            $row->files = $links;
            $row->save();
        }

        if($row){
                return redirect(app()->getLocale().'/freelancer/'.auth()->user()->getAuthIdentifier().'/portfolio')->withSuccess('Портфолио добавлено');
            } else {
                return redirect()->back();
        }

    }

    public function portfolioView($lang, $id, $portfolioId){
      
        $isUser =  User::findOrFail($id);
        if (isset($isUser)) {
            $user_id = $id;
            $ip = XRequest::ip();
    
            if(auth()->id()){
                $auth = auth()->id();
            }else{
                $auth = false;
            }
    
            if(auth()->id() != $id){
                UserView::create([
                    'user_id' => $user_id,
                    'auth_id' => $auth,
                    'profile' => true,
                    'ip_address' => $ip,
                ]);
            }   
        }else{
            $user_id = false;
        }

        $views = UserView::where('user_id', $id)->sum('portfolio_project');
        $portfolio = UserPortfolio::findOrFail($portfolioId);
        $freelancer = UserDetails::where('user_id', $portfolio->user_id)->first();
        $tags = explode(',', $portfolio->tags['ru']['tags']);
        return view('web.user.profile.freelancer.portfolio.view', compact('portfolio', 'tags', 'freelancer', 'views'));
    }

    public function portfolioUpdate($lang, $id, $portfolioId){

        $portfolio = UserPortfolio::findOrFail($portfolioId);

        return view('web.user.profile.freelancer.portfolio.update', compact('portfolio'));
    }

/**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function portfolioEdit(Request $request){

        $id = $request->id;
        $row = UserPortfolio::findOrFail($id);
        $row->update($request->except('files', 'cover'));
        
        $validator = Validator::make($request->all(), [
            'cover' => 'max:100000',
            'files' => 'max:100000',
        ]);

        if($request->hasFile('cover')){
            $cover = $request->file('cover');
            $directory  = 'img/freelancer/portfolio/'.$row->id.'/'.'cover/';
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
            $btw = time();
            $title = $btw.uniqid().'_400x300.'.$cover->getClientOriginalExtension();
            Image::make($_FILES['cover']['tmp_name'])->fit(400, 300)->save($directory.$title);

            $image = $directory.$title;
            $row->cover = $image;
            $row->save();
        }

        $files = $request->file('files');
        if($row->files['fulls']){
            $i =  count($row->files['fulls']);
        }else{
            $i = 0;
        }

        if($files){
            foreach($files as $file)
            {
                $i++;
                $dir  = 'img/freelancer/portfolio/'.$row->id.'/'.'attachment/';
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }

                $btw = time();
                $thumb = $btw.uniqid().'_thumb.'.$file->getClientOriginalExtension();
                $full = $btw.uniqid().'.'.$file->getClientOriginalExtension();
                
                Image::make($file)->fit(180, 180)->save($dir.$thumb);
                Image::make($file)->save($dir.$full);

                $thumbs = array(
                    'title' => "File $i",
                    'file' => $dir.$thumb
                );

                $fulls = array(
                    'title' => "File $i",
                    'file' => $dir.$full
                );

                $thumbs_uploading[$i] = $thumbs;
                $fulls_uploading[$i] = $fulls;

            }

            if($row->files['thumbs']){
                $thumbs_old = $row->files['thumbs'];
                $new_thumbs = $thumbs_old+$thumbs_uploading;
            }else{
                $thumbs_old = [];
                $new_thumbs = $thumbs_uploading;
            }

            if($row->files['fulls']){
                $fulls_old = $row->files['fulls'];
                $new_fulls = $fulls_old+$fulls_uploading;
            }else{
                $fulls_old = [];
                $new_fulls = $fulls_uploading;
            }
            $ready= array("thumbs"=>$new_thumbs)+array("fulls"=>$new_fulls);
            $row->files = $ready;
            $row->save();
        }

        if($row){
                return redirect(app()->getLocale().'/freelancer/'.auth()->user()->getAuthIdentifier().'/portfolio/'.$id)->withSuccess('Портфолио изменено');
            } else {
                return redirect()->back();
        }

    }

    public function portfolioDelete($lang, $id, $portfolioId){

        $row = UserPortfolio::findOrFail($portfolioId);
        
        $row->delete();

        File::deleteDirectory(public_path('img/freelancer/portfolio/'.$portfolioId));

        if($row){
                return Redirect::back()->withSuccess('Портфолио удалено');
            } else {
                return redirect()->back();
        }

    }

    public function portfolioDeleteFile($lang, $portfolioId, $fileid){


        $row = UserPortfolio::findOrFail($portfolioId);
        $fulls = $row->files['fulls'];
        $thumb = $row->files['thumbs'];
        $file_full = $fulls[$fileid]['file'];
        $file_thumb = $thumb[$fileid]['file'];
        unset($fulls[$fileid]);
        unset($thumb[$fileid]);
        $ttt = array_merge(array("thumbs"=>$thumb), array("fulls"=>$fulls));
        $row->files = $ttt;
        $row->save();

        if($row){
            unlink($file_full);
            unlink($file_thumb);
        }
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function notifications(){
        
        return view('web.user.profile.freelancer.edit.notifications');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */   
    public function accounts(){
        
        return view('web.user.profile.freelancer.edit.accounts');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changepassword(){

        return view('web.user.profile.freelancer.edit.changepassword');
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function changepassword_rules(array $data){
        
        $messages = [
            'current-password.required' => 'Пожалуйста введите текущий пароль',
            'password.required' => 'Пожалуйста введите пароль',
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',
        ], $messages);

        return $validator;
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function changepasswordPost(Request $request){

        if (Auth::Check())
        {
            $request_data = $request->All();
            $validator = $this->changepassword_rules($request_data);

            if ($validator->fails()){
                return Redirect::back()->withErrors($validator);
            } else {

                $current_password = Auth::User()->password;

                if (Hash::check($request_data['current-password'], $current_password)) {
                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);;
                    $obj_user->save(); 

                    return Redirect::back()->withSuccess('Ваш пароль обновлен');
                } else {
                    $error = array('current-password' => 'Пожалуйста введите правильный текущий пароль');
                    return Redirect::back()->withErrors($error);
                }
            }
        } else {
            return Redirect::back();
        }
    }

}
