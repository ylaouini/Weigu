<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\LoginResponse;


class PassPhraseController extends Controller
{
    public function show(){
        return view('auth.passphrase',['userEmail'=>Auth::user()->email]);
    }


    public function store(Request $request){

          if (Session::get('passphrase_expiry') < now()->timestamp){
              Auth::logout();
              $this->clearSession($request);
              return redirect()->route('login')->withErrors(['email' => ['Votre Phrase secrète a expiré. Veuillez vous reconnecter' ]]);
          }

          if (strtolower($request->passphrase) != Session::get('passphrase')){
              throw ValidationException::withMessages([
                  'passphrase' => ['Désolé, ce n\'est pas la phrase secrète correcte. Veuillez vérifier votre courrier électronique pour le dernier message.'],
              ]);
          }

        $this->clearSession($request);
        return app(LoginResponse::class);
    }

    public function clearSession($request)
    {
        $request->session()->forget('passphrase');
        $request->session()->forget('passphrase_expiry');
    }
}
