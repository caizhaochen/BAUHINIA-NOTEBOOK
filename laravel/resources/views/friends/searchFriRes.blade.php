@extends('layouts.homeapp')
@section('home_content')


    <div>
        <form action="{{url('friends/searchName')}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col-xs-11">
                    <input type="text" class="form-control " placeholder="邮箱/用户名"
                           name="username" value="{{$content}}" style="height: 40px">
                </div>
                <div class="col-xs-1">
                    <input type="submit" class=" btn btn-success" value="search" style="height: 40px">
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
                        {{--<div class="col-xs-2">--}}
                            {{--<h3 class="panel-title">{{$user->name}}</h3>--}}
                        {{--</div>--}}
                        <div class="col-xs-10"></div>
                        <div class="col-xs-1">
                            <a href="{{url('friends/follow',$user->id)}}" class="btn btn-success">关注</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-3">
                            <h4>昵称：{{$user->name}}</h4>
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
                            <h3 class="panel-title">没有找到结果</h3>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse


        <div class="row">
            <div><br></div>
        </div>
    </div>

@endsection