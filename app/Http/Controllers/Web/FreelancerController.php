<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Country\ModelName as Country;
use App\Http\Controllers\Controller;

use App\Models\User\ModelName as User;
use App\Models\UserDetails\ModelName as UserDetails;
use App\Models\UserPortfolio\ModelName as UserPortfolio;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Input;
use Illuminate\Support\Facades\Redirect;

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
        $freelancer = UserDetails::where('user_id', auth()->user()->getAuthIdentifier())->first();
        if($freelancer == null){
            return redirect(app()->getLocale().'/profile/info');
        }else{
            $birthDate = explode("-", $freelancer->birthday);
            $age = (date("Y") - $birthDate[0]);
            $country = Country::where('country_id', $freelancer->country)->first();
            $isVerify = User::where('id', $id)->first();
            $skills = explode(',', $freelancer->spec['ru']['skills']);
            return view('web.user.profile.freelancer.index',
                compact('freelancer', 'country', 'age', 'isVerify', 'skills'));
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

        // $data = asset('js/datamini.json');

        $string = file_get_contents(asset('js/datamini.json'));
        $json_a = json_decode($string,true);
        
        foreach ($json_a as $key => $value){
            if($freelancer->spec['ru']['sphere'] == $value['id']){
                $sphere = $value;
                break;
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
    public function deleteFreelancerAvatar(Request $request){
        $row = UserDetails::where('user_id', auth()->id())->first();
        if(!file_exists(asset($row->avatar['50x50']))){
            // $row->avatar = null;
            // $row->save();
            return Redirect::back()->withSuccess('Аватар удалён или временно перемещен в другое мест. Рекомендуем загрузить новый аватар');
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

        $freelancer = UserDetails::where('user_id', auth()->user()->getAuthIdentifier())->first();
        $portfolios = UserPortfolio::where('user_id', auth()->user()->getAuthIdentifier())->orderBy('id', 'desc')->get();
        if($freelancer == null){
            return redirect(app()->getLocale().'/profile/info');
        }else{
            $birthDate = explode("-", $freelancer->birthday);
            $age = (date("Y") - $birthDate[0]);
            $country = Country::where('country_id', $freelancer->country)->first();
            $isVerify = User::where('id', $id)->first();
            $skills = explode(',', $freelancer->spec['ru']['skills']);
            return view('web.user.profile.freelancer.portfolio.index',
                compact('freelancer', 'country', 'age', 'isVerify', 'skills', 'portfolios'));
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

        /**
         * TODO: Validation and multiply files upload with dropzone in UI
         */


        $row = UserPortfolio::create($request->except('file', 'cover'));
        $row->user_id = auth()->user()->getAuthIdentifier();
        $row->save();

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

        foreach($files as $key => $file)
        {
            $dir  = 'img/freelancer/portfolio/'.$row->id.'/'.'attachment/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $btw = time();
            $thumb = $btw.uniqid().'_thumb.'.$file->getClientOriginalExtension();
            $full = $btw.uniqid().'.'.$file->getClientOriginalExtension();

            Image::make($file)->fit(180, 180)->save($dir.$thumb);
            Image::make($file)->save($dir.$full);

            $thumb = $dir.$thumb;
            $original = $dir.$full;

            $thumbs[] = $thumb;
            $originals[] = $original;
        }
        $links['thumbs'] = $thumbs;
        $links['fulls'] = $originals;
        $row->files = $links;
        $row->save();

        if($row){
                return Redirect::back()->withSuccess('Портфолио добавлено');
            } else {
                return redirect()->back();
        }

    }

    public function portfolioView($lang, $id, $portfolioId){

        $portfolio = UserPortfolio::findOrFail($portfolioId);
        $portfolio->incrementViewed();
        $tags = explode(',', $portfolio->tags['ru']['tags']);
        return view('web.user.profile.freelancer.portfolio.view', compact('portfolio', 'tags'));
    }

    public function portfolioUpdate(){

        return view('web.user.profile.freelancer.portfolio.update');
    }

    public function portfolioDelete(){

        return view('web.user.profile.freelancer.portfolio.delete');
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
