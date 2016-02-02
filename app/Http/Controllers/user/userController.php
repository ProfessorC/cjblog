<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Users;
use Session;
use App\Common\saveImage;



class userController extends Controller
{


  /**
   * 用户中心页面
   * @return [type] [description]
   */
  public function usercenter()
  {

    // 查询user附件表
    $userkey = Session::get('userkey');
    $res = Users::queryUserAffic($userkey);

    return view("user/usercenter",array('usinfo' => $res));

  }


  /**
   * 更新用户信息
   * @return [type] [description]
   */
  public function updateuserinfo(){

    // 1就要保存空图片
    $imageFlag = $_POST['imageFlag'];
    $userkey = Session::get('userkey');
    $headimg = "nochange";
    $introduction = $_POST['introduction']; 
    if(isset($_FILES['imagepic']))
    {
        $imagepic = $_FILES['imagepic']; 
     }else{
        $imagepic = "";
     }
   
    $sex = $_POST['sex']; 
    $telphone = $_POST['telphone']; 

   if("" != $imagepic)
   {
     $size = $imagepic['size'];
 
     // 小于1m
     if($size > 1048576)
     {
        // 返回
        return "toobig";
     }

       // 将头像转存
       $headimg = saveImage::zhuancun($imagepic);
   }else{

     // 为1的话说明只用默认图
     $headimg = "";
   }




    // 存入数据库
    $res = Users::addUserInfo($userkey,$introduction,$headimg,$sex,$telphone);

    if($res == "1")
    {
        return "success";
    }else{
        return "faild";
    }

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
