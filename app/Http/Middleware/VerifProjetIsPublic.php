<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerifProjetIsPublic
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
        
        if($user->worksIn($projet))
        {
             return $next($request);
        }

        if(!($projet->isPrivate))
        {
             return $next($request);
        }
        
        abort('403', 'Not allowed !');
    }
}
