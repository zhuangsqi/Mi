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
				<th width="150">收货人姓名</th>
				<th width="250">手机号</th>
				<th width="150">地址</th>
				<th width="150">图片</th>
				<th width="200">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($aa as $row)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{{$row['id']}}</td>
				<td>{{$row['name']}}</td>
				<td>{{$row['phone']}}</td>	
				<td>{{$row['useraddress']}}</td>	
				<td>{{$row['logo']}}</td>
				<td></td>
			</tr>
		 @endforeach
		</tbody>
	</table>
</div>
@endsection
@section("title","订单详情2")