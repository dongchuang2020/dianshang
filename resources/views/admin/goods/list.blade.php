<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商家审核</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/front/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/front/css/style.css">
    <script src="/front/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/front/plugins/bootstrap/js/bootstrap.min.js"></script>

</head>

<body class="hold-transition skin-red sidebar-mini"  >
<!-- .box-body -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">商家审核</h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">

            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th class="" style="padding-right:0px">
                        <input id="selall" type="checkbox" class="icheckbox_square-blue">
                    </th>
                    <th class="sorting_asc">商品id</th>
                    <th class="sorting">商品名称</th>
                    <th class="sorting">商品价格</th>
                    <th class="sorting">商品图片</th>
                    <th class="sorting">商品数量</th>
                    <th class="sorting">商品描述</th>
                    <th class="sorting">是否展示</th>
                    <th class="sorting">是否热卖</th>
                    <th class="sorting">是否上架</th>
                    <th class="sorting">是否新品</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                <tr goods_id="{{$v->goods_id}}">
                    <td><input  type="checkbox"></td>
                    <td>{{$v->goods_id}}</td>
                    <td>{{$v->goods_name}}</td>
                    <td>{{$v->goods_price}}</td>
                    <td><img src="{{$v->goods_log}}" alt="" width="100px" height="120px"></td>
                    <td>{{$v->goods_num}}</td>
                    <td>{{$v->goods_desc}}</td>
                    <td>{{$v->is_show==1?'是':'否'}}</td>
                    <td>{{$v->is_hot==1?'是':'否'}}</td>
                    <td>{{$v->is_sell==1?'是':'否'}}</td>
                    <td>{{$v->is_new==1?'是':'否'}}</td>
                    <td data-goods_id="{{$v->goods_id}}">
                    <td class="text-center">
                        <a href="#" class="btn btn-info" role="button" id="btn" >删除</a>
                        <a href="{{url('/admins/upgoods/'.$v->goods_id)}}" class="btn btn-info" role="button">修改</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="paging">{{$data->links()}}</div>
            <!--数据列表/-->
        </div>
        <!-- 数据表格 /-->
    </div>
    <!-- /.box-body -->
</body>
</html>
<script src="/front/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>
    $(document).on('click','#btn',function () {
        var goods_id = $("#btn").parents("tr").attr('goods_id');
        var url = 'delgoods';
        $.ajax({
            type:'get',
            url:url,
            data:{'goods_id':goods_id},
            dataType:'json',
            success:function (res) {
                if(res.code=='00001'){
                    alert(res.msg)
                    window.location.href = '/admins/goodslist';
                }
            }
        })
    })
</script>