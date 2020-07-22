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
<form action="{{url('/admin/do_goodsadd')}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="email" class="text-primary">商品名称</label>
        <input type="text" class="form-control" name="goods_name">
    </div>
    <div class="form-group">
        <label for="pwd" class="text-primary">商品价格</label>
        <input type="text" class="form-control" name="goods_price">
    </div>
    <div class="form-group">
        <label for="pwd" class="text-primary">商品数量</label>
        <input type="text" class="form-control" name="goods_num">
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1" class="text-primary">商品图片</label>
        <input type="file" class="form-control-file" name="goods_log">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1" class="text-primary">商品描述</label>
        <textarea class="form-control" name="goods_desc" rows="3"></textarea>
    </div>
    <label for="email" class="text-primary">是否展示</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="radio" value="1" name="is_show" checked>是
            </div>
            <div class="input-group-text">
                <input type="radio" value="2" name="is_show">否
            </div>
        </div>
    </div>
    <label for="email" class="text-primary">是否热卖</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="radio" value="1" name="is_hot" checked>是
            </div>
            <div class="input-group-text">
                <input type="radio" value="2" name="is_hot">否
            </div>
        </div>
    </div>
    <label for="email" class="text-primary">是否上架</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="radio" value="1" name="is_sell">是
            </div>
            <div class="input-group-text">
                <input type="radio" value="2" name="is_sell" checked>否
            </div>
        </div>
    </div>
    <label for="email" class="text-primary">是否新品</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="radio" value="1" name="is_new" checked>是
            </div>
            <div class="input-group-text">
                <input type="radio" value="2" name="is_new">否
            </div>
        </div>
    </div>
    <button class="btn btn-success">提交</button>
</form>
</body>
</html>