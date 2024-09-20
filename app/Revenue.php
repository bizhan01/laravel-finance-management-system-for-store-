<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable = ['date','source','amount', 'description'];


    public static function ScopeFilter($query ,$filters)
      {
        if($month =$filters['month']){
          $query->whereMonth('date', Carbon::parse($month)->month);
        }

        if($year=$filters['year']){
          $query->whereYear('date', $year);
        }
      }

}
