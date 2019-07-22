@extends("Admin.AdminPublic.public")
@section("main")

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商品列表 <span class="c-gray en">&gt;</span> 商品管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="70">ID</th>
					<th width="80">排序</th>
					<th width="50">分类</th>
					<th width="200">LOGO</th>
					<th width="120">产品名称</th>
					<th width="120">价格</th>
					<th width="120">产品数量</th>
					<th>具体描述</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $val)
				<tr class="text-c">
					<td><input name="" type="checkbox" value=""></td>
					<td>{{$val->aid}}</td>
					<td><input type="text" class="input-text text-c" value="{{$val->uid}}"></td>
					<td class="text-l">{{$val->cname}}</td>
					<td><img src="./uploads/product/{{$val->logo}}" width="100px"></td>
					<td class="text-l">{{$val->aname}}</td>
					<td class="text-l">{{$val->money}}</td>
					<td class="text-l">{{$val->amount}}</td>
					<td class="text-l">{{$val->goods}}</td>
					<td class="f-14 product-brand-manage">
						<a style="text-decoration:none" onClick="product_brand_edit('品牌编辑','codeing.html','1')" href="/adminproduct/{{$val->aid}}/edit" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> 
						<a style="text-decoration:none" class="ml-5" onClick="active_del(this,'10001')" href="/adminproduct/{{$val->aid}}" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section("title","产品列表")