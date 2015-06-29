@extends('Dashboard::frontend.default.master')

@section('title')
    {{$post->title}}
@stop

@section('content')
<div class="container page-content">
    <div class="row">
        <div class="span12">
            <div class="box-container">
                <div class="padding30">
                    <h2 class="page-title">{{$post->title}}</h2>
                    {!! $post->description !!}
                </div> 
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="home-bottom-top">
            <div class="span4">
                <div class="info-box">
                    <h2 class="secion-title">How does it work?</h2>
                    <p>Getting great advice from a naturopath has never been so easy. Now you can consult with a professional in natural therapy from wherever you may be in the world.</p>
                    <p>Use our platform to browse, book and have a real confidential appointment with an expert who can help you lead a healthier lifestyle.</p><p>Holding a meeting is simple. After booking, you will receive a unique link to a video appointment with your professional consultant. Show up at the right time and soak up the advice.</p>
                     <a class="serif italic" href="{{ url('page/frequently-asked-questions/2') }}" title="Continue">Read the FAQ's &raquo;</a>
            
                </div>
            </div>
            <!-- .span4 -->
            <div class="span4">
                <div class="info-box">
                    <h3 class="info-head">Browse</h3>
                    <div class="row clearfix">
                        <div class="pull-left icons hidden-phone">
                            <i class="icon-search"></i>
                        </div>
                        <div class="span3">
                            <p>Take your time to browse through the experts in natural health, review their history and knowledge of their services.</p>
                              <a class="serif italic" href="{{ url('page/how-it-works/1') }}" title="Continue">Read more &raquo;</a>
                        </div>
                    </div>
                    <!-- .clearfix -->
                </div>
                <!-- .info-box -->
                <div class="info-box">
                    <h3 class="info-head">Book</h3>
                    <div class="row clearfix">
                        <div class="pull-left icons hidden-phone">
                            <i class="icon-calendar"></i>
                        </div>
                        <div class="span3">
                            <p>View the availability of the expert and find a time that suits you both. Put down a deposit for the meeting all in under 2 minutes.</p>
                            <a class="serif italic" href="{{ url('page/how-it-works/1') }}" title="Continue">Read more &raquo;</a>
                        </div>
                    </div>
                    <!-- .clearfix -->
                </div>
                <!-- .info-box -->
            </div>
            <!-- .span4 -->
            <div class="span4">
                <div class="info-box">
                    <h3 class="info-head">Meet</h3>
                    <div class="row clearfix">
                        <div class="pull-left icons hidden-phone">
                            <i class="icon-facetime-video"></i>
                        </div>
                        <div class="span3">
                            <p>Attend a secure and confidential video meeting where you can extract as much knowledge and advice as possible. No platform downloads needed.</p>
                            <a class="serif italic" href="{{ url('page/how-it-works/1') }}" title="Continue">Read more &raquo;</a>
                        </div>
                    </div>
                    <!-- .clearfix -->
                </div>
                <!-- .info-box -->
                <div class="info-box">
                    <h3 class="info-head">Review</h3>
                    <div class="row clearfix">
                        <div class="pull-left icons hidden-phone">
                            <i class="icon-thumbs-up"></i>
                        </div>
                        <div class="span3">
                            <p>The platforms is built on community trust. Do the next vistor wanting advice a favour and write a detailed review on the expert. </p>
                            <a class="serif italic" href="{{ url('page/how-it-works/1') }}" title="Continue">Read more &raquo;</a>
                        </div>
                    </div>
                    <!-- .clearfix -->
                </div>
                <!-- .info-box -->
            </div>
            <!-- .span4 -->
        </div>
    </div>
</div>   
@stop