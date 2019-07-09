<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayeeTable extends Model
{
    protected $table = 'Payee';
    protected $fillable = [
        'id', 'name',
    ];
}
