<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['supplier_phone','regard', 'bill_number', 'total', 'paid','image'];
}
