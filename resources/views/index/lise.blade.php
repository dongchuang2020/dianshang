<div class="yui3-u-1-6 list">

    <div class="person-info">
        <div class="person-photo"><img src="img/_/photo.png" alt=""></div>
        <div class="person-account">
            <span class="name"><?php echo session('user_name')?></span>
            <span class="safe">账户安全</span>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="list-items">
        <dl>
            <dt><i>·</i> 订单中心</dt>
            <dd ><a href="home-index.html"   >我的订单</a></dd>
            <dd><a href="home-order-pay.html" >待付款</a></dd>
            <dd><a href="home-order-send.html"  >待发货</a></dd>
            <dd><a href="home-order-receive.html" >待收货</a></dd>
            <dd><a href="home-order-evaluate.html" >待评价</a></dd>
        </dl>
        <dl>
            <dt><i>·</i> 我的中心</dt>
            <dd><a href="{{url('/index/collectlist')}}" >我的收藏</a></dd>
            <dd><a href="/details/historyShow" >我的足迹</a></dd>
        </dl>
        <dl>
            <dt><i>·</i> 物流消息</dt>
        </dl>
        <dl>
            <dt><i>·</i> 设置</dt>
            <dd><a href="home-setting-info.html" class="list-active">个人信息</a></dd>
            <dd><a href="home-setting-address.html"  >地址管理</a></dd>
            <dd><a href="home-setting-safe.html" >安全管理</a></dd>
        </dl>
    </div>
</div>