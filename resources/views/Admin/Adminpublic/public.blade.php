<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/static/Admins/favicon.ico" >
<link rel="Shortcut Icon" href="/static/Admins/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/Admins/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/Admins/static/h-ui.admin/css/my.css" />
<link rel="stylesheet" type="text/css" href="/static/Admins/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/Admins/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/Admins/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/Admins/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/public/static/css/bootstrap.css">
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>@yield("title")</title>
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/admin">首页</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a> 
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
				<ul class="cl">
					<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
							<li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
							<li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
							<li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
			<ul class="cl">
				<li>超级管理员</li>
				<li class="dropDown dropDown_hover">
					<a href="#" class="dropDown_A">{{session('adminname')}}<i class="Hui-iconfont">&#xe6d5;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="/adminusers/show" onClick="myselfinfo()">修改密码</a></li>
						<li><a href="/adminlogin">切换账户</a></li>
						<li><a href="/adminlogin">退出</a></li>
				</ul>
			</li>
				<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
				<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
						<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
						<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
						<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
						<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
						<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
</header>
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<dl id="menu-article">
			<dl id="menu-member">
				<dt><i class="Hui-iconfont">&#xe60d;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a data-href="member-list.html" data-title="删除的会员" href="/adminuser">用户列表</a></li>
					</ul>
				</dd>
			</dl>
		</dl>
		<dl id="menu-admin">
			<dl id="menu-member">
				<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a data-href="member-list.html" data-title="图片管理" href="/adminusers/create">添加管理员</a></li>
						<li><a data-href="member-del.html" data-title="图片管理"  href="/adminusers">管理员列表</a></li>
						<li><a data-href="member-del.html" data-title="图片管理"  href="/adminroles/create">角色添加</a></li>
						<li><a data-href="member-del.html" data-title="图片管理"  href="/adminroles">角色列表</a></li>
						<li><a data-href="member-del.html" data-title="图片管理"  href="/auth/create">权限添加</a></li>
						<li><a data-href="member-del.html" data-title="图片管理"  href="/auth">权限列表</a></li>
					</ul>
				</dd>
			</dl>
		</dl>
	<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe681;</i> 分类管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="picture-list.html" data-title="图片管理" href="/admincates/create">分类添加</a></li>
					<li><a data-href="picture-list.html" data-title="图片管理" href="/admincates">分类管理</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe669;</i> 快递管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="picture-list.html" data-title="图片管理" href="/express/create">快递添加</a></li>
					<li><a data-href="picture-list.html" data-title="图片管理" href="/express">快递列表</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 商品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="product-brand.html" data-title="品牌管理" href="/adminproduct/create">添加商品</a></li>
					<li><a data-href="product-brand.html" data-title="品牌管理" href="/adminproduct">管理商品</a></li>
				</ul>
			</dd>
	</dl>
	<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 公告管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="article-list.html" data-title="资讯管理" href="/article">公告管理</a></li>
				</ul>
				<ul>
					<li><a data-href="article-list.html" data-title="资讯管理" href="/article/create">公告添加</a></li>
				</ul>
			</dd>
	</dl>
	<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe613;</i> 轮播图管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="article-list.html" data-title="资讯管理" href="/lbt/create">轮播图添加</a></li>
				</ul>
				<ul>
					<li><a data-href="article-list.html" data-title="资讯管理" href="/lbt">轮播图管理</a></li>
				</ul>
			</dd>
	</dl>
	<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe670;</i> 友情链接<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="article-list.html" data-title="资讯管理" href="/link/create">友情链接添加</a></li>
				</ul>
				<ul>
					<li><a data-href="article-list.html" data-title="资讯管理" href="/link">友情链接管理</a></li>
				</ul>
			</dd>
	</dl>
	<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe687;</i> 订单管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="picture-list.html" data-title="图片管理" href="/orders">订单详情</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe622;</i> 评论管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="picture-list.html" data-title="图片管理" href="/scores">评分管理</a></li>
			</ul>
			<ul>
					<li><a data-href="picture-list.html" data-title="图片管理" href="/scress">屏蔽词管理</a></li>
			</ul>
		</dd>
	</dl>
</div>
</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
                    @if(session('success'))
                   		 <div class="Huialert Huialert-success"><i class="Hui-iconfont">&#xe6a6;</i>
                        {{session('success')}}
                   		</div>
                    @endif
                    @if(session("error"))
                   <div class="Huialert Huialert-danger"><i class="Hui-iconfont">&#xe6a6;</i>			
                        {{session("error")}}
                    </div>
                    @endif
                    
                    @section("main")
                    @show

</section> 

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/Admins/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/Admins/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/Admins/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/Admins/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
// $('.table-sort').dataTable({
// 	"aaSorting": [[ 1, "asc" ]],//默认第几个排序
// 	"bStateSave": true,//状态保存
// 	"aoColumnDefs": [
// 	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
// 	  {"orderable":false,"aTargets":[0,8]}// 制定列不参与排序
// 	]
// });

$('.table-sort').dataTable({
	"aaSorting": [[ 1, "asc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	
	lengthMenu: [1,5,10]//每页可显示条目选择列表


});
/*用户-删除*/
function user_del(obj,id){
	layer.confirm('删除成功',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
	var index = parent.layer.getFrameIndex(window.name);
}

function member_huanyuan(obj,id){
	layer.msg('添加成功!',{icon:1,time:1000});
}
function member_huanyuan2(obj,id){
		layer.msg('添加失败',{icon: 6,time:1000});
}
function member_huanyuan3(obj,id){
	layer.msg('修改成功!',{icon:1,time:1000});
}
function member_huanyuan4(obj,id){
	layer.msg('修改失败!',{icon:1,time:1000});
}
	$("#form-admin-role-edit").validate({
		rules:{
			roleName:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			parent.layer.close(index);
		}
	});


</script> 
</body>
</html>