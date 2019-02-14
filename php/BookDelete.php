<?php 
    session_start(); 
	$BookID=$_POST["data"];

    //选定特殊的数据库进行操作
    mysqli_query($con,"delete from notebook where id='$BookID';") or die("存入数据库失败".mysqli_error($con)) ; 
    mysqli_close($con); 
    //关闭SQL连接
  		?> 

    //删除成功

