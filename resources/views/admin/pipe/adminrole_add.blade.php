<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>用户管理</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/front/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/front/css/style.css">
	<script src="/front/js/jquery.min.js"></script>
    <script src="/front/plugins/bootstrap/js/bootstrap.min.js"></script>
    
</head>
    <div class="box-header with-border" align="center">
        <h3 class="box-title">用户赋角色</h3>   
    </div>
    <div>
    <center>
    <div class="form-group form-inline" >
            <form class="m-t" role="form" action="{{url('role/updatedo')}}" method="post">
            <div  class="form-group form-inline">							
                <table class="table table-bordered table-striped" >
                    <tr>
                        <td>角色名称</td>
                        <td width="450">
                            @foreach($res as $k=>$v)
                            <input type="checkbox" name="role_id" id="role_id" value="{{$v->role_id}}">{{$v->role_name}}
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
</center>
<script>
    $(document).ready(function(){
        $(document).on("click","#btn",function(){

            var str='';
            $("input[name='role_id']:checked").each(function(){
                str+=$(this).val()+',';
            });
            var role_id=str.substring(0,str.length-1);
            // alert(chmod_id);return;  
            var admin_id="{{$admin_id}}";
            var url="/pipe/adminrole_doadd";
            // alert(url);die; 

            $.ajax({
                url:url,
                type:'post',
                data:{admin_id:admin_id,role_id:role_id},
                // console.log(data);return;
                //dataType:'json',
                success:function(msg){
                    //alert(msg)
                    if(msg=="·1"){
                        location.href="/admin/pipe_zhan";
                    }
                }
            });
        });
    });
</script>
</html>