<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Support\Facades\Auth;

class CheckAge
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

        $filterStatus = Input::get('status');
        $numberOfPendingTodoes = 0;

        if (Auth::check()) {
            $userID = Auth::id();
            $todos = User::find($userID)->todos->where('completed', false);
            $numberOfPendingTodoes = sizeof( $todos );
        }

        session( array(
            'filterStatus' => $filterStatus,
            'numberOfPendingTodoes' => $numberOfPendingTodoes,
        ));

        return $next($request);
    }
}
