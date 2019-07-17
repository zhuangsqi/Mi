@extends('Home.HomePublic.user')
@section('user')
	<div class=" address_k">
		<div class="address">收货地址</div>
		<a href="/address/create">
			<div class="address_jia fl">
				添加收货地址
			</div>
		</a>
		@foreach($info as $val)
		<div id="address_you" class="address_you fl">
			<div style="height:130px;">
				<div class="address_name">{{$val->addressname}}</div>
				<div class="address_p">{{$val->addressphone}}</div>
				<div class="address_p">{{$val->areaidpath}}</div>
				<div class="address_p">{{$val->useraddress}}</div>
				<div class="address_p">{{$val->areaid}}</div>
			</div>
			<div class="fr"">
				<a id="create">编辑 </a>
				<a href="">删除</a>
			</div>
		</div>
		@endforeach
		
		<div class="clear"></div>
	</div>
	
@endsection
@section('title','小米商城-收货地址')