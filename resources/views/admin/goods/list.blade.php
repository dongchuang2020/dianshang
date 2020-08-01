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
        <form action="{{url('/admins/goodslist')}}" type="post">
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
            商品名称：<input type="text" name="goods_name" value="{{$name['goods_name']}}">
            品牌名称：<select name="brand_id">
                            <option value="">--请选择--</option>
                            @foreach($brand_info as $k=>$v)
                            <option value="{{$v->brand_id}}" @if($v->brand_id == $name['brand_id']) 
                            selected @endif>{{$v->brand_name}}</option>
                            @endforeach
                      </select>
            分类名称：<select name="cate_id">
                            <option value="">--请选择--</option>
                            @foreach($cate_info as $kk=>$vv)
                            <option value="{{$vv->cate_id}}" @if($vv->cate_id == $name['cate_id']) 
                            selected @endif>{{$vv->cate_name}}</option>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                            @foreach($cate_info as $k=>$v)
                            <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                            @endforeach
=======
>>>>>>> Stashed changes
=======
                            @foreach($cate_info as $k=>$v)
                            <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                            @endforeach
>>>>>>> Stashed changes
                            @endforeach
                      </select>
            <input type="submit" class="btn btn-info" role="button" value="搜索"> 
        </form>

        <!-- 数据表格 -->
        <div class="table-box">

            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th class="sorting_asc">商品id</th>
                    <th class="sorting">商品名称</th>
                    <th class="sorting">品牌名称</th>
                    <th class="sorting">属性名</th>
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
                    <td>{{$v->goods_id}}</td>
                    <td field="goods_name">
                        <span class="span_goodsname">{{$v->goods_name}}</span>
                        <input type="text" class="changValue" value="{{$v->goods_name}}" style="display:none">
                    </td>
                    <td>{{$v->brand_name}}</td>
                    <td>{{$v->name}}</td>
                    <td>{{$v->goods_price}}</td>
                    <td><img src="{{$v->goods_log}}" alt="" width="100px" height="120px"></td>
                    <td>{{$v->goods_num}}</td>
                    <td>{{$v->goods_desc}}</td>
                    <td field="is_show">
                        <span class="is_show">{{$v->is_show==1?'是':'否'}}</span>                        
                    </td>
                    <td field="is_hot">
                        <span class="is_show">{{$v->is_hot==1?'是':'否'}}</span>
                    </td>
                    <td field="is_sell">
                        <span class="is_show">{{$v->is_sell==1?'是':'否'}}</span>
                    </td>
                    <td field="is_new">
                        <span class="is_show">{{$v->is_new==1?'是':'否'}}</span>
                    </td>
                    <td class="text-center" data-goods_id="{{$v->goods_id}}">
                        <a href="#" class="btn btn-info" role="button" id="btn" >删除</a>
                        <a href="{{url('/admins/upgoods/'.$v->goods_id)}}" class="btn btn-info" role="button">修改</a>
                        <a href="{{url('/admins/goodsImgs/'.$v->goods_id)}}" class="btn btn-info" role="button">商品子图片</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="paging">{{$data->appends($name)->links()}}</div>
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
    //给商品名称绑定一个点击事件
    $(document).on("click",".span_goodsname",function(){
        var _this=$(this);
        _this.hide();
        _this.next("input").show();
    })
    $(document).on("blur",".changValue",function(){
        var _this=$(this);
        var val=$(this).val();
        var goods_id=$(this).parents("tr").attr("goods_id");
        var field=$(this).parent("td").attr("field");
        var data={};
        data.goods_id=goods_id;
        data.field=field;
        data.val=val;
        // console.log(data);return false;
        var url="/admins/chang_goodsname";
        $.ajax({
            url:url,
            type:"post",
            dataType:"json",
            data:data,
            success:function(res){
                if(res.code==200){
                    _this.prev("span").text(val).show();//给这个文本框赋新值
                    _this.hide();
                 
                }
                if(res.code==100){
                    alert(res.msg);
                    location.href=res.url;
                }
            }
        })
    })
    //给是否显示绑定一个点击事件
    $(document).on("click",".is_show",function(){
        var _this=$(this);
        var info=$(this).text();
        if(info=="是"){
            var val=2;
        }else{
            var val=1;
        }
        var goods_id=$(this).parents("tr").attr("goods_id");
        var field=$(this).parent("td").attr("field");
        var data={};
        data.goods_id=goods_id;
        data.field=field
        data.val=val;
        var url="/admins/chang_show";
        $.ajax({
            url:url,
            data:data,
            type:"post",
            dataType:"json",
            success:function(res){
                if(res.code==200){
                    if(info=="是"){
                         _this.text("否");
                    }else{
                        _this.text("是");
                    }
                }
            }
        })

    })
</script>
