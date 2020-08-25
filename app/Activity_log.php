<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity_log extends Model
{
    //
    protected $table = 'activity_log';
    protected $fillable = [
        'id', 'log_name', 'description', 'subject_id', 'subject_type', 'causer_id', 'causer_type','properties', 'created_at', 'updated_at'
    ];
}
