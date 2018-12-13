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
<script src="https://unpkg.com/vue@2.4.2"></script>
<style >
    .tooltip-arrow,
.red-tooltip + .tooltip > .tooltip-inner {background-color: black;}
    }
</style>
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
            
            @if(Cart::count() > 0)
            
            
            <h2>{{Cart::count()}} item(s) in Shopping Cart</h2>
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:50%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:8%">Quantity</th>
                            <th style="width:22%" class="text-center">Total</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $item)
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs"><img src="{{ asset('img/products/'.$item->model->slug.'.jpg') }}" alt="..." class="img-responsive" width="100" height="100" /></div>
                                    <div class="col-sm-10" style="padding-left: 30px">
                                        <a href="{{route('product.show',$item->id)}}">
                                        <h4 class="nomargin">{!! $item->model->name!!}</h4></a>
                                        
                                        <p>{{ $item->model->details }}</p>
                                        

                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">${{$item->price}}</td>

                            
                            <td data-th="Quantity">
                             
                                <form action="{{route('cart.update',$item->rowId)}}" method="POST">
                                @csrf
                                @method('PUT')
                              <select class="form-control text-center" name="qty" value="{{$item->qty}}" style="margin-top: 30px;margin-bottom: 10px">
                                @for ($i = 1; $i < 10; $i++)
                                 <option value="{{$i}}"
                                  {{ $item->qty2 == $i?'selected':''}}>{{$i}}
                                 </option>
                                @endfor
                              </select>
                              <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="bottom" title="Update quantity of products"  class="red-tooltip">update</button>
                              </form>
                             <!-- 
                              <select class="quantity"  v-model="qty" @change="myFunction()" name="qty">
                               
                                    <option v-for="num in list" :value="num">
                                        @{{num}}
                                    </option>    
                              </select>
                              <button class="btn btn-success" type="submit">update</button>
                              </form>
-->
                           </td>
                            <td data-th="Subtotal" class="text-center"></td>
                            <td class="actions" data-th="">
                                <form action="{{route('cart.watchlater',$item->rowId)}}" method="POST">
                                    {{ csrf_field() }}
                                <button class="btn btn-info btn-sm" style="padding: 5px" data-toggle="tooltip" data-placement="bottom" title="Save for later"  class="red-tooltip"><i class="fa fa-bookmark-o" ></i>
                                </button></form>
                                <form action="{{route('cart.delete',$item->rowId)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete item from cart"  class="red-tooltip"><i class="fa fa-trash-o"></i></button>
                             </form>               
                            </td>
                        </tr>
                        
                    @endforeach
                    <tr class="visible-xs">
                            <td class="text-center">
                                <span style="font-size: 20px;padding: 2px">subTotal:</span><strong>${{Cart::subtotal()}}</strong></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        
                         
                        <tr>
                            <td><a href="{{route('shop.index')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong>${{Cart::total()}}</strong></td>
                            <td><a href="{{route('checkout.index')}}" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                        </tr>
                           
                    </tfoot>
                </table>
            </div><hr>
             @include('partials.paymentmethods')  
            <span>Selected:@{{ qty.num }}</span>

            @else
           <div class="container" style="margin-bottom: 150px">

                <h3 style="padding: 15px">No items in Cart!</h3>
                <a href="{{route('shop.index')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <a href="{{route('watchlater.index')}}" class="btn btn-success" style="margin-left: 10px"><i class="fa fa-angle-right"></i> Move to watchlater list</a>
                </div>
            </div>
        <div> 
    </div>
@endif
        
  
    </div> <!-- end cart-section -->
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
@endsection
