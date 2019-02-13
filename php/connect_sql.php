$con = mysqli_connect("localhost","root","test");
        mysqli_select_db($con,"db_notepad");
        
        $con=mysqli_connect("localhost","root","test");
mysqli_select_db($con,"db_notepad");  

$con = mysqli_connect("localhost","root","test");
if (!$con)
 {
 die('Could not connect: ' . mysqli_error($con));
 }
/* 登陆数据库 */
mysqli_select_db($con,"db_notepad");
/* 选定数据库 */

$con=mysqli_connect("localhost","root","test");//连接mysql 数据库，账户名root ，密码root 
    if (!$con) { 
      die('数据库连接失败'.$mysqli_error()); 
    } 

    $con = mysqli_connect("localhost","root","test");
if (!$con)
 {
 die('Could not connect: ' . mysqli_error($con));
 }
/* 登陆数据库 */
mysqli_select_db($con,"db_notepad");
/* 选定数据库 */

$con=mysqli_connect("localhost","root","test"); 
    //注意这里的参数需要根据需要变化
    if (!$con) { 
      die('数据库连接失败'.$mysqli_error()); 
    } 
    //检测是否连接成功数据库
    mysqli_select_db($con,"db_notepad"); 
    //选定特殊的数据库进行操作

    $con=mysqli_connect("localhost","root","test"); 
    //注意这里的参数需要根据需要变化
    if (!$con) { 
      die('数据库连接失败'.$mysqli_error()); 
    } 
    //检测是否连接成功数据库
    mysqli_select_db($con,"db_notepad"); 
    //选定特殊的数据库进行操作

    $con = mysqli_connect("localhost","root","test");
if (!$con)
 {
 die('Could not connect: ' . mysqli_error($con));
 }
/* 登陆数据库 */
mysqli_select_db($con,"db_notepad");
/* 选定数据库 */

$con = mysqli_connect("localhost","root","test");
        mysqli_select_db($con,"db_notepad");
        
        //连接数据库
	//此处连接数据库应该是一种浪费的行为
	//连接可以持续多久？
  $con = mysqli_connect ( "localhost", "root", "test" ); 
  if (! $con) { 
    die ( '数据库连接失败' . $mysqli_error () ); 
  } 
  mysqli_select_db ($con,"db_notepad"); 

  $con=mysqli_connect("localhost","root","test"); 
    //注意这里的参数需要根据需要变化
    if (!$con) { 
      die('数据库连接失败'.$mysqli_error()); 
    } 
    //检测是否连接成功数据库
    mysqli_select_db($con,"db_notepad"); 

    $con = mysqli_connect("localhost","root","test");
		mysqli_select_db($con,"db_notepad");