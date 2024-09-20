@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
				<center><h3>افزودن تامین کننده</h3></center>
				<form method="POST" action="{{route('addSupplier')}}" enctype="multipart/form-data">
           {{ csrf_field() }}
           <div class="row form-group">
              <div class="col-lg-3">
                <label  for="Field of Study" style="color:black">نام <span style="color: red">*</span></label>
                <input type="text"  name="name" class="form-control" placeholder="نام " required>
              </div>
              <div class="col-lg-3">
                <label  for="Field of Study" style="color:black">نام فامیلی</label>
                <input type="text"  name="lastName" class="form-control" placeholder="نام فامیلی" >
              </div>
							<div class="col-lg-3">
                <label  for="Field of Study" style="color:black">شماره تماس <span style="color: red">*</span></label>
                 <input type="text" name="phone" placeholder="شماره تماس"  class="form-control"  required>
              </div>
							<div class="col-lg-3">
                <label  for="Field of Study" style="color:black">آدرس</label>
                <input type="text"  name="address" class="form-control" placeholder="آدرس" >
              </div>
           </div>
           <div class="row form-group">
              <div class="col-md-4">
                <input type="submit" name="submit" value="ذخیره" class="btn btn-success " />
              </div>
           </div>
           @include('layouts.errors')
        </form>
      </nav>
    </div>
  </div>


<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
   <div class="col-lg-12 box box-block bg-white">
     <center><h3>لیست تامین کنندگان</h3></center>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>نام</th>
            <th>نام فامیلی</th>
            <th>شماره تماس</th>
            <th>آدرس</th>
            <th>جزئیات</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($suppliers as $supplier)
          <tr>
            <td>{{$supplier->name}}</td>
            <td>{{$supplier->lastName}}</td>
            <td style="direction: ltr">{{$supplier->phone}}</td>
            <td>{{$supplier->address}}</td>
            <td>
              <a class="text-success" href="{{url('supplierDetails').'/'.$supplier->id}}"><i class="fa fa-info btn btn-rounded btn-info"></i></a>
            </td>
						<td>
              <a class="text-success" href="editSupplier/{{ $supplier->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
            </td>
            <td>
                <a class="text-danger" href="deleteSupplier/{{ $supplier->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
