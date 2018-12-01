<?php
namespace app\index\controller;
#Focus: the namespace is only a string not a path  
#but in this way,the file and class we use is cearly
use think\Controller;
#Focus:use is about class,here means a class name not a file 
class Login extends Controller
{
    public function index()
    {
    	return $this->fetch();
    }   
}