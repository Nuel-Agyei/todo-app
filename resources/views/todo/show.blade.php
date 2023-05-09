@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{('Dashboard') }}</div>

                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-danger" role="alert">
                        {{session('status')}}
                    </div>
                @endif


                    <b>Your task title is</b> {{$todo ->title}}<br/>
                    <b>Your task description is</b> {{$todo ->description}}<br/>
                    <a class="btn btn-primary" href="{{ url()->previous() }}">Go back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
