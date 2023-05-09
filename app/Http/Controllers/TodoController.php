<?php

namespace App\Http\Controllers;

use App\Http\Requests\Todorequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todo = Todo::all();
        return view('todo.index', [
            'todo' => $todo
        ]);

    }
    public function create()
    {
        return view('todo.create');
    }

    public function store(Todorequest $request)
    {
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => 0
        ]);

        $request->session()->flash('alert-success', 'Task created successfully');
        return to_route('todo.index');
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            request()->session()->flash('error', 'Task has failed!');
            return to_route('todo.index')->withErrors([
                'error' => 'Unable to find '
            ]);
        }
        return view('todo.show', ['todo' => $todo]);
    }
    public function edit($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            request()->session()->flash('error', 'Unable to locate');
            return to_route('todo.index')->withErrors([
                'error' => 'Unable to locate'
            ]);
        }
        return view('todo.edit', ['todo' => $todo]);
    }
    public function update(Todorequest $request)
    {
        $todo = Todo::find($request->todo_id);
        if (!$todo) {
            request()->session()->flash('error', 'Unable to locate');
            return to_route('todo.index')->withErrors([
                'error' => 'Unable to locate'
            ]);
    }
    dd($request->is_completed);
    $todo->update([
        'title'=> $request->title,
        'description' =>$request->description
    ]);
    $request->session()->flash('alert-info', 'Todo updated successfully');
    return to_route('todo.home');
}
public function delete(Request $request)
{
    $todo = Todo::find($request->todo_id);
    if (!$todo) {
        request()->session()->flash('error', 'Unable to locate');
        return to_route('todo.index')->withErrors([
            'error' => 'Unable to locate'
        ]);
}
  $todo->delete();
  $request->session()->flash('alert-info', 'Todo deleted successfully!');
  return to_route('todo.index');
}

}
