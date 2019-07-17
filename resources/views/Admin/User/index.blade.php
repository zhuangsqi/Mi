@extends("Admin.Adminpublic.public")
@section("main")
	
	<script src="/static/Admins/jquery.min.js"></script>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户管理 <span class="c-gray en">&gt;</span> 用户列表</nav>
	<div class="page-container">
		<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="admin_add('添加管理员','admin-add.html','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> <span class="r">共有数据：<strong>{{$tot}}</strong> 条</span> </div>
		<div id="uid">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				

				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="40">ID</th>
					<th width="150">用户名</th>
					<th width="90">性别</th>
					<th width="150">手机</th>
					<th width="130">邮箱</th>
					<th width="100">头像</th>
					<th width="150">密码</th>
					<th width="100">注册时间</th>
					<th width="100">操作</th>
				</tr>
			</thead>
		<tbody>
				@foreach($data as $row)
				<tr class="text-c">
					<td><input type="checkbox" value="1" name=""></td>
					<td>{{$row->id}}</td>
					<td>{{$row->name}}</td>
					<td>{{$row->sex}}</td>
					<td>{{$row->phone}}</td>
					<td>{{$row->email}}</td>
					<td><img src="./uploads/user/{{$row->face}}" width="100px"></td>
					<td>{{$row->password}}</td>
					<td>{{$row->created_at}}</td>
					<td class="td-manage">						
							<a title="修改" href="/adminuser/{{$row->id}}/edit" onclick="admin_edit('用户修改','admin-add.html','1','800','500')" class="ml-5" style="text-decoration:none;float:right;margin-right:15px;"><i class="Hui-iconfont">&#xe6df;</i>
							</a>			
						<form action="/adminuser/{{$row->id}}" method="post">
							{{method_field("DELETE")}}
							{{csrf_field()}}
							<button title="删除" class="ml-5" style="text-decoration:none;float:right;"><i class="Hui-iconfont">&#xe6e2;</i></button>
						</form>
					</td>
				</tr>
				@endforeach
				</tbody>
				</table>
				</div>
				</div>
				
			

@endsection

@section("title","后台用户管理")