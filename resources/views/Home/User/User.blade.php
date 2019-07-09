@extends('Home.HomePublic.public')
@section('main')
<!-- self_info -->
<script>
	$('.img',function(){
		console.log($.session.get('upload'));
	});
</script>
	<div class="grzxbj">
		<div class="selfinfo center">
		<div class="lfnav fl">
			<div class="ddzx">订单中心</div>
			<div class="subddzx">
				<ul>
					<li><a href="./dingdanzhongxin.html" >我的订单</a></li>
					<li><a href="">意外保</a></li>
					<li><a href="">团购订单</a></li>
					<li><a href="">评价晒单</a></li>
				</ul>
			</div>
			<div class="ddzx">个人中心</div>
			<div class="subddzx">
				<ul>
					<li><a href="/user" style="color:#ff6700;font-weight:bold;">我的个人中心</a></li>
					<li><a href="">消息通知</a></li>
					<li><a href="">优惠券</a></li>
					<li><a href="">收货地址</a></li>
				</ul>
			</div>
		</div>
		<div class="rtcont fr">
		  <form action="/user/{{$data->id}}" method="post">
			<div class="face fl ml40">
				<div class="grzlbt">我的头像</div>
				<div class="face_block mt20">
					<img class=".img" src="C:\fakepath\IMG_20150624_204515.jpg
">
				</div>
				<div class="formControls col-xs-8 col-sm-9"> 
					<span class="btn-upload form-group">
						<input class="input-text upload-url" type="text" name="face" id="face" readonly nullmsg="请添加附件！" style="width:188px">
						<a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
						<input type="file" multiple name="face" class="input-file">
					</span>
				</div>
				<!--<span class="input_sub" style="border:0;"><a href="">更换头像</a></span>-->

	
			



				
				
			</div>
			<div class="fr">
				<div class="grzlbt">我的资料</div>
				<div class="subgrzl"><span>昵称</span><span><input type="text" class="input_text" name="name" value="{{$data->name}}"></span><span><a href="">编辑</a></span></div>
				<div class="subgrzl"><span>性别</span><span><input type="text" class="input_text" name="sex" value="{{$data->sex}}"></span><span><a href="">编辑</a></span></div>
				<div class="subgrzl"><span>手机号</span><span><input type="text" class="input_text" name="phone" value="{{$data->phone}}"></span><span><a href="">编辑</a></span></div>
				<div class="subgrzl"><span>邮箱</span><span><input type="text" class="input_text" name="email" value="{{$data->email}}"></span><span><a href="">编辑</a></span></div>
				<div class="subgrzl"><span>注册时间</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$data->updated_at}}</span><span><a href="">编辑</a></span></div>
				{{method_field("PUT")}}
				{{csrf_field()}}			
			</div>
			<div class="clear"></div>
			<div class="sub_edit">
				<input class="input_sub ml40" type="submit" value="确认修改">
				<a href="/"><span class="input_sub ml40" style="padding:8px 60px;">返回首页</span></a>
			</div>
		  </form>
		</div>
		<div class="clear"></div>
		</div>
	</div>
<!-- self_info -->
@endsection
@section('title','小米商城-个人中心')