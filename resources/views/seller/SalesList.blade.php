@extends('layouts.master')
@section('content')
<!-- sells -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">
      <center><h4>لیست فروشات</h4></center>
      <h5 class="mb-1">برای دیدن جزئیات هر معامله بر روی شماره آن کلیک کنید</h5>
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
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $w=0; $p=0; $x=0; $y=0;  ?>
          @foreach($sales as $sell)
          <tr>
            <td><a href="printMyInvioce/{{ $sell->id }}">{{$sell->id}}</a></td>
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
            <td class="with-sub <?php if (Auth::user()->isAdmin == '1'): ?>
              <?php echo 'hide' ?>
              <?php endif ?>">
              <a href="deleteSell/{{ $sell->id }}" onclick='return confirm("حذف شود؟")' class="fa fa-trash" style="color: red"></a>
            </td>
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
              <th colspan="2"><?php echo $y; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div><!-- Content -->
@endsection
