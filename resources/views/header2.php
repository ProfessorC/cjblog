  <header>
    <h1>

    <?php 

    
      $username = Session::get('username');

      if($username == "")
      {
        echo "Welcome to：教授的博客";
        echo "<a href='../login'  style='cursor:pointer;margin-left:20px;font-size:12px;font-family:Arial'>【点我登陆】</a>";
      }else{
        echo "<span>欢迎您：<a href='../user/usercenter'>".$username."</a></span>";
        echo "<span id='zxiao' style='cursor:pointer;margin-left:20px;font-size:12px;font-family:Arial'>【注销】</span>";
      }

     ?>

    </h1>
    <h2>很多人都是活在别人的眼中的，但是也有很多人是活在自己的世界里，这都是不同的生活方式。</h2>
    <div class="logo"><a href="../indexmain"></a></div>
  <nav id="topnav">
    <a href="../indexmain">首页</a> 
    <a href="../aboutme">关于我</a>
    <a href="../writeThing">写点什么</a>
    <a href="../seeTing">看到什么</a>
  </nav>
  </header>

    <script type="text/javascript">

    $(document).ready(function(){

      $("#zxiao").click(function(){

        window.location.href = "../clearLogin"

      })


    })

  </script>