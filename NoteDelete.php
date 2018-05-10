<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
 <title>Delete</title> 
</head> 
<body> 
  <?php 
    session_start(); 
	$NoteID=$_POST["data"];
    $con=mysqli_connect("localhost","root","test"); 
    //注意这里的参数需要根据需要变化
    if (!$con) { 
      die('数据库连接失败'.$mysqli_error()); 
    } 
    //检测是否连接成功数据库
    mysqli_select_db($con,"db_notepad"); 
    //选定特殊的数据库进行操作
    mysqli_query($con,"delete from note where id='$NoteID';") or die("存入数据库失败".mysqli_error($con)) ; 
    mysqli_close($con); 
    //关闭SQL连接
  		?> 
  <script type="text/javascript"> 
    alert("删除成功"); 
    window.location.href="welcome.php"; 
  </script> 
    
</body> 
</html> 