<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>快递查询</title>
	<script type="text/javascript" src="<?php echo (ROOT_URL); ?>/Public/common/plugins/kdniao/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo (ROOT_URL); ?>/Public/common/plugins/kdniao/kdniao.js"></script>
</head>
<body>
<!--<a href="#" onclick="kdniao.query(<?php echo ($expressno); ?>,<?php echo ($expressname); ?>)">点击查询</a>-->
<!--采用浮动的方式，可添加 class="flo"-->
</body>
<script type="text/javascript">
	$(function(){
		kdniao.init();
		//如果使用页面自动加载，需要在页面加载中调用以下函数
		kdniao.query("<?php echo ($expressno); ?>","<?php echo ($expressname); ?>");
	});
</script>
</html>