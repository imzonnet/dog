@extends('Dashboard::backend.default.master')

@section('title')
    List Users
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{route('backend.user.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>State</th>
                                <th>Role</th>
                                <th class="center">Task</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            @if(isset($user->id))
                            <?php
                            if(strtolower($user->role_id)!=''){
                                $userrole = $user->userrole()->get();
                            }
                            ?>
                            <tr class="odd gradeX">
                                <th>{{$user->id}}</th> 
                                <td>{{$user->present()->fullname}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{user_state($user->activated)}}</td>
                                <td>{{ implode(', ', $user->present()->getRoles) }}</td>
                                <td class="center" style="min-width: 100px;">
                                        {!! Form::open(['route' => ['backend.user.destroy', $user->id], 'method' => 'delete', 'class' => 'form-delete']) !!}
                                    <div class="btn-group" role="group" aria-label="...">
                                        <a href="{{route('backend.user.edit',[$user->id])}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </div>
                                        {!! Form::close() !!}
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@stop
