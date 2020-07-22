<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>广告管理</title>
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
                        <h3 class="box-title">广告管理</h3>
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
										  <th class="sorting_asc">广告ID</th>
									      <th class="sorting">广告标题</th>
									      <th class="sorting">广告分类id</th>
									      <th class="sorting">广告URL</th>		
									      <th class="sorting">广告图片</th>	
									      <th class="sorting">广告排序</th>					     
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
									@foreach($slogan as $k=>$v)
			                          <tr slogan_id="{{$v->slogan_id}}">
			                              <td><input  type="checkbox"></td>                              
				                          <td>{{$v->slogan_id}}</td>
									      <td>{{$v->slogan_title}}</td>
									      <td>{{$v->slogancate_name}}</td>
									      <td>{{$v->slogan_url}}</td>
									      <td>
									      	@if($v->slogan_img)
									      	<img src="{{env('UPLOAD_URL')}}{{$v->slogan_img}}" width="100px" height="50px">
									      	@endif
									      </td>
									      <td>{{$v->slogan_sort}}</td>									     								     
		                                  <td class="text-center"  >
		                                  <!-- <button type="button" class="btn bg-olive btn-xs" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 修改</button> -->                                           
		                                 <a href="{{url('slogan/update/'.$v->slogan_id)}}" class="btn bg-olive btn-xs">修改</a>
		                                 <button type="button" id="del"  class="btn bg-olive btn-xs">删除</button>
		                                  </td>
			                          </tr>
			                          @endforeach
			                      </tbody>
			                  </table>
			                  <tr>
			                  	<td>{{$slogan->links()}}</td>
			                  </tr>
			                  <!--数据列表/--> 
                        </div>
                        <!-- 数据表格 /-->
                     </div>
                    <!-- /.box-body -->

		
<!-- 广告添加窗口 -->
<form action="{{url('slogan/doadd')}}" method="post" enctype="multipart/form-data">
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">广告添加</h3>
		</div>
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped"  width="800px">
				<tr>
		      		<td>广告标题</td>
		      		<td><input name="slogan_title"  class="form-control" placeholder="标题"  ng-model="entity.title">  </td>
		      	</tr>
				<tr>
		      		<td>广告分类</td>
		      		<td>
		      			<select name="slogancate_id">
		      				<option value="0">--请选择--</option>
		      				@foreach($slogancate as $k=>$v)
		      				<option value="{{$v->slogancate_id}}">{{$v->slogancate_name}}</option>
		      				@endforeach
		                </select>
		      		</td>
		      	</tr>
		      	
			    <tr>
		      		<td>广告URL</td>
		      		<td><input name="slogan_url" class="form-control" placeholder="URL" ng-model="entity.url">  </td>
		      	</tr>			      	
		      	<tr>
		      		<td>广告图片</td>
		      		<td>
						<table>
							<tr>
								<td>
								<input type="file" name="slogan_img" />		
							    </td>
							</tr>						
						</table>
		      		</td>
		      	</tr>	
		      	<tr>
		      		<td>广告排序</td>
		      		<td><input name="slogan_sort" class="form-control" placeholder="排序" ng-model="entity.sortOrder">  </td>
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
		//ajax删除
		$(document).on("click","#del",function(){
			var slogan_id=$(this).parents("tr").attr("slogan_id");
			if(window.confirm("是否确认删除")){
				var data={};
				data.slogan_id=slogan_id;
				var url="/slogan/del";
				$.ajax({
					type:"post",
					url:url,
					data:data,
					dataType:"json",
					success:function(res){
						if(res.success=="true"){
							location.href=res.url;
						}
						if(res.success=="false"){
							alert("删除失败");
							location.href=res.url;
						}
					}
				});
			}
		})
	})
</script>
