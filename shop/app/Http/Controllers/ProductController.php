<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $pagination = 9;
        $categories = Category::all();
         
        $products = Product::where('featured', true);
        $categoryName = 'Featured';
        

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }
        //$arrofproducts = get_object_vars($products);

        return view('shop')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id',$id)->with('categories')->first();
        $products = Product::where('featured', true)->inRandomOrder()->take(4)->get(); 
        return view('product',compact('product','products'));
    }
/*
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);
        $query = $request->input('query');
        $products = Product::search($query)->paginate(10);

        return view('search-results')->with('products', $products);
    }
*/
    public function search_with_algolia(){
        return view('search');
    }

    public function search(Request $request){

        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        // $products = Product::where('name', 'like', "%$query%")
        //                    ->orWhere('details', 'like', "%$query%")
        //                    ->orWhere('description', 'like', "%$query%")
        //                    ->paginate(10);

        $products = Product::search($query)->paginate(8);

        return view('searchResults')->with('products', $products);
    }

    
}
