@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">My info</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <ul class="list-group">
            <li class="list-group-item"><b>Name:</b> {{Auth::user()->name}}</li>
            <li class="list-group-item"><b>Email:</b> {{Auth::user()->email}}</li>
          </ul>
    </div>
</div>

@endsection
