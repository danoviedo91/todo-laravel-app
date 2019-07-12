<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Input;
use App\Todo;

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
        $numberOfPendingTodoes = sizeof( Todo::where('completed', false)->get() );

        session( array(
            'filterStatus' => $filterStatus,
            'numberOfPendingTodoes' => $numberOfPendingTodoes,
        ));

        return $next($request);
    }
}
