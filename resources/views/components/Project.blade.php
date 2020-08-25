<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">



@extends('layouts.app')
<style>
td {
font-size: 9.5px;
}

#hover:hover {
background-color: #9ae9f3;

}

* {
font-size: 12px;
}

#table_parinfo th 
{
    
  padding: 15px;
  text-align: left;

}
#table_parinfo td 
{
    
  padding: 15px;
  text-align: left;

}


.float {


position: sticky;
width: 60px;
height: 60px;
bottom: 40px;
right: 40px;
background-color: #4285f4;
color: #FFF;
border-radius: 50px;
text-align: center;
box-shadow: 2px 2px 3px #999;
float: right;


}


.my-float {
margin-top: 22px;
}

.float:hover {
background-color: #065ef1;
}

#bots,
#subz,
#close {
float: right;
}

</style>


<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">


<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

@section('content')
<div class="row">
<div class="col-md-51">
<div class="card">
    <div class="card-header" data-background-color="#47d5ffeb">
    <h4 class="title">Create Program/Project</h4>
    <p class="category">Program/Project Registry stored</p>
    </div>
    <div class="card-content table-responsive">
    <table class="table" id="table">
        <thead class="text-primary">
        <th><b>Project Title</b></th>
        <th><b>Project Fund Source</b><th>
        <th><b>Local Travel</b></th>
        <th><b>Foreign Travel</b></th>
        <th><b>Training Expenses</b></th>
        <th><b>Office Supplies Expenses</b></th>
        <th><b>Accountable Forms Expenses</b></th>
        <th><b>Drugs & Medicine Expenses</b></th>
        <th><b>Medical, Dental & Laboratory Supplies</b></th>
        <th><b>Fuel, Oil & Lubricants Expenses</b></th>
        <th><b>Semi-expendable Expenses-Machinery</b></th>
        <th><b>Other Supplies & Materials Expenses</b></th>
        <th><b>Water</b></th>
        <th><b>Electricity</b></th>
        <th><b>Postage & Courier Services</b></th>
        <th><b>Telephone (Mobile)</b></th>
        <th><b>Telephone (Landline)</b></th>
        <th><b>Internet Subscription Expenses</b></th>
        <th><b>Extraordinary and Misc. Expenses</b></th>
        <th><b>Legal Services</b></th>
        <th><b>Auditing Services</b></th>
        <th><b>Consultancy Services</b></th>
        <th><b>Other Professional Services</b></th>
        <th><b>Janitorial Services</b></th>
        <th><b>Security Services</b></th>
        <th><b>Other General Services</b></th>
        <th><b>Land Improvements</b></th>
        <th><b>Building & Other Structures</b></th>
        <th><b>Office Equipment</b></th>
        <th><b>ICT Equipment</b></th>
        <th><b>Communication Equipment</b></th>
        <th><b>Printing Equipment</b></th>
        <th><b>Technical & Scientific Equipment</b></th>
        <th><b>Transportation Equipment</b></th>
        <th><b>Furnitures & Fixtures</b></th>
        <th><b>Subsidy-Others</b></th>
        <th><b>Local GIA</b></th>
        <th><b>SETUP</b></th>
        <th><b>Taxes, Duties and Licenses</b></th>
        <th><b>Fidelity Bond Premiums</b></th>
        <th><b>Insurance Expenses</b></th>
        <th><b>Advertising Expenses</b></th>
        <th><b>Printing and Publication Expenses</b></th>
        <th><b>Representation Expenses</b></th>
        <th><b>Transportation & Delivery Expenses</b></th>
        <th><b>Building & Structures</b></th>
        <th><b>Equipment</b></th>
        <th><b>Motor Vehicles</b></th>
        <th><b>Subscription Expenses</b></th>
        <th><b>Other MOOE</b></th>
        <th><b>Transportation and Equipment-Motor Vehicle</b></th>
        <th><b>Action</b></th>
        </thead>
        <tbody>
        @foreach($project as $data)
        <tr id="hover">
            <td>{{ $data->project_title }}</td>
            <td>{{ $data->projectfund_source }}</td>
            <td>{{ $data->local_travel }}</td>
            <td>{{ $data->foreign_travel }}</td>
            <td>{{ $data->training_expense }}</td>
            <td>{{ $data->officesupplies_expense }}</td>
            <td>{{ $data->accountableforms_expense }}</td>
            <td>{{ $data->drugsmedicine_expense }}</td>
            <td>{{ $data->mdl_supplies }}</td>
            <td>{{ $data->fol_expense }}</td>
            <td>{{ $data->semiexpendable_expense }}</td>
            <td>{{ $data->osm_expense }}</td>
            <td>{{ $data->water }}</td>
            <td>{{ $data->electricity }}</td>
            <td>{{ $data->postagecourier_service }}</td>
            <td>{{ $data->mobile }}</td>
            <td>{{ $data->landline }}</td>
            <td>{{ $data->internetsub_expense }}</td>
            <td>{{ $data->extramisc_expense }}</td>
            <td>{{ $data->legal_service }}</td>
            <td>{{ $data->auditing_service }}</td>
            <td>{{ $data->consultancy_service }}</td>
            <td>{{ $data->otherprofessional_service }}</td>
            <td>{{ $data->janitorial_service }}</td>
            <td>{{ $data->security_service }}</td>
            <td>{{ $data->othergeneral_service }}</td>
            <td>{{ $data->land_improvement }}</td>
            <td>{{ $data->building_otherstructure }}</td>
            <td>{{ $data->office_equipment }}</td>
            <td>{{ $data->ict_equipment }}</td>
            <td>{{ $data->comms_equipment }}</td>
            <td>{{ $data->printing_equipment }}</td>
            <td>{{ $data->techsci_equipment }}</td>
            <td>{{ $data->transpo_equipment }}</td>
            <td>{{ $data->furniture_fixture }}</td>
            <td>{{ $data->other_subsidy }}</td>
            <td>{{ $data->local_gia }}</td>
            <td>{{ $data->setup }}</td>
            <td>{{ $data->taxduties_license }}</td>
            <td>{{ $data->fidelitybond_premiums }}</td>
            <td>{{ $data->insurance_expense }}</td>
            <td>{{ $data->advertising_expense }}</td>
            <td>{{ $data->printingpub_expense }}</td>
            <td>{{ $data->representation_expense }}</td>
            <td>{{ $data->transpodelivery_expense }}</td>
            <td>{{ $data->building_structure }}</td>
            <td>{{ $data->equipment }}</td>
            <td>{{ $data->motor_vehicle }}</td>
            <td>{{ $data->subscription_expense }}</td>
            <td>{{ $data->other_mooe }}</td>
            <td>{{ $data->transpoequipment_motorvehicle }}</td>
            <td>
            <a href="#" data-toggle="modal" title="Edit" data-target="#exampleModal-{{ $data->project_id }}"><i
                class="material-icons">edit</i></a>
            {{csrf_field()}}
            {{ method_field('GET') }}
            <a href="{{ route('cancel_project', $data->project_id) }}" title="Delete" OnClick="return confirm('Are you sure you want to delete this Program/Project?')"><i
                class="fa fa-ban fa-lg"></i></a>
            {{csrf_field()}}
            {{ method_field('GET') }}
            {{--  <a OnClick="return confirm('Are you sure you want to delete?')"
                href="{{ route('projectdelete', $data->project_id) }}"><i class="material-icons">delete</i></a>
            {{csrf_field()}}
            {{ method_field('GET') }}  --}}
            <a href="#" title="Print" data-target="#exampleModal5-{{ $data->project_id }}" data-toggle="modal" target="_blank"><i
                class="material-icons">print</i></a>
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
<a data-toggle="modal" data-target="#exampleModal2" class="float" title="Add Program/Project">
<i id="add" class="fa fa-plus my-float"></i>
</a>


@endsection()

<script>
$(document).ready(function() {
$('#table').DataTable(
    {

    });

} );
</script>
<!-- Modal for EDIT PROJECT -->
@foreach($project as $data)
    <div class="modal fade" id="exampleModal-{{ $data->project_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT PROGRAM/PROJECT :  {{ $data->project_title }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    <div class="modal-body">
    <form method="POST" action="{{ URL::route('projectupdate',['code'=>$data->project_id]) }}">

        


        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
                <label class="label-control"><b>Project Title</b></label>
                <div>
                <input id="project_title" name="project_title" type="input" required="required" class="form-control" value="{{ $data->project_title }}" />
                </div>
        </div>
    
        <div class="form-group">
        <label class="label-control"><b>Local Travel</b></label>
        <div>
        <input id="local_travel" name="local_travel" type="input" required="required" class="form-control" value="{{ $data->local_travel }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Foreign Travel</b></label>
        <div>
        <input id="foreign_travel" name="foreign_travel" type="input" required="required" class="form-control" value="{{ $data->foreign_travel }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Training Expense</b></label>
        <div>
        <input id="training_expense" name="training_expense" type="input" required="required" class="form-control" value="{{ $data->training_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Office Supplies Expenses</b></label>
        <div>
        <input id="officesupplies_expense" name="officesupplies_expense" type="number" required="required" class="form-control" value="{{ $data->officesupplies_expense }}" />
        </div>
        </div>

        
        <div class="form-group">
        <label class="label-control"><b>Accountable Forms Expenses</b></label>
        <div>
        <input id="accountableforms_expense" name="accountableforms_expense" type="input" required="required" class="form-control" value="{{ $data->accountableforms_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Drugs & Medicine Expenses</b></label>
        <div>
        <input id="drugsmedicine_expense" name="drugsmedicine_expense" type="input" required="required" class="form-control" value="{{ $data->drugsmedicine_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Medical, Dental & Laboratory Supplies</b></label>
        <div>
        <input id="mdl_supplies" name="mdl_supplies" type="input" required="required" class="form-control" value="{{ $data->mdl_supplies }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Fuel, Oil & Lubricants Expenses</b></label>
        <div>
        <input id="fol_expense" name="fol_expense" type="input" required="required" class="form-control" value="{{ $data->fol_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Semi-expendable Expenses - Machinery</b></label>
        <div>
        <input id="semiexpendable_expense" name="semiexpendable_expense" type="input" required="required" class="form-control" value="{{ $data->semiexpendable_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Other Supplies & Materials Expenses</b></label>
        <div>
        <input id="osm_expense" name="osm_expense" type="input" required="required" class="form-control" value="{{ $data->osm_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Water</b></label>
        <div>
        <input id="water" name="water" type="input" required="required" class="form-control" value="{{ $data->water }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Electricity</b></label>
        <div>
        <input id="electricity" name="electricity" type="input" required="required" class="form-control" value="{{ $data->electricity }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Postage & Courier Services</b></label>
        <div>
        <input id="postagecourier_service" name="postagecourier_service" type="input" required="required" class="form-control" value="{{ $data->postagecourier_service }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Telephone (Mobile)</b></label>
        <div>
        <input id="mobile" name="mobile" type="input" required="required" class="form-control" value="{{ $data->mobile }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Telephone (Landline)</b></label>
        <div>
        <input id="landline" name="landline" type="input" required="required" class="form-control" value="{{ $data->landline }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Internet Subscription Expenses</b></label>
        <div>
        <input id="internetsub_expense" name="internetsub_expense" type="input" required="required" class="form-control" value="{{ $data->internetsub_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Extraordinary and Misc. Expenses</b></label>
        <div>
        <input id="extramisc_expense" name="extramisc_expense" type="input" required="required" class="form-control" value="{{ $data->extramisc_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Legal Services</b></label>
        <div>
        <input id="legal_service" name="legal_service" type="input" required="required" class="form-control" value="{{ $data->legal_service }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Auditing Services</b></label>
        <div>
        <input id="auditing_service" name="auditing_service" type="input" required="required" class="form-control" value="{{ $data->auditing_service }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Consultancy Services</b></label>
        <div>
        <input id="consultancy_service" name="consultancy_service" type="input" required="required" class="form-control" value="{{ $data->consultancy_service }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Other Professional Services</b></label>
        <div>
        <input id="otherprofessional_service" name="otherprofessional_service" type="input" required="required" class="form-control" value="{{ $data->otherprofessional_service }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Janitorial Services</b></label>
        <div>
        <input id="janitorial_service" name="janitorial_service" type="input" required="required" class="form-control" value="{{ $data->janitorial_service }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Security Services</b></label>
        <div>
        <input id="security_service" name="security_service" type="input" required="required" class="form-control" value="{{ $data->security_service }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Other General Services</b></label>
        <div>
        <input id="othergeneral_service" name="othergeneral_service" type="input" required="required" class="form-control" value="{{ $data->othergeneral_service }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Land Improvements</b></label>
        <div>
        <input id="land_improvement" name="land_improvement" type="input" required="required" class="form-control" value="{{ $data->land_improvement }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Building & Other Structures</b></label>
        <div>
        <input id="building_otherstructure" name="building_otherstructure" type="input" required="required" class="form-control" value="{{ $data->building_otherstructure }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Office Equipment</b></label>
        <div>
        <input id="office_equipment" name="office_equipment" type="input" required="required" class="form-control" value="{{ $data->office_equipment }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>ICT Equipment</b></label>
        <div>
        <input id="ict_equipment" name="ict_equipment" type="input" required="required" class="form-control" value="{{ $data->ict_equipment }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Communication Equipment</b></label>
        <div>
        <input id="comms_equipment" name="comms_equipment" type="input" required="required" class="form-control" value="{{ $data->comms_equipment }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Printing Equipment</b></label>
        <div>
        <input id="printing_equipment" name="printing_equipment" type="input" required="required" class="form-control" value="{{ $data->drugsmedicprinting_equipmentine_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Technical & Scientific Equipment</b></label>
        <div>
        <input id="techsci_equipment" name="techsci_equipment" type="input" required="required" class="form-control" value="{{ $data->techsci_equipment }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Transportation Equipment</b></label>
        <div>
        <input id="transpo_equipment" name="transpo_equipment" type="input" required="required" class="form-control" value="{{ $data->transpo_equipment }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Furnitures & Fixtures</b></label>
        <div>
        <input id="furniture_fixture" name="furniture_fixture" type="input" required="required" class="form-control" value="{{ $data->furniture_fixture }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Subsidy-Others</b></label>
        <div>
        <input id="other_subsidy" name="other_subsidy" type="input" required="required" class="form-control" value="{{ $data->other_subsidy }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Local GIA</b></label>
        <div>
        <input id="local_gia" name="local_gia" type="input" required="required" class="form-control" value="{{ $data->local_gia }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Setup</b></label>
        <div>
        <input id="setup" name="setup" type="input" required="required" class="form-control" value="{{ $data->setup }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Taxes, Duties and Licenses</b></label>
        <div>
        <input id="taxduties_license" name="taxduties_license" type="input" required="required" class="form-control" value="{{ $data->taxduties_license }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Fidelity Bond Premiums</b></label>
        <div>
        <input id="fidelitybond_premiums" name="fidelitybond_premiums" type="input" required="required" class="form-control" value="{{ $data->fidelitybond_premiums }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Insurance Expenses</b></label>
        <div>
        <input id="insurance_expense" name="insurance_expense" type="input" required="required" class="form-control" value="{{ $data->insurance_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Advertising Expenses</b></label>
        <div>
        <input id="advertising_expense" name="advertising_expense" type="input" required="required" class="form-control" value="{{ $data->advertising_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Printing and Publication Expenses</b></label>
        <div>
        <input id="printingpub_expense" name="printingpub_expense" type="input" required="required" class="form-control" value="{{ $data->printingpub_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Representation Expenses</b></label>
        <div>
        <input id="representation_expense" name="representation_expense" type="input" required="required" class="form-control" value="{{ $data->representation_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Transportation & Delivery Expenses</b></label>
        <div>
        <input id="transpodelivery_expense" name="transpodelivery_expense" type="input" required="required" class="form-control" value="{{ $data->transpodelivery_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Building & Structures</b></label>
        <div>
        <input id="building_structure" name="building_structure" type="input" required="required" class="form-control" value="{{ $data->building_structure }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Equipment</b></label>
        <div>
        <input id="equipment" name="equipment" type="input" required="required" class="form-control" value="{{ $data->equipment }}" />
        </div>
        </div>
        <div class="form-group">
        <label class="label-control"><b>Motor Vehicles</b></label>
        <div>
        <input id="motor_vehicle" name="motor_vehicle" type="input" required="required" class="form-control" value="{{ $data->motor_vehicle }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Subscription Expenses</b></label>
        <div>
        <input id="subscription_expense" name="subscription_expense" type="input" required="required" class="form-control" value="{{ $data->subscription_expense }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Other MOOE</b></label>
        <div>
        <input id="other_mooe" name="other_mooe" type="input" required="required" class="form-control" value="{{ $data->other_mooe }}" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Transportation Equipment - Motor Vehicle</b></label>
        <div>
        <input id="transpoequipment_motorvehicle" name="transpoequipment_motorvehicle" type="input" required="required" class="form-control" value="{{ $data->transpoequipment_motorvehicle }}" />
        </div>
        </div>

    <button id="subz" name="submit" type="submit"  class="btn btn-primary">Save Changes</button>
    <button  id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
        </div>
    <div class="modal-footer">
        </div>
        </div>
    </div>
    </div>
@endforeach
<!-- END Modal for EDIT PROJECT -->

<!-- Modal for ADD PROJECT -->
<div class="modal fade fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div  class="modal-content">
    <div  id="headermodal" class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"><b>Add new Program/Project</b></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <form method="POST" action="{{ URL::to('/projectformstore') }}">
        {{ csrf_field() }}


        {{-- Project Fund Source --}}
        <div class="form-inline">
            <label class="label-control"><b>Project Fund Source</b></label>
            <div>
            <select id="lib_id" name="lib_id" class="selectpicker form-control edit" data-live-search="true">

                    @foreach($project as $p)
                    <option value="{{$p->project_title}}"> {{$p->project_title}}</option>
                    @endforeach 
            
        
            </select>
        <input type="text" class="form-control" id="project_title" name="project_title2">
            </div>
        </div>

    <div class="form-group">
        <label class="label-control"><b>Project Title</b></label>
        <input id="project_title" name="project_title" type="input" required="required" class="form-control" />
    </div>

    <div class="form-group">
        <label class="label-control"><b>Local Travel</b></label>
        <div>
        <input id="local_travel" name="local_travel" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Foreign Travel</b></label>
        <div>
        <input id="foreign_travel" name="foreign_travel" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Training Expense</b></label>
        <div>
        <input id="training_expense" name="training_expense" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Office Supplies Expenses</b></label>
        <div>
        <input id="officesupplies_expense" name="officesupplies_expense" type="number" required="required" class="form-control" />
        </div>
        </div>

        
        <div class="form-group">
        <label class="label-control"><b>Accountable Forms Expenses</b></label>
        <div>
        <input id="accountableforms_expense" name="accountableforms_expense" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Drugs & Medicine Expenses</b></label>
        <div>
        <input id="drugsmedicine_expense" name="drugsmedicine_expense" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Medical, Dental & Laboratory Supplies</b></label>
        <div>
        <input id="mdl_supplies" name="mdl_supplies" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Fuel, Oil & Lubricants Expenses</b></label>
        <div>
        <input id="fol_expense" name="fol_expense" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Semi-expendable Expenses - Machinery</b></label>
        <div>
        <input id="semiexpendable_expense" name="semiexpendable_expense" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Other Supplies & Materials Expenses</b></label>
        <div>
        <input id="osm_expense" name="osm_expense" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Water</b></label>
        <div>
        <input id="water" name="water" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Electricity</b></label>
        <div>
        <input id="electricity" name="electricity" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Postage & Courier Services</b></label>
        <div>
        <input id="postagecourier_service" name="postagecourier_service" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Telephone (Mobile)</b></label>
        <div>
        <input id="mobile" name="mobile" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Telephone (Landline)</b></label>
        <div>
        <input id="landline" name="landline" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Internet Subscription Expenses</b></label>
        <div>
        <input id="internetsub_expense" name="internetsub_expense" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Extraordinary and Misc. Expenses</b></label>
        <div>
        <input id="extramisc_expense" name="extramisc_expense" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Legal Services</b></label>
        <div>
        <input id="legal_service" name="legal_service" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Auditing Services</b></label>
        <div>
        <input id="auditing_service" name="auditing_service" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Consultancy Services</b></label>
        <div>
        <input id="consultancy_service" name="consultancy_service" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Other Professional Services</b></label>
        <div>
        <input id="otherprofessional_service" name="otherprofessional_service" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Janitorial Services</b></label>
        <div>
        <input id="janitorial_service" name="janitorial_service" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Security Services</b></label>
        <div>
        <input id="security_service" name="security_service" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Other General Services</b></label>
        <div>
        <input id="othergeneral_service" name="othergeneral_service" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Land Improvements</b></label>
        <div>
        <input id="land_improvement" name="land_improvement" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Building & Other Structures</b></label>
        <div>
        <input id="building_otherstructure" name="building_otherstructure" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Office Equipment</b></label>
        <div>
        <input id="office_equipment" name="office_equipment" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>ICT Equipment</b></label>
        <div>
        <input id="ict_equipment" name="ict_equipment" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Communication Equipment</b></label>
        <div>
        <input id="comms_equipment" name="comms_equipment" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Printing Equipment</b></label>
        <div>
        <input id="printing_equipment" name="printing_equipment" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Technical & Scientific Equipment</b></label>
        <div>
        <input id="techsci_equipment" name="techsci_equipment" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Transportation Equipment</b></label>
        <div>
        <input id="transpo_equipment" name="transpo_equipment" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Furnitures & Fixtures</b></label>
        <div>
        <input id="furniture_fixture" name="furniture_fixture" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Subsidy-Others</b></label>
        <div>
        <input id="other_subsidy" name="other_subsidy" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Local GIA</b></label>
        <div>
        <input id="local_gia" name="local_gia" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Setup</b></label>
        <div>
        <input id="setup" name="setup" type="input" required="required" class="form-control"/>
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Taxes, Duties and Licenses</b></label>
        <div>
        <input id="taxduties_license" name="taxduties_license" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Fidelity Bond Premiums</b></label>
        <div>
        <input id="fidelitybond_premiums" name="fidelitybond_premiums" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Insurance Expenses</b></label>
        <div>
        <input id="insurance_expense" name="insurance_expense" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Advertising Expenses</b></label>
        <div>
        <input id="advertising_expense" name="advertising_expense" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Printing and Publication Expenses</b></label>
        <div>
        <input id="printingpub_expense" name="printingpub_expense" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Representation Expenses</b></label>
        <div>
        <input id="representation_expense" name="representation_expense" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Transportation & Delivery Expenses</b></label>
        <div>
        <input id="transpodelivery_expense" name="transpodelivery_expense" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Building & Structures</b></label>
        <div>
        <input id="building_structure" name="building_structure" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Equipment</b></label>
        <div>
        <input id="equipment" name="equipment" type="input" required="required" class="form-control" />
        </div>
        </div>
        <div class="form-group">
        <label class="label-control"><b>Motor Vehicles</b></label>
        <div>
        <input id="motor_vehicle" name="motor_vehicle" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Subscription Expenses</b></label>
        <div>
        <input id="subscription_expense" name="subscription_expense" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Other MOOE</b></label>
        <div>
        <input id="other_mooe" name="other_mooe" type="input" required="required" class="form-control" />
        </div>
        </div>

        <div class="form-group">
        <label class="label-control"><b>Transportation Equipment - Motor Vehicle</b></label>
        <div>
        <input id="transpoequipment_motorvehicle" name="transpoequipment_motorvehicle" type="input" required="required" class="form-control" />
        </div>
        </div>



    
 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button name="submit" type="submit"  class="btn btn-primary">Add Program/Project</button>
    </form>
    </div>
</div>
</div>
</div>



