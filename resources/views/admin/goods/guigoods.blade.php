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
        <div class="form-group form-inline">
            <form action="{{url('/admins/do_guigoods')}}" method="post" enctype="multipart/form-data">
                <div  class="form-group form-inline">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>商品名称</td>
                            <input type="hidden" name="goods_id" value="{{$goods_id->goods_id}}" />
                            <td width="450"><input type="text"  name="goods_name"  value="{{$goods_id->goods_name}}" class="form-control" placeholder="商品名称"  ng-model="entity.title">  </td>
                        </tr>
                        <tr>
                            <td>商品属性名</td>
                            <td width="450">
                                <select name="sid" class="changearea">
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
<script>
    $(document).on('change','.changearea',function () {
        var id = $(this).val();
        var url = '/admins/gui';
        $.ajax({
            url:url,
            data:{'id':id},
            dataType:'json',
            type: "post",
            success:function (res) {
                $("select[name='a_id']").empty();
                $.each(res,function(k,v){
                    var _option = "";
                    _option += "<option value='"+v.a_id+"'>"+v.a_name+"</option>";
                    $("select[name='a_id']").append(_option);
                });
            }
        })
    })
</script>
