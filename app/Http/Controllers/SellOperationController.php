<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Sell;
use App\Customer;
use DB;

class SellOperationController extends Controller
{
    public function index() {
      $sales = DB::select('select * from sells');
      $printSales= sell::latest()
      ->orderByRaw('(id)desc LIMIT 1')
      ->get();
      return view('seller.addDiscount',['sales'=>$sales], compact('printSales'));
   }


   public function show($id) {
     $sales = DB::select('select * from sells where id = ?',[$id]);

     $sales_info = DB::table('sells as sel')
          ->rightJoin('sales_items as si', 'sel.id', '=', 'si.sell_id')
          ->rightJoin('products as pro', 'si.product_id', '=', 'pro.id')
          ->select('si.*', 'pro.productName as productName', 'pro.buyPrice as buyPrice', 'pro.salePrice')
          ->where('sel.id', $id)
          ->get();
    $customers = Customer::latest()->get();

    $printSales= sell::latest()
    ->orderByRaw('(id)desc LIMIT 1')
    ->get();

    return view('seller.editSales',['sales'=>$sales], compact('sales_info', 'customers', 'printSales'));
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

     $sales_info = DB::table('sells as sel')
          ->rightJoin('sales_items as si', 'sel.id', '=', 'si.sell_id')
          ->rightJoin('products as pro', 'si.product_id', '=', 'pro.id')
          ->where('sel.id', $id)
          ->get();

      $cst_info = DB::table('sells as sel')
           ->rightJoin('customers as cst', 'sel.customer_phone', '=', 'cst.phone')
           ->where('sel.id', $id)
           ->get();


     return view('seller.invioce', compact('sales_info', 'sales', 'cst_info'));
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
