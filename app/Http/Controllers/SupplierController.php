<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Supplier;
use DB;


class SupplierController extends Controller
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
      $suppliers = Supplier::latest()->get();
      return view('supplier.addSupplier', compact('suppliers',));
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
            'lastName'=>'nullable',
            'phone'=>'required|min: 10|max: 10|unique:suppliers',
            'address'=>'nullable',

    ]);
      Supplier::create([
          'name' => request('name'),
          'lastName' => request('lastName'),
          'phone' => request('phone'),
          'address' => request('address'),
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


    public function supplierDetails($id='') {
    if ($id == '') {
        return back();
    }
    else {
        $supplier = Supplier::find($id)->toArray();

        $prchInfo = DB::table('suppliers as spl')
            ->join('purchases as prch', 'spl.phone', 'prch.supplier_phone')
            ->where('spl.id', $id)
            ->where('prch.total','!=', Null)
            ->get();

      $debInfo = DB::table('suppliers as spl')
          ->join('purchases as prch', 'spl.phone', 'prch.supplier_phone')
          ->where('spl.id', $id)
          ->where('prch.total','=', Null)
          ->get();

        return view('supplier.supplierDetails', [
            'supplier' => $supplier,
            'prchInfo'=> $prchInfo,
            'debInfo'=> $debInfo
        ]);
    }
  }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */

       public function show($id) {
        $supplier = DB::select('select * from suppliers where id = ?',[$id]);
        return view('supplier.editSupplier',['supplier'=>$supplier]);
     }


     public function edit(Request $request,$id) {
        $name = $request->input('name');
        $lastName = $request->input('lastName');
        $phone = $request->input('phone');
        $address = $request->input('address');

        DB::update('update suppliers set name = ? where id = ?',[$name,$id]);
        DB::update('update suppliers set lastName = ? where id = ?',[$lastName,$id]);
        DB::update('update suppliers set phone = ? where id = ?',[$phone,$id]);
        DB::update('update suppliers set address = ? where id = ?',[$address,$id]);
        return redirect('/supplier');
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from suppliers where id = ?',[$id]);
     return back();
   }

}
