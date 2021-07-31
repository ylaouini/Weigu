<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassPhraseGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    // if the user's session contains a passphrase then we need to direct the user to the
    // passphrase confirm route instead.
    // need to allow the user through to any login routes
    public function handle(Request $request, Closure $next)
    {
        $passphrase = $request->session()->get('passphrase',null);

        if (is_null($passphrase)){
            return $next($request);
        }

        // passphrase set, still valid?

        if ($request->session()->get('passphrase_expiry') < now()->timestamp){
            $request->session()->forget('passphrase');
            $request->session()->forget('passphrase_expiry');

            Auth::logout();

            return redirect('/');
        }

        if ($request->route()->named('login.*')){
            return $next($request);
        }

        return  redirect()->route('login.confirm');

    }
}
