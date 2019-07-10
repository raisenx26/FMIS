@extends('layouts.app')

<script src="{{ mix('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
*{padding:0;margin:0;}

body{
  font-family:Verdana, Geneva, sans-serif;
  font-size:18px;
  background-color:#CCC;
}

.float{
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#0C9;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  box-shadow: 2px 2px 3px #999;
}

.my-float{
  margin-top:22px;
}
    *{padding:0;margin:0;}

body{
  font-family:Verdana, Geneva, sans-serif;
  font-size:18px;
  background-color:#CCC;
}

.float{
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#0C9;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  box-shadow: 2px 2px 3px #999;
}

.my-float{
  margin-top:22px;
}
.form_content
{
width: 80%;
margin: auto;
}

#ref
{

  margin-left: auto;
}
label{
    font-weight: bold;
}
</style>
<!-- <script type="text/javascript" >
    function showfield(name){
      if(name=='other')document.getElementById('div1').innerHTML='<label class="mr-3">Custom Payee</label> <input type="text" name="other"  class="form-control "/>';
      else document.getElementById('div1').innerHTML='';
    }
    function showBreak(name){
      if(name=='4')document.getElementById('div2').innerHTML='<label class="mr-3">Sub-Account code</label> <input type="text" name="subaccount"  class="form-control "/>';
      else if(name=='5')document.getElementById('div2').innerHTML='<label class="mr-3">Sub-Account code</label> <input type="text" name="subaccount"  class="form-control "/> ';
      else if(name=='6')document.getElementById('div2').innerHTML='<label class="mr-3">Sub-Account code</label> <input type="text" name="subaccount"  class="form-control "/> ';
      else if(name=='7')document.getElementById('div2').innerHTML='<label class="mr-3">Sub-Account code</label> <input type="text" name="subaccount"  class="form-control "/>  ';
      else document.getElementById('div2').innerHTML='';
    }
</script> -->
@section('content')
<div class="grid-container">
<div class="form_content">

<form method="POST" action="{{ URL::to('registryupdate',Request::segment(2)) }}">
    {{ csrf_field() }}  
    {{ method_field('PATCH') }}

      <div class="card-header" data-background-color="#47d5ffeb">
      <h3 class="title">Edit registry to ID:{{ $editdata->reg_refnum }}</h3>
  </div>

    <div class="form-row">
{{-- date field --}}
            

            <div class="form-group">
            <label class="label-control"><b>Date</b></label>
            <div>
            <input id="reg_date" name="reg_date" type="date" required="required" class="form-control datetimepicker" value="{{ $editdata->reg_date }}" />
            </div>
        </div>

{{-- ors field--}}

            <div class="form-inline">
             <label for="reg_ors" class="label-control"><b>Obligation Request and Status</b></label>
              <div >
                    <select id="reg_ors" name="reg_ors"  class="form-control selectpicker">
                    <option value="01-101101/">01-101101</option>
                    <option value="02-101101/">02-101101</option>
                    </select>
                    @if(strpos($editdata->reg_orsnum,'01-101101/')!==false)
                        @foreach(explode('01-101101/', $editdata->reg_orsnum) as $string)
                        @endforeach
                    @endif
                    @if(strpos($editdata->reg_orsnum,'02-101101/')!==false)
                        @foreach(explode('02-101101/', $editdata->reg_orsnum) as $string)
                        @endforeach
                    @endif
                <input type="text" class="form-control" id="reg_ors2" name="reg_ors2" value="{{ $string }}">

              </div>
           </div>




     <div class="form-group ">
        <label for="reg_uacs" class="col-5 col-form-label"><b>Payee</b></label>
        <div class="col-7">
          <input list="reg_payee" name="reg_payee" class="form-control" value="{{ $editdata->reg_payee }}">
          <datalist id="reg_payee">
             @foreach ($payee_data as $payee_data)
                <option value="{{ $payee_data->name }}">{{ $editdata->payee_data }}</option>
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
          @foreach ($rc_data as $rc)
            <option value="{{ $rc->description }}">{{ $rc->description }}</option>
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
          <input list="reg_uacs" name="reg_uacs" class="form-control" value="{{ $editdata->reg_uacs }}">
          <datalist id="reg_uacs">
             @foreach ($uacs_data as $uacs_data)
                <option value="{{ $uacs_data->id }}">{{ $uacs_data->id }}</option>
            @endforeach
          </datalist>

        </div>
      </div>




  {{ csrf_field() }}
   <div class="form-group row">
    <label for="reg_amount" class="col-5 col-form-label">Amount</label>
    <div class="col-7">
      <input id="reg_amount" name="reg_amount" type="number"  value="{{ $editdata->reg_amount }}" required="required" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="reg_particulars" class="col-5 col-form-label">Particulars</label>
    <div class="col-7">
      <input id="reg_particulars" name="reg_particulars"  value="{{ $editdata->reg_particulars }}" type="text" required="required" class="form-control">
    </div>
  </div>

<div class="form-group row">
    <label for="reg_particulars" class="col-5 col-form-label">Sub-Account Code</label>
    <div class="col-7">
      <input  type="text" name="subaccount" id="subaccount" class="form-control" value="{{ $editdata->reg_subacccode }}" />
    </div>
  </div>
 

     <div class="form-group row">
    <label for="reg_amount" class="col-5 col-form-label">Sub Amount</label>
    <div class="col-7">
      <input id="reg_amount2" name="reg_amount2" type="number"  value="{{ $editdata->reg_amount }}" required="required" class="form-control">
    </div>
  </div>


     <div class="form-group row">
    <label for="reg_remarks" class="col-5 col-form-label">Remarks</label>
    <div class="col-7">
      <textarea id="reg_remarks" name="reg_remarks" cols="40" rows="3"  value="{{ $editdata->reg_remarks }}" class="form-control "></textarea>
    </div>
  </div>


  <div class="form-group row">
    <div class="offset-5 col-7">
       <button type="button" class="btn btn-secondary"><a href="/components/Registry">Cancel</a></button>
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>

{{--  <script>
    var appendinput = $("reg_ors");
    var orsinput = $("reg_ors2");
    var appendorsinput = appendinput.val(appendinput.val() + orsinput);

</script>  --}}
{{--  <script>
    $(document).ready(function(){
        $('.dynamic').change(function(){
            if($(this).val() != ''){
                var select() = $(this).attr("id")
                var value() = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $(input[name='_token']).val();
                $.ajax({
                    url:"{{ route('registryformstore') }}",
                    method:"POST",
                    data:{select:select,value:value,
                        _token:_token,dependent:dependent}
                        success:function(result){
                            $('#'+dependent).html(result);
                        }
                })
            }
        });
    });
</script>  --}}
@endsection
