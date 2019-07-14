@extends('Home.HomePublic.user')
@section('user')
		<div class="rtcont fr">
		  <form action="/user/{{$data->id}}" method="post" enctype="multipart/form-data">
			<div class="face fl ml40 mt20">
				<div class="grzlbt">我的头像</div>
				<div class="face_block mt20">
					<img class=".img" src="/upload/{{$data->face}}" width="220" height="220">
				</div>
				<input type="file" name="pic" value="1">
				<!--<span class="input_sub" style="border:0;"><a href="">更换头像</a></span>-->
			</div>
			<div class="fr mt20">
				<div class="grzlbt">我的资料</div>
				<div class="subgrzl"><span>昵称</span><span><input type="text" class="input_text" name="name" value="{{$data->name}}"></span><span><a href="">编辑</a></span></div>
				{{session('error')}}
				<div class="subgrzl"><span>性别</span><span><input type="text" class="input_text" name="sex" value="{{$data->sex}}"></span><span><a href="">编辑</a></span></div>
				<div class="subgrzl"><span>手机号</span><span><input type="text" class="input_text" name="phone" value="{{$data->phone}}"></span><span><a href="">编辑</a></span></div>
				<div class="subgrzl"><span>邮箱</span><span><input type="text" class="input_text" name="email" value="{{$data->email}}"></span><span><a href="">编辑</a></span></div>
				
				<div class="subgrzl"><span>注册时间</span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$data->created_at}}</span></div>
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
@endsection
@section('title','小米商城-个人中心')