<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yearly_budget extends Model
{
    //
 
    protected $table = 'yearly_budget';
    protected $fillable = [
        'year', 'amount', 'created_at',
         ];
}
