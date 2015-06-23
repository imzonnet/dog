    <!-- begin footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="footer-widget">
                        <img src="{{ get_template_directory() }}/images/logowhite.png" alt="Natural Gurus">
                        <p class="footer-tag-line">Where the world gets healthier</p>
                        <p>Providing expert advice in natural medicine from professionals around the corner and across the globe.</p>
                    </div>
                    <!-- .footer-company-info -->
                </div>
                <!-- .span3 -->
                <div class="span3">
                    <div class="footer-widget">
                        <h3 class="widget-title">Follow us</h3>
                        <div class="clearfix">
                            <ul>
                                <li class="clearfix">
                                    <a href="https://www.facebook.com/pages/Natural-Gurus/836232396455685"><i class="icon-facebook-sign pull-left"></i>
                                    <p class="pull-left">Follow on Facebook</p></a>
                                </li>
                                <li class="clearfix">
                                    <a href="https://twitter.com/naturalgurus"><i class="icon-twitter-sign pull-left"></i>
                                    <p class="pull-left">Follow on Twitter</p></a>
                                </li>
                                <li class="clearfix">
                                    <a href="https://www.linkedin.com/company/natural-gurus"><i class="icon-linkedin-sign pull-left"></i>
                                    <p class="pull-left">Follow on LinkedIn</p></a>
                                </li>
                            </ul>
                        </div>
                        <!-- .clearfix -->
                    </div>
                    <!-- .footer-widget -->
                </div>
                <!-- .span3 -->
                <div class="span3">
                    <div class="footer-widget">
                        <h3 class="widget-title">Extras</h3>
                        <ul>
                            <li>
                                <i class="icon-caret-right"></i>
                                <a title="Home" href=" {{ route('home') }}">Home</a></li>
                            <li>
                                <i class="icon-caret-right"></i>
                                <a title="Sign up" href="{{ url('auth/register') }}">Sign up</a></li>
                            <li>
                                <i class="icon-caret-right"></i>
                                <a title="FAQ" href="{{url('/f-a-q')}}">FAQ's</a></li>

                            <li>
                                <i class="icon-caret-right"></i>
                                <a title="Contact" href="{{url('/contact')}}">Contact us</a></li>

                        </ul>
                    </div>
                    <!-- .footer-widget -->
                </div>
                <!-- .span3 -->
                <div class="span3">
                    <div class="footer-widget">
                        <h3 class="widget-title">Legal Mumbo jumbo</h3>
                        <ul>
                            <li>
                                <i class="icon-caret-right"></i>
                                <a title="Terms & Conditions" href="{{url('/page/terms-and-conditions/3')}}">Terms & Conditions</a></li>
                            <li>
                                <i class="icon-caret-right"></i>
                                <a title="Privacy Policy" href="{{url('/page/privacy-policy/4')}}">Privacy Policy</a></li>
                            <li>
                                <i class="icon-caret-right"></i>
                                <a title="Resolution Centre" href="{{url('/complaints-and-resolution')}}">Resolution Centre</a></li>
                            <li>
                                <i class="icon-caret-right"></i>
                                <a title="Complaints" href="{{url('/complaints-and-resolution')}}">Complaints</a></li>

                        </ul>
                    </div>
                    <!-- .footer-widget -->
                </div>
                <!-- .flickr-widget -->
            </div>
            <!-- .footer-widget -->
        </div>
        <!-- .span3 -->
        </div>
        </div>
    </footer>

    <div class="container subfooter">

        <div class="row">

                <div class="span6">
                    We accept:
                    <img src="{{ get_template_directory() }}/images/paypal.png" alt="PayPal">
                    <img src="{{ get_template_directory() }}/images/visa.png" alt="Visa">
                    <img src="{{ get_template_directory() }}/images/mastercard.png" alt="MasterCard">
                    <img src="{{ get_template_directory() }}/images/amex.png" alt="American Express">
                </div> <!-- .span6 -->

                <div class="span6 text-right">
                    &copy; 2015 NaturalGurus.com &mdash; All rights reserved
                </div> <!-- .span6 -->

            </div> <!-- .row -->

    </div> <!-- .container -->

    <!-- end footer -->

    <script src="{{get_template_directory()}}/js/jquery.js"></script>
    <script src="{{get_template_directory()}}/js/bootstrap.min.js"></script>
    <script src="{{get_template_directory()}}/js/jquery.placeholder.js"></script>
    <script src="{{get_template_directory()}}/js/retina.min.js"></script>
    <script src="{{asset('assets/bootstrap-tour/js/bootstrap-tour.min.js')}}"></script>

    @section('scripts')
        {{-- Here goes the page level scripts --}}
    @show
    <script src="{{get_template_directory()}}/js/custom.js"></script>

    @if (!in_array(Route::currentRouteName(), ['video_expert', 'video_client']))
    <script type="text/javascript">
    var __lc = {};
    __lc.license = 6157531;

    (function() {
     var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
     lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
    })();
    </script>

    @endif

</body>
</html>