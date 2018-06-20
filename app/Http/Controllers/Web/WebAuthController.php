<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException as GuzzleReqException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Socialite;
use App\Models\User\ModelName as User;
use Auth;

class WebAuthController extends Controller
{
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

//    public function login(Request $request)
//    {
//        // Validate the form data
//        $this->validate($request, [
//            'email'   => 'required|email',
//            'password' => 'required|min:6'
//        ]);
//        // Attempt to log the user in
//        if (Auth::guard('admin')->attempt([
//                'email' => $request->email,
//                'password' => $request->password
//            ], $request->remember)) {
//            // if successful, then redirect to their intended location
//            return redirect(app()->getLocale().'/profile/info');
//        }
//        // if unsuccessful, then redirect back to the login with the form data
//        return redirect()->back()->withInput($request->only('email', 'remember'));
//    }

    /**
     * @param $data
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('profile.info');
        } else {
            return redirect('/'.app()->getLocale().'/sign_in');
        }
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

            $user = User::where(['email' => $memberInfo->getEmail()])->first();

            if($user)
            {
                $this->login($user);
            }else{
                session()->put('user_nickname', $user_nickname);
                session()->put('user_email', $user_email);
                session()->put('user_avatar', $user_avatar);
                session()->put('user_provider', $user_provider);
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
     * @param Request $request
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function socialSignUp(Request $request)
    {
        $user = User::create([
            'email' => $request->input('email'),
            'login' => $request->input('login'),
            'phone' => $request->input('phone'),
            'pass' => $request->input('password'),
            'password' => Hash::make($request->input('password')),
        ]);
        $user->save();
        if (Auth::attempt(['email' => $request->input('email'),
                           'password' => $user['password']])){
            Auth::login($user);
            return redirect(app()->getLocale().'/profile/info');
        } else {
            return redirect()->route('web.login');
        }
    }
}
