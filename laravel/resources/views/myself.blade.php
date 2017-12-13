@extends('layouts.homeapp')

@section('home_content')


<div class="container">
    <div class="alert alert-success" role="alert">制作者只想给你两个属性~~~~</div>

    <div class="infoform" id="showform" style="display: block;">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-xs-2"><h4>昵称：</h4></div>
                <div class="col-xs-4"><h4>{{$user->name}}</h4></div>
            </div>
            <div class="row">
                <div class="col-xs-2"><h4>邮箱：</h4></div>
                <div class="col-xs-4"><h4>{{$user->email}}</h4></div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <button class="btn btn-success" type="button" id="modifyName" onclick="change()" style="float: right;">修改</button>
                </div>
            </div>

        </div>

    </div>


    <form action="{{url('modifyInfo')}}" method="post" class="infoform" id="modifyform" style="display: none">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-xs-2"><h4>昵称：</h4></div>
                <div class="col-xs-4"><input class="form-control" type="text" name="username" value="{{$user->name}}"></div>
            </div>
            <div class="row">
                <div class="col-xs-2"><h4>邮箱：</h4></div>
                <div class="col-xs-4"><h4>{{$user->email}}</h4></div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button class="btn btn-warning" id="passbtn" type="button" onclick="changepass()">修改密码</button>
                </div>
                <div class="col-xs-1">
                    <a class="btn btn-danger" href="{{url('myself')}}">取消</a>
                </div>
                <div class="col-xs-1">
                    <input class="btn btn-success" type="submit" value="确认" style="float: right;">
                </div>
            </div>

        </div>

    </form>

    //修改密码
    <div class="infoform" id="modifyPass" style="display: none">
        <div >
            <div class="row">
                <div class="col-xs-2"><h4>昵称：</h4></div>
                <div class="col-xs-4"><h4>{{$user->name}}</h4></div>
            </div>
            <div class="row">
                <div class="col-xs-2"><h4>邮箱：</h4></div>
                <div class="col-xs-4"><h4>{{$user->email}}</h4></div>
            </div>
            <div class="row">
                <div class="col-xs-2"><h4>原密码：</h4></div>
                <div class="col-xs-4"><input type="password" id="origin"></div>
            </div>
            <div class="row">
                <div class="col-xs-2"><h4>新密码：</h4></div>
                <div class="col-xs-4"><input type="password" id="nowPass"></div>
            </div>
            <div class="row">
                <div class="col-xs-2"><h4>确认新密码：</h4></div>
                <div class="col-xs-4"><input type="password" id="nowConfirm"></div>
            </div>
            <div class="row">
                <div class="col-xs-2"><a class="btn btn-warning" href="{{url('myself')}}"><i class="fa fa-fw fa-mail-reply-all"></i>返回</a></div>
                <div class="col-xs-1"><a class="btn btn-danger" href="{{url('myself')}}"><i class="fa fa-fw fa-close"></i>取消</a></div>
                <div class="col-xs-1">
                    <button class="btn btn-success" type="button" id="passConfirm" style="float: right;"><i class="fa fa-fw fa-check"></i>确认</button>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
    function change() {
        var show=document.getElementById('showform');
        var modify=document.getElementById('modifyform');
        show.style.display="none"
        modify.style.display="block";
    }

    function changepass() {
        var show=document.getElementById('showform');
        var modify=document.getElementById('modifyform');
        var pass=document.getElementById('modifyPass')
        show.style.display="none"
        modify.style.display="none";
        pass.style.display='block';
    }


    $('#passConfirm').click(function () {
        $origin=$('#origin').val();
        $new=$('#nowPass').val();
        $newConfirm=$('#nowConfirm').val();
        $.ajax({
            type: 'POST',
            url: "{{url('modifyPass')}}",
            data: {origin:$origin,new:$new,confirm:$newConfirm},
//            datatype:'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                console.log($origin)
                console.log(data);
                console.log(data==="    success");

                if(data==="    success"){
                    toastr.success("修改成功！下次登录生效！");
{{--                    window.location.href="{{url('myself')}}";--}}

                }
                else if(data=="    newerror"){
                    toastr.error("新密码两个不吻合")
                }
                else if(data=="    originerror"){
                    toastr.error("原密码错误！")
                }
                else{
                    toastr.error("发生了未知错误!")
                }
            },
            error: function(xhr, type){
//                          alert('保存失败！——Ajax error!')
                toastr.error("修改失败！");
            }
        });

    })

</script>







@endsection