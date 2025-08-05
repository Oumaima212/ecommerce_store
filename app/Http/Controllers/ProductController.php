<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();

        $products = Product::with('images')->get();

        return view('product.index', compact('products'));
    }


    public function show($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $similarProducts = \App\Models\Product::where('collection_id', $product->collection_id)
        ->where('id', '!=', $product->id)
        ->take(4)
        ->get();
        return view('product.show', compact('product','similarProducts'));
    }

}
