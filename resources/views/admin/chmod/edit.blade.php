<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>分类管理</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/front/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/front/css/style.css">
    <script src="/front/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/front/plugins/bootstrap/js/bootstrap.min.js"></script>

</head>
<div class="box-header with-border" align="center">
    <h3 class="box-title">权限编辑</h3>
</div>
<div>
    <center>
        <div class="form-group form-inline" >
            <form class="m-t" role="form" action="" method="post">
                <div  class="form-group form-inline">
                    <input type="hidden" value="{{$res->chmod_id}}" id="chmod_id">
                    <table class="table table-bordered table-striped" >
                        <tr>
                            <td>权限名称</td>
                            <td width="450"><input type="text" value="{{$res->chmod_name}}" id="chmod_name"  class="form-control" placeholder="权限名称"  ng-model="entity.title">  </td>
                        </tr>
                        <tr>
                            <td>权限路由</td>
                            <td width="450"><input type="text" value="{{$res->chmod_url}}" id="chmod_name"  class="form-control" placeholder="权限名称"  ng-model="entity.title">  </td>
                        </tr>
                        <tr>
                            <td>权限介绍</td>
                            <td width="450"><input type="text" id="describe" value="{{$res->describe}}"  class="form-control" placeholder="权限介绍"  ng-model="entity.title">  </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="button" id="edit" value="编辑"  class="btn btn-success">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
</div>
</center>
<script src="/jquery.js"></script>
<script>
    $(document).ready(function(){
        $(document).on("click","#edit",function(){
            var chmod_id=$("#chmod_id").val();
            var chmod_name=$("#chmod_name").val();
            var chmod_url=$("#chmod_url").val();
            var describe=$("#describe").val();
            var url="/chmod/update";

            $.ajax({
               url:url,
               type:'post',
               data:{chmod_id:chmod_id,chmod_name:chmod_name,chmod_url:chmod_url,describe:describe},
               dataType:'json',
               success:function(msg){
                   if(msg.status==200){
                       alert(msg.message);
                       var url=msg.url;
                       location.href=url;
                   }else if(msg.status==10){
                       alert(msg.message);
                       var url=msg.url;
                       location.href=url;
                   }
               }
            });
        });
    });
</script>