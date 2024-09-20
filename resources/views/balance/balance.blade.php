@extends('layouts.master')
@section('content')
<script src="js/jquery.min.js"> </script>
<script src="js/math.js"> </script><br>
<center> <h3>صورت حساب (بیلانس)</h3> </center>
  <!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">

        <!-- date Start orders. -->
        <div class="">
          <p class="font-90 text-muted mb-1">به اساس تاریخ میتوانید بیلانس مالی را ببینید.</p>
          <div class="row">
            <div class="col-md-4">
              <h6>از تاریخ</h6>
                <input type="date" class="form-control from" required>
            </div>
            <div class="col-md-4">
              <h6>تا تاریخ</h6>
              <input class="form-control to" type="date" value="{{date('Y-m-d')}}" required>
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
      </div>
    </div>
  </div>


  <!-- sells -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">
        <center><h4>لیست فروشات</h4></center>
        <table class="table table-striped table-bordered dataTable" id="table-2">
          <thead>
            <tr>
              <th>شماره</th>
              <th>تاریخ</th>
              <th>نمبر بیل</th>
              <th>قیمت کلی</th>
              <th>تخفیف</th>
              <th>قابل پرداخت</th>
              <th>سود</th>
              <th>رسید</th>
              <th>باقی</th>
            </tr>
          </thead>
          <tbody>
            <?php $w=0; $p=0; $x=0; $y=0;  ?>
            @foreach($sales as $sell)
            <tr>
              <td>{{$sell->id}}</td>
              <td>{{$sell->created_at}}</td>
              <td>{{$sell->bill_number}}</td>
              <td>{{$sell->total}}</td>
              <td>{{$sell->discount}}</td>
              <td>
                <?php
                    $payable = $sell->total - $sell->discount;
                    print ("$payable");
                 ?>
              </td>
              <td>{{$profit = $sell->total - $sell->subTotal - $sell->discount}}</td>
              <td>{{$sell->paid}}</td>
              <td>{{$payable - $sell->paid }}</td>
            </tr>
            <?php $w += $payable; ?>
            <?php $p += $profit; ?>
            <?php $x += $sell->paid; ?>
            <?php $y += $payable - $sell->paid; ?>
            @endforeach
            <tfoot>
              <tr>
                <th colspan="5">جمله عواید</th>
                <th colspan="1"><?php echo $w; ?></th>
                <th colspan="1"><?php echo $p; ?></th>
                <th colspan="1" style="background-color: yellow"><?php echo $x; ?></th>
                <th colspan="1"><?php echo $y; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- Content -->

  <!-- sells -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">
        <center><h4>لیست اجوره (دستمزد ها)</h4></center>
        <table class="table table-striped table-bordered dataTable" id="table-2">
          <thead>
            <tr>
              <th>شماره</th>
              <th>نمبر بیل</th>
              <th>اجوره</th>
              <th>تخفیف</th>
              <th>قابل پرداخت</th>
              <th>رسید</th>
              <th>باقی</th>
            </tr>
          </thead>
          <tbody>
            <?php $ww=0;  $xx=0; $yy=0; ?>
            @foreach($pensions as $sell)
            <tr>
              <td>{{$sell->id}}</a></td>
              <td>{{$sell->bill_number}}</td>
              <td>{{$sell->total}}</td>
              <td>{{$sell->discount}}</td>
              <td>
                <?php
                    $payable = $sell->total - $sell->discount;
                    print ("$payable");
                 ?>
              </td>
              <td>{{$sell->paid}}</td>
              <td>{{$payable - $sell->paid }}</td>
            </tr>
            <?php $ww += $payable; ?>
            <?php $xx += $sell->paid; ?>
            <?php $yy += $payable - $sell->paid; ?>
            @endforeach
            <tfoot>
              <tr>
                <th colspan="4">جمله عواید</th>
                <th colspan="1"><?php echo $ww; ?></th>
                <th colspan="1" style="background-color: yellow"><?php echo $xx; ?></th>
                <th colspan="1"><?php echo $yy; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- Content -->


  <!-- Deposits -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">
        <center><h4>لیست دریافت های نقدی</h4></center>

        <!-- date Start revenu-->
        <!-- date End -->

        <table class="table table-success table-striped table-bordered dataTable" id="table-3">
          <thead>
            <tr>
              <th>تاریخ</th>
              <th>نمبر بیل</th>
              <th>شماره تماس مشتری (منبع)</th>
              <th>مبلغ</th>
            </tr>
          </thead>
          <tbody>
            <?php $sum2=0; ?>
            @foreach($deposits as $deposit)
            <tr>
              <td>{{$deposit->created_at}}</td>
              <td>{{$deposit->bill_number}}</td>
              <td>{{$deposit->customer_phone}}</td>
              <td>{{$deposit->paid}}</td>
            </tr>
            <?php $sum2 += $deposit->paid; ?>
            @endforeach
            <tfoot style="background: #adb7a9">
              <tr>
                <th colspan="2">
                <strong>جمله عواید</strong>
                <small class="text-muted">حساب شده از عواید متفرقه</small>
              </th>
                <th colspan="2" id="fn"><?php echo $sum2; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
        <center style="direction: ltr; ">
          <strong>جمله عواید</strong>
          <strong class="text-success"><?php $total = $x + $sum2; echo $total;?></strong>
          <span><small class="text-muted">حساب شده از عواید متفرقه و فروشات</small></span>
        </center>
      </div>
    </div>
  </div><!-- Content -->




  <!-- Purchase-->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="box col-lg-12 col-md-12 col-sm-12 box-block bg-white">
        <center><h4>لیست خریداری ها</h4></center>
        <!-- Archive Start -->
          <!-- Archive End -->
        <table class="table table-warning  table-striped table-bordered dataTable" id="table-1">
          <thead>
            <tr>
              <th>شماره تماس</th>
              <th>نمبر فاکتور</th>
              <th>قیمت کلی</th>
              <th>پرداخت</th>
              <th>باقیات</th>
              <th>فاکتور</th>
            </tr>
          </thead>
          <tbody>
            <?php $purchaseTotal=0; ?>
            @foreach($purchases as $purchase)
            <tr>
              <td>{{$purchase->supplier_phone}}</td>
              <td>{{$purchase->bill_number}}</td>
              <td>{{$purchase->total}}</td>
              <td>{{$purchase->paid}}</td>
              <td>{{$purchase->total - $purchase->paid}}</td>
              <td><a href="/UploadedImages/{{$purchase->image}}"><img src="/UploadedImages/{{$purchase->image}}" alt="No Image" style="height: 50px; width: 50px" /></a></td>
            </tr>
            <?php $purchaseTotal += $purchase->paid; ?>
            @endforeach
            <tfoot>
              <tr>
                <th colspan="5">جمله خریداری ها</th>
                <th colspan="1" ><?php echo $purchaseTotal; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
        <center style="direction: ltr; ">
          <h5 class="text-danger"> جمله مصارف <?php
            echo $purchaseTotal;
         ?></h5> </center>
      </div>
    </div>
  </div>

  <!-- Debits -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="box col-lg-12 col-md-12 col-sm-12 box-block bg-white">
        <center><h4>لیست پرداخت های نقدی</h4></center>
        <!-- Archive Start -->
          <!-- Archive End -->
        <table class="table table-warning  table-striped table-bordered dataTable" id="table-1">
          <thead>
            <tr>
              <th>تاریخ</th>
              <th>شماره تماس تامین کننده</th>
              <th>مبلغ</th>
            </tr>
          </thead>
          <tbody>
              <?php $debitTotal=0; ?>
              @foreach($debits as $debit)
              <tr>
                <td>{{$debit->created_at}}</td>
                <td>{{$debit->supplier_phone}}</td>
                <td>{{$debit->paid}}</td>
              </tr>
              <?php $debitTotal += $debit->paid; ?>
              @endforeach
            <tfoot>
              <tr>
                <th colspan="2">جمله پرداخت های نقدی </th>
                <th colspan="1" ><?php echo $debitTotal; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- expenses  -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="box col-lg-12 col-md-12 col-sm-12 box-block bg-white">
        <center><h4>لیست مصارف</h4></center>
        <!-- Archive Start -->
          <!-- Archive End -->
        <table class="table table-warning  table-striped table-bordered dataTable" id="table-1">
          <thead>
            <tr>
              <th>تاریخ پرداخت</th>
  						<th>مصرف کننده</th>
  						<th>کتگوری</th>
              <th>ماه</th>
              <th>پرداخت</th>
            </tr>
          </thead>
          <tbody>
            <?php $expenseTotal=0; ?>
            @foreach($expenses as $expense)
            <tr>
              <td>{{$expense->created_at}}</td>
              <td>{{$expense->name}}</td>
              <td>{{$expense->category}}</td>
              <td>{{$expense->month}}-{{$expense->year}}</td>
              <td>{{$expense->amount}}</td>
            </tr>
            <?php $expenseTotal += $expense->amount; ?>
            @endforeach
            <tfoot>
              <tr>
                <th colspan="2">جمله مصارف</th>
                <th colspan="1" ><?php echo $expenseTotal; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Salaries -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="box col-lg-12 col-md-12 col-sm-12 box-block bg-white">
        <center><h4>لیست معاشات</h4></center>
        <!-- Archive Start -->
          <!-- Archive End -->
        <table class="table table-warning  table-striped table-bordered dataTable" id="table-1">
          <thead>
            <tr>
              <th>اسم</th>
              <th>تاریخ پرداخت</th>
              <th>معاش</th>
              <th>ماه</th>
              <th>پرداخت</th>
              <th>باقیات</th>
            </tr>
          </thead>
          <tbody>
            <?php $salaryTotal=0; ?>
            @foreach($salaries as $salary)
            <tr>
              <td>{{$salary->name}}</td>
              <td>{{$salary->created_at}}</td>
              <td>{{$salary->salary}}</td>
              <td>{{$salary->month}}-{{$salary->year}}</td>
              <td>{{$salary->paid}}</td>
              <td>{{$salary->salary - $salary->paid}}</td>
            </tr>
            <?php $salaryTotal += $salary->paid; ?>
            @endforeach
            <tfoot>
              <tr>
                <th colspan="5">جمله معاشات</th>
                <th colspan="1" ><?php echo $salaryTotal; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
        <center style="direction: ltr; ">
          <h5 class="text-danger"> جمله کلی مصارف <?php
            $expTotal = $purchaseTotal + $debitTotal + $expenseTotal + $salaryTotal;
            echo $expTotal;
         ?></h5> </center>
      </div>
    </div>
  </div>

<div class="container">
  <div class="row row-md">
    <div class="col-lg-3">
      <div class="box box-block tile tile-2 bg-success mb-2">
        <div class="t-icon right"><i class="ti-bar-chart"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right"><?php echo $netTotal = $total + $xx; ?></h1><br>
          <h6 class="text-uppercase">فروشات + اجوره</h6>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="box box-block tile tile-2 bg-info mb-2">
        <div class="t-icon right"><i class="ti-bar-chart"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right"><?php echo $p + $xx; ?></h1><br>
          <h6 class="text-uppercase">سود معلق از فروشات و دستمزد ها</h6>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="box box-block tile tile-2 bg-danger mb-2">
        <div class="t-icon right"><i class="fa fa-money"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right"><?php echo $expTotal; ?></h1><br>
          <h6 class="text-uppercase">جمله مصارف  شامل خریداری ها، پرداخت ها، مصارف روزانه و معاشاتت</h6>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="box box-block tile tile-2 bg-primary mb-2">
        <div class="t-icon right"><i class="fa fa-balance-scale"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right">
            <?php
            $c = $netTotal - $expTotal;
            echo $c;
           ?>
          </h1><br>
          <h6 class="text-uppercase">پول نقد دریافت شده بعد از مصارف</h6>
        </div>
      </div>
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
      window.location.href = '<?= url('blancess') ?>'+'/'+from+'/'+to;
    }else{
      alert('لطفا تاریخ ها را انتخاب کنید');
    }
  });
</script>


@endsection
