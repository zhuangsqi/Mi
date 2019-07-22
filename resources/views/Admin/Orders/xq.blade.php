@extends("Admin.AdminPublic.public")
@section("main")
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单管理 <span class="c-gray en">&gt;</span> 订单列表<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont"></i> 批量删除</a>
	<table class="table table-border table-bordered table-bg ">
		<thead>
			<tr>
				<th scope="col" colspan="18">订单列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">用户名</th>
				<th width="350">订单号</th>
				<th width="150">状态</th>
				<th width="200">操作</th>
			</tr>
		</thead>
		<tbody>
			
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td class="td-manage">	
				<!-- <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','admin-add.html','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont"></i></a> <a title="删除" href="javascript:;" onclick="admin_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont"></i></a> -->
				<a href="/dxq/{{$val->id}}" class="btn btn-secondary-outline radius">详情</a>
				<a href="" class="btn btn-success-outline radius">修改状态</a>
				</td>
		
			</tr>
		
		</tbody>
	</table>
</div>
@endsection
@section("title","订单详情")