@extends('layouts.app')

@section('content')
@if(isset($product))
<h1>Edit Product {{$product->id}}</h1>
{!! Form::open(['action' => ['ProductsController@update', $product->id], 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('title', 'Title')}}
      {{Form::text('title', $product->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
      {{Form::label('description', 'Description')}}
      {{Form::textarea('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
    <div class="row my-3">
        <div class="col">
            {{Form::label('deal_start_date', 'Start Deal')}}
            {{Form::text('deal_start_date', $product->deal_start_date, ['class' => 'form-control', 'placeholder' => 'Start Deal'])}}
        </div>
        <div class="col">
            {{Form::label('deal_end_date', 'End Deal')}}
            {{Form::text('deal_end_date', $product->deal_end_date, ['class' => 'form-control', 'placeholder' => 'End Deal'])}}
        </div>
      </div>
      <div class="form-group">
          {{Form::label('coupon', 'Coupon Code')}}
          {{Form::text('coupon', $product->coupon, ['class' => 'form-control', 'placeholder' => 'Coupon Code'])}}
        </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary mt-3'])}}
{!! Form::close() !!}
@endif;
@endsection