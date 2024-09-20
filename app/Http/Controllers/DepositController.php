<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Deposit;
use App\Customer;
use App\Sell;
use DB;


class DepositController extends Controller
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
      $sale_numbers = sell::latest()
      ->orderByRaw('(id)desc LIMIT 1')
      ->get();

       $deposits = DB::table('customers as cst')
            ->rightJoin('sells as sl', 'cst.phone', '=', 'sl.customer_phone')
            ->where('transactionType', 3)
            ->get();

       $customers = Customer::latest()->get();
      return view('deposit.deposit', compact('deposits', 'customers', 'sale_numbers'));
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
            'bill_number'=>'required|unique:sells|numeric|between:800,100000',
            'customer_phone'=>'required',
            'transactionType'=>'required',
            'paid'=>'required',

        ]);
          Sell::create([
            'bill_number' => request('bill_number'),
            'customer_phone' => request('customer_phone'),
            'transactionType' => request('transactionType'),
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
         $deposit = DB::select('select * from sells where id = ?',[$id]);
         $customers = Customer::latest()->get();
         return view('deposit.editDeposit',['deposit'=>$deposit], compact('customers'));
      }


      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Task  $task
       * @return \Illuminate\Http\Response
       */
       public function edit(Request $request,$id) {
          $bill_number = $request->input('bill_number');
          $customer_phone = $request->input('customer_phone');
          $transactionType = $request->input('transactionType');
          $paid = $request->input('paid');

          DB::update('update sells set bill_number = ? where id = ?',[$bill_number, $id]);
          DB::update('update sells set customer_phone = ? where id = ?',[$customer_phone, $id]);
          DB::update('update sells set transactionType = ? where id = ?',[$transactionType, $id]);
          DB::update('update sells set paid = ? where id = ?',[$paid, $id]);
          return redirect('/deposit');
       }


       public function printDeposit(Request $request, $id)
         {
           $sale_numbers = sell::latest()
           ->where('id', $id)
           ->get();


           $deposits = DB::table('customers as cst')
                ->rightJoin('sells as dep', 'cst.phone', '=', 'dep.customer_phone')
                ->where('dep.id', $id)
                ->get();
           return view('deposit.invioce', compact('deposits', 'sale_numbers'));
         }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from sells where id = ?',[$id]);
     return back();
   }
}
