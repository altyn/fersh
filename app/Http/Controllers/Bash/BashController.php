<?php

namespace App\Http\Controllers\Bash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Carbon\Carbon;
use App\Models\User\ModelName as User;
use App\Models\UserDetails\ModelName as UserDetails;
use App\Models\UserPortfolio\ModelName as UserPortfolio;

class BashController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index () 
    {

        $dt = Carbon::now();
        $allusers = User::count();

        $today = User::whereDay('created_at', '=', date('d'))->count();
        $lastweek = User::where(DB::raw("WEEKOFYEAR(created_at)"), $dt->weekOfYear)->count();
        $lastmonth = User::whereMonth('created_at', '=', date('m'))->count();

        $isactive = User::where('activated', 1)->count();
        $isactivetoday = User::whereDate('created_at', Carbon::today())->where('activated', 1)->count();
        
        $activepersent = $isactive/$allusers*100;
        $activepersenttoday = $isactivetoday/$allusers*100;

        $isProfile = UserDetails::count();
        $isProfiletoday = UserDetails::whereDate('created_at', Carbon::today())->count();

        $profilepersent = $isProfile/$allusers*100;
        $profilepersenttoday = $isProfiletoday/$allusers*100;

        $isPortfolio = UserPortfolio::pluck('id','user_id')->count();
        $isPortfoliotoday = UserPortfolio::whereDate('created_at', Carbon::today())->count();

        $portfoliopersent = $isPortfolio/$allusers*100;
        $portfoliopersenttoday = $isPortfoliotoday/$allusers*100;
    
    	return view('bashkaruu.index', compact(
            'allusers', 'today', 'lastweek', 'lastmonth', 'isactive', 
            'isProfile', 'isactivetoday', 'isProfiletoday', 'activepersent', 'activepersenttoday', 
            'profilepersent', 'profilepersenttoday', 'isPortfolio', 'isPortfoliotoday', 'portfoliopersent', 'portfoliopersenttoday'));
    }
}
