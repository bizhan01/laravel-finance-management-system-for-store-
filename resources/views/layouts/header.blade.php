<!-- Header -->
<div class="site-header">
  <nav class="navbar navbar-light">
    <div class="navbar-left">
      <a class="navbar-brand" href="/">
        <div class="logo"></div>
      </a>
      <div class="toggle-button dark sidebar-toggle-first float-xs-left hidden-md-up">
        <span class="hamburger"></span>
      </div>
      <div class="toggle-button-second dark float-xs-right hidden-md-up">
        <i class="ti-arrow-right"></i>
      </div>
      <div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">
        <span class="more"></span>
      </div>
    </div>
    <div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">
      <div class="toggle-button light sidebar-toggle-second float-xs-left hidden-sm-down">
        <span class="hamburger"></span>
      </div>
     <!--  <div class="toggle-button-second light float-xs-right hidden-sm-down">
        <i class="ti-arrow-right"></i>
      </div> -->
      <ul class="nav navbar-nav float-md-right">


        <li class="nav-item dropdown hidden-sm-down">
          <a href="#" data-toggle="dropdown" aria-expanded="false">
            <span class="avatar box-32">
             <img src="/UploadedImages/{{Auth::user()->profileImage}}" style="width: 40px; height: 40px;">
            </span>&nbsp;&nbsp;&nbsp;
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu dropdown-menu-right animated fadeInUp">
            <a class="dropdown-item" href="{{ route('profile') }}">
              <i class="ti-user mr-0-5"></i> پروفایل
            </a>
            <!-- <a class="dropdown-item" href="#">
              <i class="ti-settings mr-0-5"></i> تنظیمات
            </a> -->
            <div class="dropdown-divider"></div>
            <!-- <a class="dropdown-item" href="#"><i class="ti-help mr-0-5"></i> کمک </a> -->

            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="ti-power-off mr-0-5"> خروج</i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

          </div>
        </li>
      </ul>

      <ul class="nav navbar-nav">
        <li class="nav-item hidden-sm-down">
          <a class="nav-link toggle-fullscreen" href="#">
            <i class="ti-fullscreen"></i>
          </a>
        </li>

      </ul>
      <!-- <div class="header-form float-md-left ml-md-2">
        <form>
          <input type="text" class="form-control b-a" placeholder="Search for...">
          <button type="submit" class="btn bg-white b-a-0">
            <i class="ti-search"></i>
          </button>
        </form>
      </div> -->
    </div>
  </nav>
</div>
