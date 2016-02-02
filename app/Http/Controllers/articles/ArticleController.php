<?php

namespace App\Http\Controllers\articles;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Articles;
use Session;
use App\Model\Users;

class ArticleController extends Controller
{


   /**
    * [addArticle description]
    * 发送新的帖子
    */
   public function addArticle(){
        
        $userkey = Session::get('userkey');
        $content = $_POST['myEditor'];
        $title = $_POST['title'];
        // 存入数据库
        $res = Articles::createArticle($userkey,$content,$title);
        return $res;

   }


   /**
    * 查询文章的详情页面
    * @return [type] [description]
    */
   public function articleDetails(){

    $nowkey = $_GET['now'];

    // 请求来源的ip
    $fromIp = $_SERVER['REMOTE_ADDR'];
    // 将ip存入session，12min后失效，如果1min内连续访问那么不会增加访问量
    if(!Session::has($fromIp)) {

        $arr = array();
        array_push($arr,$nowkey);
        Session::put($fromIp, $arr);
        Session::save();
        // 访问次数增加1
        $res = Articles::updateArticleSeeTimes($nowkey);

    }else{
        // 如果这次访问的和上次不一样那么可以加
        $nowarr = Session::get($fromIp);
        if(!in_array($nowkey,$nowarr)){
             // 访问次数增加1
             $res = Articles::updateArticleSeeTimes($nowkey);
             // 加入这次访问的帖子key
             array_push($nowarr,$nowkey);
             // 重新转存当前的用户的访问记录
             Session::put($fromIp, $nowarr);
             Session::save();
        }
    }
    

    // 返回的key
    $result = array();

    $userkey = Session::get('userkey');
    if("" != $userkey) {
        // 查询当前用户的信息
        $nowuserInfo = Users::queryUserAffic($userkey);
        $result['nowuserInfo'] = $nowuserInfo;
    }


    // 默认第一页，展示5条
    $fromPage = 1-1;
    $evepage = 5;

    // 查询帖子详情
     $res = Articles::getArticleDetails($nowkey);

     // 分页查询
     $replyres = Articles::queryReplyList($nowkey,$fromPage,$evepage);

     // 查询总条数
     $totalCount = Articles::queryOneAticleReplyCount($nowkey);

    $result['res'] = $res;
    $result['replyres'] = $replyres;
    $result['totalCount'] = $totalCount;
    $result['articlekey'] = $nowkey;

    return view("details/articledetails",$result);

   }

   /**
    * 添加文章的一级回复
    */
   public function addReply(){

        $userkey = Session::get('userkey');
        $userkeybei = $_POST['userkeybei'];
        $content = $_POST['content'];
        $articlekey = $_POST['articlekey'];
        // 存入数据库
        $res = Articles::addFristReply($userkey,$userkeybei,$content,$articlekey);
        return $res;


   }


   /**
    * ajax 一级回复分页请求
    */
   public function fenyeReply(){

        $pageNow = $_POST['pageNow'];
        $articlekey = $_POST['articlekey'];
        $evepage = 5;
        // 每页显示5条回复
        // 0-4 5-9 10-14
        $pagebeign = ($pageNow-1)*5;
        $res = Articles::queryReplyList($articlekey,$pagebeign,$evepage);
        return $res;
   }

   /**
    * ajax 查询文章列表的回复总数
    */
   public function queryArtilceAllReply(){

     $articlekey = $_POST['articlekey'];
     $res = Articles::queryOneAticleReplyCount($articlekey);
     return $res;

   }


   /**
    * 添加一级回复的子回复
    */
   public function addSecReply(){



   }


   /**
    * 查询一级回复列表
    */
   public function queryReplyList(){

        // $articlekey = $_POST['articlekey']
        // $res = Articles::queryReplyList($articlekey);


   }


   /**
    * 查询一级回复的子回复列表
    * @return [type] [description]
    */
   public function querySecondReplyList(){


   }






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
