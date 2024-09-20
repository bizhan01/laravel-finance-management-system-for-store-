<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Debite;
use App\Supplier;
use App\Purchase;
use DB;


class DebiteController extends Controller
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

       $purchases = DB::table('suppliers as spl')
            ->rightJoin('purchases as pr', 'spl.phone', '=', 'pr.supplier_phone')
            ->where('total', Null)
            ->get();

       $suppliers = Supplier::latest()->get();
      return view('debite.debite', compact('purchases', 'suppliers'));
    }


    public function debites($from='', $to='') {
      if ($from=='' && $to=='') {
        $debites = DB::table('debites')
          ->whereDate('created_at', Carbon::today())
          ->orderBy('created_at')
          ->get();
      } else {
        $debites = DB::table('debites')
          ->whereBetween('created_at',[$from, $to])
          ->orderBy('created_at')
          ->get();
      }
      return view('debite.debite', compact('debites'));
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
            'supplier_phone'=>'required',
            'bill_number'=>'nullable',
            'total'=>'nullable',
            'paid'=>'required',

        ]);
          Purchase::create([
            'supplier_phone' => request('supplier_phone'),
            'bill_number' => request('bill_number'),
            'total' => request('total'),
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
         $debite = DB::select('select * from purchases where id = ?',[$id]);
         $suppliers = Supplier::latest()->get();
         return view('debite.editDebite',['debite'=>$debite], compact('suppliers'));
      }


      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Task  $task
       * @return \Illuminate\Http\Response
       */
       public function edit(Request $request,$id) {
          $supplier_phone = $request->input('supplier_phone');
          $paid = $request->input('paid');

          DB::update('update purchases set supplier_phone = ? where id = ?',[$supplier_phone, $id]);
          DB::update('update purchases set paid = ? where id = ?',[$paid, $id]);
          return redirect('/debite');
       }


       public function printDebite(Request $request, $id)
         {
           $debites = DB::table('suppliers as sup')
                ->rightJoin('purchases as deb', 'sup.phone', '=', 'deb.supplier_phone')
                ->where('deb.id', $id)
                ->get();
           return view('debite.invioce', compact('debites'));
         }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from purchases where id = ?',[$id]);
     return back();
   }
}
