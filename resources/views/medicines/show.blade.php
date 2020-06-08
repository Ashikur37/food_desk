@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Medicine {{ $medicine->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/medicines') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/medicines/' . $medicine->id . '/edit') }}" title="Edit Medicine"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('medicines' . '/' . $medicine->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Medicine" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $medicine->id }}</td>
                                    </tr>
                                    <tr><th> Buying Price </th><td> {{ $medicine->buying_price }} </td></tr><tr><th> Selling Price </th><td> {{ $medicine->selling_price }} </td></tr><tr><th> Quantity </th><td> {{ $medicine->quantity }} </td></tr><tr><th> Details </th><td> {{ $medicine->details }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
