@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>ویرایش اطلاعات کارمند</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">کارمند</a></li>
			<li class="breadcrumb-item active">ویرایش اطلاعات کارمند</li>
		</ol>
		<div class="box box-block bg-white">

			<!-- <p class="font-90 text-muted mb-1">Use <code>data-mask</code> to the input element.</p> -->

			@include('layouts.errors')

			<form method="post" action="{{ route('updateEmployee') }}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$employee['id']}}">
				<div class="row">
					<!-- <div class="col-md-2">
						<div class="form-group">
							<label>آی دی</label>
							<input type="text" readonly class="form-control" name="full_name" value="{{$employee['id']}}" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div> -->

					<div class="col-md-3">
						<div class="form-group">
							<label>اسم کامل <span style="color: red">*</span></label>
							<input type="text" class="form-control" name="full_name" value="{{$employee['full_name']}}" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label>اسم پدر <span style="color: red">*</span></label>
							<input type="text" class="form-control" name="father_name" value="{{$employee['father_name']}}" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">شماره تماس</label>
							<input type="text" class="form-control" name="degree" value="{{$employee['degree']}}"  placeholder="اسم پدر" >
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>وظیفه <span style="color: red">*</span></label>
							<input type="text" class="form-control" name="position"  value="{{$employee['position']}}" placeholder="وظیفه" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>معاش<span style="color: red">*</span></label>
							<input type="text" class="form-control" name="salary" value="{{$employee['salary']}}" placeholder="0000 افغانی" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="">شروع قرارداد<span style="color: red">*</span></label>
							<input type="text" class="form-control" name="startDate" value="{{$employee['startDate']}}"  placeholder="روز/ماه/سال" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>ختم قرارداد</label>
							<input type="text" class="form-control" name="endDate"  value="{{$employee['endDate']}}" placeholder="روز/ماه/سال">
							<span class="font-90 text-muted"></span>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label>وضیعت کارمند</label>
							<select class="form-control" name="status" required>
								<option value="{{$employee['status']}}">انتخاب کنید</option>
								<option value="1">برحال</option>
								<option value="0">ترک کرده</option>
							</select>
						</div>
					</div>

				</div>



				<div class="row">
					<div class="col-md-12">
						<label>عکس</label>
				      <input type="file" name="photo" id="input-file-now" class="dropify" data-default-file="/UploadedImages/employees/{{$employee['photo']}}" />
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
