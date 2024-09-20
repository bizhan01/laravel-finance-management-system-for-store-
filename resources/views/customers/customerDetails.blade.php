@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <div class="navbar navbar-light bg-white b-a mb-2">
				<center>
					<h3>صورت حساب مشتری</h3>
           <h6> اسم مشتری: {{ $customer['name'] }} {{ $customer['lastName'] }}</h6>
           <h6> شماره تماس: {{ $customer['phone'] }}</h6>
           <h6> آدرس: {{ $customer['address'] }}</h6>
					 </center>
					<div class="box box-block bg-white">
				 	 <center><h3>آمار خریداری های مشتری</h3></center>
					 <h6>برای دیدن جزئیات هر معامله روی  شماره آن کلیک کنید</h6>
				 		<div class="overflow-x-auto">
				 			<table class="table table-striped table-bordered dataTable" >
				 				<thead>
				 					<tr>
										<th>شماره</th>
				            <th>تاریخ</th>
				            <th>قیمت کلی</th>
				            <th>تخفیف</th>
				            <th>قابل پرداخت</th>
				            <th>رسید</th>
				            <th>باقی</th>
				 					</tr>
				 				</thead>
				 				<tbody>
				 					<?php $buyTotal=0; $discount=0; $pay=0; $received=0;  $rest=0; ?>
				 					@foreach($sellInfo as $info)
				 						<tr>
				 							<td><a href="printMyInvioce/{{ $info->id }}">{{$loop->iteration}}</a></td>
					            <td>{{$info->created_at}}</td>
					            <td>{{$info->total}}</td>
					            <td>{{$info->discount}}</td>
					            <td>
					              <?php
					                  $payable = $info->total - $info->discount;
					                  print ("$payable");
					               ?>
					            </td>
					            <td>{{$paid = $info->paid}}</td>
					            <td>{{$payable - $paid }}</td>
				 						</tr>
				 						<?php $buyTotal += $info->total; ?>
				 						<?php $discount += $info->discount; ?>
				 						<?php $pay += $info->total - $info->discount; ?>
				 						<?php $received += $info->paid; ?>
				 						<?php $rest += $payable - $paid ; ?>
				 					@endforeach
				 				</tbody>
				 				<tfoot>
				 					<tr>
				 						<th colspan="2">جمله</th>
				 						<th colspan="1"><?php echo $buyTotal; ?></th>
				 						<th colspan="1"><?php echo $discount; ?></th>
				 						<th colspan="1"><?php echo $pay; ?></th>
				 						<th colspan="1"><?php echo $received; ?></th>
				 						<th colspan="1"><?php echo $rest; ?></th>
				 					</tr>
				 				</tfoot>
				 			</table>
				 		</div>
      	</div>

				<div class="box box-block bg-white">
				 <center><h3>آمار ترمیمات  (اجوره ها)</h3></center>
				 <h6>برای دیدن جزئیات هر معامله روی  شماره آن کلیک کنید</h6>
					<div class="overflow-x-auto">
						<table class="table table-striped table-bordered dataTable" >
							<thead>
								<tr>
									<th>شماره</th>
									<th>اسم</th>
									<th>اجوره</th>
									<th>تخفیف</th>
									<th>قابل پرداخت</th>
									<th>رسید</th>
									<th>باقی</th>
								</tr>
							</thead>
							<tbody>
								<?php $a = 0; $b = 0; $c = 0; $d = 0; $e = 0; ?>
								@foreach($pensions as $info)
									<tr>
										<td><a href="printInvioce/{{ $info->id }}">{{$loop->iteration}}</a></td>
										<td>{{$info->name}} {{$info->lastName}}</td>
										<td>{{$info->total}}</td>
										<td>{{$info->discount}}</td>
										<td>{{$x =$info->total - $info->discount}}</td>
										<td>{{$info->paid }}</td>
										<td>{{$y = $info->total - $info->discount - $info->paid}}</td>
									</tr>
									<?php $a += $info->total; ?>
									<?php $b += $info->discount; ?>
									<?php $c += $x; ?>
									<?php $d += $info->paid; ?>
									<?php $e += $y; ?>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th colspan="2">جمله</th>
									<th colspan="1"><?php echo $a; ?></th>
									<th colspan="1"><?php echo $b; ?></th>
									<th colspan="1"><?php echo $c; ?></th>
									<th colspan="1"><?php echo $d; ?></th>
									<th colspan="1"><?php echo $e; ?></th>
								</tr>
							</tfoot>
						</table>
					</div>
			</div>


			<div class="box box-block bg-white">
			 <center><h3>آمار پرداخت های نقدی مشتری</h3></center>
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
							@foreach($depInfo as $info)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$info->name}}</td>
									<td>{{$info->lastName}}</td>
									<td>{{$info->customer_phone}}</td>
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
    <div class="col-lg-3">
      <div class="box box-block tile tile-2 bg-success mb-2">
        <div class="t-icon right"><i class="fa fa-cart-arrow-down"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right"><?php echo $tot = $buyTotal + $a; ?></h1><br>
          <h6 class="text-uppercase">جمله خرید + اجوره</h6>
        </div>
      </div>
    </div>

		<div class="col-lg-3">
      <div class="box box-block tile tile-2 bg-info mb-2">
        <div class="t-icon right"><i class="fa fa-percent"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right"><?php echo $dis = $discount + $b; ?></h1><br>
          <h6 class="text-uppercase">جمله تخفیف</h6>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="box box-block tile tile-2 bg-warning mb-2">
        <div class="t-icon right"><i class="fa fa-money"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right">
            <?php
              $payable = $tot - $dis ;
              echo $payable;
           ?>
          </h1><br>
          <h6 class="text-uppercase">قابل پرداخت</h6>
        </div>
      </div>
    </div>

		<div class="col-lg-3">
			<div class="box box-block tile tile-2 bg-danger mb-2">
				<div class="t-icon right"><i class="fa fa-money"></i></div>
				<div class="t-content">
					<h1 class="mb-1" dir="ltr" style="text-align: right">
						<?php
							$totalPaid = $received + $d + $sum ;
							echo $totalPaid;
					 ?>
					</h1><br>
					<h6 class="text-uppercase">جمله پرداخت</h6>
				</div>
			</div>
		</div>

  </div>


	<div class="row row-md">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <div class="box box-block tile tile-2 bg-primary mb-2">
        <div class="t-icon right"><i class="fa fa-balance-scale"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right">
            <?php
            $result =  $payable - $totalPaid;
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
