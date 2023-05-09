@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Todo App') }}</div>

                <div class="card-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form method="post" action="{{route('todo.store')}}">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">Title</label>
                          <input name="title" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Description</label>
                          <textarea name="description" class="form-control" cols="5" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    Create Task Page<br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection