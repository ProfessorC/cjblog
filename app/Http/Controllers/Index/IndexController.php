<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Articles;
use Session;
use Redisc;
use Cache;

class IndexController extends Controller
{



    /**
     * 展示首页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 查询出文章列表
        $total = array();
         $to = 5;
        if(isset($_GET['fr']))
        {
            $nowpage = $_GET['fr'];
            $fr = ($nowpage-1) * $to;
        }else{
            $nowpage = 1;
            $fr = 0;
        }
       
        $res = Articles::getArticleList($fr,$to);
        $countall = Articles::getTotalCount();

         $total['articleList'] = $res;
         $total['countall'] = $countall;
         $total['nowpage'] = $nowpage;

        //显示首页
         return view('index/indexmain',$total); 
    }


    /**
     * 往下拉更多帖子列表的展示
     */
    // public function showMoreArticle() 
    // {

    //     $frompage = $_POST['frompage'];
    //     $topage = $_POST['topage'];
    //     $res = Articles::getArticleList($frompage,$topage);

    //     return $res;

    // }

    /**
     * 查询最新的文章列表
     * @return [type] [description]
     */
    public function getnewAtr(){

        $res = Articles::getNewAtr();
        return $res;
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
