@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Product</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group ">
                            <label for="title" >Title</label>

                            
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="" autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group ">
                            <label for="description" >Description</label>

                            
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"  autocomplete="description" autofocus></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group ">
                            <label for="price" >Price</label>

                            
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="" autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <label class="input-group-text" for="category">Category</label>
                                </div>
                                <select name="category" class="custom-select @error('category') is-invalid @enderror" id="category">
                                <option selected>Choose...</option>
                                <option value="1">Beauté & Santé</option>
                                <option value="2">Vétements</option>
                                <option value="3">Téléphones & Accessoires</option>
                                </select>
                            </div>

                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                            <div class="form-group">

                                <div class="custom-file">
                                    <input type="file" name='image' class="custom-file-input @error('image') is-invalid @enderror" id="validatedCustomFile" >
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                            </div>

                        
                       
                                <button type="submit" class="btn btn-primary">
                                    Add Product
                                </button>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
