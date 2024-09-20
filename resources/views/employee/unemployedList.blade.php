@extends('layouts.master')
@section('content')
<div class="content-area py-1">
	<div class="container-fluid">
		<h4>لیست کارمندان ترک کرده</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">کارمندان</a></li>
			<li class="breadcrumb-item active">لیست کارمندان</li>
		</ol>

		@include('layouts.errors')

		<div class="box box-block bg-white">
			<div class="overflow-x-auto">
				<table class="table table-striped table-bordered dataTable" id="table-3">
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
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
