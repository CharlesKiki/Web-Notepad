
  <?php 
    session_start();//登录系统开启一个session内容 
    $username=$_REQUEST["username"];//获取html中的用户名（通过post请求） 
    $password=$_REQUEST["password"];//获取html中的密码（通过post请求） 
  

    mysqli_select_db($con,"db_notepad");//db_notepad数据库； 
    $dbusername=null; 
    $dbpassword=null; 
	$userid=null;
	/* 增加一个针对当前用户ID的记录	*/
    $result=mysqli_query($con,"select * from user where username ='{$username}';");//查出对应用户名的信息，isdelete表示在数据库已被删除的内容
    if (!$result) {
			printf("Error: %s\n", mysqli_error($con));
			exit();
		}	
    while ($row=mysqli_fetch_array($result,MYSQLI_BOTH)) {//while循环将$result中的结果找出来 
      $dbusername=$row["username"]; 
      $dbpassword=$row["password"]; 
    } 
    if (is_null($dbusername)) {//用户名在数据库中不存在时跳回index.html界面 
    //用户名不存在

    } 
    else { 
      if ($dbpassword!=$password){//当对应密码不对时跳回index.html界面 
      //密码错误
      } 
      else { 
		$IDresult=mysqli_query($con,"select id from user where username ='$username';");
		$ID=mysqli_fetch_array($IDresult,MYSQL_BOTH);
		//打印
		$_SESSION["userid"]=$ID['id'];
        $_SESSION["username"]=$username; 
        $_SESSION["code"]=mt_rand(0, 100000);//给session附一个随机值，防止用户直接通过调用界面访问welcome.php 
      } 
    } 
  mysqli_close($con);//关闭数据库连接，如不关闭，下次连接时会出错 
  ?> 
