<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Todo;

class TodoController extends Controller
{

    // Redirect users that are NOT authenticated

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkTodoUser')->only(['show', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
        ]);

        $todo = new Todo();

        $todo->title = Input::get('title');
        $todo->description = Input::get('description');
        $todo->deadline = Input::get('deadline');
        $todo->user_id = Auth::id();
        $todo->save();

        session()->forget('filterStatus');
        session()->forget('page');

        return Redirect::route('todos.show', ['todo' => $todo->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $todo = Todo::find($id);
        return view('todo.show')
            ->with('todo', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $todo = Todo::find($id);
        return view('todo.edit')
            ->with('todo', $todo);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ( $request->method() == "PUT") {
            $request->validate([
                'title' => 'required',
            ]);
        }

        $todo = Todo::find($id);

        $todo->title = Input::get('title', $todo->title);
        $todo->description = Input::get('description', $todo->description);
        $todo->deadline = Input::get('deadline', $todo->deadline);
        // Check if update is from "change_status", then change $todo->completed accordingly
        $todo->completed = ($request->method() == "PATCH") ? !$todo->completed : $todo->completed;

        $todo->update();

        // If update is from "change_status", return to index
        if ($request->method() == "PATCH") {

            $params = null;

            if (session('filterStatus') != "") {
                $params = array('status' => session('filterStatus'));
            }

            return Redirect::route('index', $params);
        }

        session()->forget('filterStatus');
        session()->forget('page');

        return Redirect::route('todos.show', ['todo' => $todo->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::destroy($id);

        $params = null;

        if (session('filterStatus') != "") {
            $params = array('status' => session('filterStatus'));
        }

        return Redirect::route('index', $params);

    }
}
