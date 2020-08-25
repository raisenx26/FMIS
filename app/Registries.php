<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registries extends Model
{
    protected $table = 'registry';
    protected $primaryKey = 'reg_refnum';
    protected $fillable = [
        'reg_subamount', 'reg_fundcluster', 'reg_office', 'reg_address', 'reg_date', 'reg_orsnum', 'reg_payee', 'reg_rc', 'reg_pap', 'reg_uacs', 'reg_amount', 'reg_particualrs', 'reg_subaccode', 'reg_remarks', 'reg_subamount',
    ];
}
