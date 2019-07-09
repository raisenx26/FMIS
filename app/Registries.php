<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registries extends Model
{
    protected $table = 'Registry';
    protected $primaryKey = 'reg_refnum';
    protected $fillable = [
        'reg_date', 'reg_orsnum', 'reg_payee', 'reg_rc', 'reg_pap', 'reg_uacs', 'reg_amount', 'reg_particualrs', 'reg_subaccode', 'reg_remarks',
    ];
}
