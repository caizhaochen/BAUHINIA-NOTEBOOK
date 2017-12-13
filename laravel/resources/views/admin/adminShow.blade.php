@extends('admin.adminHome')
@section('admin_content')



@forelse($users as $user)
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-2">
                    <h3 class="panel-title"><i class="fa fa-fw fa-user"></i>{{$user->email}}</h3>
                </div>
                <div class="col-xs-7"></div>
                <div class="col-xs-1">
                    <a href="{{url('admin/modify',$user->id)}}" class="btn btn-success">修改</a>
                </div>
                <div class="col-xs-1">
                    <a href="{{url('admin/delete',$user->id)}}" class="btn btn-danger">删除</a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3">
                    <h4>用户id：{{$user->id}}</h4>
                </div>
                <div class="col-xs-3">
                    <h4>用户名：{{$user->name}}</h4>
                </div>
                <div class="col-xs-4">
                    <h4>邮箱：{{$user->email}}</h4>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-2">
                    <h3 class="panel-title">没有用户注册</h3>
                </div>
            </div>
        </div>
    </div>
@endforelse

<div class="pagination" style="float: right">
    {{$users->render()}}
</div>

@endsection
