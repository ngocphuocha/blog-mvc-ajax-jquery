<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Get all product
        $products = Product::select('id', 'name', 'price', 'quantity')->get();

        return view('products.index', compact(['products']));
    }

    /**
     * Detail product in resources
     *
     * @return void
     */
    public function show(Product $product)
    {
        $product = Product::select('id', 'name', 'price', 'quantity')->find($product->id);

        return view('products.detail', compact('product'));
    }
}
