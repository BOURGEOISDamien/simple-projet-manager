<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        if($request->projet)
        {
            $projet = $request->projet;
        
            if($projet->user == $user)
            {
                return $next($request);
            }
            else
            {
                 if($projet->participating_users()->find($user->id))
                 {
                    return $next($request);
                 }
                 else
                 {
                     abort('404', 'Lost ?');
                 }
            }

        }
        else
        {
            if($request->tache)
            {
                return $next($request);
                // TODO : test si tache fait partie d'un projet accessible par l'utilisateur
            }
        }
    }
}
