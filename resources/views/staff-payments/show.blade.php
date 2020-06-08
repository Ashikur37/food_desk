@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">StaffPayment {{ $staffpayment->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/staff-payments') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/staff-payments/' . $staffpayment->id . '/edit') }}" title="Edit StaffPayment"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('staffpayments' . '/' . $staffpayment->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete StaffPayment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $staffpayment->id }}</td>
                                    </tr>
                                    <tr><th> Salary </th><td> {{ $staffpayment->salary }} </td></tr><tr><th> Paid </th><td> {{ $staffpayment->paid }} </td></tr><tr><th> Due </th><td> {{ $staffpayment->due }} </td></tr><tr><th> Month </th><td> {{ $staffpayment->month }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
