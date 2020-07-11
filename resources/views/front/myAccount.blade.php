@extends('layouts.front') @section('content')


<div class="breadcrumb-area mb-50">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-container">
                    <ul>
                        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active" ><a href="{{route('myAccount')}}">My Account</a></li>
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
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
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
                                        <p>Hello, <strong>{{$user->firstname." ".$user->lastname}}</strong> (If Not
                                            <strong>{{$user->firstname." ".$user->lastname}} !</strong><a
                                                href="login-register.html" class="logout"> Logout</a>)</p>
                                    </div>

                                    <p class="mb-0">From your account dashboard. you can easily check &amp; view your
                                        recent orders, manage your shipping and billing addresses and edit your password
                                        and account details.</p>
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
                                            @foreach($user->orders as $order)
                                                <tr>
                                                    <td>#{{$order->id}}</td>
                                                    <td>{{$order->created_at->format('M d/y')}}</td>
                                                    <td>Pending</td>
                                                    <td>${{$order->total}}</td>
                                                    <td><a href="{{route('myOrder',$order->id)}}" class="btn">View</a></td>
                                                </tr>
                                            @endforeach
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
                    <form autocomplete="on" action="{{route('updateAddress')}}" method="POST">
                                            @csrf
                                    <address>
                                        <p><strong>{{$user->firstname." ".$user->lastname}}</strong></p>
                                        <p><input name="address1" required value="{{$user->address1}}" class="form-control"> <br>
                                        <input name="address2" required value="{{$user->address2}}" class="form-control">
                                            </p>
                                        <p>
                                        <input name="town" required value="{{$user->town}}" class="form-control">
                                        </p>
                                        <p>
                                        <input name="zip" required value="{{$user->zip}}" class="form-control">

                                        </p>
                                    </address>
                                    <button  class="btn btn-primary"><i class="fa fa-edit"></i>Update Address</button>
                                    </form>

                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Account Details</h3>

                                    <div class="account-details-form">
                                        <form autocomplete="on" action="{{route('updateProfile')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input name="firstname" id="first-name" placeholder="First Name"
                                                        value="{{$user->firstname}}" type="text">
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input name="lastname" value="{{$user->lastname}}" id="last-name"
                                                        placeholder="Last Name" type="text">
                                                </div>
                                                {{--
                                                <div class="col-12 mb-30">
                                                    <input id="display-name" placeholder="Display Name" type="text">
                                                </div> --}}

                                                <div class="col-12 mb-30">
                                                    <input disabled value="{{$user->email}}" id="email"
                                                        placeholder="Email Address" type="email">
                                                </div>

                                                <div class="col-12 mb-30">

                                                    <h4> Password change
                                                    </h4>
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input name="old_password" value="" autocomplete="off"
                                                        type="password">
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input name="password" id="new-pwd" placeholder="New Password"
                                                        type="password">
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input name="password_confirmation" id="confirm-pwd"
                                                        placeholder="Confirm Password" type="password">
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
@section("script")
<script>
@foreach($errors->all() as $error)
                                toastr.error("{{$error}}")
                    @endforeach
                    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
@endif
</script>
@endsection
