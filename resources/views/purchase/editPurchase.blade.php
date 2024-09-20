@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
        <center><h3>ویرایش خریداری</h3></center><hr>
				<form action = "/editPurchase/<?php echo $purchase[0]->id; ?>" method = "post" enctype="multipart/form-data" >
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <div class="row form-group">
             <div class="col-lg-3">
               <label  for="Field of Study" style="color:black"> شماره تماس مشتری <span style="color: red">*</span></label>
               <!-- <input type="text"  name="supplier_phone" value="<?php echo $purchase[0]->supplier_phone; ?>" class="form-control" placeholder="شماره تماس مشتری" required> -->
							 <select class="form-control" name="supplier_phone" required style="height: 40px">
								 <option><?php echo $purchase[0]->supplier_phone; ?></option>
								 @foreach($suppliers as $supplier)
								 <option>{{$supplier->phone}}</option>
								 @endforeach
							 </select>
             </div>
             <div class="col-lg-3">
               <label  for="Field of Study" style="color:black">بابت</label>
               <input type="text"  name="regard" value="<?php echo $purchase[0]->regard; ?>" class="form-control" placeholder="بابت" >
             </div>
						 <div class="col-lg-2">
							 <label  for="Field of Study" style="color:black">نمبر فاکتور</label>
							 <input type="text"  name="bill_number" value="<?php echo $purchase[0]->bill_number; ?>" class="form-control" placeholder="نمبر فاکتور" >
						 </div>
						 <div class="col-lg-2">
               <label  for="Field of Study" style="color:black">مبلغ کلی <span style="color: red">*</span></label>
               <input type="number"  name="total" value="<?php echo $purchase[0]->total; ?>" class="form-control" placeholder="مبلغ کلی" required>
             </div>
             <div class="col-lg-2">
               <label  for="Field of Study" style="color:black">رسید</label>
               <input type="number"  name="paid" value="<?php echo $purchase[0]->paid; ?>" class="form-control" placeholder="رسید" >
             </div>
          </div>

          <div class="row form-group" >
             <div class="col-lg-12">
               <label  for="University Name" style="color:black">تصویر (اسکن فاکتور)</label>
               <input type="hidden" name="image" value="<?php echo $purchase[0]->image; ?>">
							 <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="/UploadedImages/<?php echo $purchase[0]->image; ?>" />
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
