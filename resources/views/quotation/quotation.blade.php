@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">
			<div class="col-lg-2 col-md-2 col-sm-2"></div>
      <div class="col-md-8">
        <div class="box bg-info user-1">
            <div class="box box-block tile tile-2 bg-info mb-2">
              <div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
              <div class="t-content">
                <div class="container-fluid">
                  <div class="row text-xs-center">
                    <div>
                      <img src="\img\logo\logo.png" alt="" /><br>
                      <h4 style="color: #f4a030">ASIA TESLA E.EC <br>
                      <span style="color: #066f92">شرکت خدمات انجنیری برق آسیا تسلا</span></h4>
                    </div>
                  </div>
                </div>
                <h3 class="mb-1">مدیریت فروشات</h3><br>
                 <img src="/UploadedImages/{{Auth::user()->profileImage}}" style="width: 40px; height: 40px;" class="img img-circle"> <br></br>
                <h6 class="text-uppercase">فروشنده</h6>
              </div>
                <div class="u-content">
                  <h5><a class="text-black" href="#">{{ Auth::user()->name }}</a></h5> <br>
                  <div class="text-xs-center pb-0-5">
                    <form method="POST" action="{{route('newQuotation')}}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="col-lg-2"></div>
                     <div class="row form-group">
                       <div class="col-lg-8">
                         <input type="text" name="name" class="form-control" placeholder="اسم کامل درخواست کننده">
                       </div>
                     </div>
                     <button type="submit" class="btn btn-lg btn-primary btn-rounded mr-0-5 fa fa-shopping-cart" style="font-size: 30px"> &nbsp  اجرای پیش فاکتور جدید</button>
                  </form>
                  </div>
                </div>
              </div>
                <div class="u-counters">
                  <div class="row no-gutter">
                    <div class="col-xs-12 uc-item">
                      <a class="text-black" href="#">
                        <strong>تاریخ</strong> <br>
                        <strong><?php echo date('Y-m-d') ?></strong>
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
