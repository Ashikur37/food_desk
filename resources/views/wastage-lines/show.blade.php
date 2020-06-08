@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">WastageLine {{ $wastageline->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/wastage-lines') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/wastage-lines/' . $wastageline->id . '/edit') }}" title="Edit WastageLine"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('wastagelines' . '/' . $wastageline->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete WastageLine" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $wastageline->id }}</td>
                                    </tr>
                                    <tr><th> Quantity </th><td> {{ $wastageline->quantity }} </td></tr><tr><th> Medicine Id </th><td> {{ $wastageline->medicine_id }} </td></tr><tr><th> Medicine Unit Type Id </th><td> {{ $wastageline->medicine_unit_type_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
