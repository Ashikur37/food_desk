@extends('layouts.front') @section('content')
<style>
.qty-btn{
display:none
}
</style>

<div class="breadcrumb-area mb-50">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-container">
                    <ul>
                        <li><a href="index.html"><i class="fa fa-home"></i> {{ __('f.home') }}</a></li>
                        <li class="active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=====  End of breadcrumb area  ======-->


<!--=============================================
    =            Cart page content         =
    =============================================-->


<div class="page-section section mb-50">
    <div class="container">
        <div class="row" id="cart-container">
            <div class="col-12">
                <form action="#">
                    <!--=======  cart table  =======-->

                    <div class="cart-table table-responsive mb-40" >
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>

                                </tr>
                            </thead>
                            <tbody>
                            @php($total=0)
                                @foreach($order->orderLines as $item)
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img
                                                src="https://www.fooddesk.net/obs/obs-api-new/timthumb.php?src={{$item["product"]->image}}&h=350&w=350"
                                                class="img-fluid" alt="Product"></a></td>
                                    <td class="pro-title"><a href="{{URL::to('/product')}}/{{$item["product"]->product_name_dch}}">{{$item["product"]->product_name_dch}}</a></td>
                                    <td class="pro-price"><span>
                                            @if($item["product"]->sell_product_option=="weight_wise")
                                            ${{$item["product"]->price_weight}}/GRM
                                            @elseif($item["product"]->sell_product_option=="per_unit")
                                            ${{$item["product"]->price_per_unit}}/ Unit
                                            @else
                                            ${{$item["product"]->price_per_person}}/ Person

                                            @endif
                                        </span></td>
                                    <td class="pro-quantity">
                                        <div class="pro-qty"><input disabled type="text" @if($item[ "product" ]->sell_product_option=="weight_wise") value="{{$item["quantity"]>999?$item["quantity"]/1000:$item["quantity"]}}" @else value="{{$item["quantity"]}}" @endif >
                                        </div>
                                        @if($item["product"]->sell_product_option=="weight_wise")
                                        <select disabled name="sort-by" class="nice-select">
                                            <option {{$item["quantity"]<1000?"selected":""}} value="GR">GR</option>
                                            <option {{$item["quantity"]>999?"selected":""}} value="KG">KG</option>
                                        </select> @elseif($item["product"]->sell_product_option=="per_unit")
                                        <select name="sort-by" class="nice-select">
                                            <option value="Unit">UN</option>

                                        </select> @else
                                        <select name="sort-by" class="nice-select">
                                            <option value="Person">PER</option>
                                        </select> @endif
                                    </td>
                                    <td class="pro-subtotal"><span>
                                            @if($item["product"]->sell_product_option=="weight_wise")
                                            @php($total+=$item["product"]->price_weight*$item["quantity"])
                                            ${{$item["product"]->price_weight*$item["quantity"]}}
                                            @elseif($item["product"]->sell_product_option=="per_unit")
                                            @php($total+=$item["product"]->price_per_unit*$item["quantity"])
                                            ${{$item["product"]->price_per_unit*$item["quantity"]}}
                                            @else
                                            @php($total+=$item["product"]->price_per_person*$item["quantity"])
                                            ${{$item["product"]->price_per_person*$item["quantity"]}}

                                            @endif
                                        </span></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!--=======  End of cart table  =======-->


                </form>

                <div class="row">
                    <div class="col-lg-6 col-12 d-flex">
                        <!--=======  Cart summery  =======-->

                        <div class="cart-summary">
                            <div class="cart-summary-wrap">
                                <h4>Cart Summary</h4>
                                <p>Sub Total <span>${{$total}}</span></p>
                                <h2>Grand Total <span>${{$total}}</span></h2>
                            </div>
                            <div class="cart-summary-button">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                    <a href="{{route('home')}}">
                                        <button class="update-btn">Continue Shopping</button>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                    <a href="{{route('checkout')}}">
                                        <button class="checkout-btn mb-20">Checkout</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--=======  End of Cart summery  =======-->

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>


@endsection