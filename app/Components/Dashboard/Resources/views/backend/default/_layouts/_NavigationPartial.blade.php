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
                <i class="fa fa-user fa-fw"></i> {{ \Auth::user()->present()->fullname }} <i class="fa fa-caret-down"></i>
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
                    <a href="{{route('backend.home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                 <!-- User Role -->
                <li>
                    <a href="{{route('backend.userrole.index')}}"><i class="fa fa-users fa-fw"></i> User Roles<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>

                            <a href="{{route('backend.userrole.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>List User Roles</a>
                        </li>
                        <li>
                            <a href="{{route('backend.userrole.create')}}"><i class="fa fa-angle-double-right fa-fw"></i>Add New</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- End User Role -->
                <!-- User -->
                <li>
                    <a href="{{route('backend.user.index')}}"><i class="fa fa-user fa-fw"></i> Users<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.user.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>List Users</a>
                        </li>
                        <li>
                            <a href="{{route('backend.user.create')}}"><i class="fa fa-angle-double-right fa-fw"></i>Add New</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- End User -->

                <!-- Posts Component -->
                <li>
                    <a href="{{route('backend.posts.index')}}"><i class="fa fa-file-text fa-fw"></i> Posts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.posts.index')}}">List Posts</a>
                        </li>
                        <li>
                            <a href="{{route('backend.posts.create')}}">Add New</a>
                        </li>
                        <li>
                            <a href="{{route('backend.post-categories.index')}}">Categories</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- End Posts -->
                <!-- Posts Component -->
                <li>
                    <a href="{{route('backend.pages.index')}}"><i class="fa fa-file-text fa-fw"></i> Pages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.pages.index')}}">List Pages</a>
                        </li>
                        <li>
                            <a href="{{route('backend.pages.create')}}">Add New</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- End Posts -->
  
                <!-- Expert -->
                <li>
                    <a href="{{route('backend.expert.index')}}"><i class="fa fa-user fa-fw"></i> Experts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.category.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>List Category</a>
                        </li>
                        <li>
                            <a href="{{route('backend.level.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>List Level</a>
                        </li>
                        <li>
                            <a href="{{route('backend.expert.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>List Expert</a>
                        </li>
                        <li>
                            <a href="{{route('backend.insight.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>List Insight<span class="fa arrow"></span></a>
                        </li> 
                        <li>
                            <a href="{{route('backend.rate.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>List Rate<span class="fa arrow"></span></a>
                        </li> 
                        <li>
                            <a href="{{route('backend.qualification.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>List Qualification<span class="fa arrow"></span></a>
                        </li>  
                        <li>
                            <a href="{{route('backend.speciality.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>List Speciality<span class="fa arrow"></span></a>
                        </li>
                        <li>
                            <a href="{{route('backend.schedule.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>List Schedule<span class="fa arrow"></span></a>
                        </li>     
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- End Expert -->
                <!-- Book Expert-->
                <li>
                    <a href="{{route('backend.book.list')}}"><i class="fa fa-th fa-fw"></i> Payment<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.book.list')}}">List Payment</a>
                        </li>
                    </ul>
                </li>
                <!-- End Contacts -->

                <!-- Contacts Component -->
                <li>
                    <a href="{{route('backend.contact.index')}}"><i class="fa fa-file-text fa-fw"></i> Contacts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.contact-category.index')}}">List Categories</a>
                        </li>
                        <li>
                            <a href="{{route('backend.contact.index')}}">List Contacts</a>
                        </li>
                    </ul>
                </li>
                <!-- End Contacts -->
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
