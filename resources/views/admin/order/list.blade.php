@extends('layouts.admin') @section('content')
<div class="content-wrapper">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Orders</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('orderList')}}">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
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
            <div class="card card-info">
                <div class="card-header">
                    <div class="card-title">
                       {{ __('m.orderList') }}
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-5">
                            <input id="start" class="form-control" type="date">
                        </div>
                        <div class="col-md-5">
                            <input id="end" class="form-control" type="date">
                        </div>
                        <button onclick="filter()" class="btn btn-success">Search</button>
                    </div>


                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered data-table">
                            <thead>
                                <tr>
                                    <th><input onclick="checkAll(this)" type="checkbox"></th>
                                    <th>Order At</th>
                                    <th>User</th>
                                    <th>Total</th>
                                    <th>Delivery Time</th>
                                    <th>Phone</th>
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
@endsection @section('script')
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript">
    let changeStatus=(id,status)=>{
        window.location.href="{{URL::to('/update-order-status')}}/"+id+"/"+status
    }
    let checkAll=(el)=>{
        console.log(el)
        chks=document.getElementsByClassName("chk");
        for(i=0;i<chks.length;i++){
            chks[i].checked=el.checked;
        }
    }
    let filter = () => {
        let from = document.getElementById("start").value;
        let to = document.getElementById("end").value;

        table.destroy();
        table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/order-data') }}?from=" + from + "&to=" + to,
            columns: [{
                    data: 'check',
                    name: 'check',
                    searchable: false,
                    orderable: false
                }, {
                    data: 'order_at',
                    name: 'order_at'
                }, {
                    data: 'username',
                    name: 'username'
                }, {
                    data: 'total',
                    name: 'total'
                }, {
                    data: 'delivery_time',
                    name: 'delivery_time'
                }, {
                    data: 'phone',
                    name: 'phone'
                }, {
                    data: 'status',
                    name: 'status'
                }, {
                    data: 'action',
                    name: 'action'
                },



            ]
        });
    }
    $(function() {

        window.table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/order-data') }}",
            columns: [{
                    data: 'check',
                    name: 'check',
                    searchable: false,
                    orderable: false
                }, {
                    data: 'order_at',
                    name: 'order_at'
                }, {
                    data: 'username',
                    name: 'username'
                }, {
                    data: 'total',
                    name: 'total'
                }, {
                    data: 'delivery_time',
                    name: 'delivery_time'
                }, {
                    data: 'phone',
                    name: 'phone'
                }, {
                    data: 'status',
                    name: 'status'
                }, {
                    data: 'action',
                    name: 'action'
                },



            ]
        });

    });
</script>
@endsection
