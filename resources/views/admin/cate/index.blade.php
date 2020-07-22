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
                            <!-- <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 添加</button>
                                        <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                                    
                                    </div>
                                </div>
                            </div> -->
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
										  <th class="sorting_asc">ID</th>
									      <th class="sorting">分类名称</th>
									      <th class="sorting">父级分类</th>
									      <th class="sorting">是否显示</th>		
									      <th class="sorting">是否导航展示</th>	
									      <th class="sorting">添加时间</th>												     						      							
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
                                    @foreach($data as $k=>$v)
			                          <tr>
			                              <td><input  type="checkbox"></td>			                              
                                          <td>{{$v['cate_id']}}</td>
                                          <td>{{$v['cate_name']}}</td>
                                          @foreach($da as $n)
                                          @if($v['parent_id'] == $n['cate_id']) <td> {{$n['cate_name']}}</td>@endif
                                          @endforeach
									      <td>
                                              @if($v['cate_show'] == '1')
                                                是
                                              @else
                                                否
                                              @endif
                                          </td>
									      <td>
                                                @if($v['cate_nav_show'] == '1')
                                                    是
                                                @else
                                                    否
                                                @endif
									      </td>
									      <td>
                                                {{date('Y-m-d H:i:s',$v['add_time'])}}
                                          </td>								     								     
		                                  <td class="text-center">                                           
                                               <!-- <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal">修改</button>  -->
                                               <!-- <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal">删除</button> -->
                                               <a href="" class="btn bg-olive btn-xs">修改</a>           
                                               <a href="{{url('cate/del/'.$v['cate_id'])}}" class="btn bg-olive btn-xs">删除</a>           
		                                  </td>
                                      </tr>
                                    @endforeach
			                      </tbody>
                              </table>
                              {{$data->links()}}
			                  <!--数据列表/--> 
                        </div>
                        <!-- 数据表格 /-->
                     </div>
                    <!-- /.box-body -->		
<!-- 广告添加窗口 -->
<!-- <form action="{{url('cate/index')}}" method="post" enctype="multipart-form"> -->
</body>
</html>