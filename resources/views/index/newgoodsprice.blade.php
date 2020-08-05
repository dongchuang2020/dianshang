<div class="details">
    <input type="hidden" id="cate_name" value="">
    <input type="hidden" id="brand_name" value="">
    <input type="hidden" id="sku_name" value="">
    <input type="hidden" id="goods_price" value="">
    <div class="sui-navbar">
        <div class="navbar-inner filter">
            <ul class="sui-nav">
                <li class="active">
                    <a href="#">综合</a>
                </li>
                <li>
                    <a href="#">销量</a>
                </li>
                <li>
                    <a href="#">新品</a>
                </li>
                <li>
                    <a href="#">评价</a>
                </li>
                <li>
                    <a href="#">价格</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="goods-list">
        <ul class="yui3-g">
            @foreach($search_goods_res as $k=>$v)
                <li class="yui3-u-1-5">
                    <div class="list-wrap">
                        <div class="p-img">
                            <a href="{{url('/details/index/'.$v->goods_id)}}" target="_blank"><img src="{{$v->goods_log}}" style="width:214px;height:242px;"/></a>
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
                            <i class="command">已有2000人评价</i>
                        </div>
                        <div class="operate">
                            <a  goods_id="{{$v->goods_id}}" target="_blank" class="sui-btn btn-bordered btn-danger gou">加入购物车</a>
                            <a href="javascript:void(0);" class="sui-btn btn-bordered">对比</a>
                            <a href="javascript:void(0);" class="sui-btn btn-bordered">关注</a>
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