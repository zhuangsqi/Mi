@extends("Admin.AdminPublic.public")
@section("main")
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
		<span class="r">共有数据：<strong>{{$tot}}</strong>条</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="80">分类名</th>
					<th>Pid</th>
					<th>Path</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cates as $row)
				<tr class="text-c">
					<td><input type="checkbox" name="" value=""></td>
					<td>{{$row->id}}</td>
					<td>{{$row->name}}</td>
					<td>{{$row->pid}}</td>
					<td class="text-l">{{$row->path}}</td>
					<td class="f-14">
						<form action="/admincates/{{$row->id}}" method="post">
						{{method_field("DELETE")}}
						{{csrf_field()}}
							<button title="删除" href="/admincates" onclick="system_category_del(this,'1')" class="ml-5" style="text-decoration:none; float:right;margin-right:30px;"><i class="Hui-iconfont">&#xe6e2;</i></button>
						</form>	
							<button title="编辑" href="/admincates/{{$row->id}/edit" onclick="system_category_edit('栏目编辑','system-category-add.html','1','700','480')" style="text-decoration:none; float:right;"><i class="Hui-iconfont">&#xe6df;</i></button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<script>
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "asc" ]],//默认第几个排序
		"bStateSave": true,//状态保存	
		lengthMenu: [3,5,10]//每页可显示条目选择列表
});
</script>
@section("title","分类列表")
@endsection