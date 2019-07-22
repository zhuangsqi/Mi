@extends("Admin.AdminPublic.public")
@section("main")
@section("title","后台分类添加")
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 分类管理 <span class="c-gray en">&gt;</span> 分类添加 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form action="/admincates" method="post" class="form form-horizontal" id="form-article-add">
		 @if (count($errors) > 0)
       <div class="mws-form-message error">
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
       </div>
    @endif
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">分类名:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>父类</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="pid" class="select">
					<option value="0">--请选择--</option>
					@foreach($cates as $row)
					<option value="{{$row->id}}">{{$row->name}}</option>
					@endforeach
				</select>
				</span> 
			</div>
		</div>
		<div class="row cl">
			{{csrf_field()}}
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i>添加</button>
			</div>
		</div>
	</form>
</div>
@endsection

