<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use App\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;

// ***

Route::get('/', function ()
{

    if ( !Auth::check() ) {
        return Redirect::route('login');
    }
    
    $filterStatus = Input::get('status');
    $userID = Auth::id();

    if ($filterStatus == "incompleted") {
        $todos = User::find($userID)->todos->where('completed', false);
    }

    if ($filterStatus == "completed") {
        $todos = User::find($userID)->todos->where('completed', true);
    }

    if ($filterStatus == "") {
        $todos = User::find($userID)->todos;
    }

    //return var_dump($todos->);

    return view('index')
        ->with('todos', $todos)
        ->with('mainViewFlag', true)
        ->with('auth', Auth::check() )
        ->with('user', Auth::user() );

})->name('index');

Route::resource('todos', 'TodoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
