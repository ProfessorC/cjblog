 <aside>
    <div class="avatar"><a href="aboutme"><span>关于本尊</span></a></div>
    <div class="topspaceinfo">
      <h1>头顶java，脚踏雨燕，<br>左拿php，右持js</h1>
      <br>
      <p style="float: right">一只从会计转行的码农</p>
    </div>
    <div class="about_c">
      <p>网名：Professor</p>
      <p>职业：全栈式码农 </p>
      <p>籍贯：中国</p>
      <p>电话：18551035820</p>
      <p>邮箱：727686141@qq.com</p>
    </div>
    <div class="bdsharebuttonbox"><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
    <div class="tj_news">
      <h2>
        <p class="tj_t1">最新文章</p>
      </h2>
      <ul id="wenlist">

      </ul>
    
    </div>
    <div class="links">
      <h2>
        <p>友情链接</p>
      </h2>
      <ul>
        <li><a href="http://www.csdn.net/">CSDN</a></li>
        <li><a href="http://www.feng.com/">威锋网</a></li>
        <li><a href="http://www.swiftv.cn/">swiftv</a></li>
        <li><a href="http://swiftlang.ng.bluemix.net/?cm_mmc=developerWorks-_-dWdevcenter-_-swift-_-lp&cm_mc_uid=50428424545814510097271&cm_mc_sid_50200000=#/repl">IBM Swift SandBox </a></li>
      </ul>
    </div>
    <div class="copyright">
      <ul>
        <p> Design by <a href="/">Professor</a></p>
        <p>苏ICP备15054217号-1</p>
        </p>
      </ul>
    </div>
    <div style="text-align: center;margin-top: 30px">
      <h3 style="color: #FFC125">帮我喂喂小仓鼠</h3>
      <div class="textwidget">
      <object width="242" height="184" data="https://wuzhuti.cn/resources/flash/hamster.swf?" style="outline:none;" type="application/x-shockwave-flash">
      <param value="https://wuzhuti.cn/resources/flash/hamster.swf?" name="movie">
      <param value="always" name="AllowScriptAccess">
      <param value="transparent" name="wmode">
      </object>
      </div>
    </div>

  </aside>


  <script type="text/javascript">
  $(document).ready(function(){
     // 发送请求查询最新文章
     $.ajax({

       type: "post",  
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "getnewAtr", 
        dataType: "text",  
        async:true,
        data:{},  
        success: function(msg){  

            var lists = eval(msg);
            var whtml = "";
            
            for (var i = 0; i < lists.length; i++) {
              var title = lists[i].title;
              var artid = lists[i].articleid;
              whtml += '<li><a href="article/details?now='+artid+'">'+title+'</a></li>'

            };
            $("#wenlist").append(whtml)

        },
     })
  })

  </script>