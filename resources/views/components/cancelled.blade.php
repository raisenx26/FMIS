@extends('layouts.app')
<style>
	#table1 th
	{
		color: gray;
	}
    #table2 th
	{
		color: gray;
	}
	    #hover:hover {
        background-color: #dcd8d8;

    }
       td {
        font-size: 9.5px;
    }
    
    * {
        font-size: 12px;
    }
</style>

<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">


@section('content')

<h2>Cancelled Registries</h2>

<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-header" data-background-color="gray">
    <h4 class="title">Cancelled ORS Registries</h4>
    <p class="category">Finance Registries Stored</p>
    </div>
    <div class="card-content table-responsive">
    <table class="table" id="table1">
        <thead class="text-primary">
        <th><b>Date</b></th>
        <th><b>ORS</b></th>
        <th><b>Payee</b></th>
        <th><b>Responsibility Center</b></th>
        <th><b>PAP</th>
        <th><b>UACS</b></th>
        <th><b>Amount</b></th>
        <th><b>Particulars</b></th>
        <th><b>Sub Account Code</b></th>
        <th><b>Sub Amount</b></th>
        <th><b>Remarks</b></th>
        
        </thead>
        <tbody>
        	@foreach($cancel_registry as $data)
        <tr id="hover">
            <td>{{ $data->cancel_date }}</td>
            <td>{{ $data->cancel_orsnum }} </td>
            <td>{{ $data->cancel_payee }}</td>
            <td>{{ $data->cancel_rc }}</td>
            <td>{{ $data->cancel_pap }}</td>
            <td>{{ $data->cancel_uacs }}</td>
            <td>{{ $data->cancel_amount }}</td>
            <td>{{ $data->cancel_particulars }}</td>
            <td>{{ $data->cancel_subaccode }}</td>
            <td>{{ $data->cancel_subamount }}</td>
            <td>{{ $data->cancel_remarks }}</td>
            
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ csrf_field() }}
    </div>
</div>
</div>
</div>



<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-header" data-background-color="gray">
    <h4 class="title">Cancelled BURS Registries</h4>
    <p class="category">Finance Registries Stored</p>
    </div>
    <div class="card-content table-responsive">
    <table class="table" id="table2">
        <thead class="text-primary">
        <th><b>Date</b></th>
        <th><b>ORS</b></th>
        <th><b>Payee</b></th>
        <th><b>Responsibility Center</b></th>
        <th><b>PAP</th>
        <th><b>UACS</b></th>
        <th><b>Amount</b></th>
        <th><b>Particulars</b></th>
        <th><b>Sub Account Code</b></th>
        <th><b>Sub Amount</b></th>
        <th><b>Remarks</b></th>
        
        </thead>
        <tbody>
        	@foreach($cancel_registry2 as $data2)
        <tr id="hover">
            <td>{{ $data2->cancel_date }}</td>
            <td>{{ $data2->cancel_orsnum }} </td>
            <td>{{ $data2->cancel_payee }}</td>
            <td>{{ $data2->cancel_rc }}</td>
            <td>{{ $data2->cancel_pap }}</td>
            <td>{{ $data2->cancel_uacs }}</td>
            <td>{{ $data2->cancel_amount }}</td>
            <td>{{ $data2->cancel_particulars }}</td>
            <td>{{ $data2->cancel_subaccode }}</td>
            <td>{{ $data2->cancel_subamount }}</td>
            <td>{{ $data2->cancel_remarks }}</td>
            
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ csrf_field() }}
    </div>
</div>
</div>
</div>

@endsection()

<script>
$(document).ready(function() {
$('#table1').DataTable(
    {

    });
 $('#table2').DataTable(
    {

    });

} );
</script>