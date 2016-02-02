<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>写点东西吧</title>
    <link href="css/index/base.css" rel="stylesheet">
    <link href="css/index/index.css" rel="stylesheet">
    <link href="css/index/media.css" rel="stylesheet">
    <link href="css/writething/writething.css" rel="stylesheet">
    
    <script src='js/jquery-1.8.0.min.js' type="text/javascript"></script>
    <script src="js/jquery.easyui.min.js"></script>
    <script src="js/layer-v2.0/layer/layer.js"></script>
    <script src='js/writeTing/writething.js' type="text/javascript"></script>

    <link href="js/umeditor/themes/default/_css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" charset="utf-8" src="js/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/umeditor/editor_api.js"></script>
    <script type="text/javascript" src="js/umeditor/lang/zh-cn/zh-cn.js"></script>


    <link rel="stylesheet" type="text/css" href="css/button/buttoncss/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/button/buttoncss/style4.css" />
    <link rel="stylesheet" type="text/css" href="css/button/buttoncss/style3.css" />
    <link rel="stylesheet" type="text/css" href="css/button/buttoncss/style2.css" />
    <link rel="stylesheet" type="text/css" href="css/button/buttoncss/style1.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>



</head>
<body>

<div class="ibody">
<?php echo view("header") ?>


<article>
    <div class="fatie">

      <image src="images/beij.jpg" style="height: 400px;width: 1000px"></image>
        <h1>write something</h1>

        <form id="mydorm" method="post" >
         <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
         <input type="hidden" name="preurl" id= "preurl" value="">

        <script type="text/javascript">
            var preurl = window.location.href ;
            $("#preurl").val(preurl)
        </script>

        <div class="title">
          &nbsp;<span>文章标题：</span><input type="text" name="title" id="title" class="titleinput">

        <span class="tjs">
          <input type="text" id="txt" class="a_demo_two" value="0时0分0秒">  
          <input type="button" value="开始写！" class="a_demo_two" id="start" onClick="timedCount()">  
          <input type="button" value="暂停啊！" class="a_demo_two" style="display: none" id="end" onClick="stopCount()">  
          <input type="button" value="回到起点" class="a_demo_two" onClick="clearAll()">  
        </span>
        </div>

            <script type="text/plain" id="myEditor" name="myEditor" style="width:700px;height:500px;">
                <p>随心写O(∩_∩)O</p>
            </script>
        </form>
        <p class="tijiao">
            <button id="tijiao" class="a_demo_four">点我提交</button>
            <br/><br/>
        </p>

    </div>
</article>


<?php 
 // 侧边栏 
 echo view("aside");

  ?>

  <script src="js/index/silder.js"></script>
  <div class="clear"></div>
  <!-- 清除浮动 --> 

    </div>


</body>
</html>