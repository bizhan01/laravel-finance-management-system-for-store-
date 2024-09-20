@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area pb-1">
	<div class="profile-header mb-1">
		<div class="profile-header-cover img-cover" style="background-image: url({{asset('img/photos-1/5.jpg')}});"></div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-md-3">
				<div class="card profile-card">
					<div class="profile-avatar">
						<img src="{{asset('UploadedImages/employees').'/'.$employee['photo']}}" alt="">
					</div>
					<div class="card-block">
						<h4 class="mb-0-25">{{ $employee['full_name'] }}</h4>
						<div class="text-muted mb-1">{{ $employee['id'] }}</div>
					</div>
					<ul class="list-group">
						<a class="list-group-item" href="#">
						آی دی:	{{ $employee['id'] }}
						</a>
						<a class="list-group-item" href="#">
							اسم:	{{ $employee['full_name'] }}
						</a>
						<a class="list-group-item" href="#">
						اسم پدر:	{{ $employee['father_name'] }}
						</a>
						<a class="list-group-item" href="#">
						درجه تحصیل:	{{ $employee['degree'] }}
						</a>
						<a class="list-group-item" href="#">
						وظیفه:	{{ $employee['position'] }}
						</a>
					</ul>
				</div>
			</div>
			<div class="card white col-sm-8 col-md-9"><br>
				<center><h3>آمار معاشات کارمند</h3></center>
	      <table class=" table  table-striped table-bordered dataTable" id="table-1">
	        <thead>
	          <tr>
	            <th>آی دی</th>
	            <th>اسم کامل</th>
	            <th>اسم پدر</th>
	            <th>وظیفه</th>
	            <th>تاریخ</th>
	            <th>معاش</th>
	            <th>پرداخت</th>
	            <th>باقیات</th>
	          </tr>
	        </thead>
	        <tbody>
	          <?php $sum1=0; $sum2=0; $sum3=0; ?>
	          @foreach($slrInfo as $salary)
	          <tr>
	            <td>{{$salary->emp_id}}</td>
							<td>{{$salary->full_name}}</td>
							<td>{{$salary->father_name}}</td>
							<td>{{$salary->position}}</td>
	            <td>{{$salary->month}} - {{$salary->year}}</td>
	            <td>{{$salary->salary}}</td>
	            <td>{{$salary->paid}}</td>
	            <td>{{$rest = $salary->salary - $salary->paid}}</td>
	          </tr>
	          <?php $sum1 += $salary->salary; ?>
	          <?php $sum2 += $salary->paid; ?>
	          <?php $sum3 += $rest; ?>
	          @endforeach
	          <tfoot>
	            <tr>
	              <th colspan="5">جمله مصارف</th>
	              <th colspan="1"><?php echo $sum1; ?></th>
	              <th colspan="1"><?php echo $sum2; ?></th>
	              <th colspan="4"><?php echo $sum3; ?></th>
	            </tr>
	          </tfoot>
	        </tbody>
	      </table>
			</div>
		</div>
	</div>
</div>
@endsection
