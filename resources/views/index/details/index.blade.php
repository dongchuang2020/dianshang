<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>产品详情页</title>
    <link rel="icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-item.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-zoom.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/widget-cartPanelView.css" />
</head>

<body>
<!-- 头部栏位 -->
<!--页面顶部-->
<div id="nav-bottom">
    <!--顶部-->
    @include('index.ding')
</div>

<div class="py-container">
    <div id="item">
        <!--product-info-->
        <div class="product-info">
            <div class="fl preview-wrap">
                <!--放大镜效果-->
                <div class="zoom">
                    <!--默认第一个预览-->
                    <div id="preview" class="spec-preview">
                        <span class="jqzoom"><img jqimg="index/img/_/b1.png" src="{{$res->goods_log}}" style="width:400px; height:400px;" /></span>
                    </div>
                    <!--下方的缩略图-->
                    <div class="spec-scroll">
                        <a class="prev">&lt;</a>
                        <!--左右按钮-->
                        <div class="items">
                            <ul>
                                <li><img src="{{$res->goods_log}}" bimg="img/_/b1.png" onmousemove="preview(this)" /></li>
                                @foreach($goods_imgs_res as $k=>$v)
                                <li><img src="{{$v->goods_imgs}}" bimg="img/_/b1.png" onmousemove="preview(this)" /></li>
                                @endforeach
                            </ul>
                        </div>
                        <a class="next">&gt;</a>
                    </div>
                </div>
            </div>
            <div class="fr itemInfo-wrap">
                <div class="sku-name">
                    <h4>{{$res->goods_name}}</h4>
                </div>
                <div class="summary">
                    <div class="summary-wrap">
                        <div class="fl title">
                            <i>价　　格</i>
                        </div>
                        <div class="fl price">
                            <i>¥</i>
                            <em><span id="goods_price">{{$res->goods_price}}</span></em>
                        </div>
                        <div class="fr remark">
                            <i>累计评价</i><em>612188</em>
                        </div>
                    </div>
                    <div class="summary-wrap">
                        <div class="fl title">
                            <i>库　　存</i>
                        </div>
                        <div class="fl price">
                            <span id="goods_num">{{$res->goods_num}}</span>
                        </div>
                    </div>

                </div>
                <div class="support">
                    <div class="summary-wrap">
                        <div class="fl title">
                            <i>slogan</i>
                        </div>
                        <div class="fl fix-width">
                            <em class="t-gray">{{$res->goods_desc}}</em>
                        </div>
                    </div>

                </div>
                <div class="clearfix choose">
                    <div id="specification" class="summary-wrap clearfix">
                        @foreach($da as $k=>$v)
                        <dl>

                            <dt>
                            <div class="fl title">
                                <i class="sku_name">{{$v->name ?? ''}}</i>
                            </div>
                            </dt>
                            @foreach($data as $kk=>$vv)
                                @if($v->sid ?? ''==$vv->sid)
                                    <dd a_id="{{$vv['a_id']}}"><a href="javascript:;"  class="" id="aa" name="yangshi" a_id="{{$vv['a_id']}}">{{$vv->a_name}}<span title="点击取消选择">&nbsp;</span></a></dd>
                                @endif
                            @endforeach
                        </dl>
                        @endforeach

                            @if($info==null)
                                <span id="col" goods_id="{{$res->goods_id}}" >收 藏</span>
                                <span id="del" goods_id="{{$res->goods_id}}" style="display: none">取消收藏</span>
                            @else
                                <span id="col" goods_id="{{$res->goods_id}}" style="display: none">收 藏</span>
                                <span id="del" goods_id="{{$res->goods_id}}"  >取消收藏</span>
                            @endif
                    </div>

                    <div class="summary-wrap">
                        <div class="fl title">
                            <form action="{{url('/index/addcart')}}" method="get">
                                <input type="hidden" name="goods_id" value="{{$res->goods_id}}">
                            <div class="control-group">
                                <div class="controls">
                                    <input autocomplete="off" type="text" value="1" minnum="1" class="itxt" id="buy_number" name="buy_number"/>
                                    <a href="javascript:void(0)" id="add" class="increment plus">+</a>
                                    <a href="javascript:void(0)" id="less" class="increment mins">-</a>
                                </div>
                                <button target="_blank" class="sui-btn  btn-danger addshopcar">加入购物车</button>
                                {{--<a href="#" target="_blank" class="sui-btn  btn-danger addshopcar">加入购物车</a>--}}
                            </div>

                            </form>
                        </div>
                        <div class="fl">
                            <ul class="btn-choose unstyled">
                                <li>

                                    <a href="" target="_blank" class="sui-btn  btn-danger addshopcar">立即购买</a>
                                    <a href="{{url('/details/comment/'.$res->goods_id)}}"  class="sui-btn  btn-danger addshopcar">留言</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix product-detail">
            <div class="fl aside">
                <ul class="sui-nav nav-tabs tab-wraped">
                    <li class="active">
                        <a href="#index" data-toggle="tab">
                            <span>相关分类</span>
                        </a>
                    </li>
                    <li>
                        <a href="#profile" data-toggle="tab">
                            <span>推荐品牌</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content tab-wraped">
                    <div id="index" class="tab-pane active">
                        <ul class="part-list unstyled">
                            <li>手机</li>
                            <li>手机壳</li>
                            <li>内存卡</li>
                            <li>Iphone配件</li>
                            <li>贴膜</li>
                            <li>手机耳机</li>
                            <li>移动电源</li>
                            <li>平板电脑</li>
                        </ul>
                        <ul class="goods-list unstyled">
                            <li>
                                <div class="list-wrap">
                                    <div class="p-img">
                                        <img src="/index/img/_/part01.png" />
                                    </div>
                                    <div class="attr">
                                        <em>Apple苹果iPhone 6s (A1699)</em>
                                    </div>
                                    <div class="price">
                                        <strong>
                                            <em>¥</em>
                                            <i>6088.00</i>
                                        </strong>
                                    </div>
                                    <div class="operate">
                                        <a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="list-wrap">
                                    <div class="p-img">
                                        <img src="/index/img/_/part02.png" />
                                    </div>
                                    <div class="attr">
                                        <em>Apple苹果iPhone 6s (A1699)</em>
                                    </div>
                                    <div class="price">
                                        <strong>
                                            <em>¥</em>
                                            <i>6088.00</i>
                                        </strong>
                                    </div>
                                    <div class="operate">
                                        <a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="list-wrap">
                                    <div class="p-img">
                                        <img src="/index/img/_/part03.png" />
                                    </div>
                                    <div class="attr">
                                        <em>Apple苹果iPhone 6s (A1699)</em>
                                    </div>
                                    <div class="price">
                                        <strong>
                                            <em>¥</em>
                                            <i>6088.00</i>
                                        </strong>
                                    </div>
                                    <div class="operate">
                                        <a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
                                    </div>
                                </div>
                                <div class="list-wrap">
                                    <div class="p-img">
                                        <img src="/index/img/_/part02.png" />
                                    </div>
                                    <div class="attr">
                                        <em>Apple苹果iPhone 6s (A1699)</em>
                                    </div>
                                    <div class="price">
                                        <strong>
                                            <em>¥</em>
                                            <i>6088.00</i>
                                        </strong>
                                    </div>
                                    <div class="operate">
                                        <a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
                                    </div>
                                </div>
                                <div class="list-wrap">
                                    <div class="p-img">
                                        <img src="/index/img/_/part03.png" />
                                    </div>
                                    <div class="attr">
                                        <em>Apple苹果iPhone 6s (A1699)</em>
                                    </div>
                                    <div class="price">
                                        <strong>
                                            <em>¥</em>
                                            <i>6088.00</i>
                                        </strong>
                                    </div>
                                    <div class="operate">
                                        <a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="profile" class="tab-pane">
                        <p>推荐品牌</p>
                    </div>
                </div>
            </div>
            <div class="fr detail">
                <div class="clearfix fitting">
                    <h4 class="kt">选择搭配</h4>
                    <div class="good-suits">
                        <div class="fl master">
                            <div class="list-wrap">
                                <div class="p-img">
                                    <img src="/index/img/_/l-m01.png" />
                                </div>
                                <em>￥5299</em>
                                <i>+</i>
                            </div>
                        </div>
                        <div class="fl suits">
                            <ul class="suit-list">
                                <li class="">
                                    <div id="">
                                        <img src="/index/img/_/dp01.png" />
                                    </div>
                                    <i>Feless费勒斯VR</i>
                                    <label data-toggle="checkbox" class="checkbox-pretty">
                                        <input type="checkbox"><span>39</span>
                                    </label>
                                </li>
                                <li class="">
                                    <div id=""><img src="/index/img/_/dp02.png" /> </div>
                                    <i>Feless费勒斯VR</i>
                                    <label data-toggle="checkbox" class="checkbox-pretty">
                                        <input type="checkbox"><span>50</span>
                                    </label>
                                </li>
                                <li class="">
                                    <div id=""><img src="/index/img/_/dp03.png" /></div>
                                    <i>Feless费勒斯VR</i>
                                    <label data-toggle="checkbox" class="checkbox-pretty">
                                        <input type="checkbox"><span>59</span>
                                    </label>
                                </li>
                                <li class="">
                                    <div id=""><img src="/index/img/_/dp04.png" /></div>
                                    <i>Feless费勒斯VR</i>
                                    <label data-toggle="checkbox" class="checkbox-pretty">
                                        <input type="checkbox"><span>99</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="fr result">
                            <div class="num">已选购0件商品</div>
                            <div class="price-tit"><strong>套餐价</strong></div>
                            <div class="price">￥5299</div>
                            <button class="sui-btn  btn-danger addshopcar">加入购物车</button>
                        </div>
                    </div>
                </div>
                <div class="tab-main intro">
                    <ul class="sui-nav nav-tabs tab-wraped">
                        <li class="active">
                            <a href="#one" data-toggle="tab">
                                <span>商品介绍</span>
                            </a>
                        </li>
                        <li>
                            <a href="#two" data-toggle="tab">
                                <span>规格与包装</span>
                            </a>
                        </li>
                        <li>
                            <a href="#three" data-toggle="tab">
                                <span>售后保障</span>
                            </a>
                        </li>
                        <li>
                            <a href="#four" data-toggle="tab">
                                <span>商品评价</span>
                            </a>
                        </li>
                        <li>
                            <a href="#five" data-toggle="tab">
                                <span>手机社区</span>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="tab-content tab-wraped">
                        <div id="one" class="tab-pane active">
                            <ul class="goods-intro unstyled">
                                <li>分辨率：1920*1080(FHD)</li>
                                <li>后置摄像头：1200万像素</li>
                                <li>前置摄像头：500万像素</li>
                                <li>核 数：其他</li>
                                <li>频 率：以官网信息为准</li>
                                <li>品牌： Apple</li>
                                <li>商品名称：APPLEiPhone 6s Plus</li>
                                <li>商品编号：1861098</li>
                                <li>商品毛重：0.51kg</li>
                                <li>商品产地：中国大陆</li>
                                <li>热点：指纹识别，Apple Pay，金属机身，拍照神器</li>
                                <li>系统：苹果（IOS）</li>
                                <li>像素：1000-1600万</li>
                                <li>机身内存：64GB</li>
                            </ul>
                            <div class="intro-detail">
                                <img src="/index/img/_/intro01.png" />
                                <img src="/index/img/_/intro02.png" />
                                <img src="/index/img/_/intro03.png" />
                            </div>
                        </div>
                        <div id="two" class="tab-pane">
                            <p>规格与包装</p>
                        </div>
                        <div id="three" class="tab-pane">
                            <p>售后保障</p>
                        </div>
                        <div id="four" class="tab-pane">
                            @foreach($comment_res as $k=>$v)
                            <ul class="goods-intro unstyled">
                            <li>用户名：{{$v->user}}&nbsp;&nbsp;{{date("Y-m-d H:i:s",$v->add_time)}}</li>
                                    <li> 评价内容：<p><textarea cols="30" rows="10">{{$v->comment}}</textarea></p></li>
                            </ul>
                            @endforeach
                        </div>
                        <div id="five" class="tab-pane">
                            <p>手机社区</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--like-->
        <div class="clearfix"></div>
        <div class="like">
            <h4 class="kt">猜你喜欢</h4>
            <div class="like-list">
                <ul class="yui3-g">
                    <li class="yui3-u-1-6">
                        <div class="list-wrap">
                            <div class="p-img">
                                <img src="/index/img/_/itemlike01.png" />
                            </div>
                            <div class="attr">
                                <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                            </div>
                            <div class="price">
                                <strong>
                                    <em>¥</em>
                                    <i>3699.00</i>
                                </strong>
                            </div>
                            <div class="commit">
                                <i class="command">已有6人评价</i>
                            </div>
                        </div>
                    </li>
                    <li class="yui3-u-1-6">
                        <div class="list-wrap">
                            <div class="p-img">
                                <img src="/index/img/_/itemlike02.png" />
                            </div>
                            <div class="attr">
                                <em>Apple苹果iPhone 6s/6s Plus 16G 64G 128G</em>
                            </div>
                            <div class="price">
                                <strong>
                                    <em>¥</em>
                                    <i>4388.00</i>
                                </strong>
                            </div>
                            <div class="commit">
                                <i class="command">已有700人评价</i>
                            </div>
                        </div>
                    </li>
                    <li class="yui3-u-1-6">
                        <div class="list-wrap">
                            <div class="p-img">
                                <img src="/index/img/_/itemlike03.png" />
                            </div>
                            <div class="attr">
                                <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                            </div>
                            <div class="price">
                                <strong>
                                    <em>¥</em>
                                    <i>4088.00</i>
                                </strong>
                            </div>
                            <div class="commit">
                                <i class="command">已有700人评价</i>
                            </div>
                        </div>
                    </li>
                    <li class="yui3-u-1-6">
                        <div class="list-wrap">
                            <div class="p-img">
                                <img src="/index/img/_/itemlike04.png" />
                            </div>
                            <div class="attr">
                                <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                            </div>
                            <div class="price">
                                <strong>
                                    <em>¥</em>
                                    <i>4088.00</i>
                                </strong>
                            </div>
                            <div class="commit">
                                <i class="command">已有700人评价</i>
                            </div>
                        </div>
                    </li>
                    <li class="yui3-u-1-6">
                        <div class="list-wrap">
                            <div class="p-img">
                                <img src="/index/img/_/itemlike05.png" />
                            </div>
                            <div class="attr">
                                <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                            </div>
                            <div class="price">
                                <strong>
                                    <em>¥</em>
                                    <i>4088.00</i>
                                </strong>
                            </div>
                            <div class="commit">
                                <i class="command">已有700人评价</i>
                            </div>
                        </div>
                    </li>
                    <li class="yui3-u-1-6">
                        <div class="list-wrap">
                            <div class="p-img">
                                <img src="/index/img/_/itemlike06.png" />
                            </div>
                            <div class="attr">
                                <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                            </div>
                            <div class="price">
                                <strong>
                                    <em>¥</em>
                                    <i>4088.00</i>
                                </strong>
                            </div>
                            <div class="commit">
                                <i class="command">已有700人评价</i>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
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
                        <img src="/index/img/wx_cz.jpg">
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

<!--侧栏面板开始-->
<!--购物车单元格 模板-->
<script type="text/template" id="tbar-cart-item-template">
    <div class="tbar-cart-item" >
        <div class="jtc-item-promo">
            <em class="promo-tag promo-mz">满赠<i class="arrow"></i></em>
            <div class="promo-text">已购满600元，您可领赠品</div>
        </div>
        <div class="jtc-item-goods">
            <span class="p-img"><a href="#" target="_blank"><img src="{2}" alt="{1}" height="50" width="50" /></a></span>
            <div class="p-name">
                <a href="#">{1}</a>
            </div>
            <div class="p-price"><strong>¥{3}</strong>×{4} </div>
            <a href="#none" class="p-del J-del">删除</a>
        </div>
    </div>
</script>
<!--侧栏面板结束-->


<script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#service").hover(function(){
            $(".service").show();
        },function(){
            $(".service").hide();
        });
        $("#shopcar").hover(function(){
            $("#shopcarlist").show();
        },function(){
            $("#shopcarlist").hide();
        });

    })
</script>
<script type="text/javascript" src="/index/js/model/cartModel.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery.jqzoom/jquery.jqzoom.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery.jqzoom/zoom.js"></script>
<script type="text/javascript" src="/index/index.js"></script>
</body>

</html>
<script>
    $(document).on('click','#col',function () {
        var goods_id = $(this).attr('goods_id');
        var url = '/index/collect';
        $.ajax({
            data:{'goods_id':goods_id},
            url:url,
            type:'post',
            dataType:'json',
            success:function (res) {
                if(res.code == '00000'){
                    alert(res.msg);
                    $("#col").hide();
                    $("#col").next().show();
                }
                if(res.code == '00001'){
                    alert(res.msg);
                    window.location.href = '/index/log';
                }
                if(res.code == '00002') {
                    alert(res.msg);
                }
                if(res == '·1'){
                    alert('请登录')
                    window.location.href = '/index/log';
                }
                if(res == '·2'){
                    alert('商品已收藏')
                    $("#col").hide();
                    $("#col").next().show();
                }
                if(res == '·3'){
                    alert("收藏成功")
                    $("#col").hide();
                    $("#col").next().show();
                }
                if(res == '·4'){
                    alert('收藏失败')
                }
            }
        });
    })
    $(document).on('click','#del',function () {
        var goods_id = $(this).attr('goods_id');
        var url = '/index/del_collect';
        $.ajax({
            data:{'goods_id':goods_id},
            url:url,
            type:'get',
           // dataType:'json',
            success:function (res) {
               if(res.code == '00000'){
                   alert(res.msg)
                   $("#del").hide();
                   $("#del").prev().show();
               }
                if(res.code == '00001'){
                    alert(res.msg)
                    window.location.href = '/index/log';
                }
                if(res.code == '00002'){
                    alert(res.msg)
                }
            }
        });

    })
</script>
<script src="/jquery.js"></script>
<script>
//    $(document).on('click','#but',function () {
//        var goods_id = $(this).attr('goods_id');
//        var buy_number = $('#buy_number').val();
//
//        var url = 'index/addcart';
//        $.ajax({
//            data:{'goods_id':goods_id,'buy_number':buy_number},
//            type:'get',
//            dataType:'json',
//            success:function (res) {
//                console.log(res)
//            }
//        });
//        return false;
//    })
</script>
<script>
    $(document).ready(function(){
        //购买数量加一
        $(document).on("click","#add",function(){
            var buy_number=parseInt($("#buy_number").val());
            var goods_num=parseInt($("#goods_num").text());
            if(buy_number>=goods_num){
                $("#buy_number").val(goods_num);
            }else{
                var buy_number=buy_number+1;
                $("#buy_number").val(buy_number);
            }
        });
        //购买数量减一
        $(document).on("click","#less",function(){
            var buy_number=parseInt($("#buy_number").val());
            var goods_num=parseInt($("#goods_num").text());
            if(buy_number<=1){
                $("#buy_number").val(1);
            }else{
                var buy_number=buy_number-1;
                $("#buy_number").val(buy_number);
            }
        });
        $(document).on("blur","#buy_number",function(){
            var buy_number=$("#buy_number").val();
            var goods_num=parseInt($("#goods_num").text());
            var reg=/^\d+$/;
            if(buy_number==""){
                $("#buy_number").val(1);
            }else if(!reg.test(buy_number)){
                $("#buy_number").val(1);
            }else if(parseInt(buy_number)<1){
                $("#buy_number").val(1);
            }else if(parseInt(buy_number)>=goods_num){
                $("#buy_number").val(goods_num);
            }else{
                $("#buy_number").val(parseInt(buy_number));
            }
        });
        $(document).on("click","#aa",function(){
//            console.log(44);return false;
            var _this=$(this);
            _this.parents('dl').find("[name='yangshi']").prop("class",'');
            _this.prop("class",'selected');
//            return false;
//            var a_id= new Array();
//            $(".selected").each(function(res){
//                a_id.push($(this).attr('a_id'));
//            });
//            var sku_name=$(".sku_name").length;
//            var selected=$(".selected").length;
////            console.log(sku_name);
//            var data={};
//            data.a_id=a_id;
//            var url="/details/goodsSku";
//            if(sku_name==selected){
//                $.ajax({
//                   url:url,
//                   type:'post',
//                    data:data,
//                    dataType:'json',
//                    success:function(msg){
//                        if(msg.status==200){
//                            $('.goods_price').text(msg.message);
//                        }else{
//                            $('.goods_price').text('该型号商品已售空 请看看其他商品');
//                        }
//                    }
//                });
//            }
        });
    });
</script>