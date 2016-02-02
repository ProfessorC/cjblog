<?php  
namespace App\common;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Illuminate\Log\Writer;


class StringTools{

/**
 * 四位随机数
 * @param [type] $len [description]
 */
public static function GetRandStr($len) 
{ 
    $chars = array( 
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",  
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",  
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",  
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",  
        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",  
        "3", "4", "5", "6", "7", "8", "9" 
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);   
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    }  
    return $output;  
} 


/**
 * 当前时间
 * @return [type] [description]
 */
public static function getDate()
{
    date_default_timezone_set('PRC');
	 $time = time();

    return date("ymds",$time); //2010-08-29
}

/**
 * 当前时间存入库
 * @return [type] [description]
 */
public static function getDateKu()
{
     date_default_timezone_set('PRC');
	 $time = time();

    return date("y-m-d h:i:s",$time); //2010-08-29 11:25:26
}


/**
 * 随机数列
 * @return [type] [description]
 */
public static function getSui()
{
	return StringTools::GetRandStr(4).StringTools::getDate();

}



/**
 * 抓取文章中的图片的图片路径
 * @param  [type] $content [description]
 * @return [type]          [description]
 */
public static function getUrlFromContent($content){

// $content='<p><img border="0" src="upfiles/2009/07/1246430143_1.jpg" _src="upfiles/2009/07/1246430143_1.jpg" alt=""/></p>';
$pattern='#<img.*?src="([^"]*)"[^>]*>#i';

preg_match_all($pattern,$content,$match);
// print_r($match); 

return $match;


}

/**
 * 去除文章中的所有图片
 * @param  [type] $content [description]
 * @return [type]          [description]
 */
public static function removeAllPicFromContent($content){
    // $content='<p>我是文字<img src="图片地址" /><br />hello！</p><p>另一张<img src="图片地址" /></p>';
$newstr = preg_replace("/<img.+?\/>/", "【图】", $content);
// return htmlspecialchars($newstr);
return $newstr;
}













}










?>