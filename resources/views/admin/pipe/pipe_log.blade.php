<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>品优购运营商运营管理后台</title>
    <link rel="icon" href="../assets/img/favicon.ico">


    <link rel="stylesheet" type="text/css" href="/front/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/front/css/pages-login-manage.css" />
    <script src="/front/js/plugins/jquery/jquery.min.js"></script>
</head>

<body>
<div class="loginmanage">
    <div class="py-container">
        <h4 class="manage-title">品优购运营商运营管理后台</h4>
        <div class="loginform">

            <ul class="sui-nav nav-tabs tab-wraped">
                <li>
                    <a href="#index" data-toggle="tab">
                        <h3>扫描登录</h3>
                    </a>
                </li>
                <li class="active">
                    <a href="#profile" data-toggle="tab">
                        <h3>账户登录</h3>
                    </a>
                </li>
            </ul>
            <div class="tab-content tab-wraped">
                <div id="index" class="tab-pane">
                    <p>二维码登录，暂为官网二维码</p>
                    <img src="../img/wx_cz.jpg" />
                </div>
                <div id="profile" class="tab-pane  active">
                    <form class="sui-form">
                        <div class="input-prepend"><span class="add-on loginname"></span>
                            <input  type="text" id="yong" placeholder="用户名" class="span2 input-xfat">
                        </div>
                        <div class="input-prepend"><span class="add-on loginpwd"></span>
                            <input  type="password"  id="mi" placeholder="请输入密码" class="span2 input-xfat">
                        </div>
                        <div class="logined">
                            <a class="sui-btn btn-block btn-xlarge btn-danger" href="/admin/pipe_add" target="_blank">注&nbsp;&nbsp;册</a>
                        </div>
                        <div class="logined">
                            <button class="sui-btn btn-block btn-xlarge btn-danger" id="dong" target="_blank">登&nbsp;&nbsp;录</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>


<!--foot-->
<div class="py-container copyright">
    <ul>
        <li>关于我们</li>
        <li>联系我们</li>
        <li>联系客服</li>
        <li>商家入驻</li>
        <li>营销中心</li>
        <li>手机品优购</li>
        <li>销售联盟</li>
        <li>品优购社区</li>
    </ul>
    <div class="address">地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</div>
    <div class="beian">京ICP备08001421号京公网安备110108007702
    </div>
</div>


<script type="text/javascript" src="/front/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/front/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/front/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script src="/front/js/pages/jquery.slideunlock.js"></script>
<script>
    $(function(){
        var slider = new SliderUnlock("#slider",{
            successLabelTip : "欢迎访问品优购"
        },function(){
            // alert("验证成功,即将跳转至首页");
            // window.location.href="index.html"
        });
        slider.init();
    })
    $('#dong').on('click',function () {
        var yong = $('#yong').val();
        var mi = $('#mi').val();
        $.ajax({
            url:'/admin/pipe_logs',
            type:'get',
            data:{
                'yong':yong,
                'mi':mi
            },
            success:function (mo) {
                alert(mo);
            }
        })
    })
</script>
</body>

</html>