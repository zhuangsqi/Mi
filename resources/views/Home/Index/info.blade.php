@extends('Home.HomePublic.public')
@section('main')
<style>

</style>
<!-- xiangqing -->
	<form action="/cart" method="post">
	<div class="xiangqing">
		<div class="neirong w">
			<div class="xiaomi6 fl">{{$info->name}}</div>
			<nav class="fr">
				<li><a href="">概述</a></li>
				<li>|</li>
				<li><a href="">变焦双摄</a></li>
				<li>|</li>
				<li><a href="">设计</a></li>
				<li>|</li>
				<li><a href="">参数</a></li>
				<li>|</li>
				<li><a href="">F码通道</a></li>
				<li>|</li>
				<li><a href="">用户评价</a></li>
				<div class="clear"></div>
			</nav>
			<div class="clear"></div>
		</div>	
	</div>
	
	<div class="jieshao mt20 w">
		<div class="left fl"><img src="/uploads/product/{{$info->logo}}" width="550"></div>
		<div class="right fr">
			<div class="h3 ml20 mt20">{{$info->name}}</div>
			<div class="jianjie mr40 ml20 mt10">{{$info->goods}}</div>
			<div class="jiage ml20 mt10">{{$info->money}}.00元</div>

			<div class="ft20 ml20 mt20">选择版本</div>
			<div class="xzbb ml20 mt10">
				<div class="banben fl">
					<a>
						<span>全网通 6GB+64GB </span>
						<span>{{$info->money}}元</span>
					</a>
				</div>
				<div class="banben fr">
					<a>
						<span>全网通 6GB+128GB</span>
						<span>2899元</span>
					</a>
				</div>
				<div class="clear"></div>
			</div>
			<div class="ft20 ml20 mt20">选择颜色</div>
			<div class="xzbb ml20 mt10">
				<div class="banben">
					<a>
						<span class="yuandian"></span>
						<span class="yanse">亮黑色</span>
					</a>
				</div>
			</div>
			<div class="ft20 ml20 mt20">购买个数</div>
			<div class="xzbb ml20 mt10">
				<ul class="btn-numbox">
		            <li><span class="number">数量</span></li>
		            <li>
		                <ul class="count">
		                    <li><span id="num-jian" class="num-jian">-</span></li>
		                    <li><input type="text" name="num" class="input-num" id="input-num" value="1" /></li>
		                    <li><span id="num-jia" class="num-jia">+</span></li>
		                </ul>
		            </li>
		            <li><span class="kucun">（库存:{{$info->amount}}）</span></li>
		　　　  </ul>
			</div>
			<div class="xqxq mt20 ml20">
				<div class="top1 mt10">
					<div class="left1 fl">小米6 全网通版 6GB内存 64GB 亮黑色</div>
					<div class="right1 fr">2499.00元</div>
					<div class="clear"></div>
				</div>
				<div class="bot mt20 ft20 ftbc">总计：2499元</div>
			</div>
			<div class="xiadan ml20 mt20">
				<input type="hidden" name="id" value="{{$info->id}}">
				{{csrf_field()}}
				<input class="jrgwc"  type="button" name="jrgwc" value="立即选购" />
				<input class="jrgwc" type="submit" value="加入购物车" />
			</div>
		</div>
		<div class="clear"></div>
	</div>
	</form>
<script>
	var num_jia = document.getElementById("num-jia");
    var num_jian = document.getElementById("num-jian");
    var input_num = document.getElementById("input-num");
	num_jia.onclick = function() {
		input_num.value = parseInt(input_num.value) + 1;
    }
	num_jian.onclick = function() {
        if(input_num.value <= 0) {
            input_num.value = 0;
        } else {
            input_num.value = parseInt(input_num.value) - 1;
        }
    }
</script>
@endsection
@section('title','商品详情');