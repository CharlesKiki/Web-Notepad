<!doctype html> 
<html> 
<head>  
	<meta charset="UTF-8">
	<!-- 引入外部CSS -->
	<link href="css\style.css" rel="stylesheet" type="text/css"/>
	<title>MyBook</title>
	<!-- 引入EasyUI -->
	<link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
	<script type="text/javascript" src="easyui/jquery.min.js"></script>
	<script type="text/javascript" src="easyui/jquery.easyui.min.js"></script> 
	<!-- 引入字体文件 -->
	<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="css/buttons.css">
</head> 
<style type="text/css">

 

#nav ul {

Width:1000px;    

height:40px;      

margin:30px auto;

padding:0;

list-style:none; 

border-top:solid 5px  #D3D3D3;    

border-bottom:solid 5px  #D3D3D3; 

background:url(images/navig-bg.jpg)

}

 

#nav ul li {

width:100px;

float:left;

text-align:center;

font:16px/2.5 "microsoft yahei";

}

#nav ul li a {

color:#6495ED; text-decoration:none;

}

#nav ul li a:hover {

display:block; color:#FFFFFF; background:#87CEFA;

}

 

</style>
<body class="easyui-layout">

	<div data-options="region:'center',title:'我的设置'">
<div id="nav">
	
    <ul>	
	
		<li><a  href="welcome.php" />返回笔记</a></li>
		
        <li><a href="#" />账号信息</a></li>

        <li><a href="#" />账号安全</a></li>

        <li><a href="#" />修改阅读密码</a></li>

        <li><a href="#" />邮件提醒</a></li>

        <li><a href="#" />应用管理</a></li>


        <li><a href="#" />联系我们</a></li>


</ul>   

</div>
		<div style="width:600px;margin-left:auto;margin-right:auto;">
		<h1>账号信息</h1>
	<?php
		$con = mysqli_connect("localhost","root","test");
		mysqli_select_db($con,"db_notepad");
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
		</div>
	</div>
</body>
</html> 