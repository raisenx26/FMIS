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

    #qwe {
        white-space: pre-wrap;
    }

</style>

<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<style>
    #table th
    {
        color: #2878e2;
    }
    #headerz
    {
        background-color: #2878e2;
    }
</style>

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" id="headerz">
                <h4 class="title">BURS Registry</h4>
                <p class="category">Finance Registries Stored</p>
            </div>
            <div class="card-content table-responsive">
                <table class="table" id="table">
                    <thead class="text-primary" >
                        <th><b>Date</b></th>
                        <th><b>BURS</b></th>
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
                        @foreach($bursregistry as $data)
                        <tr id="hover">
                            <td>{{ $data->reg_date }}</td>
                            <td>{{ $data->reg_orsnum }}</td>
                            <td>{{ $data->reg_payee }}</td>
                            <td>{{ $data->reg_rc }}</td>
                            <td>{{ $data->reg_pap }}</td>
                            <td>{{ $data->reg_uacs }}</td>
                            <td>{{ $data->reg_amount }}</td>
                            <td>{{ $data->reg_particulars }}</td>
                            <td>{{ $data->reg_subaccode }}</td>
                            <td>{{ $data->reg_subamount }}</td>
                            <td>{{ $data->reg_remarks }}</td>
                            <td>
            <a href="#" data-toggle="modal" title="Edit" data-target="#exampleModal-{{ $data->reg_refnum }}"><i
                class="material-icons">edit</i></a>
            {{csrf_field()}}
            {{ method_field('GET') }}
            <a href="{{ route('cancel_burs', $data->reg_refnum) }}" title="Cancel" OnClick="return confirm('Are you sure you want to CANCEL this Registry?')"><i
                class="fa fa-ban fa-lg"></i></a>
            {{csrf_field()}}
            {{ method_field('GET') }}
            {{--  <a OnClick="return confirm('Are you sure you want to delete?')"
                href="{{ route('registrydelete', $data->reg_refnum) }}"><i class="material-icons">delete</i></a>
            {{csrf_field()}}
            {{ method_field('GET') }}  --}}
            <a data-target="#exampleModal5-{{ $data->reg_refnum }}" title="Print" data-toggle="modal" target="_blank"><i
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
<a data-toggle="modal" data-target="#exampleModal2" class="float" title="Add registry">
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
<!-- start modal for add burs_registry -->

<div class="modal fade fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div  class="modal-content">
    <div  id="headermodal" class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"><b>Add new BURS registry</b></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <form method="POST" action="{{ URL::to('/burs_registryformstore') }}">
        {{ csrf_field() }}
    <div class="form-group">
        <label class="label-control"><b>Fund Cluster</b></label>
        <input id="reg_fundcluster" name="reg_fundcluster" type="input" required="required" class="form-control" />
    </div>
    <div class="form-group">
        <label class="label-control"><b>Date</b></label>
        <input id="reg_date" name="reg_date" type="date" required="required" class="form-control datetimepicker" />
    </div>
    <div class="form-inline">
        <label for="reg_ors" class="label-control"><b>BURS</b></label>
            <div>
                    <select id="reg_ors" name="reg_ors"  class="form-control selectpicker">
                        <option value="02-308101/">02-308101</option>
                    </select>
                <input type="text" class="form-control" id="reg_ors2" name="reg_ors2">
                </div>
        </div>
    <div class="form-group ">
    <label for="reg_uacs" class="col-5 col-form-label"><b>Payee</b></label>
    <div class="col-7">
        <input list="reg_payee" name="reg_payee" class="form-control">
        <datalist id="reg_payee">
            @foreach ($burs_payee_data as $payee_data)
            <option value="{{ $payee_data->name }}">{{ $payee_data->name }}</option>
        @endforeach
        </datalist>
    </div>
    </div>
    <!-- <div class="form-group">
        <label class="label-control"><b>Payee address</b></label>
        <input id="reg_payee_address" name="reg_payee_address" type="input" required="required" class="form-control" />
    </div> --> 
    
    <div class="form-group ">
            <label for="reg_rc" class="col-5 col-form-label"><b>Responsibility Center</b></label>
            <div class="col-7">
                <input list="reg_rc" name="reg_rc" class="form-control">
                <datalist id="reg_rc">
                    @foreach ($burs_rc_data as $rc_data)
                    <option value="{{ $rc_data->rc_id }}">{{ $rc_data->rc_id }}</option>
                @endforeach
                </datalist>
            </div>
    </div>


<div class="form-group row">
<label for="reg_pap" class="col-5 col-form-label">PAP</label>
<div class="col-7">
    <input  list="reg_pap" name="reg_pap" class="form-control" value="{{ $data->reg_pap }}"/>
    <datalist id="reg_pap">
        @foreach ($pap_data as $pap)
        <option value="{{ $pap->pap_name }}">{{ $pap->pap_name }}</option>
        @endforeach
    </datalist>
</div>
</div>
    <div class="form-group row">
    <label for="reg_uacs" class="col-5 col-form-label"><b>Unified Accounts Code Structure (UACS)</b></label>
    <div class="col-7">
        <input list="reg_uacs" name="reg_uacs" class="form-control">
        <datalist id="reg_uacs">
            @foreach ($burs_uacs_data as $uacs_data)
            <option value="{{ $uacs_data->uacs_id }}">{{ $uacs_data->uacs_id }}</option>
        @endforeach
        </datalist>
    </div>
    </div>
    <div class="form-group row">
<label for="reg_amount" class="col-5 col-form-label">Amount</label>
<div class="col-7">
    <input id="reg_amount" name="reg_amount" type="text" required="required" v-model = "amount" class="form-control">
</div>
</div>
<div class="form-group row">
<label for="reg_particulars" class="col-5 col-form-label">Particulars</label>
<div class="col-7">
    <input id="reg_particulars" name="reg_particulars" type="text" required="required" class="form-control">
</div>
</div>
<div class="form-group row">
<label for="reg_particulars" class="col-5 col-form-label">Sub-Account Code</label>
<div class="col-7">
    <input  type="text" name="reg_subaccode" id="reg_subaccode" class="form-control "/>
</div>
</div>
<div class="form-group row">
<label for="reg_particulars" class="col-5 col-form-label">Sub-Amount</label>
<div class="col-7">
    <input type="text" name="reg_subamount" id="reg_subamount"  class="form-control"  />
</div>
</div>
<div class="form-group row">
<label for="reg_remarks" class="col-5 col-form-label">Remarks</label>
<div class="col-7">
    <textarea id="reg_remarks" name="reg_remarks" cols="40" rows="3" class="form-control "></textarea>
</div>
</div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button name="submit" type="submit"  class="btn btn-primary">Add Registry</button>
    </form>
    </div>
</div>
</div>
</div>

<!-- end modal for add burs_registry -->

<!-- start modal for edit burs_registry -->


@foreach($bursregistry as $data)
    <div class="modal fade" id="exampleModal-{{ $data->reg_refnum }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT BURS :  {{ $data->reg_payee }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    <div class="modal-body">
    <form method="POST" action="{{ URL::route('burs_registryupdate',['code'=>$data->reg_refnum]) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

                <div class="form-group">
                <label class="label-control"><b>Fund Cluster</b></label>
                <div>
                <input id="reg_fundcuster" name="reg_fundcluster" type="number" required="required" class="form-control datetimepicker" value="{{ $data->reg_fundcluster }}" />
                </div>
                </div>
    
        {{-- Date --}}
        <div class="form-group">
        <label class="label-control"><b>Date</b></label>
        <div>
        <input id="reg_date" name="reg_date" type="date" required="required" class="form-control datetimepicker" value="{{ $data->reg_date }}" />
        </div>
        </div>
        {{-- ORS --}}
            <div class="form-inline">
            <label for="reg_ors" class="label-control"><b>BURS</b></label>
                    <div >
            <select id="reg_ors" name="reg_ors"  class="form-control selectpicker">
                   <option value="02-308101/">02-308101</option>
            </select>
                    @if(strpos($data->reg_orsnum,'02-308101/')!==false)
                    @foreach(explode('02-308101/', $data->reg_orsnum) as $string)
                        @endforeach
                    @endif
               
        <input type="text" class="form-control" id="reg_ors2" name="reg_ors2" value="{{ $string }}">
            </div>
        </div>

        <div class="form-group row">
    <label for="reg_uacs" class="col-5 col-form-label"><b>Payee</b></label>
    <div class="col-7">
        <input list="reg_payee" name="reg_payee" class="form-control" value="{{ $data->reg_payee }}">
        <datalist id="reg_payee">
            @foreach ($burs_payee_data as $payee_burs)
            <option value="{{ $payee_burs->name }}">{{ $payee_burs->name }}</option>
        @endforeach
        </datalist>
    </div>
    </div>

    {{-- res center --}}

            <div class="form-group ">
            <label for="reg_uacs" class="col-5 col-form-label"><b>Responsibility Center</b></label>
            <div class="col-7">
                <input list="reg_rc" name="reg_rc" class="form-control" value="{{ $data->reg_rc }}">
                <datalist id="reg_rc">
                    @foreach ($burs_rc_data as $reg)
                    <option value="{{ $reg->rc_id }}">{{ $reg->rc_id }}</option>
                @endforeach
                </datalist>
            </div>
            </div>
      
        {{-- PAP --}}
                <div class="form-group row">
                <label for="reg_pap" class="col-5 col-form-label">PAP</label>
                            <div class="col-7">
                                <input  list="reg_pap" name="reg_pap" class="form-control" value="{{ $data->reg_pap }}"/>
                                <datalist id="reg_pap">
                                    @foreach ($pap_data as $pap)
                                    <option value="{{ $pap->pap_name }}">{{ $pap->pap_name }}</option>
                                    @endforeach
                                </datalist>
                </div>
            </div>


                <div class="form-group row">
    <label for="reg_uacs" class="col-5 col-form-label"><b>Unified Accounts Code Structure (UACS)</b></label>
    <div class="col-7">
        <input list="reg_uacs" name="reg_uacs" class="form-control" value="{{ $data->reg_uacs }}">
        <datalist id="reg_uacs">
            @foreach ($burs_uacs_data as $uacs)
            <option value="{{ $uacs->uacs_id }}">{{ $uacs->uacs_id }}</option>
        @endforeach
        </datalist>
    </div>
    </div>
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

<div class="form-group row">
<label for="reg_amount" class="col-5 col-form-label">Amount</label>
<div class="col-7">
    <input id="reg_amount" name="reg_amount" type="text"  value="{{ $data->reg_amount }}"  class="form-control">
    
</div>
</div>

<div class="form-group row">
<label for="reg_particulars" class="col-5 col-form-label">Particulars</label>
<div class="col-7">
    <input id="reg_particulars" name="reg_particulars"  value="{{ $data->reg_particulars }}" type="text" required="required" class="form-control">
</div>
</div>
<div class="form-group row">
<label for="reg_particulars" class="col-5 col-form-label">Sub-Account Code</label>
<div class="col-7">
    <input  type="text" name="reg_subaccode" id="reg_subaccode" class="form-control" value="{{ $data->reg_subaccode }}" />
</div>
</div>
<div class="form-group row">
        <label for="reg_particulars" class="col-5 col-form-label">Sub-Amount</label>
        <div class="col-7">
            <input type="text" name="reg_subamount" id="reg_subamount"  class="form-control"  value="{{ $data->reg_subamount }}" />
        </div>
        </div>
    <div class="form-group row">
<label for="reg_remarks" class="col-5 col-form-label">Remarks</label>
<div class="col-7">
    <textarea id="reg_remarks" name="reg_remarks" cols="40" rows="3"  class="form-control ">{{$data->reg_remarks}}</textarea>
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
<!-- END Modal for EDIT Registry -->


<!-- modal for print -->

@foreach($bursregistry as $data)
    <div class="modal fade bd-example-modal-lg" id="exampleModal5-{{ $data->reg_refnum }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PRINT FOR:  {{ $data->reg_payee }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    <div class="modal-body">
    <form method="GET" action="{{ route('burs_printdata',$data->reg_refnum) }}">
    {{csrf_field()}}
    {{ method_field('GET') }}
          <div class="form-inline">
            <label for="reg_ors" class="label-control"><b>BURS No:</b></label>
            <div>
                    <select id="reg_ors" name="reg_ors"  class="form-control selectpicker">
                         <option value="02-308101/">02-308101</option>
                    </select>
                    @if(strpos($data->reg_orsnum,'01-101101/')!==false)
                        @foreach(explode('01-101101/', $data->reg_orsnum) as $string)
                        @endforeach
                @endif
                    @if(strpos($data->reg_orsnum,'02-101101/')!==false)
                            @foreach(explode('02-101101/', $data->reg_orsnum) as $string)
                            @endforeach
                    @endif
                <input id="reg_date" name="reg_date" type="date" required="required" class="form-control datetimepicker" value="{{ $data->reg_date }}" />
                <input type="text" class="form-control" id="print_reg_ors2" name="print_reg_ors2" value="{{ $string }}">
            </div>
        </div> 
        <h3 for="reg_pap" class="col-5 col-form-label"><b>Payee's information</b></h3>
        <div class="col-7">
            <label for="reg_office" class="label-control"><b>Office:</b></label>
        </div>
        <div class="col-7">
            <input  type="text" name="reg_office" id="reg_office" class="form-control "/>
        </div>
        <div class="col-7">
            <label for="reg_address" class="label-control"><b>Address:</b></label>
        </div>
        <div class="col-7">
            <input  type="text" name="reg_address" id="reg_address" class="form-control "/>
        </div>

     <div class="form-group row">
         <label for="reg_remarks" class="col-5 col-form-label"><b>Particulars additional info </b></label>
            <div class="col-7">
                <table id="table_parinfo" >
                    <tr>
                      <td><div contenteditable><input type="text" name="par1" placeholder="UACS" class="form-control"></div></td>
                      <td><div contenteditable><input type="text" name="par2" value="ACTUAL" class="form-control"></div></td>
                      <td><div contenteditable><input type="text" name="par3" value="1st" class="form-control"></div></td>
                      <td><div contenteditable><input type="text" name="par4" value="Difference" class="form-control"></div></td>
                    </tr>
                    <tr>
                      <td><div contenteditable><input type="text" name="par5" class="form-control"></div></td>
                      <td><div contenteditable><input type="text" name="par6" class="form-control"></div></td>
                      <td><div contenteditable><input type="text" name="par7" class="form-control"></div></td>
                      <td><div contenteditable><input type="text" name="par8" class="form-control"></div></td>
                    </tr>
                    <tr>
                      <td><div contenteditable><input type="text" name="par9" class="form-control"></div></td>
                      <td><div contenteditable><input type="text" name="par10" class="form-control"></div></td>
                      <td><div contenteditable><input type="text" name="par11" class="form-control"></div></td>
                      <td><div contenteditable><input type="text" name="par12" class="form-control"></div></td>
                    </tr>
                    <tr>
                        <td><div contenteditable><input type="text" name="par13" placeholder="Total" class="form-control"></div></td>
                        <td><div contenteditable><input type="text" name="par14" class="form-control"></div></td>
                        <td><div contenteditable><input type="text" name="par15" class="form-control"></div></td>
                        <td><div contenteditable><input type="text" name="par16" class="form-control"></div></td>
                      </tr>
                  </table>
            </div>
        </div>

        <div class="form-group row">
                <h3 for="reg_pap" class="col-5 col-form-label"><b>Asignatories</b></h3>
                    <div class="col-7">
                    <label for="reg_pap" class="col-5 col-form-label"><b>Name</b></label>
            <select id="asignatories_name" name="asignatories_name" required="required" class="form-control selectpicker" >
                    @foreach($burs_asignatories as $asig)
                        <option value="{{ $asig->asignatories_name }}">{{ $asig->asignatories_name }}</option>
                        {{ $asig->asignatories_pos }}
                        @endforeach
            </select>

<!--             <label for="reg_pap" class="col-5 col-form-label"><b>Position</b></label>
            <select id="asignatories_pos" name="asignatories_pos" required="required" class="form-control selectpicker" >
                    @foreach($burs_asignatories as $asig)
                        <option value="{{ $asig->asignatories_pos }}">{{ $asig->asignatories_pos }}</option>
                        @endforeach
            </select> -->
                </div>
            </div>
            <h3 for="reg_pap" class="col-5 col-form-label"><b>Balance</b></h3>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                <input class="form-check-input" type="radio" id="radio1" name="option" value="notyetdue"> Not Yet Due
                <span class="form-check-sign">
                    <span class="check"></span>
                </span>
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                <input class="form-check-input" type="radio" id="radio2" name="option" value="dueanddemandable"> Due and demandable
                <span class="form-check-sign">
                    <span class="check"></span>
                </span>
                </label>
            </div>
                    <button id="subz" name="submit" type="submit"  class="btn btn-primary" target="_blank">Print now</button>
                    <button  id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
        </div>
    <div class="modal-footer">
        </div>
        </div>
    </div>
    </div>

@endforeach
<!-- end modal for print -->