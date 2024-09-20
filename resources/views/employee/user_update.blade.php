@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <div class="col-lg-3"> </div>
			 <div class="col-lg-6 box box-block bg-white">
          <form action = "/edit/<?php echo $users[0]->id; ?>" method = "post" enctype="multipart/form-data" >
             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

             <div class="row form-group">
                <div class="col-md-12 mb-12 mb-md-0">
                  <label  for="Field of Study" style="color:black">اسم کاربر</label>
                  <input type = 'text' name = 'name' class="form-control"   value = '<?php echo$users[0]->name; ?>'/>
                </div>
              </div>

              <div class="row form-group">
                 <div class="col-md-12 mb-12 mb-md-0">
                   <label  for="Field of Study" style="color:black">ایمیل کاربر</label>
                     <input type = 'emai' name = 'email' class="form-control" value = '<?php echo$users[0]->email; ?>'/>
                 </div>
               </div>

               <div class="row form-group">
                  <div class="col-md-12 mb-12 mb-md-0">
                    <label  for="Field of Study" style="color:black"> گذرواژه کاربر</label>
                      <input type = 'text' name = 'password' class="form-control"  value = '<?php echo$users[0]->password; ?>'/>
                  </div>
                </div>

                <div class="row form-group">
                   <div class="col-md-12">
                     <label  for="University Name" style="color:black">تصویر کاربر</label>
                     <input type = 'hidden' name = 'image' class="form-control"  value = '<?php echo$users[0]->profileImage; ?>'/>
                     <input type="file" name="image" id="input-file-now" class="dropify" />
                   </div>
                </div>

                <div class="row form-group">
                   <div class="col-md-4">
                     <button type="submit" name="submit" class="btn btn-rounded btn-success btn-lg"> <i class="fa fa-save"></i> اضافه نمودن </button>
                   </div>
                </div>
           </form>
       </div>
    </div>
</div>
@endsection
