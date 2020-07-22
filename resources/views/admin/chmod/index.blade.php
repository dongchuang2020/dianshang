<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>品牌管理</title>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/front/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/front/css/style.css">
    <script src="/front/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/front/plugins/bootstrap/js/bootstrap.min.js"></script>


</head>
<body class="hold-transition skin-red sidebar-mini">
<!-- .box-body -->
<div class="box-header with-border">
    <h3 class="box-title">权限管理</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 新建</button>
                    <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                </div>
            </div>
        </div>
        <div class="box-tools pull-right">
            <div class="has-feedback">

            </div>
        </div>
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="" style="padding-right:0px">
                    <input id="selall" type="checkbox" class="icheckbox_square-blue">
                </th>
                <th class="sorting_asc">权限ID</th>
                <th class="sorting">权限名称</th>
                <th class="sorting">权限路由</th>
                <th class="sorting">权限描述</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($res as $k=>$v)
            <tr>
                <td><input  type="checkbox" ></td>
                <td>{{$v->chmod_id}}</td>
                <td>{{$v->chmod_name}}</td>
                <td>{{$v->chmod_url}}</td>
                <td>{{$v->describe}}</td>
                <td class="text-center">
                    <button type="button" onclick="del('{{$v->chmod_id}}')" class="btn bg-olive btn-xs" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                    <a href="{{url('/chmod/edit/'.$v->chmod_id)}}" class="btn bg-olive btn-xs">修改</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <!--数据列表/-->
        {{$res->links()}}

    </div>
    <!-- 数据表格 /-->




</div>
<!-- /.box-body -->

<!-- 编辑窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">权限添加</h3>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped"  width="800px">
                    <tr>
                        <td>权限名称</td>
                        <td><input type="text" id="chmod_name" class="form-control" placeholder="权限名称" >  </td>
                    </tr>
                    <tr>
                        <td>路径</td>
                        <td><input type="text" id="chmod_url" class="form-control" placeholder="权限路由" >  </td>
                    </tr>
                    <tr>
                        <td>权限描述</td>
                        <td><input type="text" id="describe" class="form-control" placeholder="权限描述">  </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button id="add" class="btn btn-success" data-dismiss="modal" aria-hidden="true">添加</button>
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">取消</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<script src="/jquery.js"></script>
<script>
    $(document).ready(function(){
       $(document).on("click","#add",function(){
           var chmod_name=$("#chmod_name").val();
           var chmod_url=$("#chmod_url").val();
           var describe=$("#describe").val();
           var url="/chmod/add_do";

           $.ajax({
              url:url,
              type:'post',
              data:{chmod_name:chmod_name,chmod_url:chmod_url,describe:describe},
              dataType:'json',
              success:function(msg){
                  if(msg.status==200){
                      alert(msg.message);
                      history.go();
                      var url=msg.url;
                      localtion.href=url;
                  }else if(msg.status==10){
                      alert(msg.message);
                      var url=msg.url;
                      localtion.href=url;
                  }
              }
           });
       });
    });
    function del(chmod_id){
        if(!chmod_id){
            return;
        }
        if(confirm('是否确认删除')){
            $.get('/chmod/del/'+chmod_id,function(msg){
                if(msg.status==200){
                    alert(msg.message);
                    var url=msg.url;
                    location.href=url;
                }
            },'json')
        }
    }
</script>