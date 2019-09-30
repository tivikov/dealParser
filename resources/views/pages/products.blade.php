@extends('layouts.app')

@section('content')
@if ($products->count() > 0)
<div class="row">
  @foreach($products as $product)
  <div class="col-lg-4 col-md-6">
    <div class="card mb-5">
        
      <div class="card-body">
        <h4 class="card-title">{{$product->deal_title}}</h4>
        <h6 class="card-subtitle mb-2 text-muted">{{$product->title}}</h6>
        <hr>
        <div class="">
            <h4><span class="badge badge-light">{{$product->coupon}}</span></h4>
            <span class="badge badge-secondary"><i class="far fa-clock"></i> {{date('d-m-Y', strtotime($product->deal_start_date))}} — {{date('d-m-Y', strtotime($product->deal_end_date))}}</span>
        </div>
       <hr>
        <a href="/products/{{$product->id}}" class="card-link">Read More</a>
        <a href="{{$product->link}}" class="card-link btn btn-primary" target="_blank">Apply Coupon</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endif

{{$products->links()}}
@endsection