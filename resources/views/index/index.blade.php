@include('index.head');
          <style>
            .ads{
                width: 250px;
                height: 70px;
            }
          </style>
            <div class="yui3-u Center banerArea">
                <!--banner轮播-->
                <div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach($sloganInfo as $kk=>$vv)
                            @if($kk == 0)
                                <div class="item active">
                                    <a href="{{$vv->slogan_url}}">
                                        <img src="{{$vv->slogan_img}}" style="width:730px;height:454px" />
                                    </a>
                                </div>
                            @else
                                <div class="item">
                                    <a href="{{$vv->slogan_url}}">
                                        <img src="{{$vv->slogan_img}}" style="width:730px;height:454px" />
                                    </a>
                                </div>
                            @endif

                            @endforeach
                    </div>
                    <a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a><a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
                </div>
            </div>
            <div class="yui3-u Right">
                <div class="news">
                    <h4><em class="fl">特价优惠</em><span class="fr tip">更多 ></span></h4>
                    <div class="clearix"></div>
                    <ul class="news-list unstyled">   
                        @foreach($sloganInfo as $k=>$v) 
                        <li slogan_id="{{$v->slogan_id}}"> 
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{$v->slogan_url}}">{{$v->slogan_title}}</a>
                        </li>
                        @endforeach  
                    </ul>
                </div>
                <ul class="yui3-g Lifeservice">
                    <li class="yui3-u-1-4 life-item tab-item">
                        <i class="list-item list-item-1"></i>
                        <span class="service-intro"><a href="https://chongzhi.jd.com/">话费</a></span>
                    </li>
                    <li class="yui3-u-1-4 life-item tab-item">
                        <i class="list-item list-item-2"></i>
                        <span class="service-intro"><a href="https://flights.ctrip.com/">机票</a></span>
                    </li>
                    <li class="yui3-u-1-4 life-item tab-item">
                        <i class="list-item list-item-3"></i>
                        <span class="service-intro"><a href="https://maoyan.com/">电影票</a></span>
                    </li>
                    <li class="yui3-u-1-4 life-item tab-item">
                        <i class="list-item list-item-4"></i>
                        <span class="service-intro"><a href="http://tg.37.com/">游戏</a></span>
                    </li>
                    <li class="yui3-u-1-4 life-item notab-item">
                        <i class="list-item list-item-5"></i>
                        <span class="service-intro"><a href="https://caipiao.taobao.com/">彩票</a></span>
                    </li>
                    <li class="yui3-u-1-4 life-item notab-item">
                        <i class="list-item list-item-6"></i>
                        <span class="service-intro"><a href="http://www.nucarf.com/">加油站</a></span>
                    </li>
                    <li class="yui3-u-1-4 life-item notab-item">
                        <i class="list-item list-item-7"></i>
                        <span class="service-intro"><a href="https://hotels.ctrip.com/">酒店</a></span>
                    </li>
                    <li class="yui3-u-1-4 life-item notab-item">
                        <i class="list-item list-item-8"></i>
                        <span class="service-intro"><a href="https://www.tieyou.com/">火车票</a></span>
                    </li>
                    <li class="yui3-u-1-4 life-item  notab-item">
                        <i class="list-item list-item-9"></i>
                        <span class="service-intro"><a href="https://www.shuidichou.com/">众筹</a></span>
                    </li>
                    <li class="yui3-u-1-4 life-item notab-item">
                        <i class="list-item list-item-10"></i>
                        <span class="service-intro"><a href="https://money.19lou.com/">理财</a></span>
                    </li>
                    <li class="yui3-u-1-4 life-item notab-item">
                        <i class="list-item list-item-11"></i>
                        <span class="service-intro"><a href="https://o.jd.com/">礼品卡</a></span>
                    </li>
                    <li class="yui3-u-1-4 life-item notab-item">
                        <i class="list-item list-item-12"></i>
                        <span class="service-intro"><a href="https://baitiao.jd.com/">白条</a></span>
                    </li>
                </ul>
                <!-- <div class="life-item-content">
                    <div class="life-detail">
                        <i class="close">关闭</i>
                        <p>话费充值</p>
                        <form action="" class="sui-form form-horizontal">
                            号码：<input type="text" id="inputphoneNumber" placeholder="输入你的号码" />
                        </form>
                        <button class="sui-btn btn-danger">快速充值</button>
                    </div>
                    <div class="life-detail">
                        <i class="close">关闭</i> 机票
                    </div>
                    <div class="life-detail">
                        <i class="close">关闭</i> 电影票
                    </div>
                    <div class="life-detail">
                        <i class="close">关闭</i> 游戏
                    </div>
                </div> -->
                @foreach($sloganInfo2 as $kkk=>$vvv)
                <div class="ads">
                    <a href="{{$vvv->slogan_url}}">
                    <img src="{{$vvv->slogan_img}}" style="width:730px;height:100px"/>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--推荐-->
<div class="show">
    <div class="py-container">
        <ul class="yui3-g Recommend">
            <li class="yui3-u-1-6  clock">
                <div class="time">
                    <img src="index/img/clock.png" />
                    <h3>今日推荐</h3>
                </div>
            </li>
            <li class="yui3-u-5-24">
                <a href="list.html" target="_blank"><img src="index/img/today01.png" /></a>
            </li>
            <li class="yui3-u-5-24">
                <img src="index/img/today02.png" />
            </li>
            <li class="yui3-u-5-24">
                <img src="index/img/today03.png" />
            </li>
            <li class="yui3-u-5-24">
                <img src="index/img/today04.png" />
            </li>
        </ul>
    </div>
</div>
<!--喜欢-->
<div class="like">
    <div class="py-container">
        <div class="title">
            <h3 class="fl">猜你喜欢</h3>
            <b class="border"></b>
            <a href="javascript:;" class="fr tip changeBnt" id="xxlChg"><i></i>换一换</a>
        </div>
        <div class="bd">
            <ul class="clearfix yui3-g Favourate picLB" id="picLBxxl">
                <li class="yui3-u-1-6">
                    <dl class="picDl huozhe">
                        <dd>
                            <a href="" class="pic"><img src="index/img/like_02.png" alt="" /></a>
                            <div class="like-text">
                                <p>阳光美包新款单肩包女包时尚子母包四件套女</p>
                                <h3>¥116.00</h3>
                            </div>
                        </dd>
                        <dd>
                            <a href="" class="pic"><img src="index/img/like_01.png" alt="" /></a>
                            <div class="like-text">
                                <p>爱仕达 30CM炒锅不粘锅NWG8330E电磁炉炒</p>
                                <h3>¥116.00</h3>
                            </div>
                        </dd>
                    </dl>
                </li>
                <li class="yui3-u-1-6">
                    <dl class="picDl jilu">
                        <dd>
                            <a href="" class="pic"><img src="index/img/like_03.png" alt="" /></a>
                            <div class="like-text">
                                <p>爱仕达 30CM炒锅不粘锅NWG8330E电磁炉炒</p>
                                <h3>¥116.00</h3>
                            </div>
                        </dd>
                        <dd>
                            <a href="" class="pic"><img src="index/img/like_02.png" alt="" /></a>
                            <div class="like-text">
                                <p>阳光美包新款单肩包女包时尚子母包四件套女</p>
                                <h3>¥116.00</h3>
                            </div>
                        </dd>
                    </dl>
                </li>
                <li class="yui3-u-1-6">
                    <dl class="picDl tuhua">
                        <dd>
                            <a href="" class="pic"><img src="index/img/like_01.png" alt="" /></a>
                            <div class="like-text">
                                <p>捷波朗 </p>
                                <p>（jabra）BOOSI劲步</p>
                                <h3>¥236.00</h3>
                            </div>
                        </dd>
                        <dd>
                            <a href="" class="pic"><img nsrc="assets/index/img/like_02.png" alt="" /></a>
                            <div class="like-text">
                                <p>三星（G5500）</p>
                                <p>移动联通双网通</p>
                                <h3>¥566.00</h3>
                            </div>
                        </dd>
                    </dl>
                </li>
                <li class="yui3-u-1-6">
                    <dl class="picDl huozhe">
                        <dd>
                            <a href="" class="pic"><img src="index/img/like_02.png" alt="" /></a>
                            <div class="like-text">
                                <p>阳光美包新款单肩包女包时尚子母包四件套女</p>
                                <h3>¥116.00</h3>
                            </div>
                        </dd>
                        <dd>
                            <a href="" class="pic"><img src="index/img/like_01.png" alt="" /></a>
                            <div class="like-text">
                                <p>爱仕达 30CM炒锅不粘锅NWG8330E电磁炉炒</p>
                                <h3>¥116.00</h3>
                            </div>
                        </dd>
                    </dl>
                </li>
                <li class="yui3-u-1-6">
                    <dl class="picDl jilu">
                        <dd>
                            <a href="http://sc.chinaz.com/" class="pic"><img src="index/img/like_03.png" alt="" /></a>
                            <div class="like-text">
                                <p>捷波朗 </p>
                                <p>（jabra）BOOSI劲步</p>
                                <h3>¥236.00</h3>
                            </div>
                        </dd>
                        <dd>
                            <a href="http://sc.chinaz.com/" class="pic"><img src="index/img/like_02.png" alt="" /></a>
                            <div class="like-text">
                                <p>欧普</p>
                                <p>JYLZ08面板灯平板灯铝</p>
                                <h3>¥456.00</h3>
                            </div>
                        </dd>
                    </dl>
                </li>
                <li class="yui3-u-1-6">
                    <dl class="picDl tuhua">
                        <dd>
                            <a href="http://sc.chinaz.com/" class="pic"><img src="index/img/like_01.png" alt="" /></a>
                            <div class="like-text">
                                <p>三星（G5500）</p>
                                <p>移动联通双网通</p>
                                <h3>¥566.00</h3>
                            </div>
                        </dd>
                        <dd>
                            <a href="http://sc.chinaz.com/" class="pic"><img nsrc="assets/index/img/like_02.png" alt="" /></a>
                            <div class="like-text">
                                <p>韩国所望紧致湿润精华露400ml</p>
                                <h3>¥896.00</h3>
                            </div>
                        </dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--有趣-->
<div class="fun">
    <div class="py-container">
        <div class="title">
            <h3 class="fl">国际大牌.有潮牌</h3>
        </div>
        <div class="clearfix yui3-g Interest">
            <span class="x-line"></span>
            <div class="yui3-u row-405 Interest-conver">
                <img src="{{$g_res[0]->goods_log}}" width="300px"/>
            </div>
            <div class="yui3-u row-225 Interest-conver-split">
                <h5>{{$g_res[1]->goods_name}}</h5>
                <img src="{{$g_res[1]->goods_log}}" />
                <img src="{{$g_res[1]->goods_log}}" />
            </div>
            <div class="yui3-u row-405 Interest-conver-split blockgary">
                <h5>{{$g_res[2]->goods_name}}</h5>
                <div class="split-bt">
                    <img src="{{$g_res[2]->goods_log}}" />
                </div>
                <div class="x-img fl">
                    <img src="{{$g_res[2]->goods_log}}" />
                </div>
                <div class="x-img fr">
                    <img src="{{$g_res[2]->goods_log}}" />
                </div>
            </div>
            <div class="yui3-u row-165 brandArea">
                <span class="brand-yline"></span>
                <ul class="yui3-g brand-list">
                    @foreach($brand_res as $k=>$v)
                        <li class="yui3-u-1-2 brand-pit"><a href="{{$v->brand_url}}"><img src="{{$v->brand_img}}" width="70px"/></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!--楼层-->
<div id="floor-1" class="floor">
    <div class="py-container">
        <div class="title floors">

            <h3 class="fl">家用电器</h3>
            <div class="fr">
                <ul class="sui-nav nav-tabs">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">热门</a>
                    </li>
                    {{--热门--}}
                    @foreach($goods_info as $v)
                    <li>
                        {{--@if($v->cate_id = 27 && $v->is_hot == 1 )--}}
                        <a href="#tab2" data-toggle="tab">{{$v->goods_name}}</a>
                        {{--@endif--}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="clearfix  tab-content floor-content">
            <div id="tab1" class="tab-pane active">
                <div class="yui3-g Floor-1">
                    <div class="yui3-u Left blockgary">
                        <ul class="jd-list">

                            @foreach($goods_info as $vv)
                                @if($vv->parent_id == 27)
                            <li>{{$vv->cate_name}}</li>
                                @endif
                            @endforeach
                        </ul>
                        <img src="index/img/floor-1-1.png" />
                    </div>
                    <div class="yui3-u row-330 floorBanner">

                        <div id="floorCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#floorCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#floorCarousel" data-slide-to="1"></li>
                                <li data-target="#floorCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                {{--轮播图--}}
                                    @foreach($goods_info as $v)

                                    <div class="item">
                                        <img src="{{$v->goods_log}}" alt="">
                                    </div>

                                    @endforeach
                            </div>

                            <a href="#floorCarousel" data-slide="prev" class="carousel-control left">‹</a>
                            <a href="#floorCarousel" data-slide="next" class="carousel-control right">›</a>
                        </div>

                    </div>

                    <div class="yui3-u row-220 split">
                        <span class="floor-x-line"></span>
                        {{--图片展示--}}
                        @foreach($goods_info as $v)
                            <div class="floor-conver-pit ">

                                <img src="{{$v->goods_log}}" />

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="floor-2" class="floor">
    <div class="py-container">
        <div class="title floors">
            <h3 class="fl">男装</h3>
            <div class="fr">
                <ul class="sui-nav nav-tabs">
                    <li class="active">
                        <a href="#tab8" data-toggle="tab">热门</a>
                    </li>
                    {{--@foreach($goods_info as $v)--}}
                    {{--<li>--}}
                        {{--@if($v->is_hot ==1 && $v->cate_id == 28)--}}
                        {{--<a href="#tab9" data-toggle="tab">{{$v->goods_name}}</a>--}}
                        {{--@endif--}}
                    {{--</li>--}}
                    {{--@endforeach--}}
                </ul>
            </div>
        </div>
        <div class="clearfix  tab-content floor-content">
            <div id="tab8" class="tab-pane active">
                <div class="yui3-g Floor-1">
                    <div class="yui3-u Left blockgary">
                        <ul class="jd-list">
                            <li>节能补贴</li>
                            <li>4K电视</li>
                            <li>空气净化器</li>
                            <li>IH电饭煲</li>
                            <li>滚筒洗衣机</li>
                            <li>电热水器</li>
                        </ul>
                        <img src="index/img/floor-1-1.png" />
                    </div>
                    <div class="yui3-u row-330 floorBanner">
                        <div id="floorCarousell" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#floorCarousell" data-slide-to="0" class="active"></li>
                                <li data-target="#floorCarousell" data-slide-to="1"></li>
                                <li data-target="#floorCarousell" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">

                                <div class="active item">
                                    <img src="index/img/floor-1-b01.png">
                                </div>
                                <div class="item">
                                    <img src="index/img/floor-1-b02.png">
                                </div>
                                <div class="item">
                                    <img src="index/img/floor-1-b03.png">
                                </div>
                            </div>
                            <a href="#floorCarousell" data-slide="prev" class="carousel-control left">‹</a>
                            <a href="#floorCarousell" data-slide="next" class="carousel-control right">›</a>
                        </div>
                    </div>
                    <div class="yui3-u row-220 split">
                        <span class="floor-x-line"></span>
                        <div class="floor-conver-pit">
                            <img src="index/img/floor-1-2.png" />
                        </div>
                        <div class="floor-conver-pit">
                            <img src="index/img/floor-1-3.png" />
                        </div>
                    </div>
                    <div class="yui3-u row-218 split">
                        <img src="index/img/floor-1-4.png" />
                    </div>
                    <div class="yui3-u row-220 split">
                        <span class="floor-x-line"></span>
                        <div class="floor-conver-pit">
                            <img src="index/img/floor-1-5.png" />
                        </div>
                        <div class="floor-conver-pit">
                            <img src="index/img/floor-1-6.png" />
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab2" class="tab-pane">
                <p>第二个</p>
            </div>
            <div id="tab9" class="tab-pane">
                <p>第三个</p>
            </div>
            <div id="tab10" class="tab-pane">
                <p>第4个</p>
            </div>
            <div id="tab11" class="tab-pane">
                <p>第5个</p>
            </div>
            <div id="tab12" class="tab-pane">
                <p>第6个</p>
            </div>
            <div id="tab13" class="tab-pane">
                <p>第7个</p>
            </div>
            <div id="tab14" class="tab-pane">
                <p>第8个</p>
            </div>
        </div>
    </div>
</div>
<!--商标-->
<div class="brand">
    <div class="py-container">
        <ul class="Brand-list blockgary">
            @foreach($b_res as $k=>$v)
            <li class="Brand-item">
                <a href="{{$v->brand_url}}"><img src="{{$v->brand_img}}" width="60px"/></a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- 底部栏位 -->
@include('index.bottom');