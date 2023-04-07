<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $carts = Cart::where('user_id', $user->id)->get();
        return view('checkout.index', compact('carts'));
    }

    public function store(Request $request)
    {
        // TODO: Process the payment and create the order

        $user = auth()->user();
        $carts = Cart::where('user_id', $user->id)->get();

        // Create the order
        $order = $user->orders()->create([
            'status' => 'pending',
            'total' => 0,
        ]);

        // Add items to the order
        foreach ($carts as $cart) {
            $order->items()->create([
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price,
            ]);

            // Remove the item from the cart
            $cart->delete();
        }

        // Calculate the order total
        $order->total = $order->items()->sum('price');
        $order->save();

        // TODO: Send an email confirmation to the user

        return view('checkout.complete', compact('order'));
    }
}
