<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException as GuzzleReqException;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeInfoMail;
use Socialite;
use App\Models\User\ModelName as User;
use App\Models\UserVerify\ModelName as VerifyUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WebAuthController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('web.user.sign_in');
    }

    // /**
    //  * @param Request $request
    //  * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    //  */
    // public function signUpForm(Request $request)
    // {
    //     $user_details['email'] = session()->get('user_email');
    //     $user_details['name'] = session()->get('user_name');
    //     $user_details['avatar'] = session()->get('user_avatar');
    //     return view('web.user.sign_up', compact('user_details'));
    // }

     public function signUpForm(Request $request)
    {
        $user_details['email'] = session()->get('user_email');
        $user_details['name'] = session()->get('user_name');
        $user_details['avatar'] = session()->get('user_avatar');
        $user_details['user_provider'] = session()->get('user_provider');

        if(isset($user_details['avatar'])){
            $fileContents = file_get_contents($user_details['avatar']);
            $pic_id = str_random(16);
            file_put_contents(public_path() . '/img/sign/' . $pic_id . ".jpg", $fileContents);
            $user_details['avatar'] = '/img/sign/' . $pic_id . ".jpg";

            if(!empty($user_details['user_provider'])){
                return view('web.user.sign_up_social', compact('user_details'));
            }
        }

        return view('web.user.sign_up');
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
            $user_name = $memberInfo->getName();
            $user_email = $memberInfo->getEmail();
            $user_avatar = $memberInfo->getAvatar();
            $user_provider = $provider;
            $user_soc_id = $memberInfo->getId();

            if($user_avatar = $memberInfo->getAvatar()) {
                if ($provider == 'google') {
                    $user_avatar = str_replace('?sz=50', '', $user_avatar);
                } elseif ($provider == 'twitter') {
                    $user_avatar = str_replace('_normal', '', $user_avatar);
                } elseif ($provider == 'facebook') {
                    $user_avatar = str_replace('type=normal', 'type=large', $user_avatar);
                }
            }

            $user = User::where(['email' => $memberInfo->getEmail(),
                                 'provider_user_id' => $user_soc_id,
                                 'provider_name' => $user_provider])->first();

            if($user)
            {
                if (Auth::loginUsingId($user['id'])){
                    return redirect(app()->getLocale().'/profile/step');
                } else {
                    return redirect(app()->getLocale().'/sign_in');
                }
            }else{
                session()->put('user_name', $user_name);
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

    /**
     * @param $token
     * @return RedirectResponse
     */
    public function verifyUser($token)
    {
        $verifyUser = VerifyUsers::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->activated) {
                $verifyUser->user->activated = 1;
                $verifyUser->user->save();
                $status = "Ваш e-mail активирован. Теперь вы можете войти на сайт и заполнить профиль.";
            }else{
                $status = "Ваш e-mail был активирован. Вы можете войти на сайт.";
            }
        }else{
            return redirect('ru/sign_in')->with('warning', "Извините, неправильные данные.");
        }

        return redirect('ru/sign_in')->with('status', $status);
    }

    public function resendActivationMail(Request $request){
        $to_email = $request->input('email');
        if ($to_email){
            $user = User::where('email', $to_email)->first();
            $token = VerifyUsers::where('user_id', $user->id)->first();

            Mail::to($to_email)->send(new WelcomeInfoMail($user, $token->token));

            return view('web.user.success', compact('to_email'));

        }
    }
}
