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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
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
        .tou6{
            width: 420px;
            height: 404px;
        }
        .tou7{
            width: 250px;
            height: 202px;
        }
        .tou8{
            width: 510px;
            height: 202px;
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
                        <li class="f-item">
                            @if(@session('user_name'))
                            <a href="{{url('index/user_info')}}" target="_blank">欢迎<?php echo session('user_name')?>登录</a>
                                <a href="{{url('index/del_session')}}">退出</a>　
                                @else
                                <a href="{{url('index/log')}}" target="_blank">登录</a>　
                            @endif

                            <span><a href="{{url('index/reg')}}" target="_blank">免费注册</a></span>
                        </li>
                    </ul>
                    <ul class="fr">
                        <li class="f-item">我的订单</li>
                       <!--  <li class="f-item space"></li> -->
                        <li class="f-item" id="service">
                            <ul class="service">
                                <li><a href="cooperation.html" target="_blank">合作招商</a></li>
                                <li><a href="shoplogin.html" target="_blank">商家后台</a></li>
                                <li><a href="cooperation.html" target="_blank">合作招商</a></li>
                                <li><a href="#">商家后台</a></li>
                            </ul>
                        </li>
                        <li class="f-item space"></li>
                        <li class="f-item"><a href="{{url('/usercenter')}}">个人中心</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--头部-->
        <div class="header">
            <div class="py-container">
                <div class="yui3-g Logo">
                    <div class="yui3-u Left logoArea">
                    </div>
                    <div class="yui3-u Center searchArea">
                        <div class="search">
                            <form action="{{url('/index/search')}}" class="sui-form form-inline">
                                <!--searchAutoComplete-->
                                <div class="input-append">
                                    <input type="text" name="goods_name" id="autocomplete" type="text" class="input-error input-xxlarge " />
                                    <button class="sui-btn btn-xlarge btn-danger" type="submit">搜索</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="yui3-u Right shopArea">
                        <div class="fr shopcar">
                            <div class="show-shopcar" id="shopcar">
                                <span class="car"></span>
                                <a class="sui-btn btn-default btn-xlarge" href="/index/cart_index" target="_blank">
                                    <span>我的购物车</span>
                                    <i class="shopnum">{{$cart_count}}</i>
                                </a>
                                <div class="clearfix shopcarlist" id="shopcarlist" style="display:none">
                                    <p>"啊哦，可以加入我的购物车哦！"</p>
                                    <!-- <p>"啊哦，你的购物车还没有商品哦！"</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="yui3-g NavList">
                    <div class="yui3-u Left all-sort">
                        <a href="/"><h4>首页</h4></a>
                    </div>
                    <div class="yui3-u Center navArea">
                        <ul class="nav">
                            @foreach($cate_dt as $v)
                            <a href="{{url('/index/search/'.$v->cate_id)}}"><li class="f-item">{{$v->cate_name}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                    <div class="yui3-u Right"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--列表-->
<!--列表-->
<div class="sort" >
    <div class="py-container">
        <div class="yui3-g SortList ">
            <div class="yui3-u Left all-sort-list">
                <div class="all-sort-list2">
                    @foreach($cate_info as $k=>$v)
                        <div class="item bo" algin="center">
                            <h3><a href="{{url('/index/search/'.$v->cate_id)}}">
                                    {{$v->cate_name}}
                                </a></h3>
                            <div class="item-list clearfix">
                                <div class="subitem">
                                    @foreach($cate_show as $k=>$n)
                                        @if($v->cate_id == $n->parent_id)
                                            <dl class="fore1">
                                                <dt><a href="{{url('/index/search/'.$v->cate_id)}}">
                                                        {{$n->cate_name}}
                                                    </a></dt>
                                                <!-- <dd><a href="">免费</a><a href="">小说</a></em><a href="">励志与成功</a><em><a href="">婚恋/两性</a></em><em><a href="">文学</a></em><em><a href="">经管</a></em><em><a href="">畅读VIP</a></em></dd> -->
                                                </dl>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>