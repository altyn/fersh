<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Country\ModelName as Country;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        // $this->middleware('auth');
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
     */
    public function profileStore(Request $request)
    {
        dd($request);
    }

}
