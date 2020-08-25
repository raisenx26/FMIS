<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BURS_Registry extends Model
{
    protected $table = 'burs_registry';
    protected $primaryKey = 'reg_refnum';
    protected $fillable = [
        'reg_subamount', 'reg_fundcluster', 'reg_address', 'reg_date', 'reg_orsnum', 'reg_payee', 'reg_rc', 'reg_pap', 'reg_uacs', 'reg_amount', 'reg_particualrs', 'reg_subaccode', 'reg_remarks', 'created_at',
    ];
}
