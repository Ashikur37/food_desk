<a href="cart.html">
    <div class="cart-icon d-inline-block">
        <span class="icon_bag_alt"></span>
    </div>
    <div class="cart-info d-inline-block">
        <p>Shopping Cart
            <span>
                {{count($cart)}} items - €{{$cartTotal}}
            </span>
        </p>
    </div>
</a>
<!-- end of shopping cart -->

<!-- cart floating box -->
<div class="cart-floating-box" id="cart-floating-box">
    <div class="cart-items">
        @foreach($cart as $item)
        <div class="cart-float-single-item d-flex">
            <span class="remove-item"><a href="javascript:void(0)" onclick="removeCartGlobal({{$item["id"]}})"><i class="fa fa-times"></i></a></span>
            <div class="cart-float-single-item-image">
                <a href="{{URL::to('/product')}}/{{$item["product"]->product_name_dch}}"><img
                        src="https://www.fooddesk.net/obs/obs-api-new/timthumb.php?src={{$item["product"]->image}}&h=350&w=350"
                        class="img-fluid" alt=""></a>
            </div>
            <div class="cart-float-single-item-desc">
                <p class="product-title"> <a href="{{URL::to('/product')}}/{{$item["product"]->product_name_dch}}">{{$item["product"]->product_name_dch}} </a></p>
                <p class="price"><span class="count">
                @if($item[ "product" ]->sell_product_option=="weight_wise")
                                                {{$item["quantity"]>999?($item["quantity"]/1000)." KG":$item["quantity"]." GRM"}}
                                                @elseif($item["product"]->sell_product_option=="per_unit")
                                                {{$item["quantity"]}} Unit
                                                @else
                                                {{$item["quantity"]}} Person
                                                @endif
                                                x</span> @if($item["product"]->sell_product_option=="weight_wise")

                                            €{{$item["quantity"]>999?$item["product"]->price_weight*1000:$item["product"]->price_weight}}
                                            @elseif($item["product"]->sell_product_option=="per_unit")

                                            €{{$item["product"]->price_per_unit}}
                                            @else

                                            €{{$item["product"]->price_per_person}}

                                            @endif</p>
            </div>
        </div>
        @endforeach

    </div>
    <div class="cart-calculation">
        <div class="calculation-details">
            <p class="total">Subtotal <span>€{{$cartTotal}}</span></p>
        </div>
        <div class="floating-cart-btn text-center">
            <a href="{{route('checkout')}}">Checkout</a>
            <a href="{{route('cart')}}">View Cart</a>
        </div>
    </div>
</div>
<!-- end of cart floating box -->
