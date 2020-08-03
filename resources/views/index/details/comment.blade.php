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
    <h3 class="box-title">评论管理</h3>
</div>
<div>
    <center>
        <div class="form-group form-inline" >
            <form class="m-t" role="form" action="" method="post">
                <div  class="form-group form-inline">
                    <table class="table table-bordered table-striped" >
                        <input type="hidden" value="{{$goods_id}}" id="goods_id">
                        <tr>
                            <td>评论内容</td>
                            <td width="450">
                                <textarea id="comment" class="form-control" placeholder="留下你下说的话" cols="30" rows="10"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="button" value="提交" id="btn"  class="btn btn-success">
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
        $(document).on("click","#btn",function(){
            var goods_id=$("#goods_id").val();
            var comment=$("#comment").val();
            var url="/details/comment_add";

            $.ajax({
                url:url,
                type:'post',
                data:{goods_id:goods_id,comment:comment},
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
