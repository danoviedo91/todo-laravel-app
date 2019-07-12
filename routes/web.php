<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use App\Todo;
// ***

Route::get('/', function ()
{
    
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
        ->with('mainViewFlag', true);

})->name('index');

Route::resource('todos', 'TodoController');