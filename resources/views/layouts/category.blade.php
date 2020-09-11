@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">E-Chary </h1>
        <div class="list-group">
        <a href="{{ route('categories.show', ['category' => 1]) }}" class="list-group-item"><i class="fa fa-female"></i> Beauté & Santé</a>
          <a href="{{ route('categories.show', ['category' => 2]) }}" class="list-group-item"><i class="fa fa-shopping-bag"></i> Vétements</a>
          <a href="{{ route('categories.show', ['category' => 3]) }}" class="list-group-item"><i class="fa fa-headphones"></i> Téléphone & Accessoires</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      
        @yield('container')
      

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  

  <!-- Bootstrap core JavaScript -->
  
  <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>
  @endsection