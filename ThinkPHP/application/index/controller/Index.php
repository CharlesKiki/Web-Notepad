<?php
namespace app\index\controller;
class Index
{
	//似乎欠缺了继承?
    public function index()
    {
		//$this->fetch();
			//这个方法可能是view的
		//$this->display();
		//这一句话出错了，似乎这句话会导致跳转。
		return view();
			//view助手函数渲染模板输出
			//调用的绝对文件路径是：application\index\view\index
			//index.html
    }
	public function sample()
	{
	//访问这个方法的方法
	//http://localhost/Web-Notepad/ThinkPHP/public/index.php
	//从此处直接跳转到application
	///index（模块）/index（控制器的index控制器）/sample（方法）
		//$apple = "This is a apple.";
		//$banana = "As you wish,this is a banana.";
		//$this->assign('Apple',$apple);
        //$this->assign('Banana',$banana);
		//使用this需要继承
		//return view();
		//这种类型的参数往往都是用户请求传入的
			//那么应该怎么传入这个值呢？
				//思路1：URL传值
				//思路2：表单Post传值
		//URL请求都是$_GET $_POST传入的
		//return 'Hello';
	//静态创建
                return view('sample',[
                    'name'=>'haha',
                    'site'=>'site'
                ]);

    }
	public function VarableTest($VarOne,$VarTwo)
	{
	//Get访问方法
	//http://localhost/Web-Notepad/ThinkPHP/public/index.php
	///index/index/VarableTest?VarOne=11&VarTwo=22
	//格式：
	//http://localhost:端口号/根目录/thinkPHP包文件目录/public/index.php
	///模块名/控制器名/操作方法名？参数一=值一&参数二=值二......
	//PathInfo访问方法
	//
		echo "test a 的值是$VarOne,b的值是$VarTwo";
	}
}
