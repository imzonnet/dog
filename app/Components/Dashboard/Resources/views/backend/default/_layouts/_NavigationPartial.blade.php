<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('backend.home')}}">Admin Panel</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> {{ current_user()->present()->fullname }} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{route('backend.auth.getLogout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{route('backend.home')}}"><i class="fa fa-dashboard fa-fw"></i> {{ trans('cms.dashboard') }}</a>
                </li>
                <!-- Role & Permission -->
                @if( current_user()->hasRole(['admin']) )
                    <li>
                        <a href="{{route('backend.role.index')}}"><i class="fa fa-user fa-fw"></i> {{ trans('Dashboard::role.index') }}<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('backend.role.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('Dashboard::role.list') }}</a>
                            </li>
                            <li>
                                <a href="{{route('backend.role.create')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('Dashboard::role.create') }}</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    @endif
                            <!-- End User -->
                <!-- User -->
                @if( current_user()->ability(['admin'], ['user.index', 'user.create', 'user.update', 'user.delete']) )
                <li>
                    <a href="{{route('backend.user.index')}}"><i class="fa fa-user fa-fw"></i> {{ trans('Dashboard::user.index') }}<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.user.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('Dashboard::user.list') }}</a>
                        </li>
                        <li>
                            <a href="{{route('backend.user.create')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('Dashboard::user.create') }}</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endif
                <!-- End User -->

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
