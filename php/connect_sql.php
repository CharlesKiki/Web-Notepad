<?php
//
//  文件功能：登陆项目数据库
//  注释：如果出错则写入日志文件中
//
//
$con = mysqli_connect("localhost","root","test");   //登陆指定服务器
if (!$con){                                         //检查登陆
  die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"db_notepad");                //选区指定数据库
mysqli_query($conn,"set names utf-8");              //设置编码格式   
?>