<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
    protected $fillable = ['user_id','sell_id', 'product_id', 'product_qty'];
}
