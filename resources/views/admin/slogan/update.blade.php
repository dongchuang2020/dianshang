<!-- 广告修改窗口 -->
<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>广告管理</title>
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
        <h3 class="box-title">修改广告管理</h3>   
    </div>
    <div>
    <center>
    <div class="form-group form-inline" >
            <form class="m-t" role="form" action="{{url('slogan/updatedo')}}" method="post" enctype="multipart/form-data">
            <div  class="form-group form-inline">							
                <table class="table table-bordered table-striped" >
                     <input type="hidden" value="{{$res->slogan_id}}" name="slogan_id">
                    <tr>
                        <td>广告标题</td>
                        <td width="450"><input type="text" name="slogan_title" id="slogan_title" value="{{$res->slogan_title}}"  class="form-control" placeholder="名称"  ng-model="entity.title">  </td>
                    </tr> 
                    <tr>
		      		<td>广告分类</td>
		      		<td>
		      			<select name="slogancate_id">
		      				<option value="0">--请选择--</option>
		      				@foreach($slogancate as $k=>$v)
		      				<option value="{{$v->slogancate_id}}" @if($v->slogancate_id==$res->slogancate_id) selected @endif>{{$v->slogancate_name}}</option>
		      				@endforeach
		                </select>
		      		</td>
		      	</tr>
                    <tr>
                        <td>广告url</td>
                        <td width="450"><input type="text" name="slogan_url" id="slogan_url" value="{{$res->slogan_url}}"  class="form-control" placeholder="名称"  ng-model="entity.title">  </td>
                    </tr> 
                    <tr>
		      		<td>广告图片</td>
		      		<td>
						<table>
							<tr>
								<td>
								<input type="file" name="slogan_img" value="{{$res->slogan_img}}"/>		
								<img src="{{$res->slogan_img}}" alt="" width="120px" height="80px">
							    </td>
							</tr>						
						</table>
		      		</td>
		      	    </tr>
                    <tr>
                        <td>广告排序</td>
                        <td width="450"><input type="text" name="slogan_sort" id="slogan_sort" value="{{$res->slogan_sort}}"  class="form-control" placeholder="名称"  ng-model="entity.title">  </td>
                    </tr> 
                    <tr>
                        <td>
                            <input type="submit"  class="btn btn-success">
                        </td>
                    </tr>		       	
                </table>				        
    </div>
        </form>
</div>
</div>
</center>
