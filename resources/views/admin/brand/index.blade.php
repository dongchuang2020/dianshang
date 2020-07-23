<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>品牌管理</title>
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
    <h3 class="box-title">品牌管理</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="新建" data-toggle="modal" data-target="#editModal" ><i class="fa fa-file-o"></i> 新建</button>
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
                <th class="sorting_asc">品牌ID</th>
                <th class="sorting">品牌名称</th>
                <th class="sorting">分类名称</th>
                <th class="sorting">品牌图片</th>
                <th class="sorting">是否展示</th>
                <th class="sorting">添加时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($res as $k=>$v)
            <tr brand_id="{{$v->brand_id}}">
                <td><input  type="checkbox" ></td>
                <td>{{$v->brand_id}}</td>
                <td field="brand_name">
                    <span class="span_name">{{$v->brand_name}}</span>
                    <input type="text" value="{{$v->brand_name}}" class="change_name" style="display:none">
                </td>
                <td>{{$v->cate_name}}</td>
                <td>
                    @if($v->brand_img)
                        <img src="http://uploads.1909.com/{{$v->brand_img}}" width="45px">
                    @endif
                </td>
                <td class="change" field="brand_show">
                    @if($v->brand_show=='1')
                        是
                     @else
                        否
                     @endif
                </td>
                <td>{{date("Y-m-d H:i:m",$v->add_time)}}</td>
                <td class="text-center">
                    <button type="button" onclick="del('{{$v->brand_id}}')" class="btn bg-olive btn-xs" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                    <a href="{{url('/brand/edit/'.$v->brand_id)}}" class="btn bg-olive btn-xs" >修改</a>
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
        <!--数据列表/-->
        {{$res->links()}}

    </div>
    <!-- 数据表格 /-->




</div>

<!-- /.box-body -->

<!-- 编辑窗口 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="{{url('/brand/add_do')}}" method="post" enctype="multipart/form-data">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">品牌添加</h3>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped"  width="800px">
                        <tr>
                            <td>品牌名称</td>
                            <td><input type="text" class="form-control" placeholder="品牌名称" name="brand_name">  </td>
                        </tr>
                        <tr>
                            <td>分类名称</td>
                            <td>
                                <select name="cate_id">
                                    <option value="0">--请选择--</option>
                                    @foreach($re as $k=>$v)
                                    <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>品牌图片</td>
                            <td><input type="file" class="form-control" name="brand_img"></td>
                        </tr>
                        <tr>
                            <td>是否展示</td>
                            <td>
                                <input type="radio" value="1" name="brand_show" checked>是
                                <input type="radio" value="2" name="brand_show">否
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" class="btn btn-success"></td>
                            <td><input type="button" class="btn btn-default" value="取消"></td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </form>
</div>

</body>
</html>
<script src="/jquery.js"></script>
<script>
        function del(brand_id){
            if(!brand_id){
                return;
            }
            if(confirm('是否确认删除')){
                $.get('/brand/del/'+brand_id,function(msg){
                    if(msg.status==200){
                        alert(msg.message);
                        history.go(0);
                        var url=msg.url;
                        localtion.href=url;
                    }else if(msg.status==100){
                        alert(msg.message);
                        var url=msg.url;
                        localtion.href=url;
                    }
                },'json')
            }
        }

        $(document).on("click",".change",function(){
            var _this=$(this);
            var sign=_this.text();
            var sign= $.trim(sign);
            var field=_this.attr("field");
            var brand_id=_this.parents("tr").attr('brand_id');
            var url="/brand/change";

            if(sign=="是"){
                var _value=2;
            }else{
                var _value=1;
            }

            $.ajax({
                url:url,
                type:'post',
                data:{brand_id:brand_id,field:field,_value:_value},
                dataType:'json',
                success:function(msg){
                    if(msg.status==200){
                        if(sign=="是"){
                            _this.text="否"
                        }else{
                            _this.text="是"
                        }
                        var url=msg.url;
                        location.href=url;
                    }
                }
            });
        });
        $(".span_name").click(function(){
           var _this=$(this);
           _this.hide();
           _this.next('input').show();
        });
        $(".change_name").blur(function(){
            var _this=$(this);
            var _value=_this.val();
            var field=_this.parent().attr("field");
            var brand_id=_this.parents("tr").attr("brand_id");
            var url="/brand/changeName";

            $.ajax({
               url:url,
                type:"post",
                data:{_value:_value,field:field,brand_id:brand_id},
                dataType:'json',
                success:function(msg){
//                    console.log(msg);
                    if(msg.status==200){
                        _this.prev("span").text(_value).show();
                        _this.hide();
                    }else if(msg.status==100){
                        alert(msg.message);
                    }
                    var url=msg.url;
                    location.href=url;
                }
            });
        });
</script>
