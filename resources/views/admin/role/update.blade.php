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
        <h3 class="box-title">修改角色管理</h3>   
    </div>
    <div>
    <center>
    <div class="form-group form-inline" >
            <form class="m-t" role="form" action="{{url('role/updatedo')}}" method="post">
            <div  class="form-group form-inline">							
                <table class="table table-bordered table-striped" >
                    <input type="hidden" name="role_id" value="{{$res->role_id}}">
                    <tr>
                        <td>角色名称</td>
                        <td width="450"><input type="text" name="role_name" value="{{$res->role_name}}"  class="form-control" placeholder="名称"  ng-model="entity.title">  </td>
                    </tr> 	
                    <tr>
                        <td>
                            <input type="submit"  class="btn btn-success">
                        </td>
                    </tr>		       	
                </table>				        
    </div>
        </form>
</div>
</div>
</center>