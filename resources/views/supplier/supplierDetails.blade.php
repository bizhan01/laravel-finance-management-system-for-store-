@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <div class="navbar navbar-light bg-white b-a mb-2">
				<center>
					<h3>صورت حساب تامین کننده</h3>
           <h6> اسم مشتری: {{ $supplier['name'] }} {{ $supplier['lastName'] }}</h6>
           <h6> شماره تماس: {{ $supplier['phone'] }}</h6>
           <h6> آدرس: {{ $supplier['address'] }}</h6>
				 </center><br>
					<div class="box box-block bg-white">
				 	 <center><h3>آمار خرید های انجام شده</h3></center>
				 		<div class="overflow-x-auto">
				 			<table class="table table-striped table-bordered dataTable" >
				 				<thead>
				 					<tr>
										<th>شماره</th>
				            <th>تاریخ</th>
				            <th>بابت</th>
				            <th>نمبر فاکتور</th>
				            <th>قیمت کلی</th>
				            <th>رسید</th>
				            <th>باقی</th>
				            <th>فاکتور</th>
				 					</tr>
				 				</thead>
				 				<tbody>
				 					<?php $total=0;  $received=0;  $rest=0; ?>
				 					@foreach($prchInfo as $info)
				 						<tr>
				 							<td>{{$loop->iteration}}</td>
					            <td>{{$info->created_at}}</td>
					            <td>{{$info->regard}}</td>
					            <td>{{$info->bill_number}}</td>
					            <td>{{$info->total}}</td>
					            <td>{{$info->paid}}</td>
					            <td>{{$info->total - $info->paid}}</td>
					            <td><a href="/UploadedImages/{{$info->image}}"><img src="/UploadedImages/{{$info->image}}" alt="No Image" style="height: 50px; width: 50px" /></a></td>
				 						</tr>
				 						<?php $total += $info->total; ?>
				 						<?php $received += $info->paid; ?>
				 						<?php $rest += $info->total -$info->paid; ?>

				 					@endforeach
				 				</tbody>
				 				<tfoot>
				 					<tr>
				 						<th colspan="3">جمله</th>
				 						<th colspan="1"><?php echo $total; ?></th>
				 						<th colspan="1"><?php echo $received; ?></th>
				 						<th colspan="2"><?php echo $rest; ?></th>

				 					</tr>
				 				</tfoot>
				 			</table>
				 		</div>
      	</div>

				<div class="box box-block bg-white">
				 <center><h3>آمار پرداخت های نقدی </h3></center>
					<div class="overflow-x-auto">
						<table class="table table-striped table-bordered dataTable" >
							<thead>
								<tr>
									<th>شماره</th>
									<th>اسم</th>
									<th>اسم خانوادگی</th>
									<th>شماره تماس</th>
									<th>تاریخ پرداخت</th>
									<th>مبلغ</th>
								</tr>
							</thead>
							<tbody>
								<?php $sum = 0; ?>
								@foreach($debInfo as $info)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$info->name}}</td>
										<td>{{$info->lastName}}</td>
										<td>{{$info->supplier_phone}}</td>
										<td>{{$info->created_at}}</td>
										<td>{{$cash = $info->paid }}</td>
									</tr>
									<?php $sum += $cash; ?>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th colspan="5">جمله</th>
									<th colspan="1"><?php echo $sum; ?></th>
								</tr>
							</tfoot>
						</table>
					</div>
			</div>
    </div>
  </div>

	<div class="container">
  <div class="row row-md">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="box box-block tile tile-2 bg-success mb-2">
        <div class="t-icon right"><i class="fa fa-cart-arrow-down"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right"><?php echo $total; ?></h1><br>
          <h6 class="text-uppercase">جمله خرید</h6>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="box box-block tile tile-2 bg-danger mb-2">
        <div class="t-icon right"><i class="fa fa-money"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right">
            <?php
              $totalPaid = $received + $sum ;
              echo $totalPaid;
           ?>
          </h1><br>
          <h6 class="text-uppercase">جمله پرداخت</h6>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="box box-block tile tile-2 bg-primary mb-2">
        <div class="t-icon right"><i class="fa fa-balance-scale"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right">
            <?php
            $result =  $total - $totalPaid;
            echo $result;
           ?>
          </h1><br>
          <h6 class="text-uppercase">بیلانس</h6>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
