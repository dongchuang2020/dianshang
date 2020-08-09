<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>产品列表页</title>
    <link rel="icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="css/pages-list.css" />
    <link rel="stylesheet" type="text/css" href="css/widget-cartPanelView.css" />
</head>

<body>
<!-- 头部栏位 -->
<!--页面顶部-->
<div id="nav-bottom">
    <!--顶部-->
@include('index.ding')
</div>


<!--list-content-->
<div class="main">
    <div class="py-container">
        <!--bread-->

        <!--selector-->

        <!--details-->
        <div class="details">
            <div class="sui-navbar">
            </div>
            <div class="goods-list">
                <ul class="yui3-g">
                    @foreach($goods_res as $k=>$v)
                    <li class="yui3-u-1-5">
                        <div class="list-wrap">
                            <div class="p-img">
                                <a href="{{url('/details/index/'.$v->goods_id)}}"><img src="{{$v->goods_log}}" style="width:204px;height:245px;"/></a>
                            </div>
                            <div class="price">
                                <strong>
                                    <em>¥</em>
                                    <i>{{$v->goods_price}}</i>
                                </strong>
                            </div>
                            <div class="attr">
                                <em>{{$v->goods_name}}</em>
                            </div>
                            <div class="cu">
                                <em><span>促</span>满一件可参加超值换购</em>
                            </div>
                            <div class="commit">
                            </div>
                            <div class="operate">
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="fr page">
                <div class="sui-pagination pagination-large">
                    <ul>
                        <li class="prev disabled">
                            <a href="#">«上一页</a>
                        </li>
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">5</a>
                        </li>
                        <li class="dotted"><span>...</span></li>
                        <li class="next">
                            <a href="#">下一页»</a>
                        </li>
                    </ul>
                    <div><span>共10页&nbsp;</span><span>
      到第
      <input type="text" class="page-num">
      页 <button class="page-confirm" onclick="alert(1)">确定</button></span></div>
                </div>
            </div>
        </div>
        <!--hotsale-->
        <div class="clearfix hot-sale">
            <h4 class="title">热卖商品</h4>
            <div class="hot-list">
                <ul class="yui3-g">
                    <li class="yui3-u-1-4">
                        <div class="list-wrap">
                            <div class="p-img">
                                <img src="img/like_01.png" />
                            </div>
                            <div class="attr">
                                <em>Apple苹果iPhone 6s (A1699)</em>
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
                    <li class="yui3-u-1-4">
                        <div class="list-wrap">
                            <div class="p-img">
                                <img src="img/like_03.png" />
                            </div>
                            <div class="attr">
                                <em>金属A面，360°翻转，APP下单省300！</em>
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
                    <li class="yui3-u-1-4">
                        <div class="list-wrap">
                            <div class="p-img">
                                <img src="img/like_04.png" />
                            </div>
                            <div class="attr">
                                <em>256SSD商务大咖，完爆职场，APP下单立减200</em>
                            </div>
                            <div class="price">
                                <strong>
                                    <em>¥</em>
                                    <i>4068.00</i>
                                </strong>
                            </div>
                            <div class="commit">
                                <i class="command">已有20人评价</i>
                            </div>
                        </div>
                    </li>
                    <li class="yui3-u-1-4">
                        <div class="list-wrap">
                            <div class="p-img">
                                <img src="img/like_02.png" />
                            </div>
                            <div class="attr">
                                <em>Apple苹果iPhone 6s (A1699)</em>
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
<!--侧栏面板开始-->
<!--购物车单元格 模板-->
<script type="text/template" id="tbar-cart-item-template">
    <div class="tbar-cart-item">
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
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $("#service").hover(function() {
            $(".service").show();
        }, function() {
            $(".service").hide();
        });
        $("#shopcar").hover(function() {
            $("#shopcarlist").show();
        }, function() {
            $("#shopcarlist").hide();
        });

    })
</script>
<script type="text/javascript" src="js/model/cartModel.js"></script>
<script type="text/javascript" src="js/czFunction.js"></script>
<script type="text/javascript" src="js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="js/widget/cartPanelView.js"></script>
</body>

</html>