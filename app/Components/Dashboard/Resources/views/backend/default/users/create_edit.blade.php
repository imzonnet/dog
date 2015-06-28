@extends('Dashboard::backend.default.master')

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
                {!!Form::text('first_name', isset($user) ? $user->first_name : old('first_name'), ['class' => 'form-control',
                'placeholder' => 'John'] ) !!}
                {!! $errors->first('first_name', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Last Name (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('last_name', isset($user) ? $user->last_name : old('last_name'), ['class' => 'form-control',
                'placeholder' => 'Nguyen'] ) !!}
                {!! $errors->first('last_name', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Avatar </label>
                <div class="clearfix">
                    <input type="file" name="avatar"/>
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
            <div class="form-group">
                <label>User Roles </label>
                {!! Form::select('role', $roles, isset($user) && !empty($user->roles()->first()) ? $user->roles()->first()->id : old('role') ) !!}
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