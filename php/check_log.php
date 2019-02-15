<?php
ini_set("display_errors", "On");          //开启显示错误信息
error_reporting(E_ALL);                   //显示所有错误信息
include("../includes/conn.php");          //引入登陆数据库代码
$_SESSION['username']=$_POST['username']; //试图开启session让首页index接住session数组
$username=$_POST['username'];             //获取表单用户名
$userpwd=$_POST['userpwd'];               //获取表单密码

//用户检查方法类
class chkinput{
   var $name;
   var $pwd;
    
   //初始化私有变量
   function chkinput($x,$y){
     $this->name=$x;
     $this->pwd=$y;
    }

    //检查表单输入
    function checkinput(){
      mysqli_select_db($conn,"estore")or die("出错了？".mysqli_error($conn)) ; //实际上在conn.php已经登陆了
	    $sql=mysqli_query($conn,"select * from users where Username='$this->name';") or die("加载数据库失败".mysqli_error($conn)) ; 
      //$sql=mysqli_query($conn,"select * from users where Username='$this->name'")or die("抱歉，无法打开".$mysqli_error());
	 
	    //连接数据库之后对数据进行比对
      $info=mysqli_fetch_array($sql);//数据库查询结果
      if($info==false){
          echo "<script language='javascript'>alert('This user does not exist!');history.back();</script>";
          exit;
      }
      else{       
        echo "Login Success!" ;
        if($info['Password']==$this->pwd){  
          session_start();
          $_SESSION['username']=$info['Username'];
          echo "<script language='javascript'>parent.location.reload();window.location.href='../trips/index.php';</script>";
          exit;
        }
        else{
          echo "<script language='javascript'>alert('Incorrect password!');history.back();</script>";
          exit;
        }
      }    
   }
 }
$obj=new chkinput(trim($username),trim($userpwd));  //新对象
$obj->checkinput() ;                                //执行方法，开始检测登陆信息
//编写先前端返回的数据
//前端由此跳转网页
?>