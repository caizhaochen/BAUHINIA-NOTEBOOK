@extends('layouts.homeapp')
@section('home_content')


 <div class="container" style="background-color: white">
     <div class="row" >
         {{--<div class="col-xs-1"><a class="btn btn-success btn-sm" href="{{url('notes/backtoshow')}}"><i class="fa fa-fw fa-backward"></i>返回</a></div>--}}
         <div class="col-xs-1"><a class="btn btn-success btn-sm" href="javascript:history.go(-1);"><i class="fa fa-fw fa-backward"></i>返回</a></div>
         <div class="col-xs-6"></div>
         <div class="col-xs-1">
             <button class="btn btn-success btn-sm" id="" data-toggle="modal" data-target="#share">
                 <i class="fa fa-fw fa-share-square-o"></i>
                 分享
             </button>
         </div>
         <div class="col-xs-1">
             <button class="btn btn-success btn-sm" id="" data-toggle="modal" data-target="#cooperate">
                 <i class="fa fa-fw fa-handshake-o"></i>
                 协作
             </button>
         </div>
         <div class="col-xs-1">
             <button class="btn btn-success btn-sm" id="downloadbtn"><i class="fa fa-fw fa-download"></i>下载</button>
         </div>
         <div class="col-xs-1">
             <button class="btn btn-success btn-sm" id="saveshow"><i class="fa fa-fw fa-save"></i>保存</button>
         </div>
     </div>
 </div>

<div class="container presentationdiv" >
        <div id="showid" style="display: none">{{$note->note_id}}</div>
        <div id="id11" style="display: none">{{$note->body}}</div>
        <div class="row" style="text-align: center;" >
            <h1 id="title1">标题：{{$note->title}}</h1>
        </div>
        <div class="row" style="text-align: center">
            <h4>tag：{{$note->tag}}</h4>
        </div>
        <div id="summernote_p">

        </div>
</div>

//合作模态框
 <div class="modal fade" id="cooperate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h4 class="modal-title" id="myModalLabel">与好友协作</h4>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-xs-3">
                         <h4>选择好友</h4>
                     </div>
                     <div class="col-xs-9">
                         <select id="friend_id" class="form-control">
                             @forelse($friends as $friend)
                                <option value="{{$friend->id}}">{{$friend->name}}({{$friend->email}})</option>
                             @empty
                                 <option value="none">
                                    你还没有好友哦，先去添加好友吧
                                 </option>
                             @endforelse

                         </select>
                     </div>
                 </div>

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                 <button type="button" class="btn btn-success" id="cobtn">Send</button>
             </div>
         </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
 </div>
 //分享模态框
 <div class="modal fade" id="share" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h4 class="modal-title" id="myModalLabel">与好友协作</h4>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-xs-3">
                         <h4>选择好友</h4>
                     </div>
                     <div class="col-xs-9">
                         <select id="friend_id_share" class="form-control">
                             @forelse($friends as $friend)
                                <option value="{{$friend->id}}">{{$friend->name}}({{$friend->email}})</option>
                             @empty
                                 <option value="none">
                                    你还没有好友哦，先去添加好友吧
                                 </option>
                             @endforelse

                         </select>
                     </div>
                 </div>

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                 <button type="button" class="btn btn-success" id="sharebtn">Send</button>
             </div>
         </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
 </div>




    <script src="{{asset("dist/js/jquery.min.js")}}"></script>
    <script src="{{asset("dist/js/summernote.min.js")}}"></script>
    <script src="{{asset("dist/js/summernote-zh-CN.min.js")}}"></script>
    <script src="{{asset("dist/js/jspdf.min.js")}}"></script>
    <script src="{{asset("dist/js/jspdf.debug.js")}}"></script>
    <script>

        //加载笔记
        $(document).ready(function(){

            $('#summernote_p').summernote({
                lang : 'zh-CN',
                focus: true,
                // placeholder : placeholder,
                minHeight : 550,
//            maxHeight : 550,
                dialogsFade : true,// Add fade effect on dialogs
                dialogsInBody : true,// Dialogs can be placed in body, not in
                disableDragAndDrop : false,// default false You can disable drag

            });

            $body=$('#id11').text();
            $('.note-editable').html($body);
        });

        //保存修改
        $('#saveshow').click(function () {
            var $note_id=$('#showid').text();
            var $body=$('#summernote_p').summernote('code');
            if($note_id=="null"){
                alert("请选择笔记！")
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
                        toastr.success('保存成功！');
                    },
                    error: function(xhr, type){
                        toastr.error('保存失败！——Ajax error!')
                    }
                });
            }
        });

        //下载笔记
        $('#downloadbtn').click(function () {
            $title=$('#title1').text();
            var filename = $title.substring(3)+".pdf";
            html2canvas($('.presentationdiv'), {
                onrendered:function(canvas) {
                    var contentWidth = canvas.width;
                    var contentHeight = canvas.height;
                    //一页pdf显示html页面生成的canvas高度;
                    var pageHeight = contentWidth*1.0 / 592.28 * 841.89;
                    //未生成pdf的html页面高度
                    var leftHeight = contentHeight*1.0 ;
                    //页面偏移
                    var position = 0;
                    //a4纸的尺寸[595.28,841.89]，html页面生成的canvas在pdf中图片的宽高
                    var imgWidth = 595.28;
                    var imgHeight = 592.28/contentWidth*1.0  * contentHeight*1.0 ;
                    var pageData = canvas.toDataURL('image/jpeg', 1.0);
                    var pdf = new jsPDF('', 'pt', 'a4');
                    //有两个高度需要区分，一个是html页面的实际高度，和生成pdf的页面高度(841.89)
                    //当内容未超过pdf一页显示的范围，无需分页
                    if (leftHeight < pageHeight) {
                        pdf.addImage(pageData, 'JPEG', 20, 0, imgWidth, imgHeight );
                    } else {
                        while(leftHeight > 0) {
                            pdf.addImage(pageData, 'JPEG', 20, position, imgWidth, imgHeight)
                            leftHeight -= pageHeight;
                            position -= 841.89;
                            //避免添加空白页
                            if(leftHeight > 0) {
                                pdf.addPage();
                            }
                        }
                    }
                    pdf.save(filename);
                }
            });

        });

        //与好友合作
        $('#cobtn').click(function () {
            $friend=$('#friend_id').val();
            if($friend=="none"){
//                alert("请先添加好友");
                toastr.error("请先添加好友");
            }
            else{
                $note_id=$('#showid').text();
                $auth='w';
                $.ajax({
                    type: 'POST',
                    url: "{{url('friends/cooperate')}}",
                    data: {to_user:$friend,note:$note_id,auth:$auth},
//                  dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        $('#cooperate').modal('hide');
//                        alert("发送成功");
                        toastr.success("发送成功!");
                    },
                    error: function(data,xhr, type){
                        console.log(data);
//                        alert('保存失败！——Ajax error!')
                        toastr.error("发送失败!");
                    }
                });
            }
        });
        //与好友分享
        $('#sharebtn').click(function () {
            $friend=$('#friend_id_share').val();
            if($friend=="none"){
                toastr.error("请先添加好友");
            }
            else{
                $note_id=$('#showid').text();
                $auth='r';
                $.ajax({
                    type: 'POST',
                    url: "{{url('friends/cooperate')}}",
                    data: {to_user:$friend,note:$note_id,auth:$auth},
//                  dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        $('#share').modal('hide');
                        toastr.success("分享成功");
                    },
                    error: function(data,xhr, type){
                        console.log(data);
                        toastr.error('保存失败！——Ajax error!')
                    }
                });
            }
        });
    </script>
</div>






@endsection
