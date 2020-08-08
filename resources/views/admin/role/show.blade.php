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

<body class="hold-transition skin-red sidebar-mini">
  <!-- .box-body -->
                
                    <div class="box-header with-border">
                        <h3 class="box-title">角色管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 添加</button>
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
										  <th class="sorting_asc">角色id</th>
									      <th class="sorting">角色名称</th>
									      <th class="sorting">角色权限</th>			     
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
			                      	@foreach($roleInfo as $k=>$v)
			                          <tr role_id="{{$v->role_id}}">
			                          	<th class="" style="padding-right:0px">
			                                  <input id="selall" type="checkbox" class="icheckbox_square-blue">
			                              </th> 
			                          	  <td>{{$v->role_id}}</td>
									      <td>{{$v->role_name}}</td>
									      <td>
									      	@foreach($res as $kk=>$vv)
									      		@if($v->role_id==$vv->role_id)
									      	{{$vv->chmod_name}}
									      		@endif
									      	@endforeach
									       <a href="{{url('role/rolechmod_add/'.$v->role_id)}}">+</a>
			
									       
									      </td>								      								     								     
		                                  <td class="text-center"  >
		                                  <!-- <button type="button" class="btn bg-olive btn-xs" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 修改</button> -->                                           
		                                 <a href="{{url('role/update/'.$v->role_id)}}" class="btn bg-olive btn-xs">修改</a>
		                                 <button type="button" id="del"  class="btn bg-olive btn-xs">删除</button>                                           
		                                  </td>
			                          </tr>
									@endforeach
			                      </tbody>
			                  </table>
			                  <tr>
			                  	<td>{{$roleInfo->links()}}</td>
			                  </tr>
			                  <!--数据列表/--> 
                        </div>
                        <!-- 数据表格 /-->
                     </div>
                    <!-- /.box-body -->

		
<!-- 广告添加窗口 -->
<form action="{{url('role/doadd')}}" method="post" enctype="multipart/form-data">
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">角色添加</h3>
		</div>
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped"  width="800px">
				<tr>
		      		<td>角色名称</td>
		      		<td>
		      			<input name="role_name"  class="form-control" placeholder="角色名称"  ng-model="entity.title">  </td>
		      	</tr>		      	
		      		
			 </table>			
			
		</div>
		<div class="modal-footer">						
			<input type="submit" value="添加">
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>
</form>
</body>
</html>
<script src="/jquery.js"></script>
<script>
	$(document).ready(function(){
		$(document).on("click","#del",function(){
			var role_id=$(this).parents("tr").attr("role_id");
			if(window.confirm("是否确认删除")){
			var data={};
			data.role_id=role_id;
			var url="/role/del";
			$.ajax({
				type:"post",
				data:data,
				url:url,
//				dataType:"json",
				success:function(res){
					if(res=="·1") {
						alert("删除成功");
						location.href = "/role/show";
					}
				 }
			 })
		   }
		})
	})
</script>
