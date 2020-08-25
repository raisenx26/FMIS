@extends('layouts.app')
<style>
    td {
        font-size: 9.5px;
    }

    #hover:hover {
        background-color: #9ae9f3;

    }

    #pdf {
        float: right;
        padding-top: 30px;
        padding-right: 10px;
    }

    #pdf:hover {
        color: black;
    }

      #total {
        padding-left: 20px;
        padding-top: 20px;
    }
    #rc_label
    {
        color: white;
    }
    #burs_back
    {
        background-color: #2878e2;
    }
    #burs_tr
    {
        color: #2878e2;
    }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>



<script type="text/javascript" src="{{ URL::asset('js/jspdf.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.3.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/pdfFromHTML.js') }}"></script>

@section('content')

<!-- filter table for BURS -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" id="burs_back">
                <h4 class="title">Filter BURS registries</h4>
                <!-- <p class="category">Total Records - <b><span id="total_records"></span></b></p> -->

                <div class="input-group input-daterange" id="dates">
                    <input type="date" name="from_date" id="from_date" readonly class="form-control" />
                    <div class="input-group-addon" id="to">to</div>
                    <input type="date" name="to_date" id="to_date" readonly class="form-control" />

                </div>

                <div class="form-group ">
                    <label id="rc_label" for="reg_rc" class=" col-form-label"><b>Responsibility Center</b></label>
                    <div class="col-7">
                    <select id="reg_rcz" name="reg_rcz"  class="form-control selectpicker"  >
                        <option></option>
                        @foreach($registry5 as $reg)
                        <option value="{{ $reg->reg_rc }}">{{ $reg->reg_rc }}</option>
                        @endforeach
                      </select>  
                    </div>
                </div>

               
                

                <button type="button" name="filter" id="filter" class="btn btn-primary btn-sm3">Filter</button>
                <button type="button" name="refresh" id="refresh" class="btn btn-danger btn-sm3">Reset Filter</button>
                <a id="pdf" href="#" title="Download PDF" onclick="HTMLtoPDF()">Download PDF</a>

            </div>


            <div id="HTMLtoPDF">
                <div id="total">
                    <p class="category">Total Records - <b><span id="total_records"></span></b></p>
                    <p class="category">Total Amount - <b><span id="total_amount"></span></b></p>
                   
                </div>
                <div class="card-content table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <tr id="burs_tr">
                                <th>Date</th>
                                <th>BURS #</th>
                                <th>Payee</th>
                                <th>Residential Center</th>
                                <th>PAP</th>
                                <th>UACS</th>
                                <th>Amount</th>
                                <th>Particulars</th>
                                <th>Sub-Account code</th>
                                <th>Sub-Amount</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    {{ csrf_field() }}
                </div>
            </div>
        </div>
    </div>
</div>




@endsection()

<script>

    $(document).ready(function () {

        var date = new Date();

        $('.input-daterange').datepicker({
            todayBtn: 'linked',
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        var _token = $('input[name="_token"]').val();

        fetch_data_burs();

        function fetch_data_burs(from_date = '', to_date = '', reg_rcz = '') {
            $.ajax({
                url: "{{ route('daterange.fetch_data_burs') }}",
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    reg_rcz: reg_rcz,
                    _token: _token
                },
                dataType: "json",
                success: function (data) {
                    var output = '';
                     var total_am = 0;
                 
                    $('#total_records').text(data.length);
                    $('#from_date').getdate;
                    for (var count = 0; count < data.length; count++) {

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
                        output += '<td>' + data[count].reg_subamount + '</td>';
                        output += '<td>' + data[count].reg_remarks + '</td> </tr>';
                        total_am += data[count].reg_amount;
                    }
                    
                    $('tbody').html(output);
                    $('#total_amount').text(total_am);

               }

            })
        }

        $('#filter').click(function () {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var reg_rcz = $('#reg_rcz').val();
            if (from_date != '' && to_date != '' ) {
                fetch_data_burs(from_date, to_date, reg_rcz);
            } else {
                alert('Both Date is required');
            }
        });

        $('#refresh').click(function () {
            $('#from_date').val('');
            $('#to_date').val('');
             $('#reg_rcz').val('');
            fetch_data_burs();
        });


    });


</script>



