<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Country\ModelName as Country;
use App\Models\UserDetails\ModelName as UserDetails;
use App\Http\Controllers\Controller;

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
        $input = $request->all();

        $user_details = UserDetails::where('user_id','=', auth()->user()->getAuthIdentifier())->count();

        if($user_details == 0){
            $input['user_id'] = auth()->user()->getAuthIdentifier();
            $input['birthday'] = $input['year'].'-'.$input['month'].'-'.$input['day'];
            $input['sex'] = $input['sex'] == 'male' ? true : false;
            $row = UserDetails::create($input);
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
