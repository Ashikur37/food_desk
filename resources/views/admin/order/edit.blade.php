@extends('layouts.admin') @section('content')
<div class="content-wrapper">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Order</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('orderList')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Order</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="card card-light">
                <div class="card-header">
                    <h4 class="card-title">
                        {{ __('m.orderNo') }}: {{$order->id}}
                    </h4>
                </div>
                <div class="card-footer card-comments">
                    <div class="card-comment">


                        <div class="comment-text" style="margin-left: 0px;">
                            <span class="username">
                                {{ __('m.orderDate') }}

                            </span> {{$order->created_at->format('M d y')}}
                        </div>

                    </div>
                    <div class="card-comment">


                        <div class="comment-text" style="margin-left: 0px;">
                            <span class="username">
                            {{ __('m.customerAddress')}}
                            </span> {{$order->address1}}<br> {{$order->address2}}<br>{{$order->town." ".$order->zip}}
                            <br> Tel: {{$order->phone}}
                            <br> {{ __('m.email')}}: <a href="mailto:{{$order->email}}">{{$order->email}}</a>

                        </div>

                    </div>
                    <div class="card-comment">
                        <span class="username">
                        {{ __('m.pickupTime')}}
                            <button onclick="document.getElementById('pickTimeForm').style.display='block'" class="ml-2 btn btn-sm btn-info"><i class="fas fa-edit"></i></button>
                        </span> {{$order->date->format('D M d y')}} at {{$order->hour.":".$order->minute}}
                        <form action="{{route('updateOrderPickup',$order->id)}}" id="pickTimeForm" method="post" style="display:none">
                        @csrf
                            <div class="row">
													<div class="col-md-12 col-12">
														<input class="form-control" onchange="dateChanged(this.value)" type="date"
                                                        value="{{$order->date->format('Y-m-d')}}"
                                                        name="date" placeholder="Date">
													</div>
												</div>

												<div class="row">
													<div class="col-md-12 col-12">
														<input class="form-control" id="dayname" readonly value="{{$order->dayname}}" name="dayname" type="text" placeholder="{{ __('m.dayName')}}">
													</div>
												</div>

												<div class="row">
													<div class="col-md-6 col-12">
														<input value="{{$order->hour}}" class="form-control" name="hour" type="text" placeholder="{{ __('m.hour')}}">
													</div>
													<div class="col-md-6 col-12">
														<input value="{{$order->minute}}" class="form-control" name="minute" type="text" placeholder="{{ __('m.minute')}}">
													</div>
												</div>
                                                <div class="row">
                                                    <div class="btn-group">
                                                    <button class="btn btn-success">
                                                    Update
                                                </button>
                                                <button onclick="document.getElementById('pickTimeForm').style.display='none'" type="button" class="btn btn-warning">
                                                    Cancel
                                                </button>
                                                </div>
                                                </div>

                        </form>
                    </div>
                    <div class="card-comment">

                        <table class="table table-bordered">
                            <tr>
                                <th>Img</th>
                                <th>Name</th>
                                <th>Rate</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                                <th>Additional</th>
                                <th>Action</th>
                            </tr>
                            @foreach($order->orderLines as $item)
                            <tr>
                                <td class="pro-thumbnail"><a href="#"><img
                                            src="https://www.fooddesk.net/obs/obs-api-new/timthumb.php?src={{$item["product"]->image}}&h=350&w=350"
                                            class="img-fluid" alt="Product"></a></td>
                                <td class="pro-title"><a href="{{URL::to('/product')}}/{{$item->product->product_name_dch}}">{{$item["product"]->product_name_dch}}</a>
                                </td>
                                <td class="pro-price"><span>
                                        @if($item["product"]->sell_product_option=="weight_wise")
                                        €{{$item["product"]->price_weight}}/GRM
                                        @elseif($item["product"]->sell_product_option=="per_unit")
                                        €{{$item["product"]->price_per_unit}}/ Unit
                                        @else
                                        €{{$item["product"]->price_per_person}}/ Person

                                        @endif
                                    </span></td>
                                <td class="pro-quantity">
                                    <div class="pro-qty"><input id="qnt{{$item->id}}" type="text" @if($item[ "product" ]->sell_product_option=="weight_wise") value="{{$item["quantity"]>999?$item["quantity"]/1000:$item["quantity"]}}"
                                        @else value="{{$item["quantity"]}}" @endif >
                                    </div>
                                    @if($item["product"]->sell_product_option=="weight_wise")
                                    <select id="weight{{$item->id}}" name="sort-by" class="nice-select">
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

                                        €{{$item["product"]->price_weight*$item["quantity"]}}
                                        @elseif($item["product"]->sell_product_option=="per_unit")

                                        €{{$item["product"]->price_per_unit*$item["quantity"]}}
                                        @else

                                        €{{$item["product"]->price_per_person*$item["quantity"]}}

                                        @endif
                                    </span></td>
                                    <td>
                                        {{$item->message}}
                                    </td>
                                <td class="pro-remove">
                                <button onclick="updateLine({{$item->id}})"  class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                                <a class="btn btn-danger btn-sm" href="{{route('deleteOrderLine',$item->id)}}" onclick="return confirm('Are you sure to remove?')" tooltip="Remove from cart"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </table>

                    </div>

                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </section>
</div>
<script>
    let updateLine=(id)=>{
        let quantity=document.getElementById("qnt"+id).value;
        let weight=document.getElementById("weight"+id).value;
        if(weight=="KG"){
            quantity*=1000;
        }
        window.location.href="{{URL::to('/edit-orderline')}}/"+id+"?quantity="+quantity

    }
</script>
<script>
let dateChanged=(val)=>{
    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    $("#dayname").val(days[new Date(val).getDay()])
}
</script>
@endsection
