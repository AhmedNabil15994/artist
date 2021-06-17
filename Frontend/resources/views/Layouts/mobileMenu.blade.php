<div class="bg-sidenavOpen"></div>
<div class="splash">
    <div>
      	<img src="{{ asset('/assets/images/logo.png') }}" alt="" />
      	<div class="loadProgress">
			<span class="lineStyle"></span>
		</div>
    </div>
</div>

<div id="mySidenav" class="sidenav">
	<img class="logo" src="{{ asset('/assets/images/logo.png') }}" alt="">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
			<i class="fas fa-times"></i>
	</a>
	<ul class="side-nav-links list-unstyled">
		<li><a class="navLink" href="{{ URL::to('/') }}">الرئيسية</a></li>
		<li class="NesteListParent">
			<i class="flaticon-left-arrow"></i>
		<a class="navLink">عن الجمعية</a>
		<ul class="sideMenue list-unstyled">
          	<li><a href="{{ URL::to('/aboutUs') }}">من نحن</a></li>
          	<li><a href="{{ URL::to('/founders') }}">المؤسسين</a></li>
          	<li><a href="{{ URL::to('/directors') }}">مجلس الادارة</a></li>
        </ul>
		</li>
		<li><a class="navLink" href="{{ URL::to('/events') }}">الفعاليات</a></li>
		{{-- <li class="NesteListParent">
			<a class="navLink">لوائح وسياسات</a>
			<i class="flaticon-left-arrow"></i>
	        <ul class="sideMenue list-unstyled">
	          	<li><a href="">سياسة تعارض المصالح</a></li>
	          	<li><a href="">سياسة الابلاغ عن المخالفات</a></li>
	         	<li><a href="">الية ادارة المتطوعين</a></li>
	          	<li><a href="">دليل اجراءات عمليات غسيل</a></li>
	          	<li><a href="">سياسة قواعد السلوك</a></li>
	          	<li><a href="">سياسة ادارة المخاطر</a></li>
	        </ul>
	    </li> --}}
		<li><a class="navLink" href="{{ URL::to('/regulations') }}">لوائح وسياسات</a></li>
		{{-- <li><a class="navLink" href="">طلب بطاقة</a></li> --}}
		<li><a class="navLink" href="{{ URL::to('/registeration') }}">طلب عضوية</a></li>
		<li><a class="navLink" href="#">اتصل بنا</a></li>
	 </ul>
</div>