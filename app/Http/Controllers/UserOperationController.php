<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use App\User;
use DB;

class UserOperationController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
        $admin = DB::table('users')->where('isAdmin', 0)->get();
        $cooks = DB::table('users')->where('isAdmin', 1)->get();
        $garcons = DB::table('users')->where('isAdmin', 2)->get();
        return view('employee.addUser', compact('admin','cooks','garcons'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($user) {
        $cooks = DB::table('users')->where('isAdmin', 1)->get();
        $garcons = DB::table('users')->where('isAdmin', 2)->get();
        return view('employee.addUser', compact('cooks','garcons'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
       DB::delete('delete from users where id = ?',[$id]);
       return redirect('/addUser');
    }
}
