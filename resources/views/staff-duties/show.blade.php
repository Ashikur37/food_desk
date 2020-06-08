@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">StaffDuty {{ $staffduty->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/staff-duties') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/staff-duties/' . $staffduty->id . '/edit') }}" title="Edit StaffDuty"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('staffduties' . '/' . $staffduty->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete StaffDuty" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $staffduty->id }}</td>
                                    </tr>
                                    <tr><th> Start Time </th><td> {{ $staffduty->start_time }} </td></tr><tr><th> End Time </th><td> {{ $staffduty->end_time }} </td></tr><tr><th> Day </th><td> {{ $staffduty->day }} </td></tr><tr><th> Staff Id </th><td> {{ $staffduty->staff_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
