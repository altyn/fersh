<?php

namespace App\Http\Controllers\Bash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserDetails\ModelName as UserDetails;
use App\Models\User\ModelName as User;
use App\Models\UserVerify\ModelName as VerifyUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeInfoMail;

class FreelancerController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $freelancers = UserDetails::where('freelancer',1)->paginate();
        return view('bashkaruu.freelancer.index', compact('freelancers'));
    }

    /**
     *
     */
    public function create(){}

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $freelancer = UserDetails::findOrFail($id);
        return view('bashkaruu.freelancer.show',compact('freelancer'));
    }

    /**
     *
     */
    public function edit(){}

    /**
     *
     */
    public function destroy(){}

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resendTokensList()
    {
        $data['activated'] = User::where('activated', true)->count();
        $data['not_activated'] = User::where('activated', false)->count();

        return view('bashkaruu.mail.send_activation', compact('data'));
    }

    /**
     *
     */
    public function resendTokens(){
        $data = User::where('activated', false)->get();
        foreach ($data as $user){
            $verifyUser = VerifyUsers::create([
                'user_id' => $user->id,
                'token' => str_random(40)
            ]);

            if($verifyUser)
            {
                $to_email = $user['email'];
                $token = $verifyUser->token;
                Mail::to($to_email)->send(new WelcomeInfoMail($user, $token));
                $status = "Письма всем отправлены.";
            }
        }
        return back()->with('status', $status);
    }

}
