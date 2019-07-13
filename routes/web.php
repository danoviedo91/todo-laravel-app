<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use App\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

// ***

Route::get('/', function ()
{

    if ( !Auth::check() ) {
        return Redirect::route('login');
    }
    
    $filterStatus = Input::get('status');

    if ($filterStatus == "incompleted") {
        $todos = Todo::where('completed', false)->get();
    }

    if ($filterStatus == "completed") {
        $todos = Todo::where('completed', true)->get();
    }

    if ($filterStatus == "") {
        $todos = Todo::all();
    }

    return view('index')
        ->with('todos', $todos)
        ->with('mainViewFlag', true)
        ->with('auth', Auth::check() );

})->name('index');

Route::get('/logout', function() {
    Auth::logout();
});

Route::resource('todos', 'TodoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
