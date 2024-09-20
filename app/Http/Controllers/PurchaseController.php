<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Purchase;
use App\Supplier;
use DB;

class PurchaseController extends Controller
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
    public function index()
    {
      $purchases = Purchase::where('total','!=', Null)->latest()->get();
      $suppliers = Supplier::latest()->get();
      return view('purchase.purchase', compact('purchases', 'suppliers'));
    }


    public function creditor()
    {
      $transactions = DB::table('purchases as pr')
            ->rightJoin('suppliers as sup', 'pr.supplier_phone', 'sup.phone')
            ->select(["supplier_phone as supplier_phone", DB::raw("SUM(total) as buy_tot"), DB::raw("SUM(paid) as pay_tot"), 'sup.*'])
            ->groupBy('supplier_phone')
            ->get();
      return view('purchase.creditors',[  'transactions' => $transactions]);
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
            'regard'=>'nullable',
            'bill_number'=>'nullable',
            'total'=>'required',
            'paid'=>'nullable',
            'image' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999'
        ]);
        if($image = $request->file('image')){
          $new_name =rand() . '.' . $image-> getClientOriginalExtension();
          $image -> move(public_path("UploadedImages"), $new_name);
        }
        else {
          $new_name = 'noBill.jpg';
        }
          Purchase::create([
              'supplier_phone' => request('supplier_phone'),
              'regard' => request('regard'),
              'bill_number' => request('bill_number'),
              'total' => request('total'),
              'paid' => request('paid'),
              'image' => $new_name,
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
       $purchase = DB::select('select * from purchases where id = ?',[$id]);
       $suppliers = Supplier::latest()->get();
       return view('purchase.editPurchase',['purchase'=>$purchase], compact('suppliers'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request,$id) {
         $supplier_phone = $request->input('supplier_phone');
         $regard = $request->input('regard');
         $bill_number = $request->input('bill_number');
         $total = $request->input('total');
         $paid = $request->input('paid');

         if($image = $request->file('image')){
           $new_name =rand() . '.' . $image-> getClientOriginalExtension();
           $image -> move("UploadedImages", $new_name);
         }
         else {
           $new_name = $request->input('image');
         };

         DB::update('update purchases set supplier_phone = ? where id = ?',[$supplier_phone,$id]);
         DB::update('update purchases set regard = ? where id = ?',[$regard,$id]);
         DB::update('update purchases set bill_number = ? where id = ?',[$bill_number,$id]);
         DB::update('update purchases set total = ? where id = ?',[$total,$id]);
         DB::update('update purchases set paid = ? where id = ?',[$paid,$id]);
         DB::update('update purchases set image = ? where id = ?',[$new_name,$id]);
         return redirect('/purchase');
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
