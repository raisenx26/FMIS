<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RCTable extends Model
{
    protected $table = 'rescenters';

    protected $fillable = [
        'id', 'description', 'PAP',
    ];
}
