<?php 

namespace App\Http\Controllers\register;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Users;
use Redirect;
use Session;



class RegisterController extends Controller
{


	/**
	 * 点击注册调用，存入注册信息
	 * @return [type] [description]
	 */
	public function checkRegisterInfo()
	{

        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];


        $resu = Users::getRegisterInfo($email,$username,$password);

        if($resu != "error")
        {
            // 将用户名和密码存入session
            // 将用户的信息存入
            Session::put('username',$username);
            Session::put('password',$password);
            Session::put('userkey',$resu);
               return Redirect::to('login');          
            
        }
        else
        {
            return "注册失败！";
        }
        

	}

	/**
	 * 查询用户名是否已经注册
	 */
	pubLic function checkUserName()
	{

        $username = $_POST['username'];
        $userSize = Users::checkUserName($username);
        return $userSize;
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













 ?>