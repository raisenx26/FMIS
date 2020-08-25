<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yearly_budget2 extends Model
{
    //
    protected $table = 'yearly_budget2';
    protected $fillable = [
        'year', 'amount', 'created_at',
         ];
}
