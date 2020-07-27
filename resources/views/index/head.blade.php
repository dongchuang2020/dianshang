<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>品优购，优质！优质！</title>
    <link rel="icon" href="assets/index/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="index/css/pages-JD-index.css" />
    <link rel="stylesheet" type="text/css" href="index/css/widget-jquery.autocomplete.css" />
    <link rel="stylesheet" type="text/css" href="index/css/widget-cartPanelView.css" />
    <style>
        .tou1{
            width:260px;
            height:180px;
        }
        .tou2{
            width: 260px;
            height: 360px;
        }
        .tuo3{
            width: 300px;
            height: 150px;
        }
        .tou4{
            width: 260px;
            height: 276px;
        }
    </style>
</head>

<body>
<!-- 头部栏位 -->
<!--页面顶部-->
<div id="nav-bottom">
    <!--顶部-->
    <div class="nav-top">
        <div class="top">
            <div class="py-container">
                <div class="shortcut">
                    <ul class="fl">
                        <li class="f-item">品优购欢迎您！</li>
                        <li class="f-item">请<a href="login.html" target="_blank">登录</a>　<span><a href="register.html" target="_blank">免费注册</a></span></li>
                    </ul>
                    <ul class="fr">
                        <li class="f-item">我的订单</li>
                        <li class="f-item space"></li>
                        <li class="f-item"><a href="home.html" target="_blank">我的品优购</a></li>
                        <li class="f-item space"></li>
                        <li class="f-item">品优购会员</li>
                        <li class="f-item space"></li>
                        <li class="f-item">企业采购</li>
                        <li class="f-item space"></li>
                        <li class="f-item">关注品优购</li>
                        <li class="f-item space"></li>
                        <li class="f-item" id="service">
                            <span>客户服务</span>
                            <ul class="service">
                                <li><a href="cooperation.html" target="_blank">合作招商</a></li>
                                <li><a href="shoplogin.html" target="_blank">商家后台</a></li>
                                <li><a href="cooperation.html" target="_blank">合作招商</a></li>
                                <li><a href="#">商家后台</a></li>
                            </ul>
                        </li>
                        <li class="f-item space"></li>
                        <li class="f-item">网站导航</li>
                    </ul>
                </div>
            </div>
        </div>

        <!--头部-->
        <div class="header">
            <div class="py-container">
                <div class="yui3-g Logo">
                    <div class="yui3-u Left logoArea">
                        <a class="logo-bd" title="品优购" href="JD-index.html" target="_blank"></a>
                    </div>
                    <div class="yui3-u Center searchArea">
                        <div class="search">
                            <form action="" class="sui-form form-inline">
                                <!--searchAutoComplete-->
                                <div class="input-append">
                                    <input type="text" id="autocomplete" type="text" class="input-error input-xxlarge" />
                                    <button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
                                </div>
                            </form>
                        </div>
                        <div class="hotwords">
                            <ul>
                                <li class="f-item">品优购首发</li>
                                <li class="f-item">亿元优惠</li>
                                <li class="f-item">9.9元团购</li>
                                <li class="f-item">每满99减30</li>
                                <li class="f-item">亿元优惠</li>
                                <li class="f-item">9.9元团购</li>
                                <li class="f-item">办公用品</li>

                            </ul>
                        </div>
                    </div>
                    <div class="yui3-u Right shopArea">
                        <div class="fr shopcar">
                            <div class="show-shopcar" id="shopcar">
                                <span class="car"></span>
                                <a class="sui-btn btn-default btn-xlarge" href="cart.html" target="_blank">
                                    <span>我的购物车</span>
                                    <i class="shopnum">0</i>
                                </a>
                                <div class="clearfix shopcarlist" id="shopcarlist" style="display:none">
                                    <p>"啊哦，你的购物车还没有商品哦！"</p>
                                    <p>"啊哦，你的购物车还没有商品哦！"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="yui3-g NavList">
                    <div class="yui3-u Left all-sort">
                        <h4>全部商品分类</h4>
                    </div>
                    <div class="yui3-u Center navArea">
                        <ul class="nav">
                            <li class="f-item">服装城</li>
                            <li class="f-item">美妆馆</li>
                            <li class="f-item">品优超市</li>
                            <li class="f-item">全球购</li>
                            <li class="f-item">闪购</li>
                            <li class="f-item">团购</li>
                            <li class="f-item">有趣</li>
                            <li class="f-item"><a href="seckill-index.html" target="_blank">秒杀</a></li>
                        </ul>
                    </div>
                    <div class="yui3-u Right"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--列表-->
<div class="sort">
    <div class="py-container">
        <div class="yui3-g SortList ">
            <div class="yui3-u Left all-sort-list">
                <div class="all-sort-list2">
                    <div class="item bo">
                        <h3><a href="">图书、音像、数字商品</a></h3>
                        <div class="item-list clearfix">
                            <div class="subitem">
                                <dl class="fore1">
                                    <dt><a href="">电子书</a></dt>
                                    <dd><a href="">免费</a><a href="">小说</a></em><a href="">励志与成功</a><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
                                </dl>
                                <dl class="fore2">
                                    <dt><a href="">数字音乐</a></dt>
                                    <dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
                                </dl>
                                <dl class="fore3">
                                    <dt><a href="">音像</a></dt>
                                    <dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
                                </dl>
                                <dl class="fore4">
                                    <dt>文艺</dt>
                                    <dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
                                </dl>
                                <dl class="fore5">
                                    <dt>人文社科</dt>
                                    <dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
                                </dl>
                                <dl class="fore6">
                                    <dt>经管励志</dt>
                                    <dd><em><a href="">经济</a></em><em><a href="">金融与投资</a></em><em><a href="">管理</a></em><em><a href="">励志与成功</a></em></dd>
                                </dl>
                                <dl class="fore7">
                                    <dt>生活</dt>
                                    <dd><em><a href="">家庭与育儿</a></em><em><a href="">旅游/地图</a></em><em><a href="">烹饪/美食</a></em><em><a href="">时尚/美妆</a></em><em><a href="">家居</a></em><em><a href="">婚恋与两性</a></em><em><a href="">娱乐/休闲</a></em><em><a href="">健身与保健</a></em><em><a href="">动漫/幽默</a></em><em><a href="">体育/运动</a></em></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <h3><a href="">家用电器</a></h3>
                        <div class="item-list clearfix">
                            <div class="subitem">
                                <dl class="fore1">
                                    <dt><a href="">电子书1</a></dt>
                                    <dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
                                </dl>
                                <dl class="fore2">
                                    <dt><a href="">数字音乐</a></dt>
                                    <dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
                                </dl>
                                <dl class="fore3">
                                    <dt><a href="">音像</a></dt>
                                    <dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
                                </dl>
                                <dl class="fore4">
                                    <dt>文艺</dt>
                                    <dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
                                </dl>
                                <dl class="fore5">
                                    <dt>人文社科</dt>
                                    <dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
                                </dl>
                                <dl class="fore6">
                                    <dt>经管励志</dt>
                                    <dd><em><a href="">经济</a></em><em><a href="">金融与投资</a></em><em><a href="">管理</a></em><em><a href="">励志与成功</a></em></dd>
                                </dl>
                                <dl class="fore7">
                                    <dt>生活</dt>
                                    <dd><em><a href="">家庭与育儿</a></em><em><a href="">旅游/地图</a></em><em><a href="">烹饪/美食</a></em><em><a href="">时尚/美妆</a></em><em><a href="">家居</a></em><em><a href="">婚恋与两性</a></em><em><a href="">娱乐/休闲</a></em><em><a href="">健身与保健</a></em><em><a href="">动漫/幽默</a></em><em><a href="">体育/运动</a></em></dd>
                                </dl>
                                <dl class="fore8">
                                    <dt>科技</dt>
                                    <dd><em><a href="">科普</a></em><em><a href="">IT</a></em><em><a href="">建筑</a></em><em><a href="">医学</a></em><em><a href="">工业技术</a></em><em><a href="">电子/通信</a></em><em><a href="">农林</a></em><em><a href="">科学与自然</a></em></dd>
                                </dl>
                                <dl class="fore9">
                                    <dt>少儿</dt>
                                    <dd><em><a href="">少儿</a></em><em><a href="">0-2岁</a></em><em><a href="">3-6岁</a></em><em><a href="">7-10岁</a></em><em><a href="">11-14岁</a></em></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <h3><a href="">手机、数码</a></h3>
                        <div class="item-list clearfix">
                            <div class="subitem">
                                <dl class="fore1">
                                    <dt><a href="">电子书2</a></dt>
                                    <dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
                                </dl>
                                <dl class="fore2">
                                    <dt><a href="">数字音乐</a></dt>
                                    <dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
                                </dl>
                                <dl class="fore3">
                                    <dt><a href="">音像</a></dt>
                                    <dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
                                </dl>
                                <dl class="fore4">
                                    <dt>文艺</dt>
                                    <dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
                                </dl>
                                <dl class="fore5">
                                    <dt>人文社科</dt>
                                    <dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <h3><a href="">电脑、办公</a></h3>
                        <div class="item-list clearfix">
                            <div class="subitem">
                                <dl class="fore1">
                                    <dt><a href="">电子书3</a></dt>
                                    <dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
                                </dl>
                                <dl class="fore2">
                                    <dt><a href="">数字音乐</a></dt>
                                    <dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
                                </dl>
                                <dl class="fore3">
                                    <dt><a href="">音像</a></dt>
                                    <dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
                                </dl>
                                <dl class="fore4">
                                    <dt>文艺</dt>
                                    <dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
                                </dl>
                                <dl class="fore5">
                                    <dt>人文社科</dt>
                                    <dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
                                </dl>
                                <dl class="fore6">
                                    <dt>经管励志</dt>
                                    <dd><em><a href="">经济</a></em><em><a href="">金融与投资</a></em><em><a href="">管理</a></em><em><a href="">励志与成功</a></em></dd>
                                </dl>
                                <dl class="fore7">
                                    <dt>生活</dt>
                                    <dd><em><a href="">家庭与育儿</a></em><em><a href="">旅游/地图</a></em><em><a href="">烹饪/美食</a></em><em><a href="">时尚/美妆</a></em><em><a href="">家居</a></em><em><a href="">婚恋与两性</a></em><em><a href="">娱乐/休闲</a></em><em><a href="">健身与保健</a></em><em><a href="">动漫/幽默</a></em><em><a href="">体育/运动</a></em></dd>
                                </dl>
                                <dl class="fore8">
                                    <dt>科技</dt>
                                    <dd><em><a href="">科普</a></em><em><a href="">IT</a></em><em><a href="">建筑</a></em><em><a href="">医学</a></em><em><a href="">工业技术</a></em><em><a href="">电子/通信</a></em><em><a href="">农林</a></em><em><a href="">科学与自然</a></em></dd>
                                </dl>
                                <dl class="fore9">
                                    <dt>少儿</dt>
                                    <dd><em><a href="">少儿</a></em><em><a href="">0-2岁</a></em><em><a href="">3-6岁</a></em><em><a href="">7-10岁</a></em><em><a href="">11-14岁</a></em></dd>
                                </dl>
                                <dl class="fore10">
                                    <dt>教育</dt>
                                    <dd><em><a href="">教材教辅</a></em><em><a href="">考试</a></em><em><a href="">外语学习</a></em></dd>
                                </dl>
                                <dl class="fore11">
                                    <dt>其它</dt>
                                    <dd><em><a href="">英文原版书</a></em><em><a href="">港台图书</a></em><em><a href="">工具书</a></em><em><a href="">套装书</a></em><em><a href="">杂志/期刊</a></em></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <h3><a href="">家居、家具、家装、厨具</a></h3>
                        <div class="item-list clearfix">
                            <div class="subitem">
                                <dl class="fore1">
                                    <dt><a href="">电子书4</a></dt>
                                    <dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
                                </dl>
                                <dl class="fore2">
                                    <dt><a href="">数字音乐</a></dt>
                                    <dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
                                </dl>
                                <dl class="fore3">
                                    <dt><a href="">音像</a></dt>
                                    <dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
                                </dl>
                                <dl class="fore4">
                                    <dt>文艺</dt>
                                    <dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
                                </dl>
                                <dl class="fore5">
                                    <dt>人文社科</dt>
                                    <dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
                                </dl>
                                <dl class="fore6">
                                    <dt>经管励志</dt>
                                    <dd><em><a href="">经济</a></em><em><a href="">金融与投资</a></em><em><a href="">管理</a></em><em><a href="">励志与成功</a></em></dd>
                                </dl>
                                <dl class="fore7">
                                    <dt>生活</dt>
                                    <dd><em><a href="">家庭与育儿</a></em><em><a href="">旅游/地图</a></em><em><a href="">烹饪/美食</a></em><em><a href="">时尚/美妆</a></em><em><a href="">家居</a></em><em><a href="">婚恋与两性</a></em><em><a href="">娱乐/休闲</a></em><em><a href="">健身与保健</a></em><em><a href="">动漫/幽默</a></em><em><a href="">体育/运动</a></em></dd>
                                </dl>
                                <dl class="fore8">
                                    <dt>科技</dt>
                                    <dd><em><a href="">科普</a></em><em><a href="">IT</a></em><em><a href="">建筑</a></em><em><a href="">医学</a></em><em><a href="">工业技术</a></em><em><a href="">电子/通信</a></em><em><a href="">农林</a></em><em><a href="">科学与自然</a></em></dd>
                                </dl>
                                <dl class="fore9">
                                    <dt>少儿</dt>
                                    <dd><em><a href="">少儿</a></em><em><a href="">0-2岁</a></em><em><a href="">3-6岁</a></em><em><a href="">7-10岁</a></em><em><a href="">11-14岁</a></em></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <h3><a href="">服饰内衣</a></h3>
                        <div class="item-list clearfix">
                            <div class="subitem">
                                <dl class="fore1">
                                    <dt><a href="">电子书5</a></dt>
                                    <dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
                                </dl>
                                <dl class="fore2">
                                    <dt><a href="">数字音乐</a></dt>
                                    <dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
                                </dl>
                                <dl class="fore3">
                                    <dt><a href="">音像</a></dt>
                                    <dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
                                </dl>
                                <dl class="fore4">
                                    <dt>文艺</dt>
                                    <dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
                                </dl>
                                <dl class="fore5">
                                    <dt>人文社科</dt>
                                    <dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
                                </dl>
                                <dl class="fore6">
                                    <dt>经管励志</dt>
                                    <dd><em><a href="">经济</a></em><em><a href="">金融与投资</a></em><em><a href="">管理</a></em><em><a href="">励志与成功</a></em></dd>
                                </dl>
                                <dl class="fore7">
                                    <dt>生活</dt>
                                    <dd><em><a href="">家庭与育儿</a></em><em><a href="">旅游/地图</a></em><em><a href="">烹饪/美食</a></em><em><a href="">时尚/美妆</a></em><em><a href="">家居</a></em><em><a href="">婚恋与两性</a></em><em><a href="">娱乐/休闲</a></em><em><a href="">健身与保健</a></em><em><a href="">动漫/幽默</a></em><em><a href="">体育/运动</a></em></dd>
                                </dl>
                                <dl class="fore8">
                                    <dt>科技</dt>
                                    <dd><em><a href="">科普</a></em><em><a href="">IT</a></em><em><a href="">建筑</a></em><em><a href="">医学</a></em><em><a href="">工业技术</a></em><em><a href="">电子/通信</a></em><em><a href="">农林</a></em><em><a href="">科学与自然</a></em></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <h3><a href="">个护化妆</a></h3>
                        <div class="item-list clearfix">
                            <div class="subitem">
                                <dl class="fore1">
                                    <dt><a href="">电子书6</a></dt>
                                    <dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
                                </dl>
                                <dl class="fore2">
                                    <dt><a href="">数字音乐</a></dt>
                                    <dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
                                </dl>
                                <dl class="fore3">
                                    <dt><a href="">音像</a></dt>
                                    <dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
                                </dl>
                                <dl class="fore4">
                                    <dt>文艺</dt>
                                    <dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
                                </dl>
                                <dl class="fore5">
                                    <dt>人文社科</dt>
                                    <dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
                                </dl>
                                <dl class="fore6">
                                    <dt>经管励志</dt>
                                    <dd><em><a href="">经济</a></em><em><a href="">金融与投资</a></em><em><a href="">管理</a></em><em><a href="">励志与成功</a></em></dd>
                                </dl>
                                <dl class="fore7">
                                    <dt>生活</dt>
                                    <dd><em><a href="">家庭与育儿</a></em><em><a href="">旅游/地图</a></em><em><a href="">烹饪/美食</a></em><em><a href="">时尚/美妆</a></em><em><a href="">家居</a></em><em><a href="">婚恋与两性</a></em><em><a href="">娱乐/休闲</a></em><em><a href="">健身与保健</a></em><em><a href="">动漫/幽默</a></em><em><a href="">体育/运动</a></em></dd>
                                </dl>
                                <dl class="fore8">
                                    <dt>科技</dt>
                                    <dd><em><a href="">科普</a></em><em><a href="">IT</a></em><em><a href="">建筑</a></em><em><a href="">医学</a></em><em><a href="">工业技术</a></em><em><a href="">电子/通信</a></em><em><a href="">农林</a></em><em><a href="">科学与自然</a></em></dd>
                                </dl>
                                <dl class="fore9">
                                    <dt>少儿</dt>
                                    <dd><em><a href="">少儿</a></em><em><a href="">0-2岁</a></em><em><a href="">3-6岁</a></em><em><a href="">7-10岁</a></em><em><a href="">11-14岁</a></em></dd>
                                </dl>
                                <dl class="fore10">
                                    <dt>教育</dt>
                                    <dd><em><a href="">教材教辅</a></em><em><a href="">考试</a></em><em><a href="">外语学习</a></em></dd>
                                </dl>
                                <dl class="fore11">
                                    <dt>其它</dt>
                                    <dd><em><a href="">英文原版书</a></em><em><a href="">港台图书</a></em><em><a href="">工具书</a></em><em><a href="">套装书</a></em><em><a href="">杂志/期刊</a></em></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <h3><a href="">运动健康</a></h3>
                        <div class="item-list clearfix">
                            <div class="subitem">
                                <dl class="fore1">
                                    <dt><a href="">电子书7</a></dt>
                                    <dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
                                </dl>
                                <dl class="fore2">
                                    <dt><a href="">数字音乐</a></dt>
                                    <dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
                                </dl>
                                <dl class="fore3">
                                    <dt><a href="">音像</a></dt>
                                    <dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
                                </dl>
                                <dl class="fore4">
                                    <dt>文艺</dt>
                                    <dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
                                </dl>
                            </div>
                            <div class="cat-right">
                                <dl class="categorys-brands" clstag="homepage|keycount|home2013|0601d">
                                    <dt>推荐品牌出版商</dt>
                                    <dd>
                                        <ul>
                                            <li>
                                                <a href="">中华书局</a>
                                            </li>
                                            <li>
                                                <a href="">人民邮电出版社</a>
                                            </li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <h3><a href="">汽车用品</a></h3>
                        <div class="item-list clearfix">
                            <div class="subitem">
                                <dl class="fore1">
                                    <dt><a href="">电子书8</a></dt>
                                    <dd><em><a href="">免费</a></em><em><a href="">小说</a></em><em><a href="">励志与成功</a></em><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd>
                                </dl>
                                <dl class="fore2">
                                    <dt><a href="">数字音乐</a></dt>
                                    <dd><em><a href="">通俗流行</a></em><em><a href="">古典音乐</a></em><em><a href="">摇滚说唱</a></em><em><a href="">爵士蓝调</a></em><em><a href="">乡村民谣</a></em><em><a href="">有声读物</a></em></dd>
                                </dl>
                                <dl class="fore3">
                                    <dt><a href="">音像</a></dt>
                                    <dd><em><a href="">音乐</a></em><em><a href="">影视</a></em><em><a href="">教育音像</a></em><em><a href="">游戏</a></em></dd>
                                </dl>
                                <dl class="fore4">
                                    <dt>文艺</dt>
                                    <dd><em><a href="">小说</a></em><em><a href="">文学</a></em><em><a href="">青春文学</a></em><em><a href="">传记</a></em><em><a href="">艺术</a></em></dd>
                                </dl>
                                <dl class="fore5">
                                    <dt>人文社科</dt>
                                    <dd><em><a href="">历史</a></em><em><a href="">心理学</a></em><em><a href="">政治/军事</a></em><em><a href="">国学/古籍</a></em><em><a href="">哲学/宗教</a></em><em><a href="">社会科学</a></em></dd>
                                </dl>
                                <dl class="fore6">
                                    <dt>经管励志</dt>
                                    <dd><em><a href="">经济</a></em><em><a href="">金融与投资</a></em><em><a href="">管理</a></em><em><a href="">励志与成功</a></em></dd>
                                </dl>
                                <dl class="fore7">
                                    <dt>生活</dt>
                                    <dd><em><a href="">家庭与育儿</a></em><em><a href="">旅游/地图</a></em><em><a href="">烹饪/美食</a></em><em><a href="">时尚/美妆</a></em><em><a href="">家居</a></em><em><a href="">婚恋与两性</a></em><em><a href="">娱乐/休闲</a></em><em><a href="">健身与保健</a></em><em><a href="">动漫/幽默</a></em><em><a href="">体育/运动</a></em></dd>
                                </dl>
                                <dl class="fore8">
                                    <dt>科技</dt>
                                    <dd><em><a href="">科普</a></em><em><a href="">IT</a></em><em><a href="">建筑</a></em><em><a href="">医学</a></em><em><a href="">工业技术</a></em><em><a href="">电子/通信</a></em><em><a href="">农林</a></em><em><a href="">科学与自然</a></em></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <h3><a href="">彩票、旅行</a></h3>
                    </div>
                    <div class="item">
                        <h3><a href="">理财、众筹</a></h3>
                    </div>
                    <div class="item">
                        <h3><a href="">母婴、玩具</a></h3>
                    </div>
                    <div class="item">
                        <h3><a href="">箱包</a></h3>
                    </div>
                    <div class="item">
                        <h3><a href="">运动户外</a></h3>
                    </div>
                    <div class="item">
                        <h3><a href="">箱包</a></h3>
                    </div>
                </div>
            </div>