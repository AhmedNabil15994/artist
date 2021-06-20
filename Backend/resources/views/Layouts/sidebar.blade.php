begin::Aside-->
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <!--begin::Logo-->
        <a href="index.html" class="brand-logo">
            <img alt="Logo" src="{{ asset('/assets/images/logoServers.png') }}" />
        </a>
        <!--end::Logo-->
        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </button>
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">
                <li class="menu-item {{ Active(URL::to('/')) }}" aria-haspopup="true">
                    <a href="{{ URL::to('/') }}" class="menu-link ">
                        <i class="menu-icon flaticon-dashboard"></i>
                        <span class="menu-text">الرئيسية</span>
                    </a>
                </li>

                @if(\Helper::checkRules('list-pages,list-cities,list-fields,list-sliders'))
                <li class="menu-item menu-item-submenu {{ Active(URL::to('/cities*'),'menu-item-open active') }} {{ Active(URL::to('/sliders*'),'menu-item-open active') }} {{ Active(URL::to('/fields*'),'menu-item-open active') }} {{ Active(URL::to('/pages*'),'menu-item-open active') }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-home-2"></i>
                        <span class="menu-text">الواجهة الرئيسية</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="80">
                        <span class="menu-arrow"></span>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">الواجهة الرئيسية</span>
                                </span>
                            </li>
                            @if(\Helper::checkRules('list-pages'))
                            <li class="menu-item {{ Active(URL::to('/pages*')) }} " aria-haspopup="true">
                                <a href="{{ URL::to('/pages') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">الصفحات</span>
                                </a>
                            </li>
                            @endif
                            @if(\Helper::checkRules('list-fields'))
                            <li class="menu-item {{ Active(URL::to('/fields*')) }} " aria-haspopup="true">
                                <a href="{{ URL::to('/fields') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">المجالات الفنية</span>
                                </a>
                            </li>
                            @endif
                            @if(\Helper::checkRules('list-sliders'))
                            <li class="menu-item {{ Active(URL::to('/sliders*')) }} " aria-haspopup="true">
                                <a href="{{ URL::to('/sliders') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">الاسلايدر</span>
                                </a>
                            </li>
                            @endif
                            @if(\Helper::checkRules('list-cities'))
                            <li class="menu-item {{ Active(URL::to('/cities*')) }} " aria-haspopup="true">
                                <a href="{{ URL::to('/cities') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">المدن</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif

                @if(\Helper::checkRules('list-contactUs'))
                <li class="menu-item menu-item-submenu {{ Active(URL::to('/contactUs*'),'menu-item-open active') }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-email"></i>
                        <span class="menu-text">الاتصال بنا</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="80">
                        <span class="menu-arrow"></span>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">الاتصال بنا</span>
                                </span>
                            </li>
                            <li class="menu-item {{ Active(URL::to('/contactUs*')) }}" aria-haspopup="true">
                                <a href="{{ URL::to('/contactUs') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">الاتصال بنا</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if(\Helper::checkRules('list-directors,list-founders'))
                <li class="menu-item menu-item-submenu {{ Active(URL::to('/founders*'),'menu-item-open active') }} {{ Active(URL::to('/directors*'),'menu-item-open active') }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-event-calendar-symbol"></i>
                        <span class="menu-text">المؤسسين ومجلس الادارة</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="80">
                        <span class="menu-arrow"></span>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">المؤسسين ومجلس الادارة</span>
                                </span>
                            </li>
                            @if(\Helper::checkRules('list-founders'))
                            <li class="menu-item {{ Active(URL::to('/founders*')) }}" aria-haspopup="true">
                                <a href="{{ URL::to('/founders') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">المؤسسين</span>
                                </a>
                            </li>
                            @endif
                            @if(\Helper::checkRules('list-directors'))
                            <li class="menu-item {{ Active(URL::to('/directors*')) }}" aria-haspopup="true">
                                <a href="{{ URL::to('/directors') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">مجلس الادارة</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif

                @if(\Helper::checkRules('list-events,list-initiatives'))
                <li class="menu-item menu-item-submenu {{ Active(URL::to('/events*'),'menu-item-open active') }} {{ Active(URL::to('/initiatives*'),'menu-item-open active') }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-event-calendar-symbol"></i>
                        <span class="menu-text">الفعاليات و المبادرات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="80">
                        <span class="menu-arrow"></span>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">الفعاليات و المبادرات</span>
                                </span>
                            </li>
                            @if(\Helper::checkRules('list-events'))
                            <li class="menu-item {{ Active(URL::to('/events*')) }}" aria-haspopup="true">
                                <a href="{{ URL::to('/events') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">الفعاليات</span>
                                </a>
                            </li>
                            @endif
                            @if(\Helper::checkRules('list-initiatives'))
                            <li class="menu-item {{ Active(URL::to('/initiatives*')) }}" aria-haspopup="true">
                                <a href="{{ URL::to('/initiatives') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">المبادرات</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif

                @if(\Helper::checkRules('list-coupons'))
                <li class="menu-item menu-item-submenu {{ Active(URL::to('/coupons*'),'menu-item-open active') }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon fa fa-tag"></i>
                        <span class="menu-text">كوبونات الخصم</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="80">
                        <span class="menu-arrow"></span>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">كوبونات الخصم</span>
                                </span>
                            </li>
                            <li class="menu-item {{ Active(URL::to('/coupons*')) }}" aria-haspopup="true">
                                <a href="{{ URL::to('/coupons') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">كوبونات الخصم</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                
             {{--    @if(\Helper::checkRules('list-memberships,list-conditions,list-features'))
                <li class="menu-item menu-item-submenu {{ Active(URL::to('/memberships*'),'menu-item-open active') }} {{ Active(URL::to('/conditions*'),'menu-item-open active') }} {{ Active(URL::to('/features*'),'menu-item-open active') }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon far fa-id-card"></i>
                        <span class="menu-text">البطاقات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="80">
                        <span class="menu-arrow"></span>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">البطاقات</span>
                                </span>
                            </li>
                            @if(\Helper::checkRules('list-memberships'))
                            <li class="menu-item {{ Active(URL::to('/memberships*')) }}" aria-haspopup="true">
                                <a href="{{ URL::to('/memberships') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">البطاقات</span>
                                </a>
                            </li>
                            @endif
                            @if(\Helper::checkRules('list-conditions'))
                            <li class="menu-item {{ Active(URL::to('/conditions*')) }}" aria-haspopup="true">
                                <a href="{{ URL::to('/conditions') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">شروط البطاقات</span>
                                </a>
                            </li>
                            @endif
                            @if(\Helper::checkRules('list-features'))
                            <li class="menu-item {{ Active(URL::to('/features*')) }}" aria-haspopup="true">
                                <a href="{{ URL::to('/features') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">مميزات البطاقات</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif --}}

                @if(\Helper::checkRules('list-orders'))
                <li class="menu-item menu-item-submenu {{ Active(URL::to('/orders*'),'menu-item-open active') }} " aria-haspopup="true" data-menu-toggle="hover">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon2-rectangular"></i>
                        <span class="menu-text">الطلبات </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="80">
                        <span class="menu-arrow"></span>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">الطلبات</span>
                                </span>
                            </li>
                            @if(\Helper::checkRules('list-orders'))
                            <li class="menu-item {{ Active(URL::to('/orders*')) }}" aria-haspopup="true">
                                <a href="{{ URL::to('/orders') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">الطلبات</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif

                @if(\Helper::checkRules('list-user-cards'))
                <li class="menu-item menu-item-submenu {{ Active(URL::to('/userCards*'),'menu-item-open active') }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon far fa-credit-card"></i>
                        <span class="menu-text">العضويات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="80">
                        <span class="menu-arrow"></span>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">العضويات</span>
                                </span>
                            </li>
                            @if(\Helper::checkRules('list-user-cards'))
                            <li class="menu-item {{ Active(URL::to('/userCards*')) }}" aria-haspopup="true">
                                <a href="{{ URL::to('/userCards') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">العضويات</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif

                @if(\Helper::checkRules('list-regulations'))
                <li class="menu-item menu-item-submenu {{ Active(URL::to('/regulations*'),'menu-item-open active') }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon fa fa-tag"></i>
                        <span class="menu-text">لوائح وسياسات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="80">
                        <span class="menu-arrow"></span>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">لوائح وسياسات</span>
                                </span>
                            </li>
                            <li class="menu-item {{ Active(URL::to('/regulations*')) }}" aria-haspopup="true">
                                <a href="{{ URL::to('/regulations') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">لوائح وسياسات</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                @if(\Helper::checkRules('list-groups,list-admins,list-logs'))
                <li class="menu-item menu-item-submenu {{ Active(URL::to('/groups*'),'menu-item-open active') }} {{ Active(URL::to('/users*'),'menu-item-open active') }} {{ Active(URL::to('/logs*'),'menu-item-open active') }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-users"></i>
                        <span class="menu-text">المشرفين والاداريين</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="80">
                        <span class="menu-arrow"></span>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">المشرفين والاداريين</span>
                                </span>
                            </li>
                            @if(\Helper::checkRules('list-groups'))
                            <li class="menu-item {{ Active(URL::to('/groups*')) }} " aria-haspopup="true">
                                <a href="{{ URL::to('/groups') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">مجموعات المشرفين</span>
                                </a>
                            </li>
                            @endif
                            @if(\Helper::checkRules('list-users'))
                            <li class="menu-item {{ Active(URL::to('/users*')) }}" aria-haspopup="true">
                                <a href="{{ URL::to('/users') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">المشرفين والاداريين</span>
                                </a>
                            </li>
                            @endif
                            @if(\Helper::checkRules('list-logs'))
                            <li class="menu-item {{ Active(URL::to('/logs*')) }} " aria-haspopup="true">
                                <a href="{{ URL::to('/logs') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">سجلات الدخول للنظام</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif

                @if(\Helper::checkRules('list-variables,list-blockedUsers'))
                <li class="menu-item menu-item-submenu {{ Active(URL::to('/generalSettings*'),'menu-item-open active') }} {{ Active(URL::to('/panelSettings*'),'menu-item-open active') }} {{ Active(URL::to('/blockedUsers*'),'menu-item-open active') }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-settings-1"></i>
                        <span class="menu-text">ادارة النظام</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="80">
                        <span class="menu-arrow"></span>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">ادارة النظام</span>
                                </span>
                            </li>
                            @if(\Helper::checkRules('list-variables'))
                            <li class="menu-item {{ Active(URL::to('/generalSettings*')) }}" aria-haspopup="true">
                                <a href="{{ URL::to('/generalSettings') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">اعدادات عامة</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Active(URL::to('/panelSettings*')) }} " aria-haspopup="true">
                                <a href="{{ URL::to('/panelSettings') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">اعدادات لوحة التحكم</span>
                                </a>
                            </li>
                            @endif
                            @if(\Helper::checkRules('list-blockedUsers'))
                            <li class="menu-item {{ Active(URL::to('/blockedUsers*')) }} " aria-haspopup="true">
                                <a href="{{ URL::to('/blockedUsers') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"></i>
                                    <span class="menu-text">الاعضاء المحظورة</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                <li class="menu-item {{ Active(URL::to('/logout/')) }}" aria-haspopup="true">
                    <a href="{{ URL::to('/logout/') }}" class="menu-link ">
                        <i class="menu-icon flaticon-logout"></i>
                        <span class="menu-text">تسجيل الخروج</span>
                    </a>
                </li>
            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
<!--end::Aside