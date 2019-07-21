@extends('Home.HomePublic.public')
@section('main')

 <div class="container">
  <div class="checkout-box"> 
   <div class="section section-goods"> 
    <div class="section-header clearfix"> 
     <h1 class="title" style="color:#ff6700;font-size:30px;">订单支付成功</h1> 
    </div> 
   </div> 
   <div class="section section-options section-shipment clearfix"> 
    <div class="section-header"> 
     <h3 class="title">总金额</h3> 
    </div> 
    <div class="section-body clearfix"> 
     <ul class="clearfix J_optionList options "> 
      <li data-type="shipment" class="J_option selected" data-amount="0" data-value="2"> {{$tot}} 元 </li> 
     </ul> 
     
    </div> 
   </div> 
   <div class="section section-options section-shipment clearfix"> 
    <div class="section-header"> 
     <h3 class="title">配送地址</h3> 
    </div>
   
    <div class="section-body clearfix"> 
     <ul class="clearfix J_optionList options "> 
      <li data-type="shipment" class="J_option selected" data-amount="0" data-value="2"> 收&nbsp; 货&nbsp; 人 : </li>
      <li><span style="margin-left:50px;" id="addressname"> {{$address->addressname}} </span></li> 
     </ul>
      
     <ul class="clearfix J_optionList options "> 
      <li data-type="shipment" class="J_option selected" data-amount="0" data-value="2"> 手&nbsp; 机&nbsp; 号 : </li>
      <li><span style="margin-left:50px;"> {{$address->addressphone}} </span></li> 
     </ul>

     <ul class="clearfix J_optionList options "> 
      <li data-type="shipment" class="J_option selected" data-amount="0" data-value="2"> 收货地址 : </li>
      <li><span style="margin-left:50px;">{{$address->areaidpath}}</span><span id="useraddress">{{$address->useraddress}}</span></li> 
     </ul>
    </div>
   </div> 
   <div class="section-bar clearfix"> 
    <div class="fr">
      <a href="/" class="btn btn-primary">继续购物</a>
      <a href="" class="btn  btn-return">查看订单</a>
    </div> 
   </div> 
  </div>
  </div>
@endsection
@section('title','支付成功-小米商城');