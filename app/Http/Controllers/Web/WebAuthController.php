<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException as GuzzleReqException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Socialite;
use App\Models\User\ModelName as User;
use Illuminate\Support\Facades\Auth;
class WebAuthController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('web.user.sign_in');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function signUpForm(Request $request)
    {
        $user_details['email'] = session()->get('user_email');
        $user_details['nickname'] = session()->get('user_nickname');
        $user_details['avatar'] = session()->get('user_avatar');
        return view('web.user.sign_up', compact('user_details'));
    }

    /**
     * @return RedirectResponse
     */
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
    public function handleProviderCallback($provider, Request $request)
    {
        try{
            $memberInfo =  Socialite::driver($provider)->stateless()->user();
            $user_nickname = $memberInfo->getNickName();
            $user_email = $memberInfo->getEmail();
            $user_avatar = $memberInfo->getAvatar();
            $user_provider = $provider;
            $user_soc_id = $memberInfo->getId();

            $user = User::where(['email' => $memberInfo->getEmail(),
                                 'provider_user_id' => $user_soc_id,
                                 'provider_name' => $user_provider])->first();

            if($user)
            {
                if (Auth::loginUsingId($user['id'])){
                    return redirect(app()->getLocale().'/profile/info');
                } else {
                    return redirect(app()->getLocale().'/sign_in');
                }
            }else{
                session()->put('user_nickname', $user_nickname);
                session()->put('user_email', $user_email);
                session()->put('user_avatar', $user_avatar);
                session()->put('user_provider', $user_provider);
                session()->put('user_soc_id', $user_soc_id);
                return redirect(app()->getLocale().'/sign_up');
            }
        }catch (GuzzleReqException $exception){
            $status_code = $exception->getResponse()->getStatusCode();
            if ( $status_code == '400' || $status_code == '401') {
                return redirect(app()->getLocale().'/sign_in');
            }
        }
    }
}
