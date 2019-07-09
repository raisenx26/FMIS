<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UACSTable extends Model
{
    protected $table = 'UACS';
    protected $fillable = [
        'id', 'description',
    ];
}
