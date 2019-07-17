@extends("Admin.AdminPublic.public")
@section("main")
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<article class="page-container">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 密码管理 <span class="c-gray en">&gt;</span> 修改密码 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<form action="/adminusers/update" method="post" class="form form-horizontal" id="form-member-add">
	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$data->name}}" placeholder="" name="name" readonly="true">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>新密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" value="" placeholder="" id="mobile" name="password">
			</div>
		</div>

		{{method_field('PUT')}}
		{{csrf_field()}}
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	
	</form>
</article>
</body>
</html>
@endsection
@section("title","个人信息")