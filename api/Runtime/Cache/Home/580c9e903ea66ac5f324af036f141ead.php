<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<script
  src="http://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
</head>
<body>
<script>
window.onload = function(){
    $.ajax({
	 method:"POST",
	 url:"http://118.31.45.231/api.php/Home/Shopcart/index",
	 data:{loginName:'18516232061'}
   }).done(function(msg){
	 var obj = JSON.parse(msg);
	 console.log(obj);
   })
}
</script>
</body>
</html>