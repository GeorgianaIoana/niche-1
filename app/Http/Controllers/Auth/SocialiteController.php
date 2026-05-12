<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\MergeGuestDataAction;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider, MergeGuestDataAction $mergeGuestData)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Unable to authenticate. Please try again.');
        }

        $providerIdField = $provider . '_id';

        $user = User::where($providerIdField, $socialUser->getId())->first();

        if (!$user) {
            $user = User::where('email', $socialUser->getEmail())->first();

            if ($user) {
                $user->update([
                    $providerIdField => $socialUser->getId(),
                    'avatar' => $socialUser->getAvatar(),
                ]);
            } else {
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    $providerIdField => $socialUser->getId(),
                    'avatar' => $socialUser->getAvatar(),
                    'email_verified_at' => now(),
                ]);
            }
        } else {
            $user->update([
                'avatar' => $socialUser->getAvatar(),
            ]);
        }

        Auth::login($user, remember: true);
        session()->regenerate();

        $mergeGuestData->execute($user);

        return redirect()->route('dashboard');
    }
}
