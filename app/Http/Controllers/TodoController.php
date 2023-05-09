<?php

namespace App\Http\Controllers;

use App\Http\Requests\Todorequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
       $todo = Todo::all();
        return view('todo.index', [
            'todo'=> $todo
        ]);

    }
    public function create(){
        return view('todo.create');
    }
    public function edit(){
        return view('todo.edit');
    }
    public function store(Todorequest $request){
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => 0
        ]);

        $request->session()->flash('alert-success', 'Task created successfully');
        return to_route('todo.index');
    }

    public function show($id){
        $todo= Todo::find($id);
        if(! $todo){
            return to_route('todo.index')->withErrors([
                'error' => 'Unable to find '
            ]);
        }
        return view('todo.show', ['todo'=> $todo]);
    }

}
