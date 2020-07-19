<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDayException;
use App\OrderDayPickup;
use App\OrderLine;
use App\PickupTime;
use App\PickupTimeException;
use App\Product;
use App\Setting;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $setting = Setting::firstOrFail();
        if ($setting->offline == 1) {
            return view('front.offline');
        }
        $cart = [];
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        }
        $users = User::whereType(0)->get();
        return view('front.checkout', compact('cart', 'users'));
    }
    public function updateBilling()
    {
        $user = User::find(request()->id);
        return view('front.dynamicBilling', compact('user'));
    }

    public function checkDate(Request $request)
    {
        // return $request->date;
        //check next delivery date
        $dt = new DateTime();
        $day = date('N', strtotime($dt->format('D'))) % 7;
        $pickup_date = date_create($request->date);
        $diff = date_diff($dt, $pickup_date);


        if ($diff->format("%R") == '-') {
            return [
                "err" => "Choose different day"
            ];
        }
        $pickup = OrderDayPickup::where('day', '=', $day)->first();
        $pickupException = OrderDayException::where('date', '=', $dt->format('y-m-d'))->get();
        if ($pickupException->count() > 0) {
            $pickup = $pickupException[0];
        }

        if ($diff->format("%a") < ($pickup->pickup - 1)) {
            return [
                "err" => "Choose greater day"
            ];
        }
        $times = PickupTimeException::where('date', '=', $request->date)->get();
        if ($times->count() > 0) {
            foreach ($times as $time) {
                if ($time->from == "-1") {
                    return [
                        "err" => "Choose greater day"
                    ];
                }
            }
            return [
                "success" => $times
            ];
        }
        $times = PickupTime::where('day', '=', date('N', strtotime($pickup_date->format('D'))) % 7)->get();
        if ($times->count() < 1) {
            return [
                "err" => "Choose different day"
            ];
        }
        return [
            "success" => $times
        ];
        //check holiday


    }
    public function checkoutSubmit(Request $request)
    {
        $user_id = 0;
        $shipping_different = 0;
        if (auth()->check()) {
            $user_id = auth()->id();
        }
        if ($request->user_id) {
            $user_id = $request->user_id;
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
            }
            else {
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
        if ($request->create_account) {
            $user = User::create([
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'address1' => $request['address1'],
                'address2' => $request['address2'],
                'zip' => $request['zip'],
                'town' => $request['town'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'type' => 0
            ]);
            //  $user->
        }
        //clear the cart
        $cart = [];
        $request->session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Order placed successfully');
        //redirect to order success
    }
}
