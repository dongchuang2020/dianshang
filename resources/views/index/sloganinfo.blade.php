<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
  <title>广告详情页</title>
   <link rel="icon" href="assets//index/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-item.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-zoom.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/widget-cartPanelView.css" />
</head>

<body>
  <!-- 头部栏位 -->
  <!--页面顶部-->
<div id="nav-bottom">
  <!--顶部-->
  @include('index.ding');
  
</div>

  <div class="py-container">
    <div id="item">
      <div class="crumb-wrap">
        <ul class="sui-breadcrumb">
        </ul>
      </div>
      <!--product-info-->
      <div class="product-info">
        <div class="fl preview-wrap">
          <!--放大镜效果-->
          <div class="zoom">
            <!--默认第一个预览-->
          
              <span class="jqzoom"><img jqimg="/index/img/_/b1.png" src="{{$res->slogan_img}}" width="460" /></span>
                <h4>&nbsp;&nbsp;&nbsp;{{$res->slogan_title}}</h4>
          </div>
        </div>
        <div class="fr itemInfo-wrap">
          <div class="sku-name">
            <h4>&nbsp;
            &nbsp;
            &nbsp;{{$res->slogan_info}}</h4>
          </div>
              
            </div>
            <div class="summary-wrap">
              <div class="fl title">
                <div class="control-group">
                </div>
              </div>
              <div class="fl">
                <ul class="btn-choose unstyled">
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--product-detail-->
 
  <!-- 底部栏位 -->
  <!--页面底部-->
<div class="like">
    <div class="py-container">
        <div class="title">
            <h3 class="fl">猜你喜欢</h3>
            <b class="border"></b>
            <a href="javascript:;" class="fr tip changeBnt" id="xxlChg"><i></i>换一换</a>
        </div>
        <div class="bd">
            <ul class="clearfix yui3-g Favourate picLB" id="picLBxxl">
                @foreach($historyShow as $v)
                <li class="yui3-u-1-6">
                    <dl class="picDl huozhe">
                        <dd>
                            <a href="{{url('details/index/'.$v->goods_id)}}" class="pic"><img src="{{$v->goods_log}}" alt="" style="width:204px;height:245px;"/></a>
                            <div class="like-text">
                                <p>{{$v->goods_name}}</p>
                                <h3>¥{{$v->goods_price}}</h3>
                            </div>
                        </dd>
                    </dl>

                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>