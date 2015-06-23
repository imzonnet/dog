<!-- begin header -->
<header>
    <div class="navbar navbar-inverse navbar-static-top">
        <div class="navbar-inner">
            <div class="container">
                <button class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <?php
                    $uri = Request::path();
                    $home = $uri=='home'?'active':'';
                    $caegories = ($uri=='category/general-health/5' || $uri=='category/detox-plans/3' ||$uri=='category/blood-type-diet/2' ||$uri=='allcategories')?'active':'';
                    $popular = $uri=='expertlist'?'active':'';
                    $insight = $uri=='insights'?'active':'';
                    $hiw = $uri=='page/how-it-works/1'?'active':'';
                 ?>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="{{$home}}"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                        <li class="dropdown {{$caegories}}"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <i class="icon-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/category/general-health/5')}}" title="General Health">General Health</a></li>
                                <li><a href="{{url('/category/detox-plans/3')}}" title="Detox">Detox</a></li>
                                <li><a href="{{url('/category/blood-type-diet/2')}}" title="Blood Type">Blood Type Diet</a></li>
                                <li><a href="{{url('/allcategories')}}" title="Full List">View full list  ></a></li>

                            </ul>
                        </li>
                        <li class="{{$popular}}"><a href="{{url('/expertlist')}}" title="Popular">Popular</a></li>

                        <li class="{{$insight}}"><a href="{{url('/insights')}}" title="Insights">Insights</a></li>
                        <li class="{{$hiw}}"><a href="{{url('/page/how-it-works/1')}}" title="How">How it works</a></li>
                    </ul>

                </div>
                <!--/.nav-collapse -->

            </div>
        </div>
    </div>

    <div id="logo-container">
        <div class="container">
            <div class="row">
                <div class="span10">
                    <a class="brand" href="{{route('home')}}" title="Natural Gurus">
                        <img src="{{ URL::asset('templates/frontend/default/images/logo.png') }}" alt="Natural Gurus Logo">
                    </a>
                    <span class="tag-line hidden-phone">Where the world gets healthier</span>
                </div>
                <div class="span2">
                    <div class="clearfix">
                        @if(current_user())
                            <div class="btn-group pull-right">
                                <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle" type="button">
                                    Hello {{current_user()->present()->fullname}} <span class="caret"></span>
                                </button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="{{url('/expert')}}">Dashboard</a></li>
                                    <li><a href="{{url('/auth/logout')}}">Logout</a></li>
                                </ul>
                            </div>
                        @else
                        <button class="btn pull-right span2 btn-inverse-form btn-medium" data-toggle="modal" data-target="#myModal">Expert Login</button>
                        <div class="modal fade hide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div id="login-overlay" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only"></span></button>
                                        <h4 class="modal-title" id="myModalLabel">Expert Portal Login</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <div class="well">
                                                    <form id="loginForm" role="form" method="POST" action="{{ url('/auth/login') }}"  novalidate="novalidate">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="form-group">
                                                            <label for="email" class="control-label">Username</label>
                                                            <input type="text" class="form-control" id="email" name="email" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                                            <span class="help-block"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password" class="control-label">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                                            <span class="help-block"></span>
                                                        </div>
                                                        <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="remember" id="remember"> Remember login
                                                            </label>

                                                        </div>
                                                        <button type="submit" class="btn btn-success btn-block">Login</button>
                                                        <a href="{{ url('/password/email') }}" class="btn btn-default btn-block">Forgot password</a>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="span6">
                                                <h5 style="margin-bottom: 7px;"><b>Free Registration</b></h5>
                                                <ul class="list-unstyled list-registration" style="line-height: 2">
                                                    <li><span class="fa fa-check text-inverse"></span> Work your own schedule</li>
                                                    <li><span class="fa fa-check text-success"></span> <b>Earn 70% </b>of the fee</li>
                                                    <li><span class="fa fa-check text-success"></span> Appointments anywhere</li>
                                                    <li><span class="fa fa-check text-success"></span> Build your profile</li>
                                                    <li><span class="fa fa-check text-success"></span> Become an online expert</li>
                                                    <li><span class="fa fa-check text-success"></span> Work from home</li>
                                                    <li><span class="fa fa-check text-success"></span> Join the community</li></h5>
                                                </ul>
                                                <div>
                                                    <a href="{{ url('/auth/register') }}" class="btn btn-inverse btn-block">Register now</a>
                                                    <a href="{{ url('/become-an-expert') }}" class="btn btn-block">More Info</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #logo-container -->
</header>
<!-- end header -->