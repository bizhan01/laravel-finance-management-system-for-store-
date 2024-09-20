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
                <h5 class="mb-1">مدیریت فروشات و محاسبه</h5><br>
                 <img src="/UploadedImages/{{Auth::user()->profileImage}}" style="width: 40px; height: 40px;" class="img img-circle"> <br></br>
              </div>
                <div class="u-content">
                  <h5><a class="text-black" href="#">{{ Auth::user()->name }}</a></h5>
                  <h6 class="text-uppercase">فروشنده</h6> <br>
                  <div class="text-xs-center pb-0-5">
                    <form method="POST" action="{{route('addPension')}}" >
                     {{ csrf_field() }}
                     <div class="row form-group">
                        <div class="col-lg-12 col-md-4 col-sm-4">
                          <label  for="Field of Study" style="color:black">نمبر بیل ضروری می باشد<span style="color: red">*</span></label>
                            @foreach($sale_numbers as $number)
                              <h4 style="color: black"> نمبر قبلی: {{$number->bill_number}}</h4>
                            @endforeach
                          <input type="number" min="800" max="100000" name="bill_number" placeholder="لطفن یک از عدد برزگتر از عدد (نمبر بیل) قبلی انتخاب کنید!  " class="form-control">
                        </div>
                      </div>
                     <input type="hidden" name="customer_phone" value="0">
                     <input type="hidden" name="transactionType" value="2">
                     <input type="hidden" name="total" >
                     <input type="hidden" name="discount" >
                     <input type="hidden" name="paid" >
                     <input type="hidden" name="description" >
                     <button type="submit" class="btn btn-lg btn-primary btn-rounded mr-0-5 fa fa-shopping-cart" style="font-size: 30px">&nbsp اخذ دستمزد جدید</button>
                     <br></br>
                       @include('layouts.errors')
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
