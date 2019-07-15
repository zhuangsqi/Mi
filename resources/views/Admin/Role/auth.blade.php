@extends("Admin.AdminPublic.public")
@section("main")
<article class="page-container">
	<form action="/saveauth" method="post" class="form form-horizontal" id="form-admin-role-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="" id="roleName" name="roleName" value="{{$role->name}}">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">权限分配：</label>
			<div class="formControls col-xs-8 col-sm-9">
			
				<dl class="permission-list">
					
					<dd>
						<dl class="cl permission-list2">
							<dt>
							
							@foreach($auth as $val)

								<label class="">
									<input type="checkbox" name="nid[]" value="{{$val->id}}" @if(in_array($val->id,$nid)) checked @endif>
									{{$val->name}}</label>			
							</dt>
							
							<br>
							@endforeach
							

						</dl>
					</dd>
				</dl>
			</div>
			
		</div>
		<div class="row cl">
		{{csrf_field()}}
		<input type="hidden" value="{{$role->id}}" name="rid">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				 <input type="submit" class="btn btn-success" value="确定">

			</div>
		</div>
	</form>
</article>
@endsection
@section("title","管理员列表")