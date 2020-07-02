<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function signup()
    {
        return view('front.signup');
    }
    public function myAccount()
    {
        $user = Auth()->user();
        return view('front.myAccount', compact('user'));
    }
    public function signin(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->type == 0) {
                return redirect("/");
            } else {
            }
        } else {
            return "Failed";
        }
    }
    public function wishlist(Request $request)
    {
        $lists = [];
        if ($request->session()->has('wishlists')) {
            $lists = $request->session()->get('wishlists');
        }
        $products = Product::whereIn('fid', $lists)->get();
        return view('front.wishlist', compact('products'));
    }
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
    public function addToWishList($fid, Request $request)
    {
        if ($request->session()->has('wishlists')) {
            $wishlist = $request->session()->get('wishlists');
            array_push($wishlist, $fid);

            $request->session()->put('wishlists',  array_unique($wishlist));
        } else {
            $wishlist = array($fid);
            $request->session()->put('wishlists', $wishlist);
        }
        return "Successfully added to wishlist";
    }
    public function removeFromWishList($fid, Request $request)
    {
        $wishlist = $request->session()->get('wishlists');
        $wishlist = array_diff($wishlist, [$fid]);
        $request->session()->put('wishlists',  array_unique($wishlist));
        return "Successfully removed from wishlist";
    }
}
