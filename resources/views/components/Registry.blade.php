@extends('layouts.app')
<style>
    td
    {
        font-size: 9.5px;
    }

    #hover:hover
    {
        background-color: #9ae9f3;

    }

 .float{

    position: -webkit-sticky;
    position: sticky;
    width:60px;
    height:60px;
    bottom:40px;
    right:40px;
    background-color:#4285f4;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    box-shadow: 2px 2px 3px #999;
    float: right;
}


.my-float{
    margin-top:22px;
}

.float:hover
{
    background-color: #065ef1;
}
</style>
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
                        <th>Date</th>
                        <th>ORS</th>
                        <th>Payee</th>
                        <th>Responsibility Center</th>
                        <th>PAP</th>
                        <th>UACS</th>
                        <th>Amount</th>
                        <th>Particulars</th>
                        <th>Sub Account Code</th>
                        <th>Sub Amount</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                            @foreach($registry as $data)
                            <tr id="hover" {{--  "{{ route('printdata',$data) }}"  --}} >
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
                                                <a href="{{ route('registry.edit',$registry1) }}"><i class="material-icons">edit</i></a>
                                                {{csrf_field()}}
                                                {{ method_field('GET') }}
                                                <a href="{{ route('registrydelete',$data->reg_refnum) }}"><i class="material-icons">delete</i></a>
                                                {{csrf_field()}}
                                                {{ method_field('GET') }}
                                                <a href="{{ route('printdata',$registry1) }}"><i class="material-icons">print</i></a>
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
<a data-toggle="modal" data-target=".bd-example-modal-lg" class="float" title="Add registry">
    <i  id="add" class="fa fa-plus my-float"></i>
</a>
<ul class="pagination pagination-primary">
    <li></li>{{ $registry->links() }}
</ul>

@endsection()
 <!-- Modal -->


 <div class="modal fade fade bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Add new registry</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- MODAL CONTENT START -->
        <form method="POST" action="{{ URL::to('/registryformstore') }}">
            {{ csrf_field() }}


        <div class="form-group">

            <label class="label-control"><b>Date</b></label>

            <input id="reg_date" name="reg_date" type="date" required="required" class="form-control datetimepicker" />
        </div>


        <div class="form-inline">

            <label for="reg_ors" class="label-control"><b>Obligation Request and Status</b></label>
               <div>
                      <select id="reg_ors" name="reg_ors"  class="form-control selectpicker">
                         <option value="01-101101/">01-101101</option>
                         <option value="02-101101/">02-101101</option>
                     </select>
                    <input type="text" class="form-control" id="reg_ors2" name="reg_ors2">
                </div>
         </div>

     <div class="form-group ">
        <label for="reg_uacs" class="col-5 col-form-label"><b>Payee</b></label>
        <div class="col-7">
          <input list="reg_payee" name="reg_payee" class="form-control">
          <datalist id="reg_payee">
             @foreach ($payee_data as $payee_data)
                <option value="{{ $payee_data->name }}">{{ $payee_data->name }}</option>
            @endforeach
          </datalist>

        </div>
      </div>


      {{-- res center --}}
<div class="form-group">
    <label for="reg_rc" class="col-5 col-form-label"><b>Responsibility Center</b></label>
    <div class="col-7">
      <select id="reg_rc" name="reg_rc" required="required" class="form-control selectpicker" >
          {{--  data from Responsibility Centers Table  --}}
          @foreach ($rc_data as $rc_data)
            <option value="{{ $rc_data->description }}">{{ $rc_data->description }}</option>
          @endforeach
      </select>
    </div>
  </div>

      <div class="form-group row">
    <label for="reg_pap" class="col-5 col-form-label">PAP</label>
    <div class="col-7">
      <select id="reg_pap" name="reg_pap" required="required" class="form-control selectpicker" data-dependent = "reg_uacs" >
            <option value="A.3.C.1 303010000">A.3.C.1 303010000</option>
            <option value="A.3.C.2  303020000">A.3.C.2  303020000</option>
            <option value="A.3.b.1  302010000">A.3.b.1  302010000</option>
      </select>
    </div>
  </div>



     <div class="form-group row">
        <label for="reg_uacs" class="col-5 col-form-label"><b>Unified Accounts Code Structure (UACS)</b></label>
        <div class="col-7">
          <input list="reg_uacs" name="reg_uacs" class="form-control">
          <datalist id="reg_uacs">
             @foreach ($uacs_data as $uacs_data)
                <option value="{{ $uacs_data->id }}">{{ $uacs_data->id }}</option>
            @endforeach
          </datalist>

        </div>
      </div>

        <div class="form-group row">
    <label for="reg_amount" class="col-5 col-form-label">Amount</label>
    <div class="col-7">
      <input id="reg_amount" name="reg_amount" type="number" required="required" v-model = "amount" class="form-control">
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
      <input  type="text" name="subaccount" id="subaccount" class="form-control "/>
    </div>
  </div>

  <div class="form-group row">
    <label for="reg_particulars" class="col-5 col-form-label">Sub-Amount</label>
    <div class="col-7">
      <input type="number" name="regamount2" id="regamount2"  v-model = "amount" class="form-control" disabled />
    </div>
  </div>

    <div class="form-group row">
    <label for="reg_remarks" class="col-5 col-form-label">Remarks</label>
    <div class="col-7">
      <textarea id="reg_remarks" name="reg_remarks" cols="40" rows="3" class="form-control "></textarea>
    </div>
  </div>




            <!-- BUTTONS IN FORM -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button name="submit" type="submit" class="btn btn-primary">Add Registry</button>
        </form>


            <!-- MODAL CONTENT END -->
      </div>

    </div>
  </div>
</div>
