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

            $userWhere = User::where('twitter_id', $user->id)->first();
            $userExist = User::where('email', $user->email)->first();
            if($userWhere || $userExist){

                Auth::login($userWhere);

                return redirect()->route('dashboard.exprimer');

            }else{
                $gitUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'twitter_id'=> $user->id,
                    'profile_background_image_url'=> $user->avatar,
                    'profile_photo_path'=> $user->avatar,
                    'password' => Hash::make($user->id),
                    'gender' => 1,
                ]);

                Auth::login($gitUser);

                return redirect()->route('dashboard.exprimer');
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
