@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
        <div class="" style="padding: 50px">
          <h4>ویرایش دریافت های نقدی</h4>
          <hr>
					<form action = "/editDeposit/<?php echo $deposit[0]->id; ?>" method = "post" enctype="multipart/form-data" >
						<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
           {{ csrf_field() }}
           <div class="row form-group">
               <div class="col-md-4">
                 <label for="fullName" style="color: black">شماره تماس مشتری <span style="color: red">*</span></label>
                 <!-- <input type="text" name="customer_phone" value="<?php echo $deposit[0]->customer_phone; ?>" class="form-control" placeholder="شماره تماس مشتری" required> -->
								 <select class="form-control" name="customer_phone" required style="height: 40px">
 									<option> <?php echo $deposit[0]->customer_phone; ?></option>
 									@foreach($customers as $customer)
 									<option value="{{$customer->phone}}">{{$customer->name}} {{$customer->lastName}} - {{$customer->phone}}</option>
 									@endforeach
 								</select>
               </div>
							 <input type="hidden" name="transactionType" value="<?php echo $deposit[0]->transactionType; ?>">
               <div class="col-md-4">
                 <label for="profession" style="color: black">نمبر بیل<span style="color: red">*</span></label>
                 <input type="number" min="800" max="100000" name="bill_number" value="<?php echo $deposit[0]->bill_number; ?>"  class="form-control" placeholder="نمبر بیل" required>
               </div>
							 <div class="col-md-4">
								 <label for="profession" style="color: black">مبلغ <span style="color: red">*</span></label>
								 <input type="text" name="paid" value="<?php echo $deposit[0]->paid; ?>"  class="form-control txt" placeholder="مبلغ" required>
							 </div>
             </div>
						 <div class="row form-group">
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
