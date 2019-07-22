@extends("Admin.AdminPublic.public")
@section("main")
<script src="/static/jquery-1.8.3.min.js">
</script>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单管理 <span class="c-gray en">&gt;</span> 订单列表<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont"></i> 批量删除</a>
	<table class="table table-border table-bordered table-bg table-sort">
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
			@foreach($data as $val)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{{$val->aid}}</td>
				<td>{{$val->name}}</td>
				<td>{{$val->order_num}}</td>
				<td>{{$val->status}}</td>
				<td class="td-manage">	
				<form action="/dxq" method="get">
				<input type="hidden" value="{{$val->aid}}" name="dd">
				<input type="submit" class="btn btn-secondary-outline radius" value="详情">
				<a href="javascript:void(0);" class="xg btn btn-success-outline radius" name="{{$val->aid}}">修改状态</a>
				</form>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
<script>
	$(".xg").click(function(){
		oc = $(this);
		id = oc.attr("name");
		$.get("/zhuangtai",{id:id},function(a){
			oc.parents("td").prev('td').html('已发货');
		},"json");			
	});
</script>
@endsection
@section("title","后台订单列表")