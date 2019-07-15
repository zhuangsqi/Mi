@extends("Admin.AdminPublic.public")
@section("main")
@section("title","轮播图列表")

<div class="page-container">
	<div class="text-c">
		<input type="text" name="" id="" placeholder="分类名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		<a class="btn btn-primary radius" onclick="system_category_add('添加资讯','system-category-add.html')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加分类</a>
		</span>
		<span class="r">共有数据：<strong>54</strong> 条</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="80">编号</th>
					<th width="80">指向网址</th>
					<th width="80">预览</th>
					<th width="60">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $row)
				<tr class="text-c">
					<td><input type="checkbox" name="" value=""></td>
					<td>{{$row->id}}</td>
					<td>{{$row->code}}</td>
					<td>{{$row->url}}</td>
					<td><img src="/uploads/{{$row->pic}}" width="200px" height="100px"></td>
					<td class="f-14">
						<form action="/lbt/{{$row->id}}" method="post">
						{{method_field("DELETE")}}
						{{csrf_field()}}
							<button title="删除" href="/Lbt/destroy" onclick="system_category_del(this,'1')" class="ml-5" style="text-decoration:none; float:right;margin-right:30px;"><i class="Hui-iconfont">&#xe6e2;</i></button>
						</form>
							<button><a title="编辑" href="/lbt/{{$row->id}}/edit" onclick="system_category_edit('图片编辑','system-category-add.html','1','700','480')" style="text-decoration:none; float:right;"><i class="Hui-iconfont">&#xe6df;</i></a></button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection