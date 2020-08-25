<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LIBTable extends Model
{
    protected $table = 'lineitem_budget';
    protected $primaryKey = 'lib_id';
    protected $fillable = [
        'project_title', 'implementing_agency','project_duration','projectfund_source','project_budget','project_leader',
        'monitoring_agency',
    ];
}
