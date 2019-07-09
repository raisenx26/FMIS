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
             output += '<td>' + data[count].reg_date + '</td>';
             output += '<td>' + data[count].reg_orsnum + '</td>';
             output += '<td>' + data[count].reg_ + '</td></tr>';
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