<?php
		
		$userresult=mysqli_query($con,"select username from user ;"); 
		$username=mysqli_fetch_array($userresult);
		$createTimeresult=mysqli_query($con,"select createTime from user ;"); 
		$createTime=mysqli_fetch_array($createTimeresult);
		echo '<h2>账号：';
		echo $username[0];
		echo '</h2>';
		echo '<h2>注册日期：';
		echo $createTime[0];
		echo '</h2>';
		mysqli_close($con); 
	?>