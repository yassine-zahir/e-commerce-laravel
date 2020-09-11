@extends('layouts.app')

@section('content')
@if(Cart::count() > 0)
<div class="px-4 px-lg-0">
  
    <div class="pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
  
            <!-- Shopping cart table -->
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="border-0 bg-light">
                      <div class="p-2 px-3 text-uppercase">Product</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Price</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Quantity</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Remove</div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                 @foreach (Cart::content() as $product)
                 <tr>
                    <th scope="row" class="border-0">
                      <div class="p-2">
                      <img src="{{ asset('storage').'/'. $product->model->image }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{$product->model->title}}</a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: {{$product->model->category->name}}</span>
                        </div>
                      </div>
                    </th>
                    <td class="border-0 align-middle"><strong>{{$product->model->price}} Dhs</strong></td>
                  <td class="border-0 align-middle"><strong>
                    <form action="{{ route('cart.update',['rowId'=>$product->rowId ]) }}" method="POST"> 
                      @csrf
                      @method('PATCH')
                      <select name="qty" id="qty" data-id="{{ $product->rowId }}" class="custom-select-md">
                        @for ($i=1 ; $i<6 ; $i++)

                      <option value="{{ $i }}" {{$i == $product->qty ? 'selected' : '' }}>{{ $i }}</option>
                        
                        @endfor
                    </select> </strong>  <button type="submit" class="btn btn-light text-primary"><i class="fa fa-refresh"></i></button></td>
                      
                  </form>
                    <td class="border-0 align-middle">
                    <form action="{{ route('cart.destroy', $product->rowId)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-light text-danger"><i class="fa fa-trash"></i></button>
                    
                    </form>     
                    </td>
                  </tr>
                     
                 @endforeach

                </tbody>
              </table>
            </div>
            <!-- End -->
          </div>
        </div>
  
        <div class="row py-5 p-4 bg-white rounded shadow-sm">
          <div class="col-lg-6">
            <!--<div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
            <div class="p-4">
              <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
              <div class="input-group mb-4 border rounded-pill p-2">
                <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
                <div class="input-group-append border-0">
                  <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                </div>
              </div>
            </div>-->
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
            <div class="p-4">
              <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
              <textarea name="" cols="30" rows="2" class="form-control"></textarea>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
            <div class="p-4">
              <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
              <ul class="list-unstyled mb-4">
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>{{ Cart::subtotal() }} Dhs</strong></li>
                
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong> {{ Cart::tax() }} Dhs</strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                  <h5 class="font-weight-bold"> {{ Cart::total() }} Dhs</h5>
                </li>
            </ul><a href="{{ route('paiement.index') }}" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </div>

@else
<p>Votre panier est vide.</p>
@endif
  @endsection

@section('extra-js')

<script>
  var select = document.querySelector('#qty')

  
  // Array.from(select).forEach(element) => {
  //   console.log(element)
  //   element.addEventListener('change',function(){

  //     console.log('assie')
      // var rowId = this.getAttribute('data-id')
      // fetch(
      //   `/panier/${rowId}`,
        
      //   method: 'patch',
      //   body: JSON.stringify({
      //     qty:this.value
      //   })
        
      // ).then((data) =>{
      //   console.log(data);
      //   location.reload();
      // }).catch((error) =>{
      //   console.log(data)
      // })
  //   })
  // }
</script>
    
@endsection