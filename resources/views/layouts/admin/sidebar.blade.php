<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="{{route('home')}}" class="simple-text logo-mini">

        </a>
        <a href="{{route('home')}}" class="simple-text logo-normal">
            EAT IT
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="active ">
                <a href="/">
                    <i class="now-ui-icons design_app"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{route('foodtypes')}}">
                    <i class=" fas fa-pepper-hot"></i>
                    <p>Food Categories</p>
                </a>
            </li>
            <li>
                <a href="{{route('foods')}}">
                    <i class="fas fa-cheese"></i>
                    <p>Foods</p>
                </a>
            </li>
            <li>
                <a href="{{route('messages')}}">
                    <i class="fas fa-envelope"></i>
                    <p>Messages</p>
                </a>
            </li>
            <li>
                <a href="{{route('orders')}}">
                    <i class="fas fa-balance-scale"></i>
                    <p>Orders</p>
                </a>
            </li>
            <li>
                <a href="{{ route('event-bookings.index') }}">
                    <i class="fas fa-calendar-check"></i>
                    <p>Event Bookings</p>
                </a>
            </li>
            <li>
                <a href="./user.html">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>User Profile</p>
                </a>
            </li>
{{--            <li>--}}
{{--                <a href="./tables.html">--}}
{{--                    <i class="now-ui-icons design_bullet-list-67"></i>--}}
{{--                    <p>Table List</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="./typography.html">--}}
{{--                    <i class="now-ui-icons text_caps-small"></i>--}}
{{--                    <p>Typography</p>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>
