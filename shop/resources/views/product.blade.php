@extends('layouts.app')

@section('title', 'Product')

@section('extracss')
<link rel="stylesheet" href="{{ asset('css/paymentmethods.css') }}" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  .star-rating {
  line-height:32px;
  font-size:1.25em;
}
.star-rating .fa-star{color: red;}
</style>

<script src="https://unpkg.com/vue@2.4.2"></script>

@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" >
    <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
    @foreach($product->categories as $category)
    <li class="breadcrumb-item" ><a href="{{ route('categories.show',$category->id)}}">
        <a href="{{route('categories.show',$category->id)}}">
         {{ $category->name }}**
          </a>
        @endforeach
        </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
  </ol>
  
</nav>
@include('partials.error')
  <div class="container" id="productinfo" style="padding-bottom: 60px">
     <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
      </div>
            <h2 v-text="name">@{{name}}</h2>

    <div class="row">
      <div class="col-md-6 col-xs-8">
        <div class="img-zoom-container">
        <img src="{{ asset('img/products/'.$product->slug.'.jpg') }}" width="" height="" alt="product" id="myimage" class="img-fluid">
         <div id="myresult" class="img-zoom-result"></div>

        </div>
      </div>
      <div class="col-md-6 " style="">
        <a href="">
          <h1 class="product-name">{{ $product->name }}</h1>
        </a>
        <div ><span class="product-price1">{{ $product->presentPrice() }}
        </span>
        <h2 class="rate" id="div1">
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        </h2>
      </div>

        <div class="product-details">{{ $product->details}}
        </div>
        <div class="product-description">{{ $product->description}}
        </div>
        <br>
        <div class="row" style="margin-left: 20px">
          <div class="col-md-4 col-xs-4">
            <div class="product-cart">
              <form action="{{route('cart.store',$product)}}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">
                <i class="fa fa-shopping-cart" aria-hidden="true" style="margin-right: 5px"></i>Add To Cart
                </button> 
              </form> 
            </div>
          </div>
          <div class="col-md-4 col-xs-4">
            <div class="product-return">
            <a href="{{ route('categories.show',$category->id)}}" type="button" class="btn btn-primary"  data-toggle="tooltip" data-placement="bottom" 
              data-html="true"  title="Return to continou shoping">Back To Shop</a> 
            </div>
          </div>
        </div>
      </div>
    </div>
@include('partials.paymentmethods')
   
    <hr> 
@include('partials.recommended')
@endsection
@section('extrajs')
<script type="text/javascript">    
new Vue({
    el:'#app',
    data:{
    name:'shop cart',
    qty:"2",
    list:[1,2,3,4,5,6,7,8],
    },
    methods:{
        myFunction:function () {
            console.log(this.qty);
        }
    }
});
</script>
<script type="text/javascript">
  var $star_rating = $('.star-rating .fa');

var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {

});
</script>

@endsection