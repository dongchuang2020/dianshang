<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="/front/plugins/jQuery/jquery-2.2.3.min.js"></script>
</head>
<body>

    <div class="form-group">
        <label for="email" class="text-primary">属性名</label>
        <input type="text" class="form-control" name="name" id="name" style="width:200px">
    </div>
    <button class="btn btn-success">提交</button>

</body>
</html>
<script>
    $(document).on('click','.btn',function () {
        var name = $("#name").val();
        var url = '/admins/do_addsku';
        $.ajax({
            type:'post',
            data:{'name':name},
            dataType:'json',
            url:url,
            success:function (res) {
                if(res.code == '00000'){
                    alert(res.msg)
                    window.location.href = '/admins/skulist';
                }
                if(res.code == '00001'){
                    alert(res.msg)
                }
                if(res.code == '00002'){
                    alert(res.msg)
                }
            }
        })
    })
</script>