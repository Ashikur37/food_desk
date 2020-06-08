@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">SupplierOrderLine {{ $supplierorderline->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/supplier-order-line') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/supplier-order-line/' . $supplierorderline->id . '/edit') }}" title="Edit SupplierOrderLine"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('supplierorderline' . '/' . $supplierorderline->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete SupplierOrderLine" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $supplierorderline->id }}</td>
                                    </tr>
                                    <tr><th> Quantity </th><td> {{ $supplierorderline->quantity }} </td></tr><tr><th> Price </th><td> {{ $supplierorderline->price }} </td></tr><tr><th> Discount </th><td> {{ $supplierorderline->discount }} </td></tr><tr><th> Subtotal </th><td> {{ $supplierorderline->subtotal }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
