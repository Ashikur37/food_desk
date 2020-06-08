@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">SupplierOrderReturn {{ $supplierorderreturn->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/supplier-order-returns') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/supplier-order-returns/' . $supplierorderreturn->id . '/edit') }}" title="Edit SupplierOrderReturn"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('supplierorderreturns' . '/' . $supplierorderreturn->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete SupplierOrderReturn" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $supplierorderreturn->id }}</td>
                                    </tr>
                                    <tr><th> Comment </th><td> {{ $supplierorderreturn->comment }} </td></tr><tr><th> Total </th><td> {{ $supplierorderreturn->total }} </td></tr><tr><th> Discount </th><td> {{ $supplierorderreturn->discount }} </td></tr><tr><th> Paid </th><td> {{ $supplierorderreturn->paid }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
