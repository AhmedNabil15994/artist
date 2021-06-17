<div class="headerHeight"></div>

  <!-- navabr -->
  <div class="myNavbar">
    <div class="container-fluid">
      <div class="Logo">
        <a href="{{ URL::to('/') }}">
          <img src="{{ asset('/assets/images/logo.png') }}" alt="">
        </a>
      </div>
      <ul class="links list-unstyled">
        <li class="navLink"><a class="navItem" href="{{ URL::to('/') }}">الرئيسية</a></li>
        <li class="navLink NesteListParent">
          <a class="navItem" href="#">عن الجمعية</a>
          <ul class="sideMenue list-unstyled">
            <li><a href="{{ URL::to('/aboutUs') }}">من نحن</a></li>
            <li><a href="{{ URL::to('/founders') }}">المؤسسين</a></li>
            <li><a href="{{ URL::to('/directors') }}">مجلس الادارة</a></li>
          </ul>
        </li>
        <li class="navLink"><a class="navItem" href="{{ URL::to('/events') }}">الفعاليات</a></li>
       {{--  <li class="navLink NesteListParent">
          <a class="navItem" href="#">لوائح وسياسيات</a>
          <ul class="sideMenue list-unstyled">
            <li><a href="">سياسة تعارض المصالح</a></li>
            <li><a href="">سياسة الابلاغ عن المخالفات</a></li>
            <li><a href="">الية ادارة المتطوعين</a></li>
            <li><a href="">دليل اجراءات عمليات غسيل</a></li>
            <li><a href="">سياسة قواعد السلوك</a></li>
            <li><a href="">سياسة ادارة المخاطر</a></li>
          </ul>
        </li> --}}
        <li class="navLink"><a class="navItem" href="{{ URL::to('/regulations') }}">لوائح وسياسات</a></li>
        {{-- <li class="navLink"><a class="navItem" href="">طلب بطاقة</a></li> --}}
        <li class="navLink"><a class="navItem" href="{{ URL::to('/registeration') }}">طلب عضوية</a></li>
        <li class="navLink"><a class="navItem" href="#">اتصل بنا</a></li>
        <div class="clear"></div>
      </ul>
      <div class="clear"></div>
      <i class="fas fa-bars openSideMenue" onclick="openNav()"></i>

    </div>
  </div>