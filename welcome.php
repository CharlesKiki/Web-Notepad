<!doctype html> 
<html> 
<head>  
	<meta charset="UTF-8">
	<!-- 引入外部CSS -->
	<link href="css\style.css" rel="stylesheet" type="text/css"/>
	<title>MyBook</title>
	<!-- 引入EasyUI -->
	<link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
	<script type="text/javascript" src="easyui/jquery.min.js"></script>
	<script type="text/javascript" src="easyui/jquery.easyui.min.js"></script> 
	<!-- 引入字体文件 -->
	<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
</head> 
<style> 
<!-- Book栏特效 -->
.div-noteglass{ background:#FFFFFF;width:98%;height:12%;padding:2px;color:#080000; font-size:20px;
filter:alpha(Opacity=70);-moz-opacity:0.7;opacity: 0.7;
border-radius:5px 5px 5px 5px;border:2px solid #4169E1;} 
.div-noteglass:hover{
	background-color:#4682B4;
}
<!-- Note栏特效 -->
.div-bookglass{ background:#FFFFFF;width:95%;height:5%;padding:2px;color:#080000; font-size:20px;
filter:alpha(Opacity=70);-moz-opacity:0.7;opacity: 0.7;
border-radius:5px 5px 5px 5px;border:2px solid #4169E1;} 
.div-bookglass:hover{
	background-color:#4682B4;
}
</style> 
<body class="easyui-layout"> 
	<!-- 登陆的验证 -->
	<?php
	session_start (); 
	if (isset ( $_SESSION ["code"] )) {//判断code存不存在，如果不存在，说明异常登录 
	echo "${_SESSION["username"]}";//显示登录用户名
	}
	else {//code不存在，调用exit.php 退出登录 
	?> 
<script type="text/javascript"> 
  alert("退出登录"); 
  window.location.href="exit.php"; 
</script> 
<?php 
} 
?>
	<!-- 网页开始 -->
	<div data-options="region:'north',border:false" style="height:30px;background-color:#F0F8FF;">
	<!-- north region -->
		<a style="font-size:23px;" style="float:right">Hi,欢迎
		<?php
			echo $_SESSION["username"];
		?>     
		</a>
<script>
 /* 图标设置 */
	function ToExit(){
		  window.location.href="exit.php"; 
		  }
		function ChangePW(){
		  window.location.href="alter_password.html"; 
		  }
		function ChangeSetting(){
		  window.location.href="setting.php"; 
		}
		function temp(id) {  
		  document.getElementById("temp").src = id;  
		} 
</script>
		<i class="fa fa-key fa-2x" aria-hidden="true" onclick="ChangePW()" style="float:right">修改密码</i>
		<i class="fa fa-cog fa-2x" aria-hidden="true" onclick="ChangeSetting()" style="float:right">设置</i>
		<i class="fa fa-power-off fa-2x" aria-hidden="true" onclick="ToExit()" style="float:right">退出</i>
		<a id = "sy_time"> </a>
	</div>
	<div data-options="region:'east',title:'编辑笔记',split:true" style="width:900px;background-color:#F0F8FF;">
			<iframe id="temp" src="StaticNoteZone.html"   style="width:100%;height:100%;"></iframe>
	</div><!--这是编辑区-->

	</div>
    <div data-options="region:'west',title:'我的笔记本',split:true" style="width:200px;background-color:#F0F8FF;">
		<div style="margin-bottom:20px">
			<form action="lefttreeadd.php"  method="POST">
			<input type="submit" value="Add" name="submit" style="float:right;height:32px"></input>
			<input class="easyui-textbox" name="newfolder" data-options="prompt:'新建笔记本...'" style="width:78%;height:32px;float:left" >	
			</form>
		</div>
		<div class="div-bookglass">
		<a>Trash</a>
		<!--ID指向ifream-->
		</div>
		<!-- 动态笔记本 -->
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
	</div>
	<!-- 笔记List区域 -->
	<div data-options="region:'center',title:'我的笔记'" style="padding:5px;border:1px solid #ccc;background-color:#F0F8FF;">
		<!--动态笔记-->
		<div>
			<form action="search.php"  method="POST">
				<input type="submit" value="Search" name="submit" style="float:right;height:32px"></input>
				<input class="easyui-textbox" name="searchnote" data-options="prompt:'搜索笔记...'  " style="width:75%;height:32px;float:left" >	
			</form>
			<iframe src="search.php" style="width:100%;height:100%;">
			</iframe> 
		</div>
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
	</div>
	<!-- JS时间显示 -->
	<script language="JavaScript">
		function getTime(){ 
		   str = "当前时间："
		   var p = document.getElementById("sy_time"); 
		   time = new Date(); 
		   year = time.getFullYear(); 
		   month = time.getMonth() + 1; 
		   day = time.getDate(); 
		   hour = time.getHours(); 
		   minutes = time.getMinutes(); 
		   seconds = time.getSeconds(); 
		   str = str + year +"-"+ month +"-"+ day + " " +hour+":"+minutes+":"+seconds; 
		   p.innerText = str; 
		   setTimeout(getTime,1000); 
		 } 
		 window.onload = function(){ 
		   getTime(); 
		 }
	</script>
</body> 
</html> 