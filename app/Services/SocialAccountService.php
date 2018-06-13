<?php
namespace App\Services;

use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\SocialAccount;
use App\Models\User\ModelName as User;
use Laravel\Socialite\Contracts\Provider;

class SocialAccountService
{
    public function getUserInfo(Provider $provider){
        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        return $providerUser->getId();

    }

    public static function createOrGetUser(Provider $provider, Request $request)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $request->input('email'),
                    'login' => $request->input('login'),
                    'password' => $request->input('password'),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}
