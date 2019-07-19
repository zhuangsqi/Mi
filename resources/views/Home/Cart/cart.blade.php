@extends('Home.HomePublic.public')
@section('main')
<!-- start banner_x -->
		<div class="banner_x center">
			
			
			<div class="wdgwc fl">我的购物车</div>
			<div class="wxts fl ml20">温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</div>
			
			<div class="clear"></div>
		</div>
		<div class="xiantiao"></div>
		<div class="gwcxqbj" style="padding-top:20px;">
			<div class="gwcxd center">
				<div class="top2 center">
					<div class="sub_top fl">
						<a onclick="select(true)">全选</a>
						<a onclick="select(false)">全不选</a>
					</div>
					<div class="sub_top fl">商品名称</div>
					<div class="sub_top fl">单价</div>
					<div class="sub_top fl">数量</div>
					<div class="sub_top fl">小计</div>
					<div class="sub_top fr">操作</div>
					<div class="clear"></div>
				</div>
				@if(count($data1))
				@foreach($data1 as $val)
				<div class="content2 center">
					<div class="sub_content fl ">
						<input type="checkbox" name="items" value="{{$val['id']}}" class="quanxuan" />
					</div>
					<div class="sub_content fl"><img src="/uploads/product/{{$val['logo']}}" width="70" height="70"></div>
					<div class="sub_content fl ft20">{{$val['name']}}</div>
					<div class="sub_content fl ">{{$val['money']}}元</div>
					<div class="sub_content fl">
						<input class="min" name="{{$val['id']}}" type="button" value="-" />
						<input class="text_box" name="goodnum" type="text" value="{{$val['num']}}"  />
						<input class="add" name="{{$val['id']}}" type="button" value="+" />
					</div>
					<div class="sub_content nmoney fl">{{$val['money']*$val['num']}}</div>
					<div class="sub_content fl">
						<form action="/cart/{{$val['id']}}" method="post">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button style="border:0px;background:rgb(255,255,255);" type="submit" class="delete">×</button>
						</form>
					</div>
					<div class="clear"></div>
				</div>
				@endforeach
				@else
				购物车空空如也!!!
				@endif
			</div>
			<div class="jiesuandan mt20 center">
				<div class="tishi fl ml20">
					<ul>
						<li><a href="/alldelcart">删除所有</a></li>
						<li><a href="/">继续购物</a></li>
						<li>|</li>
						<li>已选择<span id="nums">0</span>件商品</li>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="jiesuan fr">
					<div class="jiesuanjiage fl">合计（不含运费）：<span id="sum">0元</span></div>
					<div class="jsanniu fr"><input class="jsan" type="submit" name="jiesuan"  value="去结算"/></div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			
		</div>
<script>
	inputs = document.getElementsByTagName('input');
	function select(bool){
		//alert(bool);
		for(var i =0;i<inputs.length;i++){
			inputs[i].checked =bool;
		}
	}
	function del(){
		
	}

	//数量加减按钮
	$(".add").click(function() {
		ob=$(this);
        // $(this).next() 就是当前元素的下一个元素，即 text_box
        id=$(this).attr('name');
		$.get('/cartadd',{id:id},function(data){
			ob.prev('input').val(data.num);
			ob.parent('div').next('div').html(data.tot);
		},'json');
       
	});
	  
	$(".min").click(function() {
		ob=$(this);
        // $(this).next() 就是当前元素的下一个元素，即 text_box
        id=$(this).attr('name');
		$.get('/cartupdatee',{id:id},function(data){
			ob.parent('div').next('div').html(data.tot);
			ob.next('input').val(data.num);
		},'json');
       
	});


	//计算购物车总价格和商品数量
	arr=[];
	$("input[name='items']").change(function(){
		if($(this).attr('checked')){
			id=$(this).val();
			arr.push(id);
		}else{
			//去除没有选中的id
			ids=$(this).val();
	      //获取到删除元素的索引值
	      Array.prototype.indexOf = function(val) { 
	        for (var i = 0; i < this.length; i++) { 
	          if (this[i] == val) return i; 
	          } 
	        return -1; 
	      };

	      //截取索引
	      Array.prototype.remove = function(val) { 
	        var index = this.indexOf(val); 
	          if (index > -1) { 
	          this.splice(index, 1); 
	          } 
	      };

	      //删除没有选中的id
	      arr.remove(ids);
		}
		//alert(arr);
		$.get('/carttot',{arr:arr},function(data){
			$('#sum').html(data.sum);
			$('#nums').html(data.nums);
		},'json');
	});
</script>
@endsection
@section('title','我的购物车-小米商城')