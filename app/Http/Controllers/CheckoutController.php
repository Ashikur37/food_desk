<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderLine;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = [];
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        }
        return view('front.checkout', compact('cart'));
    }

    public function checkoutSubmit(Request $request)
    {
        $user_id = 0;
        $shipping_different = 0;
        if (auth()->check()) {
            $user_id = auth()->id();
        }
        //validate
        if ($request->shipping_different) {
            $shipping_different = 1;
            $s_firstname = $request->s_firstname;
            $s_lastname = $request->s_lastname;
            $s_email = $request->s_email;
            $s_phone = $request->s_phone;
            $s_company = $request->s_company;
            $s_address1 = $request->s_address1;
            $s_address2 = $request->s_address2;
            $s_town = $request->s_town;
            $s_zip = $request->s_zip;
        } else {
            $s_firstname = $request->firstname;
            $s_lastname = $request->lastname;
            $s_email = $request->email;
            $s_phone = $request->phone;
            $s_company = $request->company;
            $s_address1 = $request->address1;
            $s_address2 = $request->address2;
            $s_town = $request->town;
            $s_zip = $request->zip;
        }
        //create order
        $order = Order::create([
            "user_id" => $user_id,
            "status" => 0,
            "firstname" => $request->firstname,
            "lastname" => $request->lastname,
            "email" => $request->email,
            "phone" => $request->phone,
            "company" => $request->company,
            "address1" => $request->address1,
            "address2" => $request->address2,
            "town" => $request->town,
            "zip" => $request->zip,
            "shipping_different" => $shipping_different,
            "s_firstname" => $s_firstname,
            "s_lastname" => $s_lastname,
            "s_email" => $s_email,
            "s_phone" => $s_phone,
            "s_company" => $s_company,
            "s_address1" => $s_address1,
            "s_address2" => $s_address2,
            "s_town" => $s_town,
            "s_zip" => $s_zip,
            "date" => $request->date,
            "dayname" => $request->dayname,
            "hour" => $request->hour,
            "minute" => $request->minute,
            "total" => $request->total,
            "message" => $request->message,
            "give_invoice" => $request->give_invoice ? 1 : 0
        ]);
        //create orderline
        $cart = $request->session()->get('cart');
        foreach ($cart as $item) {

            if ($item["product"]->sell_product_option == "per_unit") {
                $price = $item["product"]->price_per_unit;
            } elseif ($item["product"]->sell_product_option == "weight_wise") {
                $price = $item["product"]->price_weight;
            } else {
                $price = $item["product"]->price_per_person;
            }
            OrderLine::create([
                "order_id" => $order->id,
                "product_id" => $item["id"],
                "quantity" => $item["quantity"],
                "price" => $price,
                "message" => $item["msg"]
            ]);
        }
        //if user new account

        //clear the cart
        $cart = [];
        $request->session()->put('cart', $cart);
        return redirect()->route('myAccount')->with('success', 'Order placed successfully');
        //redirect to order success
    }
}
