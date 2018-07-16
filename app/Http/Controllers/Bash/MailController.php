<?php

namespace App\Http\Controllers\Bash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Mail;

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

}
