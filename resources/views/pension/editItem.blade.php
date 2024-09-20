@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
        <center><h3>ویرایش دستمزد</h3></center><hr>
				<form action = "/edit/pensionItem/<?php echo $sInfo[0]->id; ?>" method = "post" enctype="multipart/form-data" >
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <div class="row form-group">
              <input type="hidden" name="user_id" value="<?php echo $sInfo[0]->user_id; ?>">
              <input type="hidden" name="sell_id" value="<?php echo $sInfo[0]->sell_id; ?>">
              <div class="col-lg-2"></div>
             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">مورد<span style="color: red">*</span></label>
 						 		<input type="text"  name="item" value="<?php echo $sInfo[0]->item; ?>" class="form-control" placeholder="مورد " required>
             </div>
             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">هزینه<span style="color: red">*</span></label>
               <input type="text"  name="cost" value="<?php echo $sInfo[0]->cost; ?>" class="form-control txt" placeholder="هزینه" required>
             </div>
          </div>
          <div class="col-lg-2"></div>
          <div class="row form-group">
             <div class="col-md-4">
                <input type="submit" name="submit" value="ذخیره" class="btn btn-rounded btn-success " />
								<button type="reset" class="btn btn-rounded btn-warning"><li class="fa fa-remove"> لغو</li></button> &nbsp
								@foreach($sales as $sell)
							  <a href="/edit/{{ $sell->id }}">برگشت</a>
								@endforeach
             </div>
          </div>
					@include('layouts.errors')
        </form>
      </nav>
    </div>
  </div>
@endsection
