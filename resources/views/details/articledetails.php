<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="csrf-token" content="<?php echo csrf_token(); ?>" />
    <title>文章详情</title>
    <link href="../css/index/base.css" rel="stylesheet">
    <link href="../css/index/index.css" rel="stylesheet">
    <link href="../css/index/media.css" rel="stylesheet">
    <link href="../css/index/style.css" rel="stylesheet">
    <link href="../css/articles/articledetails.css" rel="stylesheet">

    <script src='../js/jquery-1.8.0.min.js' type="text/javascript"></script>
    <script src="../js/jqueryeasyfy/jqueryfeye.js"></script>
    <script src='../js/jquery-form.js' type="text/javascript"></script>
    <script src="../js/jquery.easyui.min.js"></script>
    <script src="../js/layer-v2.0/layer/layer.js"></script>
    <script src="../js/articles/articledetails.js"></script>


    <link rel="stylesheet" type="text/css" href="../css/button/buttoncss/demo.css" />
    <link rel="stylesheet" type="text/css" href="../css/button/buttoncss/style4.css" />
    <link rel="stylesheet" type="text/css" href="../css/button/buttoncss/style3.css" />
    <link rel="stylesheet" type="text/css" href="../css/button/buttoncss/style2.css" />
    <link rel="stylesheet" type="text/css" href="../css/button/buttoncss/style1.css" />
    <link rel="stylesheet" type="text/css" href="../js/jqueryeasyfy/jqueryfycss.css" />


    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


</head>
<body>

<div class="ibody">
<?php echo view("header2") ?>



<?php 
    
    $beforeAtr = "";
    $afterAtr = "";

      if(count($res) == 3)
       {
        $now = $res[1];
        // 判断前一页和后一页
         $beforeAtr = $res[0];
         $afterAtr = $res[2];
       }else{
        $now = $res[0];

        if($res[0]->id > $res[1]->id){
          // 当前文章的id大（最新的文章）
          $afterAtr  =  $res[1];
        }else{
          $beforeAtr =  $res[1];
        }

       }


 ?>

<input type="hidden" id="nowuserkey" value="<?php echo $now->userkey; ?>">
<input type="hidden" id="nowaticlekey" value="<?php echo $now->articleid; ?>">

<article>

   <h2 class="about_h">您现在的位置是：<a href="../indexmain">首页</a>><a href="">文章详情</a></h2>
    <div class="index_about">
      <h2 class="c_titile"><?php echo $now->title;  ?></h2>
      <p class="box_c"><span class="d_time">发布时间：<?php echo $now->jointime; ?></span><span>作者：<?php  echo $now->title;?></span><span>浏览（0）</span><span id="plliang" data-articlekey="<?php echo  $now->articleid; ?>">评论量（0）</span></p>

      <ul class="infos">
       <?php echo $now->content; ?>
      </ul>
      <div class="keybq">
        <p>-----------------------------------------------我是分割线-------------------------------------------------------</p>
      </div>
      <div class="nextinfo">
  
            <?php 

                if("" == $beforeAtr)
                {
                  echo '<p>上一篇：<a style="text-decoration:none;"><b style="color:#FF4040">到顶啦</b></a></p>';
                }else{
                  echo '<p>上一篇：<a href="../article/details?now='.$beforeAtr->articleid.'">'.$beforeAtr->title.'</a></p>';
                }


                if("" != $afterAtr)
                {
                  echo '<p>下一篇：<a href="../article/details?now='.$afterAtr->articleid.'">'.$afterAtr->title.'</a></p>';
                }else{
                  echo '<p>下一篇：<a style="text-decoration:none;"><b style="color:#FF4040">到底啦</b></a></p>';
                }



             ?>

      </div>
     
    </div>

<div id="posts">
      <div class="post">
  <div id="comments">
        <img src="../images/title3.gif" alt="" width="216" height="39" /><br />
 <div id="needwrite">
<?php if(isset($replyres[0])) foreach ($replyres as $key => $value): ?>
  
    
        <div class="comment">
          <div class="avatars">
            <img src="<?php echo "../".$value->headimg; ?>" alt="" width="80" height="80" /><br />
            <span><?php echo $value->username; ?></span><br /><br />
            <?php echo $value->addtime; ?>
          </div>
          <p>  <?php echo $value->content; ?></p>
        </div>
   

        
<?php endforeach ?>
   </div>


  <div style="width: 635px;float: left;margin-top: 20px">
    <!-- 分页 -->
   <div class="tcdPageCode"></div>
   <input type="hidden" value="<?php echo ($totalCount[0]->countnum); ?>" id="totalPage">
   <input type="hidden" value="<?php echo ($articlekey); ?>" id="articlekey">

   <script>
    var totalPage = $("#totalPage").val()
    var everyPageShow = 5
      $(".tcdPageCode").createPage({
          pageCount:Math.ceil(totalPage/everyPageShow),
          current:1,
          backFn:function(p){
              console.log(p);
          }
      });
  </script>

  </div>
        <div id="add">
          <img src="../images/title4.gif" alt="" width="216" height="47" class="title" /><br />
          <div class="avatars">
          <?php if(isset($nowuserInfo)) { ?>
              <img src="<?php echo "../".($nowuserInfo[0]->headimg) ?>" alt="" width="80" height="80" /><br />
              <span><?php echo $nowuserInfo[0]->username; ?></span><br />
          <?php } else { ?>
              <img src="../images/avatar2.gif" alt="" width="80" height="80" /><br />
              <span>Name User</span><br />
          <?php } ?>
          </div>


          <div class="form">
            <form id="replyform">
              <textarea>我也要说一句...</textarea><br />

              <span class='reply' id="replyOne">回复</span>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</article>






<?php 
 // 侧边栏 
 echo view("aside2");

  ?>


  <div class="clear"></div>
  <!-- 清除浮动 --> 

    </div>


</body>
</html>