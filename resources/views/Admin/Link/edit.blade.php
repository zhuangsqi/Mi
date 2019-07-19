@extends("Admin.AdminPublic.public")
@section("main")
<article class="page-container">
	<form action="/link/{{$data->id}}" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>网站名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$data->name}}" placeholder="" id="mobile" name="name">
			</div>
		</div>	
		<div class="row cl" style="margin-left: 3px;">
			<label class="form-label col-xs-4 col-sm-3">网站LOGO：</label>
			<div class="formControls col-xs-8 col-sm-9" style="margin-left:-15px;"> <span class="btn-upload form-group">
				<input class="input-text upload-url" type="text" name="logo" id="uploadfile" readonly nullmsg="请添加附件！" style="width:200px">
				<a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
				<input type="file" multiple name="logo" class="input-file" value="{{$data->logo}}">
				</span> </div>
		</div>
		<div class="row cl" style="margin-left: 120px;">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>连接审核：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="radio-box">
					<input  type="radio" value="1" name="status" @if($data->status==1)checked @endif >
					<label for="1">开启 </label>
				</div>
				<div class="radio-box">
					<input type="radio" value="0" name="status" @if($data->status==0) checked @endif>
					<label for="0">禁用</label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>网站网址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$data->adress}}" placeholder="" id="mobile" name="adress">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">网站描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="descr" cols="" rows="" class="textarea"  placeholder="网站描述" onKeyUp="$.Huitextarealength(this,100)" >{{$data->descr}}</textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div>
		{{method_field("PUT")}}
		{{csrf_field()}}
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>
@endsection
@section("title","有情连接修改")
