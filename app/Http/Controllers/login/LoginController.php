<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Users;
use Redirect;
use Session;

class LoginController extends Controller
{


 /**
  * 进入登陆页面是检验是否已经登陆
  */
 public function checkUserInfo()
 {
     // 判断用户是否已登录
        if(!Session::has('userInfo'))
        {
            return Redirect::to('login');
        }else{
            // 已登录，跳转回首页
            Session::save();
            return Redirect::to('indexmain');
        }
 }

 /**
  * 点击登录，校验是否登陆成功 
  */
 public function checkLogin()
 {


    $username = $_POST['email'];
    $password = $_POST['password'];

    // $results = \DB::select('select * from users where userid = :id', ['id' => 1]);

    // $users = \DB::table('users')->get();

    
    $users = Users::checkUser($username,$password);
    $len = count($users);

    if($len > 0)
    {
        foreach ($users as $user)
        {
            $username = $user->username;
            $userkey = $user->userkey;

            // 将用户的信息存入
            Session::put('username',$username);
            Session::put('userkey',$userkey);

        }
        Session::save();
        // 检测是否有前面跳转过来的页面
        if("" != Session::get("preurl")){
             $preurl = Session::get('preurl');
             // print_r($preurl);
             Session::forget("preurl");

             return Redirect::to( $preurl);
        }else{
            return Redirect::to("indexmain");
        }
        
    }
    else if($len == 0)
    {
        // 密码或者用户名错误
        return Redirect::to('login')->with('loginError',"loginError");
    }
    else
    {
        // 返回错误
        return Redirect::to('login')->with('error',"error");
    }

 }


 /**
  * 注销登陆
  */
 public function  clearLogin(){

    Session::forget("username");
    Session::forget("userkey");

       // 存入当前请求的url，登陆后可以直接跳转到这个url页面
       $preurl = $_SERVER['HTTP_REFERER'];
       Session::put("preurl",$preurl);

       return Redirect::to( $preurl);

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
