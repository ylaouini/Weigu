<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class TwitterController extends Controller
{
    public function loginwithTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function cbTwitter()
    {
        try {
            $user = Socialite::driver('twitter')->user();
           // dd($user);
            $userWhere = User::where('twitter_id', $user->id)->first();

            if($userWhere){

                Auth::login($userWhere);

                return redirect()->route('dashboard.exprimer');

            }else{
                $gitUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'twitter_id'=> $user->id,
                    'profile_banner_url'=> $user->profile_banner_url,
                    'profile_photo_path'=> $user->getAvatar(),
                    'password' => Hash::make($user->id)
                ]);

                Auth::login($gitUser);

                return redirect()->route('dashboard.exprimer');
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
