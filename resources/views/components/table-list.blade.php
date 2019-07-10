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
</style>
@section('content')

<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="#47d5ffeb">
    <h4 class="title">Filter Registries</h4>
    <p class="category">Total Records - <b><span id="total_records"></span></b></p>

        <div class="input-group input-daterange" id="dates">
           <input type="date" name="from_date" id="from_date" readonly class="form-control" />
           <div class="input-group-addon" id="to">to</div>
           <input type="date"  name="to_date" id="to_date" readonly class="form-control" />
       </div>

        <button type="button" name="filter" id="filter" class="btn btn-primary btn-sm3">Filter</button>
       <button type="button" name="refresh" id="refresh" class="btn btn-danger btn-sm3">Reset Filter</button>

  </div>


<!--       <div class="col-md-5">

      </div>

      <div class="col-md-2" id="filters">

      </div>
 -->
  <div class="card-content table-responsive">
            <table class="table">
                    <thead class="text-primary">
                          <tr>
                           <th>Date</th>
                           <th>ORS #</th>
                           <th>Payee</th>
                           <th>Residential Center</th>
                           <th>PAP</th>
                           <th>UACS</th>
                           <th>Amount</th>
                           <th>Particulars</th>
                           <th>Sub-Account code</th>
                           <th>Amount</th>
                           <th>Remarks</th>
                          </tr>
                    </thead>
                    <tbody>
                          <tbody>
                                  <td>  

                                  </td>
                           </tbody>
                    </tbody>
                </table>
                {{ csrf_field() }}
      </div>
    </div>
  </div>
</div>
@endsection()

<script>
$(document).ready(function(){

 var date = new Date();

 $('.input-daterange').datepicker({
  todayBtn: 'linked',
  format: 'yyyy-mm-dd',
  autoclose: true
 });

 var _token = $('input[name="_token"]').val();

 fetch_data();

 function fetch_data(from_date = '', to_date = '')
 {
  $.ajax({
   url:"{{ route('daterange.fetch_data') }}",
   method:"POST",
   data:{from_date:from_date, to_date:to_date, _token:_token},
   dataType:"json",
   success:function(data)
   {
    var output = '';
    $('#total_records').text(data.length);
    for(var count = 0; count < data.length; count++)
    { 
      
      output += '<tr id="hover">';
      output += '<td>' + data[count].reg_date + '</td>';
      output += '<td>' + data[count].reg_orsnum + '</td>';
      output += '<td>' + data[count].reg_payee + '</td>';
      output += '<td>' + data[count].reg_rc + '</td>';
      output += '<td>' + data[count].reg_pap + '</td>';
      output += '<td>' + data[count].reg_uacs + '</td>';
      output += '<td>' + data[count].reg_amount + '</td>';
      output += '<td>' + data[count].reg_particulars + '</td>';
      output += '<td>' + data[count].reg_subaccode + '</td>';
      output += '<td>' + data[count].reg_amount + '</td>';
      output += '<td>' + data[count].reg_remarks + '</td> </tr>';
    

    }
     
    $('tbody').html(output);

   }

  })
 }

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  if(from_date != '' &&  to_date != '')
  {
   fetch_data(from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  fetch_data();
 });


});
</script>


