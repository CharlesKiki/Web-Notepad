# What is this? #
一个仿制笔记的Web应用。但是重点在于“重构”的乐趣。

### 特点

简言之，不使用框架就以原生的语言来开发一个网站，最大的好处就是最实现方法的理解会加深。但是不适用框架也意味着重复和冗余，这也导致了项目阅读时的阅读思路。

### 设计稿
毕竟是一款笔记，简单但是重在以多写多看的的方式去实现。这也是考虑到CSS的重要性提出的问题。

### 项目结构
这里主要介绍了作为一个开发者快速明白各个功能模块和代码的组织方式的介绍。

### 依赖以及如何使用
这个项目的本意不是用来使用的，而是用来折腾的，但是即便如此也要有依赖的介绍和安装的说明。

### 对版本和功能的预计
这里提出了对这个应用的一些要求，可能是功能上的，也可能是在开发的标准上的。这有益于更加清晰的认识软件的边界和维护并阅读代码。

### 源码文件介绍
    index.html         登录页
    php/
     - connect_sql.php 登陆指定的SQL数据库
    
    includes/
     - mainpage.html   主界面
     
    js/               
     - form_check.js   表单检查
    css/


    关于运行环境
    Wamp的PHP版本更换需要修改一定的配置文件，并不友好。所以采用了国内的集成PHP环境。自带多个版本。
    关于站点配置
        注意Hosts文件中要配置虚拟站点和对应的本地地址例如
            127.0.0.1 mynotebook.com
        以及注意虚拟站点可以免于将项目放在Localhost之中

    PHP version 7.2.13
        Focus：Composer也用了这个版本，所以在使用composer.phar文件时要注意版本

Yii
在使用Composer的时候可以直接配置环境变量，然后使用Composer命令。
项目模板安装 ：composer create-project yiisoft/yii2-app-basic basic

Hello Yii
http://mynotebook.com/index.php?r=site/say&message=Hello+World 这是一个经过配置虚拟站点后的访问地址