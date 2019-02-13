<!-- 
	检查是否有指定的note条目和插入指定的note条目 
	应该使用拆分的方法分别的写这些功能

	JS调用这些接口，然后使用JS在页面显示这个信息
 -->

<?php
/* 注意，一个PHP就是直接返回了一个功能 */
session_start();//登录系统开启一个session内容 
$notename=$_POST["newnote"];
$notecontent=$_POST["notecontent"];
/* 首先用PHP接住来自客户端的参数 */

$result=mysqli_query($con,"select * from note where notename ='{$notename}';"); 
//这里需要针对数据库内部的row进行查询
if (!$result) {
		printf("Error: %s\n", mysqli_error($con));
		exit();
}
if (!$result) {
	printf("Error: %s\n", mysqli_error($con));
	exit();
}
//检查有没有要查询的指定条目
while ($row=mysqli_fetch_array($result)) { 
  $$notename=$row["notename"]; 
} 
  if(!is_null($notename)){ 
	?> 
		  <script type="text/javascript"> 
		    alert("笔记已存在"); 
			/* window.location.href="welcome.php"; */
		  </script>  
		  <?php 
    } 
	$ID=$_SESSION["userid"];
    mysqli_query($con,"insert into note(userid,notename,content) values('$ID','$notename','$notecontent');") or die("存入数据库失败".mysqli_error($con)); 
    mysqli_close($con); 
    //关闭SQL连接
		?> 
  <script type="text/javascript"> 
    alert("添加成功"); 
	window.location.href="dynamicEditZone.php";
  </script> 