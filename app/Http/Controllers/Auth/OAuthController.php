<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Profile;
use App\Social;
use App\User;
use Config;
use Request;
use Socialite;

/**
 * Class OAuthController
 *
 * @package App\Http\Controllers\Auth
 */
class OAuthController extends Controller
{
    public function getSocialRedirect($provider)
    {
        $providerKey = Config::get('services.' . $provider);

        if (empty($providerKey)) {
            return view('pages.status')->with('error', 'No such provider');
        }

        return Socialite::driver($provider)->redirect();
    }

    public function getSocialHandle($provider)
    {
        if (Request::get('denied') != '')
        {
            return redirect()->to('/login')
                ->with('status', 'danger')
                ->with('message', 'You did not share your profile data with our social app.');
        }

        $user = Socialite::driver($provider)->user();

        $socialUser = null;

        //Check is this email present
        $userCheck = User::where('email', '=', $user->email)->first();

        $email = $user->email;

        if (!$user->email) {
            $email = 'missing' . str_random(10);
        }

        if (!empty($userCheck)) {
            $socialUser = $userCheck;
        } else {
            $sameSocialId = Social::where('social_id', $user->id)
                ->where('provider', $provider)
                ->first();

            if (empty($sameSocialId)) {
                //There is no combination of this social id and provider, so create new one
                $newSocialUser = new User;
                $newSocialUser->email = $email;
                $newSocialUser->username = $user->nickname;

                if($user->name) {
                    $newSocialUser->name = $user->name;
                }

                $newSocialUser->password = bcrypt(str_random(16));
                $newSocialUser->oauth_token = str_random(64);
                $newSocialUser->verified = 1;

                $newSocialUser->save();

                $socialData = new Social;
                $socialData->social_id = $user->id;
                $socialData->provider = $provider;
                $newSocialUser->social()->save($socialData);

                $profileData = new Profile;
                $profileData->user_id = $newSocialUser->id;
                $profileData->avatar = $user->user['avatar_url'];
                $profileData->save();

                User::where('id', $newSocialUser->id)->update([
                    'profile_id' => $profileData->id
                ]);

                $socialUser = $newSocialUser;
            } else {
                //Load this existing social user
                $socialUser = $sameSocialId->user;
            }
        }

        auth()->login($socialUser, true);

        return redirect('/dashboard');
    }
}
