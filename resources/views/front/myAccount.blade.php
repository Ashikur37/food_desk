@extends('layouts.front') @section('content')


    <div class="breadcrumb-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!--=====  End of breadcrumb area  ======-->

	<!--=============================================
	=            My account page section         =
	=============================================-->

	<div class="my-account-section section position-relative mb-50 fix">
		<div class="container">
			<div class="row">
				<div class="col-12">

					<div class="row">

						<!-- My Account Tab Menu Start -->
						<div class="col-lg-3 col-12">
							<div class="myaccount-tab-menu nav" role="tablist">
								<a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
									Dashboard</a>

								<a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>

								<a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> address</a>

								<a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>

								<a href="login-register.html"><i class="fa fa-sign-out"></i> Logout</a>
							</div>
						</div>
						<!-- My Account Tab Menu End -->

						<!-- My Account Tab Content Start -->
						<div class="col-lg-9 col-12">
							<div class="tab-content" id="myaccountContent">
								<!-- Single Tab Content Start -->
								<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
									<div class="myaccount-content">
										<h3>Dashboard</h3>

										<div class="welcome">
											<p>Hello, <strong>{{$user->firstname." ".$user->lastname}}</strong> (If Not <strong>{{$user->firstname." ".$user->lastname}} !</strong><a href="login-register.html" class="logout"> Logout</a>)</p>
										</div>

										<p class="mb-0">From your account dashboard. you can easily check &amp; view your
											recent orders, manage your shipping and billing addresses and edit your
											password and account details.</p>
									</div>
								</div>
								<!-- Single Tab Content End -->

								<!-- Single Tab Content Start -->
								<div class="tab-pane fade" id="orders" role="tabpanel">
									<div class="myaccount-content">
										<h3>Orders</h3>

										<div class="myaccount-table table-responsive text-center">
											<table class="table table-bordered">
												<thead class="thead-light">
												<tr>
													<th>Order ID</th>
													<th>Date</th>
													<th>Status</th>
													<th>Total</th>
													<th>Action</th>
												</tr>
												</thead>

												<tbody>
												<tr>
													<td>#4453453</td>
													<td>Aug 22, 2018</td>
													<td>Pending</td>
													<td>$45</td>
													<td><a href="cart.html" class="btn">View</a></td>
												</tr>
												<tr>
													<td>#4453453</td>
													<td>July 22, 2018</td>
													<td>Approved</td>
													<td>$100</td>
													<td><a href="cart.html" class="btn">View</a></td>
												</tr>
												<tr>
													<td>#4453453</td>
													<td>June 12, 2017</td>
													<td>On Hold</td>
													<td>$99</td>
													<td><a href="cart.html" class="btn">View</a></td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- Single Tab Content End -->

								<!-- Single Tab Content Start -->
								<div class="tab-pane fade" id="address-edit" role="tabpanel">
									<div class="myaccount-content">
										<h3>Billing Address</h3>

										<address>
											<p><strong>{{$user->firstname." ".$user->lastname}}</strong></p>
											<p>{{$user->address1}} <br>
												{{$user->address2}}</p>
											<p>{{$user->town}}

                                            {{$user->zip}}
                                            </p>
										</address>

										{{--  <a href="#" class="btn d-inline-block edit-address-btn"><i class="fa fa-edit"></i>Edit Address</a>  --}}
									</div>
								</div>
								<!-- Single Tab Content End -->

								<!-- Single Tab Content Start -->
								<div class="tab-pane fade" id="account-info" role="tabpanel">
									<div class="myaccount-content">
										<h3>Account Details</h3>

										<div class="account-details-form">
											<form action="#">
												<div class="row">
													<div class="col-lg-6 col-12 mb-30">
														<input id="first-name" placeholder="First Name" type="text">
													</div>

													<div class="col-lg-6 col-12 mb-30">
														<input id="last-name" placeholder="Last Name" type="text">
													</div>

													<div class="col-12 mb-30">
														<input id="display-name" placeholder="Display Name" type="text">
													</div>

													<div class="col-12 mb-30">
														<input id="email" placeholder="Email Address" type="email">
													</div>

													<div class="col-12 mb-30"><h4>Password change</h4></div>

													<div class="col-12 mb-30">
														<input id="current-pwd" placeholder="Current Password" type="password">
													</div>

													<div class="col-lg-6 col-12 mb-30">
														<input id="new-pwd" placeholder="New Password" type="password">
													</div>

													<div class="col-lg-6 col-12 mb-30">
														<input id="confirm-pwd" placeholder="Confirm Password" type="password">
													</div>

													<div class="col-12">
														<button class="save-change-btn">Save Changes</button>
													</div>

												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- Single Tab Content End -->
							</div>
						</div>
						<!-- My Account Tab Content End -->
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
