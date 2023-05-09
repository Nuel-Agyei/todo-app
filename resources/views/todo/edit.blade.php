@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Todo App') }}</div>

                <div class="card-body">

                    <form>
                        <h3>Edit Form</h3>
                        <div class="mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Description</label>
                          <textarea name="description" class="form-control" cols="5" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                    Edit Page<br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
