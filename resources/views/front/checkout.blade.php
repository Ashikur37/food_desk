@extends('layouts.front')
@section('content')
    <div class="breadcrumb-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                         <li><a href="{{route('home')}}"><i class="fa fa-home"></i> {{ __('f.home') }}</a></li>
                        <li class="active" ><a href="{{route('checkout')}}">{{ __('f.checkout') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!--=====  End of breadcrumb area  ======-->

	<!--=============================================
	=            Checkout page content         =
	=============================================-->

	<div class="page-section section mb-50">
		<div class="container">
			<div class="row">
				<div class="col-12">

					<!-- Checkout Form s-->
					<form action="{{route('checkoutSubmit')}}" method="post" class="checkout-form">
                    @csrf
						<div class="row row-40">

							<div class="col-lg-7 mb-20">
                                <div class="form-group">
                    @guest
                    @else
                    @if(auth()->user()->type!=0)

            <label>User</label>
                  <select onchange="userChange(this.value)" name="user_id" class="form-control select2" style="width: 100%;">
                  <option value="0">Guset</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->firstname." ".$user->lastname}}</option>
                    @endforeach
                  </select>

                    @endif
                    @endguest
                </div>
								<!-- Billing Address -->
								<div id="billing-form" class="mb-40">
									<h4 class="checkout-title">{{ __('f.billingAddress') }}</h4>

									<div class="row">

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.firstName') }}*</label>
											<input
                                                value="{{auth()->check()?auth()->user()->firstname:""}}"
                                             name="firstname" type="text" placeholder="{{ __('f.firstName') }}">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.lastName') }}*</label>
											<input value="{{auth()->check()?auth()->user()->lastname:""}}" name="lastname" type="text" placeholder="{{ __('f.lastName') }}">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.emailAddress') }}*</label>
											<input value="{{auth()->check()?auth()->user()->email:""}}" name="email" type="email" placeholder="{{ __('f.emailAddress') }}">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.phoneNumber') }}*</label>
											<input value="{{auth()->check()?auth()->user()->phone:""}}" type="text" name="phone" placeholder="{{ __('f.phoneNumber') }}">
										</div>

										<div class="col-12 mb-20">
											<label>{{ __('f.companyName') }}</label>
											<input  type="text" name="company" placeholder="{{ __('f.companyName') }}">
										</div>

										<div class="col-12 mb-20">
											<label>{{ __('f.address') }}*</label>
											<input
                                            value="{{auth()->check()?auth()->user()->address1:""}}"
                                             name="address1" type="text" placeholder="{{ __('f.addressLine') }} 1">
											<input
                                            value="{{auth()->check()?auth()->user()->address2:""}}"
                                             name="address2" type="text" placeholder="{{ __('f.addressLine') }} 2">
										</div>


										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.town') }}/{{ __('f.city') }}*</label>
											<input
                                            value="{{auth()->check()?auth()->user()->town:""}}"
                                             name="town" type="text" placeholder="{{ __('f.town') }}/{{ __('f.city') }}">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.zipCode') }}*</label>
											<input
                                            value="{{auth()->check()?auth()->user()->zip:""}}"
                                             name="zip" type="text" placeholder="{{ __('f.zipCode') }}">
										</div>

										<div class="col-12 mb-20">
                                        @guest
											<div class="check-box">
												<input type="checkbox"
                                                name="create_account"
                                                id="create_account" onclick="createAccount(this.checked)">
												<label for="create_account">{{ __('f.createAnAccount') }}?</label>
                                                <input name="password" style="display:none" id="accountPassword" placeholder="{{ __('f.enterThePassword') }}" type="password" class="my-2 form-control">
											</div>
                                            <script>
                                                let createAccount=(checked)=>{
                                                    if(checked){
                                                        document.getElementById("accountPassword").style.display="";
                                                    }
                                                    else{
                                                        document.getElementById("accountPassword").style.display="none";
                                                    }

                                                }
                                            </script>
                                            @endguest
											<div class="check-box">
												<input type="checkbox"
                                                name="shipping_different"
                                                id="shiping_address" data-shipping>
												<label for="shiping_address">{{ __('f.shipToDifferentAddress') }}</label>
											</div>
										</div>

									</div>

								</div>

								<!-- Shipping Address -->
								<div id="shipping-form" class="mb-40">
									<h4 class="checkout-title">Shipping Address</h4>

									<div class="row">

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.firstName') }}*</label>
											<input name="s_firstname" type="text" placeholder="{{ __('f.firstName') }}">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.lastName') }}*</label>
											<input name="s_lastname" type="text" placeholder="{{ __('f.lastName') }}">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.emailAddress') }}*</label>
											<input name="s_email" type="email" placeholder="{{ __('f.emailAddress') }}">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.phoneNumber') }}*</label>
											<input name="s_phone" type="text" placeholder="{{ __('f.phoneNumber') }}">
										</div>

										<div class="col-12 mb-20">
											<label>{{ __('f.companyName') }}</label>
											<input name="s_company" type="text" placeholder="{{ __('f.companyName') }}">
										</div>

										<div class="col-12 mb-20">
											<label>{{ __('f.address') }}*</label>
											<input name="s_address1" type="text" placeholder="{{ __('f.addressLine') }} 1">
											<input name="s_address2" type="text" placeholder="{{ __('f.addressLine') }} 2">
										</div>



										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.town') }}/{{ __('f.city') }}*</label>
											<input name="s_town" type="text" placeholder="{{ __('f.town') }}/{{ __('f.city') }}">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>{{ __('f.zipCode') }}*</label>
											<input name="s_zip" type="text" placeholder="{{ __('f.zipCode') }}">
										</div>

									</div>

								</div>

							</div>

							<div class="col-lg-5">
								<div class="row">

									<!-- Cart Total -->
									<div class="col-12 mb-60">

										<h4 class="checkout-title">{{ __('f.firstName') }}</h4>

										<div class="checkout-cart-total">

											<h4>{{ __('f.product') }} <span>{{ __('f.total') }}</span></h4>

											<ul>
                                            @php($total=0)
                                @foreach($cart as $item)
												<li>{{$item["product"]->product_name_dch}} X
                                                @if($item[ "product" ]->sell_product_option=="weight_wise")
                                                {{$item["quantity"]>999?($item["quantity"]/1000)." KG":$item["quantity"]." GRM"}}
                                                @elseif($item["product"]->sell_product_option=="per_unit")
                                                {{$item["quantity"]}} Unit
                                                @else
                                                {{$item["quantity"]}} Person
                                                @endif
                                                 <span>@if($item["product"]->sell_product_option=="weight_wise")
                                            @php($total+=$item["product"]->price_weight*$item["quantity"])
                                            €{{$item["product"]->price_weight*$item["quantity"]}}
                                            @elseif($item["product"]->sell_product_option=="per_unit")
                                            @php($total+=$item["product"]->price_per_unit*$item["quantity"])
                                            €{{$item["product"]->price_per_unit*$item["quantity"]}}
                                            @else
                                            @php($total+=$item["product"]->price_per_person*$item["quantity"])
                                            €{{$item["product"]->price_per_person*$item["quantity"]}}

                                            @endif</span></li>
											@endforeach
											</ul>

											<p>{{ __('f.subTotal') }} <span>€{{$total}}</span></p>
											{{--  <p>Tax <span>$00.00</span></p>  --}}
                                            <input type="hidden" value="{{$total}}" name="total">
											<h4>Grand Total <span>€{{$total}}</span></h4>

										</div>

									</div>

									<!-- Payment Method -->
									<div class="col-12">

										<h4 class="checkout-title">{{ __('f.deliveryDetails') }}</h4>

										<div class="checkout-payment-method">

											<div class="single-method">

												<div class="row">
													<div class="col-md-12 col-12">
														<input id="pickupDate" onchange="dateChanged(this.value)" type="date"
                                                        name="date" placeholder="{{ __('f.date') }}">
													</div>
												</div>

												<div class="row">
													<div class="col-md-12 col-12">
														<input id="dayname" readonly name="dayname" type="text" placeholder="{{ __('f.dayName') }}">
													</div>
												</div>

												<div class="row">
													<div class="col-md-6 col-12">
														<select onchange="hourChange(this.value)" id="hour" required name="hour" class="form-control">

                                                        </select>
													</div>
													<div class="col-md-6 col-12">
														<select id="minute" required name="minute" class="form-control">

                                                        </select>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12 col-12">
														<textarea class="my-5" name="message" id="commentMessage" placeholder="{{ __('f.message') }}" style="width: 100%;padding: 10px 20px;"></textarea>
													</div>
												</div>

											</div>

											<div class="single-method">
												<input type="checkbox"
                                                name="give_invoice" id="accept_terms">
												<label for="accept_terms">{{ __('f.giveMeInvoice') }}</label>
											</div>

										</div>

										<button class="place-order">{{ __('f.placeOrder') }}</button>

									</div>

								</div>
							</div>

						</div>
					</form>

				</div>
			</div>
		</div>
	</div>

<script>
let hourChange=(val)=>{
    for(i=0;i<times.length;i++){

        if(parseInt(val)>=parseInt(times[i].from.split(":")[0])&&parseInt(val)<=parseInt(times[i].to.split(":")[0]))
        {
            time=times[i];
            break;
        }

    }
    console.log(time)
    document.getElementById("minute").innerHTML="<option>Select Minute</option>";
    startHour=time.from.split(":")[0];
    endHour=time.to.split(":")[0];
    if(startHour==val){
        for(i=time.from.split(":")[1];i<=60;i++){
                        document.getElementById("minute").innerHTML+=`
                        <option value="${i}">${i}</option>`
                    }
    }
    else if(endHour==val){

            for(i=0;i<=time.to.split(":")[1];i++){
                        document.getElementById("minute").innerHTML+=`
                        <option value="${i}">${i}</option>`
                    }
    }
    else{
            for(i=0;i<=60;i++){
                        document.getElementById("minute").innerHTML+=`
                        <option value="${i}">${i}</option>`
                    }
    }
}
let dateChanged=(val)=>{
    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    $.ajax({
            url: `{{URL::to('check-date')}}?date=${val}`,
            success: function(result) {
                if(result.err){
                    document.getElementById("pickupDate").value="";
                    toastr.error(result.err)
                    $("#dayname").val("")
                }
                else{
                    let hours=[];
                    window.times=result.success;
                    times.forEach(time=>{
                         startHour=parseInt(time.from.split(":")[0]);
                        endHour=parseInt(time.to.split(":")[0]);
                        for(i=startHour;i<=endHour;i++){
                            hours=[...hours,i];
                        }
                    })
                    hours=hours.sort((a,b)=>a>b?1:-1)
                    document.getElementById("hour").innerHTML="<option>Select Hour</option>";
                    document.getElementById("minute").innerHTML="<option>Select Minute</option>";
                    hours.forEach(i=>{
                        document.getElementById("hour").innerHTML+=`
                        <option value="${i}">${i}</option>`
                    })
                    $("#dayname").val(days[new Date(val).getDay()])
                }
                //$("#billing-form").html(result)
            }
      });

}
</script>
@endsection

@section('script')
<script src="{{asset('/')}}/admin/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
  userChange=(id)=>{
      $.ajax({
            url: `{{URL::to('update-billing')}}?id=${id}`,
            success: function(result) {
                $("#billing-form").html(result)
            }
      });
  }
</script>
@endsection
