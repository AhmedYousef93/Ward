<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
    <ul id="nav" class="nav navbar-nav side-nav nicescroll-bar">
 <li class="navigation-header">
            <span>لوحة التحكم</span>
            <i class="zmdi zmdi-more"></i>
        </li>

        <br>
        <li>
            <a href="{{ url('admin/home') }}" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">لوحة التحكم</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr"><div class="pull-left"><i class="fa fa-sliders mr-20"></i><span class="right-nav-text">سلايدر</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{ route('slider.index') }}">كل السلايدرز</a>
                </li>
                <li>
                    <a href="{{ route('slider.create') }}">اضافة سلايدر جديد</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#form_drar"><div class="pull-left"><i class="fa mr-20">🌷</i><span class="right-nav-text">ورد عالي الجوده </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="form_drar" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a  href="{{ route('warda.index') }}">كل الورد</a>
                    <a  href="{{ route('warda.create') }}">اضافه ورده </a>

                </li>
            </ul>
        </li>




        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_dr"><div class="pull-left"><i class="fa mr-20">🌷</i><span class="right-nav-text">باقات الورد </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="chart_dr" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{ route('flower.index') }}">كل باقات الورد</a>
                    <a href="{{ route('flower.create') }}">اضف باقه </a>
                    



                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_drw"><div class="pull-left"><i style="padding-right:7px" class="fa fa-usd mr-20"></i><span class="right-nav-text">اسعار باقات الورد</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="chart_drw" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{ route('flowersize.index') }}">جميع الاحجام</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#table_dr"><div class="pull-left"><i class="fa fa-folder-open mr-20"></i><span class="right-nav-text">التصنيفات</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="table_dr" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{ route('category.index') }}">كل التصنيفات</a>
                    <a href="{{ route('category.create') }}">اضف تصنيف </a>

                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#table_drr"><div class="pull-left"><i class="fa fa-folder mr-20"></i><span class="right-nav-text"> المصميمين  </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="table_drr" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{ route('designer.index') }}">كل المصميمين  </a>
                </li>
                <li>
                    <a href="{{ route('designer.create') }}">اضافه مصمم </a>
                </li>
            </ul>
        </li>
         <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_drsa"><div class="pull-left"><i class="fa  fa-folder-open-o mr-20"></i><span class="right-nav-text">نوع  الورد </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="chart_drsa" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{ route('additioncategory.index') }}">كل تصنيفات الاضافات</a>
                </li>
                <li>
                    <a href="{{ route('additioncategory.create') }}">اضافة جديدة</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_dra"><div class="pull-left"><i class="fa fa-gift mr-20"></i><span class="right-nav-text">الاضافات</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="chart_dra" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{ route('addition.index') }}">كل الاضافات</a>
                </li>
                <li>
                    <a href="{{ route('addition.create') }}">اضافة جديدة</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_drea"><div class="pull-left"><i class="fa fa-picture-o mr-20"></i><span class="right-nav-text">بطاقات التهنئة</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="chart_drea" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{ route('card.index') }}">بطاقات التهنئة</a>
                </li>
                <li>
                    <a href="{{ route('card.create') }}">اضافة بطاقة جديدة</a>
                </li>
            </ul>
        </li>
       
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_drasa"><div class="pull-left"><i class="fa fa-university mr-20"></i><span class="right-nav-text">المحلات</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="chart_drasa" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{ route('shop.index') }}">كل المحلات</a>
                </li>
                <li>
                    <a href="{{ route('shop.create') }}">اضافة محل جديد</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#maps_drx"><div class="pull-left"><i style="font-size: 15px" class="fa fa-globe mr-20"></i><span class="right-nav-text">المدن</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="maps_drx" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('country.index') }}">كل المدن</a>
                </li>
                <li>
                    <a href="{{ route('country.create') }}">اضافة مدينة جديدة</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#icon_dr"><div class="pull-left"><i class="fa fa-handshake-o mr-20"></i><span class="right-nav-text">عمليات الشراء</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="icon_dr" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('pay.index') }}">كل طلبات الشراء</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#icon_drv"><div class="pull-left"><i class="fa fa-user mr-20"></i><span class="right-nav-text">الاعضاء</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="icon_drv" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('user.index') }}">كل الأعضاء</a>
                </li>
                <li>
                    <a href="{{ route('user.create') }}">اضافة عضو جديد</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#maps_dr"><div class="pull-left"><i style="font-size: 15px" class="fa fa-cc-visa mr-20"></i><span class="right-nav-text">الحسابات البنكية</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="maps_dr" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('bank_accounts.index') }}">كل الحسابات البنكية</a>
                </li>
                <li>
                    <a href="{{ route('bank_accounts.create') }}">اضافة حساب بنكي جديد</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_drq"><div class="pull-left"><i class="fa fa-comments-o mr-20"></i><span class="right-nav-text">التعليقات</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="chart_drq" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{ route('flowercomment.index') }}">تعليقات باقات الورد</a>
                </li>
                <li>
                    <a href="{{ route('shopcomment.index') }}">تعليقات المحلات</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#pages_dr"><div class="pull-left"><i class="zmdi zmdi-google-pages mr-20"></i><span class="right-nav-text">صفحات التطبيق</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="pages_dr" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{ route('pages.index') }}">كل الصفحات</a>
                </li>
                <li>
                    <a href="{{ route('pages.create') }}">اضافة صفحة جديدة</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#pages_drs"><div class="pull-left"><i class="fa fa-cogs mr-20"></i><span class="right-nav-text">اعدادات التطبيق</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="pages_drs" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{ route('option.index') }}">التعديل</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- /Left Sidebar Menu -->
