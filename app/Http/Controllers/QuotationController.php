<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Quotation;
use App\QuotationItems;
use App\Product;
use DB;


class QuotationController extends Controller
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
      return view('quotation.quotation', compact('quotations'));
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
            'name'=>'nullable',
    ]);
      Quotation::create([
          'name' => request('name'),
          'created_at'=>carbon::now(),
          'updated_at'=>carbon::now(),
        ]);

        return redirect('/qtnDetails');
    }



    public function printQtn(Request $request,$id)
    {
      $quotations = DB::table('quotations as qtn')
                ->rightJoin('quotation_items as items', 'qtn.id', '=', 'items.qtn_id')
                ->rightJoin('products as pro', 'items.product_id', '=', 'pro.id')
                ->where('qtn.id', $id)
                ->get();

     return view('quotation.invioce', compact('quotations'));
    }

}
