<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayeeTable extends Model
{
    protected $table = 'payee';
    protected $fillable = [
        'id', 'name',
    ];
}
