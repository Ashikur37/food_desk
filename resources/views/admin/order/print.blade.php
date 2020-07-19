<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$setting->site_name}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/')}}admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/')}}admin/dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">

            <div class="row invoice-info">

                <div class="col-sm-4 invoice-col">

                    <b>{{ __('m.orderId') }}:</b> {{$order->id}}<br>
                    <b>{{ __('m.orderDate') }}:</b> {{$order->created_at->format('d-m-Y')}}<br>
                    <br>
                    <b>{{ __('m.customer') }}:</b><br> <br><b>{{$order->firstname." ".$order->lastname}}</b>
                    <br><b>{{$order->address1." ".$order->address2}}</b>
                    <br><b>{{$order->town." ".$order->zip}}</b>
                    <br>
                    <p>
                    {{ __('m.phone') }}: {{$order->phone}}
                    <br>
{{ __('m.email') }}: {{$order->email}}
<br></p>
{{ __('m.customer') }}:: {{$order->date->format('D m/d') . " on " . $order->hour . ":" . $order->minute}}
<br>
           {{ __('m.message') }} :{{$order->message}}
            <br>
            {{ __('m.shop') }}: {{$setting->site_name}}
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>{{ __('m.quantity') }}</th>
                                <th>{{ __('m.product') }}</th>
                                <th>{{ __('m.price') }}</th>
                                <th>{{ __('m.message') }}</th>
                                <th>{{ __('m.subTotal') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderLines as $item)
                            <tr>
                                <td>
                                    @if($item[ "product" ]->sell_product_option=="weight_wise") {{$item["quantity"]>999?($item["quantity"]/1000)."KG":$item["quantity"]."GR"}} @elseif($item["product"]->sell_product_option=="per_unit") {{$item["quantity"]}} Unit @else {{$item["quantity"]}}
                                    Person @endif

                                </td>
                                <td>{{$item->product->product_name_dch}}</td>
                                <td>@if($item["product"]->sell_product_option=="weight_wise") €{{$item["product"]->price_weight*1000}}/KG @elseif($item["product"]->sell_product_option=="per_unit") €{{$item["product"]->price_per_unit}}/ Unit @else €{{$item["product"]->price_per_person}}/
                                    Person @endif
                                </td>
                                <td>{{ $item["message"]}}</td>
                                <td>
                                    @if($item["product"]->sell_product_option=="weight_wise") €{{$item["product"]->price_weight*$item["quantity"]}} @elseif($item["product"]->sell_product_option=="per_unit") €{{$item["product"]->price_per_unit*$item["quantity"]}} @else €{{$item["product"]->price_per_person*$item["quantity"]}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">

                <div class="col-6">


                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">{{ __('m.subTotal') }}:</th>
                                <td>€{{$order->total}}</td>
                            </tr>
                            {{--  <tr>
                                <th>Tax (0%)</th>
                                <td>€0</td>
                            </tr>  --}}

                            <tr>
                                <th>{{ __('m.total') }}:</th>
                                <td>€{{$order->total}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
