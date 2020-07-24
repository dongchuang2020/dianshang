<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商家审核</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/front/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/front/css/style.css">
    <script src="/front/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/front/plugins/bootstrap/js/bootstrap.min.js"></script>

</head>

<body class="hold-transition skin-red sidebar-mini"  >
<!-- .box-body -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">商家审核</h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">

            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th class="sorting_asc">id</th>
                    <th class="sorting">名称</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr id="{{$v['sid']}}">
                        <td>{{$v['sid']}}</td>
                        <td>{{$v['name']}}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-info" role="button" id="btn" >删除</a>
                            <a href="{{url('/admins/upsku/'.$v['sid'])}}" class="btn btn-info" role="button">修改</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--数据列表/-->
        </div>
        <!-- 数据表格 /-->
    </div>
    <!-- /.box-body -->
</body>
</html>
<script>
    $(document).on('click','#btn',function () {
        var id = $("#btn").parents("tr").attr('id');
        var url = 'delsku';
        $.ajax({
            type:'get',
            url:url,
            data:{'id':id},
            dataType:'json',
            success:function (res) {
                if(res.code=='00000'){
                    alert(res.msg)
                    window.location.href = "/admins/skulist";
                }
            }
        })
    })
</script>
