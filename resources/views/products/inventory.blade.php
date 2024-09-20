@extends('layouts.master')
@section('content')
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <center><h3>آمار موجودی اجناس</h3></center>
      <h5 class="mb-1">نمایش اطلاعات</h5>
      <table class="table table-striped table-bordered dataTable" id="table-1">
        <thead>
          <tr>
            <th>آی دی</th>
            <th>اسم محصول</th>
            <th>کتگوری</th>
            <th>کد محصول</th>
            <th>قیمت خرید</th>
            <th>قیمت فروش</th>
            <th>تعداد خرید</th>
            <th>تعداد فروش</th>
            <th>تعداد موجود</th>
            <th>قیمت کلی</th>
          </tr>
        </thead>
        <tbody>
            <?php $sum=0; ?>
          @foreach($products as $key => $product)
              <tr>
                 <td>{{$product->id}}</td>
                 <td>{{$product->productName}}</td>
                 <td>{{$product->category}}</td>
                 <td>{{$product->productCode}}</td>
                 <td>{{$product->buyPrice}}</td>
                 <td>{{$product->salePrice}}</td>
                 <td>{{$product->quantity }}</td>
                 <td>{{$product->buy_tot }}</td>
                 <td style="direction: ltr; text-align: right">{{$remain = $product->quantity - $product->buy_tot}}</td>
                 <td>{{$total = $product->buyPrice * $remain }}</td>
              </tr>
              <?php $sum += $total; ?>
          @endforeach
        </tbody>
          <tr>
            <th colspan="9">جمله ارزش محصولات باقی مانده</th>
            <th colspan="1"><?php echo $sum; ?></th>
          </tr>
      </table>
    </div>
  </div>
</div>
@endsection
