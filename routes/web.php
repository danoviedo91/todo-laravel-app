<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// ***

Route::get('/', function () {
    $users = DB::select('select * from users');
    return view('index')->withUsers($users);
})->name('index');

Route::resource('todos', 'TodoController');