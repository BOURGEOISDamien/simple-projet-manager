<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Projet;
use Illuminate\Support\Facades\Redirect;

class VerifCanJoinProjet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
      public function handle($request, Closure $next)
    {
        $user = Auth::user();

        $token = $request->token;
        
        $projet = Projet::where('inviteURL','=',$token)->get()->first();

        if(!($user->hasCreated($projet)) && !($user->hasJoined($projet)))
        {
             return $next($request);
        }

        simple_alert('Erreur', 'Impossible de rejoindre ce projet car vous en fait déjà partie', 'error',1500);       
        return Redirect::to('/dashboard');


    }
}
