<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationItems extends Model
{
    protected $fillable = ['qtn_id', 'product_id', 'product_qty'];
}
