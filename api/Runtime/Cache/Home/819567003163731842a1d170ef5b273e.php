<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>api接口说明</title>
	<style type="text/css">
	.table>tr>td
	{
		border: 1px solid #ddd;
	}
	</style>
</head>
<body>
<div>
<div><a href="http://118.31.45.231/api.php/Home/Index/api">接口文档</a>>><h2>环球集货仓APP端支付宝支付接口信息接口</h2></div>
<div  id="Getmsgcode">
    <h4>请求接口地址：http://118.31.45.231/api.php/Home/Recharge/recharge</h4>
   请求参数
  <table class="table"  width="400" border="1" cellspacing="0" cellpadding="0">
     <tr>
      <td>字段名称</td>
      <td>字段类型</td>
      <td>字段长度</td>
      <td>是否必须</td>
      <td>请求方式</td>
      <td>字段含义</td>
     </tr>
      <tr>
      <td>total</td>
      <td>decimal</td>
      <td>10,2</td>
      <td></td>
      <td></td>
      <td>订单金额</td>
     </tr>
      <tr>
      <td>method</td>
      <td>int</td>
      <td>1</td>
      <td></td>
      <td></td>
      <td>充值类型</td>
     </tr>
  </table>
<!--    返回参数
  <table class="table"  width="400" border="1" cellspacing="0" cellpadding="0">
     <tr>
      <td>字段名称</td>
      <td>字段类型</td>
      <td>字段长度</td>
      <td>是否必须</td>
      <td>字段含义</td>
     </tr>
      <tr>
      <td>code</td>
      <td>int</td>
      <td>11</td>
      <td></td>
      <td>成功失败编码（000008成功/000007失败）</td>
     </tr>
     <tr>
      <td>msg</td>
      <td>varchar</td>
      <td>255</td>
      <td></td>
      <td>成功失败信息</td>
     </tr>
  </table>-->
  </div>
</div>
</body>
</html>