<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Country\ModelName as Country;
use App\Http\Controllers\Controller;

use App\Models\User\ModelName as User;
use App\Models\UserDetails\ModelName as UserDetails;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
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
        
        if($row->avatar['50x50']) unlink($row->avatar['50x50']);
        if($row->avatar['100x100']) unlink($row->avatar['100x100']);
        if($row->avatar['200x200']) unlink($row->avatar['200x200']);
        if($row->avatar['360x360']) unlink($row->avatar['360x360']);
        
        $row->avatar = null;
        $row->save();
        return Redirect::back()->withSuccess('Аватар удалён');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function portfolio(){

        return view('web.user.profile.freelancer.edit.portfolio');
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
