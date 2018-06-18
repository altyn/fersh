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
         $this->middleware('auth');
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profileInfo()
    {
        $data['countries'] = Country::orderBy('country_id', 'asc')->get();
    	return view('web.user.profile.info', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profileStore(Request $request)
    {
        $input = $request->all();

        $user_details = UserDetails::where('user_id', auth()->user()->getAuthIdentifier())->first();

        if($user_details=null){
            $request->user_id = auth()->user()->getAuthIdentifier();
            $request->birthday = date(today());
            $request->freelancer = true;
            $request->sex = male;

            $validatedData = $request->validate([
                'user_id' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'birthday' => 'required',
                'country' => 'required',
                'city' => 'required',
                'sex' => 'required',
                'freelancer' => 'required',
                'contacts' => 'required',
                'spec' => 'required',
                'bio' => 'required',
            ]);

            // The question is valid...
            $row = UserDetails::create($validatedData);
//            $user = new UserDetails;
//            $user->user_id = auth()->user()->getAuthIdentifier();
//            $user->first_name = $input['first_name'];
//            $user->last_name = $input['last_name'];
//            $user->birthday = date(today());
//            $user->country = 1;
//            $user->city = $input['city'];
//            $user->sex = 'male';
//            $user->freelancer = 1;
//            $user->contacts = $input['contacts'];
//            $user->spec = $input['spec'];
//            $user->bio = $input['bio'];

            if($row){
                return redirect()->route('home')
                    ->with('success','Your profile updated successfully');
            } else {
                dd($row);
            }
            dd($request);
//            $user = UserDetails::create($input);
        } else {
            dd($input);
            return redirect()->back();
        }

    }

}
