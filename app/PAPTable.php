<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PAPTable extends Model
{
    //
    protected $table = 'pap';
    protected $fillable = [
        'pap_id', 'pap_name',
    ];
}
