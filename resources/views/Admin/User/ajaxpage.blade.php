
		<div id="uid">
		<table class="table table-border table-bordered table-bg">
			<thead>
				<tr>
					<th scope="col" colspan="10">用户列表</th>
				</tr>

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
						
						<button title="修改" href="javascript:;" onclick="admin_edit('用户修改','admin-add.html','1','800','500')" class="ml-5" style="text-decoration:none;float:right;margin-right:15px;"><i class="Hui-iconfont">&#xe6df;</i>
						</button> 
					
						<form action="/adminuser/id" method="post">
						<!-- {{method_field("DELETE")}}
						{{csrf_field()}} -->
						<button title="删除" href="/adminuser/id" onclick="admin_del(this,'1')" class="ml-5" 	style="text-decoration:none;float:right;"><i class="Hui-iconfont">&#xe6e2;</i></button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>