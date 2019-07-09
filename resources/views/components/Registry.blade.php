@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-12">
<div class="card">
	<div class="card-header" data-background-color="#47d5ffeb">
		<h4 class="title">Registries</h4>
		<p class="category">Finance Registries Stored</p>
	</div>
	<div class="card-content table-responsive">
            <table class="table">
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
                        <th><b>Action</b></th>
                    </thead>
                    <tbody>
                            @foreach($rc_data as $data)
                            <tr id="hover" data-toggle="modal" data-target=".bd-example-modal-xl"{{--  "{{ route('printdata',$data) }}"  --}} >
                                    <td>{{ $data->reg_date }}</td>
                                    <td>{{ $data->reg_orsnum }}</td>
                                    <td>{{ $data->reg_payee }}</td>
                                    <td>{{ $data->reg_rc }}</td>
                                    <td>{{ $data->reg_pap }}</td>
                                    <td>{{ $data->reg_uacs }}</td>
                                    <td>{{ $data->reg_amount }}</td>
                                    <td>{{ $data->reg_particulars }}</td>
                                    <td>{{ $data->reg_subcode }}</td>
                                    <td>{{ $data->reg_amount }}</td>
                                    <td>{{ $data->reg_remarks }}</td>
                                    <td>
                                                <a href="{{ route('printdata',$data->reg_refnum) }}"><i class="material-icons">edit</i></a>
                                                {{csrf_field()}}
                                                {{ method_field('GET') }}
                                                <a href="{{ route('printdata',$data->reg_refnum) }}"><i class="material-icons">delete</i></a>
                                                {{csrf_field()}}
                                                {{ method_field('GET') }}
                                                <a href="{{ route('printdata',$data->reg_refnum) }}"><i class="material-icons">print</i></a>
                                                {{csrf_field()}}
                                                {{ method_field('GET') }}
                                    </td>
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
