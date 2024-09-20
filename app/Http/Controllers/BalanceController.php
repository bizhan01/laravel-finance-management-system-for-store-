<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Sell;
use App\User;
use DB;

class BalanceController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function blancess($from='', $to='') {
        if ($from == '' && $to == '') {

      $sales = DB::table('sells')
            ->where('transactionType','=', 1)
            ->where('customer_phone','!=', 0)
            ->whereDate('created_at', Carbon::today())
            ->orderBy('created_at')
            ->get();

    $pensions = DB::table('sells')
          ->where('transactionType','=', 2)
          ->where('customer_phone','!=', 0)
          ->whereDate('created_at', Carbon::today())
          ->orderBy('created_at')
          ->get();

      $deposits = DB::table('sells')
            ->where('transactionType','=', 3)
            ->where('customer_phone','!=', 0)
            ->whereDate('created_at', Carbon::today())
            ->orderBy('created_at')
            ->get();

          $purchases = DB::table('purchases')
                ->where('total','!=', Null)
                ->whereDate('created_at', Carbon::today())
                ->orderBy('created_at')
                ->get();

          $debits = DB::table('purchases')
                ->where('total','=', Null)
                ->whereDate('created_at', Carbon::today())
                ->orderBy('created_at')
                ->get();

            $expenses = DB::table('expenses')
                ->whereDate('created_at', Carbon::today())
                ->orderBy('created_at')
                ->get();

            $salaries = DB::table('salaries')
                ->whereDate('created_at', Carbon::today())
                ->orderBy('created_at')
                ->get();

        }
        else {
            $sales = DB::table('sells')
               ->where('transactionType','=', 1)
               ->where('customer_phone','!=', 0)
                ->whereBetween('created_at', [$from, $to])
                ->orderBy('id', 'desc')
                ->get();

        $pensions = DB::table('sells')
           ->where('transactionType','=', 2)
           ->where('customer_phone','!=', 0)
            ->whereBetween('created_at', [$from, $to])
            ->orderBy('id', 'desc')
            ->get();

            $deposits = DB::table('sells')
                ->where('transactionType','=', 3)
                ->where('customer_phone','!=', 0)
                ->whereBetween('created_at', [$from, $to])
                ->orderBy('id', 'desc')
                ->get();


            $purchases = DB::table('purchases')
                ->where('total','!=', Null)
                ->whereBetween('created_at',[$from, $to])
                ->orderBy('created_at')
                ->get();
            $debits = DB::table('purchases')
                ->where('total','=', Null)
                ->whereBetween('created_at',[$from, $to])
                ->orderBy('created_at')
                ->get();

            $expenses = DB::table('expenses')
                ->whereBetween('created_at',[$from, $to])
                ->orderBy('created_at')
                ->get();

            $salaries = DB::table('salaries')
                ->whereBetween('created_at',[$from, $to])
                ->orderBy('created_at')
                ->get();
        }
        return view('balance.balance',
         compact('sales', 'pensions', 'deposits', 'purchases', 'debits', 'expenses', 'salaries' ));
    }

}
