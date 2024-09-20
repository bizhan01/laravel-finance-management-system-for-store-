<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pension_items extends Model
{
    protected $fillable = ['user_id','sell_id', 'item', 'cost'];
}
