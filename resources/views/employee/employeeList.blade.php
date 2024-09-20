@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>لیست کارمندان برحال</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">کارمندان</a></li>
			<li class="breadcrumb-item active">لیست کارمندان</li>
		</ol>

		@include('layouts.errors')

		<div class="box box-block bg-white">
			<div class="overflow-x-auto">
				<table class="table table-striped table-bordered dataTable" id="table-2">
					<thead>
						<tr>
							<td style="width: 50px !important; ">عکس</td>
							<th>آی دی(ID)</th>
							<th>اسم کامل</th>
							<th>اسم پدر</th>
							<th>شماره تماس</th>
							<th>وظیفه</th>
							<th>معاش</th>
							<th>شروع قرارداد</th>
							<th>ختم قرارداد</th>
							<td>عملیات</td>
						</tr>
					</thead>
					<tbody>
						@foreach($employees as $employee)
							<tr>
								<td  style="width: 50px !important; padding: 2px;">
									<img src="{{ asset('UploadedImages/employees').'/'.$employee->photo}}"  style="width: 100% !important; ">
								</td>
								<td dir="ltr" style="text-align: center;">{{ $employee->id }}</td>
								<td>{{ $employee->full_name}}</td>
								<td>{{ $employee->father_name }}</td>
								<td>{{ $employee->degree }}</td>
								<td>{{ $employee->position}}</td>
								<td>{{ $employee->salary}}</td>
								<td>{{ $employee->startDate}}</td>
								<td>{{ $employee->endDate}}</td>
								<td style="display: flex; flex-direction: row; justify-content: center;">
									<a href="{{url('editEmployee').'/' .$employee->id}}" title="ویرایش">
										<i class="ti-pencil-alt"></i>
									</a>
									&nbsp;&nbsp;&nbsp;
									<a href="{{url('deleteEmployee').'/' .$employee->id}}" title="حذف" onclick='return confirm("آیا مطمیین استید که حذف شود ؟")'>
										<i class="ti ti-trash text-danger"></i>
									</a>
									<!-- &nbsp;&nbsp;&nbsp;
									<a href="{{url('employeeDetails').'/' .$employee->id}}" title="جزئیات">
										<i class="fa fa-info"></i> -->
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
