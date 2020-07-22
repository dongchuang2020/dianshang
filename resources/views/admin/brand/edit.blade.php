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
    <h3 class="box-title">品牌编辑</h3>
</div>
<div>
    <center>
        <div class="form-group form-inline" >
            <form class="m-t" role="form" action="{{url('/brand/update')}}" method="post" enctype="multipart/form-data">
                <div  class="form-group form-inline">
                    <input type="hidden" value="{{$res->brand_id}}" name="brand_id">
                    <table class="table table-bordered table-striped" >
                        <tr>
                            <td>品牌名称</td>
                            <td width="450"><input type="text" name="brand_name" value="{{$res->brand_name}}"  class="form-control" placeholder="品牌名称"  ng-model="entity.title">  </td>
                        </tr>
                        <tr>
                            <td>分类名称</td>
                            <td width="450">
                                <select name="cate_id" class="form-control">
                                    <option value="0">--请选择--</option>
                                    @foreach($re as $k=>$v)
                                        @if($v->cate_id==$res->cate_id)
                                    <option value="{{$v->cate_id}}" selected="selected">{{$v->cate_name}}</option>
                                        @else
                                            <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>品牌图片</td>
                            <td width="450">
                                <input type="file" name="brand_img" value="{{$res->brand_img}}"  class="form-control" placeholder="品牌名称"  ng-model="entity.title">
                                <img src="http://uploads.1909.com/{{$res->brand_img}}" width="45px">
                            </td>
                        </tr>
                        <tr>
                            <td>是否展示</td>
                            <td width="450">
                                @if($res->brand_show==1)
                                <input type="radio" name="brand_show" value="1" checked> 是
                                <input type="radio" name="brand_show" value="2" > 否
                                @else
                                    <input type="radio" name="brand_show" value="1"> 是
                                    <input type="radio" name="brand_show" value="2"  checked> 否
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="submit" value="编辑"  class="btn btn-success">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
</div>
</html>
</center>