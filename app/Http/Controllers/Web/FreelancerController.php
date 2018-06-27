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

class FreelancerController extends Controller
{

    public function index(){
        $freelancer = UserDetails::where('user_id', auth()->id())->first();
        // dd($freelancer);
        
        if($freelancer == null){
            return redirect(app()->getLocale().'/profile/info');
        }else{
            $birthDate = explode("-", $freelancer->birthday);
            $age = (date("Y") - $birthDate[0]);
            $country = Country::where('country_id', $freelancer->country)->first();
            $isVerify = User::where('id', auth()->id())->first();
            return view('web.user.profile.freelancer.index', compact('freelancer', 'country', 'age', 'isVerify'));
        }
    }

    public function edit(){

        return redirect(app()->getLocale().'/freelancer/edit/personal');
    }

    public function personal(){

        $data['countries'] = Country::orderBy('country_id', 'asc')->get();
        return view('web.user.profile.freelancer.edit.personal', $data);
    }

    public function contacts(){

        return view('web.user.profile.freelancer.edit.contacts');
    }

    public function specialization(){
        $freelancer = UserDetails::where('user_id', auth()->id())->first();

        // $data = asset('js/datamini.json');

        $string = file_get_contents(asset('js/datamini.json'));
        $json_a=json_decode($string,true);
        
        foreach ($json_a as $key => $value){
            if($freelancer->spec['ru']['sphere'] == $value['id']){
                $sphere = $value;
                break;
            }
        }


        return view('web.user.profile.freelancer.edit.specialization', compact('freelancer', 'sphere'));
    }

    public function specializationPost(Request $request){

        $row = UserDetails::where('user_id', auth()->id())->first();
        $row->update($request->all());
        return Redirect::back()->withSuccess('Личная информация обновлена');
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
