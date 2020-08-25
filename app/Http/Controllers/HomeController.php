<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LIBTable;
use App\ProjectTable;
use App\PayeeTable;
use App\Registries;
use App\Cancelled_ORS;
use App\UACSTable;
use App\PAPTable;
use App\RCTable;
use App\Activity_log;
use App\BURS_Registry;
use App\Cancelled_BURS;
use App\Asignatories;
use DB;
use App\User;
use App\Yearly_budget;
use App\Yearly_budget2;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Auth;
use App\Monthly_sum;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //View dashboard for total ORS/BURS Registries

        $count1 = DB::table('registry')->count();
        $count2 = DB::table('burs_registry')->count();
        $total_count = $count1 + $count2;
        $users = User::all();
        $activity_log = Activity_log::all();
       // $yearly_data = Yearly_budget::all();
       

        $time_now = request()->timestamps;
        $date_now = new Carbon($time_now);
        $yearly_data = DB::table('yearly_budget')->where( 'year', $date_now->year)->get(); 
        $yearly_data2 = DB::table('yearly_budget2')->where( 'year', $date_now->year)->get(); 
        
      

        $recent1 = Registries::latest('created_at')->first();
        $recent2 = BURS_Registry::latest('created_at')->first();
        $yearly_budget_update = Yearly_budget::latest('created_at')->first();
        if ($recent1 || $recent2 == null) {
            $grand_total = DB::table('registry')->sum('reg_amount');
            $burs_total = DB::table('burs_registry')->sum('reg_amount');
            return view('home', compact('activity_log','count1','grand_total','burs_total','date_now','yearly_budget_update','yearly_data','yearly_data2', 'count2', 'users', 'recent1', 'recent2', 'total_count'));
        } else {
            $grand_total = DB::table('registry')->sum('reg_amount');
            $burs_total = DB::table('burs_registry')->sum('reg_amount');
            return view('home', compact('activity_log','count1','grand_total','burs_total','yearly_budget_update','yearly_data','yearly_data2', 'count2', 'users', 'recent1', 'recent2', 'total_count'));
        }
    }


    public function fetch_data(Request $request)
    {
        //Filter for ORS Registries in `Filter ORS Registries Page`

        $input = $request->reg_rcz;

        if ($request->ajax()) {
            if ($request->from_date != '' && $request->to_date != '' && $input != '') {
                $data = DB::table('registry')
                    ->whereBetween('reg_date', array($request->from_date, $request->to_date))
                    ->where('reg_rc', $input)
                    ->get(); 
            } 
            elseif ($request->from_date != '' && $request->to_date != '')
            {
                $data = DB::table('registry')
                ->whereBetween('reg_date', array($request->from_date, $request->to_date))
                ->get();
            }
            else {
                $data = DB::table('registry')->orderBy('reg_date', 'desc')->get();
            }
            echo json_encode($data);
        }
    }



    public function add_new()
    {

        //view utilies page

        return view('/components/addnew');
    }

 


    public function addnew_payee(Request $request)
    {

        //add new payee in utilies page

        $addnew_payee = new PayeeTable;
        $addnew_payee->name = request()->payee_name;
        $addnew_payee->save();
        activity()
        ->performedOn($addnew_payee)
        ->log('New Payee added');
        return redirect('components/addnew');
    }

    public function addnew_rc(Request $request)
    {
        //add new payee in RC page

        $addnew_rc = new RCTable;
        $addnew_rc->rc_id = request()->rc_id;
        $addnew_rc->description = request()->rc_description;
        $addnew_rc->pap = request()->rc_pap;
        $addnew_rc->save();
        activity()
        ->performedOn($addnew_rc)
        ->log('New RC added');
        return redirect('components/addnew');
    }

    public function addnew_uacs(Request $request)
    {   
        //add new UACS in utilies page

        $addnew_uacs = new UACSTable;
        $addnew_uacs->uacs_id = request()->uacs_id;
        $addnew_uacs->description = request()->uacs_desc;
        $addnew_uacs->save();
        activity()
        ->performedOn($addnew_uacs)
        ->log('New UACS added');
        return redirect('components/addnew');
    }


    public function addnew_pap(Request $request)
    {

        //add new PAP in utilies page

        $addnew_pap = new PAPTable;
        $addnew_pap->pap_name = request()->pap_name;
        $addnew_pap->save();
        activity()
        ->performedOn($addnew_pap)
        ->log('New PAP added');
        return redirect('components/addnew');
    }



    public function viewcancelled()
    {
        //view cancelled Registries

        $cancel_registry = Cancelled_ORS::all();
        $cancel_registry2 = Cancelled_BURS::all();
        return view('/components/cancelled', compact('cancel_registry', 'cancel_registry2'));
    }

    public function cancel_LIB($lib_id)
    {
        //cancelled LIB Registries

        $lineitem_budget = LIBTable::where('lib_id', $lib_id)->first();

        $projecttitle = $lineitem_budget->project_title;
        $implementingagency = $lineitem_budget->implementing_agency;
        $projectduration = $lineitem_budget->project_duration;
        $projectfundsource = $lineitem_budget->projectfund_source;
        $projectbudget = $lineitem_budget->project_budget;
        $projectleader = $lineitem_budget->project_leader;
        $monitoringagency = $lineitem_budget->monitoring_agency;


        $lineitem_budget->delete();
        activity()
        ->performedOn($lineitem_budget)
        ->log('LIB record deleted');

        return redirect('components/LIB');
    }



    public function cancel_project($project_id)
    {
        //cancelled LIB Registries

        $project = ProjectTable::where('project_id', $project_id)->first();

        $projecttitle = $project->project_title;
        $localtravel = $project->local_travel;
        $foreigntravel = $project->foreign_travel;
        $trainingexpense = $project->training_expense;
        $officesuppliesexpense = $project->officesupplies_expense;
        $accountableformsexpense = $project->accountableforms_expense;
        $drugsmedicineexpense = $project->drugsmedicine_expense;
        $mdlsupplies = $project->mdl_supplies;
        $folexpense = $project->fol_expense;
        $semiexpendableexpense = $project->semiexpendable_expense;
        $osmexpense = $project->osm_expense;
        $water1 = $project->water;
        $electricity1 = $project->electricity;
        $postagecourierservice = $project->postagecourier_service;
        $mobile1 = $project->mobile;
        $landline1 = $project->landline;
        $internetsubexpense = $project->internetsub_expense;
        $extramiscexpense = $project->extramisc_expense;
        $legalservice = $project->legal_service;
        $auditingservice = $project->auditing_service;
        $consultancyservice = $project->consultancy_service;
        $otherprofessionalservice = $project->otherprofessional_service;
        $janitorialservice = $project->janitorial_service;
        $securityservice = $project->security_service;
        $othergeneralservice = $project->othergeneral_service;
        $landimprovement = $project->land_improvement;
        $buildingotherstructure = $project->building_otherstructure;
        $officeequipment = $project->office_equipment;
        $ictequipment = $project->ict_equipment;
        $commsequipment = $project->comms_equipment;
        $printingequipment = $project->printing_equipment;
        $techsciequipment = $project->techsci_equipment;
        $transpoequipment = $project->transpo_equipment;
        $furniturefixture = $project->furniture_fixture;
        $othersubsidy = $project->other_subsidy;
        $localgia = $project->local_gia;
        $setup1 = $project->setup;
        $taxdutieslicense = $project->taxduties_license;
        $fidelitybondpremiums = $project->fidelitybond_premiums;
        $insuranceexpense = $project->insurance_expense;
        $advertisingexpense = $project->advertising_expense;
        $printingpubexpense = $project->printingpub_expense;
        $representationexpense = $project->representation_expense;
        $transpodeliveryexpense = $project->transpodelivery_expense;
        $buildingstructure = $project->building_structure;
        $equipment1 = $project->equipment;
        $motorvehicle = $project->motor_vehicle;
        $subscriptionexpense = $project->subscription_expense;
        $othermooe = $project->other_mooe;
        $transpoequipmentmotorvehicle = $project->transpoequipment_motorvehicle;


        $project->delete();
        activity()
        ->performedOn($project)
        ->log('Program/Project record deleted');

        return redirect('components/Project');
    }






    public function cancel($reg_refnum)
    {
        //cancelled ORS Registries

        $registry = Registries::where('reg_refnum', $reg_refnum)->first();

        $refnum = $registry->reg_refnum;
        $date = $registry->reg_date;
        $orsnum = $registry->reg_orsnum;
        $payee = $registry->reg_payee;
        $rc = $registry->reg_rc;
        $pap = $registry->reg_pap;
        $uacs = $registry->reg_uacs;
        $amount = $registry->reg_amount;
        $particulars = $registry->reg_particulars;
        $subaccode = $registry->reg_subaccode;
        $remarks = $registry->reg_remarks;
        $fundclaster = $registry->reg_fundcluster;
        $subamount = $registry->reg_subamount;


        $registry->delete();
        activity()
        ->performedOn($registry)
        ->log('ORS record cancelled');

        $cancel_registry = new Cancelled_ORS;
        $cancel_registry->cancel_refnum = $refnum;
        $cancel_registry->cancel_date =  $date;
        $cancel_registry->cancel_orsnum = $orsnum;
        $cancel_registry->cancel_payee = $payee;
        $cancel_registry->cancel_rc = $rc;
        $cancel_registry->cancel_pap = $pap;
        $cancel_registry->cancel_amount = $amount;
        $cancel_registry->cancel_particulars = $particulars;
        $cancel_registry->cancel_subaccode = $subaccode;
        $cancel_registry->cancel_subamount = $subamount;
        $cancel_registry->cancel_fundclaster =  $fundclaster;
        $cancel_registry->cancel_remarks =  $remarks;
        $cancel_registry->cancel_uacs = $uacs;

        $cancel_registry->save();

        return redirect('components/Registry');
    }

    public function cancel_burs($reg_refnum)
    {

        //cancelled BURS Registries

        $registry = BURS_Registry::where('reg_refnum', $reg_refnum)->first();

        $refnum = $registry->reg_refnum;
        $date = $registry->reg_date;
        $orsnum = $registry->reg_orsnum;
        $payee = $registry->reg_payee;
        $rc = $registry->reg_rc;
        $pap = $registry->reg_pap;
        $uacs = $registry->reg_uacs;
        $amount = $registry->reg_amount;
        $particulars = $registry->reg_particulars;
        $subaccode = $registry->reg_subaccode;
        $remarks = $registry->reg_remarks;
        $fundclaster = $registry->reg_fundcluster;
        $subamount = $registry->reg_subamount;

        $registry->delete();
        activity()
        ->performedOn($registry)
        ->log('BURS record cancelled');

        $cancel_registry = new Cancelled_BURS;
        $cancel_registry->cancel_refnum = $refnum;
        $cancel_registry->cancel_date =  $date;
        $cancel_registry->cancel_orsnum = $orsnum;
        $cancel_registry->cancel_payee = $payee;
        $cancel_registry->cancel_rc = $rc;
        $cancel_registry->cancel_pap = $pap;
        $cancel_registry->cancel_amount = $amount;
        $cancel_registry->cancel_particulars = $particulars;
        $cancel_registry->cancel_subaccode = $subaccode;
        $cancel_registry->cancel_subamount = $subamount;
        $cancel_registry->cancel_fundclaster =  $fundclaster;
        $cancel_registry->cancel_remarks =  $remarks;
        $cancel_registry->cancel_uacs = $uacs;

        $cancel_registry->save();

        return redirect('components/bursregistry');
    }

    


    public function add_budget(Request $request)
    {
        //add and update for ORS Budget @Dashboard

        $add_budget = new Yearly_budget;
        $time = request()->timestamps;
        $date = new Carbon($time);
        $check = DB::table('yearly_budget')->where('year', $date->year)->first();

        if (Auth::attempt(['name' => 'Mary Joy R. Martinez', 'password' => $request->password])) {
            if (!$check) {
                $add_budget->year = $date->year;
                $add_budget->amount = request()->amount;
                $add_budget->created_at = Carbon::now();
                $add_budget->save();
                activity()
                ->performedOn($add_budget)
                ->log('New ORS budget added');
                return redirect()->intended('home')->with('status_correct', 'Successfully Added');
            } elseif ($check) {
                $curr_date = request()->timestamps;
                $updatedata = DB::table('yearly_budget')->where('year', $date->year)
                    ->update(['updated_at' => Carbon::now(), 'amount' => request()->amount]);
                    activity()
                    ->performedOn($add_budget)
                    ->log('ORS budget is updated');
                return redirect()->intended('home')->with('status_correct', 'Successfully Updated');
            }
        } else {
            return redirect()->intended('home')->with('status_wrong', 'Update Unsuccessful');
        }
    }

    public function add_budget2(Request $request)
    {

        //add and update for BURS Budget @Dashboard

        $add_budget = new Yearly_budget2;
        $time = request()->timestamps;
        $date = new Carbon($time);
        $check = DB::table('yearly_budget2')->where('year', $date->year)->first();

        if (Auth::attempt(['name' => 'Mary Joy R. Martinez', 'password' => $request->password])) {
            if (!$check) {
                $add_budget->year = $date->year;
                $add_budget->amount = request()->amount;
                $add_budget->created_at = Carbon::now();
                $add_budget->save();
                activity()
                ->performedOn($add_budget)
                ->log('New BURS budget added');
                return redirect()->intended('home')->with('status_correct', 'Successfully Added');
            } elseif ($check) {
                $curr_date = request()->timestamps;
                $updatedata = DB::table('yearly_budget2')->where('year', $date->year)
                    ->update(['updated_at' => Carbon::now(), 'amount' => request()->amount]);
                    activity()
                    ->performedOn($add_budget)
                    ->log('BURS budget is updated');
                return redirect()->intended('home')->with('status_correct', 'Successfully Updated');
            }
        } else {
            return redirect()->intended('home')->with('status_wrong', 'Update Unsuccessful');
        }
    }
        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $monthly_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($monthly_id)
    {
        //delete monthly uthorized Appropriations & Allotment Recieved record

        $delete_monthly = Monthly_sum::find($monthly_id);
        $delete_monthly->delete();
        activity()
        ->performedOn($delete_monthly)
        ->log('Monthly record deleted');
        return redirect('components/monthly_summary');
    }


    public function monthly_store(Request $request)
    {
       // monthly summary add new Authorized Appropriations & Allotment Recieved
      
       $add_monthly = new Monthly_sum;
       $add_monthly->monthly_date = request()->from_date;
       $add_monthly->aa_salaries = request()->aa_salaries;
       $add_monthly->ar_salaries = request()->ar_salaries;
       $add_monthly->aa_pera = request()->aa_pera;
       $add_monthly->ar_pera = request()->ar_pera;
       $add_monthly->aa_ra = request()->aa_ra;
       $add_monthly->ar_ra = request()->ar_ra;
       $add_monthly->aa_ta = request()->aa_ta;
       $add_monthly->ar_ta = request()->ar_ta;
       $add_monthly->aa_clothing = request()->aa_clothing;
       $add_monthly->ar_clothing = request()->ar_clothing;
       $add_monthly->aa_year_end = request()->aa_year_end;
       $add_monthly->ar_year_end = request()->ar_year_end;
       $add_monthly->aa_cash = request()->aa_cash;
       $add_monthly->ar_cash = request()->ar_cash;
       $add_monthly->aa_productivity = request()->aa_productivity;
       $add_monthly->ar_productivity = request()->ar_productivity;
       $add_monthly->aa_pag_ibig = request()->aa_pag_ibig;
       $add_monthly->ar_pag_ibig = request()->ar_pag_ibig;
       $add_monthly->aa_philheath = request()->aa_philheath;
       $add_monthly->ar_philheath = request()->ar_philheath;
       $add_monthly->aa_ecc = request()->aa_ecc;
       $add_monthly->ar_ecc = request()->ar_ecc;
       $add_monthly->aa_subsistence = request()->aa_subsistence;
       $add_monthly->ar_subsistence = request()->ar_subsistence;
       $add_monthly->aa_laundry = request()->aa_laundry;
       $add_monthly->ar_laundry = request()->ar_laundry;
       $add_monthly->aa_hazard = request()->aa_hazard;
       $add_monthly->ar_hazard = request()->ar_hazard;
       $add_monthly->aa_longevity = request()->aa_longevity;
       $add_monthly->ar_longevity = request()->ar_longevity;
       $add_monthly->aa_terminal = request()->aa_terminal;
       $add_monthly->ar_terminal = request()->ar_terminal;
       $add_monthly->aa_rlip = request()->aa_rlip;
       $add_monthly->ar_rlip = request()->ar_rlip;
       $add_monthly->aa_local = request()->aa_local;
       $add_monthly->ar_local = request()->ar_local;
       $add_monthly->aa_foreign = request()->aa_foreign;
       $add_monthly->ar_foreign = request()->ar_foreign;
       $add_monthly->aa_training = request()->aa_training;
       $add_monthly->ar_training = request()->ar_training;
       $add_monthly->aa_office = request()->aa_office;
       $add_monthly->ar_office = request()->ar_office;
       $add_monthly->aa_accountable = request()->aa_accountable;
       $add_monthly->ar_accountable = request()->ar_accountable;
       $add_monthly->aa_drugs = request()->aa_drugs;
       $add_monthly->ar_drugs = request()->ar_drugs;
       $add_monthly->aa_medical = request()->aa_medical;
       $add_monthly->ar_medical = request()->ar_medical;
       $add_monthly->aa_fuel = request()->aa_fuel;
       $add_monthly->ar_fuel = request()->ar_fuel;
       $add_monthly->aa_semi_machinery = request()->aa_semi_machinery;
       $add_monthly->ar_semi_machinery = request()->ar_semi_machinery;
       $add_monthly->aa_semi_office = request()->aa_semi_office;
       $add_monthly->ar_semi_office = request()->ar_semi_office;
       $add_monthly->aa_semi_information = request()->aa_semi_information;
       $add_monthly->ar_semi_information = request()->ar_semi_information;
       $add_monthly->aa_semi_communication = request()->aa_semi_communication;
       $add_monthly->ar_semi_communication = request()->ar_semi_communication;
       $add_monthly->aa_semi_disaster = request()->aa_semi_disaster;
       $add_monthly->ar_semi_disaster = request()->ar_semi_disaster;
       $add_monthly->aa_semi_other = request()->aa_semi_other;
       $add_monthly->ar_semi_other = request()->ar_semi_other;
       $add_monthly->aa_other_supp = request()->aa_other_supp;
       $add_monthly->ar_other_supp = request()->ar_other_supp;
       $add_monthly->aa_water = request()->aa_water;
       $add_monthly->ar_water = request()->ar_water;
       $add_monthly->aa_electricity = request()->aa_electricity;
       $add_monthly->ar_electricity = request()->ar_electricity;
       $add_monthly->aa_postage = request()->aa_postage;
       $add_monthly->ar_postage = request()->ar_postage;
       $add_monthly->aa_telephone_mobile = request()->aa_telephone_mobile;
       $add_monthly->ar_telephone_mobile = request()->ar_telephone_mobile;
       $add_monthly->aa_telephone_landline = request()->aa_telephone_landline;
       $add_monthly->ar_telephone_landline = request()->ar_telephone_landline;
       $add_monthly->aa_internet = request()->aa_internet;
       $add_monthly->ar_internet = request()->ar_internet;
       $add_monthly->aa_extraordinary = request()->aa_extraordinary;
       $add_monthly->ar_extraordinary = request()->ar_extraordinary;
       $add_monthly->aa_miscellaneous = request()->aa_miscellaneous;
       $add_monthly->ar_miscellaneous = request()->ar_miscellaneous;
       $add_monthly->aa_legal = request()->aa_legal;
       $add_monthly->ar_legal = request()->ar_legal;
       $add_monthly->aa_auditing = request()->aa_auditing;
       $add_monthly->ar_auditing = request()->ar_auditing;
       $add_monthly->aa_consultancy = request()->aa_consultancy;
       $add_monthly->ar_consultancy = request()->ar_consultancy;
       $add_monthly->aa_other_prof = request()->aa_other_prof;
       $add_monthly->ar_other_prof = request()->ar_other_prof;
       $add_monthly->aa_janitor = request()->aa_janitor;
       $add_monthly->ar_janitor = request()->ar_janitor;
       $add_monthly->aa_security = request()->aa_security;
       $add_monthly->ar_security = request()->ar_security;
       $add_monthly->aa_other_general = request()->aa_other_general;
       $add_monthly->ar_other_general = request()->ar_other_general;
       $add_monthly->aa_repair_other = request()->aa_repair_other;
       $add_monthly->ar_repair_other = request()->ar_repair_other;
       $add_monthly->aa_rm_building = request()->aa_rm_building;
       $add_monthly->ar_rm_building = request()->ar_rm_building;
       $add_monthly->aa_rm_machineries = request()->aa_rm_machineries;
       $add_monthly->ar_rm_machineries = request()->ar_rm_machineries;
       $add_monthly->aa_rm_Office = request()->aa_rm_Office;
       $add_monthly->ar_rm_Office = request()->ar_rm_Office;
       $add_monthly->aa_rm_ict = request()->aa_rm_ict;
       $add_monthly->ar_rm_ict = request()->ar_rm_ict;
       $add_monthly->aa_rm_commercial = request()->aa_rm_commercial;
       $add_monthly->ar_rm_commercial = request()->ar_rm_commercial;
       $add_monthly->aa_rm_technical = request()->aa_rm_technical;
       $add_monthly->ar_rm_technical = request()->ar_rm_technical;
       $add_monthly->aa_rm_transportation = request()->aa_rm_transportation;
       $add_monthly->ar_rm_transportation = request()->ar_rm_transportation;
       $add_monthly->aa_rm_furnitures = request()->aa_rm_furnitures;
       $add_monthly->ar_rm_furnitures = request()->ar_rm_furnitures;
       $add_monthly->aa_local_gia = request()->aa_local_gia;
       $add_monthly->ar_local_gia = request()->ar_local_gia;
       $add_monthly->aa_setup = request()->aa_setup;
       $add_monthly->ar_setup = request()->ar_setup;
       $add_monthly->aa_taxes = request()->aa_taxes;
       $add_monthly->ar_taxes = request()->ar_taxes;
       $add_monthly->aa_fidelity = request()->aa_fidelity;
       $add_monthly->ar_fidelity = request()->ar_fidelity;
       $add_monthly->aa_insurance = request()->aa_insurance;
       $add_monthly->ar_insurance = request()->ar_insurance;
       $add_monthly->aa_advertising = request()->aa_advertising;
       $add_monthly->ar_advertising = request()->ar_advertising;
       $add_monthly->aa_printing = request()->aa_printing;
       $add_monthly->ar_printing = request()->ar_printing;
       $add_monthly->aa_representation = request()->aa_representation;
       $add_monthly->ar_representation = request()->ar_representation;
       $add_monthly->aa_transportation = request()->aa_transportation;
       $add_monthly->ar_transportation = request()->ar_transportation;
       $add_monthly->aa_rent_building = request()->aa_rent_building;
       $add_monthly->ar_rent_building = request()->ar_rent_building;
       $add_monthly->aa_rent_motor = request()->aa_rent_motor;
       $add_monthly->ar_rent_motor = request()->ar_rent_motor;
       $add_monthly->aa_rent_equipment = request()->aa_rent_equipment;
       $add_monthly->ar_rent_equipment = request()->ar_rent_equipment;
       $add_monthly->aa_membership = request()->aa_membership;
       $add_monthly->ar_membership = request()->ar_membership;
       $add_monthly->aa_sub = request()->aa_sub;
       $add_monthly->ar_sub = request()->ar_sub;
       $add_monthly->aa_other_mooe = request()->aa_other_mooe;
       $add_monthly->ar_other_mooe = request()->ar_other_mooe;

       $add_monthly->save();
       activity()
        ->performedOn($add_monthly)
        ->log('New monthly record added');
       return redirect('components/monthly_summary');
    }



     public function monthly_summary()
    {
        $monthly = Monthly_sum::all();
        return view('components/monthly_summary', compact('monthly'));
    }

     public function monthly_summary_print()
    {

        $time = request()->from_date;
        $date = new Carbon($time);
        $z = $date->year . '-01-01'; //selected year from datepicker starting january.


       // $month = $date->month;
       //$grand_total = DB::table('registry')->sum('reg_amount');

        //PERSONAL SERVICES
        $reg_uacs = '50101010 01';
        $amount = DB::table('registry','burs_registry')->where('reg_uacs', $reg_uacs)
        ->whereMonth('reg_date', '=' ,$date->month)
        ->sum('reg_amount');

         $amount2 = DB::table('registry', 'burs_registry')->where('reg_uacs', $reg_uacs)
        ->whereBetween('reg_date', array($z, $time))
        ->sum('reg_amount');

        //Other Compensation
        //PERA
        $pera_uacs = '50102010 01';
        $pera_amount = DB::table('registry','burs_registry')->where('reg_uacs', $pera_uacs)
        ->whereMonth('reg_date', '=' ,$date->month)
        ->sum('reg_amount');

        $pera_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $pera_uacs)
        ->whereBetween('reg_date', array($z, $time))
        ->sum('reg_amount');

        //RA
        $ra_uacs = '50102020 00';
        $ra_amount = DB::table('registry','burs_registry')->where('reg_uacs', $ra_uacs)
        ->whereMonth('reg_date', '=' ,$date->month)
        ->sum('reg_amount');

        $ra_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $ra_uacs)
        ->whereBetween('reg_date', array($z, $time))
        ->sum('reg_amount');

        //TA
        $ta_uacs = '50102030 01';
        $ta_amount = DB::table('registry','burs_registry')->where('reg_uacs', $ta_uacs)
        ->whereMonth('reg_date', '=' ,$date->month)
        ->sum('reg_amount');

        $ta_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $ta_uacs)
        ->whereBetween('reg_date', array($z, $time))
        ->sum('reg_amount');

        //Clothing
        $clothing_uacs = '50102040 01';
        $clothing_amount = DB::table('registry','burs_registry')->where('reg_uacs', $clothing_uacs)
        ->whereMonth('reg_date', '=' ,$date->month)
        ->sum('reg_amount');

        $clothing_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $clothing_uacs)
        ->whereBetween('reg_date', array($z, $time))
        ->sum('reg_amount');

        //Year-end Bonus
        $yearend_uacs = '50102140 01';
        $yearend_amount = DB::table('registry','burs_registry')->where('reg_uacs', $yearend_uacs)
        ->whereMonth('reg_date', '=' ,$date->month)
        ->sum('reg_amount');

        $yearend_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $yearend_uacs)
        ->whereBetween('reg_date', array($z, $time))
        ->sum('reg_amount');

         //Cash Gift 
         $cash_uacs = '50102150 01';
         $cash_amount = DB::table('registry','burs_registry')->where('reg_uacs', $cash_uacs)
         ->whereMonth('reg_date', '=' ,$date->month)
         ->sum('reg_amount');
 
         $cash_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $cash_uacs)
         ->whereBetween('reg_date', array($z, $time))
         ->sum('reg_amount');

         //Productivity Enhancement Incentive
         $productivity_uacs = '50102990 12';
         $productivity_amount = DB::table('registry','burs_registry')->where('reg_uacs', $productivity_uacs)
         ->whereMonth('reg_date', '=' ,$date->month)
         ->sum('reg_amount');
 
         $productivity_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $productivity_uacs)
         ->whereBetween('reg_date', array($z, $time))
         ->sum('reg_amount');

         //Pag-ibig Contributions
         $pagibig_uacs = '50102990 12';
         $pagibig_amount = DB::table('registry','burs_registry')->where('reg_uacs', $pagibig_uacs)
         ->whereMonth('reg_date', '=' ,$date->month)
         ->sum('reg_amount');
 
         $pagibig_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $pagibig_uacs)
         ->whereBetween('reg_date', array($z, $time))
         ->sum('reg_amount');

         //PHILHEALTH Contribution
         $phil_uacs = '50103030 01';
         $phil_amount = DB::table('registry','burs_registry')->where('reg_uacs', $phil_uacs)
         ->whereMonth('reg_date', '=' ,$date->month)
         ->sum('reg_amount');
 
         $phil_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $phil_uacs)
         ->whereBetween('reg_date', array($z, $time))
         ->sum('reg_amount');

         //ECC Contribution
         $ecc_uacs = '50103040 01';
         $ecc_amount = DB::table('registry','burs_registry')->where('reg_uacs', $ecc_uacs)
         ->whereMonth('reg_date', '=' ,$date->month)
         ->sum('reg_amount');
 
         $ecc_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $ecc_uacs)
         ->whereBetween('reg_date', array($z, $time))
         ->sum('reg_amount');

         //Subsistence
         $subsistence_uacs = '50102050 02';
         $subsistence_amount = DB::table('registry','burs_registry')->where('reg_uacs', $subsistence_uacs)
         ->whereMonth('reg_date', '=' ,$date->month)
         ->sum('reg_amount');
 
         $subsistence_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $subsistence_uacs)
         ->whereBetween('reg_date', array($z, $time))
         ->sum('reg_amount');

         //Laundry Allowance
         $laundry_uacs = '50102060 03';
         $laundry_amount = DB::table('registry','burs_registry')->where('reg_uacs', $laundry_uacs)
         ->whereMonth('reg_date', '=' ,$date->month)
         ->sum('reg_amount');
 
         $laundry_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $laundry_uacs)
         ->whereBetween('reg_date', array($z, $time))
         ->sum('reg_amount');

         //Hazard Allowance
         $hazard_uacs = '50102110 04';
         $hazard_amount = DB::table('registry','burs_registry')->where('reg_uacs', $hazard_uacs)
         ->whereMonth('reg_date', '=' ,$date->month)
         ->sum('reg_amount');
 
         $hazard_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $hazard_uacs)
         ->whereBetween('reg_date', array($z, $time))
         ->sum('reg_amount');

         //Longevity Pay
         $long_uacs = '50102120 03';
         $long_amount = DB::table('registry','burs_registry')->where('reg_uacs', $long_uacs)
         ->whereMonth('reg_date', '=' ,$date->month)
         ->sum('reg_amount');
 
         $long_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $long_uacs)
         ->whereBetween('reg_date', array($z, $time))
         ->sum('reg_amount');

         //Terminal Leave Benefits
         $terminal_uacs = '50104990 99';
         $terminal_amount = DB::table('registry','burs_registry')->where('reg_uacs', $terminal_uacs)
         ->whereMonth('reg_date', '=' ,$date->month)
         ->sum('reg_amount');
 
         $terminal_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $terminal_uacs)
         ->whereBetween('reg_date', array($z, $time))
         ->sum('reg_amount');

         //RLIP
         $rlip_uacs = '50103010 00';
         $rlip_amount = DB::table('registry','burs_registry')->where('reg_uacs', $rlip_uacs)
         ->whereMonth('reg_date', '=' ,$date->month)
         ->sum('reg_amount');
 
         $rlip_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $rlip_uacs)
         ->whereBetween('reg_date', array($z, $time))
         ->sum('reg_amount');

         //Traveling Expenses - Local 
         $local_uacs = '50201010 00';
         $local_amount = DB::table('registry','burs_registry')->where('reg_uacs', $local_uacs)
         ->whereMonth('reg_date', '=' ,$date->month)
         ->sum('reg_amount');
 
         $local_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $local_uacs)
         ->whereBetween('reg_date', array($z, $time))
         ->sum('reg_amount');

         //Traveling Expenses - Foreign
         $foreign_uacs = '50201020 00';
         $foreign_amount = DB::table('registry','burs_registry')->where('reg_uacs', $foreign_uacs)
         ->whereMonth('reg_date', '=' ,$date->month)
         ->sum('reg_amount');
 
         $foreign_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $foreign_uacs)
         ->whereBetween('reg_date', array($z, $time))
         ->sum('reg_amount');

          //Training Expenses
          $training_uacs = '50202010 00';
          $training_amount = DB::table('registry','burs_registry')->where('reg_uacs', $training_uacs)
          ->whereMonth('reg_date', '=' ,$date->month)
          ->sum('reg_amount');
  
          $training_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $training_uacs)
          ->whereBetween('reg_date', array($z, $time))
          ->sum('reg_amount');

           //Office Supplies Expenses 
           $office_uacs = '50203010 00';
           $office_amount = DB::table('registry','burs_registry')->where('reg_uacs', $office_uacs)
           ->whereMonth('reg_date', '=' ,$date->month)
           ->sum('reg_amount');
   
           $office_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $office_uacs)
           ->whereBetween('reg_date', array($z, $time))
           ->sum('reg_amount');

           //Accountable Forms Expenses 
           $accountable_uacs = '50203020 00';
           $accountable_amount = DB::table('registry','burs_registry')->where('reg_uacs', $accountable_uacs)
           ->whereMonth('reg_date', '=' ,$date->month)
           ->sum('reg_amount');
   
           $accountable_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $accountable_uacs)
           ->whereBetween('reg_date', array($z, $time))
           ->sum('reg_amount');

           //Drugs and Medicine Expenses
           $drugs_uacs = '50203070 00';
           $drugs_amount = DB::table('registry','burs_registry')->where('reg_uacs', $drugs_uacs)
           ->whereMonth('reg_date', '=' ,$date->month)
           ->sum('reg_amount');
   
           $drugs_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $drugs_uacs)
           ->whereBetween('reg_date', array($z, $time))
           ->sum('reg_amount');

           //Medical, Dental and Lab. Supplies Expe. 
           $medical_uacs = '50203080 00';
           $medical_amount = DB::table('registry','burs_registry')->where('reg_uacs', $medical_uacs)
           ->whereMonth('reg_date', '=' ,$date->month)
           ->sum('reg_amount');
   
           $medical_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $medical_uacs)
           ->whereBetween('reg_date', array($z, $time))
           ->sum('reg_amount');

           //Fuel, Oil and Lubricants Expenses 
           $fuel_uacs = '50203090 00';
           $fuel_amount = DB::table('registry','burs_registry')->where('reg_uacs', $fuel_uacs)
           ->whereMonth('reg_date', '=' ,$date->month)
           ->sum('reg_amount');
   
           $fuel_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $fuel_uacs)
           ->whereBetween('reg_date', array($z, $time))
           ->sum('reg_amount');

            //Semi-Expendable exp.-Machinery 
            $machine_uacs = '5020321001';
            $machine_amount = DB::table('registry','burs_registry')->where('reg_uacs', $machine_uacs)
            ->whereMonth('reg_date', '=' ,$date->month)
            ->sum('reg_amount');
    
            $machine_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $machine_uacs)
            ->whereBetween('reg_date', array($z, $time))
            ->sum('reg_amount');

            //Semi-Expendable exp.-Office Equipment
            $semioffice_uacs = '5020321002';
            $semioffice_amount = DB::table('registry','burs_registry')->where('reg_uacs', $semioffice_uacs)
            ->whereMonth('reg_date', '=' ,$date->month)
            ->sum('reg_amount');
    
            $semioffice_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $semioffice_uacs)
            ->whereBetween('reg_date', array($z, $time))
            ->sum('reg_amount');

            //Semi-Expendable exp.-Information and Communun. 
            $semiinfo_uacs = '5020321003';
            $semiinfo_amount = DB::table('registry','burs_registry')->where('reg_uacs', $semiinfo_uacs)
            ->whereMonth('reg_date', '=' ,$date->month)
            ->sum('reg_amount');
    
            $semiinfo_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $semiinfo_uacs)
            ->whereBetween('reg_date', array($z, $time))
            ->sum('reg_amount');

            //Semi-Expendable exp.-Commun. Technology 
            $semitechno_uacs = '5020321007';
            $semitechno_amount = DB::table('registry','burs_registry')->where('reg_uacs', $semitechno_uacs)
            ->whereMonth('reg_date', '=' ,$date->month)
            ->sum('reg_amount');
    
            $semitechno_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $semitechno_uacs)
            ->whereBetween('reg_date', array($z, $time))
            ->sum('reg_amount');

            //Semi-Expendable exp.-Disaster Response and
            $semidisaster_uacs = '5020321008';
            $semidisaster_amount = DB::table('registry','burs_registry')->where('reg_uacs', $semidisaster_uacs)
            ->whereMonth('reg_date', '=' ,$date->month)
            ->sum('reg_amount');
    
            $semidisaster_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $semidisaster_uacs)
            ->whereBetween('reg_date', array($z, $time))
            ->sum('reg_amount');

            //Semi-Expendable exp.-Other Machinery & Equipment
            $semiother_uacs = '5020321099';
            $semiother_amount = DB::table('registry','burs_registry')->where('reg_uacs', $semiother_uacs)
            ->whereMonth('reg_date', '=' ,$date->month)
            ->sum('reg_amount');
    
            $semiother_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $semiother_uacs)
            ->whereBetween('reg_date', array($z, $time))
            ->sum('reg_amount');

            //Other Supplies & Materials Expenses
            $othersupp_uacs = '50203990 00';
            $othersupp_amount = DB::table('registry','burs_registry')->where('reg_uacs', $othersupp_uacs)
            ->whereMonth('reg_date', '=' ,$date->month)
            ->sum('reg_amount');
    
            $othersupp_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $othersupp_uacs)
            ->whereBetween('reg_date', array($z, $time))
            ->sum('reg_amount'); 

            //Water Expenses
            $water_uacs = '50204010 00';
            $water_amount = DB::table('registry','burs_registry')->where('reg_uacs', $water_uacs)
            ->whereMonth('reg_date', '=' ,$date->month)
            ->sum('reg_amount');
    
            $water_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $water_uacs)
            ->whereBetween('reg_date', array($z, $time))
            ->sum('reg_amount'); 

             //Electricity Expenses 
             $elect_uacs = '50204020 00';
             $elect_amount = DB::table('registry','burs_registry')->where('reg_uacs', $elect_uacs)
             ->whereMonth('reg_date', '=' ,$date->month)
             ->sum('reg_amount');
     
             $elect_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $elect_uacs)
             ->whereBetween('reg_date', array($z, $time))
             ->sum('reg_amount'); 

             //Postage and Deliveries 
             $postage_uacs = '50205010 00';
             $postage_amount = DB::table('registry','burs_registry')->where('reg_uacs', $postage_uacs)
             ->whereMonth('reg_date', '=' ,$date->month)
             ->sum('reg_amount');
     
             $postage_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $postage_uacs)
             ->whereBetween('reg_date', array($z, $time))
             ->sum('reg_amount'); 

             //Telephone Expenses - Mobile 
             $tele_uacs = '50205020 01';
             $tele_amount = DB::table('registry','burs_registry')->where('reg_uacs', $tele_uacs)
             ->whereMonth('reg_date', '=' ,$date->month)
             ->sum('reg_amount');
     
             $tele_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $tele_uacs)
             ->whereBetween('reg_date', array($z, $time))
             ->sum('reg_amount');
             
             //Telephone Expenses - Landline
             $tele2_uacs = '50205020 02';
             $tele2_amount = DB::table('registry','burs_registry')->where('reg_uacs', $tele2_uacs)
             ->whereMonth('reg_date', '=' ,$date->month)
             ->sum('reg_amount');
     
             $tele2_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $tele2_uacs)
             ->whereBetween('reg_date', array($z, $time))
             ->sum('reg_amount');

             //Inernet Expenses 
             $internet_uacs = '50205030 00';
             $internet_amount = DB::table('registry','burs_registry')->where('reg_uacs', $internet_uacs)
             ->whereMonth('reg_date', '=' ,$date->month)
             ->sum('reg_amount');
     
             $internet_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $internet_uacs)
             ->whereBetween('reg_date', array($z, $time))
             ->sum('reg_amount');

             //Extraordinary Expenses
             $extra_uacs = '50210030 00';
             $extra_amount = DB::table('registry','burs_registry')->where('reg_uacs', $extra_uacs)
             ->whereMonth('reg_date', '=' ,$date->month)
             ->sum('reg_amount');
     
             $extra_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $extra_uacs)
             ->whereBetween('reg_date', array($z, $time))
             ->sum('reg_amount');

              //Miscellaneous Expenses
              $misc_uacs = '50210030 00';
              $misc_amount = DB::table('registry','burs_registry')->where('reg_uacs', $misc_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $misc_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $misc_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');
              
              //Legal services 
              $legal_uacs = '50211010 00';
              $legal_amount = DB::table('registry','burs_registry')->where('reg_uacs', $legal_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $legal_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $legal_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Auditing Services
              $aud_uacs = '50211020 00';
              $aud_amount = DB::table('registry','burs_registry')->where('reg_uacs', $aud_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $aud_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $aud_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Consultancy Services
              $consult_uacs = '50211030 00';
              $consult_amount = DB::table('registry','burs_registry')->where('reg_uacs', $consult_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $consult_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $consult_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Other Professional Expenses
              $prof_uacs = '50211990 00';
              $prof_amount = DB::table('registry','burs_registry')->where('reg_uacs', $prof_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $prof_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $prof_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Janitorial Expenses
              $janitor_uacs = '50212020 00';
              $janitor_amount = DB::table('registry','burs_registry')->where('reg_uacs', $janitor_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $janitor_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $janitor_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Security Expenses
              $secu_uacs = '50212030 00';
              $secu_amount = DB::table('registry','burs_registry')->where('reg_uacs', $secu_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $secu_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $secu_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');
                
              //Other General Services
              $othergen_uacs = '50212990 00';
              $othergen_amount = DB::table('registry','burs_registry')->where('reg_uacs', $othergen_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $othergen_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $othergen_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Repair & Maint. - Other Land Improvements
              $repairother_uacs = '50213020 99';
              $repairother_amount = DB::table('registry','burs_registry')->where('reg_uacs', $repairother_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $repairother_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $repairother_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Repair & Main. - Building & Structures
              $repairbuilding_uacs = '50213040 01';
              $repairbuilding_amount = DB::table('registry','burs_registry')->where('reg_uacs', $repairbuilding_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $repairbuilding_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $repairbuilding_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Repair & Maint. - Machineries & Equipment
              $repairmachine_uacs = '50213050 00';
              $repairmachine_amount = DB::table('registry','burs_registry')->where('reg_uacs', $repairmachine_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $repairmachine_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $repairmachine_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Repair & Maint. - Office Equipment
              $repairoffice_uacs = '50213050 02';
              $repairoffice_amount = DB::table('registry','burs_registry')->where('reg_uacs', $repairoffice_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $repairoffice_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $repairoffice_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Repair & Maint. - ICT Equipment 
              $repairict_uacs = '50213050 03';
              $repairict_amount = DB::table('registry','burs_registry')->where('reg_uacs', $repairict_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $repairict_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $repairict_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Repair & Maint. - Communication Equipment
              $repaircomm_uacs = '50213050 07';
              $repaircomm_amount = DB::table('registry','burs_registry')->where('reg_uacs', $repaircomm_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $repaircomm_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $repaircomm_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Repair & Maint. - Technical & Scientific
              $repairtech_uacs = '50213050 14';
              $repairtech_amount = DB::table('registry','burs_registry')->where('reg_uacs', $repairtech_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $repairtech_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $repairtech_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Repair & Maint. - Transportation Equipment
              $repairtrans_uacs = '50213060 01';
              $repairtrans_amount = DB::table('registry','burs_registry')->where('reg_uacs', $repairtrans_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $repairtrans_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $repairtrans_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Repair & Maint. - Furniture & Fixtures
              $repairfurniture_uacs = '50213070 00';
              $repairfurniture_amount = DB::table('registry','burs_registry')->where('reg_uacs', $repairfurniture_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $repairfurniture_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $repairfurniture_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

              //Subsidies-Others
              $subsidies_uacs = '50214990 00';
              $subsidies_amount = DB::table('registry','burs_registry')->where('reg_uacs', $subsidies_uacs)
              ->whereMonth('reg_date', '=' ,$date->month)
              ->sum('reg_amount');
      
              $subsidies_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $subsidies_uacs)
              ->whereBetween('reg_date', array($z, $time))
              ->sum('reg_amount');

               //Local GIA
               $localgia_uacs = '50214990 00';
               $localgia_amount = DB::table('registry','burs_registry')->where('reg_uacs', $localgia_uacs)
               ->whereMonth('reg_date', '=' ,$date->month)
               ->sum('reg_amount');
       
               $localgia_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $localgia_uacs)
               ->whereBetween('reg_date', array($z, $time))
               ->sum('reg_amount');

               //SETUP
               $setup_uacs = '50214990 00';
               $setup_amount = DB::table('registry','burs_registry')->where('reg_uacs', $setup_uacs)
               ->whereMonth('reg_date', '=' ,$date->month)
               ->sum('reg_amount');
       
               $setup_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $setup_uacs)
               ->whereBetween('reg_date', array($z, $time))
               ->sum('reg_amount');

               //Taxes, Duties and Licenses
               $taxes_uacs = '50215010 01';
               $taxes_amount = DB::table('registry','burs_registry')->where('reg_uacs', $taxes_uacs)
               ->whereMonth('reg_date', '=' ,$date->month)
               ->sum('reg_amount');
       
               $taxes_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $taxes_uacs)
               ->whereBetween('reg_date', array($z, $time))
               ->sum('reg_amount');

                //Fidelity Bond Premiums
                $fidelity_uacs = '50215020 00';
                $fidelity_amount = DB::table('registry','burs_registry')->where('reg_uacs', $fidelity_uacs)
                ->whereMonth('reg_date', '=' ,$date->month)
                ->sum('reg_amount');
        
                $fidelity_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $fidelity_uacs)
                ->whereBetween('reg_date', array($z, $time))
                ->sum('reg_amount');

                //Insurance Expenses
                $insurance_uacs = '50215030 00';
                $insurance_amount = DB::table('registry','burs_registry')->where('reg_uacs', $insurance_uacs)
                ->whereMonth('reg_date', '=' ,$date->month)
                ->sum('reg_amount');
        
                $insurance_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $insurance_uacs)
                ->whereBetween('reg_date', array($z, $time))
                ->sum('reg_amount');

                //Advertising Expenses
                $ads_uacs = '50299010 00';
                $ads_amount = DB::table('registry','burs_registry')->where('reg_uacs', $ads_uacs)
                ->whereMonth('reg_date', '=' ,$date->month)
                ->sum('reg_amount');
        
                $ads_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $ads_uacs)
                ->whereBetween('reg_date', array($z, $time))
                ->sum('reg_amount');

                //Printing and Binding Services
                $print_uacs = '50299020 00';
                $print_amount = DB::table('registry','burs_registry')->where('reg_uacs', $print_uacs)
                ->whereMonth('reg_date', '=' ,$date->month)
                ->sum('reg_amount');
        
                $print_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $print_uacs)
                ->whereBetween('reg_date', array($z, $time))
                ->sum('reg_amount');

                //Representation Expenses
                $represent_uacs = '50299030 00';
                $represent_amount = DB::table('registry','burs_registry')->where('reg_uacs', $represent_uacs)
                ->whereMonth('reg_date', '=' ,$date->month)
                ->sum('reg_amount');
        
                $represent_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $represent_uacs)
                ->whereBetween('reg_date', array($z, $time))
                ->sum('reg_amount');

                //Transportation and Delivery Expenses
                $transpo_uacs = '50299040 00';
                $transpo_amount = DB::table('registry','burs_registry')->where('reg_uacs', $transpo_uacs)
                ->whereMonth('reg_date', '=' ,$date->month)
                ->sum('reg_amount');
        
                $transpo_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $transpo_uacs)
                ->whereBetween('reg_date', array($z, $time))
                ->sum('reg_amount');

                //Rent Expenses - Building
                $rent_uacs = '50299050 01';
                $rent_amount = DB::table('registry','burs_registry')->where('reg_uacs', $rent_uacs)
                ->whereMonth('reg_date', '=' ,$date->month)
                ->sum('reg_amount');
        
                $rent_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $rent_uacs)
                ->whereBetween('reg_date', array($z, $time))
                ->sum('reg_amount');

                 //Rent Expenses - Motor Vehicles
                 $rentmotor_uacs = '50299050 03';
                 $rentmotor_amount = DB::table('registry','burs_registry')->where('reg_uacs', $rentmotor_uacs)
                 ->whereMonth('reg_date', '=' ,$date->month)
                 ->sum('reg_amount');
         
                 $rentmotor_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $rentmotor_uacs)
                 ->whereBetween('reg_date', array($z, $time))
                 ->sum('reg_amount');

                 //Rent Expenses - Equipment
                 $rentequip_uacs = '50299050 04';
                 $rentequip_amount = DB::table('registry','burs_registry')->where('reg_uacs', $rentequip_uacs)
                 ->whereMonth('reg_date', '=' ,$date->month)
                 ->sum('reg_amount');
         
                 $rentequip_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $rentequip_uacs)
                 ->whereBetween('reg_date', array($z, $time))
                 ->sum('reg_amount');

                  //Membership Dues & Conts. to Org'ns. 
                  $membership_uacs = '50299060 00';
                  $membership_amount = DB::table('registry','burs_registry')->where('reg_uacs', $membership_uacs)
                  ->whereMonth('reg_date', '=' ,$date->month)
                  ->sum('reg_amount');
          
                  $membership_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $membership_uacs)
                  ->whereBetween('reg_date', array($z, $time))
                  ->sum('reg_amount');

                  //Subscription Expenses 
                  $subscript_uacs = '50299070 00';
                  $subscript_amount = DB::table('registry','burs_registry')->where('reg_uacs', $subscript_uacs)
                  ->whereMonth('reg_date', '=' ,$date->month)
                  ->sum('reg_amount');
          
                  $subscript_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $subscript_uacs)
                  ->whereBetween('reg_date', array($z, $time))
                  ->sum('reg_amount');
                  
                  //Other MOOE  
                  $othermooe_uacs = '50299990 99';
                  $othermooe_amount = DB::table('registry','burs_registry')->where('reg_uacs', $othermooe_uacs)
                  ->whereMonth('reg_date', '=' ,$date->month)
                  ->sum('reg_amount');
          
                  $othermooe_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $othermooe_uacs)
                  ->whereBetween('reg_date', array($z, $time))
                  ->sum('reg_amount');

                  //ICT Equipment
                  $ict_equip = '50604050 02';
                  $ict_equip_amount = DB::table('registry','burs_registry')->where('reg_uacs', $ict_equip)
                  ->whereMonth('reg_date', '=' ,$date->month)
                  ->sum('reg_amount');
          
                  $ict_equip_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $ict_equip)
                  ->whereBetween('reg_date', array($z, $time))
                  ->sum('reg_amount');

                   //ICT Software
                   $ict_software = '50604050 12';
                   $ict_software_amount = DB::table('registry','burs_registry')->where('reg_uacs', $ict_software)
                   ->whereMonth('reg_date', '=' ,$date->month)
                   ->sum('reg_amount');
           
                   $ict_software_amount2 = DB::table('registry','burs_registry')->where('reg_uacs', $ict_software)
                   ->whereBetween('reg_date', array($z, $time))
                   ->sum('reg_amount');


        $datez = request()->from_date;
        $data = BURS_Registry::all();
        PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf = PDF::loadview('components.printview.pdf_print3', compact('data','amount','amount2','pera_amount','pera_amount2','ra_amount','ra_amount2','ta_amount','ta_amount2',
    'clothing_amount','clothing_amount2','yearend_amount','yearend_amount2','cash_amount','cash_amount2','productivity_amount','productivity_amount2','pagibig_amount','pagibig_amount2',
'phil_amount','phil_amount2','ecc_amount','ecc_amount2','subsistence_amount','subsistence_amount2','laundry_amount','laundry_amount2','hazard_amount','hazard_amount2','long_amount','long_amount2',
'terminal_amount','terminal_amount2','rlip_amount','rlip_amount2','local_amount','local_amount2','foreign_amount','foreign_amount2','training_amount','training_amount2','office_amount','office_amount2','accountable_amount','accountable_amount2',
'drugs_amount','drugs_amount2','medical_amount','medical_amount2','fuel_amount','fuel_amount2','machine_amount','machine_amount2','semioffice_amount','semioffice_amount2','semiinfo_amount','semiinfo_amount2','semitechno_amount','semitechno_amount2',
'semidisaster_amount','semidisaster_amount2','semiother_amount','semiother_amount2','othersupp_amount','othersupp_amount2','water_amount','water_amount2','elect_amount','elect_amount2','postage_amount','postage_amount2','tele_amount','tele_amount2',
'tele2_amount','tele2_amount2','internet_amount','internet_amount2','extra_amount','extra_amount2','misc_amount','misc_amount2','legal_amount','legal_amount2','aud_amount','aud_amount2','consult_amount','consult_amount2','prof_amount','prof_amount2',
'janitor_amount','janitor_amount2','secu_amount','secu_amount2','othergen_amount','othergen_amount2','repairother_amount','repairother_amount2','repairbuilding_amount','repairbuilding_amount2','repairmachine_amount','repairmachine_amount2','repairoffice_amount',
'repairoffice_amount2','repairict_amount','repairict_amount2','repaircomm_amount','repaircomm_amount2','repairtech_amount','repairtech_amount2','repairtrans_amount','repairtrans_amount2','repairfurniture_amount','repairfurniture_amount2','subsidies_amount',
'subsidies_amount2','localgia_amount','localgia_amount2','setup_amount','setup_amount2','taxes_amount','taxes_amount2','fidelity_amount','fidelity_amount2','insurance_amount','insurance_amount2','ads_amount','ads_amount2','print_amount','print_amount2',
'represent_amount','represent_amount2','transpo_amount','transpo_amount2','rent_amount','rent_amount2','rentmotor_amount','rentmotor_amount2','rentequip_amount','rentequip_amount2','membership_amount','membership_amount2','subscript_amount','subscript_amount2',
'othermooe_amount','othermooe_amount2','ict_equip_amount','ict_equip_amount2','ict_software_amount','ict_software_amount2'));
        return $pdf->stream('Statement of allotment,OAB-'.$datez.'.pdf');

    }  


}
