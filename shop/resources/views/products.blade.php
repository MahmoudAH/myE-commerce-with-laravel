@extends('layouts.app')

@section('title', 'Products')

@section('extracss')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<link  href="{{ asset('css/sidenav.css') }}" rel="stylesheet" >
@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" >
    <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
    <li class="breadcrumb-item" ><a href="/shop">Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
  </ol>
</nav>
  @include('partials.error')
  <div class="container" id="categoryinfo">
        <div class="row justify-content-between">
          <div class="col-4">
             <h1>{{$category->name}}:</h1>
          </div>
          <div class="col-4">
            <div class="products-header">
                <div class="sort">
                    <strong>Price: </strong>
                    <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</a> |
                    <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">High to Low</a>
                </div>
              </div>
          </div>
        </div>   
        <div id="mySidenav" class="sidenav fixed">
          <a href="/cart" id="about">Cart</a>
          <a href="/shop" id="blog">Shop</a>
          <a href="/shop" id="projects">Products</a>
          <a href="#" id="contact">Contact</a>
       </div>
        
         @foreach($category->products->chunk(3) as $chunk)
                  <div class="row" style="margin-left: 10px">

                    @foreach($chunk as $product)
                    <div class="col-md-4 col-xs-12">
                      <br>
                      <div class="product">
                        <a href="{{route('product.show',$product->id)}}"><img src="{{ asset('img/products/'.$product->slug.'.jpg') }}" alt="product" class="img-fluid"></a>
                        <a href="{{route('product.show',$product->id)}}">
                          <div class="product-name">{{ $product->name }}
                          </div>
                        </a>
                        <div class="product-price">{{ $product->presentPrice() }}</div>
                    </div>
                     </div>
                    @endforeach   
               </div>
      @endforeach              
  </div>
<hr>  
@endsection
