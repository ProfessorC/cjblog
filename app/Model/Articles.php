<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Common\StringTools;
use DB;
/**
 * @auther:cj
 */
class Articles extends Model
{
	/**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = "articles";
     /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;


    /**
     * 查询帖子列表，首页展示用
     * @return [type] [description]
     */
    public static function getArticleList($from,$to){

        // $res = DB::table('articles')->select * from 'articles';

        $res = DB::select('select a.articleid , a.content , a.id , date_format(a.jointime,"%Y-%c-%d") AS jointime , a.seecount , a.title , a.userkey , b.username FROM `articles` a LEFT JOIN users b on a.userkey = b.userkey where a.status = 1 ORDER BY a.id DESC limit ?,?',[$from,$to]);
        
        return $res;

    }


    public static function getTotalCount(){
        $res = DB::select("select count(*) as countall from articles a where a.status = 1");
        return $res;
    }

    /**
     * 查询最新的文章列表
     * @return [type] [description]
     */
    public static function getNewAtr(){

        $res = DB::select('select a.articleid , a.content ,a.title FROM `articles` a where a.status = 1 ORDER BY a.id DESC limit 8');
        return $res;
    }

    /**
     * 查询帖子的详情
     * @param  [type] $articleKey [description]
     * @return [type]             [description]
     */
    public static function getArticleDetails($articleKey){

        // 调用存储过程queryArticleBeAf
        $res = DB::select('call queryArticleBeAf(?)',array($articleKey));
        return $res;
    	
    }


    /**
     * 添加新的帖子
     * @param  [type] $userkey [description]
     * @param  [type] $content [description]
     * @param  [type] $title   [description]
     * @return [type]          [description]
     */
    public static function createArticle($userkey,$content,$title){
    	 // 帖子id
    	 $id = "art".StringTools::getSui();
    	 // 帖子生成时间
    	 $jointime = StringTools::getDateKu();
    	// 存入数据库
    	$res = DB::table('articles')->insert(['userkey' => $userkey, 'content' => $content,'title' => $title,'articleid' => $id,'jointime' => $jointime]);
        if($res == "1")
        {
            return "success";
        }else{
            return "faild";
        }

    }


    /**
     * 添加文章的一级回复
     * @param [type] $userkey    [description]
     * @param [type] $content    [description]
     * @param [type] $articlekey [description]
     */
    public static function addFristReply($userkey,$userkeybei,$content,$articlekey){
         // 一级回复的key
         $replykey = "reply".StringTools::getSui();
         // 一级回复生成时间
         $addtime = StringTools::getDateKu();
         // 存入数据库
         $res = DB::table('reply')->insert(['userkey_pin' => $userkey, 'userkey_bei' => $userkeybei , 'reply_key' => $replykey , 'content' => $content,'article_key' => $articlekey,'addtime' => $addtime,'status' => '1']);
          if($res == "1")
        {
            return "success";
        }else{
            return "faild";
        }

    }


    /**
     * 查询文章的一级回复列表
     * @param  [type] $articlekey [description]
     * @return [type]             [description]
     */
    public static function queryReplyList($articlekey,$fromPage,$evepage){

        /**
         * select r.content , r.addtime , r.reply_key AS replykey , r.userkey_bei AS userkeybei ,r.userkey_pin AS userkeypin , r.article_key AS articlekey 
         *   from reply r 
         *   WHERE r.article_key = 'arthlLP15121628'
         *   AND r.`status` = '1'
         *   ORDER BY r.id desc
         *
         */

        $res = DB::select('
                
            select r.content , x.headimg , date_format(r.addtime,"%Y-%c-%d %H:%i:%s") AS addtime , r.reply_key AS replykey , r.userkey_bei AS userkeybei , r.userkey_pin AS userkeypin , r.article_key AS articlekey ,u.username 
            FROM `reply` r , `users` u , `users_affix` x
            WHERE r.userkey_pin = u.userkey AND u.userkey = x.userkey
            AND
            r.article_key = ?
            AND r.`status` = "1"
            ORDER BY r.id ASC
            limit ?,?
            ',[$articlekey,$fromPage,$evepage]);
       
        return $res;

    }

    /**
     * 查询文章下所有一级回复的条数和浏览次数
     * @param  [type] $nowkey [description]
     * @return [type]         [description]
     */
    public static function queryOneAticleReplyCount($nowkey) {
        $res = DB::select('
         SELECT count(r.id) as countnum , a.seecount as seecount FROM `articles` a LEFT JOIN `reply` r 
        ON r.article_key = a.articleid where a.articleid = ?
        ',[$nowkey]);

        return $res;

    }


    /**
     * 文章访问次数+1
     * @param  [type] $articlekey [description]
     * @return [type]             [description]
     */
    public static function updateArticleSeeTimes($articlekey){

        $res = DB::update('UPDATE `articles` a set a.seecount = a.seecount + 1 where a.articleid = ?',[$articlekey]);
        return $res;
    }

    

    /**
     * 添加评论的二级评论
     * @param [type] $userkey       [description]
     * @param [type] $beiUserkey    [description]
     * @param [type] $content       [description]
     * @param [type] $articlekey    [description]
     * @param [type] $firstReplyKey [description]
     */
    public static function addSecondReply($userkey,$beiUserkey,$content,$articlekey,$firstReplyKey){

    }

    





}