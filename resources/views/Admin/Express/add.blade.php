@extends("Admin.AdminPublic.public")
@section("main")
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 快递管理 <span class="c-gray en">&gt;</span> 快递添加 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<article class="page-container">
	<form class="form form-horizontal" action="/express" method="post" enctype="multipart/form-data">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>快递名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text radius" value="" placeholder="" id="adminName" name="name">
		</div>
	</div>
	<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">Logo：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="btn-upload form-group">
				<input class="input-text radius" upload-url" type="text" name="logo" id="face" readonly nullmsg="请添加附件！" style="width:200px">
				<a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
				<input type="file" multiple name="logo" class="input-file">
				</span>
			</div>
		</div>
	<div class="row cl">
	{{csrf_field()}}
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" onClick="member_huanyuan(this,'1')" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

@endsection
@section("title","后台快递添加")