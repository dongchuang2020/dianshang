<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
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
    <h2>管理员修改</h2>
    <p>...</p>
</div>
<div class="nihao">
    <div class="form-group"><input type="hidden" id="admin" value="{{$data->admin_id}}">
        <label for="exampleInputEmail1">用户名称</label>
        <input type="text" id="yong" class="form-control"  value="{{$data->admin_name}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">用户电话</label>
        <input type="text" id="dian" class="form-control" value="{{$data->tel}}" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">用户邮箱</label>
        <input type="text" id="you" class="form-control" value="{{$data->email}}" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button  id="zhu" class="btn btn-primary">修改</button>
</div>

<!-- 内容区域 /-->
</body>
<script src="/front/js/plugins/jquery/jquery.min.js"></script>
<script>
    $("#zhu").on('click',function () {
        var yong=$("#yong").val();
        var id=$("#admin").val();
        //alert(yong)
        var dian=$("#dian").val();
        var you=$("#you").val();
        $.ajax({
            url:'/admin/pipe_adds',
            type:'get',
            data:{
                'id':id,
                'yong':yong,
                'dian':dian,
                'you':you
            },
            success:function (rm) {

                if (rm == '·1'){
                   alert("修改成功");
                    location.href="/admin/pipe_zhan"
                }
            }
        })
    })
</script>

</html>