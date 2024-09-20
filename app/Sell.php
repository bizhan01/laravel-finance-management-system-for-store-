<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable = ['bill_number','customer_phone', 'transactionType', 'subTotal', 'total', 'discount', 'paid', 'description'];
}
