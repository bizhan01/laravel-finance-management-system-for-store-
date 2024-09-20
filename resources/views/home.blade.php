@if(auth()->user()->isAdmin == 0)
	@include('admin')
@else(auth()->user()->isAdmin == 1)
	@include('seller')
@endif
