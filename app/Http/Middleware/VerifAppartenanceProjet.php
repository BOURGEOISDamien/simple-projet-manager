<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class VerifAppartenanceProjet
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

        if($request->tache)
        {
            $tache  = $request->tache;
            $projet = $tache->projet()->first();
        }

        if($request->projet)
        {
            $projet = $request->projet;
        }

        // DEBUG : 
        // die('hascreated : '. $user->hasCreated($projet). ' / '.'hasjoined : '. $user->hasJoined($projet));
        
        if($user->hasCreated($projet) || $user->hasJoined($projet))
        {
             return $next($request);
        }

        abort('403', 'Not allowed !');


    }
}
