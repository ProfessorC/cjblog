<?php

namespace App\Http\Middleware;

use Closure;
use Session;



class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      
            // （判断用户是否登陆，未登陆则跳转登录页面）
            

            $username = Session::get('username');
            // $password = Session::get('password');
            $userkey = Session::get('userkey');

          
            if( isset($userkey) && "" != $userkey){
                return $next($request);
            }else{
            // 返回登录页面
           
            $preurl = $request -> getPathinfo();
            if('' != $request->server->get('QUERY_STRING')){
                $preurl = $preurl.'?'.$request->server->get('QUERY_STRING');
            }


           
           
             if(!empty($request->input('preurl'))){
                 $preurl = $request->input('preurl');
            }

        //    if($preurl != '/index/cklogin'){

                 Session::put('preurl',$preurl);
                 Session::save();
       //     }
          
            if($request->ajax()){
                // ajax用
                return "unlogin";
            }else{
                 // 返回登陆页面
                  return \Redirect::to('login');
            }
          

           return 'nologin';
        }

    }

}


