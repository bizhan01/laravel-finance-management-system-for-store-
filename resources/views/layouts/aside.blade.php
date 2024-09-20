<!-- Sidebar -->
<div class="site-overlay"></div>
<div class="site-sidebar" style="background-color: #373944">
  <div class="custom-scroll custom-scroll-light">
    <ul class="sidebar-menu">
      <li class="menu-title">مینو ها</li>

      <li class="with-sub">
        <a href="/" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-home"></i></span>
          <span class="s-text">داشبورد</span>
        </a>
      </li>

      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-diamond"></i></span>
          <span class="s-text">محصولات</span>
        </a>
        <ul>
          <li class="<?php if (Auth::user()->isAdmin == '1'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>"><a href="{{route('category')}}">کتگوری ها</a></li>
          <li class="<?php if (Auth::user()->isAdmin == '1'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>"><a href="{{route('product')}}">افزودن محصول</a></li>
          <li><a href="{{route('assets')}}">اجناس</a></li>
        </ul>
      </li>

      <li class="with-sub">
        <a href="{{route('customer')}}" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-users"></i></span>
          <span class="s-text">مشتریان</span>
        </a>
      </li>

      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-shopping-bag"></i></span>
          <span class="s-text">فروشات</span>
        </a>
        <ul>
          <li><a href="{{route('sales')}}">فروش</a></li>
          <li><a href="{{route('salesList')}}">لیست فروشات</a></li>
          <!-- <li><a href="{{route('pension')}}">اخذ اجوره</a></li> -->
          <li><a href="{{route('pensions')}}">دستمزد</a></li>
          <li><a href="{{route('pensionList')}}">لیست دستمزدها</a></li>
        </ul>
      </li>

      <li class="with-sub">
        <a href="{{route('supplier')}}" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-bank"></i></span>
          <span class="s-text">تامین کنندگان</span>
        </a>
      </li>

      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa  fa-file-text-o"></i></span>
          <span class="s-text">صدور فاکتور</span>
        </a>
        <ul>
          <li><a href="{{route('deposit')}}">دریافت نقدی</a></li>
          <li><a href="{{route('debite')}}">پرداخت نقدی</a></li>
          <li><a href="{{route('quotation')}}">پیش فاکتور</a></li>
        </ul>
      </li>

      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-th"></i></span>
          <span class="s-text">انبار (گدام)</span>
        </a>
        <ul>
          <li><a href="{{route('purchase')}}">خریداری ها</a></li>
          <li><a href="{{route('salesList')}}">فروشات</a></li>
          <li><a href="{{route('inventory')}}">موجودی</a></li>
        </ul>
      </li>

      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-usd"></i></span>
          <span class="s-text">مصارف</span>
        </a>
        <ul>
          <li><a href="{{ route('expense') }}">مصارف روزانه</a></li>
          <li><a href="{{ route('salary') }}">معاشات</a></li>
        </ul>
      </li>

      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-money"></i></span>
          <span class="s-text">مالی</span>
        </a>
        <ul>
          <li><a href="{{ route('creditor') }}">طلب کاران</a></li>
          <li><a href="{{ route('debtors') }}">قرضداران</a></li>
        </ul>
      </li>


      <li class="with-sub <?php if (Auth::user()->isAdmin == '1'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-money"></i></span>
          <span class="s-text">کارمندان</span>
        </a>
        <ul>
          <li><a href="{{ route('addEmployee') }}">ثبت کارمند</a></li>
          <li><a href="{{ route('employeeList') }}">لیست کارمندان برحال</a></li>
          <li><a href="{{ route('unemployedList') }}">کارمندان ترک کرده</a></li>
          <li><a href="/addUser">اضافه نمودن کاربر جدید</a></li>
        </ul>
      </li>




    </ul>
  </div>
</div>
<!-- Aside End -->
