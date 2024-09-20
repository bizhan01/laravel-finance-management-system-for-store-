<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Sell;
use App\Customer;
use App\Pension_items;
use DB;

class PensionOperationController extends Controller
{
    public function index() {
      $sales = DB::select('select * from sells');
      $printSales= sell::latest()
      ->orderByRaw('(id)desc LIMIT 1')
      ->get();
      return view('pension.addDiscount',['sales'=>$sales], compact('printSales'));
   }


   public function show($id) {
     $sales = DB::select('select * from sells where id = ?',[$id]);

     $pension_info = Pension_items::
            where('sell_id', $id)
          ->get();

    $customers = Customer::latest()->get();

    $printSales= sell::latest()
    ->orderByRaw('(id)desc LIMIT 1')
    ->get();

    return view('pension.editPension',['sales'=>$sales], compact('pension_info', 'customers', 'printSales'));
   }



   public function edit(Request $request,$id) {
     $customer_phone = $request->input('customer_phone');
     $subTotal = $request->input('subTotal');
     $total = $request->input('total');
     $discount = $request->input('discount');
     $paid = $request->input('paid');
     $description = $request->input('description');

     DB::update('update sells set customer_phone = ? where id = ?',[$customer_phone, $id]);
     DB::update('update sells set subTotal = ? where id = ?',[$subTotal, $id]);
     DB::update('update sells set total = ? where id = ?',[$total, $id]);
     DB::update('update sells set discount = ? where id = ?',[$discount, $id]);
     DB::update('update sells set paid = ? where id = ?',[$paid, $id]);
     DB::update('update sells set description = ? where id = ?',[$description, $id]);

    //  return redirect('/print');
       try {
       session()->flash('success', 'علمیات موافقانه انجام شد');
       return back();
       } catch(Exception $ex) {
       session()->flash('failed', 'خطا! دوباره کوشش کنید');
       return route('edititem');
     }
   }



   public function printInvioce(Request $request,$id)
   {
     $sales= sell::latest()
      ->where('id', $id)
     ->get();

     $pension_info = DB::table('sells as sel')
          ->rightJoin('pension_items as pi', 'sel.id', '=', 'pi.sell_id')
          ->where('sel.id', $id)
          ->get();



      $cst_info = DB::table('sells as sel')
           ->rightJoin('customers as cst', 'sel.customer_phone', '=', 'cst.phone')
           ->where('sel.id', $id)
           ->get();


     return view('pension.invioce', compact('pension_info', 'sales', 'cst_info'));
   }

   public function transactionDetails(Request $request,$id)
   {
     $sales_info = DB::table('sells as sel')
          ->rightJoin('sales_items as si', 'sel.id', '=', 'si.sell_id')
          ->rightJoin('users as ur', 'si.user_id', '=', 'ur.id')
          ->rightJoin('products as pro', 'si.product_id', '=', 'pro.id')
          ->where('sel.id', $id)
          ->get();

     return view('admin.transactionDetails', compact('sales_info'));
   }




}
