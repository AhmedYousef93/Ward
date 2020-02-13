<!DOCTYPE html>
<html lang='ar'>
<head>
	@include('admin.layouts.head')
</head>
<body class='admin-dashboard'>
<input type="hidden" value="{{URL::to('/')}}" id="base_url">
<!-- Preloader -->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!-- /Preloader -->
<div class="wrapper theme-1-active pimary-color-red">
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
        <div class="page-wrapper">
            <div class="container-fluid pt-25">
			    @section('main-content')
                @show
            </div>
        </div>
    @include('admin.layouts.footer')
</div>
     @include('admin.layouts.foot')
</body>
</html>