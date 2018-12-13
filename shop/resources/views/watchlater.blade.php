@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('extracss')
<!--
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
-->
<!------ cart table style ---------->
<link rel="stylesheet" href="{{ asset('css/paymentmethods.css') }}" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link  href="{{ asset('css/cart.css') }}" rel="stylesheet" >
<link  href="{{ asset('css/sidenav.css') }}" rel="stylesheet" >

@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" >
    <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
    <li class="breadcrumb-item" ><a href="/shop">Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">cart</li>
  </ol>
</nav>
    <div class="cart-section container" style="padding-bottom: 50px">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        <div id="mySidenav" class="sidenav fixed">
          <a href="/cart" id="about">Cart</a>
          <a href="/shop" id="blog">Shop</a>
          <a href="/shop" id="projects">Products</a>
          <a href="#" id="contact">Contact</a>
        </div>
            
            @if(Cart::instance('watchLater')->count() > 0)
            
            
            <h2>{{Cart::instance('watchLater')->count()}} item(s) in Watchlater list</h2>
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:50%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:22%" class="text-center">Total</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::instance('watchLater')->content() as $item)
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs"><img src="{{ asset('img/products/'.$item->model->slug.'.jpg') }}" alt="..." class="img-responsive" width="100" height="100" /></div>
                                    <div class="col-sm-10" style="padding-left: 30px">
                                        <h4 class="nomargin">{!! $item->model->name!!}</h4>
                                        
                                        <p>{{ $item->model->details }}</p>
                                        

                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">{{$item->price}}$</td>

                            <td data-th="Subtotal" class="text-center">
                                <form action="{{route('watchlater.move-to-cart',$item->rowId)}}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">
                <i class="fa fa-shopping-cart" aria-hidden="true" style="margin-right: 5px"></i>Add To Cart
                </button> 
              </form> 
                            </td>
                            <td class="actions" data-th="">
                                <form action="{{route('watchlater.delete',$item->rowId)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                             </form>               
                            </td>
                        </tr>
                        
                    @endforeach
                    
                    </tbody>
                    <tfoot>
                        
                         
                        <tr>
                            <td><a href="{{route('shop.index')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td><a href="{{route('checkout.index')}}" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                        </tr>
                           
                    </tfoot>
                </table>
            </div><hr>
            @else
           <div class="container" style="margin-bottom: 150px">
                <h3>No items in Watchlater List!</h3>
                <a href="{{route('shop.index')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
            </div>             
      </div>
        @endif
        </div> <!-- end cart-section -->

     @include('partials.recommended')


@endsection

@section('extrajs')
@endsection
