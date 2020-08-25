@extends('layouts.app')

<style>
	#to
	{
		padding-left: 10px;
		padding-right: 10px;
	}
  #print_button
  {
    float:right;
  }
  #class_name
  {
    display: none;
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

</style>

@section('content')

<div id="create_monthly">
<h3>Monthly Summary<h3>
</div>

<button name="submit" title="Add new" data-toggle="modal" data-target="#exampleModal2" class="btn btn-primary"><i class="fa fa-plus my-float"></i>  Add New</button>


<div class="row">
  <div class="col-md-12">
  <div class="card">
      <div class="card-header" data-background-color="#47d5ffeb" style="opacity:0.8">
      <h4 class="title">Authorized Appropriations & Allotment Recieved</h4>
      <p class="category"></p>
      </div>
      <div class="card-content table-responsive">
      <table class="table" id="monthly_table">
          <thead class="text-primary">
          <th><b>ID</b></th>
          <th><b>Date</b></th>
          <th><b>Action</b></th>
          </thead>
          <tbody>
          @foreach($monthly as $data)
          <tr id="hover">
              <td>{{ $data->monthly_id }}</td>
              <td>{{ $data->monthly_date }}</td>
              <td>
              <a href="{{ route('monthly.edit',$data->monthly_id)}}" title="Print"><i
                  class="material-icons">print</i></a>
              {{csrf_field()}}
              <a OnClick="return confirm('Are you sure you want to delete?')"
                href="{{ route('monthlydelete', $data->monthly_id) }}" title="Delete"><i class="material-icons">delete</i></a>
            {{csrf_field()}}
              </td>
          </tr>
          @endforeach
          </tbody>
      </table>
      </div>
  </div>
  </div>
  </div>

  {{-- <a data-toggle="modal" data-target="#exampleModal2" class="float" title="Add registry">
  <i id="add" class="fa fa-plus my-float"></i>
  </a>
 --}}



@endsection

<!-- Modal for add new monthly summary -->
<div class="modal fade fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" style="width:1250px;">
    <div  class="modal-content">
        <div  id="headermodal" class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Add New Monthly Summary</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{ URL::to('/monthly_store') }}">
          {{ csrf_field() }}
  <div class="form-inline">
        <label  class="label-control"><b>Date</b></label>
        <input id="from_date" name="from_date" type="date" required="required" class="form-control datetimepicker" />
        </div>

<div class="container">       
  <table class="table table-bordered">
    <thead>
      <tr>
        <th><b>P/A/P Allotment Class/Object of Expenditures (1)</b></th>
        <th><b>UACS code</b></th>
        <th><b>Authorized Appropriations</b></th>
        <th><b>Allotment Recieved (2)</b></th>
      </tr>
    </thead>
    <tbody>
     <tr>
      <td rowspan="1" id="description">
          <b>Regional S & T Services</b>
        <br>
        <br>
         <b><u>Personal Services</u></b>
        <br>
            Salaries and Wages - Regular Pay
        <br>
     </td>
      <td rowspan="1">
       <br>
       <br>
       <br>
            50101010  01
      </td>
      </td>
      <td rowspan="1">
       <br>
       <br>
       <br>
            <input name="aa_salaries" class="form-control">
      </td>
      <td rowspan="1">
       <br>
       <br>
       <br>
            <input name="ar_salaries" class="form-control">
      </td>
      </tr>


      <tr>
      <td id="description">
      <b><u>Other Compensation</u></b>
      <br> 
      Personal Eco. Relief Allo. (PERA)
      <br>
      <br>
      Representation Allowance (RA)
      <br>
      <br>
      Transportation Allowance (TA)
      <br>
      <br>
      Clothing/Uniform Allowance
      <br>
      <br>
      Year-end Bonus
      <br>
      <br>
      Cash Gift
      <br>
      <br>
      <b>MIDYEAR BONUS</b>
      <br>
      <br>
      Productivity Enhancement Incentive
      <br>
      <br>
      Pag-ibig Contributions
      <br>
      <br>
      PHILHEALTH Contribution
      <br>
      <br>
      ECC Contribution
    </td>
    <td>
       <br>
        50102010 01
        <br>
        <br>
        50102020 00
        <br>
        <br>
        50102030 01
        <br>
        <br>
        50102040 01
        <br>
        <br>
        50102140 01
        <br>
        <br>
        50102150 01
        <br>
        <br>
        <br>
        <br>
        50102990 12
        <br>
        <br>
        50103020 01
        <br>
        <br>
        50103030 01
        <br>
        <br>
        50103040 01
    </td>


    <td>
    
    <input name="aa_pera" class="form-control">
    <input name="aa_ra" class="form-control">
    <input name="aa_ta" class="form-control">
    <input name="aa_clothing" class="form-control">
    <input name="aa_year_end" class="form-control">
    <input name="aa_cash" class="form-control">
    <br>
    <br>
    <br>
    <input name="aa_productivity" class="form-control">
    <input name="aa_pag_ibig" class="form-control">
    <input name="aa_philheath" class="form-control">
    <input name="aa_ecc" class="form-control">
    </td>
    <td>
    
    <input name="ar_pera" class="form-control">
    <input name="ar_ra" class="form-control">
    <input name="ar_ta" class="form-control">
    <input name="ar_clothing" class="form-control">
    <input name="ar_year_end" class="form-control">
    <input name="ar_cash" class="form-control">
    <br>
    <br>
    <br>
    <input name="ar_productivity" class="form-control">
    <input name="ar_pag_ibig" class="form-control">
    <input name="ar_philheath" class="form-control">
    <input name="ar_ecc" class="form-control">
    </td>
  </tr>

   <tr>
    <td id="description">
        <b><u>MC Benifit</u></b>
        <br>
        Subsistence
        <br>
        <br>
        Laundry Allowance
        <br>
        <br>
        Hazard Allowance
        <br>
        <br>
        Longevity Pay
    </td>
    <td>
        <br>
        50102050 02
        <br>
        <br>
        50102060 03
        <br>
        <br>
        50102110 04
        <br>
        <br>
        50102120 03
        <br>
    </td>
     <td>
        <input name="aa_subsistence" class="form-control">
        <input name="aa_laundry" class="form-control">
        <input name="aa_hazard" class="form-control">
        <input name="aa_longevity" class="form-control">
    </td>
     <td>
        <input name="ar_subsistence" class="form-control">
        <input name="ar_laundry" class="form-control">
        <input name="ar_hazard" class="form-control">
        <input name="ar_longevity" class="form-control">
    </td>
  </tr>
  <tr>
    <td id="description">
        <b><u>Pension and Gratuity Fund</u></b>
        <br> 
        Terminal Leave Benefits
        <br>
    </td>
    <td>
      <br>
      50104990 99
      <br>
    </td>
    <td>
      <br>
      <input name="aa_terminal" class="form-control">
      <br>
    </td>
    <td>
      <br>
      <input name="ar_terminal" class="form-control">
      <br>
    </td>
  </tr>
  <tr>
    <td id="description">
        <b><u>Automatic Appropriation</u></b>
        <br> 
        RLIP
        <br>
    </td>
    <td>
      <br>
      50103010 00
      <br>
    </td>
    <td>
      <br>
      <input name="aa_rlip" class="form-control">
      <br>
    </td>
    <td>
      <br>
      <input name="ar_rlip" class="form-control">
      <br>
    </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
      <td id="description">
        <br>
          <b><u>Maintance and other Operating Exps.</u></b>
          <br> 
          Traveling Expenses - Local
          <br>
          <br>
          Traveling Expenses - Foreign
          <br>
          <br>
          Training expenses
          <br>
          <br>
          Office Supplies Expenses
          <br>
          <br>
          Accountable Forms Expenses
          <br>
          <br>
          Drugs and Medicine Expenses
          <br>
          <br>
          Medical, Dental and Lab. Supplies Expe.
          <br>
          <br>
          Fuel, Oil and Lubricants Expenses
          <br>
          <br>
          Semi-Expendable exp.-Machinery
          <br>
          <br>
          Semi-Expendable exp.-Office Equipment
          <br>
          <br>
          Semi-Expendable exp.-Information and Communun.
          <br>
          <br>
          Semi-Expendable exp.-Commun. Technology
          <br>
          <br>
          Semi-Expendable exp.-Disaster Response and 
          <br>
          <br>
          Semi-Expendable exp.-Other Machinery & Equipment
          <br>
          <br>
          Other Supplies & Materials Expenses
          <br>
          <br>
          Water Expenses
          <br>
          <br>
          Electricity Expenses
          <br>
          <br>
          Postage and Deliveries
          <br>
          <br>
          Telephone Expenses - Mobile
          <br>
          <br>
          Telephone Expenses - Landline
          <br>
          <br>
          Inernet Expenses
          <br>
          <br>
          Extraordinary Expenses
          <br>
          <br>
          Miscellaneous Expenses
          <br>
          <br>
          Legal services
          <br>
          <br>
          Auditing Services
          <br>
          <br>
          Consultancy Services
          <br>
          <br>
          Other Professional Expenses
          <br>
          <br>
          Janitorial Expenses
          <br>
          <br>
          Security Expenses
          <br>
          <br>
          Other General Services
          <br>
          <br>
          Repair & Maint. - Other Land Improvements
      </td>
      <td>
          <br>
          <br>
            50201010 00
            <br>
            <br>
            50201020 00
            <br>
            <br>
            50202010 00
            <br>
            <br>
            50203010 00
            <br>
            <br>
            50203020 00
            <br>
            <br>
            50203070 00
            <br>
            <br>
            50203080 00
            <br>
            <br>
            50203090 00
            <br>
            <br>
            5020321001
            <br>
            <br>
            5020321002
             <br>
             <br>
            5020321003
            <br>
            <br>
            5020321007
            <br>
            <br>
            5020321008
            <br>
            <br>
            5020321099
            <br>
            <br>
            50203990 00
            <br>
            <br>
            50204010 00
            <br>
            <br>
            50204020 00
            <br>
            <br>
            50205010 00
            <br>
            <br>
            50205020 01
            <br>
            <br>
            50205020 02
            <br>
            <br>
            50205030 00
            <br>
            <br>
            50210030 00
            <br>
            <br>
            50210030 00
            <br>
            <br>
            50211010 00
            <br>
            <br>
            50211020 00
            <br>
            <br>
            50211030 00
            <br>
            <br>
            50211990 00
            <br>
            <br>
            50212020 00
            <br>
            <br>
            50212030 00
            <br>
            <br>
            50212990 00
            <br>
            <br>
            50213020 99
        </td>
        <td>
          
            <input name="aa_local" class="form-control">
            <input name="aa_foreign" class="form-control">
            <input name="aa_training" class="form-control">
            <input name="aa_office" class="form-control">
            <input name="aa_accountable" class="form-control">
            <input name="aa_drugs" class="form-control">
            <input name="aa_medical" class="form-control">
            <input name="aa_fuel" class="form-control">
            <input name="aa_semi_machinery" class="form-control">
            <input name="aa_semi_office" class="form-control">
            <input name="aa_semi_information" class="form-control">
            <input name="aa_semi_communication" class="form-control">
            <input name="aa_semi_disaster" class="form-control">
            <input name="aa_semi_other" class="form-control">
            <input name="aa_other_supp" class="form-control">
            <input name="aa_water" class="form-control">
            <input name="aa_electricity" class="form-control">
            <input name="aa_postage" class="form-control">
            <input name="aa_telephone_mobile" class="form-control">
            <input name="aa_telephone_landline" class="form-control">
            <input name="aa_internet" class="form-control">
            <input name="aa_extraordinary" class="form-control">
            <input name="aa_miscellaneous" class="form-control">
            <input name="aa_legal" class="form-control">
            <input name="aa_auditing" class="form-control">
            <input name="aa_consultancy" class="form-control">
            <input name="aa_other_prof" class="form-control">
            <input name="aa_janitor" class="form-control">
            <input name="aa_security" class="form-control">
            <input name="aa_other_general" class="form-control">
            <input name="aa_repair_other" class="form-control">
         </td>
         <td>
            <input name="ar_local" class="form-control">
            <input name="ar_foreign" class="form-control">
            <input name="ar_training" class="form-control">
            <input name="ar_office" class="form-control">
            <input name="ar_accountable" class="form-control">
            <input name="ar_drugs" class="form-control">
            <input name="ar_medical" class="form-control">
            <input name="ar_fuel" class="form-control">
            <input name="ar_semi_machinery" class="form-control">
            <input name="ar_semi_office" class="form-control">
            <input name="ar_semi_information" class="form-control">
            <input name="ar_semi_communication" class="form-control">
            <input name="ar_semi_disaster" class="form-control">
            <input name="ar_semi_other" class="form-control">
            <input name="ar_other_supp" class="form-control">
            <input name="ar_water" class="form-control">
            <input name="ar_electricity" class="form-control">
            <input name="ar_postage" class="form-control">
            <input name="ar_telephone_mobile" class="form-control">
            <input name="ar_telephone_landline" class="form-control">
            <input name="ar_internet" class="form-control">
            <input name="ar_extraordinary" class="form-control">
            <input name="ar_miscellaneous" class="form-control">
            <input name="ar_legal" class="form-control">
            <input name="ar_auditing" class="form-control">
            <input name="ar_consultancy" class="form-control">
            <input name="ar_other_prof" class="form-control">
            <input name="ar_janitor" class="form-control">
            <input name="ar_security" class="form-control">
            <input name="ar_other_general" class="form-control">
            <input name="ar_repair_other" class="form-control">
         </td>
  </tr>
  <tr>
      <td id="description">
            Repair & Main. - Building & Structures
            <br>
            <br>
            Repair & Maint. - Machineries & Equipment
            <br>
            <br>
            Repair & Maint. - Office Equipment
            <br>
            <br>
            Repair & Maint. - ICT Equipment
            <br>
            <br>
            Repair & Maint. - Communication Equipment
            <br>
            <br>
            Repair & Maint. - Technical & Scientific
            <br>
            <br>
            Repair & Maint. - Transportation Equipment
            <br>
            <br>
            Repair & Maint. - Furniture & Fixtures
            <br>
            <br>
            Subsidies-Others
            <br>
            <br>
            <b>Local GIA</b>
            <br>
            <br>
            <b>SETUP</b>
      </td>
      <td>
            50213040 01
            <br>
            <br>
            50213050 00
            <br>
            <br>
            50213050 02
            <br>
            <br>
            50213050 03
            <br>
            <br>
            50213050 07
            <br>
            <br>
            50213050 14
            <br>
            <br>
            50213060 01
            <br>
            <br>
            50213070 00
            <br>
            <br>
            50214990 00
            <br>
            <br>
            50214990 00
            <br>
            <br>
            50214990 00
      </td>
      <td>  
          <input name="aa_rm_building" class="form-control">
          <input name="aa_rm_machineries" class="form-control">
          <input name="aa_rm_Office" class="form-control">
          <input name="aa_rm_ict" class="form-control">
          <input name="aa_rm_commercial" class="form-control">
          <input name="aa_rm_technical" class="form-control">
          <input name="aa_rm_transportation" class="form-control">
          <input name="aa_rm_furnitures" class="form-control">
          <input name="aa_subsidies" class="form-control" disabled>
          <input name="aa_local_gia" class="form-control">
          <input name="aa_setup" class="form-control">
      </td>
      <td>  
          <input name="ar_rm_building" class="form-control">
          <input name="ar_rm_machineries" class="form-control">
          <input name="ar_rm_Office" class="form-control">
          <input name="ar_rm_ict" class="form-control">
          <input name="ar_rm_commercial" class="form-control">
          <input name="ar_rm_technical" class="form-control">
          <input name="ar_rm_transportation" class="form-control">
          <input name="ar_rm_furnitures" class="form-control">
          <input name="ar_subsidies" class="form-control" disabled>
          <input name="ar_local_gia" class="form-control">
          <input name="ar_setup" class="form-control">
      </td>
  <tr>     
  <tr>
      <td id="description">
            Taxes, Duties and Licenses
            <br>
            <br>
            Fidelity Bond Premiums
            <br>
            <br>
            Insurance Expenses
            <br>
            <br>
            Advertising Expenses
            <br>
            <br>
            Printing and Binding Services
            <br>
            <br>
            Representation Expenses
            <br>
            <br>
            Transportation and Delivery Expenses
            <br>
            <br>
            Rent Expenses - Building
            <br>
            <br>
            Rent Expenses - Motor Vehicles
            <br>
            <br>
            Rent Expenses - Equipment
            <br>
            <br>
            Membership Dues & Conts. to Org'ns.
            <br>
            <br>
            Subscription Expenses
            <br>
            <br>
            Other MOOE
      </td>
      <td>
            50215010 01
            <br>
            <br>
            50215020 00
            <br>
            <br>
            50215030 00
            <br>
            <br>
            50299010 00
            <br>
            <br>
            50299020 00
            <br>
            <br>
            50299030 00
            <br>
            <br>
            50299040 00
            <br>
            <br>
            50299050 01
            <br>
            <br>
            50299050 03
            <br>
            <br>
            50299050 04
            <br>
            <br>
            50299060 00
            <br>
            <br>
            50299070 00
            <br>
            <br>
            50299990 99
      </td>
      <td>  
          <input name="aa_taxes" class="form-control">
          <input name="aa_fidelity" class="form-control">
          <input name="aa_insurance" class="form-control">
          <input name="aa_advertising" class="form-control">
          <input name="aa_printing" class="form-control">
          <input name="aa_representation" class="form-control">
          <input name="aa_transportation" class="form-control">
          <input name="aa_rent_building" class="form-control">
          <input name="aa_rent_motor" class="form-control">
          <input name="aa_rent_equipment" class="form-control">
          <input name="aa_membership" class="form-control">
          <input name="aa_sub" class="form-control">
          <input name="aa_other_mooe" class="form-control">
      </td>
      <td>  
          <input name="ar_taxes" class="form-control">
          <input name="ar_fidelity" class="form-control">
          <input name="ar_insurance" class="form-control">
          <input name="ar_advertising" class="form-control">
          <input name="ar_printing" class="form-control">
          <input name="ar_representation" class="form-control">
          <input name="ar_transportation" class="form-control">
          <input name="ar_rent_building" class="form-control">
          <input name="ar_rent_motor" class="form-control">
          <input name="ar_rent_equipment" class="form-control">
          <input name="ar_membership" class="form-control">
          <input name="ar_sub" class="form-control">
          <input name="ar_other_mooe" class="form-control">
      </td>
  <tr> 
    </tbody>
  </table>
</div>

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button name="submit" type="submit"  class="btn btn-primary">Save</button>
        </form>
     </div>
 </div>
 </div>
 </div>
    
 <!-- END Modal for new monthly summary -->
 <!-- Print Modal for new monthly summary -->
 @foreach($monthly as $data)
    <div class="modal fade" id="exampleModal5-{{ $data->monthly_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width:1250px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PRINT FOR:  {{ $data->monthly_id }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    <div class="modal-body">
      
    <input id="test" disabled value="{{ $data->monthly_id }}">
     
    <form  method="GET" action="{{ route('monthly_summary_print',$data->monthly_id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-inline">
            <label  class="label-control"><b>Date</b></label>
            <input id="from_date" name="from_date" type="date" value="{{ $data->monthly_date }}"  class="form-control datetimepicker" />
            </div>
            
        <div class="container">       
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th><b>P/A/P Allotment Class/Object of Expenditures (1)</b></th>
                  <th><b>UACS code</b></th>
                  <th><b>Authorized Appropriations</b></th>
                  <th><b>Allotment Recieved (2)</b></th>
                </tr>
              </thead>
              <tbody>
               <tr>
                <td rowspan="1" id="description">
                    <b>Regional S & T Services</b>
                  <br>
                  <br>
                   <b><u>Personal Services</u></b>
                  <br>
                      Salaries and Wages - Regular Pay
                  <br>
               </td>
                <td rowspan="1">
                 <br>
                 <br>
                 <br>
                      50101010  01
                </td>
                </td>
                <td rowspan="1">
                 <br>
                 <br>
                 <br>
                      <input name="aa_salaries" class="form-control" value="{{ $data->aa_salaries }}">
                </td>
                <td rowspan="1">
                 <br>
                 <br>
                 <br>
                      <input name="ar_salaries" class="form-control" value="{{ $data->ar_salaries }}">
                </td>
                </tr>
          
          
                <tr>
                <td id="description">
                <b><u>Other Compensation</u></b>
                <br> 
                Personal Eco. Relief Allo. (PERA)
                <br>
                <br>
                Representation Allowance (RA)
                <br>
                <br>
                Transportation Allowance (TA)
                <br>
                <br>
                Clothing/Uniform Allowance
                <br>
                <br>
                Year-end Bonus
                <br>
                <br>
                Cash Gift
                <br>
                <br>
                <b>MIDYEAR BONUS</b>
                <br>
                <br>
                Productivity Enhancement Incentive
                <br>
                <br>
                Pag-ibig Contributions
                <br>
                <br>
                PHILHEALTH Contribution
                <br>
                <br>
                ECC Contribution
              </td>
              <td>
                 <br>
                  50102010 01
                  <br>
                  <br>
                  50102020 00
                  <br>
                  <br>
                  50102030 01
                  <br>
                  <br>
                  50102040 01
                  <br>
                  <br>
                  50102140 01
                  <br>
                  <br>
                  50102150 01
                  <br>
                  <br>
                  <br>
                  <br>
                  50102990 12
                  <br>
                  <br>
                  50103020 01
                  <br>
                  <br>
                  50103030 01
                  <br>
                  <br>
                  50103040 01
              </td>
          
          
              <td>
              
              <input name="aa_pera" class="form-control" value="{{ $data->aa_pera }}">
              <input name="aa_ra" class="form-control" value="{{ $data->aa_ra }}">
              <input name="aa_ta" class="form-control" value="{{ $data->aa_ta }}">
              <input name="aa_clothing" class="form-control" value="{{ $data->aa_clothing }}">
              <input name="aa_year_end" class="form-control" value="{{ $data->aa_year_end }}">
              <input name="aa_cash" class="form-control" value="{{ $data->aa_cash }}">
              <br>
              <br>
              <br>
              <input name="aa_productivity" class="form-control" value="{{ $data->aa_productivity }}">
              <input name="aa_pag_ibig" class="form-control" value="{{ $data->aa_pag_ibig }}">
              <input name="aa_philheath" class="form-control" value="{{ $data->aa_philheath }}">
              <input name="aa_ecc" class="form-control" value="{{ $data->aa_ecc }}">
              </td>
              <td>
              
              <input name="ar_pera" class="form-control" value="{{ $data->ar_pera }}">
              <input name="ar_ra" class="form-control" value="{{ $data->ar_ra }}">
              <input name="ar_ta" class="form-control" value="{{ $data->ar_ta }}">
              <input name="ar_clothing" class="form-control" value="{{ $data->ar_clothing }}">
              <input name="ar_year_end" class="form-control" value="{{ $data->ar_year_end }}">
              <input name="ar_cash" class="form-control" value="{{ $data->ar_cash }}">
              <br>
              <br>
              <br>
              <input name="ar_productivity" class="form-control" value="{{ $data->ar_productivity }}">
              <input name="ar_pag_ibig" class="form-control" value="{{ $data->ar_pag_ibig }}">
              <input name="ar_philheath" class="form-control" value="{{ $data->ar_philheath }}">
              <input name="ar_ecc" class="form-control" value="{{ $data->ar_ecc }}">
              </td>
            </tr>
          
             <tr>
              <td id="description">
                  <b><u>MC Benifit</u></b>
                  <br>
                  Subsistence
                  <br>
                  <br>
                  Laundry Allowance
                  <br>
                  <br>
                  Hazard Allowance
                  <br>
                  <br>
                  Longevity Pay
              </td>
              <td>
                  <br>
                  50102050 02
                  <br>
                  <br>
                  50102060 03
                  <br>
                  <br>
                  50102110 04
                  <br>
                  <br>
                  50102120 03
                  <br>
              </td>
               <td>
                  <input name="aa_subsistence" class="form-control" value="{{ $data->aa_subsistence }}">
                  <input name="aa_laundry" class="form-control" value="{{ $data->aa_laundry }}">
                  <input name="aa_hazard" class="form-control" value="{{ $data->aa_hazard }}">
                  <input name="aa_longevity" class="form-control" value="{{ $data->aa_longevity }}">
              </td>
               <td>
                  <input name="ar_subsistence" class="form-control" value="{{ $data->ar_subsistence }}">
                  <input name="ar_laundry" class="form-control" value="{{ $data->ar_laundry }}">
                  <input name="ar_hazard" class="form-control" value="{{ $data->ar_hazard }}">
                  <input name="ar_longevity" class="form-control" value="{{ $data->ar_longevity }}">
              </td>
            </tr>
            <tr>
              <td id="description">
                  <b><u>Pension and Gratuity Fund</u></b>
                  <br> 
                  Terminal Leave Benefits
                  <br>
              </td>
              <td>
                <br>
                50104990 99
                <br>
              </td>
              <td>
                <br>
                <input name="aa_terminal" class="form-control" value="{{ $data->aa_terminal }}">
                <br>
              </td>
              <td>
                <br>
                <input name="ar_terminal" class="form-control" value="{{ $data->ar_terminal }}">
                <br>
              </td>
            </tr>
            <tr>
              <td id="description">
                  <b><u>Automatic Appropriation</u></b>
                  <br> 
                  RLIP
                  <br>
              </td>
              <td>
                <br>
                50103010 00
                <br>
              </td>
              <td>
                <br>
                <input name="aa_rlip" class="form-control" value="{{ $data->aa_rlip }}">
                <br>
              </td>
              <td>
                <br>
                <input name="ar_rlip" class="form-control" value="{{ $data->ar_rlip }}">
                <br>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
                <td id="description">
                  <br>
                    <b><u>Maintance and other Operating Exps.</u></b>
                    <br> 
                    Traveling Expenses - Local
                    <br>
                    <br>
                    Traveling Expenses - Foreign
                    <br>
                    <br>
                    Training expenses
                    <br>
                    <br>
                    Office Supplies Expenses
                    <br>
                    <br>
                    Accountable Forms Expenses
                    <br>
                    <br>
                    Drugs and Medicine Expenses
                    <br>
                    <br>
                    Medical, Dental and Lab. Supplies Expe.
                    <br>
                    <br>
                    Fuel, Oil and Lubricants Expenses
                    <br>
                    <br>
                    Semi-Expendable exp.-Machinery
                    <br>
                    <br>
                    Semi-Expendable exp.-Office Equipment
                    <br>
                    <br>
                    Semi-Expendable exp.-Information and Communun.
                    <br>
                    <br>
                    Semi-Expendable exp.-Commun. Technology
                    <br>
                    <br>
                    Semi-Expendable exp.-Disaster Response and 
                    <br>
                    <br>
                    Semi-Expendable exp.-Other Machinery & Equipment
                    <br>
                    <br>
                    Other Supplies & Materials Expenses
                    <br>
                    <br>
                    Water Expenses
                    <br>
                    <br>
                    Electricity Expenses
                    <br>
                    <br>
                    Postage and Deliveries
                    <br>
                    <br>
                    Telephone Expenses - Mobile
                    <br>
                    <br>
                    Telephone Expenses - Landline
                    <br>
                    <br>
                    Inernet Expenses
                    <br>
                    <br>
                    Extraordinary Expenses
                    <br>
                    <br>
                    Miscellaneous Expenses
                    <br>
                    <br>
                    Legal services
                    <br>
                    <br>
                    Auditing Services
                    <br>
                    <br>
                    Consultancy Services
                    <br>
                    <br>
                    Other Professional Expenses
                    <br>
                    <br>
                    Janitorial Expenses
                    <br>
                    <br>
                    Security Expenses
                    <br>
                    <br>
                    Other General Services
                    <br>
                    <br>
                    Repair & Maint. - Other Land Improvements
                </td>
                <td>
                    <br>
                    <br>
                      50201010 00
                      <br>
                      <br>
                      50201020 00
                      <br>
                      <br>
                      50202010 00
                      <br>
                      <br>
                      50203010 00
                      <br>
                      <br>
                      50203020 00
                      <br>
                      <br>
                      50203070 00
                      <br>
                      <br>
                      50203080 00
                      <br>
                      <br>
                      50203090 00
                      <br>
                      <br>
                      5020321001
                      <br>
                      <br>
                      5020321002
                       <br>
                       <br>
                      5020321003
                      <br>
                      <br>
                      5020321007
                      <br>
                      <br>
                      5020321008
                      <br>
                      <br>
                      5020321099
                      <br>
                      <br>
                      50203990 00
                      <br>
                      <br>
                      50204010 00
                      <br>
                      <br>
                      50204020 00
                      <br>
                      <br>
                      50205010 00
                      <br>
                      <br>
                      50205020 01
                      <br>
                      <br>
                      50205020 02
                      <br>
                      <br>
                      50205030 00
                      <br>
                      <br>
                      50210030 00
                      <br>
                      <br>
                      50210030 00
                      <br>
                      <br>
                      50211010 00
                      <br>
                      <br>
                      50211020 00
                      <br>
                      <br>
                      50211030 00
                      <br>
                      <br>
                      50211990 00
                      <br>
                      <br>
                      50212020 00
                      <br>
                      <br>
                      50212030 00
                      <br>
                      <br>
                      50212990 00
                      <br>
                      <br>
                      50213020 99
                  </td>
                  <td>
                    
                      <input name="aa_local" class="form-control" value="{{ $data->aa_local }}">
                      <input name="aa_foreign" class="form-control" value="{{ $data->aa_foreign }}">
                      <input name="aa_training" class="form-control" value="{{ $data->aa_training }}">
                      <input name="aa_office" class="form-control" value="{{ $data->aa_office }}">
                      <input name="aa_accountable" class="form-control" value="{{ $data->aa_accountable }}">
                      <input name="aa_drugs" class="form-control" value="{{ $data->aa_drugs }}">
                      <input name="aa_medical" class="form-control" value="{{ $data->aa_medical }}">
                      <input name="aa_fuel" class="form-control" value="{{ $data->aa_fuel }}">
                      <input name="aa_semi_machinery" class="form-control" value="{{ $data->aa_semi_machinery }}">
                      <input name="aa_semi_office" class="form-control" value="{{ $data->aa_semi_office }}">
                      <input name="aa_semi_information" class="form-control" value="{{ $data->aa_semi_information }}">
                      <input name="aa_semi_communication" class="form-control" value="{{ $data->aa_semi_communication }}">
                      <input name="aa_semi_disaster" class="form-control" value="{{ $data->aa_semi_disaster }}">
                      <input name="aa_semi_other" class="form-control" value="{{ $data->aa_semi_other }}">
                      <input name="aa_other_supp" class="form-control" value="{{ $data->aa_other_supp }}">
                      <input name="aa_water" class="form-control" value="{{ $data->aa_water }}">
                      <input name="aa_electricity" class="form-control" value="{{ $data->aa_electricity }}">
                      <input name="aa_postage" class="form-control" value="{{ $data->aa_postage }}">
                      <input name="aa_telephone_mobile" class="form-control" value="{{ $data->aa_telephone_mobile }}">
                      <input name="aa_telephone_landline" class="form-control" value="{{ $data->aa_telephone_landline }}">
                      <input name="aa_internet" class="form-control" value="{{ $data->aa_internet }}">
                      <input name="aa_extraordinary" class="form-control" value="{{ $data->aa_extraordinary }}">
                      <input name="aa_miscellaneous" class="form-control" value="{{ $data->aa_miscellaneous }}">
                      <input name="aa_legal" class="form-control" value="{{ $data->aa_legal }}">
                      <input name="aa_auditing" class="form-control" value="{{ $data->aa_auditing }}">
                      <input name="aa_consultancy" class="form-control" value="{{ $data->aa_consultancy }}">
                      <input name="aa_other_prof" class="form-control" value="{{ $data->aa_other_prof }}">
                      <input name="aa_janitor" class="form-control" value="{{ $data->aa_janitor }}">
                      <input name="aa_security" class="form-control" value="{{ $data->aa_security }}">
                      <input name="aa_other_general" class="form-control" value="{{ $data->aa_other_general }}">
                      <input name="aa_repair_other" class="form-control" value="{{ $data->aa_repair_other }}">
                   </td>
                   <td>
                      <input name="ar_local" class="form-control" value="{{ $data->ar_local }}">
                      <input name="ar_foreign" class="form-control" value="{{ $data->ar_foreign }}">
                      <input name="ar_training" class="form-control" value="{{ $data->ar_training }}">
                      <input name="ar_office" class="form-control" value="{{ $data->ar_office }}">
                      <input name="ar_accountable" class="form-control" value="{{ $data->ar_accountable }}">
                      <input name="ar_drugs" class="form-control" value="{{ $data->ar_drugs }}">
                      <input name="ar_medical" class="form-control" value="{{ $data->ar_medical }}">
                      <input name="ar_fuel" class="form-control" value="{{ $data->ar_fuel }}">
                      <input name="ar_semi_machinery" class="form-control" value="{{ $data->ar_semi_machinery }}">
                      <input name="ar_semi_office" class="form-control" value="{{ $data->ar_semi_office }}">
                      <input name="ar_semi_information" class="form-control" value="{{ $data->ar_semi_information }}">
                      <input name="ar_semi_communication" class="form-control" value="{{ $data->ar_semi_communication }}">
                      <input name="ar_semi_disaster" class="form-control" value="{{ $data->ar_semi_disaster }}">
                      <input name="ar_semi_other" class="form-control" value="{{ $data->ar_semi_other }}">
                      <input name="ar_other_supp" class="form-control" value="{{ $data->ar_other_supp}}">
                      <input name="ar_water" class="form-control" value="{{ $data->ar_water }}">
                      <input name="ar_electricity" class="form-control" value="{{ $data->ar_electricity }}">
                      <input name="ar_postage" class="form-control" value="{{ $data->ar_postage }}">
                      <input name="ar_telephone_mobile" class="form-control" value="{{ $data->ar_telephone_mobile }}">
                      <input name="ar_telephone_landline" class="form-control" value="{{ $data->ar_telephone_landline }}">
                      <input name="ar_internet" class="form-control" value="{{ $data->ar_internet }}">
                      <input name="ar_extraordinary" class="form-control" value="{{ $data->ar_extraordinary }}">
                      <input name="ar_miscellaneous" class="form-control" value="{{ $data->ar_miscellaneous }}">
                      <input name="ar_legal" class="form-control" value="{{ $data->ar_legal }}">
                      <input name="ar_auditing" class="form-control" value="{{ $data->ar_auditing }}">
                      <input name="ar_consultancy" class="form-control" value="{{ $data->ar_consultancy }}">
                      <input name="ar_other_prof" class="form-control" value="{{ $data->ar_other_prof }}">
                      <input name="ar_janitor" class="form-control" value="{{ $data->ar_janitor }}">
                      <input name="ar_security" class="form-control" value="{{ $data->ar_security }}">
                      <input name="ar_other_general" class="form-control" value="{{ $data->ar_other_general }}">
                      <input name="ar_repair_other" class="form-control" value="{{ $data->ar_repair_other }}">
                   </td>
            </tr>
            <tr>
                <td id="description">
                      Repair & Main. - Building & Structures
                      <br>
                      <br>
                      Repair & Maint. - Machineries & Equipment
                      <br>
                      <br>
                      Repair & Maint. - Office Equipment
                      <br>
                      <br>
                      Repair & Maint. - ICT Equipment
                      <br>
                      <br>
                      Repair & Maint. - Communication Equipment
                      <br>
                      <br>
                      Repair & Maint. - Technical & Scientific
                      <br>
                      <br>
                      Repair & Maint. - Transportation Equipment
                      <br>
                      <br>
                      Repair & Maint. - Furniture & Fixtures
                      <br>
                      <br>
                      Subsidies-Others
                      <br>
                      <br>
                      <b>Local GIA</b>
                      <br>
                      <br>
                      <b>SETUP</b>
                </td>
                <td>
                      50213040 01
                      <br>
                      <br>
                      50213050 00
                      <br>
                      <br>
                      50213050 02
                      <br>
                      <br>
                      50213050 03
                      <br>
                      <br>
                      50213050 07
                      <br>
                      <br>
                      50213050 14
                      <br>
                      <br>
                      50213060 01
                      <br>
                      <br>
                      50213070 00
                      <br>
                      <br>
                      50214990 00
                      <br>
                      <br>
                      50214990 00
                      <br>
                      <br>
                      50214990 00
                </td>
                <td>  
                    <input name="aa_rm_building" class="form-control" value="{{ $data->aa_rm_building }}">
                    <input name="aa_rm_machineries" class="form-control" value="{{ $data->aa_rm_machineries }}">
                    <input name="aa_rm_Office" class="form-control" value="{{ $data->aa_rm_Office }}">
                    <input name="aa_rm_ict" class="form-control" value="{{ $data->aa_rm_ict }}">
                    <input name="aa_rm_commercial" class="form-control" value="{{ $data->aa_rm_commercial }}">
                    <input name="aa_rm_technical" class="form-control" value="{{ $data->aa_rm_technical }}">
                    <input name="aa_rm_transportation" class="form-control" value="{{ $data->aa_rm_transportation }}">
                    <input name="aa_rm_furnitures" class="form-control" value="{{ $data->aa_rm_furnitures }}">
                    <input name="aa_subsidies" class="form-control" disabled>
                    <input name="aa_local_gia" class="form-control" value="{{ $data->aa_local_gia }}">
                    <input name="aa_setup" class="form-control" value="{{ $data->aa_setup }}">
                </td>
                <td>  
                    <input name="ar_rm_building" class="form-control" value="{{ $data->ar_rm_building }}">
                    <input name="ar_rm_machineries" class="form-control" value="{{ $data->ar_rm_machineries }}">
                    <input name="ar_rm_Office" class="form-control" value="{{ $data->ar_rm_Office }}">
                    <input name="ar_rm_ict" class="form-control" value="{{ $data->ar_rm_ict }}">
                    <input name="ar_rm_commercial" class="form-control" value="{{ $data->ar_rm_commercial }}">
                    <input name="ar_rm_technical" class="form-control" value="{{ $data->ar_rm_technical }}">
                    <input name="ar_rm_transportation" class="form-control" value="{{ $data->ar_rm_transportation }}">
                    <input name="ar_rm_furnitures" class="form-control" value="{{ $data->ar_rm_furnitures }}">
                    <input name="ar_subsidies" class="form-control" disabled>
                    <input name="ar_local_gia" class="form-control" value="{{ $data->ar_local_gia }}">
                    <input name="ar_setup" class="form-control" value="{{ $data->ar_setup}}">
                </td>
            <tr>     
            <tr>
                <td id="description">
                      Taxes, Duties and Licenses
                      <br>
                      <br>
                      Fidelity Bond Premiums
                      <br>
                      <br>
                      Insurance Expenses
                      <br>
                      <br>
                      Advertising Expenses
                      <br>
                      <br>
                      Printing and Binding Services
                      <br>
                      <br>
                      Representation Expenses
                      <br>
                      <br>
                      Transportation and Delivery Expenses
                      <br>
                      <br>
                      Rent Expenses - Building
                      <br>
                      <br>
                      Rent Expenses - Motor Vehicles
                      <br>
                      <br>
                      Rent Expenses - Equipment
                      <br>
                      <br>
                      Membership Dues & Conts. to Org'ns.
                      <br>
                      <br>
                      Subscription Expenses
                      <br>
                      <br>
                      Other MOOE
                </td>
                <td>
                      50215010 01
                      <br>
                      <br>
                      50215020 00
                      <br>
                      <br>
                      50215030 00
                      <br>
                      <br>
                      50299010 00
                      <br>
                      <br>
                      50299020 00
                      <br>
                      <br>
                      50299030 00
                      <br>
                      <br>
                      50299040 00
                      <br>
                      <br>
                      50299050 01
                      <br>
                      <br>
                      50299050 03
                      <br>
                      <br>
                      50299050 04
                      <br>
                      <br>
                      50299060 00
                      <br>
                      <br>
                      50299070 00
                      <br>
                      <br>
                      50299990 99
                </td>
                <td>  
                    <input name="aa_taxes" class="form-control" value="{{ $data->aa_taxes }}">
                    <input name="aa_fidelity" class="form-control" value="{{ $data->aa_fidelity }}">
                    <input name="aa_insurance" class="form-control" value="{{ $data->aa_insurance }}">
                    <input name="aa_advertising" class="form-control" value="{{ $data->aa_advertising }}">
                    <input name="aa_printing" class="form-control" value="{{ $data->aa_printing }}">
                    <input name="aa_representation" class="form-control" value="{{ $data->aa_representation }}">
                    <input name="aa_transportation" class="form-control" value="{{ $data->aa_transportation }}">
                    <input name="aa_rent_building" class="form-control" value="{{ $data->aa_rent_building }}">
                    <input name="aa_rent_motor" class="form-control" value="{{ $data->aa_rent_motor }}">
                    <input name="aa_rent_equipment" class="form-control" value="{{ $data->aa_rent_equipment }}">
                    <input name="aa_membership" class="form-control" value="{{ $data->aa_membership }}">
                    <input name="aa_sub" class="form-control" value="{{ $data->aa_sub }}">
                    <input name="aa_other_mooe" class="form-control" value="{{ $data->aa_other_mooe }}">
                </td>
                <td>  
                    <input name="ar_taxes" class="form-control" value="{{ $data->ar_taxes }}">
                    <input name="ar_fidelity" class="form-control" value="{{ $data->ar_fidelity }}">
                    <input name="ar_insurance" class="form-control" value="{{ $data->ar_insurance }}">
                    <input name="ar_advertising" class="form-control" value="{{ $data->ar_advertising }}">
                    <input name="ar_printing" class="form-control" value="{{ $data->ar_printing }}">
                    <input name="ar_representation" class="form-control" value="{{ $data->ar_representation }}">
                    <input name="ar_transportation" class="form-control" value="{{ $data->ar_transportation }}">
                    <input name="ar_rent_building" class="form-control" value="{{ $data->ar_rent_building }}">
                    <input name="ar_rent_motor" class="form-control" value="{{ $data->ar_rent_motor }}">
                    <input name="ar_rent_equipment" class="form-control" value="{{ $data->ar_rent_equipment }}">
                    <input name="ar_membership" class="form-control" value="{{ $data->ar_membership }}">
                    <input name="ar_sub" class="form-control" value="{{ $data->ar_sub }}">
                    <input name="ar_other_mooe" class="form-control" value="{{ $data->ar_other_mooe }}">
                </td>
              </tr> 
              </tbody>
            </table>
          </div>

          {{-- CURRENT SAA from DOST-CO --}}
          <div class="container">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th width="43%">P/A/P Allotment Class/Object of Expenditures (1) <br>
                  <b><u>Current SAA from DOST-CO</u></b> &nbsp;&nbsp;&nbsp;<a onclick=myFunction() href="#"><span><i class="fa fa-plus my-float"></i></span> Add Current SAA</a>
                </th>
                <th width="12.5%">UACS code</th>
                <th width="11.5%">Authorized Appropriations</th>
                <th width="11.5%"> Allotment Recieved</th>
                <th width="11%"> This Report</th>
                <th width="11%"> To Date</th>
              </tr>
            </thead>
          </table>
          </div>

        <div class="container">  
        <table class="table table-bordered" id="myTable2">
        </table>
        <input id="counter" name="counter" class="form-control" type="hidden">
        <span id="output-area"></span>
        </div>

      {{-- ASA Releases from DOST-CO --}}
        <div class="container">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="43%">P/A/P Allotment Class/Object of Expenditures (1) <br>
                    <b><u>ASA Releases from DOST-CO</u></b> &nbsp;&nbsp;&nbsp;<a onclick=myFunction2() href="#"><span><i class="fa fa-plus my-float"></i></span> Add ASA Releases</a>
                  </th>
                  <th width="12.5%">UACS code</th>
                  <th width="11.5%">Authorized Appropriations</th>
                  <th width="11.5%"> Allotment Recieved</th>
                  <th width="11%"> This Report</th>
                  <th width="11%"> To Date</th>
                </tr>
              </thead>
            </table>
            </div>
  
          <div class="container">  
          <table class="table table-bordered" id="myTable3"{{$data->monthly_id}}>
          </table>
          <input id="counter2" name="counter2" class="form-control" type="hidden">
          <span id="output-area"></span>
          </div>


        
    <button id="print_button"  type="submit" class="btn btn-primary"><span><i id="add" class="fa fa-print my-float"></i></span> Print</button>
    <button  id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
        </div>
    <div class="modal-footer">
        </div>
        </div>
    </div>
    </div>
    
@endforeach
<!-- END Modal for PRINT monthly summary -->


<script>
    var x = 0;
    var y = 0;
    var number = 0;
    var idnum = document.getElementById("test").value;

    
   // var dataz = {!! json_encode($data->monthly_id) !!};
  
    function myFunction() 
    {
      

     // alert(idnum);
     // $('#parent').append('<div id="first'+count+'">text</div>');
    //  var totalz = document.getElementById('id_month').value;
    //  alert(totalz);
    /*  var table_name = document.getElementById("class_name");
      if (table_name.style.display == "none")
      {
        table_name.style.display = "block";
      }
      else {
        table_name.style.display = "block";
    } */
      document.getElementById('counter').value = ++x;
      //var table = document.getElementById("myTable2");
      var table = $table.children("myTable2")[0].outerHTML;
      $table.append(markup);
      var row = table.insertRow(0);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4);
      var cell6 = row.insertCell(5);
      cell1.innerHTML = '<div style="width:448px;"><textarea rows="2" class="form-control" placeholder="Description" id="first_sample" name="description_new[]" type="text"></textarea></div>';
      cell2.innerHTML = '<div style="width:120px;"><input class="form-control" placeholder="UACS code" id="second_sample" name="uacs_new[]" type="text"></div>';
      cell3.innerHTML = '<div style="width:105px;"><input type="number" step="0.01" class="form-control" placeholder="Authorized Appropriations" id="third_sample" name="aa_new[]" ></div>';
      cell4.innerHTML = '<div style="width:105px;"><input type="number" step="0.01" class="form-control" placeholder="Allotment Recieved" id="fourth_sample" name="ar_new[]" ></div>';
      cell5.innerHTML = '<div style="width:105px;"><input type="number" step="0.01" class="form-control" placeholder="Obligations Incurred(This reprot)" id="fifth_sample" name="tr_new[]" ></div>';
      cell6.innerHTML = '<div style="width:105px;"><input type="number" step="0.01" class="form-control" placeholder="Obligations Incurred(To Date" id="sixth_sample" name="td_new[]" ></div>';

    }
    
    function myFunction2() 
    {
      document.getElementById('counter2').value = ++y;
      var table = document.getElementById("myTable3");

      var row = table.insertRow(0);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4);
      var cell6 = row.insertCell(5);
      cell1.innerHTML = '<div style="width:448px;"><textarea rows="2" class="form-control" placeholder="Description" name="description_new2[]" type="text"></textarea></div>';
      cell2.innerHTML = '<div style="width:120px;"><input class="form-control" placeholder="UACS code" name="uacs_new2[]" type="text"></div>';
      cell3.innerHTML = '<div style="width:105px;"><input type="number" step="0.01" class="form-control" placeholder="Authorized Appropriations"  name="aa_new2[]"></div>';
      cell4.innerHTML = '<div style="width:105px;"><input type="number" step="0.01" class="form-control" placeholder="Allotment Recieved"  name="ar_new2[]" ></div>';
      cell5.innerHTML = '<div style="width:105px;"><input type="number" step="0.01" class="form-control" placeholder="Obligations Incurred(This reprot)"  name="tr_new2[]" ></div>';
      cell6.innerHTML = '<div style="width:105px;"><input type="number" step="0.01" class="form-control" placeholder="Obligations Incurred(To Date"  name="td_new2[]" ></div>';
    }
   
    </script>