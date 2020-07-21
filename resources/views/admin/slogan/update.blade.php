<!-- 广告修改窗口 -->
<form action="{{url('slogan/updatedo')}}" method="post" enctype="multipart/form-data">
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">广告修改</h3>
			<input type="hidden" value="{{$res->slogan_id}}" name="slogan_id">
		</div>
		<div class="modal-body">							
			
			<table class="table table-bordered table-striped"  width="800px">
				<tr>
		      		<td>广告标题</td>
		      		<td><input name="slogan_title" id="slogan_title" value="{{$res->slogan_title}}" class="form-control" placeholder="标题"  ng-model="entity.title">  </td>
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
		      		<td>广告URL</td>
		      		<td><input name="slogan_url" id="slogan_url" value="{{$res->slogan_url}}" class="form-control" placeholder="URL" ng-model="entity.url">  </td>
		      	</tr>			      	
		      	<tr>
		      		<td>广告图片</td>
		      		<td>
						<table>
							<tr>
								<td>
								<input type="file" name="slogan_img" value="{{$res->slogan_img}}"/>		
								<img src="{{env('UPLOAD_URL')}}{{$res->slogan_img}}" width="100px" height="50px">
							    </td>
							</tr>						
						</table>
		      		</td>
		      	</tr>	
		      	<tr>
		      		<td>广告排序</td>
		      		<td><input name="slogan_sort" id="slogan_sort" value="{{$res->slogan_sort}}" class="form-control" placeholder="排序" ng-model="entity.sortOrder">  </td>
		      	</tr>	       	
			 </table>				
			
		</div>
		<div class="modal-footer">					
			<input type="submit" value="修改"  class="btn btn-primary" >
		</div>
	  </div>
	</div>
</div>
</form>
