<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class WatchlaterController extends Controller
{
    public function index()
    {
    	$products = Product::where('featured', true)->inRandomOrder()->take(4)->get();
        return view('watchlater',compact('products'));   
    }

    public function move_to_cart($id)
    {
        $item=Cart::instance('watchLater')->get($id);
        Cart::instance('watchLater')->remove($id);
        //$test=Cart::instance('watchLater')->content();
        //$test=Cart::count();
        //dd($test);
        
        if (Cart::count() > 0) {
            $alreadyExist=Cart::search(function ($cartItem, $rowId)
             use($item){
            return $cartItem->id === $item->id;
            });
            if( $alreadyExist->count() ){
                return back()->with('message','Item already esist in cart');
            }else{
                Cart::add($item->id,
                $item->name, 1, $item->price)->associate('App\Product');
        
                return back()->with('message','Item added to cart sucessfully');
            }
        }

        Cart::add($item->id,
        $item->name, 1, $item->price)->associate('App\Product');
        
        return back()->with('message','Item added to cart sucessfully');
           
    }

    public function delete($id)
    {
        Cart::instance('watchLater')->remove($id);

        return back()->with('message', 'Item has been removed!');
    }
}
