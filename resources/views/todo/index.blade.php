@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Todo App') }}</div>

                <div class="card-body">
                    @if (Session::has('alert-success'))
                    <div class="alert alert-success" role="alert">
                        A task has been added successfully!
                        {{Session::get('alert-success')}}
                      </div>
                    @endif

                  @if (count($todo)>0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Completed</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ($todo as $todo)
                           <tr>
                            <td> {{$todo->title}} </td>
                            <td> {{$todo->description}} </td>
                            <td>
                                @php
                                if ($todo->is_completed == 1) {
                                    echo '<a class="btn btn-success btn-sm" href="#">Completed</a>';
                                } else {
                                    echo '<a class="btn btn-danger btn-sm" href="#">Incomplete</a>';
                                }
                            @endphp

                            </td>
                            <td>
                                <a class="btn btn-info m-2 btn-sm" href="#">Edit</a>
                                <a class="btn btn-info btn-sm" href="{{route('todo.show', $todo->id)}}">View</a>
                                <form action="">
                                    <input type="hidden" name="todo_id" value="{{$todo->id}}">
                                    <input type="submit" name="" class="btn btn-dark btn-sm" value="delete">
                                </form>
                            </td>
                           </tr>
                       @endforeach
                    </tbody>
                  </table>
                  @else
                  <h2>No tasks created.</h2>
                  @endif


                    Todo Page<br/>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
