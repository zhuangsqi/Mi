@extends("Admin.AdminPublic.public")
@section("main")
<article class="page-container">
	<form action="/saveauth" method="post" class="form form-horizontal"> 
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">权限信息:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<dl class="permission-list">
					<dt>
						<label>
							当前角色:{{$role->name}}的角色信息
							</label>
					</dt>
					<dd>
						<dl class="cl permission-list2">
							<dd>
							@foreach($auth as $row)
								<label class="">
									<input type="hidden" value="{{$role->id}}" name="rid">
									<input type="checkbox" value="{{$row->id}}" name="nid[]" @if(in_array($row->id,$nid)) checked @endif>&nbsp;&nbsp{{$row->name}}<br/>
								</label>
							@endforeach
							</dd>
						</dl>
					</dd>
				</dl>
			</div>
		</div>
		<div class="row cl">
		{{csrf_field()}}
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input type="submit" class="btn btn-success radius" value="分配权限">
			</div>
		</div>
	</form>
</article>
@endsection
@section("title","分配权限")