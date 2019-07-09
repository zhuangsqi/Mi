@extends("Admin.AdminPublic.public")
@section("main")
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-admin-role-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="" id="roleName" name="roleName" value="{{$adminuser->name}}">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">权限分配：</label>
			<div class="formControls col-xs-8 col-sm-9">
			
				<dl class="permission-list">
					
					<dd>
						<dl class="cl permission-list2">
							<dt>
							
						
							@foreach($role as $val)
							
								<label class="">
									<input type="checkbox" name="rids[]" value="{{$val->id}}" @if(in_array($val->id,$rids)) checked @endif>
									{{$val->name}}</label>
							
									
							</dt>
							{{csrf_field()}}
							<br>
							@endforeach
						</dl>
					</dd>
				</dl>
			</div>
			
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button type="submit" class="btn btn-success radius" id="admin-role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
	</form>
</article>
@endsection
@section("title","管理员列表")