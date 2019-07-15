@extends("Admin.AdminPublic.public")

@section('main')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="javascript:;" onclick="admin_role_add('添加角色','admin-role-add.html','800')"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a> </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>

			<tr>
				<th scope="col" colspan="7">权限管理</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" value="" name=""></th>
				<th width="40">ID</th>
				<th width="200">权限名</th>
				<th width="100">控制器</th>
				<th width="70">方法</th>
				<th width="70">状态</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($auth as $value)
			<tr class="text-c">
				<td><input type="checkbox" value="" name=""></td>
				<td>{{$value->id}}</td>
				<td>{{$value->name}}</td>
				<td>{{$value->mname}}</td>
				<td>{{$value->aname}}</td>
				<td>{{$value->status}}</td>
				<td class="f-14">
					<a title="编辑" href="javascript:;" onclick="admin_role_edit('角色编辑','admin-role-add.html','1')" style="text-decoration:none">
						<i class="Hui-iconfont">&#xe6df;</i>
					</a> 
					<a title="删除" href="javascript:;" onclick="admin_role_del(this,'1')" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont">&#xe6e2;</i>
					</a>
				</td>
			</tr>
				@endforeach
		</tbody>
	</table>
</div>

@endsection
@section("title",'角色列表')