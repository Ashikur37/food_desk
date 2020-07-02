<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function cart(Request $request)
    {
        $cart = [];
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        }

        return view('front.cart', compact('cart'));
    }
    public function removeCart(Request $request)
    {
        $cart = $request->session()->get('cart');
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]["id"] == $request->id) {
                unset($cart[$i]);
            }
        }
        $request->session()->put('cart', $cart);
        return "Successfully removed from Cart";
    }
    public function addToCart(Request $request)
    {
        $product = Product::where('fid', '=', $request->id)->first();
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            $exist = false;
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]["id"] == $request->id) {
                    $cart[$i]["quantity"] += $request->weight == "KG" ? $request->quantity * 1000 : $request->quantity;
                    $cart[$i]["msg"] .= " " . $request->msg;
                    $exist = true;
                }
            }
            if (!$exist) {
                array_push($cart, [
                    "id" => $request->id,
                    "quantity" => $request->weight == "KG" ? $request->quantity * 1000 : $request->quantity,
                    "msg" => $request->msg,
                    "weight" => $request->weight,
                    "product" => $product
                ]);
            }
            $request->session()->put('cart', $cart);
        } else {
            $cart = array([
                "id" => $request->id,
                "quantity" => $request->weight == "KG" ? $request->quantity * 1000 : $request->quantity,
                "msg" => $request->msg,
                "weight" => $request->weight,
                "product" => $product
            ]);
            $request->session()->put('cart', $cart);
        }
        return "Successfully added to Cart";
    }
}
