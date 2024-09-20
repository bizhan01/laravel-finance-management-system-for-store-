@extends('layouts.master')
@section('content')
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <center><h2>لیست محصولات</h2></center>
      <center><h4>سرمایه های ثابت</h4></center>
      <h5 class="mb-1">نمایش اطلاعات</h5>
      <table class="table table-info table-striped table-bordered dataTable" id="table-1">
        <thead>
          <tr>
            <th>اسم محصول</th>
            <th>کد محصول</th>
            <th>کتگوری</th>
            <th>قیمت خرید</th>
            <th>تعداد</th>
            <th>قیمت کلی</th>
          </tr>
        </thead>
        <tbody>
        <?php $sum=0; ?>
          @foreach($products as $key => $product)
              <tr>
                <td>{{$product->productName}}</td>
                <td>{{$product->productCode}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->buyPrice}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$total = $product->buyPrice * $product->quantity}}</td>
              </tr>
              <?php $sum += $total; ?>
          @endforeach
        </tbody>
          <tr>
            <th colspan="5">جمله کلی سرمایه</th>
            <th colspan="1"><?php echo $sum; ?></th>
          </tr>
      </table>
    </div>
  </div>
</div>
@endsection
