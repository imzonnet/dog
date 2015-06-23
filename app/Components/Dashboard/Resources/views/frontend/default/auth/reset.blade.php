@extends('Dashboard::frontend.default.master')

@section('content')
<div class="container page-content">
    <div class="row">
        <div class="span12">
            <div class="box-container">
                <div class="padding30">
                    <h2 class="page-title">Reset Password</h2>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label class="control-label">E-Mail Address</label>
                            <div class="controls">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <br />
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <br />
                        <div class="form-group">
                            <label class="control-label">Confirm Password</label>
                            <div class="controls">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        <br />
                        <div class="form-group">
                            <div class="controls col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
