<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>欢迎登录</title>

    <link rel="stylesheet" type="text/css" href="css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="css/pages-login.css" />
</head>

<body>
<div class="login-box">
    <!--head-->
{{-- <div class="py-container logoArea">
     <a href="" class="logo"></a>
 </div>--}}
<!--loginArea-->
    <div class="loginArea">
        <div class="py-container login">
            <div class="loginform">
                <div class="tab-content tab-wraped">

                    <div id="profile" class="tab-pane  active">
                        <form class="sui-form" action="{{url('/index/do_forget')}}" method="post">
                            <div class="input-prepend"><span class="add-on loginname"></span>
                                <input id="prependedInput" type="text" name="user_name" style="height: 36px" placeholder="邮箱/用户名/手机号" class="span2 input-xfat">
                            </div>
                            <div class="input-prepend"><span class="add-on loginpwd"></span>
                                <input id="prependedInput" type="password" name="user_pwd" style="height: 36px" placeholder="请输入密码" class="span2 input-xfat">
                            </div>

                            <div class="logined">
                                <button class="sui-btn btn-block btn-xlarge btn-danger">修   改</button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
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
</div>

<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/pages/login.js"></script>
</body>

</html>
{{--<script>--}}
{{--$(document).on('click','#forget',function () {--}}
{{--alert(1)--}}
{{--})--}}
{{--</script>--}}