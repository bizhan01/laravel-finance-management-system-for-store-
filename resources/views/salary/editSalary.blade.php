@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
        <h4>ویرایش معاشات</h4>
        <hr>
        <form action = "/editSalary/<?php echo $salary[0]->id; ?>" method = "post" enctype="multipart/form-data" >
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          {{ csrf_field() }}
					<div class="row form-group">
							<div class="col-md-6">
								<label for="fullName" style="color: black">آی دی کارمند</label>
									<select class="form-control" name="name" required style="height: 40px">
	                	<option value="<?php echo $salary[0]->name; ?>"><?php echo $salary[0]->name; ?></option>
										@foreach($employees as $emp)
										<option value="{{$emp->full_name}}">{{$emp->full_name}} فرزند {{$emp->father_name}} - {{$emp->salary}}</option>
										@endforeach
	                </select>
							</div>
							<div class="col-md-6">
								<label for="fullName"  style="color: black">ماه</label>
								<select class="form-control" name="month" required style="height: 40px">
									 <option value="<?php echo $salary[0]->month; ?>"><?php echo $salary[0]->month; ?></option>
									 <option>حمل</option>
									 <option>ثور</option>
									 <option>جوزا</option>
									 <option>سرطان</option>
									 <option>اسد</option>
									 <option>سنبله</option>
									 <option>میزان</option>
									 <option>عقرب</option>
									 <option>قوس</option>
									 <option>جدی</option>
									 <option>دلو</option>
									 <option>حوت</option>
							 </select>
							</div>

						</div>
					<div class="row form-group">
						<div class="col-md-4">
							<label for="profession" style="color: black">سال</label>
							<select class="form-control" name="year" required style="height: 40px">
								<option value="<?php echo $salary[0]->year; ?>"><?php echo $salary[0]->year; ?></option>
								<?php
									for ($x = 1395; $x <= 1599; $x++) {?>
											<option><?php echo " $x "; ?></option>
								 <?php
									}	?>
							</select>
						</div>
							<div class="col-md-4">
								<label for="fullName" style="color: black">معاش </label>
								<input type="number" min="0" name="salary" value="<?php echo $salary[0]->salary; ?>" class="form-control" required>
							</div>
							<div class="col-md-4">
								<label for="profession" style="color: black">پرداخت</label>
								<input type="text" name="paid" id="sn"  value="<?php echo $salary[0]->paid; ?>"   class="form-control txt" placeholder="پرداخت" >
							</div>
					</div>
          @include('layouts.errors')
         <button type="submit" class="btn btn-success">ذخیره</button>
        <a href="/salary"><button type="reset" class="btn btn-primary">لغو</button> </a>
        <a href="/salary"><button type="button" class="btn btn-default">برگشت</button> </a>
        </form>
      </div>
    </div>
</div>
@endsection
