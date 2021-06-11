<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

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
        $data = $request->only(['id', 'product_name', 'price', 'quantity']);

        $request->session()->push('cart.products', [
            'id' => $data['id'],
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

    // Get information to comfirm order
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
        $order = Order::create($data);
        // dd($order->id);
        if ($request->session()->has('cart.products')) {
            // dd($request->session()->get('cart.products'));
            $arr = [];
            foreach (session()->get('cart.products') as $key => $product) {
                $arr[] = [
                    'order_id' => $order->id,
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity'],
                ];
            }
        }
        $order->orderDetails()->insert($arr);

        return redirect()->route('carts.print-receipt');
    }

    public function printReceipt(Request $request)
    {
        if ($request->session()->has('customer') && $request->session()->has('cart.products')) {
            $customer = $request->session()->pull('customer');
            $products = $request->session()->pull('cart.products');
            return view('carts.print-receipt', compact(['customer', 'products']));
        } else {
            return redirect()->route('carts.index');
        }
    }
}
