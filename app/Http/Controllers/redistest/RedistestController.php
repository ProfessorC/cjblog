<?php

namespace App\Http\Controllers\redistest;

use Redis;
use Cache;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Articles;

class RedistestController extends Controller
{



    public function redistestDemo(){

//         $key = 'user:name:6';
// $user = User::find(6);
// if($user){
//   //将用户名存储到Redis中
//   Redis::set($key,$user->name);
// }
//判断指定键是否存在

  //根据键名获取键值
//  $xx = Cache::get('demo1');
//  print_r($xx);

//  Redisc::set('name', 'Taylor');
//  $yy = Redisc::get('name');
// print_r($yy);

// // Cache::put('key', '我是缓存的内容', "60");
// $hunac =  Cache::get('key');
// print_r($hunac);

// $user = Redisc::get('user:profile:'.$id);
// print_r($user);


    $redis = new Redis();
    $redis->connect('127.0.0.1',6379);
    $redis->set('test','hello redis');
    echo $redis->get('test');


        // redis的测试页面
        return view("redistest");
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
