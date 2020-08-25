<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monthly_sum extends Model
{
    protected $table = 'monthly_sum';
    protected $primaryKey = 'monthly_id';
    protected $fillable = [
        'monthly_date', 'aa_salaries', 'ar_salaries', 'aa_pera', 'ar_pera', 'aa_ra', 'ar_ra', 'aa_ta', 'ar_ta', 'aa_clothing', 'ar_clothing', 'aa_year_end', 'ar_year_end', 'aa_cash', 'ar_cash',
        'aa_productivity','ar_productivity','aa_pag_ibig','ar_pag_ibig','aa_philheath','ar_philheath','aa_ecc','ar_ecc','aa_subsistence','ar_subsistence','aa_laundry','ar_laundry','aa_hazard',
        'ar_hazard','aa_longevity','ar_longevity','aa_terminal','ar_terminal','aa_rlip','ar_rlip','aa_local','ar_local','aa_foreign','ar_foreign','aa_training','ar_training','aa_office','ar_office',
        'aa_accountable','ar_accountable','aa_drugs','ar_drugs','aa_medical','ar_medical','aa_fuel','ar_fuel','aa_semi_machinery','ar_semi_machinery','aa_semi_office','ar_semi_office','aa_semi_information','ar_semi_information',
        'aa_semi_communication','ar_semi_communication','aa_semi_disaster','ar_semi_disaster','aa_semi_other','ar_semi_other','aa_other_supp','ar_other_supp','aa_water','ar_water','aa_electricity','ar_electricity',
        'aa_postage','ar_postage','aa_telephone_mobile','ar_telephone_mobile','aa_telephone_landline','ar_telephone_landline','aa_internet','ar_internet','aa_extraordinary','ar_extraordinary','aa_miscellaneous','ar_miscellaneous',
        'aa_legal','ar_legal','aa_auditing','ar_auditing','aa_consultancy','ar_consultancy','aa_other_prof','ar_other_prof','aa_janitor','ar_janitor','aa_security','ar_security','aa_other_general','ar_other_general',
        'aa_repair_other','ar_repair_other','aa_rm_building','ar_rm_building','aa_rm_machineries','ar_rm_machineries','aa_rm_Office','ar_rm_Office','aa_rm_ict','ar_rm_ict','aa_rm_commercial','ar_rm_commercial','aa_rm_technical','ar_rm_technical',
        'aa_rm_transportation','ar_rm_transportation','aa_rm_furnitures','ar_rm_furnitures','aa_local_gia','ar_local_gia','aa_setup','ar_setup','aa_taxes','ar_taxes','aa_fidelity','ar_fidelity','aa_insurance','ar_insurance','aa_advertising','ar_advertising',
        'aa_printing','ar_printing','aa_representation','ar_representation','aa_transportation','ar_transportation','aa_rent_building','ar_rent_building','aa_rent_motor','ar_rent_motor','aa_rent_equipment','ar_rent_equipment','aa_membership',
        'ar_membership','aa_sub','ar_sub','aa_other_mooe','ar_other_mooe',
    ];
}
