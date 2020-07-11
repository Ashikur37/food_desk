@extends('layouts.front') @section('content')


<div class="breadcrumb-area mb-50">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-container">
                    <ul>
                        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active" ><a href="{{route('cart')}}">Cart</a></li>
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
            @include('includes.cartPage')
        </div>
    </div>
</div>
<script>

updateCart=(id,quantity,weight)=>{
    if(weight=="KG"){
        quantity*=1000;
    }
    $.ajax({
            url: `{{URL::to('update-cart')}}?id=${id}&quantity=${quantity}`,
            success: function(result) {
                $("#cart-container").html(result)
                    $('.pro-qty').append('<a href="#" class="inc qty-btn">+</a>');
    $('.pro-qty').append('<a href="#" class= "dec qty-btn">-</a>');
    $('.qty-btn').on('click', function(e) {
        e.preventDefault();
        var $button = $(this);

        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
        updateCart($button.parent().find('input').attr("data-id"), $button.parent().find('input').val(), $button.parent().parent().find('select').val());
    });
            }
        });
}
</script>

@endsection
