<?php 
    session_start(); 
	$NoteID=$_POST["data"];

    mysqli_query($con,"delete from note where id='$NoteID';") or die("存入数据库失败".mysqli_error($con)) ; 
    mysqli_close($con); 
    //关闭SQL连接
?> 