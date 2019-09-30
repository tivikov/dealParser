@extends('layouts.app')

@section('dashboard')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="list-group">
                <a href="{{ route('dashboard') }}/me" class="list-group-item list-group-item-action">
                    My info
                </a>
                <a href="{{ route('dashboard') }}/products" class="list-group-item list-group-item-action">
                    Products
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
