<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>正在修改密码</title> 
</head> 
<body> 
  <?php
  session_start ();
	//Session是保存到服务器的一种会话保存方式。
		//尝试增加Cookie验证方式
		//Session验证方式
		//数据库验证方式
  $username = $_REQUEST ["username"]; 
  $oldpassword = $_REQUEST ["oldpassword"]; 
  $newpassword = $_REQUEST ["newpassword"]; 
    
	//连接数据库
	//此处连接数据库应该是一种浪费的行为
	//连接可以持续多久？
  $con = mysqli_connect ( "localhost", "root", "test" ); 
  if (! $con) { 
    die ( '数据库连接失败' . $mysqli_error () ); 
  } 
  mysqli_select_db ($con,"db_notepad"); 
  $dbusername = null; 
  $dbpassword = null; 
  $result = mysqli_query ($con,"select * from user where username ='{$username}';" ); 
  if (!$result) {
	printf("Error: %s\n", mysqli_error($con));
	exit();
		}  
  while ( $row = mysqli_fetch_array ($result,MYSQLI_BOTH) ) { 
    $dbusername = $row ["username"]; 
    $dbpassword = $row ["password"]; 
  } 
  if (is_null ( $dbusername )) { 
    ?> 
  <script type="text/javascript"> 
    alert("用户名不存在"); 
    window.location.href="alter_password.html"; 
  </script>  
  <?php
  } 
  if ($oldpassword != $dbpassword) { 
  //尚不清楚PHP和JS的交互方式，传值方式。
  //服务器处理的信息应该通缩JS的AJAX进行通信而不是
  //全部的交互在远程进行。这里的错误就是渲染和业务逻辑全部耦合
  //采用PHP框架可以解决这个问题。
  //get post
    ?> 
	
  <script type="text/javascript"> 
    alert("密码错误"); 
    window.location.href="alter_password.html"; 
  </script> 
  <?php
  } 
  mysqli_query ($con,"update user set password='{$newpassword}' where username='{$username}'" ) or die ( "存入数据库失败" . mysql_error () );//如果上述用户名密码判定不错，则update进数据库中 
  mysqli_close ( $con ); 
  ?> 
  
  
  <script type="text/javascript"> 
    alert("密码修改成功"); 
    window.location.href="index.html"; 
  </script> 
</body> 
</html> 