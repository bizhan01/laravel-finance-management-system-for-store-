@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">
      <div class="col-md-12">
        <div class="box box-block bg-white">
          <div class="container-fluid">
            <div class="row text-xs-center">
              <div>
                <img src="\img\logo\logo.png" alt="" /><br>
                <h4 style="color: #f4a030">ASIA TESLA E.EC <br>
                <span style="color: #26abd7 ">شرکت خدمات انجنیری برق آسیا تسلا</span></h4>
              </div>
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-6 ">
              <div class="modal static-modal custom-modal-5 ">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body card-header">
                      <div class="text-xs-center" style="padding: 0px">
                        <a href="{{route('supplier')}}"><h5>تامین کنندگان</h5>
                        <div class="cm-icon bg-primary  mb-1"><i class="fa fa-bank"></i></div></a>
                        <div class="row ">
                          <div class="col-xs-6">
                            <a href="{{route('purchase')}}"><button  class="btn btn-primary btn-block">
                              <li class="fa fa-shopping-bag"></li>  خرید
                            </button></a>
                          </div>
                          <div class="col-xs-6">
                            <a href="{{route('debite')}}"><button type="button" class="btn btn-primary ">
                              <li class="fa fa-money"></li> پرداخت نقدی
                            </button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="col-md-4 ">
              <div class="modal static-modal custom-modal-5 ">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body card-header">
                      <div class="text-xs-center" style="padding: 0px">
                        <a href="{{route('product')}}"><h5>محصولات</h5>
                        <div class="cm-icon bg-info  mb-1"><i class="fa fa-diamond"></i></div></a>
                        <div class="row ">
                          <div class="col-xs-6">
                            <a href="{{route('category')}}"><button  class="btn btn-info btn-block">
                              <li class="fa fa-list"></li>  کتگوری
                            </button></a>
                          </div>
                          <div class="col-xs-6">
                            <a href="{{route('product')}}"><button type="button" class="btn btn-info btn-block">
                              <li class="fa fa-plus-circle"></li>  افزودن
                            </button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <div class="col-md-6 ">
              <div class="modal static-modal custom-modal-5 ">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body card-header">
                      <div class="text-xs-center" style="padding: 0px">
                        <a href="{{route('customer')}}"><h5>مشتریان</h5>
                        <div class="cm-icon bg-success  mb-1"><i class="fa fa-group"></i></div></a>
                        <div class="row ">
                          <div class="col-xs-6">
                            <a href="{{route('sales')}}"><button  class="btn btn-success btn-block">
                              <li class="fa  fa-cart-plus"></li>  فروش
                            </button></a>
                          </div>
                          <div class="col-xs-6">
                            <a href="{{route('deposit')}}"><button type="button" class="btn btn-success ">
                              <li class="fa fa-money"></li>  دریافت نقدی
                            </button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
