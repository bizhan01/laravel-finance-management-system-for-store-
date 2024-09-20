@extends('layouts.master')
@section('content')
<div class="content-area pb-1">
	<div class="profile-header mb-1">
		<div class="profile-header-cover img-cover" style="background-image: url(img/photos-1/4.jpg);"></div>
		<div class="profile-header-counters clearfix">
			<!-- <div class="container-fluid">
				<div class="float-xs-right">
					<a href="#" class="text-black">
						<h5 class="font-weight-bold">2k</h5>
						<span class="text-muted">Followers</span>
					</a>
				</div>
				<div class="float-xs-right">
					<a href="#" class="text-black">
						<h5 class="font-weight-bold">320</h5>
						<span class="text-muted">Following</span>
					</a>

				</div>
				<div class="float-xs-right">
					<a href="#" class="text-black">
						<h5 class="font-weight-bold">190</h5>
						<span class="text-muted">Activities</span>
					</a>
				</div>
			</div> -->
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-md-3">
				<div class="card profile-card">
					<div class="profile-avatar">
						<img src="{{ asset('UploadedImages').'/'.Auth::user()->profileImage }}" alt="">
					</div>
					<div class="card-block">
						<h4 class="mb-0-25">{{ Auth::user()->name }}</h4>
						<div class="text-muted mb-1">مدیر سیستم</div>
						<!-- <button type="button" class="btn btn-primary btn-rounded waves-effect">Follow</button>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-outline-primary btn-rounded waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Connect
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="#">Dropdown link 1</a>
								<a class="dropdown-item" href="#">Dropdown link 2</a>
								<a class="dropdown-item" href="#">Dropdown link 3</a>
								<a class="dropdown-item active" href="#">Dropdown link active</a>
							</div>
						</div> -->
					</div>
					<ul class="list-group">
						<a class="list-group-item" href="#">
							<i class="ti-worlds mr-0-5"></i>
							<span>نام کاربری:</span>
							<span>{{Auth::user()->email}}</span>
						</a>
						<!-- <a class="list-group-item" href="#">
							<i class="ti-facebook mr-0-5"></i> facebook.com/example
						</a>
						<a class="list-group-item" href="#">
							<i class="ti-twitter mr-0-5"></i> twitter.com/example
						</a> -->
					</ul>
				</div>
				<!-- <div class="card">
					<div class="card-header text-uppercase"><b>Who to follow</b></div>
					<div class="items-list">
						<div class="il-item">
							<a class="text-black" href="#">
								<div class="media">
									<div class="media-left">
										<div class="avatar box-48">
											<img class="b-a-radius-circle" src="img/avatars/1.jpg" alt="">
											<i class="status bg-success bottom right"></i>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading">John Doe</h6>
										<span class="text-muted">Software Engineer</span>
									</div>
								</div>
								<div class="il-icon"><i class="fa fa-angle-right"></i></div>
							</a>
						</div>
						<div class="il-item">
							<a class="text-black" href="#">
								<div class="media">
									<div class="media-left">
										<div class="avatar box-48">
											<img class="b-a-radius-circle" src="img/avatars/2.jpg" alt="">
											<i class="status bg-danger bottom right"></i>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading">John Doe</h6>
										<span class="text-muted">Software Engineer</span>
									</div>
								</div>
								<div class="il-icon"><i class="fa fa-angle-right"></i></div>
							</a>
						</div>
						<div class="il-item">
							<a class="text-black" href="#">
								<div class="media">
									<div class="media-left">
										<div class="avatar box-48">
											<img class="b-a-radius-circle" src="img/avatars/3.jpg" alt="">
											<i class="status bg-secondary bottom right"></i>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading">John Doe</h6>
										<span class="text-muted">Software Engineer</span>
									</div>
								</div>
								<div class="il-icon"><i class="fa fa-angle-right"></i></div>
							</a>
						</div>
					</div>
					<div class="card-block">
						<button type="submit" class="btn btn-primary btn-block">Show more</button>
					</div>
				</div> -->
				<!-- <div class="box bg-white">
					<ul class="nav nav-4">
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="ti-home"></i> My Profile
								<div class="tag tag-warning float-xs-right">14</div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="ti-pulse"></i> Balance
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="ti-wallet"></i> Friends
								<div class="tag tag-purple float-xs-right">14</div>
							</a>
						</li>
						<li class="nav-item b-b-0">
							<a class="nav-link" href="#">
								<i class="ti-help-alt"></i> Settings
							</a>
						</li>
					</ul>
				</div> -->

				<!-- <div class="box bg-info mb-0">
					<div class="box-block">
						<div class="media">
							<div class="media-left">
								<div class="avatar box-48">
									<img class="b-a-radius-circle" src="img/avatars/4.jpg" alt="">
								</div>
							</div>
							<div class="media-body">
								<h6 class="media-heading mt-0-5"><a class="text-white mr-1" href="#">John Doe</a></h6>
								<div class="font-90 mb-0-5">Software Engineer</div>
								<button type="button" class="btn btn-outline-white btn-rounded">Accept</button>
							</div>
						</div>
					</div>
				</div> -->

			</div>
			<div class="col-sm-8 col-md-9">
				<div>
  					@include('layouts.errors')
				</div>
				<!-- <form class="card write-something">
					<textarea placeholder="What's new?"></textarea>
					<div class="card-footer">
						<div class="clearfix">
							<div class="float-xs-left">
								<a href="#" class="text-primary" data-toggle="tooltip" data-placement="bottom" title="Attach image"><i class="ti-image"></i></a>
								<a href="#" class="text-primary" data-toggle="tooltip" data-placement="bottom" title="Attach video"><i class="ti-video-clapper"></i></a>
								<a href="#" class="text-primary" data-toggle="tooltip" data-placement="bottom" title="Attach audio"><i class="ti-music-alt"></i></a>
							</div>
							<div class="float-xs-right">
								<button type="submit" class="btn btn-success btn-rounded">Publish</button>
							</div>
						</div>
					</div>
				</form> -->
				<div class="card mb-0">
					<ul class="nav nav-tabs nav-tabs-2 profile-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#stream" role="tab">ویرایش اطلاعات</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#photos" role="tab">تبدیل عکس</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#change-password" role="tab">تبدیل رمز عبور</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="stream" role="tabpanel">
							<form method="post" action="{{ route('updateNameUser') }}">
								@csrf
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
										<label for="name">نام و تخلص</label>
										<input type="name" name="name" class="form-control" value="{{Auth::user()->name}}">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
										<label>&nbsp;</label>
										<input type="submit" class="btn btn-success form-control" value="ذخیره">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
								</div>
							</form>
						</div>
						<div class="tab-pane card-block" id="photos" role="tabpanel">
							<div class="gallery-2 row">
								<form method="post" action="{{ route('updateUserImage') }}" enctype="multipart/form-data">
									@csrf
									<div class="col-md-3 col-sm-3"></div>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<div class="g-item">
											<div>
					                    		<input type="file" name="image" id="input-file-now" class="dropify" />
					                    		<input type="submit" class="btn btn-success form-control" value="ذخیره">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="tab-pane card-block" id="change-password" role="tabpanel">
							<form method="post" action="{{ route('updateUserPass') }}">
								@csrf
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
										<label>پسورد قدیمی</label>
										<input type="password" name="current-password" class="form-control">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
										<label>پسورد جدید</label>
										<input type="password" name="new-password" class="form-control">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
										<label>تکرار پسورد جدید</label>
										<input type="password" name="confirm_password" class="form-control">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
										<label>&nbsp;</label>
										<input type="submit" class="btn btn-success form-control" value="ذخیره">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
