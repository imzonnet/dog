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
                    <h2 class="page-title">Join today as an expert consultant and earn on your terms - its free</h2>
                    <br>
                    <p>Join our growing community of experts that service customers in need from all over the globe. If you have specialist knowledge that can assist everyday people in their life choices, become a member and grow your business through our online platform.</p>
                    <br>
                    @if( count($errors) > 0 )
                        <br />
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <fieldset>

                            <!-- Form Name -->
                            <legend></legend>

                            <!-- Text input-->
                            <div class="control-group">
                                <label for="firstname" class="control-label">First name</label>
                                <div class="controls">
                                    <input type="text" required="" class="input-xlarge" placeholder="e.g  Garry" name="firstname" id="firstname" value="{{old('firstname')}}">
                                    {!! $errors->first('firstname', '<span class="help-block error">:message</span>') !!}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="control-group">
                                <label for="lastname" class="control-label">Last name</label>
                                <div class="controls">
                                    <input type="text" required="" class="input-xlarge" placeholder="e.g  Jones" name="lastname" id="lastname" value="{{old('lastname')}}">
                                    {!! $errors->first('lastname', '<span class="help-block error">:message</span>') !!}
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="control-group">
                                <label for="email" class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" required="" class="input-xlarge" placeholder="someone@example.com" name="email" id="email" value="{{old('email')}}">
                                    {!! $errors->first('email', '<span class="help-block error">:message</span>') !!}
                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="control-group">
                                <label for="passwordinput" class="control-label">Password</label>
                                <div class="controls">
                                    <input type="password" required="" class="input-xlarge" name="password" id="password">
                                    {!! $errors->first('password', '<span class="help-block error">:message</span>') !!}
                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="control-group">
                                <label for="confirmpassword" class="control-label">Confirm Password</label>
                                <div class="controls">
                                    <input type="password" required="" class="input-xlarge" name="password_confirmation" id="password_confirmation">
                                    {!! $errors->first('password_confirmation', '<span class="help-block error">:message</span>') !!}
                                </div>
                            </div>

                            <!-- Multiple Checkboxes -->
                            <div class="control-group">
                                <label for="termsandconditions" class="control-label"></label>
                                <div class="controls">
                                    <label for="termsandconditions-0" class="checkbox">
                                        <input type="checkbox" value="I agree to the Terms and Conditions" id="termsandconditions-0" name="termsandconditions">
                                        I agree to the <a target="_blank" href="{{ url('/page/terms-and-conditions/3') }}">Terms and Conditions
                                    </label>
                                    {!! $errors->first('termsandconditions', '<span class="help-block error">:message</span>') !!}
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="control-group">
                                <label for="register" class="control-label"></label>
                                <div class="controls">
                                    <button type="submit" class="btn btn-success">
                                        Register me now
                                    </button>
                                </div>
                            </div>

                        </fieldset>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
