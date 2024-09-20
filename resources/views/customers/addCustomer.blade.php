@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
				<center><h3>اضافه نمودن مشتری جدید</h3></center>
				<form method="POST" action="{{route('addCustomer')}}" enctype="multipart/form-data">
           {{ csrf_field() }}
           <div class="row form-group">
              <div class="col-lg-3">
                <label  for="Field of Study" style="color:black">نام <span style="color:red">*</span></label>
                <input type="text"  name="name" class="form-control" placeholder="نام " required>
              </div>
              <div class="col-lg-3">
                <label  for="Field of Study" style="color:black">نام فامیلی</label>
                <input type="text"  name="lastName" class="form-control" placeholder="نام فامیلی" >
              </div>
							<div class="col-lg-3">
                <label  for="Field of Study" style="color:black">شماره تماس <span style="color:red">*</span></label>
                 <input type="text" name="phone" placeholder="0700000000"  class="form-control"  required>
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
     <center><h3>لیست مشتریان</h3></center>
      <table class="table table-success table-striped table-bordered dataTable" id="table-2">
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
          @foreach($customers as $customer)
          <tr>
            <td>{{$customer->name}}</td>
            <td>{{$customer->lastName}}</td>
            <td style="direction: ltr">{{$customer->phone}}</td>
            <td>{{$customer->address}}</td>
            <td>
              <a class="text-success" href="{{url('customerDetails').'/'.$customer->id}}"><i class="fa fa-info btn btn-rounded btn-info"></i></a>
            </td>
						<td>
              <a class="text-success" href="editCustomer/{{ $customer->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
            </td>
            <td>
                <a class="text-danger" href="deleteCustomer/{{ $customer->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
