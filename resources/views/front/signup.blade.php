@extends('layouts.front') @section('content')
	<!--=============================================
    =            breadcrumb area         =
    =============================================-->

    <div class="breadcrumb-area mb-50">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumb-container">
						<ul>
							<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
							<li class="active">Shop</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of breadcrumb area  ======-->


	<!--=============================================
	=            Shop page container         =
	=============================================-->

<div class="page-content mb-50">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
					<!-- Login Form s-->
					<form method="POST" action="{{ route('signin') }}">
                        @csrf

						<div class="login-form">
							<h4 class="login-title">Login</h4>

							<div class="row">
								<div class="col-md-12 col-12 mb-20">
									<label>Email Address*</label>
									<input name="email" class="mb-0" type="email" placeholder="Email Address">
								</div>
								<div class="col-12 mb-20">
									<label>Password</label>
									<input name="password" class="mb-0" type="password" placeholder="Password">
								</div>
								<div class="col-md-8">

									<div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
										<input type="checkbox" id="remember_me">
										<label for="remember_me">Remember me</label>
									</div>

								</div>

								<div class="col-md-4 mt-10 mb-20 text-left text-md-right">
									<a href="#"> Forgotten pasward?</a>
								</div>

								<div class="col-md-12">
									<button class="register-button mt-0">Login</button>
								</div>

							</div>
						</div>

					</form>
				</div>
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
					<form action="{{ route('register') }}" method="post">
                        @csrf
						<div class="login-form">
							<h4 class="login-title">Register</h4>

							<div class="row">
								<div class="col-md-6 col-12 mb-20">
									<label>First Name</label>
									<input name="firstname" class="mb-0" type="text" placeholder="First Name">
								</div>
								<div class="col-md-6 col-12 mb-20">
									<label>Last Name</label>
									<input name="lastname" class="mb-0" type="text" placeholder="Last Name">
								</div>
								<div class="col-md-12 mb-20">
									<label>Email Address*</label>
									<input name="email" class="mb-0" type="email" placeholder="Email Address">
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

								<div class="col-md-6 mb-20">
									<label>Password</label>
									<input name="password" class="mb-0" type="password" placeholder="Password">
								</div>
								<div class="col-md-6 mb-20">
									<label>Confirm Password</label>
									<input name="password_confirmation" class="mb-0" type="password" placeholder="Confirm Password">
								</div>
								<div class="col-12">
									<button class="register-button mt-0">Register</button>
								</div>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of Shop page container  ======-->
@endsection


