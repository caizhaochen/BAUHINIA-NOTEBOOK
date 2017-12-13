@extends('layouts.homeapp')

@section('home_content')

<div class="row" style="padding-bottom: 10px;margin-bottom: 10px">

  <a class="btn btn-success" href="{{url('notebooks/show')}}"><i class="fa fa-fw fa-backward"></i>返回</a></div>
</div>
<div class="row">

</div>
<div >
  <ul id="myTab" class="nav  nav-pills nav-tabs">
    <li class="active">
      <a href="#book" data-toggle="tab">修改笔记本</a>
    </li>
    <li><a href="#note" data-toggle="tab">修改笔记</a></li>

  </ul>


  <div id="myTabContent" class="tab-content" >
    <div class="tab-pane fade in active" id="book">
      <h2>原笔记本名称</h2>
      <h3 class="btn-info">{{$info->name}}</h3>
      <h2>现笔记本名称</h2>
      <div class="form-group">
        <input class="form-control" type="text" id="newbook" value="{{$info->name}}">
        <input class="form-control" type="text" id="newbookid" value="{{$info->notebook_id}}" style="display: none">
      </div>
      <a class="btn btn-danger" href="{{url('notebooks/show')}}">取消</a>
      <button class="btn btn-primary" id="bookbtn">确认</button>
    </div>

    <div class="tab-pane fade" id="note">
      <h2>原笔记名称</h2>
      <h3 class="btn-info">{{$info->title}}</h3>
      <h2>现笔记名称</h2>
      <div class="form-group">


        <input class="form-control" type="text"  id="newnote" value="{{$info->title}}">
        <input class="form-control" type="text"  id="newnoteid" value="{{$info->note_id}}" style="display: none">
        <h2>原tag名称</h2>
        <h3 class="btn-success">{{$info->tag}}</h3>
        <h2>现tag名称</h2>
        <input class="form-control" type="text"  id="newtag" value="{{$info->tag}}">
      </div>
      <a class="btn btn-danger" href="{{url('notebooks/show')}}">取消</a>
      <button class="btn btn-primary" id="notebtn">确认</button>
    </div>
  </div>

  <script>
      $('#bookbtn').click(function () {
          $bookid=$('#newbookid').val();
          $bookname=$('#newbook').val();
          $.ajax({
              type: 'POST',
              url: "{{url('notebooks/update')}}",
              data: {book_id:$bookid,name:$bookname},
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(data){
                  console.log(data);
//                  alert(data);
//                  alert('修改成功！');
                  toastr.success("修改成功！");
                  window.location.href="{{url('notebooks/show')}}";
              },
              error: function(xhr, type){
//                  alert('修改失败！——Ajax error!')
                  toastr.error("修改失败！");
              }
          });
      })

//      修改笔记信息
      $('#notebtn').click(function () {
          $noteid=$('#newnoteid').val();
          $title=$('#newnote').val();
          $tag=$('#newtag').val();
          $.ajax({
              type: 'POST',
              url: "{{url('notes/update')}}",
              data: {note_id:$noteid,title:$title,tag:$tag},
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(data){
                  console.log(data);
//                  alert(data);
                  toastr.success("修改成功！");
                  window.location.href="{{url('notebooks/show')}}";
              },
              error: function(xhr, type){
                  toastr.error("修改失败！");
              }
          });
      })
  </script>
</div>



@stop
