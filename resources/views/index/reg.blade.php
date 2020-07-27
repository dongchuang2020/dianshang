<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>个人注册</title>


    <link rel="stylesheet" type="text/css" href="css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="css/pages-register.css" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>

<body>
<div class="register py-container ">
    <!--head-->
    <div class="logoArea">
        <a href="" class="logo"></a>
    </div>
    <!--register-->
    <div class="registerArea">
        <h3>注册新用户<span class="go">我有账号，去<a href="login.html" target="_blank">登陆</a></span></h3>
        <div class="info">
            <form class="sui-form form-horizontal">
                <div class="control-group">
                    <label class="control-label">用户名：</label>
                    <div class="controls">
                        <input type="text" placeholder="请输入你的用户名" class="input-xfat input-xlarge" id="user_name">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputPassword" class="control-label">登录密码：</label>
                    <div class="controls">
                        <input type="password" placeholder="设置登录密码" class="input-xfat input-xlarge" id="user_pwd">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputPassword" class="control-label">确认密码：</label>
                    <div class="controls">
                        <input type="password" placeholder="再次确认密码" class="input-xfat input-xlarge" id="user_pwd1">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">手机号：</label>
                    <div class="controls">
                        <input type="text" placeholder="请输入你的手机号" class="input-xfat input-xlarge" id="phone">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputPassword" class="control-label">短信验证码：</label>
                    <div class="controls">
                        <input type="text" placeholder="短信验证码" class="input-xfat input-xlarge" id="code">  <a id="send">获取短信验证码</a>
                    </div>
                </div>

                <div class="control-group">
                    <label for="inputPassword" class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <div class="controls">
                        <input name="m1" type="checkbox" value="2" checked=""><span>同意协议并注册《品优购用户协议》</span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls btn-reg">
                        <a class="sui-btn btn-block btn-xlarge btn-danger" target="_blank" id="but">完成注册</a>
                    </div>
                </div>
            </form>
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
</div>


<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/pages/register.js"></script>
</body>

</html>
<script>
    $(document).on('click','#send',function () {
        var phone = $("#phone").val();
        var url = '/index/sendcode';
        $.ajax({
            data:{'phone':phone},
            url:url,
            type:'get',
            dataType:'json',
            success:function (res) {
                if(res.code == '00001'){
                    alert(res.msg)
                }
                if(res.code == '00004'){
                    alert(res.msg)
                }
            }
        });
        return false
    })
    $(document).on('click','#but',function () {
        var user_name = $("#user_name").val();
        var user_pwd = $("#user_pwd").val();
        var user_pwd1 = $("#user_pwd1").val();
        var phone = $("#phone").val();
        var code = $("#code").val();
        var data = {};
        data.user_name = user_name;
        data.user_pwd = user_pwd;
        data.user_pwd1 = user_pwd1;
        data.phone = phone;
        data.code = code;
        var url = '/index/do_reg';
        $.ajax({
            data:data,
            url:url,
            type:'post',
            dataType:'json',
            success:function (res) {
                if(res.code == '00000'){
                    alert(res.msg);
                    window.location.href = '/index/log';
                }
                if(res.code == '00001'){
                    alert(res.msg);
                }
            }
        });
    })
</script>