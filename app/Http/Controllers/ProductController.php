<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $request->validate([
            "name" => "required",
            "description" => "required",
            "stock" => "required|integer",
            "price" => "required|integer",
            "image" => "required|mimes:png,jpg,svg|max:2048"
        ]);


        $file = file_get_contents($request->image);
        $fileName = hash("sha256", $file) . "." . $request->image->getClientOriginalExtension();
        Storage::disk("public")->put("images/products/" . $fileName, $file);


        Product::create([
            "name" => $request->name,
            "description" => $request->description,
            "stock" => $request->stock,
            "price" => $request->price,
            "image" =>  $fileName
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        // dd($request->all());
        $request->validate([
            "name" => "required",
            "description" => "required",
            "stock" => "required|integer",
            "price" => "required|integer",
        ]);

        if ($request->hasFile("image")) {
            
            Storage::disk("public")->delete('images/products/'.$product->image);
            $file = file_get_contents($request->image);
            Storage::disk("public")->put("images/products/" . $product->image, $file);
        }


        $product->update([
            "name" => $request->name,
            "description" => $request->description,
            "stock" => $request->stock,
            "price" => $request->price,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        Storage::disk("public")->delete('images/products/'.$product->image);
        $product->delete();
        return back();
    }
}
