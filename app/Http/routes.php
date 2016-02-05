<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/**
 * 首页
 */
Route::any('/indexmain','Index\IndexController@index');

/**
 * 首页更多文章的查询
 */
// Route::get('/showMoreArticle','Index\IndexController@showMoreArticle');

/**
 * 头部
 */
Route::get('/header', function () {
    return view('header');
});

/**
 * 头部2(相对路径问题)
 */
Route::get('/header2', function () {
    return view('header2');
});
/**
 * 边栏
 */
Route::get('/aside', function () {
    return view('aside');
});
/**
 * 边栏2(相对路径问题)
 */
Route::get('/aside2', function () {
    return view('aside2');
});

/**
 * 边栏查询最新文章
 */
Route::post('/getnewAtr' , 'Index\IndexController@getnewAtr');


/**
 * 关于我页面
 */
Route::get('/aboutme',function(){
	return view('aboutme/aboutme');
});

/**
 * 写点什么页面
 */
Route::get("/writeThing",function(){
	return view('writeThing/writeThing');
});


/**
 * 看点什么页面
 */
Route::get("/seeTing",'seeting\PicturewallController@seeTing');
// Route::get("/seeTing",['middleware' => 'logincheck','uses' =>'seeting\PicturewallController@seeTing']);

/**
 * 展示登录页
 */
Route::get('/login',function(){
	return view('login/getlogin');
});

/**
 * 登录校验
 */
Route::post('checkLogin','login\LoginController@checkLogin');

/**
 * 登陆后注销
 */
Route::get('clearLogin','login\LoginController@clearLogin');


/**
 * 展示注册页
 */
Route::get("/register",function(){
	return view('register/register');
});

/**
 * 提交登录信息
 */
Route::post('checkregister','register\RegisterController@checkRegisterInfo');

/**
 * 检测是否同名
 */
Route::post("checkUserName","register\RegisterController@checkUserName");


/**
 * 关于article的路由
 */
Route::group(['prefix' => 'article'],function(){

   // 添加帖子
   Route::post('addarticle',['middleware' => 'logincheck','uses' =>'articles\ArticleController@addArticle']);

   // 帖子详情
   Route::get('details','articles\ArticleController@articleDetails');

   // 回复帖子
   Route::post('addReply',['middleware' => 'logincheck','uses' =>'articles\ArticleController@addReply']);

   // 二级回复
   Route::post('addSecReply',['middleware' => 'logincheck','uses' =>'articles\ArticleController@addSecReply']);

   // 查询一级回复列表
   Route::post('queryReplyList',['middleware' => 'logincheck','uses' =>'articles\ArticleController@queryReplyList']);

   // 查询一级回复的子回复列表
   Route::post('querySecondReplyList',['middleware' => 'logincheck','uses' =>'articles\ArticleController@querySecondReplyList']);

   // 查询一级回复的ajax请求
   Route::post('fenyeReply','articles\ArticleController@fenyeReply');

   // 查询一篇帖子下面的所有子回复
   Route::post('queryArtilceAllReply','articles\ArticleController@queryArtilceAllReply');
   

});

/**
 * 关于用户的路由
 */
Route::group(['prefix' => 'user'],function(){

   // 用户中心
   Route::any('usercenter',['middleware' => 'logincheck','uses' =>'user\userController@usercenter']);
   // 存入用户信息
   Route::post('updateuserinfo',['middleware' => 'logincheck','uses' => 'user\userController@updateuserinfo']);

});

/**
 * redis测试页面
 */
Route::get('redistestDemo','redistest\RedistestController@redistestDemo');

  


?>