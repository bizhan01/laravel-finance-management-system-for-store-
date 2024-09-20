@extends('layouts.master')
@section('content')
<!-- Content -->
<div >
	<div class="content-area py-1 ">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
        <center> <h4>پرداخت های نقدی</h4> </center>
        <form method="POST" action="{{route('addDebite')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row form-group">
                <div class="col-md-4">
                  <label for="fullName" style="color: black">اسم تامین کننده<span style="color: red">*</span></label>
										<select class="form-control" name="supplier_phone" required id='selUser'>
											<option></option>
											@foreach($suppliers as $supplier)
											<option value="{{$supplier->phone}}">{{$supplier->name}} {{$supplier->lastName}} - {{$supplier->phone}}</option>
											@endforeach
										</select>
                </div>
                <div class="col-md-4">
                  <label for="profession" style="color: black">مبلغ <span style="color: red">*</span></label>
                  <input type="text"  name="paid" value=""  class="form-control txt" placeholder="مبلغ" required>
                </div>
								<div class="col-md-4">
									<label for="fullName" style="color: black">ذخیره </label><br>
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
			<center><h4 class="mb-1">لیست پرداخت های نقدی</h4></center>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>اسم </th>
            <th>تخلص</th>
            <th>شماره تماس</th>
            <th>مبلغ</th>
            <th class="<?php if (Auth::user()->isAdmin == '0'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>"></th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($purchases as $debite)
          <tr>
            <td>{{$debite->name}}</td>
            <td>{{$debite->lastName}}</td>
            <td>{{$debite->supplier_phone}}</td>
            <td>{{$debite->paid}}</td>
            <td style="display: flex; flex-direction: row; justify-content: center;" class="pull-left <?php if (Auth::user()->isAdmin == '0'): ?>
            <?php echo 'hide' ?>
             <?php endif ?>">
						 	<a class="text-primary" href="printDebite/{{ $debite->id }}"><i class="fa fa-print btn btn-rounded btn-primary"></i></a>  &nbsp  &nbsp
            	<a class="text-success" href="editDebite/{{ $debite->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a> &nbsp  &nbsp
							<a class="text-danger" href="deleteDebite/{{ $debite->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $sum += $debite->paid; ?>
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
      window.location.href = '<?= url('revenues') ?>'+'/'+from+'/'+to;
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
