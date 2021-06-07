<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');

            return view('carts.index', compact(['cart']));
        }
        return view('carts.index');
    }

    public function create()
    {
        return view('carts.add-product');
    }

    public function store(Request $request)
    {
        $data = $request->only(['product_name', 'price', 'quantity']);

        $request->session()->push('cart.products', [
            'product_name' => $data['product_name'],
            'price' => $data['price'] * $data['quantity'],
            'quantity' => $data['quantity']
        ]);
        return response()->json(['success' => 'success'], 201);
    }

    /**
     * Return view checkout
     *
     * @return void
     */
    public function checkout(Request $request)
    {
        if ($request->session()->has('cart.products')) {
            return view('carts.checkout');
        }
        return redirect()->back();
    }

    public function pay(Request $request)
    {

        if ($request->session()->has('customer')) {
            $request->session()->forget('customer');
        }
        $data = $request->only(['email', 'name', 'phone', 'address']);

        $request->session()->put('customer', [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address']
        ]);
        return 'Thanh toán thành công, cảm ơn bạn, chúc bạn một ngày vui vẻ!';
    }

    public function printReceipt()
    {
    }
}
