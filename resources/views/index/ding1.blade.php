<div id="nav-bottom">
    <!--顶部-->
    <div class="nav-top">
        <div class="top">
            <div class="py-container">
                <div class="shortcut">
                    <ul class="fl">
                        <li class="f-item">优购欢迎您！</li>
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
                        <li class="f-item"><a href="{{url('/index/user_info')}}">个人中心</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--头部-->
        <div class="header">
            <div class="py-container">


                <div class="yui3-g NavList">
                    <div class="yui3-u Left all-sort">
                        <a href="/"><h4>首页</h4></a>
                    </div>
                    <div class="yui3-u Center navArea">
                        <ul class="nav">
                            @foreach($cate_dt as $v)
                                <a href="/index/search/{{$v->cate_id}}"><li class="f-item">{{$v->cate_name}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                    <div class="yui3-u Right"></div>
                </div>
            </div>
        </div>
    </div>
</div>