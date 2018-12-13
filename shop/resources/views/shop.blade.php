@extends('layouts.app')

@section('title', 'Shop')

@section('content')
    @include('partials.error')

    <div class="products-section container " id="shopinfo">
        <div class="row">
            <div class="col-md-4">
              <div class="sidebar">
                 <h3>Shop Categories</h3>
                 <ul>
                     @foreach ($categories as $category)
                         <li ><a href="{{ route('categories.show',$category->id)}}">{{      $category->name }}</a></li>
                     @endforeach
                 </ul>
              </div> <!-- end sidebar -->
              <div class="products-header">
                <h1 class="stylish-heading">{{ $categoryName }}</h1>
                <div>
                    <strong>Price: </strong>
                    <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</a> |
                    <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">High to Low</a>
                </div>
              </div>  
        </div>
        <div class="clearfix"></div>
        <div class="col-md-8"><!-- start of column-->
            <h1 style="padding: 10px;font-family: 'Courgette', cursive;">The More Seller:</h1>
                 <div class="products ">
                    @foreach($products->chunk(3) as $chunk)
                    <div class="row">
                    @foreach ($chunk as $product)
                    <div class="col-md-4">
                         <a href="{{ route('product.show',$product->id)}}">
                         <img src="{{ asset('img/products/'.$product->slug.'.jpg') }}" alt="product" ></a>
                         <a href="{{ route('product.show',$product->id) }}"><div class="product-name" style="text-align: center;">{{ $product->name }}</div></a>
                        <div class="product-price" style="text-align: center;margin-left: 5px;padding-bottom: 15px">{{ $product->presentPrice() }}</div>
                    </div>
                    @endforeach
                      </div> <!-- end products -->
                    @endforeach
                </div>
                </div></div>
            </div>
        </div> <!--end of column-->
    </div> <!-- end of row-->
</div><!-- end of container-->

@endsection

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
