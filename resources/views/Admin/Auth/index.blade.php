@extends("Admin.AdminPublic.public")
@section("main")
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont"></i> 批量删除</a> <a href="javascript:;" onclick="admin_add('添加管理员','admin-add.html','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont"></i> 添加管理员</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg table-sort">
		<thead>
			<tr>
				<th scope="col" colspan="9">管理员列表</th>
			</tr>
			<tr class="text-c">
				<th ><input type="checkbox" name="" value=""></th>
				<th width="50">ID</th>
				<th width="200">权限名</th>
				<th width="400">控制器</th>
				<th width="200">方法</th>
				<th width="150">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($auth as $val)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{{$val->id}}</td>
				<td>{{$val->name}}</td>
				<td>{{$val->mname}}</td>
				<td>{{$val->aname}}</td>
				<td class="td-manage"><a style="text-decoration:none" onclick="admin_stop(this,'10001')" href="/adminrole/{{$val->id}}" title="分配角色"><i class="Hui-iconfont"></i></a> <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','admin-add.html','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont"></i></a> <a title="删除" href="javascript:;" onclick="admin_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont"></i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
@section("title","权限列表")