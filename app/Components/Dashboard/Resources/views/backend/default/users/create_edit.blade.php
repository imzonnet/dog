@extends('Dashboard::backend.default.master')

@section('title')
    @if(isset($user))
        Edit {{$user->firstname.' '.$user->lastname}}
    @else
        Add New
    @endif
@stop

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($user) )
                {!! Form::open(['route' => ['backend.user.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}
                {!! Form::hidden('id', $user->id) !!}
            @else
                {!! Form::open(['route' => 'backend.user.store', 'method' => 'post', 'files' => true]) !!}
            @endif
            <div class="form-group">
                <label>First Name (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('firstname', isset($user) ? $user->firstname : old('firstname'), ['class' => 'form-control',
                'placeholder' => 'John'] ) !!}
                {!! $errors->first('firstname', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Last Name (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('lastname', isset($user) ? $user->lastname : old('lastname'), ['class' => 'form-control',
                'placeholder' => 'Nguyen'] ) !!}
                {!! $errors->first('lastname', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Avatar </label>
                <div class="clearfix">
                    <img id="preview" alt="Avatar" width="100" height="100" class="pull-left" title="Avatar" src="{{(isset($user->avatar) && file_exists(ltrim($user->avatar, '/'))) ? asset($user->avatar) : asset('demo/default/default.png') }}"/>
                    <div id="profile-photo-upload"></div>
                    <input type="hidden" name="avatar" id="avatar_hidden" value="" />
                    <button id="modal-upload-picture" data-placement="bottom" type="button" class="btn btn-mini btn-default" data-original-title="Upload a new profile photo here">
                        <i class="icon-camera"> </i><b>Choose Profile Picture</b>
                    </button> 
                </div>
                {!! $errors->first('avatar', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Email (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('email', isset($user) ? $user->email : old('email'), ['class' => 'form-control',
                'placeholder' => 'name@mail.com'] ) !!}
                {!! $errors->first('email', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Password {!!isset($user)?'':'(<i class="fa fa-star star-validate"></i>)'!!}</label>
                {!!Form::password('password', ['class' => 'form-control', 'placeholder' => 'Type your password'] ) !!}
                {!! $errors->first('password', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Password Confirm {!!isset($user)?'':'(<i class="fa fa-star star-validate"></i>)'!!}</label>
                {!!Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm your password'] ) !!}
                {!! $errors->first('password_confirmation', '<span class="help-block error">:message</span>') !!}
            </div>
            @if(isset($user))
                <input type="hidden" name="current_password" value="{{$user->password}}" />
            @endif
            <div class="form-group">
                <label>Role (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::select('role_id',$listuserroles,isset($userrole)?$userrole->id:0 , ['class' => 'form-control'] ) !!}
                {!! $errors->first('role_id', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Activated {!!Form::checkbox('activated', 1, isset($user) ? $user->activated : old('activated')) !!}</label>
                {!! $errors->first('state', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <a href="{{url('backend/user')}}" class="btn btn-warning">Cancel</a>
                @if(isset($user))
                {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                {!! Form::submit('Create', ['class' => 'btn btn-primary', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}

        </div>
    </div>


@stop

@section('scripts')
 
    {!! Html::script(asset('assets/croppic/croppic.min.js')) !!}
    {!! $userid=isset($user)?$user->id:0 !!}
    <script>
        $(document).ready(function(){
            
            var croppicContainerModalOptions = {
                uploadUrl:'{{url('backend/user/'.$userid.'/uploadavatar')}}',
                cropUrl:'{{url('backend/user/'.$userid.'/cropavatar')}}',
                modal:true,
                rotateControls: false,
                customUploadButtonId: 'modal-upload-picture',
                imgEyecandyOpacity:0.4,
                loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
                onError: function(errormsg) {
                    $('#profile-photo').append('<div class="alert alert-danger">' + errormsg + '</div>');
                    $('#profile-photo .alert').delay(3000).fadeOut(500, function () {
                        $(this).remove();
                    });
                },
                onAfterImgCrop: function(){
                    var img = $('#profile-photo-upload .croppedImg').attr('src');
                    $('#preview').attr('src', img);
                    $('#avatar_hidden').val(img);
                },
                onBeforeImgUpload: function() {
                    $('body').append('<div class="loading-animate"></div>');
                },
                onAfterImgUpload: function() {
                    $('.loading-animate').fadeOut().remove();
                }

            }
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
            });
            var cropContainerModal = new Croppic('profile-photo-upload', croppicContainerModalOptions);
        });
    </script>
@stop
@section('styles')
    {!! Html::style(asset('assets/croppic/croppic.css')) !!}
@stop
 