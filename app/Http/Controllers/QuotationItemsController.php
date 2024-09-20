<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Quotation;
use App\QuotationItems;
use App\Product;
use DB;


class QuotationItemsController extends Controller
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
        $quotations = Quotation::latest()
        ->orderByRaw('(id)desc LIMIT 1')
        ->get();

        $products = Product::latest()->get();

       return view('quotation.qtnDetails', compact('quotations', 'products'));
    }

    /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
       {
        $qtn_id = $request->qtn_id;
        $product_id = $request->product_id;
        $product_qty = $request->product_qty;


        for($i = 0; $i < count($qtn_id); $i++){

         $salesItem = DB::table('quotation_items')->where('qtn_id', $qtn_id)->get();

          if($salesItem)

            {
                $this->validate(request(),[
                 'id' => 'unique',
                 'qtn_id' => 'required',
                 'product_id' => 'required',
                 'product_qty' =>'required',
           ]);

                   QuotationItems::create([
                    'qtn_id' => $qtn_id[$i],
                    'product_id' => $product_id[$i],
                    'product_qty' => $product_qty[$i],
                    'created_at'=>carbon::now(),
                    'updated_at'=>carbon::now(),
                   ]);
           }else{
                    return back();
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

}
