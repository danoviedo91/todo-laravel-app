<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\QueryException;
use App\Todo;
use Illuminate\Support\Facades\Auth;

class CheckTodoUser
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

        try {
            $todo = Todo::findOrFail($request->route('todo'));
        } catch (\Throwable $th) {
            return abort(404);
        }
        
        // Throw 404 if there is impostor attempt
        if ( Auth::id() != $todo->user_id ) {
            return abort(404);
        }

        return $next($request);

    }
}
