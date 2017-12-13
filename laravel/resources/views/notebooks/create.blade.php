@extends('layouts.homeapp')

@section('home_content')

  {{--注解对应于homeapp.css中的CreateNotes--}}
<div class="container create-page">
  <div class="row">
    <div class="col-xs-1 create-menu" >
      <Button class="btn btn-success btn-sm create-btn" onclick="isHidden('createblock')"><i class="fa fa-fw fa-plus"></i>新建</Button>
    </div>

    {{--弹出区👇--}}
    <div class="col-xs-3" id="createblock" style="display:block;background-color: white;border: 2px;border-left-color: #0f0f0f">
      <h4>笔记本</h4>
      @include('notebooks.notebooks')

      <br><br><br>

      <h4>笔记</h4>

            {{--@yield('notes')--}}
            @include('notebooks.notes',[$notebooks,$notes])


      <br><br><br>
    </div>
    {{--弹出区👆--}}
    <div class="col-xs-8 note-content" id="notesblock">
      {{--<h1>Create Notebooks</h1>--}}
        <div class="row">
          <div class="col-xs-10"></div>
          <div class="col-xs-1">
            <Button class="btn btn-success" id="savebtn"><i class="fa fa-fw fa-save"></i>保存</Button>
          </div>
        </div>
        <div id="summernote">

        </div>
        {{--<div class="row">--}}
            {{--<div class="col-xs-10"></div>--}}
            {{--<div class="col-xs-1">--}}
                {{--<a class="btn btn-success" id="download" href="{{url('notes/download')}}">下载</a>--}}
                {{--<a class="btn btn-success" id="download" >下载</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
      <script>

          $('#savebtn').click(function () {
              var $note_id=$('#Notes').attr("data-content");
              var $body=$('#summernote').summernote('code');
              if($note_id=="null"){
//                  alert("请选择笔记！")
                  toastr.error("请选择笔记！");
              }
              else{
                  $.ajax({
                      type: 'POST',
                      url: "{{url('notes/save')}}",
                      data: {id:$note_id,body:$body},
//                  dataType: 'json',
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      success: function(data){
                          {{--window.location.href="{{url('notebooks/show')}}";--}}
                                  toastr.success("保存成功！");
//                          alert('保存成功！');
                      },
                      error: function(xhr, type){
//                          alert('保存失败！——Ajax error!')
                          toastr.error("保存失败！");
                      }
                  });
              }
          });

          $('.notehref').click(function () {
              $id=$(this).attr(("name"));
              $.ajax({
                  type: 'POST',
                  url: "{{url('notes/show')}}",
                  data: {id:$id},
//                  dataType: 'json',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function(data){
                      $('.note-editable').html(data[0]['body']);
//                      $('#summernote').val(data[0]['body']);
                  },
                  error: function(data,xhr, type){
//                      alert('拉取日记失败，请重试！')
                      toastr.error("拉取日记失败，请重试！");
                  }
              });
          });

          $('#download').click(function () {
              var $note_id = $('#Notes').attr("data-content");
              var $body = $('#summernote').summernote('code');
              if ($note_id == "null") {
                  alert("请选择笔记！")
              }
              else {
                  {{--$.ajax({--}}
                      {{--type: 'POST',--}}
                      {{--url: "{{url('notes/download')}}",--}}
                      {{--data: {id: $note_id, body: $body},--}}
{{--//                      data: {id: $note_id},--}}
{{--//                  dataType: 'json',--}}
                      {{--headers: {--}}
                          {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                      {{--},--}}
                      {{--success: function (data) {--}}
                          {{----}}

{{--//                          data.download('invoice2.pdf');--}}
{{--//                          window.open(data);--}}
                          {{--alert(data);--}}
                      {{--},--}}
                      {{--error: function (xhr, type) {--}}
                          {{--alert('保存失败！——Ajax error!')--}}
                      {{--}--}}
                  {{--});--}}

                  var pdf = new jsPDF('p', 'mm', 'a4');

                  var filename = 'hello.pdf';

                  pdf.addHTML($body, function(){
                      pdf.output("download", filename)
                  })
              }
          });


      </script>

  </div>
</div>

@endsection
