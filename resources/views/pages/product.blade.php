@extends('layouts.app')

@section('content')
@if(isset($product))
<div class="card">
    <div class="card-header">{{$product->title}}</div>

    <div class="card-body">
      @if($product->image_small != "")
      <img src="{{$product->image_small}}" alt="" width="250" class="rounded">
      @elseif ($product->image_big != "")
      <img src="{{$product->image_big}}" alt="" width="250" class="rounded">
      @endif
      <div class="d-flex justify-content-between mt-4">
        <div>
            <h3>{{$product->deal_title}}</h3>
            
        </div>
          
          @if($product->coupon != "")
          <div>
              COUPON CODE: <b>{{$product->coupon}} </b>
          </div>
          @endif
          
      </div>
      <div class="d-flex justify-content-between align-items-end">
          <span class="text-success"><i class="far fa-clock"></i> {{date('d-m-Y', strtotime($product->deal_start_date))}} — {{date('d-m-Y', strtotime($product->deal_end_date))}}</span>
          <a href="{{$product->link}}" class="btn btn-primary" target="_blank">Apply Coupon</a>
      </div>
      
      <hr>
      @if($product->keywords != "")
        <p class="mt-2"><b>Keywords:</b> {{$product->keywords}}</p>
      @endif
      @if($product->category != "")
        <p class="mt-2"><b>Category:</b> {{$product->category}}</p>
      @endif
        
        <p>{{$product->description}}</p>
      @if($product->merchantID != "")
        <p class="mt-2"><b>Merchant:</b> {{$product->merchantID}} {{$product->merchant_name}}</p>
      @endif
      @if($product->restrictions != "")
        <p class="mt-2"><b>Restrictions:</b> {{$product->restrictions}}</p>
      @endif
      <div class="html_deal">
          <?php echo $product->html_of_deal ?>
      </div>
      
    </div>
</div>
@endif
@endsection