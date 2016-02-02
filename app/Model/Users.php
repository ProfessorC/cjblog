<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Common\StringTools;
use DB;
/**
 * @auther:cj
 */
class Users extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = "users";
     /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;



    /**
     * 用户登陆检测
     * @param  [type] $username [description]
     * @param  [type] $password [description]
     * @return [type]           [description]
     */
    public static function checkUser($username,$password)
    {

        $userList = Users::whereRaw('username = ? and password = ? ',[$username,$password])->get(); 
         // $userList = \DB::select('select * from users where username = ? and password = ?', ['张三','888']);
         // $userList = Users::where('username', '=', $username,'and','password','=','12312')->get();
        // $userList = Users::where('userid',1)->get();

        return $userList;

        // foreach ($userList as $key => $value) {
        //     var_dump($value);
        // }

    }


    /**
     * 用户注册信息存入
     * @param  [type] $email    [description]
     * @param  [type] $username [description]
     * @param  [type] $password [description]
     * @return [type]           [description]
     */
    public static function getRegisterInfo($email,$username,$password)
    {

        $userkey = "u".StringTools::getSui();
        $addtime = StringTools::getDateKu();
        // $res = DB::insert('insert into users (username, addtime,password,userkey,email) values (?, ?, ?, ?, ?)', [$username,  $addtime,$password,$userkey,$email]);

        $res = DB::table('users')->insert(['username' => $username, 'addtime' => $addtime,'password' => $password,'userkey' => $userkey,'email' => $email]);
        if($res == "1")
        {
            return $userkey;
        }else{
            return "error";
        }

    }


   /**
    * 用户附件表插入信息
    */
    public static function addUserInfo($userkey,$introduction,$headimg,$sex,$telphone)
    {
        if("nochange" == $headimg)
        {
            // 不用更新头像图片
            $affected = DB::update('update users_affix  set introduction = ? , sex = ? ,telphone = ? where userkey = ?', [$introduction,$sex,$telphone,$userkey]);

        }else{

            $affected = DB::update('update users_affix  set introduction = ? , headimg = ? , sex = ? ,telphone = ? where userkey = ?', [$introduction,$headimg,$sex,$telphone,$userkey]);

        }
        

        return $affected;
    }

    /**
     * 用户附件表查询
     */
    public static function queryUserAffic($userkey)
    {
        $res = DB::select('select s.username,  u.headimg , u.introduction , u.sex ,u.telphone FROM users_affix u , users s WHERE u.userkey = s.userkey and u.userkey = ?' , [$userkey]);
        return $res;
    }




    /**
     * 用户名检测唯一性
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public static function checkUserName($username)
    {
        $userList = Users::whereRaw('username = ? ',[$username])->count(); 

        return  $userList;
    }



   
    	
}
