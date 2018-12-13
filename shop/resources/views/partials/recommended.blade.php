<div class="container-fluide" style="padding-top: 50px;padding-right: 10px;background-color:#eae3e3 ;margin-bottom: 0">
        <h2 style="text-align: center;margin-top: -30px;font-family: 'Courgette', cursive;"> Recommende Products</h2>
        <div class="row recommende" style="padding-top: 20px;padding-bottom: 30px">
        @foreach($products as $product)
         <div class="col-md-3 col-xs-8" style="">
            <img src="{{ asset('img/products/'.$product->slug.'.jpg') }}" width="" height="" alt="product" id="myimage" class="img-fluid">
            <a href="{{route('product.show',$product->id)}}">
                <div class="product-name">
                    {{ $product->name }}
                </div>
            </a>
            <div class="product-price">{{ $product->presentPrice() }}
            </div>
        </div>
        @endforeach  
    </div>  
</div>   
