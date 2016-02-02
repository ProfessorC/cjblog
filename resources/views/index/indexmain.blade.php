<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>cjblog</title>
<meta name="keywords" content="cjblog" />
<meta name="description" content="cjblog" />
<link href="css/index/base.css" rel="stylesheet">
<link href="css/index/index.css" rel="stylesheet">
<link href="css/index/media.css" rel="stylesheet">
<script src='js/jquery-1.8.0.min.js' type="text/javascript"></script>
<script type="text/javascript" src="js/index/index.js"></script>
<script src="js/layer-v2.0/layer/layer.js"></script>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
</head>
<body>
<div class="ibody">
	<?php 


// 	$xx = 	DB::select('select * from users');
// var_dump($xx);

// 插入
// $yy = DB::insert('insert into user (username, sex,age,createtime) values (?, ?,?,?)', ['张三', '男','123','2015-10-26 00:00:00']);

// var_dump($yy);
// 	$xx = 	DB::select('select * from user');
// var_dump($xx);

	 ?>
<?php echo view("header") ?>



  <article>

    <div class="banner">
      <ul class="texts">
        <p>The best life is use of willing attitude, a happy-go-lucky life. </p>
        <p>最好的生活是用心甘情愿的态度，过随遇而安的生活。</p>
      </ul>
    </div>



    <div class="bloglist">
      <h2>
        <p><span>推荐</span>文章</p>
      </h2>


      <?php 
      use App\Common\StringTools;

      foreach ($articleList as $key => $oneart) {
          echo '<div class="blogs">';
            echo '<h3><a href="./article/details?now='.$oneart->articleid.'">';
            echo $oneart->title;
            echo '</a></h3>';
            echo '<div class="cdiv">';

            // 图片路径获取
             $picurlist = StringTools::getUrlFromContent($oneart->content);
             // 判断文章中是否有图片
             if(empty($picurlist[1])){
               // 添加默认图
               echo '<figure><img src="images/01.jpg" ></figure>';
               
             }else{
               // 显示第一张图
               $onepicurl = ($picurlist[1][0]);
               echo ' <figure><img style="" src="'.$onepicurl.'" ></figure>';
             }
             
            
             echo "<ul>";
              echo '<p>';
               $content = $oneart->content;

               // 删除文章中的图片
               $content = StringTools::removeAllPicFromContent($content);
               // 去除html标签
               $content = strip_tags($content);

               $len = mb_strlen($content,'utf-8');
           
               if($len > 140)
               {
                 // 截取一下字符串
                 echo(mb_substr( $content, 0, 140, 'utf-8' )."...");
               }else{
                echo $content;
               }
               
              echo '</p>';
          
             echo "</ul>";
             echo "</div>";

             // 跳转详情页，获取参数
             $now = $oneart->articleid;
             // // 前一页的key
             // $pre = "";
             // // 后一页的key
             // $after = "";
             if($key!=0){

               $pre = $articleList[$key-1]->id;

             }
             if($key != sizeof($articleList)-1){

                $after = $articleList[$key+1]->id;

             }
            
                 echo ' <a href="article/details?now='.$now.'" target="_blank" class="readmore">阅读全文&gt;&gt;</a>';

             echo '<p class="autor">';
              echo '<span>作者：'.$oneart->username.'</span>';
              echo '<span>浏览（<a href="/">459</a>）</span>';
              echo '<span>评论（<a href="/">30</a>）</span>';
             echo '</p>';

             echo ' <div class="dateview">'.$oneart->jointime.'</div>';


          echo '</div>';


      }




       ?>
     
      
    </div>

  </article>


<?php 
 // 侧边栏 
 echo view("aside")

  ?>

  <script src="js/index/silder.js"></script>
  <div class="clear"></div>
  <!-- 清除浮动 --> 
</div>
</body>
</html>
