<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function index()
    {
      $products = Product::where('featured', true)->inRandomOrder()->take(4)->get();
      return view('cart',compact('products'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
     // $product=Product::findOrFail($id); 
      $products = Product::where('featured', true)->inRandomOrder()->take(4)->get(); 
      
      $itemExist=Cart::search(function ($cartItem, $rowId)
       use($product){
       return $cartItem->id === $product->id;
      });
      if($itemExist->count()){
         return redirect()->route('cart.index')->with('message', 'item was already added to your cart!');
      }else{
      
      /*Cart::add( $product->id,
        $product->name, 1, $product->price,['img'=>$product->image,'details'=>$product->details,'description'=>$product->description]);*/
      Cart::add( $product->id,
        $product->name, 1, $product->price)->associate('App\Product');
        //dd(Cart::Content());
        return redirect()->route('cart.index')->with('message', 'product was added to your cart!');       
     }
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Cart::update($id,$request->qty);
        //dd(cart::total());
        return back()->with('message','Quantity was updated successfully!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        Cart::remove($id);
        return back()->with('message', 'product was deleted from your cart!');
      
    }

    /**
     * Switch item for shopping cart to Save for Later.
     *
     * @para   m  int  $id
     * @return \Illuminate\Http\Response
     */
    public function watch_later($id)
    {
        $product=Cart::get($id);
        Cart::remove($id);

        $itemExist=Cart::instance('watchLater')->search(function ($cartItem, $rowId)
          use($product){
          return $cartItem->id === $product->id;
        });
        if (Cart::count()) {
          
         if($itemExist->count()){
            return redirect()->route('cart.index')->with('message',    'item was already added watchLaterList!');
         }}
        Cart::instance('watchLater')->add($product->id,
        $product->name, 1, $product->price)->associate('App\Product');
         //dd(Cart::instance('watchLater')->content());
        return redirect()->route('cart.index')->with('message', 'product was added to watchLaterList!');       

        
    }
}
