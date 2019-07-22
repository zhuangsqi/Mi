@extends("Admin.AdminPublic.public")
@section("main")
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 有情连接列表 <span class="c-gray en">&gt;</span> 有情连接管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="70">ID</th>
					<th width="100">网站名称</th>
					<th width="100">网站网址</th>
					<th width="100">网站LOGO</th>
					<th width="100">审核状态</th>
					<th>网站概述</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($link as $row)
				<tr class="text-c">
					<td><input name="" type="checkbox" value="{{$row->id}}"></td>
					<td>{{$row->id}}</td>
					<td>{{$row->name}}</td>
					<td>{{$row->adress}}</td>
					<td><img src="{{$row->logo}}" width="100px" ></td>
					<td>{{$row->status}}</td>
					<td>{{$row->descr}}</td>
					<td class="f-14 product-brand-manage" >
						<a style="text-decoration:none;display: inline-block;float: left;margin-left: 30px;" onClick="product_brand_edit('修改网址','codeing.html','1')" href="/link/{{$row->id}}/edit" title="修改"><i class="Hui-iconfont">&#xe6df;</i></a> 
						<span>
							<form action="/link/{{$row->id}}" method="post">
				            {{method_field("DELETE")}}
				            {{csrf_field()}}
							<button type="submit" style="text-decoration:none;width: 20px;background: #fff;border: 0;float: left;" class="ml-5" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></button>
							</form>
						</span>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section("title","有情连接列表")
