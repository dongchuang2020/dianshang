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
            <dd ><a href="{{url('/usercenter')}}"   >我的订单</a></dd>
        </dl>
        <dl>
             <dt><i>·</i> 我的中心</dt>
             <dd><a href="/index/collectlist">我的收藏</a></dd>
             <dd><a href="/details/historyShow">我的足迹</a></dd>
        </dl>
        <dl>
            <dt><i>·</i> 物流消息</dt>
        </dl>
        <dl>
            <dt><i>·</i> 设置</dt>
            <dd><a href="/index/user_info">个人信息</a></dd>
            <dd><a href="/address">地址管理</a></dd>
        </dl>
    </div>
</div>