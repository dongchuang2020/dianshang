<body>
<div id="pageAll">
    <div class="page">
        <!-- banner页面样式 -->
        <div class="banner">

            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">id</td>

                        <td width="308px" class="tdColor">商品名称</td>
                        <td width="450px" class="tdColor">商品价格</td>
                        <td width="450px" class="tdColor">商品图片</td>
                        <td width="215px" class="tdColor">商品数量</td>
                        <td width="180px" class="tdColor">商品描述</td>
                        <td width="180px" class="tdColor">是否展示</td>
                        <td width="180px" class="tdColor">是否热卖</td>
                        <td width="180px" class="tdColor">是否上架</td>
                        <td width="180px" class="tdColor">是否新品</td>
                        <td width="125px" class="tdColor">操作</td>
                    </tr>
                    @foreach($data as $v)
                    <tr>
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
                        <td>
                            <a href="#" class="btn btn-info" role="button">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>

</body>