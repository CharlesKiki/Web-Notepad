<?php
	error_reporting( E_ALL&~E_NOTICE );
	/* 消除PHP警告 */

		$noteidresult=mysqli_query($con,"select id from note ;"); 
		$noteid=mysqli_fetch_array($noteidresult);
		/* print_r($noteidresult); */
		/*   mysqli_fetch_all()*/
		$noteresult=mysqli_query($con,"select notename from note ;"); 
		$notecolums=mysqli_num_fields($noteresult);
		$notename=mysqli_fetch_array($noteresult,MYSQL_BOTH);
		/* 	echo $notename[0]; */
		$noteresult=mysqli_query($con,"select noteName from note ;"); 
		$notecolums=mysqli_num_rows($noteresult);
	/* 	echo $notecolums; */
		$noteedittime=mysqli_query($con,"select updateTime from note ;"); 
		$updateTime=mysqli_fetch_array($noteedittime);
		while ($notename=mysqli_fetch_array($noteresult)) { 
			for($i=0; $i<=$notecolums; $i++){
				if($noteid[$i]!=0){
					//此处应该返回一个JSON数据，让前端接收此数据，并且缓存到本地
				}
			}
		} 
		mysqli_close($con); 
    ?>