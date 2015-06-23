@extends('Dashboard::frontend.default.master')

@section('title')
    Register Account
@stop

@section('content')
<div class="container page-content">
    <div class="row">
        <div class="span12">
            <div class="box-container">
                <div class="padding30">
                    <h2 class="page-title"> <b>Success</b> - you are almost there</h2>
                    <br>
                    <p>Please check your email to confirm the details as registered. Following confirmation, get ready to find a nice profile picture and start writing your biography to market to the world.</p>

                    <p>P.s if you can't find the email please check your spam folder.</p>
                    <br>
                    <a class="btn btn-success" href="{{url('auth/login')}}">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop