<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->getCart();
        return view('carts.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = $this->getCart();

        if ($cart->contains($product->id)) {
            $pivotRow = $cart->where('id', $product->id)->first()->pivot;
            $pivotRow->quantity++;
            $pivotRow->update();
        } else {
            $cart->attach($product);
        }

        if (Auth::check()) {
            $user = Auth::user();
            $cart->user_id = $user->id;
            $cart->save();
        } else {
            Session::put('cart', $cart);
        }

        return back()->with('success', 'Product added to cart successfully!');
    }

    public function destroy($id)
    {
        $cart = $this->getCart();

        $cart->detach($id);

        if (Auth::check()) {
            $user = Auth::user();
            $cart->user_id = $user->id;
            $cart->save();
        } else {
            Session::put('cart', $cart);
        }

        return back()->with('success', 'Product removed from cart successfully!');
    }

    private function getCart()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cart = $user->cart;
            $cart->load('products');
        } else {
            $cart = Session::get('cart', collect());
            $cart->load('products');
        }

        return $cart;
    }
}
