@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
        <div class="" style="padding: 50px">
          <h4>ویرایش پرداخت های نقدی</h4>
          <hr>
					<form action = "/editDebite/<?php echo $debite[0]->id; ?>" method = "post" enctype="multipart/form-data" >
						<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
           {{ csrf_field() }}
           <div class="row form-group">
               <div class="col-md-4">
                 <label for="fullName" style="color: black">اسم تامین کننده<span style="color: red">*</span></label>
								 <select class="form-control" name="supplier_phone" required style="height: 40px">
									 <option><?php echo $debite[0]->supplier_phone; ?></option>
									 @foreach($suppliers as $supplier)
									 <option value="{{$supplier->phone}}">{{$supplier->name}} {{$supplier->lastName}} - {{$supplier->phone}}</option>
									 @endforeach
								 </select>
               </div>
               <div class="col-md-4">
                 <label for="profession" style="color: black">مبلغ <span style="color: red">*</span></label>
                 <input type="text" name="paid" value="<?php echo $debite[0]->paid; ?>"  class="form-control txt" placeholder="مبلغ" required>
               </div>
							 <div class="col-md-4">
                 <label for="profession" style="color: black">عملیات</label><br>
								 <button type="submit" class="btn btn-rounded btn-success">ویرایش رکورد</button>
			           <button type="reset" class="btn btn-rounded btn-warning">لغو</button>
			           <a href="/deposit"><button type="button" class="btn btn-rounded btn-default">برگشت</button> </a>
               </div>
             </div>
            @include('layouts.errors')
        </div>
      </div>
    </div>
  </div>
@endsection
