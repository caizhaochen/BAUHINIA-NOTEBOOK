@extends('admin.adminHome')
@section('admin_content')



<div class="container">
    {{--<div class="alert alert-success" role="alert">制作者只想给你两个属性~~~~</div>--}}




    <form action="{{url('admin/save')}}" method="post" class="infoform" >
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-xs-2"><h4>id：</h4></div>
                <div class="col-xs-4">
                    <input class="form-control" type="text" name="userid" value="{{$user->id}}" style="display: none">
                    <h4>
                        {{$user->id}}
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2"><h4>昵称：</h4></div>
                <div class="col-xs-4"><input class="form-control" type="text" name="username" value="{{$user->name}}"></div>
            </div>
            <div class="row">
                <div class="col-xs-2"><h4>邮箱：</h4></div>
                <div class="col-xs-4"><h4>{{$user->email}}</h4></div>
            </div>
            <div class="row">
                <div class="col-xs-4"></div>
                <div class="col-xs-1">
                    <a class="btn btn-danger" href="{{url('admin/initial')}}" style="float: right;">取消</a>
                </div>
                <div class="col-xs-1">
                    <input class="btn btn-success" type="submit" value="确认" style="float: right;">
                </div>
            </div>

        </div>

    </form>
</div>




@endsection
