<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
  protected $fillable = ['name', 'month','year', 'salary', 'paid'];
}
