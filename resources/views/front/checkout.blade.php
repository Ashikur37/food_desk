@extends('layouts.front')
@section('content')
    <div class="breadcrumb-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Checkout</li>
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

								<!-- Billing Address -->
								<div id="billing-form" class="mb-40">
									<h4 class="checkout-title">Billing Address</h4>

									<div class="row">

										<div class="col-md-6 col-12 mb-20">
											<label>First Name*</label>
											<input name="firstname" type="text" placeholder="First Name">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Last Name*</label>
											<input name="lastname" type="text" placeholder="Last Name">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Email Address*</label>
											<input name="email" type="email" placeholder="Email Address">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Phone no*</label>
											<input type="text" name="phone" placeholder="Phone number">
										</div>

										<div class="col-12 mb-20">
											<label>Company Name</label>
											<input type="text" name="company" placeholder="Company Name">
										</div>

										<div class="col-12 mb-20">
											<label>Address*</label>
											<input name="address1" type="text" placeholder="Address line 1">
											<input name="address2" type="text" placeholder="Address line 2">
										</div>


										<div class="col-md-6 col-12 mb-20">
											<label>Town/City*</label>
											<input name="town" type="text" placeholder="Town/City">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Zip Code*</label>
											<input name="zip" type="text" placeholder="Zip Code">
										</div>

										<div class="col-12 mb-20">
											<div class="check-box">
												<input type="checkbox"
                                                name="create_account"
                                                id="create_account">
												<label for="create_account">Create an Acount?</label>
											</div>
											<div class="check-box">
												<input type="checkbox"
                                                name="shipping_different"
                                                id="shiping_address" data-shipping>
												<label for="shiping_address">Ship to Different Address</label>
											</div>
										</div>

									</div>

								</div>

								<!-- Shipping Address -->
								<div id="shipping-form" class="mb-40">
									<h4 class="checkout-title">Shipping Address</h4>

									<div class="row">

										<div class="col-md-6 col-12 mb-20">
											<label>First Name*</label>
											<input name="s_firstname" type="text" placeholder="First Name">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Last Name*</label>
											<input name="s_lastname" type="text" placeholder="Last Name">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Email Address*</label>
											<input name="s_email" type="email" placeholder="Email Address">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Phone no*</label>
											<input name="s_phone" type="text" placeholder="Phone number">
										</div>

										<div class="col-12 mb-20">
											<label>Company Name</label>
											<input name="s_company" type="text" placeholder="Company Name">
										</div>

										<div class="col-12 mb-20">
											<label>Address*</label>
											<input name="s_address1" type="text" placeholder="Address line 1">
											<input name="s_address2" type="text" placeholder="Address line 2">
										</div>



										<div class="col-md-6 col-12 mb-20">
											<label>Town/City*</label>
											<input name="s_town" type="text" placeholder="Town/City">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Zip Code*</label>
											<input name="s_zip" type="text" placeholder="Zip Code">
										</div>

									</div>

								</div>

							</div>

							<div class="col-lg-5">
								<div class="row">

									<!-- Cart Total -->
									<div class="col-12 mb-60">

										<h4 class="checkout-title">Cart Total</h4>

										<div class="checkout-cart-total">

											<h4>Product <span>Total</span></h4>

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
                                            ${{$item["product"]->price_weight*$item["quantity"]}}
                                            @elseif($item["product"]->sell_product_option=="per_unit")
                                            @php($total+=$item["product"]->price_per_unit*$item["quantity"])
                                            ${{$item["product"]->price_per_unit*$item["quantity"]}}
                                            @else
                                            @php($total+=$item["product"]->price_per_person*$item["quantity"])
                                            ${{$item["product"]->price_per_person*$item["quantity"]}}

                                            @endif</span></li>
											@endforeach
											</ul>

											<p>Sub Total <span>${{$total}}</span></p>
											<p>Tax <span>$00.00</span></p>
                                            <input type="hidden" value="{{$total}}" name="total">
											<h4>Grand Total <span>${{$total}}</span></h4>

										</div>

									</div>

									<!-- Payment Method -->
									<div class="col-12">

										<h4 class="checkout-title">Delivery  Details</h4>

										<div class="checkout-payment-method">

											<div class="single-method">

												<div class="row">
													<div class="col-md-12 col-12">
														<input type="date"
                                                        name="date" placeholder="Date">
													</div>
												</div>

												<div class="row">
													<div class="col-md-12 col-12">
														<input name="dayname" type="text" placeholder="Day Name">
													</div>
												</div>

												<div class="row">
													<div class="col-md-6 col-12">
														<input name="hour" type="text" placeholder="Hours">
													</div>
													<div class="col-md-6 col-12">
														<input name="minute" type="text" placeholder="Minutes">
													</div>
												</div>

												<div class="row">
													<div class="col-md-12 col-12">
														<textarea name="message" id="commentMessage" placeholder="Messages" style="width: 100%;padding: 10px 20px;"></textarea>
													</div>
												</div>

											</div>

											<div class="single-method">
												<input type="checkbox"
                                                name="give_invoice" id="accept_terms">
												<label for="accept_terms">Give me invoice</label>
											</div>

										</div>

										<button class="place-order">Place order</button>

									</div>

								</div>
							</div>

						</div>
					</form>

				</div>
			</div>
		</div>
	</div>


@endsection
