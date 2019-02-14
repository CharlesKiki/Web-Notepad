<?php
session_start();
$show=$_POST['Cdata'];
echo $show;

$nameresult=mysqli_query($con,"select notename from note where id='$show';") or die("存入数据库失败".mysqli_error($con)) ;
$name=mysqli_fetch_array($nameresult);	
$contentresult=mysqli_query($con,"select content from note where id='$show';") or die("存入数据库失败".mysqli_error($con)) ;
$content=mysqli_fetch_array($contentresult);	
?>
				<?php echo "$content[0]"; ?>				
				<?php  
						mysqli_close($con); 
							//关闭SQL连接
				?>