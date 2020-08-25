<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTable extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'project_id';
    protected $fillable = [
        'lib_id','project_title','local_travel', 'foreign_travel','training_expense','officesupplies_expense','accountableforms_expense','drugsmedicine_expense',
        'mdl_supplies','fol_expense','semiexpendable_expense','osm_expense','water','electricity','postagecourier_service','mobile',
        'internetsub_expense','extramisc_expense','legal_service','auditing_service','consultancy_service','otherprofesional_service',
        'janitorial_service','security_service','othergeneral_service','land_improvement','building_otherstructure','office_equipment','ict_equipment','comms_equipment','printing_equipment',
        'techsci_equipment','transpo_equipment','furniture_fixture','other_subsidy','local_gia','setup','taxduties_license','fidelitybond_premiums',
        'insurance_expense','advertising_expense','printingpub_expense','representation_expense','transpodelivery_expense','building_structure',
        'equipment','motor_vehicle','subscription_expense','other_mooe','transpoequipment_motorvehicle'
    ];
}
