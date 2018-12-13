<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;


class CheckoutController extends Controller
{
    public function index(){
    	$cart= Cart::content();
    	$total= Cart::total();
    	return view('checkout',compact('cart','total'));
    }

    public function payment(Request $request)
    {
    	//dd($request);
    	// Set your secret key: remember to change this to your live secret key in production
    	// See your keys here: https://dashboard.stripe.com/account/apikeys
    	\Stripe\Stripe::setApiKey("sk_test_FmiqDuKlKuiimnqJJtzhdpeS");

    	// Token is created using Checkout or Elements!
    	// Get the payment token ID submitted by the form:
    	//$token = $_POST['stripeToken'];
    	//dd($request->stripeToken);
    	
    	\Stripe\Customer::create([
    	  "description" => "Customer for jenny.rosen@example.com",
    	  "source" => "tok_visa" // obtained with Stripe.js
    	]);

    	$charge = \Stripe\Charge::create([
    	    'amount' => 200,
    	    'currency' => 'usd',
    	    'description' => 'Example charge',
    	    'source' => $request->stripeToken,
    	    'email' =>$request->email,
    	]);
    	dd($charge);
    	//return view('paymentSuccess');
    }
}
