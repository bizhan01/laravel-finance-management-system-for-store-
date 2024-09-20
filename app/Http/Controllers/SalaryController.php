<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\salary;
use App\Employee;
use DB;


class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
      $salaries = Salary::latest()->get();
      $employees = DB::table('employees')->where('status', 1)->latest()->get();
      return view('salary.salary', compact('salaries', 'employees'));
    }


    public function salaries($from='', $to='') {
      if ($from=='' && $to=='') {
        $salaries = DB::table('salaries')
          ->whereDate('created_at', Carbon::today())
          ->orderBy('created_at')
          ->get();
      } else {
        $salaries = DB::table('salaries')
          ->whereBetween('created_at',[$from, $to])
          ->orderBy('created_at')
          ->get();
      }
      return view('salary.salary', compact('salaries'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate(request(),[
            'name'=>'required',
            'month' => 'required',
            'year' =>'required',
            'salary' =>'required',
            'paid' => 'required',

        ]);

          Salary::create([
              'name' => request('name'),
              'month' => request('month'),
              'year' => request('year'),
              'salary' => request('salary'),
              'paid' => request('paid'),
              'created_at'=>carbon::now(),
              'updated_at'=>carbon::now(),

            ]);

        try {
         session()->flash('success', 'عملیات موافقانه اجرا شد ');
         return back();
         } catch(Exception $ex) {
         session()->flash('failed', 'خطا! دوباره کوشش کنید');
         return back();
       }
    }



        public function show($id) {
         $salary = DB::select('select * from salaries where id = ?',[$id]);
         $employees = DB::table('employees')->where('status', 1)->latest()->get();
         return view('salary.editSalary',['salary'=>$salary],['employees'=>$employees]);
      }


      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Task  $task
       * @return \Illuminate\Http\Response
       */
       public function edit(Request $request,$id) {
          $name = $request->input('name');
          $month = $request->input('month');
          $year = $request->input('year');
          $salary = $request->input('salary');
          $paid = $request->input('paid');

          DB::update('update salaries set name = ? where id = ?',[$name, $id]);
          DB::update('update salaries set month = ? where id = ?',[$month, $id]);
          DB::update('update salaries set year = ? where id = ?',[$year, $id]);
          DB::update('update salaries set salary = ? where id = ?',[$salary, $id]);
          DB::update('update salaries set paid = ? where id = ?',[$paid, $id]);
          return redirect('/salary');
       }


       public function printSalary(Request $request, $id)
         {
           $salaries = DB::table('salaries')
                 ->where('id', $id)
                 ->get();
           return view('salary.invioce', compact('salaries'));
         }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from salaries where id = ?',[$id]);
     return back();
   }
}
