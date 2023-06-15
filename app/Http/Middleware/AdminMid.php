<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AdminMid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    //funzione che controlla se utente è admin, se si permette accesso sennò accesso negato
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if($user->admin == '1'){
            return $next($request);
        } else
            return new Response(view('errors/403'));
    }
}
