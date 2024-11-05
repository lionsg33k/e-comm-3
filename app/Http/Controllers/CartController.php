<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $products = Cart::where("user_id", Auth::user()->id)->get();

        $user = User::where("id" , Auth::user()->id)->first();
        return view("cart.cart" , compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }


    public function add(Request $request, Product $product)
    {
        $user = User::where("id", Auth::user()->id)->first();

        $cartItem  = Cart::where("user_id", $user->id)->where("product_id", $product->id)->first();
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                "user_id" => $user->id,
                "product_id" => $product->id,
                "quantity" => 1
            ]);
        }
        $product->stock -= 1;
        $product->save();

        return back();
    }
}
