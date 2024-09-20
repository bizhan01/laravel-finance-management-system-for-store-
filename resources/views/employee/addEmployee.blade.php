@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>ثبت کارمند جدید</h4>
		<div class="box box-block bg-white">
					@include('layouts.errors')
			<h5>فورم ثبت نام کارمندان:</h5>
			<!-- <p class="font-90 text-muted mb-1">Use <code>data-mask</code> to the input element.</p> -->
			<form method="post" action="{{ route('saveEmployee') }}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="student_id" value="<?php date_default_timezone_set('asia/kabul')?>{{date('yHis')}}">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>اسم کامل <span style="color: red">*</span></label>
							<input type="text" class="form-control" name="full_name" placeholder="اسم کوچک + اسم فامیلی" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>اسم پدر <span style="color: red">*</span></label>
							<input type="text" class="form-control" name="father_name"  placeholder="اسم پدر" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label for="">شماره تماس</label>
							<input type="text" class="form-control" name="degree"  placeholder="شماره تماس">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>وظیفه <span style="color: red">*</span></label>
							<input type="text" class="form-control" name="position"  placeholder="وظیفه" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>معاش<span style="color: red">*</span></label>
							<input type="text"   name="salary" class="form-control txt" placeholder="0000 افغانی" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>شروع قرارداد<span style="color: red">*</span></label>
							<input type="text" class="form-control" name="startDate"  placeholder="روز/ماه/سال" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="">ختم قرارداد</label>
							<input type="text" class="form-control" name="endDate"  placeholder="روز/ماه/سال">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<label>عکس</label>
				     <input type="file" name="photo" id="input-file-now" class="dropify"/>
					</div>
				</div>

				<br>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
							<i class="ti-save"></i>
							<span>ذخیره</span>
						</button>
						<button type="reset" class="btn btn-outline-danger mb-0-25 waves-effect waves-light">
							<i class="ti-loop"></i>
							<span>لغو</span>
						</button>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>
@endsection
