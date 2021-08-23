<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse;

class MagicLinkController extends Controller
{
    public function confirm(Request $request,User $user)
    {
        if (!$request->hasValidSignature() || Auth::guest()){
            abort(401);
        }

        if ($request->code != $request->session()->get('passphrase')){
            abort(401);
        }


        $request->session()->forget('passphrase');
        $request->session()->forget('passphrase_expiry');

        return app(LoginResponse::class);
    }

    public function loginTest($id)
    {
        $user = User::findOrFail($id);
        return view('form-login',['email' => $user->email]);
    }
}
