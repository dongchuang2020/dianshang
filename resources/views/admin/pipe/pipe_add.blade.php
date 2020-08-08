<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理系统</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/front/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="/front/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/front/css/style.css">
    <style>
    .nihao{
        width: 450px;
        height: 100px;
        position:relative;
        left:300px;
    }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">

<!-- 内容区域 -->
<div class="jumbotron">
    <h2>管理员添加</h2>
    <p>...</p>
</div>
<div class="nihao">
    <div class="form-group">
        <label for="exampleInputEmail1">用户名称</label>
        <input type="text" id="yong" class="form-control" >
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">用户密码</label>
        <input type="password" id="mi" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">用户电话</label>
        <input type="text" id="dian" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">用户邮箱</label>
        <input type="text" id="you" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" id="zhu" class="btn btn-primary">注册</button>
</div>

<!-- 内容区域 /-->
</body>
<script src="/front/js/plugins/jquery/jquery.min.js"></script>
<script src="/front/js/axios.js"></script>
<script>
    $("#zhu").on('click',function () {
        var yong=$("#yong").val();
        var mi=$("#mi").val();
        var dian=$("#dian").val();
        var you=$("#you").val();
        $.ajax({

            url:'/admin/pipe_adds',
            type:'get',
            async:false,
            data:{
                'yong':yong,
                'mi':mi,
                'dian':dian,
                'you':you
            },
            success:function (rm) {
                if (rm == '·1'){
                    alert("添加成功");
                    location.href="/admin/pipe_zhan";
                }
            }
        })
    })
</script>

</html>