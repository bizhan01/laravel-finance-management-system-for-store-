@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
      <div class="col-sm-8 push-sm-2">
        <div class="card price-card">
          <div class="card-header price-card-header bg-primary text-xs-center">
            <h6 class="text-uppercase">شرکت خدمات انجنیری برق آسیا تسلا</h6>
            <h6 class="text-uppercase">مدیریت فروشات و محاسبه</h6>
            <h6 class="text-uppercase">ثبت محصولات</h6>
          </div>
          <div class="price-card-list" style="padding: 40px">
            <form method="POST" action="{{route('saveQtn')}}" >
              {{ csrf_field() }}

                <div class="field_wrapper">
                    <div>
                      @foreach($quotations as $qtn)
                         <input type="hidden" name="qtn_id[]" value="{{$qtn->id}}">
                      @endforeach
                      <div class="row form-group">
                          <div class="col-md-6">
                            <label for="">اسم محصول</label>
                            <select class="form-control col-lg-5" name="product_id[]" required style="height: 40px">
                              <option value=""></option>
                              @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->productName}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                          <label for="">تعداد</label>
                          <input type="number" min="1" name="product_qty[]" class="form-control" value="" required/>
                        </div>
                        <div class="col-md-1">
                          <label for="">افزودن</label>
                          <a href="javascript:void(0);" class="add_button fa fa-plus-circle" title="Add field" style="font-size: 25px; margin-top: 5px"></a>
                        </div>
                      </div>
                    </div>
                </div>
             </div>
              <a href="printQtn/{{ $qtn->id }}"><input type="submit" name="submit" value="ذخیره" class="btn btn-primary btn-block btn-lg"></a>
            </form>
          </div>
          <!-- ُSuccess Flash Message -->
            @if($success = session('success'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div>
                  <center>
                    {{$success}}
               @foreach($quotations as $qtn)
                  <h6> شماره ثبت: {{$qtn->id}} </h6>
                  <p> <a href="printQtn/{{ $qtn->id }}"  style="display: inline-block; padding: 10px 30px; font-size: 14px; color: #fff; background: #5bda19; border-radius: 40px; text-decoration:none;"> چاپ فاکتور</a></p>
               @endforeach
            <center>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div>  <input type="hidden" name="qtn_id[]" value="{{$qtn->id}}">  <select class=" " name="product_id[]" required style="width: 50%; height: 40px"> <option value=""></option> @foreach($products as $product) <option value="{{$product->id}}">{{$product->productName}}</option>   @endforeach </select>     <input type="number" name="product_qty[]"  min="1" required style="width: 41%; height: 40px"/>  &nbsp &nbsp  <a href="javascript:void(0);" class="remove_button fa fa-minus-circle" style="font-size: 25px; margin-top: 5px"></a> </div> </div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
@endsection
