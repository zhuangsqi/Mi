@extends("Admin.AdminPublic.public")
@section("main")
<div class="page-container">
	<div class="text-c">
		<input type="text" name="" id="" placeholder="角色名称" style="width:250px" class="input-text">
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
					<th width="100px;">ID</th>
					<th width="100px;">角色名</th>
					<th width="100px;">状态</th>
					<th width="1px;">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($role as $row)
				<tr class="text-c">
					<td><input type="checkbox" name="" value=""></td>
					<td>{{$row->id}}</td>
					<td>{{$row->name}}</td>
					<td>{{$row->status}}</td>
					<td>
						<form action="/admincates/{{$row->id}}" method="post">
						{{method_field("DELETE")}}
						{{csrf_field()}}
							<button title="删除" href="/admincates" onclick="system_category_del(this,'1')" class="ml-5" style="text-decoration:none; float:right;margin-right:30px;"><i class="Hui-iconfont">&#xe6e2;</i></button>
						</form>	
							<button title="编辑" href="javascript:;" onclick="system_category_edit('栏目编辑','system-category-add.html','1','700','480')" style="text-decoration:none; float:right;"><i class="Hui-iconfont">&#xe6df;</i></button>
							<a href="/adminauth/{{$row->id}}" class="btn btn-success">分配权限</a>
					</td>


				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@section("title","角色列表")
@endsection