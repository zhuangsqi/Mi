@extends("Admin.AdminPublic.public")
@section("main")
<script src="/static/jquery-1.8.3.min.js">
	
</script>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 资讯列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" data-title="添加资讯" data-href="article-add.html" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加资讯</a></span></div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th>标题</th>
					<th width="80">是否显示</th>
					<th width="80">文章作者</th>
					<th width="120">略缩图</th>
					<th width="75">文章内容</th>
					<th width="60">发布时间</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
			@foreach($data as $val)
				<tr class="text-c">
					<td><input type="checkbox" value="" name=""></td>
					<td>{{$val->id}}</td>
					<td width="100px">{{$val->title}}</td>
					<td>{{$val->isshow}}</td>
					<td>{{$val->staffld}}</td>
					<td><img src="{{$val->face}}" alt=""></td>
					<td>{!!$val->content!!}</td>
					<td class="td-status">{{$val->create_time}}</td>
					<td class="f-14 td-manage">
						<a style="text-decoration:none" onClick="article_stop(this,'10001')" value="{{$val->id}}" href="javasrcipt:void(0)" title="下架" class="xia"><i class="Hui-iconfont">&#xe6de;</i>
						</a> 
						
						<a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','article-add.html','10001')" href="/article" title="编辑"><i class="Hui-iconfont">&#xe6df;</i>
						</a> 

						<a style="text-decoration:none" class="ml-5" onClick="article_del(this,'10001')" href="/article/{{$val->id}}" title="删除"><i class="Hui-iconfont">&#xe6e2;</i>
						</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
<script>
	$(".xia").click(function(){
		id=$(this).value(id );
		alert(id);
	});
</script>
@endsection
@section("title","资讯列表")