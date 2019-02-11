//
//  方法：enter()
//  功能：检查表单输入信息，一些明显的逻辑错误，减轻服务器的压力
//
  function enter()
  {
    var username=document.getElementById("username").value; //获取form中的用户名
    var password=document.getElementById("password").value;
    var regex=/^[/s]+$/;                                    //声明一个判断用户名前后是否有空格的正则表达式
    if(regex.test(username)||username.length==0)            //判定用户名的是否前后有空格或者用户名是否为空
      {
        alert("用户名格式不对");
        return false;
      }
    if(regex.test(password)||password.length==0)            //同上述内容
    {
      alert("密码格式不对");
      return false;
    }
    //增加验证码检查
    
    return true;
  }
  //设置此处的原因是每次进入界面展示一个随机的验证码，不设置则为空