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
        $filterStatus = "incompleted";
    }

    if ($filterStatus == "completed") {
        $todos = Todo::where('completed', true)->get();
        $filterStatus = "completed";
    }

    if ($filterStatus == "") {
        $todos = Todo::all();
    }

    return view('index')
        ->withTodos($todos)
        ->withFilterStatus($filterStatus);

})->name('index');

Route::resource('todos', 'TodoController');