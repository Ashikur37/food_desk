@extends('layouts.admin') @section('content')
<div class="content-wrapper">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
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
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">Change Password</div>

                        <div class="card-body">
                            <form autocomplete="on" action="{{route('updatePasswordAdmin')}}" method="POST">
                                @csrf
                                <div class="row">




                                    <div class="col-12 mb-30">
                                        <input placeholder="Old Password" class="form-control" name="old_password" value="" autocomplete="off" type="password">
                                    </div>

                                    <div class="my-2 col-12 mb-30">
                                        <input class="form-control" name="password" id="new-pwd" placeholder="New Password" type="password">
                                    </div>

                                    <div class="my-2 col-12 mb-30">
                                        <input class="form-control" name="password_confirmation" id="confirm-pwd" placeholder="Confirm Password" type="password">
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary my-2">Save Changes</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
@endsection