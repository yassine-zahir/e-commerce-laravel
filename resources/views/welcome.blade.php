@extends('layouts.category')


@section('container')


<div class="col-lg-9">
@if (session('success'))

<div class="alert alert-success">
  {{ session('success') }}
</div>

@endif
  <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <a href="{{ route('categories.show', ['category' => 3]) }}" class="list-group-item">
          <img class="d-block img-fluid w-100"  src="{{asset('/img/MA_Accessoires-telephonies.jpg')}}" alt="First slide">
        </a>
        </div>
      <div class="carousel-item">
        <a href="{{ route('categories.show', ['category' => 2]) }}" class="list-group-item">
          <img class="d-block img-fluid w-100" src="{{asset('/img/MA_Fashion-Homme.jpg')}}" alt="Second slide">
        </a>
      </div>
      <div class="carousel-item">
        <a href="{{ route('categories.show', ['category' => 2]) }}" class="list-group-item">
          <img class="d-block img-fluid w-100" src="{{asset('/img/MA_Fashion-Femme.jpg')}}" alt="Third slide">
        </a>  
      </div>
      <div class="carousel-item">
        <a href="{{ route('categories.show', ['category' => 1]) }}" class="list-group-item">
          <img class="d-block img-fluid w-100" src="{{asset('/img/MA_Make-Up.jpg')}}" alt="Fourth slide">
        </a>
        </div>
    </div>
  
  </div>

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
  <!-- /.row -->

</div>
<!-- /.col-lg-9 -->


    
@endsection
