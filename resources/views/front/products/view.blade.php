@extends('layouts.front')

@section('title', $products->name)

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('category') }}"> 
                    Collections
                </a>/ 
                <a href="{{ url('category/'.$products->category->slug) }}">
                    {{ $products->category->name }} 
                </a>/ 
                    {{ $products->name }}
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/'.$products->image) }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if ($products->trending == '1')
                                <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>

                        <hr>
                        <label class="me-3">Original_price : <s>Rp. {{ $products->original_price }}</s></label>
                        <label class="fw-bold">Selling_price : Rp. {{ $products->selling_price }}</label>
                        <p class="mt-3">
                            {!! $products->small_description !!}
                        </p>
                        <hr>
                        @if($products->qty > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn position-relative">-</button>
                                    <input type="text" name="quantity" value="1" class="form-control qty-input" />
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-9 mt-3">
                                <br>
                                @if($products->qty > 0)
                                    <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                                @endif
                                <button type="button" class="btn btn-success me-3 float-start">Add to Whishlist <i class="fa fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 ">
                        <h2>Description</h2>
                        <p class="mt-3">
                            {!! $products->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection