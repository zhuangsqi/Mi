@extends("Admin.AdminPublic.public")
@section("main")

<article class="page-container">
	<form class="form form-horizontal" action="/adminroles" method="post" >
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="adminName" name="name">
		</div>
	</div>
	
	<div class="row cl">
	{{csrf_field()}}
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

@endsection
@section("title","后台角色添加")