@extends('layouts.master')
@section('content')
<!-- Content -->
<div>
	<div class="content-area py-1 ">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
        <center> <h4>دریافت های نقدی</h4> </center>
        <form method="POST" action="{{route('addDeposit')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row form-group">
                <div class="col-md-3">
                  <label for="fullName" style="color: black">اسم مشتری<span style="color: red">*</span></label>
									<select class="form-control" name="customer_phone" required  id='selUser' >
										<option>انتخاب کنید</option>
										@foreach($customers as $customer)
										<option value="{{$customer->phone}}">{{$customer->name}} {{$customer->lastName}} - {{$customer->phone}}</option>
										@endforeach
									</select>
                </div>
								<input type="hidden" name="transactionType" value="3">
								<div class="col-md-3">
									<label for="profession" style="color: black">نمبر بیل	@foreach($sale_numbers as $number)<span style="color: red">*</span> <b> نمبر قبلی: {{$number->bill_number}} </b> 	@endforeach</label>
									<input type="number" min="800" max="100000" name="bill_number" value=""  class="form-control" placeholder="نمبر بیل" required>
								</div>
                <div class="col-md-3">
                  <label for="profession" style="color: black">مبلغ  <span style="color: red">*</span></label>
                  <input type="text"  name="paid" value=""  class="form-control txt" placeholder="مبلغ" required>
                </div>
								<div class="col-md-3">
									<label for="fullName" style="color: black">ذخیره</label><br>
									<input type="submit" name="submit" value="ذخیره" class="btn btn-success form-control">
								</div>
              </div>
            @include('layouts.errors')
          </form>
        </div>
    </div>
	</div>
</div>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">
			  <center><h4 class="mb-1">لیست دریافت های نقدی</h4></center>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>اسم</th>
            <th>نمبر بیل</th>
            <th>شماره تماس</th>
            <th>مبلغ</th>
            <th class="<?php if (Auth::user()->isAdmin == '0'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>"></th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($deposits as $deposit)
          <tr>
            <td>{{$deposit->name}} {{$deposit->lastName}}</td>
            <td>{{$deposit->bill_number}}</td>
            <td>{{$deposit->customer_phone}}</td>
            <td>{{$deposit->paid}}</td>
            <td style="display: flex; flex-direction: row; justify-content: center;" class="pull-left <?php if (Auth::user()->isAdmin == '0'): ?>
            <?php echo 'hide' ?>
             <?php endif ?>">
						 	<a class="text-primary" href="printDeposit/{{ $deposit->id }}"><i class="fa fa-print btn btn-rounded btn-primary"></i></a>  &nbsp  &nbsp
            	<a class="text-success" href="editDeposit/{{ $deposit->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a> &nbsp  &nbsp
							<a class="text-danger" href="deleteDeposit/{{ $deposit->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $sum += $deposit->paid; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="3">جمله عواید</th>
              <th colspan="2"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script type="text/javascript" src="{{ asset('../vendors/jquery/jquery-1.12.3.min.js') }}"></script>
<script type="text/javascript">
  $(document).on('click','#btnGetOrderByDate',function(e){
    e.preventDefault();
    var from = $('.from').val();
    var to = $('.to').val();
    if (from.indexOf('/') > -1) {
      from = from.replace(/\//g,'-');
    }
    if (to.indexOf('/',to) > -1) {
      var to = to.replace(/\//g,'-');
    }
    if (from.length > 0 && to.length > 0) {
      window.location.href = '<?= url('deposits') ?>'+'/'+from+'/'+to;
    }else{
      alert('لطفا تاریخ را مشخص کنید!');
    }
  });


</script>


<!-- Script -->
 <script type="text/javascript" src="{{ asset('../jquery-3.2.1.min.js') }}"></script>
 <script>
 $(document).ready(function(){

		 // Initialize select2
		 $("#selUser").select2();

		 // Read selected option
		 $('#but_read').click(function(){
				 var username = $('#selUser option:selected').text();
				 var userid = $('#selUser').val();

				 $('#result').html("id : " + userid + ", name : " + username);
		 });
 });
 </script>

@endsection
