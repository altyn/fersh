<?php

namespace App\Http\Controllers\Bash\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Services\SocialAccountService;
use App\Models\User\ModelName as User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('bashkaruu.layouts.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('bashkaruu/');
        } else {
            return redirect()->away('login');
        }
    }

    public function logout() {
        Auth::logout();     
        return redirect()->away('/bashkaruu');
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

   public function handleProviderCallback(SocialAccountService $service, $provider)
   {
       $user = $service->createOrGetUser(Socialite::driver($provider));

       Auth::login($user);

       return redirect()->to('/bashkaruu');
   }
}
