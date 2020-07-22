<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>角色管理</title>
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
        <h3 class="box-title">角色赋权限</h3>   
    </div>
    <div>
    <center>
    <div class="form-group form-inline" >
            <form class="m-t" role="form" action="{{url('role/updatedo')}}" method="post">
            <div  class="form-group form-inline">							
                <table class="table table-bordered table-striped" >
                    <tr>
                        <td>权限名称</td>
                        <td width="450">
                            @foreach($res as $k=>$v)
                            <input type="checkbox" name="chmod_id" id="chmod_id" value="{{$v->chmod_id}}">{{$v->chmod_name}}
                            @endforeach
                        </td>
                    </tr> 	
                    <tr>
                        <td>
                            <input type="button" id="btn" value="提交" class="btn btn-success">
                        </td>
                    </tr>		       	
                </table>				        
    </div>
        </form>
</div>
</div>
</center>
<script src='/jquery.js'></script>
<script>
    $(document).ready(function(){
        $(document).on("click","#btn",function(){
            // alert(1);return;
            var str='';
            $("input[name='chmod_id']:checked").each(function(){
                str+=$(this).val()+',';
            });
            var chmod_id=str.substring(0,str.length-1);
            // alert(chmod_id);return;  
            var role_id="{{$role_id}}";
            var url="/role/rolechmod_add_do";
            // alert(url);die; 

            $.ajax({
                url:url,
                type:'post',
                data:{chmod_id:chmod_id,role_id:role_id},
                // console.log(data);return;
                dataType:'json',
                success:function(msg){
                    if(msg.status==200){
                        alert(msg.message);
                        var url=msg.url;
                        location.href=url;
                    }
                }
            });
        });
    });
</script>