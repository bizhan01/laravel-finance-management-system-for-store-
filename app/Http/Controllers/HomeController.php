<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Employee;
use App\User;
use DB;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $empolyeeCount = DB::table('employees')->count('id');
        $users = DB::table('users')->count('id');
        $pure_revenu = DB::table('revenues')->whereMonth('date', Carbon::now())->sum('amount');
        $expenses = DB::table('expenses')->whereMonth('created_at', Carbon::now())->sum('amount');
        return view('home', compact('empolyeeCount', 'users',  'pure_revenu', 'expenses'));
    }


}
