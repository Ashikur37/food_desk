<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Invoice Print</title>

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

                    <b>Order ID:</b> {{$order->id}}<br>
                    <b>Order Date:</b> {{$order->created_at->format('d-m-Y')}}<br>
                    <br>
                    <b>Customer:</b><br> <br><b>{{$order->firstname." ".$order->lastname}}</b>
                    <br><b>{{$order->address1." ".$order->address2}}</b>
                    <br><b>{{$order->town." ".$order->zip}}</b>
                    <br>
                    <p>
                    Phone: {{$order->phone}}
                    <br>
Email: {{$order->email}}
<br></p>
Pick up date:: {{$order->date->format('D m/d') . " on " . $order->hour . ":" . $order->minute}}
<br>
            Remark:{{$order->message}}
            <br>
            Shop: Brebels-Truyen
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
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Message</th>
                                <th>Subtotal</th>
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
                                <th style="width:50%">Subtotal:</th>
                                <td>€{{$order->total}}</td>
                            </tr>
                            <tr>
                                <th>Tax (0%)</th>
                                <td>€0</td>
                            </tr>

                            <tr>
                                <th>Total:</th>
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