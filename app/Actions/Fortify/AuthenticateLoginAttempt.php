<?php


namespace App\Actions\Fortify;


use Illuminate\Http\Request;

class AuthenticateLoginAttempt
{
    public function checkEmail(Request $request) {

        $validData = $request->validate([
            'email' => 'required|email|exists:users'
        ]);


        return response()->json(['success' => 'success'], 200);

    }
}
