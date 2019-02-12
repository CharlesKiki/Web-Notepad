	<!-- 登陆的验证 -->
	<?php
	session_start (); 
	if (isset ( $_SESSION ["code"] )) {//判断code存不存在，如果不存在，说明异常登录 
	echo "${_SESSION["username"]}";//显示登录用户名
	}
	else {//code不存在，调用exit.php 退出登录 
    ?> 
    <?php 
    } 
    ?>

<?php
			echo $_SESSION["username"];
        ?>
        
        <?php
	error_reporting( E_ALL&~E_NOTICE );
	/* 消除PHP警告 */
		$con = mysqli_connect("localhost","root","test");
		mysqli_select_db($con,"db_notepad");
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
				echo '<div class="div-noteglass">';
				echo '<form action="dynamicEditZone.php"  method="POST" >';
				echo '<input type="hidden" value=" ';
				echo "$noteid[$i]";
				echo ' " name="Cdata" id="Cdata" />';
				echo '<button type="submit" >';			
				echo "$notename[$i]";echo '</button><br>';
				/* print_r($noteid); */
				echo '</form>';
				echo '<form action="NoteDelete.php"  method="POST">';
				echo '<input type="hidden" value=" ';
				echo "$noteid[$i]";
				echo ' " name="data" id="data" />';
				echo '<button type="submit" style="float:right; "><i class="fa fa-trash" aria-hidden="true"></i></button>';
				echo '<a style="font-size:2px">';
				echo "$updateTime[$i]";echo 'mark';
				echo '</a>';
				echo '</form>';
				echo '</div>';
				}
			}
		} 
		mysqli_close($con); 
    ?>
    
    <?php
			$con = mysqli_connect("localhost","root","test");
			mysqli_select_db($con,"db_notepad");
			$bookresult=mysqli_query($con,"select bookName from notebook ;"); 
			$bookcolums=mysqli_num_fields($bookresult);
			$bookidresult=mysqli_query($con,"select id from notebook;"); 
			$bookid=mysqli_fetch_array($bookidresult);
			while ($bookname=mysqli_fetch_array($bookresult)) { 
				for($i=0; $i<$bookcolums; $i++){
					echo '<div class="div-bookglass">';
					echo '<form action="BookDelete.php"  method="POST">';
					echo '<input type="hidden" value="';
					echo "$bookid[$i]";
					echo '" name="data" id="data" />';
					echo '<a href="">';echo "$bookname[$i]";echo '</a>'; echo '<button type="submit" style="float:right; "><i class="fa fa-trash" aria-hidden="true"></i></button>';
					echo '</form>';
					echo '</div>';
				}
			} 
			mysqli_close($con); 
		?>