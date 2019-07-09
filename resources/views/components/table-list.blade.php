@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" data-background-color="#47d5ffeb">
				<h4 class="title">Simple Table</h4>
				<p class="category">Here is a subtitle for this table</p>
			</div>
			<div class="card-content table-responsive">
				<table class="table">
					<thead class="text-primary">
						<th>Name</th>
						<th>Country</th>
						<th>City</th>
						<th>Salary</th>
					</thead>
					<tbody>
						<tr>
							<td>Dakota Rice</td>
							<td>Niger</td>
							<td>Oud-Turnhout</td>
							<td class="text-primary">$36,738</td>
						</tr>
						<tr>
							<td>Minerva Hooper</td>
							<td>Curaçao</td>
							<td>Sinaai-Waas</td>
							<td class="text-primary">$23,789</td>
						</tr>
						<tr>
							<td>Sage Rodriguez</td>
							<td>Netherlands</td>
							<td>Baileux</td>
							<td class="text-primary">$56,142</td>
						</tr>
						<tr>
							<td>Philip Chaney</td>
							<td>Korea, South</td>
							<td>Overland Park</td>
							<td class="text-primary">$38,735</td>
						</tr>
						<tr>
							<td>Doris Greene</td>
							<td>Malawi</td>
							<td>Feldkirchen in Kärnten</td>
							<td class="text-primary">$63,542</td>
						</tr>
						<tr>
							<td>Mason Porter</td>
							<td>Chile</td>
							<td>Gloucester</td>
							<td class="text-primary">$78,615</td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="card card-plain">
			<div class="card-header" data-background-color="#47d5ffeb">
				<h4 class="title">Table on Plain Background</h4>
				<p class="category">Here is a subtitle for this table</p>
			</div>
			<div class="card-content table-responsive">
				<table class="table table-hover">
					<thead>
						<th>ID</th>
						<th>Name</th>
						<th>Salary</th>
						<th>Country</th>
						<th>City</th>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Dakota Rice</td>
							<td>$36,738</td>
							<td>Niger</td>
							<td>Oud-Turnhout</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Minerva Hooper</td>
							<td>$23,789</td>
							<td>Curaçao</td>
							<td>Sinaai-Waas</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Sage Rodriguez</td>
							<td>$56,142</td>
							<td>Netherlands</td>
							<td>Baileux</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Philip Chaney</td>
							<td>$38,735</td>
							<td>Korea, South</td>
							<td>Overland Park</td>
						</tr>
						<tr>
							<td>5</td>
							<td>Doris Greene</td>
							<td>$63,542</td>
							<td>Malawi</td>
							<td>Feldkirchen in Kärnten</td>
						</tr>
						<tr>
							<td>6</td>
							<td>Mason Porter</td>
							<td>$78,615</td>
							<td>Chile</td>
							<td>Gloucester</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
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
           url:"{{ route('registries.fetch_data') }}",
           method:"POST",
           data:{from_date:from_date, to_date:to_date, _token:_token},
           dataType:"json",
           success:function(data)
           {
            var output = '';
            $('#total_records').text(data.length);
            for(var count = 0; count < data.length; count++)
            {
             output += '<tr>';
             output += '<td>' + data[count].post_title + '</td>';
             output += '<td>' + data[count].post_description + '</td>';
             output += '<td>' + data[count].date + '</td></tr>';
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