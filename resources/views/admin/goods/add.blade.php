<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>分类管理</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/front/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/front/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/front/css/style.css">
    <script src="/front/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/front/plugins/bootstrap/js/bootstrap.min.js"></script>

</head>
<div class="box-header with-border" align="center">
    <h3 class="box-title">商品管理</h3>
</div>
<div>
    <center>
        <div class="form-group form-inline" >
            <form action="{{url('/admins/do_goodsadd')}}" method="post" enctype="multipart/form-data">
                <div  class="form-group form-inline">
                    <table class="table table-bordered table-striped" >
                        <tr>
                            <td>商品名称</td>
                            <td width="450"><input type="text"  name="goods_name"  class="form-control" placeholder="商品名称"  ng-model="entity.title">  </td>
                        </tr>
                        <tr>
                            <td>商品品牌</td>
                            <td width="450">
                                <select name="brand_id">
                                    <option value="0">--请选择--</option>
                                    @foreach($brand_info as $v)
                                    <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>商品属性名</td>
                            <td width="450">
                                <select name="sid">
                                    <option value="0">--请选择--</option>
                                    @foreach($sku_name as $kk=>$vv)
                                        <option value="{{$vv->sid}}">{{$vv->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>商品属性值</td>
                            <td width="450">
                                <select name="a_id">
                                    <option value="0">--请选择--</option>
                                    @foreach($attr_info as $kkkk=>$vvvv)
                                        <option value="{{$vvvv->a_id}}">{{$vvvv->a_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>商品分类</td>
                            <td width="450">
                                <select name="cate_id">
                                    <option value="0">--请选择--</option>
                                    @foreach($cate_info as $kkk=>$vvv)
                                        <option value="{{$vvv->cate_id}}">{{$vvv->cate_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>商品价格</td>
                            <td width="450"><input type="text" name="goods_price"  class="form-control" placeholder="商品价格"  ng-model="entity.title">  </td>
                        </tr>
                        <tr>
                            <td>商品数量</td>
                            <td width="450"><input type="text" name="goods_num"  class="form-control" placeholder="商品数量"  ng-model="entity.title">  </td>
                        </tr>
                        <tr>
                            <td>商品图片</td>
                            <td width="450"><input type="file" name="goods_log"  class="form-control" placeholder="商品图片"  ng-model="entity.title">  </td>
                        </tr>
                        <tr>
                            <td>商品描述</td>
                            <td width="450">
                                <textarea name="goods_desc" class="form-control" id="" cols="30" rows="10"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>是否展示</td>
                            <td width="450">
                                <input type="radio" name="is_show" value="1" checked> 是
                                <input type="radio" name="is_show" value="2" > 否
                            </td>
                        </tr>
                        <tr>
                            <td>是否热卖</td>
                            <td width="450">
                                <input type="radio" name="is_hot" value="1" checked> 是
                                <input type="radio" name="is_hot" value="2" > 否
                            </td>
                        </tr>
                        <tr>
                            <td>是否上架</td>
                            <td width="450">
                                <input type="radio" name="is_sell" value="1" checked> 是
                                <input type="radio" name="is_sell" value="2" > 否
                            </td>
                        </tr>
                        <tr>
                            <td>是否新品</td>
                            <td width="450">
                                <input type="radio" name="is_new" value="1" checked> 是
                                <input type="radio" name="is_new" value="2" > 否
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btn-success">提交</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
</div>
</center>