@extends('layouts.app')

@section('dashboard')
@if ($products->count() > 0)

<div class="table-responsive">
  <table class="table table-striped">
    <tr>
      <th scope="col">Action</th>
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Main Info</th>
      <th scope="col">COUPON CODE</th>
      <th scope="col">Expiration Date</th>
      <th scope="col">MerchantID</th>
      <th scope="col">Merchant Name</th>
      <th scope="col">View Details</th>
    </tr>
    @foreach($products as $product)
      <tr>
        <td>
            <a href="/products/{{$product->id}}/edit/" class="btn btn-light mb-2" ><i class="fas fa-pen"></i></a>
            <br>
            {!! Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST']) !!}
              {{Form::hidden('_method', 'DELETE')}}
              <button class="btn btn-light" ><i class="fas fa-times text-danger"></i></button>
            {!! Form::close() !!}
            
        </td>
        <td>
          {{$product->id}}
        </td>
        <td>
          
          @if($product->image_small != "")
          <img src="{{$product->image_small}}" alt="" width="100">
          @elseif ($product->image_big != "")
          <img src="{{$product->image_big}}" alt="" width="100">
          @endif
        </td>
        <td>
          {{$product->deal_title}} <br>
          <a href="{{$product->link}}" target="_blank">{{$product->title}}</a>
          <p>{{$product->description}}</p>
        </td>
        <td>
          {{$product->coupon}}
        </td>
        <td>
         {{date('d M Y', strtotime($product->deal_start_date))}} <br>—<br>{{date('d M Y', strtotime($product->deal_end_date))}}
        </td>

        <td>
          {{$product->merchantID}}
        </td>

        <td>
          {{$product->merchant_name}}
        </td>
        <td><a href="/products/{{$product->id}}" class="btn btn-light"><i class="fas fa-chevron-right"></i></a></td>
      </tr>
    @endforeach
  </table>
</div>
{{$products->links()}}
@endif
@endsection