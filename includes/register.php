<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>注册用户</title> 
</head> 
<body> 
  <?php 
    session_start(); 
    $username = $_REQUEST["username"]; 
    $password = $_REQUEST["password"]; 
  	$email    = $_REQUEST["email"]; 

    $con=mysqli_connect("localhost","root","test"); 
    //注意这里的参数需要根据需要变化
    if (!$con) { 
      die('数据库连接失败'.$mysqli_error()); 
    } 
    //检测是否连接成功数据库
    mysqli_select_db($con,"db_notepad"); 
    //选定特殊的数据库进行操作
    $dbusername=null; 
    $dbpassword=null;
    //这里是对登陆数据库的密码设置
    $result=mysqli_query($con,"select * from user where username ='{$username}';"); 
    //这里需要针对数据库内部的row进行查询
    if (!$result) {
			printf("Error: %s\n", mysqli_error($con));
			exit();
		}
    while ($row=mysqli_fetch_array($result)) { 
		$dbusername=$row["username"]; 
		$dbpassword=$row["password"];  
    } 
    if(!is_null($dbusername))
    { 
	?> 
		  <script type="text/javascript"> 
		    alert("用户已存在"); 
		    window.location.href="register.html"; 
		  </script>  
		  <?php 
    } 
    //检查用户名重复功能结束
    $id=mysqli_insert_id($con);
    mysqli_query($con,"insert into user (id,username,password,email) values('$id','$username','$password','$email')") or die("存入数据库失败".mysqli_error($con)) ; 
    mysqli_close($con); 
    //关闭SQL连接
  		?> 
  <script type="text/javascript"> 
    alert("注册成功"); 
    window.location.href="index.html"; 
  </script> 
  
</body> 
</html> 