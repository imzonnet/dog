@include('Dashboard::frontend.default._layouts._header')

<!-- Navigation -->
@include('Dashboard::frontend.default._layouts._NavigationPartial')

<div id="wrapper">

    @yield('content')

</div>
<!-- /#wrapper -->


@include('Dashboard::frontend.default._layouts._footer')