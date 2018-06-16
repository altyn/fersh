<?php

namespace App\Http\Controllers\Web;

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

    public function signUpForm()
    {
        return view('web.user.sign_up');
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

    /**
     * @return \Illuminate\Http\RedirectResponse
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
                $this->login($user);
                return redirect(app()->getLocale().'/profile/info');
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
            'phone' => $request->input('phone'),
            'pass' => $request->input('password'),
            'password' => Hash::make($request->input('password')),
        ]);
        $user->save();
        if (Auth::attempt(['email' => $request->input('email'),
                           'password' => $request->input('password')])){
            Auth::login($user);
            return redirect(app()->getLocale().'/profile/info');
        } else {
            return redirect()->route('web.login');
        }
    }
}
