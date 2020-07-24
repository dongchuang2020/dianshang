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
<form action="{{url('/admins/do_upgoods')}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="hidden" value="{{$data->goods_id}}" name="goods_id">
    </div>
    <div class="form-group">
        <label for="email" class="text-primary">商品名称</label>
        <input type="text" class="form-control" name="goods_name" value="{{$data->goods_name}}" style="width:200px">
    </div>
    <div class="form-group">
        <h6 class="text-primary">商品品牌</h6><select name="brand_id" id="" class="text-primary" >
            <option value="">--请选择--</option>
            @foreach($brand_info as $v)
                <option value="{{$v->brand_id}}" @if($v->brand_id==$data->brand_id) selected @endif class="form-control">{{$v->brand_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <h6 class="text-primary">商品属性名</h6><select name="sid" class="text-primary">
            <option value="">--请选择--</option>
            @foreach($sku_name as  $kk=>$vv)
                <option value="{{$vv->sid}}" @if($vv->sid==$data->sid) selected @endif class="form-control">{{$vv->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <h6 class="text-primary">商品属性值</h6><select name="a_id" class="text-primary">
            <option value="">--请选择--</option>
            @foreach($attr_info as  $key=>$val)
                <option value="{{$val->a_id}}" @if($val->a_id==$data->a_id) selected @endif class="form-control">{{$val->a_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <h6 class="text-primary">商品分类</h6><select name="cate_id" class="text-primary">
            <option value="">--请选择--</option>
            @foreach($cate_info as  $kkk=>$vvv)
                <option value="{{$vvv->cate_id}}" @if($vvv->cate_id==$data->cate_id) selected @endif class="form-control">{{$vvv->cate_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="pwd" class="text-primary">商品价格</label>
        <input type="text" class="form-control" name="goods_price" value="{{$data->goods_price}}" style="width:200px">
    </div>
    <div class="form-group">
        <label for="pwd" class="text-primary">商品数量</label>
        <input type="text" class="form-control" name="goods_num" value="{{$data->goods_num}}" style="width:200px">
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1" class="text-primary">商品图片</label>
        <input type="file" class="form-control-file" name="goods_log">
        <td><img src="{{$data->goods_log}}" alt="" width="100px" height="120px" ></td>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1" class="text-primary">商品描述</label>
        <textarea class="form-control" name="goods_desc" rows="3" style="width:200px">{{$data->goods_desc}}</textarea>
    </div>
    <label for="email" class="text-primary">是否展示</label>
    <div class="input-group mb-3">
        @if($data->is_show==1)
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="radio" value="1" name="is_show" checked>是
            </div>
            <div class="input-group-text">
                <input type="radio" value="2" name="is_show">否
            </div>
        </div>
        @elseif($data->is_show==2)
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="radio" value="1" name="is_show" >是
                </div>
                <div class="input-group-text">
                    <input type="radio" value="2" name="is_show" checked>否
                </div>
            </div>
        @endif
    </div>
    <label for="email" class="text-primary">是否热卖</label>
    <div class="input-group mb-3">
        @if($data->is_hot==1)
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="radio" value="1" name="is_hot" checked>是
            </div>
            <div class="input-group-text">
                <input type="radio" value="2" name="is_hot">否
            </div>
        </div>
        @elseif($data->is_hot==2)
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="radio" value="1" name="is_hot" >是
                </div>
                <div class="input-group-text">
                    <input type="radio" value="2" name="is_hot" checked>否
                </div>
            </div>
        @endif
    </div>
    <label for="email" class="text-primary">是否上架</label>
    <div class="input-group mb-3">
        @if($data->is_sell==2)
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="radio" value="1" name="is_sell">是
            </div>
            <div class="input-group-text">
                <input type="radio" value="2" name="is_sell" checked>否
            </div>
        </div>
        @elseif($data->is_sell==1)
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="radio" value="1" name="is_sell" checked>是
                </div>
                <div class="input-group-text">
                    <input type="radio" value="2" name="is_sell" >否
                </div>
            </div>
        @endif
    </div>
    <label for="email" class="text-primary">是否新品</label>
    <div class="input-group mb-3">
        @if($data->is_new==1)
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="radio" value="1" name="is_new" checked>是
            </div>
            <div class="input-group-text">
                <input type="radio" value="2" name="is_new">否
            </div>
        </div>
        @elseif($data->is_new==2)
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="radio" value="1" name="is_new" >是
                </div>
                <div class="input-group-text">
                    <input type="radio" value="2" name="is_new" checked>否
                </div>
            </div>
        @endif
    </div>
    <button class="btn btn-success">修改</button>
</form>
</body>
</html>