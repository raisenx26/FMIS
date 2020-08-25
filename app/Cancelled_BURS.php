<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancelled_BURS extends Model
{
    //
    protected $table = 'cancelled_BURS';
    public $timestamps = false;
    protected $primaryKey = 'cancel_refnum';
    protected $fillable = [
        'cancel_subamount', 'cancel_fundcluster', 'cancel_office', 'cancel_date', 'cancel_orsnum', 'cancel_payee', 'cancel_rc', 'cancel_pap', 'cancel_uacs', 'cancel_amount', 'cancel_particualrs', 'cancel_subaccode', 'cancel_remarks', 'cancel_subamount',
    ];
}
