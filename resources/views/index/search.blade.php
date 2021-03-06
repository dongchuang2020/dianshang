<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		<title>产品列表页</title>
		<link rel="icon" href="assets/img/favicon.ico">

		<link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
		<link rel="stylesheet" type="text/css" href="/index/css/pages-list.css" />
		<link rel="stylesheet" type="text/css" href="/index/css/widget-cartPanelView.css" />
		<script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="/jquery.cookie.js"></script>
		<script type="text/javascript" src="/jquery.session.js"></script>
	</head>

	<body>
		<!-- 头部栏位 -->
		<!--页面顶部-->
@include('index.ding')


	<!--list-content-->
	<div class="main">
		<div class="py-container">
			<!--bread-->
			<div class="bread">
				<ul class="fl sui-breadcrumb">
					<li>
						<a href="/">全部结果</a>
					</li>					
					<li class="active">{{--@if($search_show)--}} {{$search_show->cate_name ?? ''}} {{--@endif--}}</li>
				</ul>
				<ul class="tags-choose">
					<li class="tag" id="goods_price" style="display:none;">全网通<i class="sui-icon icon-tb-close"></i></li>
					<li class="tag" id="brand"  style="display:none;">63G<i class="sui-icon icon-tb-close"></i></li>
					<li class="tag" id="aid"  style="display:none;">63G<i class="sui-icon icon-tb-close"></i></li>
				</ul>
				<form class="fl sui-form form-dark">
					<div class="input-control control-right">
						<input type="text" />
						<i class="sui-icon icon-touch-magnifier"></i>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
			<!--selector-->
			<div class="clearfix selector">
			<div class="type-wrap">
					<div class="fl key">{{$search_show->cate_name ?? ''}}</div>
					<div class="fl value">
						<ul class="type-list">
							@if($search_show != null)
						@foreach($search_cate as $k=>$v)
							@if($search_show->cate_id == $v->parent_id)
							<li>
								<a href="{{url('/index/search/'.$v->cate_id)}}">| {{$v->cate_name}}  | </a>
							</li>
							@endif
							@endforeach
								@endif
						</ul>
					</div>
					<div class="fl ext"></div>
				</div>
				<div class="type-wrap logo">
					<div class="fl key brand">品牌</div>
					<div class="value logos">
						<ul class="logo-list">
							@if($search_brand)
						@foreach($search_brand as $k=>$v)
							<li  class="brand_name" brand_name="{{$v->brand_name}}" brand_id="{{$v->brand_id}}"><img src="{{$v->brand_img}}" style="width:105px;height:52px" /></li>
						@endforeach
								@else
								@foreach($shop_brand as $k=>$v)
									@if($v->cate_id == $id)
									<li  class="brand_name" brand_name="{{$v->brand_name}}" brand_id="{{$v->brand_id}}"><img src="{{$v->brand_img}}" style="width:105px;height:52px" /></li>
									@endif
								@endforeach
							@endif
						</ul>
					</div>
					<div class="ext">
						<a href="javascript:void(0);" class="sui-btn">多选</a>
						<a href="javascript:void(0);">更多</a>
					</div>
				</div>
				<div class="type-wrap">
					<div class="fl key">{{$sku_res->name ?? ''}}</div>
					<div class="fl value">
						<ul class="type-list">
							@if($sku_res != null)
							@foreach($attr_res as $k=>$v)
								@if($sku_res->sid==$v->sid)
							<li>
								<a a_id="{{$v->a_id}}" class="a_name">{{$v->a_name}}</a>
							</li>
								@endif
							@endforeach
								@endif
						</ul>
					</div>
					<div class="fl ext"></div>
				</div>


				<div class="type-wrap">
					<div class="fl key">价格</div>
					<div class="fl value">
						<ul class="type-list">
							@foreach($price as $k=>$v)
							<li>
								<a class="goods_price">{{$v}}</a>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="fl ext">
					</div>
				</div>
					<div class="fl ext">
					</div>
				</div>
			</div>
			<!--details-->
			<div class="details newinfo">

				<input type="hidden" id="cate_name" value="">
				<input type="hidden" id="brand_name" value="">
				<input type="hidden" id="a_name" value="">
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
					@foreach($search_info as $k=>$v)
						<li class="yui3-u-1-5">
							<div class="list-wrap">
								<div class="p-img">
									<a href="{{url('/details/index/'.$v->goods_id)}}" target="_blank"><img src="{{$v->goods_log}}" style="width:204px;height:245px;"/></a>
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
									<img src="/index/img/like_01.png" />
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
									<img src="/index/img/like_03.png" />
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
									<img src="/index/img/like_04.png" />
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
									<img src="/index/img/like_02.png" />
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
{{--
	<div class="J-global-toolbar">
		<div class="toolbar-wrap J-wrap">
			<div class="toolbar">
				<div class="toolbar-panels J-panel">

					<!-- 购物车 -->
					<div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-cart toolbar-animate-out">
						<h3 class="tbar-panel-header J-panel-header">
						<a href="" class="title"><i></i><em class="title">购物车</em></a>
						<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('cart');" ></span>
					</h3>
						<div class="tbar-panel-main">
							<div class="tbar-panel-content J-panel-content">
								<div id="J-cart-tips" class="tbar-tipbox hide">
									<div class="tip-inner">
										<span class="tip-text">还没有登录，登录后商品将被保存</span>
										<a href="#none" class="tip-btn J-login">登录</a>
									</div>
								</div>
								<div id="J-cart-render">
									<!-- 列表 -->
									<div id="cart-list" class="tbar-cart-list">
									</div>
								</div>
							</div>
						</div>
						<!-- 小计 -->
						<div id="cart-footer" class="tbar-panel-footer J-panel-footer">
							<div class="tbar-checkout">
								<div class="jtc-number"> <strong class="J-count" id="cart-number">0</strong>件商品 </div>
								<div class="jtc-sum"> 共计：<strong class="J-total" id="cart-sum">¥0</strong> </div>
								<a class="jtc-btn J-btn" href="#none" target="_blank">去购物车结算</a>
							</div>
						</div>
					</div>

					<!-- 我的关注 -->
					<div style="visibility: hidden;" data-name="follow" class="J-content toolbar-panel tbar-panel-follow">
						<h3 class="tbar-panel-header J-panel-header">
						<a href="#" target="_blank" class="title"> <i></i> <em class="title">我的关注</em> </a>
						<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('follow');"></span>
					</h3>
						<div class="tbar-panel-main">
							<div class="tbar-panel-content J-panel-content">
								<div class="tbar-tipbox2">
									<div class="tip-inner"> <i class="i-loading"></i> </div>
								</div>
							</div>
						</div>
						<div class="tbar-panel-footer J-panel-footer"></div>
					</div>

					<!-- 我的足迹 -->
					<div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-history toolbar-animate-in">
						<h3 class="tbar-panel-header J-panel-header">
						<a href="#" target="_blank" class="title"> <i></i> <em class="title">我的足迹</em> </a>
						<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('history');"></span>
					</h3>
						<div class="tbar-panel-main">
							<div class="tbar-panel-content J-panel-content">
								<div class="jt-history-wrap">
									<ul>
										<!--<li class="jth-item">
										<a href="#" class="img-wrap"> <img src=".portal/img/like_03.png" height="100" width="100" /> </a>
										<a class="add-cart-button" href="#" target="_blank">加入购物车</a>
										<a href="#" target="_blank" class="price">￥498.00</a>
									</li>
									<li class="jth-item">
										<a href="#" class="img-wrap"> <img src="portal/img/like_02.png" height="100" width="100" /></a>
										<a class="add-cart-button" href="#" target="_blank">加入购物车</a>
										<a href="#" target="_blank" class="price">￥498.00</a>
									</li>-->
									</ul>
									<a href="#" class="history-bottom-more" target="_blank">查看更多足迹商品 &gt;&gt;</a>
								</div>
							</div>
						</div>
						<div class="tbar-panel-footer J-panel-footer"></div>
					</div>

				</div>

				<div class="toolbar-header"></div>

				<!-- 侧栏按钮 -->
				<div class="toolbar-tabs J-tab">
					<div onclick="cartPanelView.tabItemClick('cart')" class="toolbar-tab tbar-tab-cart" data="购物车" tag="cart">
						<i class="tab-ico"></i>
						<em class="tab-text"></em>
						<span class="tab-sub J-count " id="tab-sub-cart-count">0</span>
					</div>
					<div onclick="cartPanelView.tabItemClick('follow')" class="toolbar-tab tbar-tab-follow" data="我的关注" tag="follow">
						<i class="tab-ico"></i>
						<em class="tab-text"></em>
						<span class="tab-sub J-count hide">0</span>
					</div>
					<div onclick="cartPanelView.tabItemClick('history')" class="toolbar-tab tbar-tab-history" data="我的足迹" tag="history">
						<i class="tab-ico"></i>
						<em class="tab-text"></em>
						<span class="tab-sub J-count hide">0</span>
					</div>
				</div>

				<div class="toolbar-footer">
					<div class="toolbar-tab tbar-tab-top">
						<a href="#"> <i class="tab-ico  "></i> <em class="footer-tab-text">顶部</em> </a>
					</div>
					<div class="toolbar-tab tbar-tab-feedback">
						<a href="#" target="_blank"> <i class="tab-ico"></i> <em class="footer-tab-text ">反馈</em> </a>
					</div>
				</div>

				<div class="toolbar-mini"></div>

			</div>

			<div id="J-toolbar-load-hook"></div>

		</div>
	</div>
--}}
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
		<script>
			$('.gou').on('click',function () {
				var goods_id = $(this).attr('goods_id');
				var sess = $.cookie("user_id")?false:true;
				if (sess){
					var cook = $.cookie('goods');
					if (cook){
						var ni = false;
						alert(cook)
							var cooks = JSON.parse(cook);
							for (var i =0;i<cooks.length;i++){
								if (cooks[i].goods_id == goods_id){
									cooks[i].man++;
									ni = true;
									break;
								}
							}
							if (!ni){
								var ogj = {goods_id:goods_id,man:1};
								cooks.push(ogj);
							}
							$.cookie('goods',JSON.stringify(cooks),{
								expires: 15
							});
					} else {
						var name = [{goods_id:goods_id,man:1}];
						$.cookie('goods',JSON.stringify(name),{
							expires:15
						});
					}
				}else {
					var user_id = $.session.get('user_id');
					$.ajax({
						url:'/index/guo_add',
						type:'get',
						data:{
							'goods_id':goods_id,
							'user_id':user_id,
							'man':1
						},
						success:function (rm) {
							alert(rm)
						}
					})
				}
			})
		</script>
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
<script src="/jquery.js"></script>
<script>
	$(document).ready(function(){
		$(document).on("click",".goods_price",function(){
			var _this=$(this);
			_this.parent('li').siblings('li').find('a').removeClass('redhover');
			_this.addClass('redhover');
			var goods_price=_this.text();
			var cate_id="{{$search_show->cate_id ?? ''}}";
			$("#goods_price").show();
			$('#goods_price').text(goods_price);
			//累加条件
			var brand_name=$("#brand_name").val();
			console.log(brand_name);
//			return false;
			if(brand_name==''){
				brand_name=null;
			}
			var a_name=$("#a_name").val();
			if(a_name==""){
				a_name=null;
			}
			var a_id=_this.attr("a_id");
			if(a_id==""){
				a_id=null;
			}
			var sid="{{$sku_res->sid ?? ''}}";
			if(sid==""){
				sid=null;
			}
			var url="/index/search_price";

			$.ajax({
				url:url,
				type:'post',
				data:{goods_price:goods_price,cate_id:cate_id,brand_id:brand_name,a_name:a_name,a_id:a_id,sid:sid},
				dataType:'html',
				success:function(msg){
//					console.log(msg);
					$('.newinfo').html(msg);
				}
			});
		});
		$(document).on("click",".brand_name",function(){
			var _this=$(this);
			var brand_name=_this.attr('brand_name');
			var brand_id = _this.attr('brand_id');
			var cate_id="{{$search_show->cate_id ?? ''}}";
//			alert(brand_name);
			$("#brand").show();
			$("#brand").text(brand_name);
			var goods_price=$("#goods_price").val();
			if(goods_price==''){
				goods_price=null;
			}
			var a_name=$("#a_name").val();
			if(a_name==''){
				a_name=null;
			}
			var a_id=_this.attr("a_id");
			if(a_id==""){
				a_id=null;
			}
			var sid="{{$sku_res->sid}}";
			if(sid==""){
				sid=null;
			}
			var url="/index/search_price";
			$.ajax({
				url:url,
				type:'post',
				data:{brand_name:brand_name,brand_id:brand_id,cate_id:cate_id,goods_price:goods_price,a_name:a_name,a_id:a_id,sid:sid},
				dataType:'html',
				success:function(msg){
					$('.newinfo').html(msg);
				}
			});
		});
		$(document).on("click",".a_name",function(){
//			console.log(111);
			var _this=$(this);
			_this.parent('li').siblings('li').find('a').removeClass('redhover');
			_this.addClass('redhover');
			var a_name=_this.text();
//			console.log(a_name);
			var cate_id="{{$search_show->cate_id}}";
			var a_id=_this.attr("a_id");
			var sid="{{$sku_res->sid}}";
//			alert(sid);return false;
			var brand_name=$("#brand_name").val();
			$("#aid").show();
			$("#aid").text(a_name);
			if(brand_name==''){
				brand_name=null;
			}
			var goods_price=$("#goods_price").val();
			if(goods_price==''){
				goods_price=null;
			}
			var url="/index/search_price";
			$.ajax({
				url:url,
				type:'post',
				data:{a_name:a_name,cate_id:cate_id,goods_price:goods_price,brand_id:brand_name,a_id:a_id,sid:sid},
				dataType:'html',
				success:function(msg){
					$('.newinfo').html(msg);
				}
			});
		});
	});
</script>