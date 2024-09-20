@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <center> <h3>ثبت خریداری</h3> </center> <br>
      <form method="POST" action="{{route('savePurchase')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row form-group">
             <div class="col-lg-3 ">
               <label  for="Field of Study" style="color:black">اسم تامین کننده<span style="color: red">*</span></label>
               <!-- <input type="text"  name="supplier_phone" class="form-control" placeholder="شماره تماس تامین کننده" required> -->
               <select class="form-control" name="supplier_phone" required style="height: 40px">
                 <option></option>
                 @foreach($suppliers as $supplier)
                 <option value="{{$supplier->phone}}">{{$supplier->name}} {{$supplier->lastName}}</option>
                 @endforeach
               </select>
             </div>
             <div class="col-lg-3">
               <label  for="Field of Study" style="color:black">بابت</label>
               <input type="text"  name="regard" class="form-control" placeholder="بابت" >
             </div>
             <div class="col-lg-2">
               <label  for="Field of Study" style="color:black">نمبر فاکتور</label>
               <input type="text"  name="bill_number" class="form-control" placeholder="نمبر فاکتور" >
             </div>
             <div class="col-lg-2">
               <label  for="Field of Study" style="color:black">مبلغ کلی <span style="color: red">*</span></label>
               <input type="text"  name="total" class="form-control txt" placeholder="مبلغ کلی" required>
             </div>
             <div class="col-lg-2">
               <label  for="Field of Study" style="color:black">رسید</label>
               <input type="text"  name="paid" class="form-control txt" placeholder="رسید" >
             </div>
          </div>
          <div class="row form-group" >
             <div class="col-lg-12">
               <label  for="University Name" style="color:black">تصویر (اسکن فاکتور)</label>
               <input type="file" name="image" id="input-file-now" class="dropify" />
             </div>
          </div>

          <div class="row form-group">
             <div class="col-md-4">
               <input type="submit" name="submit" value="ذخیره" class="btn btn-success btn-lg" />
             </div>
          </div>
          @include('layouts.errors')
        </form>
      </div>
    </div>
</div>

<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
   <div class="col-lg-12 box box-block bg-white">
     <center><h3>لیست خریداری ها</h3></center>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره تماس</th>
            <th>بابت</th>
            <th>نمبر فاکتور</th>
            <th>قیمت کلی</th>
            <th>رسید</th>
            <th>باقیات</th>
            <th>فاکتور</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $w=0; $x=0; $y=0; ?>
          @foreach($purchases as $purchase)
          <tr>
            <td>{{$purchase->supplier_phone}}</td>
            <td>{{$purchase->regard}}</td>
            <td>{{$purchase->bill_number}}</td>
            <td>{{$purchase->total}}</td>
            <td>{{$purchase->paid}}</td>
            <td>{{$purchase->total - $purchase->paid}}</td>
            <td><a href="/UploadedImages/{{$purchase->image}}"><img src="/UploadedImages/{{$purchase->image}}" alt="No Image" style="height: 50px; width: 50px" /></a></td>
						<td>
              <a class="text-success" href="editPurchase/{{ $purchase->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
            </td>
            <td>
                <a class="text-danger" href="deletePurchase/{{ $purchase->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $w += $purchase->total; ?>
          <?php $x += $purchase->paid; ?>
          <?php $y += $purchase->total - $purchase->paid; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="2">جمله عواید</th>
              <th colspan="1"><?php echo $w; ?></th>
              <th colspan="1" style="background-color: yellow"><?php echo $x; ?></th>
              <th colspan="4"><?php echo $y; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
