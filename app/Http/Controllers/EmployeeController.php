<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\Employee;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class EmployeeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function addEmployee() {
    	return view('employee.addEmployee');
    }

    // save student
    public function saveEmployee(Request $req) {
        $config = [
            'table' => 'employees',
            'length' => 4,
            'prefix' => date('y'),
            'reset_on_prefix_change' => true
        ];
       $emp_id = IdGenerator::generate($config);
    	 $this->validate($req, [
    		'full_name' => 'required|string',
    		'father_name' => 'required',
    		'degree' => 'nullable',
    		'salary' => 'required',
    		'startDate' => 'required',
    		'endDate' => 'nullable',
    		'position' => 'required',
    		'photo' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999'
    	], [
    		'full_name.required' => 'نام الزامی است',
    		'photo.image' => 'فایل باید از نوع عکس باشد',
    		'photo.mimes' => 'فارمت به فامت های jpeg,jpeg,png,jpg,gif باشد',
    		'photo.max' => 'سایز عکس بزرگ است',
    		'photo.uploaded' => 'عکس قابل آپلود نیست'
    	]);

        $photo_name = '';
		if($image = $req->file('photo')){
			$photo_name = date('YmdHis') . '.' . $image-> getClientOriginalExtension();
			$image -> move("UploadedImages/employees", $photo_name);
        }
        else {
          $photo_name = 'about.png';
        }

    	$employee = new Employee();
        $employee->id = $emp_id;
        $employee->full_name = $req->full_name;
      	$employee->father_name = $req->father_name;
      	$employee->degree = $req->degree;
      	$employee->salary = $req->salary;
      	$employee->startDate = $req->startDate;
      	$employee->endDate = $req->endDate;
      	$employee->position = $req->position;
      	$employee->photo = $photo_name;

    	try {
    		$employee->save();
            session()->flash('success', 'موفقانه ثبت شد');
    		session()->flash('emp_id', $emp_id);
    		return back();
    	} catch (Exception $e) {
    		session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
    		return back();
    	}
    }

    public function employeeList() {
        $employees = DB::table('employees')->where('status', 1)->latest()->get();
        return view('employee.employeeList', ['employees' => $employees]);
    }

    

    public function unemployedList() {
        $employees = DB::table('employees')->where('status', 0)->latest()->get();
        return view('employee.unemployedList', ['employees' => $employees]);
    }



    public function employeeDetails($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $slrInfo = DB::table('employees as emp')
                ->join('salaries as slr', 'emp.id', 'slr.emp_id')
                ->where('emp.id', $id)
                ->get();
            $employee = Employee::find($id)->toArray();
            return view('employee.employeeDetails', [
                'employee' => $employee,
                'slrInfo'=> $slrInfo
            ]);
        }
    }

    public function editEmployee($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $employee = Employee::find($id)->toArray();
            return view('employee.editEmployee', [
                'employee' => $employee
            ]);
        }
    }

    public function updateEmployee(Request $req) {
        $this->validate($req, [
            'full_name' => 'required|string',
            'father_name' => 'required',
            'degree' => 'nullable',
            'salary' => 'required',
            'startDate' => 'required',
            'endDate' => 'nullable',
            'position' => 'required',
            'photo' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999',
            'status' => 'required'
        ],
        [
            'full_name.required' => 'نام الزامی است',
            'photo.image' => 'فایل باید از نوع عکس باشد',
            'photo.mimes' => 'فارمت به فامت های jpeg,jpeg,png,jpg,gif باشد',
            'photo.max' => 'سایز عکس بزرگ است',
            'photo.uploaded' => 'عکس قابل آپلود نیست'
        ]);

        $photo_name = '';
        if($image = $req->file('photo')){
            $photo_name = date('YmdHis') . '.' . $image-> getClientOriginalExtension();
            $image -> move("UploadedImages/employees", $photo_name);
        }

        $employee = Employee::find($req->id);

        $employee->full_name = $req->full_name;
        $employee->father_name = $req->father_name;
        $employee->degree = $req->degree;
        $employee->salary = $req->salary;
        $employee->startDate = $req->startDate;
        $employee->endDate = $req->endDate;
        $employee->position = $req->position;
        $employee->status = $req->status;
        if ($photo_name != '') {
            $employee->photo = $photo_name;
        }

        try {
            $employee->save();
            session()->flash('success', 'موفقانه ثبت شد');
            return back();
        } catch (Exception $e) {
            session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
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
     DB::delete('delete from employees where id = ?',[$id]);
     return back();
   }


}
