@extends('layouts.master')
@section('content')
<div>
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
        <center> <h4>پرداخت معاشات</h4> </center> <br>
        <form method="POST" action="{{route('addSalary')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row form-group">
              <div class="col-md-6">
                <label for="fullName" style="color: black">اسم کارمند</label>
								<select class="form-control" name="name" required style="height: 40px">
                	<option></option>
									@foreach($employees as $emp)
									<option value="{{$emp->full_name}}">{{$emp->full_name}} فرزند {{$emp->father_name}} - {{$emp->salary}}</option>
									@endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="fullName"  style="color: black">ماه <span style="color: red">*</span></label>
								<select class="form-control" name="month" required style="height: 40px">
									 <option value="">انتخاب کنید</option>
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
								<label for="profession" style="color: black">سال <span style="color: red">*</span></label>
								<select class="form-control" name="year" required style="height: 40px">
									<option value=""></option>
									<?php
										for ($x = 1395; $x <= 1599; $x++) {?>
												<option><?php echo " $x "; ?></option>
									 <?php
										}	?>
								</select>
							</div>
              <div class="col-md-4">
                <label for="fullName" style="color: black">معاش <span style="color: red">*</span></label>
								<input type="number" min="0" name="salary" value="" class="form-control" required>
              </div>
              <div class="col-md-4">
                <label for="profession" style="color: black">پرداخت <span style="color: red">*</span></label>
                <input type="text" name="paid" value=""   class="form-control txt" placeholder="پرداخت" >
              </div>

            </div>
            <div class="row form-group">
                <div class="col-md-6">
                    <button type="submit" name="submit" class="btn btn-rounded btn-primary"> <i class="fa fa-save"></i> ذخیره</button>
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
    <div class="box col-lg-12 col-md-12 col-sm-12 box-block bg-white">
			  <center><h4 class="mb-1">لیست معاشات</h4></center>
        <!-- date Start -->
        <div class="">
          <p class="font-90 text-muted mb-1">به اساس تاریخ میتوانید مصارف را ببینید.</p>
          <div class="row">
            <div class="col-md-4">
              <h6>از تاریخ</h6>
                <input type="date" name="from" class="form-control from" value="{{old('from')}}" required>
            </div>
            <div class="col-md-4">
              <h6>تا تاریخ</h6>
              <input class="form-control to" name="to" type="date" required>
            </div>
            <div class="col-md-4">
              <h6>&nbsp;</h6>
              <a href="">
                <button class="btn btn-success btn-block"  id="btnGetOrderByDate">
                  <a href="" class="text-black">نمایش</a>
                </button>
              </a>
            </div>
          </div>
        </div><hr>
        <!-- date End -->

      <table class=" table  table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>اسم</th>
            <th>تاریخ پرداخت</th>
            <th>معاش</th>
            <th>ماه</th>
            <th>پرداخت</th>
            <th>باقیات</th>
            <th>پرنت</th>
            <th class="<?php if (Auth::user()->isAdmin == '1'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>"></th>
          </tr>
        </thead>
        <tbody>
          <?php $sum1=0; $sum2=0; $sum3=0; ?>
          @foreach($salaries as $salary)
          <tr>
            <td>{{$salary->name}}</td>
						<td>{{$salary->created_at}}</td>
						<td>{{$salary->salary}}</td>
            <td>{{$salary->month}} - {{$salary->year}}</td>
            <td>{{$salary->paid}}</td>
            <td>{{$rest = $salary->salary - $salary->paid}}</td>
            <td><a class="text-primary" href="printSalary/{{ $salary->id }}"><i class="fa fa-print btn btn-rounded btn-primary"></i></a></td>
            <td class="pull-left <?php if (Auth::user()->isAdmin == '1'): ?>
            <?php echo 'hide' ?>
          	<?php endif ?>" style="display: flex; flex-direction: row; justify-content: center;">
						<a class="text-success" href="editSalary/{{ $salary->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a> &nbsp  &nbsp
						<a class="text-danger" href="deleteSalary/{{ $salary->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $sum1 += $salary->salary; ?>
          <?php $sum2 += $salary->paid; ?>
          <?php $sum3 += $rest; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="3">جمله مصارف</th>
              <th colspan="2"><?php echo $sum1; ?></th>
              <th colspan="1" style="background-color: yellow"><?php echo $sum2; ?></th>
              <th colspan="4"><?php echo $sum3; ?></th>
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
      window.location.href = '<?= url('expenses') ?>'+'/'+from+'/'+to;
    }else{
      alert('لطفا تارخ ها را انتخاب کنید');
    }
  });
</script>


@endsection
