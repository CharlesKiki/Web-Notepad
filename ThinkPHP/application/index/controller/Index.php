<?php
namespace app\index\controller;

class Index
{
	//似乎欠缺了继承?
    public function index()
    {
		echo "This is a test";
		//这一句话证明了控制器类是确实的在服务器被执行了
		//$this->fetch();
		//$this->display();
		//这一句话出错了，似乎这句话会导致跳转。
		return view();
			//调用的绝对文件路径是：application\index\view\index
			//index.html
    }
}
