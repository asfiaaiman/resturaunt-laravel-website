<!DOCTYPE html>
<html lang="en">
@include('layouts.website.headerscript')
<body>
@include('layouts.website.topbar')
@include('layouts.website.header')
@include('layouts.website.hero')
<div>
@yield('content')
</div>


@include('layouts.website.footer')
@include('layouts.website.footerscripts')
</body>
</html>