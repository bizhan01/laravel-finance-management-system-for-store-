@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
        <center> <h4>ثبت کاربر جدید در سیستم</h4> </center><br>
         <div class="col-md-2 mb-3 mb-md-0"></div>
          <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="row form-group" >
                 <div class="col-md-4">
                   <label  for="Field of Study" style="color:black">اسم کامل </label>
                   <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus required placeholder="اسم کامل کاربر">

                   @if ($errors->has('name'))
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('name') }}</strong>
                       </span>
                   @endif
                   </div>

                   <div class="col-lg-4">
                   <label  for="University Name" style="color:black">ایمیل آدرس</label>
                   <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required required placeholder="someone@domain.com">
                   @if ($errors->has('email'))
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                       </span>
                   @endif
                   </div>

                 </div>

              <div class="col-lg-2"></div>

                 <div class="row form-group" >
                   <div class="col-lg-4 ">
                   <label  for="University Name" style="color:black">گذرواژه</label>
                   <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="**********">
                   @if ($errors->has('password'))
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('password') }}</strong>
                       </span>
                   @endif
                   </div>


                   <div class="col-lg-4">
                     <label  for="Field of Study" style="color:black">تکرار گذرواژه </label>
                     <input id="password-confirm" type="password" class="form-control"  name="password_confirmation"  required required placeholder="**********">
                  </div>

                 <div class="col-md-2"></div>
                  <!-- <div class="col-lg-4">
                   <div class="wrap-input100 validate-input form-control" data-validate = "Pleas Select Your Acount Type" style="border: none; outline: none; margin-top: 25px;">
                     <label class="label-input100 text-black">نوعیت کاربری</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input class="" type="radio" name="isAdmin"  id="isAdmin" value="2" checked>
                     <span class="label-input100">گارسون</span> &nbsp;
                     <input  type="radio"   name="isAdmin" id="isAdmin" value="1" >
                     <span class="label-input100">آشپز</span>
                   </div>
                 </div> -->

                <input type="hidden" name="isAdmin" value="1">

                 <div class="col-lg-4">
                   <div class="wrap-input100 validate-input form-control" data-validate = "Pleas Select Your Acount Type" style="border: none; outline: none; margin-top: 20px;">
                    <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-save"></i> اضافه نمودن کارمند </button>
                 </div>
                 </div>
              </div>


            <div class="col-md-2"></div>
              <!-- <div class="row form-group">
                 <div class="col-md-4">
                   <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-save"></i> اضافه نمودن کارمند </button>
                 </div>
              </div> -->
             @include('layouts.errors')
            </form>

              <!-- Content -->
              <div class="content-area py-1">
                <div class="container-fluid">
                  <div class="box box-block bg-white">
                    <center><h4>مدیر سیستم</h4> </center>
                    <h6 class="mb-1">نمایش اطلاعات</h6>
                    <table class="table table-striped table-bordered dataTable">
                      <thead>
                        <tr>
                          <th>شماره</th>
                          <th>عکس</th>
                          <th>اسم کامل</th>
                          <th>ایمیل</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($admin as $user)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td><a href="/UploadedImages/{{$user->profileImage}}"><img style="height: 30px" src="UploadedImages/{{$user->profileImage}}" alt="" /> </a></td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- Content -->
              <div class="content-area py-1">
                <div class="container-fluid">
                  <div class="box box-block bg-white">
                    <center><h4>لیست فروشندگان</h4> </center>
                    <h6 class="mb-1">نمایش اطلاعات</h6>
                    <table class="table table-striped table-bordered dataTable">
                      <thead>
                        <tr>
                          <th>شماره</th>
                          <th>عکس</th>
                          <th>اسم کامل</th>
                          <th>ایمیل</th>
                          <th>حذف کاربر</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($cooks as $user)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td><a href="/UploadedImages/{{$user->profileImage}}"><img style="height: 30px" src="UploadedImages/{{$user->profileImage}}" alt="" /> </a></td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td><a href = 'delete/{{ $user->id }}' onclick='return confirm("حذف شود؟")' title="حذف"> <i class="fa fa-trash text-danger"></i></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

          </div>
     </div>
</div>
@endsection
