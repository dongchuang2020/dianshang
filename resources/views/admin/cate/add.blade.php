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

<body class="hold-transition skin-red sidebar-mini">
  <!-- .box-body -->
                
                    <div class="box-header with-border">
                        <h3 class="box-title">分类管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 添加</button>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="box-tools pull-right">
                                <div class="has-feedback">
							                                  
                                </div>
                            </div>
                            <!--工具栏/-->

			                 
			                  <!--数据列表/--> 
                        </div>
                        <!-- 数据表格 /-->
                     </div>
                    <!-- /.box-body -->

		
<!-- 分类添加窗口 -->
<form action="{{url('cate/add_do')}}" method="post" enctype="multipart-form">
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">分类添加</h3>
		</div>
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped"  width="800px">
				<tr>
		      		<td>分类名称</td>
		      		<td><input name="cate_name"  class="form-control" placeholder="名称"  ng-model="entity.title">  </td>
                  </tr>
                  <tr>
                      <td>父级分类</td>
                      <td>
                        <select name='parent_id' class="form-control"> 
                            <option value="0">顶级分类</option>
                            @foreach($data as $v)
                                <option value="{{$v['cate_id']}}">@php echo str_repeat("&nbsp;&nbsp;&nbsp;",$v['level'])@endphp {{$v['cate_name']}}</option> 
                            @endforeach 
                        </select> 
                      </td>
		      		<!-- <td><input name="slogan_title"  class="form-control" placeholder=""  ng-model="entity.title">  </td> -->
		      	</tr>
				<tr>
		      		<td>是否显示</td>
		      		<td>
                        <input type="radio" name="cate_show" value="1" > 是
                        <input type="radio" name="cate_show" value="2" > 否
		      		</td>
		      	</tr>
		      	
			    <tr>
		      		<td>是否导航展示</td>
		      		<td>
                        <input type="radio" name="cate_nav_show" value="1" > 是
                        <input type="radio" name="cate_nav_show" value="2" > 否
                    </td>
		      	</tr>			      	
		      	<tr>
                    <td>
                        <input type="submit"  class="btn btn-success">
                    </td>
                </tr>		       	
			 </table>				
			

        
</div>
		</div>
		
	  </div>
	</div>
</div>

</body>

</html>