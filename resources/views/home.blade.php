@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{('Dashboard') }}</div>

                <div class="card-body">
                    <a class="btn btn-outline-secondary" href="{{ route('todo.index') }}">Press me</a>
                    @if (session('status'))
                    <div class="alert alert-danger" role="alert">
                        {{session('status')}}
                    </div>
                @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
