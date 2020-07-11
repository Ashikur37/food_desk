@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <div class="card-title">
                      {{__('Create New Admin')}} 
                    </div>
                    <div class="card-tools">
                        
                    </div>
                </div>
                <div class="card-body">
                        <form autocomplete="on" action="{{route('insertAdmin')}}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="my-2 col-md-6 col-12 mb-30">
                                        <input required placeholder="Firstname" class="form-control" name="firstname" value="{{ old('firstname') }}" autocomplete="off" type="text">
                                    </div>

                                    <div class="my-2 col-md-6  col-12 mb-30">
                                        <input value="{{ old('lastname') }}" required class="form-control" name="lastname"  placeholder="Lastname" type="text">
                                    </div>

                                    <div class="my-2 col-md-6  col-12 mb-30">
                                        <input value="{{ old('email') }}" required class="form-control" name="email" placeholder="Email" type="email">
                                    </div>

                                    <div class="my-2 col-md-6 col-12 mb-30">
                                        <input required class="form-control" name="password"  placeholder="Password" type="password">
                                    </div>
                                    <div class="my-2 col-md-6 col-12 mb-30">
                                        <input required class="form-control" name="password_confirmation"  placeholder="Confirm Password" type="password">
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary my-2">Create</button>
                                    </div>

                                </div>
                            </form>
                </div>
            </div>
        </div>
    </section>
</div>
    @endsection

