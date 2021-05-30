<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.headerscripts')
<body class="">
<div class="wrapper ">
    @include('layouts.admin.sidebar')
    <div class="main-panel ps" id="main-panel">
        @include('layouts.admin.header')
        <div class="content">
        @yield('content')
        </div>
        @include('layouts.admin.footer')

    </div>
</div>
@include('layouts.admin.footerscripts')
</body>
</html>
