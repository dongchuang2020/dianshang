<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>txt</title>

    <link rel="stylesheet" type="text/css" href="/front/js/style.css">

    <script type="text/javascript" src="/front/js/jquery.min.js"></script>
    <script type="text/javascript" src="/front/js/vector.js"></script>

</head>
<body>

<div id="container">
    <div id="output">
        <div class="containerT">
            <h1>管理员登录</h1>
            <form class="form" id="entry_form">
                <input type="text" placeholder="管理员" id="entry_name"  class="yong">
                <input type="password" placeholder="密码" id="entry_password" class="mi">
                <button type="button" class="dong" id="entry_btn">登录</button>
                <div id="prompt" class="prompt"></div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        Victor("container", "output");   //登录背景函数
        $("#entry_name").focus();
        $(document).keydown(function(event){
            if(event.keyCode==13){
                $("#entry_btn").click();
            }
        });
    });
</script>
<script>
    $('.dong').on('click',function () {
        var yong = $('.yong').val();
        var mi = $('.mi').val();
        //alert(yong)
        $.ajax({
            url:'/admin/pipe_logs',
            type:'get',
            async:false,
            data:{
                'yong':yong,
                'mi':mi
            },
            success:function (mo) {
                //alert(1)
                //alert(mo)
                if (mo == '·成功'){
                    location.href="/admin";
                }else {
                    alert(mo);
                }
            }
        })
    })
</script>
</body>
</html>