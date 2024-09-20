@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
        <center><h3>ویرایش اطلاعات مشتری</h3></center>
				<form action = "/editCustomer/<?php echo $customer[0]->id; ?>" method = "post" enctype="multipart/form-data" >
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
					<div class="row form-group">
             <div class="col-lg-3">
               <label  for="Field of Study" style="color:black">نام <span style="color:red">*</span></label>
               <input type="text"  name="name"  value="<?php echo $customer[0]->name; ?>" class="form-control" placeholder="نام" required>
             </div>
             <div class="col-lg-3">
               <label  for="Field of Study" style="color:black">نام فامیلی</label>
               <input type="text"  name="lastName"  value="<?php echo $customer[0]->lastName; ?>" class="form-control" placeholder="نام فامیلی" >
             </div>
						 <div class="col-lg-3">
							 <label  for="Field of Study" style="color:black">شماره تماس <span style="color:red">*</span></label>
							 <input type="text" name="phone" value="<?php echo $customer[0]->phone; ?>" class="form-control"  >
						 </div>
						 <div class="col-lg-3">
							 <label  for="Field of Study" style="color:black">آدرس</label>
							 <input type="text"  name="address"  value="<?php echo $customer[0]->address; ?>" class="form-control" placeholder="آدرس" >
						 </div>
          </div>
          <div class="row form-group">
             <div class="col-md-4">
               <input type="submit" name="submit" value="ذخیره" class="btn btn-rounded btn-success " />
								<button type="reset" class="btn btn-rounded btn-warning"><li class="fa fa-remove"> لغو</li></button>
             </div>
          </div>
					@include('layouts.errors')
        </form>
      </nav>
    </div>
  </div>
@endsection
