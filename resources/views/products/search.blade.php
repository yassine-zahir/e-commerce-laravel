@extends('layouts.category')


@section('container')

<div class="col-md-9">
    
<div class="row">
    @foreach ($products as $product)

    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <a href="{{ route('products.show', ['product' => $product->id])}}"><img class="card-img-top" style="height: 150px" src="{{ asset('storage').'/'. $product->image }}" alt=""></a>
        <div class="card-body">
          <h4 class="card-title">
          <a href="{{ route('products.show', ['product' => $product->id])}}">{{ $product->title }}</a>
          </h4>
          <h5> <strong>{{ $product->price }} Dhs</strong> </h5>
          <p class="card-text">{{ $product->description }}</p>
        </div>
      <form action="{{ route('cart.store') }}" method="POST">
        @csrf
      <input type="hidden" name="product_id" id="" value=" {{ $product->id }}">
      
        <div class="card-footer">
          <button type="submit" class="btn btn-primary btn-lg btn-block">J'achète</button>
        </div>
      </form>
      </div>
    </div>

    @endforeach
</div>
</div>

@endsection