<?php

namespace App\Http\Controllers;

use App\LIBTable;
use App\ProjectTable;
use App\PayeeTable;
use App\RCTable;
use App\PAPTable;
use App\Registries;
use App\UACSTable;
use App\BURS_Registry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PDF;
use App\Asignatories;
use DB;
use App\Monthly_sum;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function LIB_store(Request $request)
    {
      
        //Add new LIB

        $lineitem_budget = new LIBTable;
        $lineitem_budget->project_title = request()->project_title;
        $lineitem_budget->implementing_agency = request()->implementing_agency;
        $lineitem_budget->project_duration = request()->project_duration;
        $lineitem_budget->projectfund_source = request()->projectfund_source;
        $lineitem_budget->project_budget = request()->project_budget;
        $lineitem_budget->project_leader = request()->project_leader;
        $lineitem_budget->monitoring_agency = request()->monitoring_agency;
        $lineitem_budget->save();
        activity()
        ->performedOn($lineitem_budget)
        ->log('New LIB record added');
        return redirect('components/LIB');
    }

    public function LIB_update($lib_id)
    {

        //Update Registry for LIB

        $LIB_updatedata = LIBTable::find($lib_id);
        $LIB_updatedata->project_title = request()->project_title;
        $LIB_updatedata->implementing_agency = request()->implementing_agency;
        $LIB_updatedata->project_duration = request()->project_duration;
        $LIB_updatedata->projectfund_source = request()->projectfund_source;
        $LIB_updatedata->project_budget = request()->project_budget;
        $LIB_updatedata->project_leader = request()->project_leader;
        $LIB_updatedata->monitoring_agency = request()->monitoring_agency;
        $LIB_updatedata->save();
        activity()
        ->performedOn($LIB_updatedata)
        ->log('LIB record updated');
        return redirect('components/LIB');
    }

    public function LIB_destroy($lib_id)
    {
        //Delete registry for LIB

        $LIB_deletedata = LIBTable::find($lib_id);
        $LIB_deletedata->delete();
        return redirect('components/LIB');
    }



    public function project_store(Request $request)
    {
      
        //Add new Program/Project

        $project = new ProjectTable;
        $project->project_title = request()->project_title;
        $project->projectfund_source = request()->project;
        $project->local_travel = request()->local_travel;
        $project->foreign_travel = request()->foreign_travel;
        $project->training_expense = request()->training_expense;
        $project->officesupplies_expense = request()->officesupplies_expense;
        $project->accountableforms_expense = request()->accountableforms_expense;
        $project->drugsmedicine_expense = request()->drugsmedicine_expense;
        $project->mdl_supplies = request()->mdl_supplies;
        $project->fol_expense = request()->fol_expense;
        $project->semiexpendable_expense = request()->semiexpendable_expense;
        $project->osm_expense = request()->osm_expense;
        $project->water = request()->water;
        $project->electricity = request()->electricity;
        $project->postagecourier_service = request()->postagecourier_service;
        $project->mobile = request()->mobile;
        $project->landline = request()->landline;
        $project->internetsub_expense = request()->internetsub_expense;
        $project->extramisc_expense = request()->extramisc_expense;
        $project->legal_service = request()->legal_service;
        $project->auditing_service = request()->auditing_service;
        $project->consultancy_service = request()->consultancy_service;
        $project->otherprofessional_service = request()->otherprofessional_service;
        $project->janitorial_service = request()->janitorial_service;
        $project->security_service = request()->security_service;
        $project->othergeneral_service = request()->othergeneral_service;
        $project->land_improvement = request()->land_improvement;
        $project->building_otherstructure = request()->building_otherstructure;
        $project->office_equipment = request()->office_equipment;
        $project->ict_equipment = request()->ict_equipment;
        $project->comms_equipment = request()->comms_equipment;
        $project->printing_equipment = request()->printing_equipment;
        $project->techsci_equipment = request()->techsci_equipment;
        $project->transpo_equipment = request()->transpo_equipment;
        $project->furniture_fixture = request()->furniture_fixture;
        $project->other_subsidy = request()->other_subsidy;
        $project->local_gia = request()->local_gia;
        $project->setup = request()->setup;
        $project->taxduties_license = request()->taxduties_license;
        $project->fidelitybond_premiums = request()->fidelitybond_premiums;
        $project->insurance_expense = request()->insurance_expense;
        $project->advertising_expense = request()->advertising_expense;
        $project->printingpub_expense = request()->printingpub_expense;
        $project->representation_expense = request()->representation_expense;
        $project->transpodelivery_expense = request()->transpodelivery_expense;
        $project->building_structure = request()->building_structure;
        $project->equipment = request()->equipment;
        $project->motor_vehicle = request()->motor_vehicle;
        $project->subscription_expense = request()->subscription_expense;
        $project->other_mooe = request()->other_mooe;
        $project->transpoequipment_motorvehicle = request()->transpoequipment_motorvehicle;
        $project->save();
        activity()
        ->performedOn($project)
        ->log('New Program/Project record added');
        return redirect('components/Project');



        // $project = App\Http\Controllers\crudController::get();
        // foreach ($lineitem_budget as $getData){
        //     $getData->lib_id = $getData->project_title;
        // }
        //     return view ('view_name', compact('lineitem_budget'));
    }

    public function project_update($project_id)
    {

        //Update Registry for Program/Project

        $project_updatedata = ProjectTable::find($project_id);
        $project_updatedata->project_title = request()->project_title;
        $project_updatedata->local_travel = request()->local_travel;
        $project_updatedata->foreign_travel = request()->foreign_travel;
        $project_updatedata->training_expense = request()->training_expense;
        $project_updatedata->officesupplies_expense = request()->officesupplies_expense;
        $project_updatedata->accountableforms_expense = request()->accountableforms_expense;
        $project_updatedata->drugsmedicine_expense = request()->drugsmedicine_expense;
        $project_updatedata->mdl_supplies = request()->mdl_supplies;
        $project_updatedata->fol_expense = request()->fol_expense;
        $project_updatedata->semiexpendable_expense = request()->semiexpendable_expense;
        $project_updatedata->osm_expense = request()->osm_expense;
        $project_updatedata->water = request()->water;
        $project_updatedata->electricity = request()->electricity;
        $project_updatedata->postagecourier_service = request()->postagecourier_service;
        $project_updatedata->mobile = request()->mobile;
        $project_updatedata->landline = request()->landline;
        $project_updatedata->internetsub_expense = request()->internetsub_expense;
        $project_updatedata->extramisc_expense = request()->extramisc_expense;
        $project_updatedata->legal_service = request()->legal_service;
        $project_updatedata->auditing_service = request()->auditing_service;
        $project_updatedata->consultancy_service = request()->consultancy_service;
        $project_updatedata->otherprofessional_service = request()->otherprofessional_service;
        $project_updatedata->janitorial_service = request()->janitorial_service;
        $project_updatedata->security_service = request()->security_service;
        $project_updatedata->othergeneral_service = request()->othergeneral_service;
        $project_updatedata->land_improvement = request()->land_improvement;
        $project_updatedata->building_otherstructure = request()->building_otherstructure;
        $project_updatedata->office_equipment = request()->office_equipment;
        $project_updatedata->ict_equipment = request()->ict_equipment;
        $project_updatedata->comms_equipment = request()->comms_equipment;
        $project_updatedata->printing_equipment = request()->printing_equipment;
        $project_updatedata->techsci_equipment = request()->techsci_equipment;
        $project_updatedata->transpo_equipment = request()->transpo_equipment;
        $project_updatedata->furniture_fixture = request()->furniture_fixture;
        $project_updatedata->other_subsidy = request()->other_subsidy;
        $project_updatedata->local_gia = request()->local_gia;
        $project_updatedata->setup = request()->setup;
        $project_updatedata->taxduties_license = request()->taxduties_license;
        $project_updatedata->fidelitybond_premiums = request()->fidelitybond_premiums;
        $project_updatedata->insurance_expense = request()->insurance_expense;
        $project_updatedata->advertising_expense = request()->advertising_expense;
        $project_updatedata->printingpub_expense = request()->printingpub_expense;
        $project_updatedata->representation_expense = request()->representation_expense;
        $project_updatedata->transpodelivery_expense = request()->transpodelivery_expense;
        $project_updatedata->building_structure = request()->building_structure;
        $project_updatedata->equipment = request()->equipment;
        $project_updatedata->motor_vehicle = request()->motor_vehicle;
        $project_updatedata->subscription_expense = request()->subscription_expense;
        $project_updatedata->other_mooe = request()->other_mooe;
        $project_updatedata->transpoequipment_motorvehicle = request()->transpoequipment_motorvehicle;
        $project_updatedata->save();
        activity()
        ->performedOn($project_updatedata)
        ->log('Program/Project record updated');
        return redirect('components/Project');
    }

    public function project_destroy($project_id)
    {
        //Delete registry for Program/Project

        $project_deletedata = ProjectTable::find($project_id);
        $project_deletedata->delete();
        return redirect('components/Project');
    }



    public function store(Request $request)
    {
      
        //Add new Registry for ORS

        $registry = new Registries;
        $registry->reg_refnum = request()->reg_refnum;
        $registry->reg_date = request()->reg_date;
        $registry->reg_orsnum = request()->reg_ors . request()->reg_ors2;
        $registry->reg_payee = request()->reg_payee;
        $registry->reg_rc = request()->reg_rc;
        $registry->reg_pap = request()->reg_pap;
        $registry->reg_uacs = request()->reg_uacs;
        $registry->reg_amount = request()->reg_amount;
        $registry->reg_particulars = request()->reg_particulars;
        $registry->reg_subaccode = request()->reg_subaccode;
        $registry->reg_remarks = request()->reg_remarks;
        $registry->timestamps = request()->timestamps;
        $registry->reg_fundcluster = request()->reg_fc;
        /*$registry->reg_address = request()->reg_payee_address;*/
        $registry->reg_subamount = request()->reg_subamount;
        $registry->save();
        activity()
        ->performedOn($registry)
        ->log('New ORS record added');
        return redirect('components/Registry');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $reg_refnum
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $reg_refnum
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $reg_refnum
     * @return \Illuminate\Http\Response
     */
    public function update($reg_refnum)
    {

        //Update Registry for ORS

        $updatedata = Registries::find($reg_refnum);
        $updatedata->reg_date = request()->reg_date;
        $updatedata->reg_orsnum = request()->reg_ors . request()->reg_ors2;
        $updatedata->reg_payee = request()->reg_payee;
        $updatedata->reg_rc = request()->reg_rc;
        $updatedata->reg_pap = request()->reg_pap;
        $updatedata->reg_uacs = request()->reg_uacs;
        $updatedata->reg_amount = request()->reg_amount;
        $updatedata->reg_particulars = request()->reg_particulars;
        $updatedata->reg_subaccode = request()->reg_subaccode;
        $updatedata->reg_subamount = request()->reg_subamount;
        $updatedata->reg_remarks = request()->reg_remarks;
        $updatedata->timestamps = request()->timestamps;
        $updatedata->save();
        activity()
        ->performedOn($updatedata)
        ->log('ORS record updated');
        return redirect('components/Registry');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $reg_refnum
     * @return \Illuminate\Http\Response
     */
    public function destroy($reg_refnum)
    {
        //Delete registry for ORS

        $deletedata = Registries::find($reg_refnum);
        $deletedata->delete();
        return redirect('components/Registry');
    }

    public function viewLIB()
    {
        //View Page for ORS Registry

        $lineitem_budget = LIBTable::all();
        $lineitem_budget1 = Crypt::encryptString(LIBTable::all('lib_id'));
 
        return view('/components/LIB', compact('lineitem_budget'));
    }

    public function viewProject()
    {
        //View Page for Program/Project

        $project = ProjectTable::all();
        $project1 = Crypt::encryptString(ProjectTable::all('project_id'));
 
        return view('/components/Project', compact('project'));
    }


    public function viewpage()
    {
        //View Page for ORS Registry

        $asignatories = Asignatories::all();
        $registry1 = Crypt::encryptString(Registries::all('reg_refnum'));
        $registry = Registries::all();
        $pap_data = PAPTable::all();
        $rc_data = RCTable::all();
        $payee_data = PayeeTable::all();
        $uacs_data = UACSTable::all();
        return view('/components/Registry', compact('registry', 'rc_data', 'pap_data', 'payee_data', 'uacs_data', 'registry1', 'asignatories'));
    }

    public function aboutus()
    {
        //View Page for About us Page
        return view('/components/aboutus');
    }


    
    public function printdata($reg_refnum)
    {
        //Print for ORS Registry

        $dataid = Registries::find($reg_refnum);
        $rc_data = Registries::all();
        $asig_data = Asignatories::where('asignatories_name', request()->asignatories_name)->first();
        PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf = PDF::loadview('components.printview.pdf_print', compact('asig_data', 'rc_data', 'dataid'));
        return $pdf->stream('timoy.pdf');
    }

    public function table_list()
    {

        //View Page for Filter ORS Registries

        $registry = Registries::all();
        
        $registry2 = $registry->unique('reg_rc');
        $registry2->values()->all();

        $rc_data = RCTable::all();
        $payee_data = PayeeTable::all();
        $uacs_data = UACSTable::all();
        return view('/components/table-list', compact('registry','registry2', 'rc_data', 'payee_data', 'uacs_data'));
    }
    public function viewbursregistry()
    {
        //View page for BURS Registry
        
        $bursregistry = BURS_Registry::all();
        $burs_rc_data = RCTable::all();
        $burs_payee_data = PayeeTable::all();
        $burs_uacs_data = UACSTable::all();
        $pap_data = PAPTable::all();
        $burs_asignatories = Asignatories::all();
        return view('/components/bursregistry', compact('bursregistry','pap_data', 'burs_rc_data', 'burs_payee_data', 'burs_uacs_data', 'burs_asignatories'));
    }

    public function burs_store(Request $request)
    {   

        //Add new BURS Registry

        $burs_registry = new BURS_Registry;
        $burs_registry->reg_refnum = request()->reg_refnum;
        $burs_registry->reg_fundcluster = request()->reg_fundcluster;
        $burs_registry->reg_date = request()->reg_date;
        $burs_registry->reg_orsnum = request()->reg_ors . request()->reg_ors2;
        $burs_registry->reg_payee = request()->reg_payee;
        $burs_registry->reg_rc = request()->reg_rc;
        $burs_registry->reg_pap = request()->reg_pap;
        $burs_registry->reg_uacs = request()->reg_uacs;
        $burs_registry->reg_amount = request()->reg_amount;
        $burs_registry->reg_particulars = request()->reg_particulars;
        $burs_registry->reg_subaccode = request()->reg_subaccode;
        $burs_registry->reg_subamount = request()->reg_subamount;
        $burs_registry->reg_remarks = request()->reg_remarks;
        $burs_registry->timestamps = request()->timestamps;
        /*$burs_registry->reg_address = request()->reg_payee_address;*/
        $burs_registry->save();
        activity()
        ->performedOn($burs_registry)
        ->log('New BURS record added');
        return redirect('components/bursregistry');
    }


    public function burs_update($reg_refnum)
    {
        //Update BURS Registry

        $burs_updatedata = BURS_Registry::find($reg_refnum);
        $burs_updatedata->reg_date = request()->reg_date;
        $burs_updatedata->reg_fundcluster = request()->reg_fundcluster;
        $burs_updatedata->reg_orsnum = request()->reg_ors . request()->reg_ors2;
        $burs_updatedata->reg_payee = request()->reg_payee;
        $burs_updatedata->reg_rc = request()->reg_rc;
        $burs_updatedata->reg_pap = request()->reg_pap;
        $burs_updatedata->reg_uacs = request()->reg_uacs;
        $burs_updatedata->reg_amount = request()->reg_amount;
        $burs_updatedata->reg_particulars = request()->reg_particulars;
        $burs_updatedata->reg_subaccode = request()->reg_subaccode;
        $burs_updatedata->reg_subamount = request()->reg_subamount;
        $burs_updatedata->reg_remarks = request()->reg_remarks;
        $burs_updatedata->timestamps = request()->timestamps;
        $burs_updatedata->save();
        activity()
        ->performedOn($burs_updatedata)
        ->log('BURS record updated');
        return redirect('components/bursregistry');
    }

   public function burs_printdata($reg_refnum)
    {
        //Print for BURS Registry

        $dataid = BURS_Registry::find($reg_refnum);
        $rc_data = BURS_Registry::all();
        $asig_data = Asignatories::where('asignatories_name', request()->asignatories_name)->first();
        PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf = PDF::loadview('components.printview.pdf_print2', compact('asig_data', 'rc_data', 'dataid'));
        return $pdf->stream('timoy.pdf');
    }

    public function monthly_edit($monthly_id)
    {
        //View For monthly print page

        $data = Monthly_sum::find($monthly_id);
        return view('components/monthlyprint', compact('data'));
    }

    public function table_list_burs()
    {
         //View Page for Filter BURS Registries

        $registry = Burs_Registry::all();
        $registry5 = $registry->unique('reg_rc');
        $registry5->values()->all();
      
        $rc_data = RCTable::all();
        $payee_data = PayeeTable::all();
        $uacs_data = UACSTable::all();
        return view('/components/table-list_burs', compact('registry','registry5', 'rc_data', 'payee_data', 'uacs_data'));
    }

    public function fetch_data_burs(Request $request)
    {
        //Filter for BURS Registries in `Filter BURS Registries Page`

        $input = $request->reg_rcz;

        if ($request->ajax()) {
            if ($request->from_date != '' && $request->to_date != '' && $input != '') {
                $data = DB::table('burs_registry')
                    ->whereBetween('reg_date', array($request->from_date, $request->to_date))
                    ->where('reg_rc', $input)
                    ->get(); 
            } 
            elseif ($request->from_date != '' && $request->to_date != '')
            {
                $data = DB::table('burs_registry')
                ->whereBetween('reg_date', array($request->from_date, $request->to_date))
                ->get();
            }
            else {
                $data = DB::table('burs_registry')->orderBy('reg_date', 'desc')->get();
               
            }
            echo json_encode($data);
        }
    }
}
