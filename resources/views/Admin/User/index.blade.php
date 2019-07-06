@extends("Admin.Adminpublic.public")
@section("main")
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户管理 <span class="c-gray en">&gt;</span> 用户查看<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<input type="text" class="input-text" style="width:250px" placeholder="输入用户名称" id="" name="">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="admin_add('添加管理员','admin-add.html','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="10">用户列表</th>
			</tr>

			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">用户名</th>
				<th width="150">密码</th>
				<th width="90">性别</th>
				<th width="150">手机</th>
				<th width="130">邮箱</th>
				<th width="100">头像</th>
				<th width="100">注册时间</th>
				<th width="100">操作</th>
			</tr>
		</thead>
	<tbody>
			@foreach($data as $val)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{{$val->id}}</td>
				<td>{{$val->name}}</td>
				<td>{{$val->password}}</td>
				<td>{{$val->sex}}</td>
				<td>{{$val->phone}}</td>
				<td>{{$val->email}}</td>
				<td>{{$val->face}}</td>
				<td>{{date('Y-m-d H:i:s')}}</td>
				<td class="td-manage">
					
					<button title="修改" href="javascript:;" onclick="admin_edit('用户修改','admin-add.html','1','800','500')" class="ml-5" style="text-decoration:none;float:right;margin-right:15px;"><i class="Hui-iconfont">&#xe6df;</i>
					</button> 
				
					<form action="/adminuser/{{$val->id}}" method="post">
					{{method_field("DELETE")}}
					{{csrf_field()}}
					<button title="删除" href="/adminuser/{{$val->id}}" onclick="admin_del(this,'1')" class="ml-5" 	style="text-decoration:none;float:right;"><i class="Hui-iconfont">&#xe6e2;</i></button>
					</form>
				</td>

			</tr>
			
			@endforeach

			</tbody>
			</table>
			</div>
			
		<!-- <div class="" id="DataTables_Table_0_paginate">
			<span>
				<a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">{{$data->appends($request)->render()}}</a>
			</span>
		</div> -->
		
@endsection

@section("title","后台用户管理")