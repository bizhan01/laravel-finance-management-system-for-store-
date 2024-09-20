<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Sell;
use App\Pension_items;
use DB;


class PensionItemsController extends Controller
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
        $sell_id= sell::latest()
        ->orderByRaw('(id)desc LIMIT 1')
        ->get();

        $sales= sell::latest()
        ->orderByRaw('(id)desc LIMIT 1')
        ->get();

       return view('pension.pensionDetails', compact('sell_id', 'sales'));
    }


    /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request) {
        $user_id = $request->user_id;
        $sell_id = $request->sell_id;
        $item = $request->item;
        $cost = $request->cost;


            for($i = 0; $i < count($user_id); $i++){

             $salesItem = DB::table('pension_items')->where('user_id', $user_id)->get();

              if($salesItem) {
                $this->validate(request(),[
               'id' => 'unique',
               'sell_id' => 'required',
               'item' => 'nullable',
               'cost' =>'required',
           ]);
             Pension_items::create([
              'user_id' => $user_id[$i],
              'sell_id' => $sell_id[$i],
              'item' => $item[$i],
              'cost' => $cost[$i],
              'created_at'=>carbon::now(),
              'updated_at'=>carbon::now(),
             ]);
           }else{
                    return redirect('/addDiscount');
             }
           }

           try {
           session()->flash('success', 'علمیات موافقانه انجام شد');
           return back();
           } catch(Exception $ex) {
           session()->flash('failed', 'خطا! دوباره کوشش کنید');
           return back();
         }

       }


       public function show($id) {
         $pro_info = DB::table('sales_items as si')
              ->rightJoin('products as pro', 'pro.id', '=', 'si.product_id')
              ->where('si.id', $id)
              ->get();

          // $products = Product::latest()->get();
          $sInfo = DB::select('select * from pension_items where id = ?',[$id]);

          $sales= sell::latest()
          ->orderByRaw('(id)desc LIMIT 1')
          ->get();
      return view('pension.editItem',['sInfo'=>$sInfo], compact('pro_info', 'sales'));
     }



       public function edit(Request $request,$id) {
        $user_id = $request->input('user_id');
        $sell_id = $request->input('sell_id');
        $item = $request->input('item');
        $cost = $request->input('cost');

        DB::update('update pension_items set user_id = ? where id = ?',[$user_id, $id]);
        DB::update('update pension_items set sell_id = ? where id = ?',[$sell_id, $id]);
        DB::update('update pension_items set item = ? where id = ?',[$item, $id]);
        DB::update('update pension_items set cost = ? where id = ?',[$cost, $id]);

        try {
         session()->flash('success', 'عملیات موافقانه اجرا شد ');
         return back();
         } catch(Exception $ex) {
         session()->flash('failed', 'خطا! دوباره کوشش کنید');
         return back();
       }
     }



       /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Task  $task
        * @return \Illuminate\Http\Response
        */
        public function destroy($id) {
          DB::delete('delete from pension_items where id = ?',[$id]);
          return back();
       }

}
