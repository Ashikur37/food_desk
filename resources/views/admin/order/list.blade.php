@extends('layouts.admin') @section('content')
<div class="content-wrapper">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">

                    <div class="row">
                        <div class="col-md-2">
                            <div class="card-title" style="margin-top: 6px;">
                            {{ __('m.orderList') }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input id="start" class="form-control" type="date">
                        </div>
                        <div class="col-md-4">
                            <input id="end" class="form-control" type="date">
                        </div>
                        <div class="col-md-2">
                            <button onclick="filter()" class="btn btn-success">{{ __('m.search') }}</button>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered data-table">
                            <thead>
                                <tr>
                                    {{--  <th><input onclick="checkAll(this)" type="checkbox"></th>  --}}
                                    <th>#</th>
                                    <th>{{ __('m.orderAt') }}</th>
                                    <th>{{ __('m.user') }}</th>
                                    <th>{{ __('m.total') }}</th>
                                    <th>{{ __('m.deliveryTime') }}</th>
                                    <th>{{ __('m.phone') }}</th>
                                    <th>{{ __('m.status') }}</th>
                                    <th>{{ __('m.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="btn-group">
                            <a href="{{route('productReport')}}" class="btn  btn-info">{{ __('m.report_per_product') }}</a>
                            <a href="{{route('orderReport')}}" class="btn  btn-warning">{{ __('m.report_orders') }}</a>
                            <a href="{{route('customerReport')}}" class="btn  btn-success">{{ __('m.orders_per_customer') }}</a>

                        </div>
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
    let changeStatus = (id, status) => {
        window.location.href = "{{URL::to('/update-order-status')}}/" + id + "/" + status
    }
    let checkAll = (el) => {
        console.log(el)
        chks = document.getElementsByClassName("chk");
        for (i = 0; i < chks.length; i++) {
            chks[i].checked = el.checked;
        }
    }
    let filter = () => {
        let from = document.getElementById("start").value;
        let to = document.getElementById("end").value;

        table.destroy();
        table = $('.data-table').DataTable({
            language: {
        url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Dutch.json'
    },

            "order": [],
            processing: true,
            serverSide: true,
            ajax: "{{ url('/order-data') }}?from=" + from + "&to=" + to,
            columns: [
                {{--  {
                    data: 'check',
                    name: 'check',
                    searchable: false,
                    orderable: false
                },   --}}
                {
                    data: 'id',
                    name: 'id'
                },
                {
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
            language: {
        url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Dutch.json'
    },
            "order": [],
            processing: true,
            serverSide: true,
            ajax: "{{ url('/order-data') }}",
            columns: [
                {{--  {
                    data: 'check',
                    name: 'check',
                    searchable: false,
                    orderable: false
                },   --}}
                {
                    data: 'id',
                    name: 'id'
                },
                {
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
