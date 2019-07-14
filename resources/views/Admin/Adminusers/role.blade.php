@extends("Admin.AdminPublic.public")

@section("main")
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<form action="/saverole" method="post" class="mws-form">
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="6">当前用户:{{$adminuser->name}}的角色信息</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" value="" name=""></th>
				<th width="200">管理员权限</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>@foreach($role as $row)
			<tr class="text-c">
				<td><input type="checkbox" value="{{$row->id}}" name="rids[]" @if(in_array($row->id,$rids)) checked @endif></td>
				<td>{{$row->name}}</td>
				<td class="f-14">
					{{csrf_field()}}
					<input type="hidden" value="{{$adminuser->id}}" name="uid">
					<input value="分配角色" class="btn btn-danger" type="submit"> 
				</td>
			</tr>
		@endforeach	
		
		</tbody>
	</table>
	</form>
</div>
@endsection
@section("title","分配角色")