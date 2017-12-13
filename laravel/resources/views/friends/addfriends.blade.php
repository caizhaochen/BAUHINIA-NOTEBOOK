@extends('layouts.homeapp')
@section('home_content')


    <div class="row">
        <div class="col-xs-4">
            <div id="friendsList">
                <ul class="list-group">
                    <a href="#" class="list-group-item disabled" style="text-align: center">
                        关注列表
                    </a>
                    <li class="list-group-item">
                        <a class="badge btn-warning" href="{{url('friends/search')}}"><i
                                    class="fa fa-fw fa-user-plus"></i></a>
                        新增关注
                    </li>
                    @forelse($friends as $friend)
                        <li class="list-group-item">
                            <a class="badge btn-success getfriends" name="{{$friend->id}}">查看</a>
                            <a class="badge btn-danger" href="{{url('friends/delete',$friend->id)}}">取关</a>
                            {{$friend->name}}
                        </li>
                    @empty
                        <li class="list-group-item" style="height: 500px">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <header class=" jumbotron hero-spacer ">
                                <p>你还未关注任何人</p>
                            </header>
                        </li>
                    @endforelse

                </ul>
            </div>
        </div>

        <div class="col-xs-7">
            <div id="showfriend" style="display: none;">

                <header class="jumbotron hero-spacer ">
                    <h3 id="friname"></h3>
                    <br>
                    <h3 id="friemail"></h3>
                </header>
            </div>
        </div>
    </div>

    <script>
        $('.getfriends').click(function () {
            var vDiv = document.getElementById('showfriend');
//            if(vDiv.style.display =='block'){
//                vDiv.style.display = 'none';
//            }
//            else{
                $id = $(this).attr('name');
                $.ajax({
                    type: 'POST',
                    url: "{{url('friends/getfriends')}}",
                    data: {id: $id},
//                  dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {

                        vDiv.style.display = 'none';
//                        console.log(data[0]);
                        $('#friname').text("用户名： "+data[0]['name']);
                        $('#friemail').text("邮箱 ： "+data[0]['email']);
                        vDiv.style.display = 'block';
//                    alert('保存成功！');
                    },
                    error: function (xhr, type) {
                        toastr.error('拉取好友信息失败！')
//                        alert('保存失败！——Ajax error!')
                    }
                });
//            }

        })
    </script>


@endsection
