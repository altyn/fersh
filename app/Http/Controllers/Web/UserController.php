<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Country\ModelName as Country;
use App\Models\UserDetails\ModelName as UserDetails;
use App\Http\Controllers\Controller;

use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
           $this->middleware('auth')->except('signUp');
        
    }

    /**
     *
     */
    public function index(){

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function signUp()
    {
    	return view('web.user.sign_up');
    }

    public function profile(){
        return view('web.user.profile.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profileInfo()
    {
        $user_details = UserDetails::where('user_id','=', auth()->user()->getAuthIdentifier())->count();

        if ($user_details != 0){
            return redirect()->route('home');
        } else {
            $data['countries'] = Country::orderBy('country_id', 'asc')->get();
            return view('web.user.profile.info', $data);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profileStore(Request $request)
    {
        $input = $request->except('avatar');
        $user_details = UserDetails::where('user_id','=', auth()->user()->getAuthIdentifier())->count();
        
        if($user_details == 0){
            $input['user_id'] = auth()->user()->getAuthIdentifier();
            $input['birthday'] = $input['year'].'-'.$input['month'].'-'.$input['day'];
            $input['sex'] = $input['sex'] == 'male' ? true : false;
            
            $row = UserDetails::create($input);
            
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

            if($row){
                return redirect(app()->getLocale().'/profile')
                    ->with('success','Your profile updated successfully');
            } else {
                return redirect()->back();
            }
        } else {
            session()->flash(
                'message', "Пользователь стакими даными существует!"
            );
            return redirect(app()->getLocale().'/profile');
        }
        

    }

}
