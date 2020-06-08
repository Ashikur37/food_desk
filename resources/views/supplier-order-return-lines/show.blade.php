@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">SupplierOrderReturnLine {{ $supplierorderreturnline->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/supplier-order-return-lines') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/supplier-order-return-lines/' . $supplierorderreturnline->id . '/edit') }}" title="Edit SupplierOrderReturnLine"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('supplierorderreturnlines' . '/' . $supplierorderreturnline->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete SupplierOrderReturnLine" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $supplierorderreturnline->id }}</td>
                                    </tr>
                                    <tr><th> Quantity </th><td> {{ $supplierorderreturnline->quantity }} </td></tr><tr><th> Price </th><td> {{ $supplierorderreturnline->price }} </td></tr><tr><th> Discount </th><td> {{ $supplierorderreturnline->discount }} </td></tr><tr><th> Subtotal </th><td> {{ $supplierorderreturnline->subtotal }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
