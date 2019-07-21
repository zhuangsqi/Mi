@extends('Home.HomePublic.user')
@section('user')
	<div class="address_k">
		<div class="address">添加收货地址</div>
		<form action="/dotianjia" method="post">
			<div class="mt20" style="margin-left:130px">
				<input type="hidden" name="u_id" value="{{$data->id}}">
				<div class="subgrzl"><span>收货人</span><input type="text" class="input_text" name="addressname"></div>
				<div class="subgrzl"><span>手机号</span><input type="text" class="input_text" name="addressphone"></div>
				<div class="subgrzl"><span>地址</span>
					<select  class="input_select" id="sid">
						<option value="">--请选择--</option>
					</select>
					<input type="hidden" name="areaidpath">
				</div>
				<div class="subgrzl"><span>详细地址</span><input type="text" class="input_text" name="useraddress"></div>
				<div class="subgrzl"><span>邮编</span><input type="text" class="input_text" name="areaid"></div>
				{{csrf_field()}}			
			</div>

			<div class="sub_edit">
				<input class="input_sub ml40" id="sub" type="submit" value="添加">
				<a href="/address"><span class="input_sub ml40" style="padding:8px 80px;">返回</span></a>
			</div>
		</form>
	</div>
<script>
	$.get('/district',{upid:0},function(result){
		for(var i=0;i<result.length;i++){
			var info=$('<option value="'+result[i].id+'">'+result[i].name+'</option>');
			$('#sid').append(info);
		}
	},'json');

	$('select').live('change',function(){
		obj=$(this);
		id=$(this).val();
		obj.nextAll('select').remove();
		$.getJSON('/district',{upid:id},function(result){
			if(result!=''){
				var select=$('<select  class="input_select"></select>');
				var op=$('<select>--请选择--</select>');
				select.append(op);
				for(var i=0;i<result.length;i++){
					console.log(result[i].name);
					var info=$('<option value="'+result[i].id+'">'+result[i].name+'</option>');
					select.append(info);
				}
				obj.after(select);
			}
		})
	});

	$('#sub').click(function(){
		arr=[];
		$('select').each(function(){
			//获取选中的数据
			sm = $(this).find('option:selected').html();
			//alert(sm);
			arr.push(sm);
		})
		//alert(arr);
		//把数据赋值给隐藏域的value
		$('input[name=areaidpath]').val(arr);
	})
</script>
@endsection
@section('title','小米商城-添加收货地址')