<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function createProduct()
    {
        return view('staffs.create-product');
    }

    public function storeProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:3', 'max:25'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'price' => ['required', 'numeric', 'min:1']
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        try {
            $product = Product::create($request->only('name', 'price', 'quantity'));
        } catch (\Throwable $th) {
            return response()->json(['fails' => $th->getMessage()], 500);
        }
        return response()->json(['success' => $product], 200);
    }
}
