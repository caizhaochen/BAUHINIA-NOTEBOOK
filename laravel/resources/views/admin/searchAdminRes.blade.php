@extends('admin.adminHome')
@section('admin_content')


    <div class="container">

        <form action="{{url('admin/searchuser')}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col-xs-11">
                    <input type="text" class="form-control" placeholder="id/name/email" name="name" style="height: 50px">
                </div>
                <div class="col-xs-1">
                    <input type="submit" class=" btn  btn-success" value= "search" style="height: 50px">
                </div>
            </div>
        </form>
        <div class="row">
            <div><br></div>
        </div>


        @forelse($users as $user)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <h3 class="panel-title">{{$user->email}}</h3>
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
                            <h3 class="panel-title">没有搜索到相关用户</h3>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse

    </div>

@endsection