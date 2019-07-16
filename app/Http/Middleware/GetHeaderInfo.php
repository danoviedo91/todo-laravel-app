<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Support\Facades\Auth;
use DeepCopy\DeepCopy;

class GetHeaderInfo
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

        $copier = new DeepCopy(true);
        $filterStatus = $copier->copy(Input::get('status'));
        $page = $copier->copy(Input::get('page'));
        $numberOfPendingTodoes = 0;

        if (Auth::check()) {
            $userID = Auth::id();
            $todos = User::find($userID)->todos->where('completed', false);
            $numberOfPendingTodoes = sizeof( $todos );
        }

        session( array(
            'flag' => false,
            'filterStatus' => $filterStatus,
            'page' => $page,
            'numberOfPendingTodoes' => $numberOfPendingTodoes,
        ));

        return $next($request);
    }
}
