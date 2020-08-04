<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>我的购物车</title>

    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-cart.css" />
</head>

<body>
<!--head-->
@include('index.ding')
<div class="cart py-container">
    <!--logoArea-->

    <!--All goods-->
    <div class="allgoods">
        <h4>全部商品<span>11</span></h4>
        <div class="cart-main">
            <div class="yui3-g cart-th">
                <div class="yui3-u-1-4"><input type="checkbox" name="" id="" value="" /> 全部</div>
                <div class="yui3-u-1-4">商品</div>
                <div class="yui3-u-1-8">单价（元）</div>
                <div class="yui3-u-1-8">数量</div>
                <div class="yui3-u-1-8">小计（元）</div>
                <div class="yui3-u-1-8">操作</div>
            </div>
            <div class="cart-item-list">
                <div class="cart-body">
                    @foreach($cart_data as $v)
                    <div class="cart-list" goods_id="{{$v->goods_id}}">
                        <ul class="goods-list yui3-g">
                            <li class="yui3-u-1-24">
                                <input type="checkbox" class="box" name="" id="" value="" />
                            </li>
                            <li class="yui3-u-11-24">
                                <div class="good-item">
                                    <div class="item-img"><img src="{{$v->goods_log}}"  style="width: 100px;height: 90px"/></div>
                                    <div class="item-msg">{{$v->goods_name}}</div>
                                </div>
                            </li>

                            <li class="yui3-u-1-8"><span class="price">{{$v->goods_price}}</span></li>
                            <li class="yui3-u-1-8" goods_id="{{$v->goods_id}}" goods_num="{{$v->goods_num}}">
                                <a href="javascript:void(0)" class="increment mins" id="less">-</a>
                                <input autocomplete="off" type="text" value="{{$v->buy_number}}" minnum="1" class="itxt" id="buy_number" />
                                <a href="javascript:void(0)" class="increment plus" id="add">+</a>
                            </li>
                            <li class="yui3-u-1-8">
                                <span class="sum" id="total">{{$v->buy_number*$v->goods_price}}</span>
                            </li>
                            <li class="yui3-u-1-8">
                                <a href="#none" id="del">删除</a><br />
                                {{--<a href="#none">移到我的关注</a>--}}
                            </li>
                        </ul>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="cart-tool">
            <div class="select-all">
                <input type="checkbox" name="" id="selectall" value=""  />
                <span>全选</span>
            </div>
            <div class="option">
                <a href="#none" id="delall">删除选中的商品</a>
                {{--<a href="#none">移到我的关注</a>--}}
                {{--<a href="#none">清除下柜商品</a>--}}
            </div>
            <div class="toolbar">
                <div class="chosed">已选择<span>0</span>件商品</div>
                <div class="sumprice">
                    <span><em>总价（不含运费） ：</em><i class="summoney" id="money">¥0</i></span>
                    <span><em>已节省：</em><i>-¥20.00</i></span>
                </div>
                <div class="sumbtn">
                    <a class="sum-btn" id="jiesuan" target="_blank">结算</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- 底部栏位 -->
<!--页面底部-->
<div class="clearfix footer">
    <div class="py-container">
        <div class="footlink">
            <div class="Mod-service">
                <ul class="Mod-Service-list">
                    <li class="grid-service-item intro  intro1">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item  intro intro2">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item intro  intro3">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item  intro intro4">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item intro intro5">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                </ul>
            </div>
            <div class="clearfix Mod-list">
                <div class="yui3-g">
                    <div class="yui3-u-1-6">
                        <h4>购物指南</h4>
                        <ul class="unstyled">
                            <li>购物流程</li>
                            <li>会员介绍</li>
                            <li>生活旅行/团购</li>
                            <li>常见问题</li>
                            <li>购物指南</li>
                        </ul>

                    </div>
                    <div class="yui3-u-1-6">
                        <h4>配送方式</h4>
                        <ul class="unstyled">
                            <li>上门自提</li>
                            <li>211限时达</li>
                            <li>配送服务查询</li>
                            <li>配送费收取标准</li>
                            <li>海外配送</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>支付方式</h4>
                        <ul class="unstyled">
                            <li>货到付款</li>
                            <li>在线支付</li>
                            <li>分期付款</li>
                            <li>邮局汇款</li>
                            <li>公司转账</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>售后服务</h4>
                        <ul class="unstyled">
                            <li>售后政策</li>
                            <li>价格保护</li>
                            <li>退款说明</li>
                            <li>返修/退换货</li>
                            <li>取消订单</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>特色服务</h4>
                        <ul class="unstyled">
                            <li>夺宝岛</li>
                            <li>DIY装机</li>
                            <li>延保服务</li>
                            <li>品优购E卡</li>
                            <li>品优购通信</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>帮助中心</h4>
                        <img src="img/wx_cz.jpg">
                    </div>
                </div>
            </div>
            <div class="Mod-copyright">
                <ul class="helpLink">
                    <li>关于我们<span class="space"></span></li>
                    <li>联系我们<span class="space"></span></li>
                    <li>关于我们<span class="space"></span></li>
                    <li>商家入驻<span class="space"></span></li>
                    <li>营销中心<span class="space"></span></li>
                    <li>友情链接<span class="space"></span></li>
                    <li>关于我们<span class="space"></span></li>
                    <li>营销中心<span class="space"></span></li>
                    <li>友情链接<span class="space"></span></li>
                    <li>关于我们</li>
                </ul>
                <p>地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</p>
                <p>京ICP备08001421号京公网安备110108007702</p>
            </div>
        </div>
    </div>
</div>
<!--页面底部END-->

<script type="text/javascript" src="/index/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/index/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/index/sui/sui.min.js"></script>
<script type="text/javascript" src="/index/js/widget/nav.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</body>

</html>
<script>
    //点击加号
    $(document).on('click','#add',function () {
        var buy_number = parseInt($(this).prev().val());
        var goods_id = parseInt($(this).parent('li').attr('goods_id'));
        var goods_num = parseInt($(this).parent('li').attr('goods_num'));
        var name = null;
        var _this = $(this);
        if(buy_number>=goods_num){
            $(this).prev('input').val(goods_num)
        }else{
            buy_number = buy_number+1
            $(this).prev('input').val(buy_number)
        }
       //改变文本框的值
        checknum(goods_id,buy_number);
        //给当前复选框选中
        getCheckbox(_this);
        //获取小计
        var url = '/index/total';
        $.ajax({
            data:{'goods_id':goods_id},
            url:url,
            type:'post',
            async: false,
            success:function (res) {
                name = res;
            }
        })
        $(this).parent('li').next('li').children('span').text(name);
        //获取总价
        getPrice();
    });
    //点击减号
    $(document).on('click','#less',function () {
        var buy_number = parseInt($(this).next().val());
        var goods_id = parseInt($(this).parent('li').attr('goods_id'));
        var goods_num = parseInt($(this).parent('li').attr('goods_num'));
        var name = null;
        var _this = $(this);
        if(buy_number<=1){
            _this.next('input').val(1)
        }else{
            buy_number = buy_number-1;
            _this.next('input').val(buy_number);
        }
        //改变文本框的值
        checknum(goods_id,buy_number);
        //给当前复选框选中
        getCheckbox(_this);
        //获取小计
        var url = '/index/total';
        $.ajax({
            data:{'goods_id':goods_id},
            url:url,
            type:'post',
            async: false,
            success:function (res) {
                name = res;
            }
        })
        $(this).parent('li').next('li').children('span').text(name);
        //获取总价
        getPrice();
    });
    //失去焦点
    $(document).on('blur','#buy_number',function () {
        var _this = $(this);
        var buy_number = _this.val();
        var goods_id = parseInt($(this).parent('li').attr('goods_id'));
        var goods_num = parseInt($(this).parent('li').attr('goods_num'));
        var reg = /^\d+$/;
        if(!reg.test(parseInt(buy_number))||parseInt(buy_number)<=0){
            buy_number =1;
            _this.val(buy_number);
        }else if(parseInt(buy_number)>=parseInt(goods_num)){
            buy_number = goods_num;
            _this.val(buy_number);

        }else{
            buy_number = parseInt(buy_number);
            _this.val(buy_number);
        }
        //改变文本框的值
        checknum(goods_id,buy_number);
        //给当前复选框选中
        getCheckbox(_this);
        //获取小计
        var url = '/index/total';
        $.ajax({
            data:{'goods_id':goods_id},
            url:url,
            type:'post',
            async: false,
            success:function (res) {
                name = res;
            }
        });
        $(this).parent('li').next('li').children('span').text(name);
        //获取总价
        getPrice();
    });
    //点击复选框
    $(document).on('click','.box',function () {
        getPrice();
    });
    //点击删除
    $(document).on('click','#del',function () {
        var goods_id = $(this).parents('div').attr('goods_id');
        var url = '/index/delcart';
        $.ajax({
            data:{'goods_id':goods_id},
            url:url,
            type:'get',
            dataType:'json',
            success:function (res) {
                if(res.code == '00000'){
                    window.location.reload();
                }else{
                    alert(res.msg)
                }
            }
        });
    });
    //点击删除选中的商品
    $(document).on('click','#delall',function () {
        var goods_id = '';
        $("input[class='box']:checked").each(function (index) {
            goods_id += $(this).parents('div').attr('goods_id')+',';
        });
        goods_id = goods_id.substr(0,goods_id.length-1);
        var url = '/index/delall';
        $.ajax({
            data:{'goods_id':goods_id},
            url:url,
            type:'post',
            dataType:'json',
            success:function (res) {
                if(res.code == '00000'){
                    window.location.reload();
                }else{
                    alert(res.msg)
                }
            }
        });
    });
    //点击全选
    $(document).on('click','#selectall',function () {
        var status = $(this).prop('checked');
        $(".box").prop('checked',status);
        getPrice();
    });
    //改变文本框的值
    function checknum(goods_id,buy_number) {
        var url = '/index/checknum';
        $.ajax({
            url:url,
            data:{"goods_id":goods_id,"buy_number":buy_number},
            type:'post',
            dataType:'json',
            success:function (res) {
//                console.log(res)
            }
        })
    }
    //给当前点击复选框选中
    function getCheckbox(_this) {
        _this.parents('ul').find("input[class='box']").prop('checked',true);
    }
    //获取总价
    function getPrice() {
        var goods_id = '';
        var _box = $("input[class='box']:checked").each(function (index) {
            goods_id += $(this).parents('div').attr('goods_id')+',';
        })
        goods_id = goods_id.substr(0,goods_id.length-1,goods_id);
        var url = '/index/getprice';
        $.ajax({
            data:{'goods_id':goods_id},
            url:url,
            type:'get',
            dataType:'json',
            success:function (res) {
                $('#money').text(res)
            }
        });
    }
    //结算
    $(document).on('click','#jiesuan',function () {
        var goods_id = '';
        $("input[class='box']:checked").each(function (index) {
            goods_id += $(this).parents('div').attr('goods_id')+',';
        });
        goods_id = goods_id.substr(0,goods_id.length-1);
        if (goods_id) {
            window.location.href = "/orderadd?goods_id=" + goods_id;
        }else {
            alert('请选择商品');
        }

    })
</script>