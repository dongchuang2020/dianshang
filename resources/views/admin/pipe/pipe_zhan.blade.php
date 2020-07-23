<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>类型模板管理</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/front/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/front/css/style.css">
    <script src="/front/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/front/plugins/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/front/plugins/select2/select2.css" />
    <link rel="stylesheet" href="/front/plugins/select2/select2-bootstrap.css" />
    <script src="/front/plugins/select2/select2.min.js" type="text/javascript"></script>

</head>

<body class="hold-transition skin-red sidebar-mini" >
<!-- .box-body -->

<div class="box-header with-border">
    <h3 class="box-title">管理员模板管理</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                </div>
            </div>
        </div>
        {{--<div class="box-tools pull-right">
            <div class="has-feedback">
                管理员名称：<input  >
                <button class="btn btn-default">查询</button>
            </div>
        </div>--}}
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">模板ID</th>
                <th class="sorting">管理员名称</th>
                <th class="sorting">给用户赋角色</th>
                <th class="sorting">电话</th>
                <th class="sorting">邮箱</th>
                <th class="sorting">添加时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $v)
            <tr>
                <td >{{$v->admin_id}}</td>
                <td>{{$v->admin_name}}</td>
                <td>
                    @foreach($res as $kk=>$vv)
                      @if($v->admin_id==$vv->admin_id)
                            {{$vv->role_name}}
                      @endif
                    @endforeach
                     <a href="{{url('pipe/adminrole_add/'.$v->admin_id)}}">+</a>
                </td>
                <td>{{$v->tel}}</td>
                <td>{{$v->email}}</td>
                <td>{{date("Y-d-m H:i:s",$v->add_time)}}</td>
                <td  class="text-center">
                    <a  href="/admin/pipe_xui?id={{$v->admin_id}}" class="btn bg-olive btn-xs"  data-target="#editModal" >修改</a>
                    <button  class="btn bg-olive btn-xs  shan "  data-id="{{$v->admin_id}}"  >删除</button>
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




<!-- 编辑窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">商品类型模板编辑</h3>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-striped"  width="800px">
                    <tr>
                        <td>商品类型</td>
                        <td><input  class="form-control" placeholder="商品类型">  </td>
                    </tr>
                    <tr>
                        <td>关联品牌</td>
                        <td>
                            <input select2 config="{data:[{id:'1',text:'联想'},{id:'2',text:'华为'}]}" multiple placeholder="选择品牌（可多选）" class="form-control" type="text"/>
                        </td>
                    </tr>
                    <tr>
                        <td>关联规格</td>
                        <td>
                            <input select2 select2-model="entity.specIds" config="options['specification']" multiple placeholder="选择规格（可多选）" class="form-control" type="text"/>
                        </td>
                    </tr>

                    <tr>
                        <td>扩展属性</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default" title="新增扩展属性"><i class="fa fa-file-o"></i> 新增扩展属性</button>

                            </div>
                            <table class="table table-bordered table-striped"  width="800px">
                                <thead>
                                <tr>
                                    <td><input type="checkbox" class="icheckbox_square-blue"></td>
                                    <td>属性名称</td>
                                    <td>操作</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" class="icheckbox_square-blue" ></td>
                                    <td><input class="form-control" placeholder="属性名称" ></td>
                                    <td><button type="button" class="btn btn-default" title="删除"><i class="fa fa-trash-o"></i> 删除</button></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="icheckbox_square-blue" ></td>
                                    <td><input class="form-control" placeholder="属性名称" ></td>
                                    <td><button type="button" class="btn btn-default" title="删除"><i class="fa fa-trash-o"></i> 删除</button></td>
                                </tr>
                                </tbody>
                            </table>

                        </td>
                    </tr>

                </table>

            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">保存</button>
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
        </div>
    </div>
</div>

</body>
<script src="/front/js/plugins/jquery/jquery.min.js"></script>
<script>
    $('.shan').on('click',function() {
        var admin_id = $(this).data("id");
        $.ajax({
            url:'/admin/pipe_adds',
            type:'get',
            data:{
                'id':admin_id
            },
            success:function (mu) {
                alert(mu)
                location.reload();
            }
        })
        console.log(admin_id);
    })
</script>

</html>