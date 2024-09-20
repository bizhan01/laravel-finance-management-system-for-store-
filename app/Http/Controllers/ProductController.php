<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Product;
use App\Category;
use DB;

class ProductController extends Controller
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
      $products = Product::latest()->get();
      $categories = Category::get();
      return view('products.addProduct', compact('products', 'categories'));
    }


    public function inventory()
    {
      // $products = Product::latest()->get();
      $products = DB::table('sales_items as pr')
            ->rightJoin('products as sup', 'sup.id', 'pr.product_id')
            ->select(["product_id as product_id", DB::raw("SUM(product_qty) as buy_tot"), 'sup.*'])
            ->groupBy('sup.id')
            ->get();

      return view('products.inventory', [  'products' => $products]);
    }

    public function assets()
    {
      $products = Product::latest()->get();
      return view('products.assets', [  'products' => $products]);
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
            'productName'=>'required',
            'category'=>'required',
            'productCode'=>'required|unique:products',
            'buyPrice'=>'required', 'max:255',
            'salePrice'=>'required', 'max:255',
            'quantity'=>'required'

        ]);

          Product::create([
              'productName' => request('productName'),
              'category' => request('category'),
              'productCode' => request('productCode'),
              'buyPrice' => request('buyPrice'),
              'salePrice' => request('salePrice'),
              'quantity' => request('quantity'),
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
       $product = DB::select('select * from products where id = ?',[$id]);
       return view('products.editProduct',['product'=>$product]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request,$id) {
         $productName = $request->input('productName');
         $category = $request->input('category');
         $productCode = $request->input('productCode');
         $buyPrice = $request->input('buyPrice');
         $salePrice = $request->input('salePrice');
         $quantity = $request->input('quantity');


         DB::update('update products set productName = ? where id = ?',[$productName,$id]);
         DB::update('update products set category = ? where id = ?',[$category,$id]);
         DB::update('update products set productCode = ? where id = ?',[$productCode,$id]);
         DB::update('update products set buyPrice = ? where id = ?',[$buyPrice,$id]);
         DB::update('update products set salePrice = ? where id = ?',[$salePrice,$id]);
         DB::update('update products set quantity = ? where id = ?',[$quantity,$id]);
         return redirect('/product');
      }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from products where id = ?',[$id]);
     return back();
   }

}
