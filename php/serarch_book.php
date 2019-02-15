<?php
    $con = mysqli_connect("localhost","root","test");
	mysqli_select_db($con,"db_notepad");
    $bookresult=mysqli_query($con,"select bookName from notebook ;"); 
    $bookcolums=mysqli_num_fields($bookresult);
    $bookidresult=mysqli_query($con,"select id from notebook;"); 
    $bookid=mysqli_fetch_array($bookidresult);
    while ($bookname=mysqli_fetch_array($bookresult)) { 
        for($i=0; $i<$bookcolums; $i++){
            //此处查询所有的笔记名称
        }
    } 
    mysqli_close($con); 
?>