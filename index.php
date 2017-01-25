<?php
// $img_file = 'assets/image/emoji/1.jpg';
// $img_info = getimagesize($img_file);
// $img_src = "data:{$img_info['mime']};base64," . base64_encode(file_get_contents($img_file));
?>
<!DOCTYPE html>
<html>  
<head>  
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="keywords" content="qq表情在线,表情在线生成,表情在线制作">
<meta name='author' content="denghao.me">
<title>qq微信表情在线制作生成器</title>

<style>
/*public*/
*{
    padding: 0;
    margin: 0;
}
body{
    font-size: 14px;
}
i{
    font-style: normal;
}
ul,li{
    list-style: none;
}
a{
    color: #333;
    text-decoration: none;
}
.pr0{
    padding-right: 0!important;
}
/*colors*/
.bg-white{
    background-color:white; 
}
.bg-black{
    background-color:black; 
}
.bg-orange{
    background-color:orange; 
}
.bg-blue{
    background-color:blue; 
}
.bg-red{
    background-color:red; 
}

/*font*/
.font-SimSun{
    font-family: 'SimSun';
}
.font-KaiTi{
    font-family: 'KaiTi';
}
.font-FZShuTi{
    font-family: 'FZShuTi';
}

/*pages*/
.container{
}

.wrap{
    position: relative;
    width: 200px;
    min-height: 160px;
    background-color:white; 
    overflow:hidden;
}
.wrap .txtbox{
    position: absolute;
    bottom:10px;
    left:30px;
    color: black;
    font-size: 20px;
    z-index: 2;
    font-weight: bold;
    background: none;
    font-family: 'KaiTi';
}
.wrap .txtbox:hover .btn-drag{
    background:url(assets/image/move.png) no-repeat center;
    background-size:100%; 
}
.wrap .txtbox>span{
    border:1px solid transparent;
    display: block;
    margin-left: 20px;
}
.wrap:hover .txtbox>span{
    border:1px solid #e5e5e5;
    -webkit-box-shadow:0 0 10px rgba(0, 0, 0, .5);  
    box-shadow:0 0 10px rgba(0, 0, 0, .5);  
}

.wrap .txtbox .btn-drag{
    display: block;
    width: 20px;
    height: 20px;
    cursor: move;
    background:none;
}

.tips{
    position: absolute;
    top: 60px;
    left:230px;
    color: #999;
}
.tips li{
    padding-top:8px; 
}
.controls{
    position: absolute;
    top: 0px;
    left: 220px;
    padding: 10px;
    overflow:hidden;
}
.controls>li{
    float: left;
    padding: 8px 12px;
    background: #eee;
    text-align: center;
}
.controls>li:hover{
    background-color:#e5e5e5;
}
.controls>li:hover .child{
    display: block;
}
.controls .child{
    display: none;
}
.controls .child .color{
    display: inline-block;
    width: 100%;
    height: 20px;
}
.controls .child>li{
    padding: 6px 0;
}
.controls .child>li:first-child{
    padding: 14px 0 6px 0;
}
.controls .child>li:hover{
    text-decoration: underline;
}

.controls .btn-start{
    padding: 10px 16px;
    background-color: #fa5747;
    cursor: pointer;
}
.controls .btn-start:hover{
    background-color: #f54635; 
}
.result{
    position: absolute;
    top: 0;
    left: 720px;
    min-width: 200px;
    min-height: 180px;
}
/*素材*/
.chose{
    position: absolute;
    top: 300px;
    width: 100%;
}
.chose h3{
    padding: 10px;
    background-color:#f5f5f5; 
}
.img-list li{
    float: left;
    width: 120px;
    height: 120px;
    overflow: hidden;
    border:1px solid #e8e8e8;
    margin: 4px;
}
.img-list li:hover{
    border-color:#ccc;
    cursor: pointer;
}
.img-list li img{
    width: 100%;
}
</style>
</head>
<body>
<div class="container">
    <div id="wrap" class="wrap">
        <div id="txtbox" class="txtbox">
            <i id='btnDrag' class="btn-drag"></i>
            <span id="txt" contenteditable='true'>你是不是傻！</span>
        </div>
        <img id="bgImg" src='assets/image/emoji/1.jpg' width="100%">
    </div>
    <!-- 生成结果 -->
    <div id="result" class="result"><img src="assets/image/no.jpg"></div>
    <div class='tips'>
        操作步骤：
        <ul>
            <li>1. 移入左图编辑文字;</li>
            <li>2. 点击下面的素材更换图片;</li>
            <li>3. 点击'生成表情'，右键另存为，搞定！</li>
        </ul>
    </div>
    <!-- 编辑 -->
    <ul class='controls'>
        <li>
            <i>20px</i>
            <ul class="child">
                <li><a class='act' data-role='FontSize-false-3' href="#">小</a></li>
                <li><a class='act' data-role='FontSize-false-5' href="#">中</a></li>
                <li><a class='act' data-role='FontSize-false-7' href="#">大</a></li>
            </ul>
        </li>
        <li>
            <i>字体</i>
            <ul class="child">
                <li><a class='act' data-role='FontName-false-SimHei' href="#">黑体</a></li>
                <li><a class='act font-SimSun' data-role='FontName-false-SimSun' href="#">宋体</a></li>
                <li><a class='act font-KaiTi' data-role='FontName-false-KaiTi' href="#">楷体</a></li>
                <li><a class='act font-FZShuTi' data-role='FontName-false-FZShuTi' href="#">舒体</a></li>
            </ul>
        </li>
        <li><a class='act' data-role='bold-false-null' href='#'><b>B</b></a></li>
        <li><a class='act' data-role='italic-false-null' href='#'><em>I</em></a></li>
        <li><a class='act' data-role='underline-false-null' href='#'><u><b>U</b></u></a></li>
        <li><a class='act' data-role='strikeThrough-false-null' href='#'><del>del</del></a></li>
        <li>
            <i><img src="assets/image/color.png" width="12"></i>
            <ul class="child">
                <li><a class='act color bg-white' data-role='ForeColor-false-white' href="#"></a></li>
                <li><a class='act color bg-black' data-role='ForeColor-false-black' href="#"></a></li>
                <li><a class='act color bg-blue' data-role='ForeColor-false-blue' href="#"></a></li>
                <li><a class='act color bg-orange' data-role='ForeColor-false-orange' href="#"></a></li>
                <li><a class='act color bg-red' data-role='ForeColor-false-red' href="#"></a></li>
            </ul>
        </li>
        <li><a class='btn-turn' data-direction='left' href='#'><img src="assets/image/left.png" width="12"></a></li>
        <li><a class='btn-turn' data-direction='right' href='#'><img src="assets/image/right.png" width="12"></a></li>
        <li class='pr0'><span id='btnStart' class='btn-start'>生成表情 >></span></li>
    </ul>
    <!-- 素材 -->
    <div class="chose">
        <h3>素材：(点击选中)</h3>
        <ul id="imgList" class="img-list">
            <li><img src="assets/image/emoji/1.jpg"></li>
            <li><img src="assets/image/emoji/2.jpg"></li>
            <li><img src="assets/image/emoji/3.jpg"></li>
            <li><img src="assets/image/emoji/4.jpg"></li>
            <li><img src="assets/image/emoji/5.jpg"></li>
            <li><img src="assets/image/emoji/6.jpg"></li>
        </ul>
    </div>
</div>
<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script src="assets/js/drag.min.js"></script>
<script src="http://cdn.bootcss.com/html2canvas/0.4.1/html2canvas.js"></script> 
<script>
$(function() {
    var txtbox = $("#txtbox"),
        txt = $("#txt"),
        btnDrag = $('#btnDrag'),
        btnStart = $('#btnStart'),
        bgImg = $("#bgImg"),
        controls = $(".controls"),
        btnTurn = $(".btn-turn"),
        imgList = $("#imgList"),
        angle = 0;

    /*
     * 拖拽
     */
    btnDrag.drag({
        before: function(e) {},
        process: function(e) {
            txtbox.css({
                top: e.pageY - btnDrag.height() / 2,
                left: e.pageX - btnDrag.width() / 2
            })
        },
        end: function(e) {}
    })

    /*
     * 样式
     */
    controls.on('click', '.act', function(event) {
            event.preventDefault();
            var act = $(this).data('role').split('-');
            document.execCommand(act[0], act[1], act[2]);
        })

    // 旋转
    btnTurn.on('click', function(event) {
        var dir = $(this).data("direction");
        if (dir === 'left') {
            angle -= 10
        } else {
            angle += 10
        }
        txt.css('transform', 'rotate(' + angle + 'deg)');
        txt.css('-webkit-transform', 'rotate(' + angle + 'deg)');
    })

    /*
     * 生成图片
     */
    btnStart.on('click', function(event) {
        var wrap = document.getElementById('wrap'),
            result = document.getElementById('result');
        html2canvas(wrap, {
            allowTaint: true,
            taintTest: false,
            onrendered: function(canvas) {
                canvas.id = "mycanvas";
                var dataUrl = canvas.toDataURL("image/jpeg");
                var newImg = document.createElement("img");
                newImg.src = dataUrl;
                result.innerHTML = '';
                result.appendChild(newImg);
            }
        })
    })

    /*
     * 更换图片
     */
    imgList.on('click', 'img', function(event) {
        var src = $(this).attr('src');
        bgImg.attr('src', src);
    })

})
</script> 
</body>  
</html>  