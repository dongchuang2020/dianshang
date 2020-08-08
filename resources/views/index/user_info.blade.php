<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>设置-个人信息</title>
    <link rel="icon" href="/assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="css/pages-seckillOrder.css" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>

<body>
<!-- 头部栏位 -->
<!--页面顶部-->
<div id="nav-bottom">
    <!--顶部-->
    @include('index.ding')
</div>

<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
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
<script type="text/javascript" src="js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/widget/nav.js"></script>
<script type="text/javascript" src="js/plugins/birthday/birthday.js"></script>
<script type="text/javascript" src="js/plugins/citypicker/distpicker.data.js"></script>
<script type="text/javascript" src="js/plugins/citypicker/distpicker.js"></script>
<script type="text/javascript" src="js/plugins/upload/uploadPreview.js"></script>
<script type="text/javascript" src="js/pages/main.js"></script>
<script>
    $(function() {
        $.ms_DatePicker({
            YearSelector: "#select_year2",
            MonthSelector: "#select_month2",
            DaySelector: "#select_day2"
        });
    });
</script>
</body>
<!--header-->
<div id="account">
    <div class="py-container">
        <div class="yui3-g home">
            <!--左侧列表-->
            @include('index.lise')
            <!--右侧主内容-->
            <div class="yui3-u-5-6">
                <div class="body userInfo">
                    <ul class="sui-nav nav-tabs nav-large nav-primary ">
                        <li class="active"><a href="#one" data-toggle="tab">基本资料</a></li>
                        <li><a href="#two" data-toggle="tab">头像照片</a></li>
                    </ul>
                    <div class="tab-content ">
                        <div id="one" class="tab-pane active">
                            <form id="form-msg" class="sui-form form-horizontal" action="{{url('/index/doadd')}}" method="post">
                                <div class="control-group">
                                    <label for="inputName" class="control-label">昵称：</label>
                                    <div class="controls">
                                        <input type="text" id="user_name" name="user_nickname" placeholder="昵称">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputGender" class="control-label">性别：</label>
                                    <div class="controls">
                                        {{--<label data-toggle="radio" class="radio-pretty inline">--}}
                                            <input type="radio" name="sex" value="1" class="sex" checked><span>男</span>
                                        {{--</label>--}}
                                        {{--<label data-toggle="radio" class="radio-pretty inline">--}}
                                            <input type="radio" name="sex" value="2" class="sex"><span>女</span>
                                        {{--</label>--}}
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputPassword" class="control-label">生日：</label>
                                    <div class="controls">
                                        <select id="select_year2" name="year2" rel="1990"></select>年
                                        <select id="select_month2" name="month2" rel="4"></select>月
                                        <select id="select_day2" name="day2" rel="3"></select>日
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label for="inputPassword" class="control-label">所在地：</label>
                                    <div class="controls">
                                        <div data-toggle="distpicker">
                                            <div class="form-group area">
                                                <select class="form-control" name="province1" id="province1"></select>
                                            </div>
                                            <div class="form-group area">
                                                <select class="form-control" name="city1" id="city1"></select>
                                            </div>
                                            <div class="form-group area">
                                                <select class="form-control" name="district1" id="district1"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputJob" class="control-label">职业：</label>
                                    <select name="zhiye" id="">
                                        <option value="1">程序员</option>
                                        <option value="2">产品经理</option>
                                        <option value="3">ui设计</option>
                                    </select>
                                    {{--<div class="controls">--}}
                                        {{--<span class="sui-dropdown dropdown-bordered select"><span class="dropdown-inner">--}}
                                                {{--<a role="button" data-toggle="dropdown" href="#" class="dropdown-toggle">--}}
                                                {{--<input name="job" type="hidden" data-rules="required">--}}
                                                    {{--<i class="caret"></i>--}}
                                                    {{--<span>请选择</span>--}}
                                                {{--</a>--}}
                                            {{--<ul id="menu4" role="menu" aria-labelledby="drop4" class="sui-dropdown-menu" name="zhiye">--}}
                                                {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="bj" name="chenxu">程序员</a></li>--}}
                                                {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="sb" name="chanpin">产品经理</a></li>--}}
                                                {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="sb" name="sheji">UI设计师</a></li>--}}
                                            {{--</ul>--}}
                                            {{--</span>--}}
                                            {{--</span>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="control-group">
                                    <label for="sanwei" class="control-label"></label>
                                    <div class="controls">

                                        <button class="sui-btn btn-primary" id="but">立即注册</button>
                                    </div>
                                </div>
                            </form>
                            <table class="sui-table table-bordered">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>用户名</th>
                                    <th>用户昵称</th>
                                    <th>用户性别</th>
                                    <th>用户生日</th>
                                    <th>用户地址</th>
                                    <th>用户职业</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $v)
                                <tr>
                                    <td>{{$v->uid}}</td>
                                    <td>{{$v->user_name}}</td>
                                    <td>{{$v->user_nickname}}</td>
                                    <td>{{$v->sex==1?'男':'女'}}</td>
                                    <td>{{$v->year2}},{{$v->month2}},{{$v->day2}}</td>
                                    <td>{{$v->province1}}{{$v->city1}}{{$v->district1}}</td>
                                    <td>
                                        @if($v->zhiye==1)
                                            程序员
                                        @elseif($v->zhiye==2)
                                            产品经理
                                         @else
                                            ui设计
                                        @endif
                                    </td>
                                    <td id="{{$v->uid}}">
                                        <a href="{{url('index/up_userinfo/'.$v->uid)}}">编辑</a>
                                        <a href="#" id="del">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="two" class="tab-pane">

                            <div class="new-photo">
                                <p>当前头像：</p>
                                <div class="upload">
                                    <img id="imgShow_WU_FILE_0" width="100" height="100" src="img/_/photo_icon.png" alt="">
                                    <input type="file" id="up_img_WU_FILE_0" />
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
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

undefined

</html>
<script>
   $(document).on('click','#del',function () {
       var uid = $(this).parent('td').attr('id');
       var url = '/index/del_userinfo';
       $.ajax({
           data:{'uid':uid},
           url:url,
           type:'post',
//           dataType:'json',
           success:function (res) {
               if(res == "·1"){
                   window.location.href = '/index/user_info';
               }
           }
       });
       return false;
   })
</script>