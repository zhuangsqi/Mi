@extends('Home.HomePublic.public')
@section('main')
 <div class="container">
  <div class="checkout-box"> 
   <div class="section section-address"> 
    <div class="section-header clearfix"> 
     <h3 class="title">收货地址</h3><br/>
     <p style="color: red;font-size: 30px;">{{session('error')}}</p> 
     <div class="more"> 
     </div> 
     
    </div> 
    <div class="section-body clearfix" id="J_addressList"> 
     <!-- addresslist begin --> 
    @foreach($address as $val)
     <div class="address-item J_addressItem" u_id="{{$val->id}}"> 
      <dl> 
       <dt> 
        <span class="tag"></span> 
        <em class="uname">{{$val->addressname}}</em> 
       </dt> 
       <dd class="utel">
         {{$val->addressphone}}
       </dd> 
       <dd class="uaddress">
         {{$val->areaidpath}}
        <br /> {{$val->useraddress}} 
       </dd> 
      </dl> 
      <div class="actions"> 
       <a href="">修改</a> 
      </div> 
     </div> 
    @endforeach
     <!-- addresslist end --> 
     <a href="/tianjia"><div class="address-item address-item-new" id="J_newAddress"> 
      <i class="iconfont"></i> 添加新地址 
     </div></a>
    </div> 
   </div>

   <div class="section section-goods"> 
    <div class="section-header clearfix"> 
     <h3 class="title">商品及优惠券</h3> 
    </div> 
    <div class="section-body"> 
     <ul class="goods-list" id="J_goodsList">
     @foreach($d as $row) 
      <li class="clearfix"> 
       <div class="col col-img"> 
        <img src="/uploads/product/{{$row['logo']}}" width="30" height="30" /> 
       </div> 
       <div class="col col-name"> 
         {{$row['name']}} 
       </div> 
       <div class="col col-price">
         {{$row['money']}}元 x {{$row['num']}} 
       </div> 
       <div class="col col-status">
        &nbsp;
       </div> 
       <div class="col col-total">
         {{$row['money']*$row['num']}}元 
       </div> 
      </li> 
    @endforeach 
     </ul> 
    </div> 
   </div> 
  
   <div class="section section-options section-shipment clearfix"> 
    <div class="section-header"> 
     <h3 class="title">配送方式</h3> 
    </div> 
    <div class="section-body clearfix"> 
     <ul class="clearfix J_optionList options "> 
      <li data-type="shipment" class="J_option selected" data-amount="0" data-value="2"> 包邮 </li> 
     </ul> 
     
    </div> 
   </div> 
   <div class="section section-options section-shipment clearfix"> 
    <div class="section-header"> 
     <h3 class="title">配送地址</h3> 
    </div>
    @if($addresss) 
    <div class="section-body clearfix"> 
     <ul class="clearfix J_optionList options "> 
      <li data-type="shipment" class="J_option selected" data-amount="0" data-value="2"> 收&nbsp; 货&nbsp; 人 : </li>
      <li><span style="margin-left:50px;" id="addressname">{{$addresss->addressname}}</span></li> 
     </ul>
     <ul class="clearfix J_optionList options "> 
      <li data-type="shipment" class="J_option selected" data-amount="0" data-value="2"> 手&nbsp; 机&nbsp; 号 : </li>
      <li><span style="margin-left:50px;" id="addressphone">{{$addresss->addressphone}}</span></li> 
     </ul>
     <ul class="clearfix J_optionList options "> 
      <li data-type="shipment" class="J_option selected" data-amount="0" data-value="2"> 收货地址 : </li>
      <li><span style="margin-left:50px;" id="areaidpath">{{$addresss->areaidpath}}</span><span id="useraddress">{{$addresss->useraddress}}</span></li> 
     </ul>
    
    </div>
    @else
      <ul class="clearfix J_optionList options "> 
      <li data-type="shipment" class="J_option selected" data-amount="0" data-value="2">请添加收货地址!</li> 
     </ul>
    @endif
   </div> 
   <div class="section section-options section-invoice clearfix"> 
    <div class="section-header"> 
     <h3 class="title">发票</h3> 
    </div> 
    <div class="section-body clearfix"> 
     <div class="invoice-result"> 
      <span id="J_invoiceDesc">电子发票</span> 
      <span id="J_invoiceTitle">个人</span> 
      <span>商品明细</span> 
      <a href="#J_modalInvoiceInfo" data-toggle="modal" >修改 &gt;</a> 
     </div> 
    </div> 
   </div> 
   <div class="section section-count clearfix"> 
    <div class="count-actions"> 
     <!-- 优惠券 --> 
     <div class="coupon-trigger" id="J_useCoupon"> 
      <i class="iconfont icon-plus"></i>使用优惠券 
     </div> 
     <!-- 购物卡 --> 
     <div class="ecard-trigger" id="J_useEcard" data-type="normal">
      <i class="iconfont icon-plus"></i>使用小米礼品卡
     </div> 
    </div> 
   
    <div class="money-box" id="J_moneyBox"> 
     <ul> 
      <li class="clearfix"> <label>商品件数：</label> <span class="val">{{$nums}}件</span> </li> 
      <li class="clearfix"> <label>商品总价：</label> <span class="val">{{$tot}}元</span> </li> 
      <li class="clearfix"> <label>活动优惠：</label> <span class="val">-0元</span> </li> 
      <li class="clearfix"> <label>优惠券抵扣：</label> <span class="val"><i id="J_couponVal">-0</i>元</span> </li> 
      <li class="clearfix"> <label>运费：</label> <span class="val"><i data-id="J_postageVal">0</i>元</span> </li> 
      <li class="clearfix total-price"> <label>应付总额：</label> <span class="val"><em data-id="J_totalPrice">{{$tot}}</em>元</span> </li> 
     </ul> 
    </div> 
   </div> 
   <div class="section-bar clearfix"> 
    <div class="fl"> 
     <div class="seleced-address hide" id="J_confirmAddress"> 
     </div> 
     <div class="big-pro-tip hide J_confirmBigProTip"></div> 
    </div> 
    <div class="fr">

    <form action="/order/create" method="post">
      <input type="hidden" name="address_id" value="">
      {{csrf_field()}} 
      <input type="submit" class="btn btn-primary" value="结算">
      <a href="/cart" class="btn  btn-return">返回购物车</a>
    </form>

    </div> 
   </div> 
  </div>
  </div>
<script>
  $(".J_addressItem").click(function(){
    address_id=$(this).attr('u_id');
    $("input[name='address_id']").val(address_id);
    $.get('/choose',{address_id:address_id},function(data){
      $('#addressname').html(data.addressname);
      $('#addressphone').html(data.addressphone);
      $('#areaidpath').html(data.areaidpath);
      $('#useraddress').html(data.useraddress);
    },'json');
  });
</script>
@endsection
@section('title','结算页面-小米商城');