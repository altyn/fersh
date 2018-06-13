<?php

namespace App\Http\Controllers\Web;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Auth;

class WebAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('web.user.sign_in');
    }

    public function login(Request $request)
    {
//        dd($request);
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
        return redirect('/');
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
    public function handleProviderCallback(Request $request, $provider)
    {
        $memberInfo =  Socialite::driver($provider)->stateless()->user();

        $user_details['email'] = $memberInfo->getEmail();
        $user_details['pic'] = $memberInfo->getAvatar();

        return view('web.social_auth.sign_up', compact('user_details'));
    }

    public function socialSignUp(Request $request){
        return view('web.social_auth.sign_up');
    }
}
