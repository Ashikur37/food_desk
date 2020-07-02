@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <!-- Content Header (Page header) -->
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
                       Order List
                    </div>

                </div>
                <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-hover table-bordered data-table">
                                        <thead>
                                             <tr>
                                                <th>#</th>
                                                 <th>User</th>
                                                 <th>Email</th>
                                                 <th>Phone</th>
                                                 <th>Order At</th>
                                                <th>Total</th>
                                                 <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                        </div>
                </div>
            </div>
        </div>
    </section>
</div>
    @endsection
@section('script')
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript">

    deleteData=(id)=>{
      url=`{{URL::to('/categories/${id}')}}`;
        $('<form action="'+url+'" method="post">@csrf @method("delete")</form>').appendTo('body').submit();
    }
    $(function () {

      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ url('/order-data') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'username', name: 'username'},
              {data: 'email', name: 'email'},
             {data: 'phone', name: 'phone'},
             {data: 'order_at', name: 'order_at'},
            {data: 'total', name: 'total'},
             {data: 'status', name: 'status'},
             {data: 'action', name: 'action'},



          ]
      });

    });
  </script>
  @endsection
