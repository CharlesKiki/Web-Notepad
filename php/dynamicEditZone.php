
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
 <script>
		   function ChangeColor(){
  x=document.getElementById("Dycontent");
  x.style.fontWeight="bold";
  }
		   function ChangeStyle(){
  x=document.getElementById("Dycontent");
  x.style.fontStyle="italic";
  }
    </script>
<html> 
<body class="easyui-layout"> 
<div style="width:100%;height:100%;" ><!--这是编辑栏-->
<?php
session_start();
$show=$_POST['Cdata'];
echo $show;

$nameresult=mysqli_query($con,"select notename from note where id='$show';") or die("存入数据库失败".mysqli_error($con)) ;
$name=mysqli_fetch_array($nameresult);	
$contentresult=mysqli_query($con,"select content from note where id='$show';") or die("存入数据库失败".mysqli_error($con)) ;
$content=mysqli_fetch_array($contentresult);	
?>
				<!--这是标题栏-->
				<form action="dyna-rightnoteadd.php"  method="POST">
				<input class="easyui-textbox"  value=" 
				<?php
				echo $name[0];
				?>
				" name='newnote' style="width:100%;height:40px"><input type="submit" value="Save" name="submit" ></input>
				<input class="easyui-combobox" style="width:100px;" >
				<input class="easyui-combobox" style="width:100px;" >
				<i style="font-size:18px" class="fa" onclick="ChangeColor()">&#xf032</i>
				<i style="font-size:18px" class="fa" onclick="ChangeStyle()">&#xf033</i>
				<i style="font-size:18px" class="fa">&#xf0cd</i>
				<i style="font-size:18px" class="fa">&#xf035</i>
				
				<i style="font-size:18px" class="fa">&#xf036</i>
				<i style="font-size:18px" class="fa">&#xf039</i>
				<i style="font-size:18px" class="fa">&#xf038</i>
				<textarea name="notecontent"  id="Dycontent"  style="width:100%;height:500px">
				<?php echo "$content[0]"; ?>				
				</textarea>
				<!--文字编辑区-->

				
				 <?php  
				

							mysqli_close($con); 
							//关闭SQL连接
						?>
								</form>
		</div><!--这是编辑区-->
		</body>
		</html> 