@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
        <center><h3>ویرایش محصول</h3></center><hr>
				<form action = "/editProduct/<?php echo $product[0]->id; ?>" method = "post" enctype="multipart/form-data" >
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <div class="row form-group">
             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black"> اسم محصول <span style="color: red">*</span></label>
               <input type="text"  name="productName" value="<?php echo $product[0]->productName; ?>" class="form-control" placeholder="اسم محصول" required>
             </div>

              <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">بخش <span style="color: red">*</span></label>
                <select class="form-control" name="category" required style="height: 40px">
                  <option value="<?php echo $product[0]->category; ?>"><?php echo $product[0]->category; ?></option>
                  <option value="1">پوشاک</option>
                  <option value="2">وسایل بهداشتی و آرایشی</option>
                  <option value="3">بوت و کیف</option>
                  <option value="4">سایر</option>
                </select>
              </div>

             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">کد محصول</label>
               <input type="text"  name="productCode" value="<?php echo $product[0]->productCode; ?>" class="form-control" placeholder="کد محصول" >
             </div>
          </div>

          <div class="row form-group">
             <div class="col-lg-4">
               <label  for="Field of Study" style="color:black">قیمت خرید <span style="color: red">*</span></label>
               <input type="text"  name="buyPrice" value="<?php echo $product[0]->buyPrice; ?>" class="form-control txt" placeholder="قیمت خرید" required>
             </div>

             <div class="col-lg-4">
               <label  for="Field of Study" style="color:black">قیمت فروش <span style="color: red">*</span></label>
               <input type="text"  name="salePrice" value="<?php echo $product[0]->salePrice; ?>" class="form-control txt" placeholder="قیمت فروش" required>
             </div>

             <div class="col-lg-4">
               <label  style="color:black">تعداد <span style="color: red">*</span></label>
               <input type="text"  name="quantity" value="<?php echo $product[0]->quantity; ?>" class="form-control txt" placeholder="تعداد" required>
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
