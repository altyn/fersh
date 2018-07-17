<?php

namespace App\Http\Controllers\Bash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use Mail;
use App\Models\UserDetails\ModelName as UserDetails;
use App\Models\User\ModelName as User;
use App\Models\UserVerify\ModelName as VerifyUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeInfoMail;

class MailController extends Controller
{

    public function create(){
        $mail =  1;
        return view('bashkaruu.mail.create', compact('mail'));
    }

    public function store(Request $request)
    {
        $email = $request->input('email');

        $data = array(
            'user' => $request->input('user'),
            'email' => $request->input('email'),
            'token' => $request->input('token'),
        );

        Mail::send('emails.auth.kolmenen', $data, function($message) use ($email){
            $message->to($email, 'Freelance.kg')->subject
                ('Регистрация на Freelance.kg');
            $message->from('support@freelance.kg','Freelance.kg');
        });

        return redirect()->route('mail.create')
            ->with('success','Письмо отправлено');
    }

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
                $status = "Рассылка отправлена.";
            }
        }
        return back()->with('status', $status);
    }

}
