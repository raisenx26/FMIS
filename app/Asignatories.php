<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatories extends Model
{
    protected $table = 'asignatories';

    protected $fillable = [
        'asignatories_id', 'asignatories_name', 'asignatories_position', 'created_at', 'updated_at'
    ];
}
