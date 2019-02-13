<!doctype html> 
<html> 
<head>  
	<meta charset="UTF-8">
	<!-- 引入外部CSS -->
	<link href="css\style.css" rel="stylesheet" type="text/css"/>
	<title>MyNote</title>
	<!-- 引入EasyUI -->
	<link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
	<script type="text/javascript" src="easyui/jquery.min.js"></script>
	<script type="text/javascript" src="easyui/jquery.easyui.min.js"></script> 
	<!-- 引入字体文件 -->
	<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="css/buttons.css">
</head> 

<html> 
<body class="easyui-layout"> 
<div style="width:100%;height:100%;" ><!--这是编辑栏-->
<?php
session_start();
$notename=NULL;
$_POST["searchnote"]=NULL;
$notename=$_POST["searchnote"];
echo $notename;
$con=mysqli_connect("localhost","root","test");
mysqli_select_db($con,"db_notepad");  
$nameresult=mysqli_query($con,"select notename from note where id='$notename';") or die("存入数据库失败".mysqli_error($con)) ;
$name=mysqli_fetch_array($nameresult);	
$contentresult=mysqli_query($con,"select content from note where id='$notename';") or die("存入数据库失败".mysqli_error($con)) ;
$content=mysqli_fetch_array($contentresult);	
	
		$noteidresult=mysqli_query($con,"select id from note ;"); 
		$noteid=mysqli_fetch_array($noteidresult);
		
		
		$showresult=mysqli_query($con,"select count(*) as AllNum from note ;"); 	
		$showcolums=mysqli_num_rows($noteidresult);
		/* echo  $showcolums; */
				$noteresult=mysqli_query($con,"select notename from note ;"); 
		$notecolums=mysqli_num_fields($noteresult);
		$notename=mysqli_fetch_array($noteresult,MYSQL_BOTH);
/* 		echo $notename[0]; */

		
		$noteresult=mysqli_query($con,"select noteName from note ;"); 
		$notecolums=mysqli_num_fields($noteresult);
	/* 	echo $notecolums; */
		$noteedittime=mysqli_query($con,"select updateTime from note ;"); 
		$updateTime=mysqli_fetch_array($noteedittime);
		while ($notename=mysqli_fetch_array($noteresult)) { 
			for($i=0; $i<$notecolums; $i++){
				echo '<div class="div-noteglass">';
				echo '<form action="dynamicEditZone.php"  method="POST">';
				echo '<input type="hidden" value=" ';
				echo "$noteid[$i]";
				echo ' " name="Cdata" id="Cdata" />';
				echo '<button type="submit">';			
				echo "$notename[$i]";echo '</button><br>';
				echo '</form>';
				echo '<form action="NoteDelete.php"  method="POST">';
				echo '<input type="hidden" value="';
				echo "$noteid[$i]";
				echo '" name="data" id="data" />';
				echo '<button type="submit" style="float:right; "><i class="fa fa-trash" aria-hidden="true"></i></button>';
				echo '<a style="font-size:2px">';
				echo "$updateTime[$i]";
				echo '</a>';
				echo '</form>';
				echo '</div>';
			}
		} 
		mysqli_close($con); 
	?>
		</body>

		</html> 
