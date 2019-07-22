@extends("Admin.AdminPublic.public")
@section("main")
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 公告管理 <span class="c-gray en">&gt;</span> 公告修改 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<script type="text/javascript" charset="utf-8" src="/static/Admins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/Admins/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/static/Admins/ueditor/lang/zh-cn/zh-cn.js"></script>
<article class="page-container">
	<form action="/articleedit/{{$info->id}}" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data">

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$info->title}}" placeholder="" id="name" name="title">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>文章作者：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$info->staffld}}" placeholder="" id="phone" name="staffld">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>发布时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$info->created_at}}" name="created_at" id="created_at">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">文章内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor" name="content" type="text/plain" value="" style="width:100%;height:100px;">{!!$info->content!!}</script> 
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">略缩图：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="btn-upload form-group">
				<input class="input-text radius" upload-url type="text" name="face" readonly nullmsg="请添加附件！" style="width:200px">
				<a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
				<input type="file" multiple name="face" class="input-file">
				</span>
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
<script>
	var ue = UE.getEditor('editor');
</script
@endsection
@section("title","后台公告修改")