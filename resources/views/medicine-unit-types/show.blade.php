@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">MedicineUnitType {{ $medicineunittype->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/medicine-unit-types') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/medicine-unit-types/' . $medicineunittype->id . '/edit') }}" title="Edit MedicineUnitType"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('medicineunittypes' . '/' . $medicineunittype->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete MedicineUnitType" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $medicineunittype->id }}</td>
                                    </tr>
                                    <tr><th> Quantity </th><td> {{ $medicineunittype->quantity }} </td></tr><tr><th> Buying Price </th><td> {{ $medicineunittype->buying_Price }} </td></tr><tr><th> Selling Price </th><td> {{ $medicineunittype->selling_price }} </td></tr><tr><th> Medicine Id </th><td> {{ $medicineunittype->medicine_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
