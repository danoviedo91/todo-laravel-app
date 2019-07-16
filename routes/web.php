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
    $perPage = 10;

    if ($filterStatus == "incompleted") {
        $todos = User::find($userID)->todos()->where('completed', false)->paginate($perPage);
    }

    if ($filterStatus == "completed") {
        $todos = User::find($userID)->todos()->where('completed', true)->paginate($perPage);
    }

    if ($filterStatus == "") {
        $todos = User::find($userID)->todos()->paginate($perPage);
    }

    //return var_dump($todos->);

    return view('index')
        ->with('todos', $todos)
        ->with('mainViewFlag', true)
        ->with('auth', Auth::check() )
        ->with('user', Auth::user() );

})->name('index')->middleware('getHeaderInfo');

Route::resource('todos', 'TodoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
