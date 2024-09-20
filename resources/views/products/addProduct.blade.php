@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <center> <h3>اضافه نمودن محصول جدید</h3> </center>
      <form method="POST" action="{{route('saveProduct')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row form-group">
             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black"> اسم محصول <span style="color: red">*</span></label>
               <input type="text"  name="productName" class="form-control" placeholder="اسم محصول" required>
             </div>

              <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">بخش <span style="color: red">*</span></label>
                <select class="form-control" name="category" style="height: 40px" required >
                  <option value="">انتخاب کنید</option>
                  @foreach($categories as $category)
                  <option>{{$category->title}}</option>
                  @endforeach
                </select>
              </div>

             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">کد محصول <span style="color: red">*</span></label>
               <input type="text"  name="productCode" class="form-control " placeholder="کد محصول" required>
             </div>
          </div>

          <div class="row form-group">
             <div class="col-lg-4">
               <label  for="Field of Study" style="color:black">قیمت خرید <span style="color: red">*</span></label>
               <input type="text"   name="buyPrice" class="form-control txt" placeholder="قیمت خرید" required>
             </div>

             <div class="col-lg-4">
               <label  for="Field of Study" style="color:black">قیمت فروش <span style="color: red">*</span></label>
               <input type="text"  name="salePrice" class="form-control txt" placeholder="قیمت فروش" required>
             </div>

             <div class="col-lg-4">
               <label  for="Field of Study" style="color:black">تعداد <span style="color: red">*</span></label>
               <input type="text" name="quantity" class="form-control txt" placeholder="تعداد" required>
             </div>
          </div>

          <div class="row form-group">
             <div class="col-md-4">
               <input type="submit" name="submit" value="اضافه کردن محصول جدید" class="btn btn-rounded btn-success btn-lg" />
             </div>
          </div>
          @include('layouts.errors')
        </form>
      </div>
    </div>
</div>


<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <center><h2>لیست محصولات</h2></center>
      <h5 class="mb-1">نمایش اطلاعات</h5>
      <table class="table table-striped table-bordered dataTable" id="table-1">
        <thead>
          <tr>
            <th>اسم محصول</th>
            <th>کد محصول</th>
            <th>کتگوری</th>
            <th>تعداد</th>
            <th>قیمت خرید</th>
            <th>قیمت فروش</th>
            <th>مقدار سود</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $key => $product)
              <tr>
                <td>{{$product->productName}}</td>
                <td>{{$product->productCode}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->buyPrice}}</td>
                <td>{{$product->salePrice}}</td>
                <td style="direction: ltr; text-align: right">{{$product->salePrice - $product->buyPrice}}</td>
                <td><a href="editProduct/{{ $product->id }}" class="fa fa-edit"></a></td>
                <td><a href="deleteProduct/{{ $product->id }}" onclick='return confirm("حذف شود؟")' class="fa fa-trash" style="color: red"></a></td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
