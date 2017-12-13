$(document).ready(function () {
//参数设置，若用默认值可以省略以下面代
        toastr.options = {
            "closeButton": false, //是否显示关闭按钮
            "debug": false, //是否使用debug模式
            "positionClass": "toast-top-center",//弹出窗的位置
            "showDuration": "300",//显示的动画时间
            "hideDuration": "1000",//消失的动画时间
            "timeOut": "5000", //展现时间
            "extendedTimeOut": "1000",//加长展示时间
            "showEasing": "swing",//显示时的动画缓冲方式
            "hideEasing": "linear",//消失时的动画缓冲方式
            "showMethod": "fadeIn",//显示时的动画方式
            "hideMethod": "fadeOut" //消失时的动画方式
        };
});

function isHidden(oDiv){
    var notesblock=document.getElementById('notesblock');
    notesblock.className=(notesblock.className=='col-xs-11 note-content')?'col-xs-8 note-content':'col-xs-11 note-content';
    var vDiv = document.getElementById(oDiv);
    vDiv.style.display = (vDiv.style.display == 'none')?'block':'none';

}

$('#dropdown-menu-books').on('click', function(e) {
    var $target = $(e.target);
    $target.is('a') &&$target.get(0).id!=('newbook') && $('#Notebook').text($target.text());
})
$('#dropdown-menu-notes').on('click', function(e) {
    var $target = $(e.target);
    $target.is('a') &&$target.get(0).id!=('newnotes') && $('#Notes').text($target.text()) && $('#Notes').attr("data-content",$target.attr("name"));
})

var $summernote = $('#summernote').summernote({
        lang : 'zh-CN',
        focus: true,
        // placeholder : placeholder,
        minHeight : 550,
        maxHeight : 550,
        dialogsFade : true,// Add fade effect on dialogs
        dialogsInBody : true,// Dialogs can be placed in body, not in
        disableDragAndDrop : false,// default false You can disable drag
// and drop
});
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






//目的是当选择了笔记本时自动选择笔记本对应的笔记
$(function() {
    $(".notebookhref").click(function() {
        //notebooks里面a的name值定义为notebook的id
        $url = $(this).attr(("name"));
        // alert($url);
        var noteli=document.getElementsByClassName('notesli');
        // alert(noteli.length);
        $.each(noteli,function (e,v) {
            console.log(v.value);
            if(v.value==$url){
                v.style.display='block';
            }
            else{
                v.style.display='none';
            }

        })
    })
});

$('#shotcut').click(function() {
    toastr.error("按下F1键即可截屏！");
    // var   wsh   =   new   ActiveXObject("WScript.Shell");
    // wsh.SendKeys('{F1}');


});