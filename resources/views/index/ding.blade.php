<div id="nav-bottom">
    <!--顶部-->
    <div class="nav-top">
        <div class="top">
            <div class="py-container">
                <div class="shortcut">
                    <ul class="fl">
                        <li class="f-item">欢迎您！</li>
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
                        <li class="f-item"><a href="{{url('/index/user_info')}}">个人中心</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--头部-->
        <div class="header">
            <div class="py-container">
                <div class="yui3-g Logo">
                    <div class="yui3-u Left logoArea">
                        <img class="logo-bd"  src="/index/img/20200808161654.jpg" style="width: 120px;height: 80px" target="_blank">
                    </div>
                    <div class="yui3-u Center searchArea">
                        <div class="search">
                            <form action="{{url('/index/search')}}" class="sui-form form-inline">
                                <!--searchAutoComplete-->
                                <div class="input-append">
                                    <input type="text" name="goods_name" style="height: 18px" id="autocomplete" type="text" class="input-error input-xxlarge" />
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
                                </a>
                                <div class="clearfix shopcarlist" id="shopcarlist" style="display:none">
                                    <p>"啊哦，可以加入我的购物车哦！"</p>
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