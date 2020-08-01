<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>设置-个人信息</title>
     <link rel="icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-seckillOrder.css" />
</head>

<body>
    <!-- 头部栏位 -->
    <!--页面顶部-->
<div id="nav-bottom">
	<!--顶部-->
	@include('index.ding')
</div>

<script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
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
<script type="text/javascript" src="/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/index/js/widget/nav.js"></script>
<script type="text/javascript" src="pages/userInfo/distpicker.data.js"></script>
<script type="text/javascript" src="pages/userInfo/distpicker.js"></script>
<script type="text/javascript" src="pages/userInfo/main.js"></script>
</body>
    <!--header-->
    <div id="account">
        <div class="py-container">
            <div class="yui3-g home">
                <!--左侧列表-->
                <div class="yui3-u-1-6 list">

                    <div class="person-info">
                        <div class="person-photo"><img src="img/_/photo.png" alt=""></div>
                        <div class="person-account">
                            <span class="name">Michelle</span>
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
							<dd><a href="home-person-collect.html" >我的收藏</a></dd>
							<dd><a href="home-person-footmark.html" >我的足迹</a></dd>
						</dl>
						<dl>
							<dt><i>·</i> 物流消息</dt>
						</dl>
						<dl>
							<dt><i>·</i> 设置</dt>
							<dd><a href="home-setting-info.html" >个人信息</a></dd>
							<dd><a href="home-setting-address.html" class="list-active" >地址管理</a></dd>
							<dd><a href="home-setting-safe.html" >安全管理</a></dd>
						</dl>
                    </div>
                </div>
                <!--右侧主内容-->
                <div class="yui3-u-5-6">
                    <div class="body userAddress">
                        <div class="address-title">
                            <span class="title">地址管理</span>
                            <a data-toggle="modal" data-target=".edit" data-keyboard="false"   class="sui-btn  btn-info add-new">添加新地址</a>
                            <span class="clearfix"></span>
                        </div>
                        <div class="address-detail">
                            <table class="sui-table table-bordered">
                                <thead>
                                    <tr>
                                        <th>姓名</th>
                                        <th>地址</th>
                                        <th>联系电话</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($areaShow as $k=>$v)
                                    <tr ress_id="{{$v->ress_id}}">
                                        <td>{{$v->name}}</td>
                                        <td>{{$v->obj}}{{$v->ress}}</td>
                                        <td>{{$v->tel}}</td>
                                        <td>
                                            <a href="{{url('/addressUpdate/'.$v->ress_id)}}">编辑</a>
                                            <a href="#" id="del">删除</a>
                                            <span class="is_default" is_default="{{$v->is_default}}">{{$v->is_default=="1"?"默认地址":"设置默认"}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                       
                                </tbody>
                            </table>                          
                        </div>
                        <!--新增地址弹出层-->
                         <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit" style="width:580px;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
                                        <h4 id="myModalLabel" class="modal-title">新增地址</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('/addressDo')}}" method="post" class="sui-form form-horizontal">
                                            <div class="control-group">
                                            <label class="control-label">收货人：</label>
                                            <div class="controls">
                                                <input type="text" name="name" id="name" class="input-medium">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">所在地区：</label>
                                            <div class="controls">
                                                <div data-toggle="distpicker">
                                                <div class="form-group area">
                                                    <select class="form-control changearea" id="province" name="province">
                                                    	<option value="0">--请选择--</option>
                                                    	@foreach($areaInfo as $k=>$v)
                                                    	<option value="{{$v['id']}}">{{$v['name']}}</option>
                                                    	@endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group area">
                                                     <select name="city" id="city" >
        												<option value="" selected="selected">--请选择--</option>
    												 </select>
                                                </div>
                                                <div class="form-group area">
    												<select name="area" id="area">
    												    <option value="" selected="selected">--请选择--</option>
    												</select>
                                                </div>
                                            </div>
                                            </div>									 
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">详细地址：</label>
                                            <div class="controls">
                                                <input type="text" name="ress" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">联系电话：</label>
                                            <div class="controls">
                                                <input type="text" name="tel" class="input-medium">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">邮箱：</label>
                                            <div class="controls">
                                                <input type="text" name="email" class="input-medium">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="添加">
                                        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
                                    </div>
                                    </form>
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
</html>

<script src="/jquery.js"></script>
<script>
	$(document).on("change",".changearea",function(){
			var id = $(this).val();
			var url = '/getcity';
			var data={};
			data.id=id;
			$.ajax({
				type:"post",
				dataType:"json",
				data:data,
				url:url,
				success:function(res){
					$("select[name='city']").empty();
                	$.each(res,function(k,v){
                    var _option = "";
                    _option += "<option value='"+v.id+"'>"+v.name+"</option>";
                    $("select[name='city']").append(_option);
                });
				}
			})
		})
	$(document).on("change","#city",function(){
			var id=$(this).val();
			var url="/getarea";
			var data={};
			data.id=id;
			$.ajax({
				url:url,
				data:data,
				dataType:"json",
				type:"post",
				success:function(res){
					$("select[name='area']").empty();
                	$.each(res,function (k,v) {
                    var _option = "";
                    _option += "<option value='"+v.id+"'>"+v.name+"</option>";
                    $("select[name='area']").append(_option);
                    })
				}
			})
		})
	$(document).on("click","#del",function(){
		var ress_id=$(this).parents("tr").attr("ress_id");
		if(window.confirm("是否确认删除")){
			var url="/addressDel";
			var data={};
			data.ress_id=ress_id;
			$.ajax({
				type:"post",
				dataType:"json",
				data:data,
				url:url,
				success:function(res){
					if(res.success=="true"){
						alert("删除成功");
						window.location=res.url;
					}
					if(res.success=="false"){
						alert("删除失败");
						return false;
					}
				}
			})
		}	
	})
	$(document).on("click",".is_default",function(){
		var _this=$(this);
		var is_default=$(this).attr('is_default');
		var ress_id=$(this).parents("tr").attr("ress_id");
		var url="/addressChange";
		$.ajax({
				type:"post",
				dataType:"json",
				data:{is_default:is_default,ress_id:ress_id},
				url:url,
				success:function(res){
					if(res.success=="true"){
						alert("设置默认地址成功");
						location.href=res.url;
					}
					if(res.success=="default"){
						alert("已经是默认地址");
						location.href=res.url;
					}
				}
			})
	})
</script>