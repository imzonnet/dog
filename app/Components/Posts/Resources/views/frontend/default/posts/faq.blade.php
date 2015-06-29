@extends('Dashboard::frontend.default.master')

@section('title')
    FREQUENTLY ASKED QUESTIONS
@stop

@section('content')
<div class="container page-content">
    <div class="row"> 
    <div class="span12">
    <div class="box-container">
        <div class="padding30">
            <div class="row-fluid">
                <div class="span12">
                    <h2>Frequently Asked Questions</h2>
                </div>
            </div>
            <div class="row-fluid faq-block">
                <div class="span4">
                    <h3>Booking an Expert</h3>
                </div>
                <div class="span8">
                    <div class="accordion" id="faq1">
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#collapseOne">
                            Do I have to sign up to talk to an expert?
                          </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse in">
                          <div class="accordion-inner">
                            No you dont! Booking an expert is a 2 minute process to arrange a time and date that is convenient for you. All you need to do is communicate what you would like to talk about during the session. No long signups necessary.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#collapseTwo">
                            How do we have our meeting?
                          </a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse">
                          <div class="accordion-inner">
                            The appointment is held on Natural Guru's in-browser video platform. This means that as long as you are using Chrome, Mozilla or Internet Explorer - you dont have to download a thing. Just click the unique link we provide you to access your scheduled meeting and the rest is easy!
                          </div>
                        </div>
                      </div>
                        
                        <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#collapseThree">
                            What if I can't make my meeting?
                          </a>
                        </div>
                        <div id="collapseThree" class="accordion-body collapse">
                          <div class="accordion-inner">
                            We understand that things happen in life and appointments will be cancelled. Should you be unable to make your appointment, a 15% penalty fee be witheld whilst the balance will be refunded back to your account. This small penalty fee goes directly to the expert to compensate them for clearing their schedule.
                          </div>
                        </div>
                      </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="row-fluid faq-block">
                <div class="span4">
                    <h3>Account and Payment</h3>
                </div>
                <div class="span8">
                    <div class="accordion" id="faq2">
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#collapse4">
                            How do I pay for an expert?
                          </a>
                        </div>
                        <div id="collapse4" class="accordion-body collapse in">
                          <div class="accordion-inner">
                            We accept all major credit cards through our secure and encrypted payment processors (Stripe and PayPal).
                          </div>
                        </div>
                      </div>
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#collapse5">
                            What currency will I be charged in?
                          </a>
                        </div>
                        <div id="collapse5" class="accordion-body collapse">
                          <div class="accordion-inner">
                            Currently, all transactions on Natural Gurus is completed in USD.
                          </div>
                        </div>
                      </div>
                        
                        <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#collapse6">
What if I want a refund or have problems with payment?                                  </a>
                        </div>
                        <div id="collapse6" class="accordion-body collapse">
                          <div class="accordion-inner">
                              Simply contact us via our form or email <a href="mailto:help@naturalgurus.com":>help@naturalgurus.com</a>
                          </div>
                        </div>
                      </div>
                        
                    </div>
                </div>
            </div>
            
			<div class="row-fluid faq-block">
                <div class="span4">
                    <h3>Becoming an Expert</h3>
                </div>
                <div class="span8">
                    <div class="accordion" id="faq3">
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#collapse7">
How do I become an expert?                                  </a>
                        </div>
                        <div id="collapse7" class="accordion-body collapse in">
                          <div class="accordion-inner">
                            Are you a Natural Guru? If you have experience and knowledge about natural health and a passion for bettering peoples lives - we want to hear from you. Simply take 5 minutes to <a href="sign-up.html">sign up online</a> and allow us to put you in contact with users seeking great advice.  
                          </div>
                        </div>
                      </div>
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#collapse8">
                            How much do I get paid?
                          </a>
                        </div>
                        <div id="collapse8" class="accordion-body collapse">
                          <div class="accordion-inner">
                            All experts are paid 70% of the appointment fee within 30 days of the transaction. The remaining 30% goes to transaction fees and keeping the lights on here at the Natural Gurus headquarters.
                          </div>
                        </div>
                      </div>
                        
                        <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#collapse9">
How are experts verified?                                  </a>
                        </div>
                        <div id="collapse9" class="accordion-body collapse">
                          <div class="accordion-inner">
                              All experts are cross verified through several online methods to ensure integrity and credibility of those giving advice. Natural Gurus may use third party services for the purpose of verification. If you wish to know more, simply contact us via our form or email <a href="mailto:help@naturalgurus.com":>help@naturalgurus.com</a>
                          </div>
                        </div>
                      </div>
                        
                    </div>
                </div>
            </div>
            
			<div class="row-fluid faq-block">
                <div class="span4">
                    <h3>Using the Video room</h3>
                </div>
                <div class="span8">
                    <div class="accordion" id="faq4">
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq4" href="#collapse10">
How do I access the meeting room?                                  </a>
                        </div>
                        <div id="collapse10" class="accordion-body collapse in">
                          <div class="accordion-inner">
                            If you are a <b>user seeking advice</b>, simply follow the link that we provide you in an email on the day of you meeting.<br>
                              <br><b>Experts</b> can access the room from their email or alternatively on the Dashboard Menu in the experts portal.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq4" href="#collapse11">
                            What browsers and devices can be used?
                          </a>
                        </div>
                        <div id="collapse11" class="accordion-body collapse">
                          <div class="accordion-inner">
                            Our video room currently accomodates Google Chrome, Mozilla Firefox, Opera, Internet Explorer and Android smartphones.
                          </div>
                        </div>
                      </div>
                        
                        <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq4" href="#collapse12">
What if there is a technical problem with the video room?                                 </a>
                        </div>
                        <div id="collapse12" class="accordion-body collapse">
                          <div class="accordion-inner">
                              Should there be a problem with video meeting for any reason, please immediately email <a href="mailto:help@naturalgurus.com":>help@naturalgurus.com</a> so we can get the matter rectified as soon as possible.
                          </div>
                        </div>
                      </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="green-box">
            <p>Haven't found what you're looking for? Feel free to email us: <a href="mailto:help@naturalgurus.com">help@naturalgurus.com</a></p>
        </div>
    </div>
    </div>
    </div>
</div>
@stop
@section('styles')
    <link href="{{get_template_directory()}}/css/faq.css" rel="stylesheet">
@stop
