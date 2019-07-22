@extends("Admin.AdminPublic.public")
@section("main")
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户管理 <span class="c-gray en">&gt;</span> 用户详情<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
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
				<th width="150">收货人姓名</th>
				<th width="150">地址详情</th>
				<th width="150">电话</th>
				<th width="150">邮编</th>
				<th width="150">详细地址</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $val)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{{$val->uid}}</td>
				<td>{{$val->uname}}</td>
				<td>{{$val->areaidpath}}</td>
				<td>{{$val->addressphone}}</td>
				<td>{{$val->areaid}}</td>
				<td>{{$val->useraddress}}</td>
		
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
@endsection
@section("title","用户详情")