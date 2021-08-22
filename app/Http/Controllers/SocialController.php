<?php

namespace App\Http\Controllers;

use Auth;
use Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class SocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect()->intended();
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        } else {
            $data = User::create([
                'name'     => $user->name,
                'username'     => Str::slug($user->name) . rand(0, 1000),
                'email'    => !empty($user->email)? $user->email : '' ,
                // 'phone'    => !empty($user->phone)? $user->phone : '' ,
                'provider' => $provider,
                'provider_id' => $user->id,
                'role_id' => User::IS_CUST,
            ]);
            return $data;
        }
    }
}
