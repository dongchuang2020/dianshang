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
    <h3 class="box-title">分类管理</h3>
</div>
<div>
    <center>
        <div class="form-group form-inline" >
            <form class="m-t" role="form" action="" method="post">
                <input type="hidden" id="a_id" value="{{$res->a_id}}">
                <div  class="form-group form-inline">
                    <table class="table table-bordered table-striped" >
                        <tr>
                            <td>属性名</td>
                            <td>
                                <select name="sid" id="sid" class="form-control">
                                    <option value="0">--请选择--</option>
                                    @foreach($re as $k=>$v)
                                        @if($v->sid==$res->sid)
                                        <option value="{{$v->sid}}" selected="selected">{{$v->name}}</option>
                                        @else
                                            <option value="{{$v->sid}}">{{$v->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>属性名称</td>
                            <td width="450"><input type="text" value="{{$res->a_name}}" id="a_name"    class="form-control" placeholder="属性名称"  ng-model="entity.title">  </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="button" id="btn" value="编辑"  class="btn btn-success">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
</div>
</html>
</center>
<script src="/jquery.js"></script>
<script>
    $(document).ready(function(){
        $(document).on("click","#btn",function(){
            var a_id=$("#a_id").val();
            var sid=$("#sid").val();
            var a_name=$("#a_name").val();
            var url="/attribute/update";

            $.ajax({
                url:url,
                type:'post',
                data:{a_id:a_id,a_name:a_name,sid:sid},
//                dataType:'json',
                success:function(msg){
//                    console.log(msg);
                    if(msg=="·1"){
                        alert("修改成功");
                        location.href="/attribute/index";
                    }else{
                        alert("修改失败");
                    }
                }
            });
        });
    });
</script>