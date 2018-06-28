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
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function personal(){
        $freelancer = UserDetails::where('user_id', auth()->id())->first();
        $countries = Country::orderBy('country_id', 'asc')->get();
        return view('web.user.profile.freelancer.edit.personal', compact('freelancer', 'countries'));
    }

    public function contacts(){
        $freelancer = UserDetails::where('user_id', auth()->id())->first();
        return view('web.user.profile.freelancer.edit.contacts', compact('freelancer'));
    }

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
   
    public function deleteFreelancerAvatar(Request $request){
        $row = UserDetails::where('user_id', auth()->id())->first();
        $row->avatar = null;
        $row->save();
        return Redirect::back()->withSuccess('Аватар удалён');
    }

    public function portfolio(){

        return view('web.user.profile.freelancer.edit.portfolio');
    }

    public function notifications(){
        
        return view('web.user.profile.freelancer.edit.notifications');
    }
    
    public function changepassword(){

        return view('web.user.profile.freelancer.edit.changepassword');
    }

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
