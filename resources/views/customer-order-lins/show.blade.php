@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">CustomerOrderLin {{ $customerorderlin->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/customer-order-lins') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/customer-order-lins/' . $customerorderlin->id . '/edit') }}" title="Edit CustomerOrderLin"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('customerorderlins' . '/' . $customerorderlin->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete CustomerOrderLin" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $customerorderlin->id }}</td>
                                    </tr>
                                    <tr><th> Quantity </th><td> {{ $customerorderlin->quantity }} </td></tr><tr><th> Price </th><td> {{ $customerorderlin->price }} </td></tr><tr><th> Discount </th><td> {{ $customerorderlin->discount }} </td></tr><tr><th> Subtotal </th><td> {{ $customerorderlin->subtotal }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
