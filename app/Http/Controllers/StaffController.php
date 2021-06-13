<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class StaffController extends Controller
{
    public function createProduct()
    {
        return view('staffs.create-product');
    }

    public function storeProduct(Request $request)
    {
        // $data = $request->all();
        // dd($data);
    }
}
