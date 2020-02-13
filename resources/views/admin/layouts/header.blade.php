<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="mobile-only-brand pull-left">
        <div class="nav-header pull-left">
            <div class="logo-wrap">
               {{-- <img style="padding:0px;height: 30px;width: 30px;margin-top:2px;" src="{{asset('admin/images/user.png')}}" alt="user_auth" class="user-auth-img img-circle"/>--}}
                <span style="font-size: 25px">🌸</span>
                <span class="brand-text">لوحة تحكم سوق الورد</span>
            </div>
        </div>
        <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
        <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
        <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
    </div>
    <div id="mobile_only_nav" class="mobile-only-nav pull-right">
        <ul class="nav navbar-right top-nav pull-right">
            <li class="dropdown alert-drp">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user top-nav-icon"></i>
                    @if($usernots > 0 )
                        <span class="top-nav-icon-badge">{{ $usernots }}</span>
                    @endif
                </a>
                <ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
                    <small>اشعارات المستخدمين الجدد</small>
                    <hr/>
                    @if($usernots > 0 )
                        @foreach ($admin->notifications as $notification)
                            @if(isset($notification->data['user']))
                                <li>
                                    <a ad="{{ $notification->id }}" role="button" href="{{ route('user.edit', $notification->data['user']['id']) }}" class="deletenot" notification="{{ $notification->id }}" data-token="{{ csrf_token() }}">
                                       <span style="margin-right:20px">{{ $notification->data['user']['email'] }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @else
                        <h6 style="margin-right:20px">لا يوجد اعضاء جدد</h6>
                    @endif
                </ul>
            </li>
            <li class="dropdown alert-drp">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cart-plus top-nav-icon"></i>
                    @if($newshopnots > 0 )
                        <span class="top-nav-icon-badge">{{ $newshopnots }}</span>
                    @endif
                </a>
                <ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
                    <small>اشعارات انشاء محل جديد</small>
                    <hr/>
                    @if($newshopnots > 0 )
                        @foreach ($admin->notifications as $notification)
                            @if(isset($notification->data['shop']))
                                <li>
                                    <a ad="{{ $notification->id }}" role="button" href="{{ route('shop.edit', $notification->data['shop']['id']) }}" class="deletenot" notification="{{ $notification->id }}" data-token="{{ csrf_token() }}">
                                       <span style="margin-right:20px">{{ $notification->data['shop']['name'] }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @else
                        <h6 style="margin-right:20px">لا يوجد طلبات محلات جديدة </h6>
                    @endif
                </ul>
            </li>
            <li class="dropdown alert-drp">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-comments  top-nav-icon"></i>
                    @if($shopnots + $flwrnots > 0 )
                        <span class="top-nav-icon-badge">{{ $shopnots + $flwrnots }}</span>
                    @endif
                </a>
                <ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
                    <small>اشعارات التعليقات</small>
                    <hr/>
                    @if($shopnots + $flwrnots > 0 )
                        <li class="dropdown-submenu first-level">
                            <a tabindex="-1" href="#">
                                تعليقات المحلات
                                <span class="counter-nw">{{ $shopnots }}</span>
                            </a>
                            <ul class="dropdown-menu sec-level">
                                @foreach ($admin->notifications as $notification)
                                    @if(isset($notification->data['shopcomment']))
                                        <li>
                                            <a ad="{{ $notification->id }}" role="button" href="{{ route('shopcomment.show', $notification->data['shopcomment']['id']) }}" class="deletenot" notification="{{ $notification->id }}" data-token="{{ csrf_token() }}">
                                                تعليق جديد على المحل رقم
                                                " <span>{{ $notification->data['shopcomment']['shop_id'] }}</span> "
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                            <li class="dropdown-submenu first-level">
                                <a tabindex="-1" href="#">
                                    تعليقات باقات الورد
                                    <span class="counter-nw">{{ $flwrnots }}</span>
                                </a>
                                <ul class="dropdown-menu sec-level">
                                    @foreach ($admin->notifications as $notification)
                                        @if(isset($notification->data['flwcomment']))
                                           <li>
                                                <a ad="{{ $notification->id }}" role="button" href="{{ route('flowercomment.show', $notification->data['flwcomment']['id']) }}" class="deletenot" notification="{{ $notification->id }}" data-token="{{ csrf_token() }}">
                                                   تعليق جديد على الباقة رقم
                                                    " <span>{{ $notification->data['flwcomment']['flower_id'] }}</span> "
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                    @else
                        <h6 style="margin-right:20px">لا يوجد تعليقات جديدة</h6>
                    @endif
                </ul>
            </li>
            <li class="dropdown alert-drp">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i style="font-size: 18px" class="fa fa-credit-card-alt top-nav-icon"></i>
                    @if($paynots > 0 )
                        <span class="top-nav-icon-badge">{{ $paynots }}</span>
                    @endif
                </a>
                <ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
                    <small>اشعارات الشراء</small>
                    <hr/>
                    @if($paynots > 0 )
                        @foreach ($admin->notifications as $notification)
                            @if(isset($notification->data['pay']))
                                <li> <a ad="{{ $notification->id }}" role="button" href="{{ route('pay.show', $notification->data['pay']['id']) }}" class="deletenot" notification="{{ $notification->id }}" data-token="{{ csrf_token() }}">
                                        <h6 style="display: inline-block;margin-right:20px">"عملية المستخدم رقم "</h6>  {{ $notification->data['pay']['user_id'] }} "
                                    </a></li>
                            @endif
                        @endforeach
                    @else
                        <h6 style="margin-right:20px">لا يوجد اشعارات</h6>
                    @endif
                </ul>
            </li>
        @if (!Auth::guest())
                <a class="log btn btn-danger" style="color: white!important;" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                    {{ __('تسجيل الخروج') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endif
        </ul>
    </div>
</nav>
