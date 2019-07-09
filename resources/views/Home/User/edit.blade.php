@extends('Home.HomePublic.public')
@section('main')
<!-- self_info -->
	<div class="grzxbj" align="center">
		<div class="selfinfo center">
		
		<div class="rtcont">
		  <form action="/user/edit" method="post">
			<div class="face fl ml40">
				<div class="grzlbt">我的头像</div>
				<div class="face_block mt20"></div>
				<span class="input_sub" style="border:0;"><a href="">更换头像</a></span>
			</div>
			<div class="fr">
				<div class="grzlbt">我的资料</div>
				<div class="subgrzl"><span>昵称</span><span><input type="text" class="input_text" value="{{$data->name}}"></span><span><a href="">编辑</a></span></div>
				<div class="subgrzl"><span>性别</span><span><input type="text" class="input_text" value="{{$data->sex}}"></span><span><a href="">编辑</a></span></div>
				<div class="subgrzl"><span>手机号</span><span><input type="text" class="input_text" value="{{$data->phone}}"></span><span><a href="">编辑</a></span></div>
				<div class="subgrzl"><span>邮箱</span><span><input type="text" class="input_text" value="{{$data->email}}"></span><span><a href="">编辑</a></span></div>
				<div class="subgrzl"><span>注册时间</span><span><input type="text" class="input_text" value="{{$data->updated_at}}"></span><span><a href="">编辑</a></span></div>
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