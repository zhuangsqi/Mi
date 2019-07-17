@extends("Admin.AdminPublic.public")
@section("main")
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 快递管理 <span class="c-gray en">&gt;</span> 快递列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont"></i> 批量删除</a> <a href="javascript:;" onclick="admin_add('添加管理员','admin-add.html','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont"></i> 添加快递</a></span></div>
	 @if(session('success'))
    <div member_huanyuan(this,'1')></div>
	@endif
	@if(session("error"))
 	<div member_huanyuan2 (this,'1')></div> 
 	@endif
 	@if(session('success'))
    <div member_huanyuan3(this,'1')></div>
	@endif
	@if(session("error"))
 	<div member_huanyuan4 (this,'1')></div> 
 	@endif
	<table class="table table-border table-bordered table-bg ">
		<thead>
			<tr>
				<th scope="col" colspan="9">管理员列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="90">Logo</th>
				<th width="300">快递名</th>
				<th width="90">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $val)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{{$id++}}</td>
				<td><img src="./uploads/Express/{{$val->logo}}" width="50"></td>
				<td>{{$val->name}}</td>
				<td>{{$val->status}}</td>
				<td class="td-manage">
					<a title="编辑" href="javascript:;" onclick="admin_edit('快递编辑','/express/{{$val->id}}/edit','1','800','500')" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont"></i>
					</a> 
					<a title="删除" href="/express" onclick="admin_del(this,'1')" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont"></i>
					</a>
				</td>
		
			</tr>
	@endforeach
		</tbody>
	</table>
</div>
@endsection
@section("title","管理员列表")