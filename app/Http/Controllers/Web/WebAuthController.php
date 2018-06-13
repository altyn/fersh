<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException as GuzzleReqException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Socialite;
use App\Models\User\ModelName as User;
use Illuminate\Support\Facades\Auth;

class WebAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('web.user.sign_in');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            return redirect('profile/info');
        } else {
            return redirect('/'.app()->getLocale().'/sign_in');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }

    /**
     * Redirect the user to the Social authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Providers
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try{
            $memberInfo =  Socialite::driver($provider)->stateless()->user();
            $user_details['nickname'] = $memberInfo->getNickName();
            $user_details['email'] = $memberInfo->getEmail();
            $user_details['pic'] = $memberInfo->getAvatar();
            $user_details['pr'] = $provider;

            $user = User::where(['email' => $memberInfo->getEmail()])->first();

            if($user){
                Auth::login($user);
                return redirect()->route('home');
            }else{
                return view('web.social_auth.sign_up', compact('user_details'));
            }

        }catch (GuzzleReqException $exception){
            $status_code = $exception->getResponse()->getStatusCode();
            if ( $status_code == '400' || $status_code == '401') {
                return redirect('/ru/sign_in');
            }
        }

    }

//    public function socialSignUp(Request $request)
//    {
//        $user = new User($request);
//        if ($user){
//            return redirect()->route('profile.info');
//        } else {
//            return back();
//        }
//    }
    public function socialSignUp(Request $request)
    {
        $user = User::create([
            'email' => $request->input('email'),
            'login' => $request->input('login'),
            'password' => Hash::make($request->input('password')),
        ]);
        $user->save();

        if ($user){
            Auth::login($user);
            return redirect()->route('profile.info');
        } else {
            return redirect()->back();
        }
    }
}
