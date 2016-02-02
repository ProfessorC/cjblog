<?php 

namespace App\common;

 // 存储图片
 	class saveImage 
 	{
 		
 		// 转存图片
	 	public static function zhuancun($picone){

	 		// 转存到临时文件夹
			$path='../temptx'; //上传路径
			// 文件类型
			$type = "";
			if(!file_exists($path))
			{
				//检查是否有该文件夹，如果没有就创建，并给予最高权限
				mkdir($path, 0700);
			}

			//允许上传的文件格式(兼容ie8)
			$tp = array('image/png','image/jpg','image/jpeg','image/pjpeg','image/x-png');
			//检查上传文件是否在允许上传的类型
			if(!in_array($picone["type"],$tp))
			{
				echo "<script>alert('格式不对');history.go(-1);</script>";
				return  config('constants.ERROR');
			}else{
				$type = '.jpg';
			}

			$picName = "";
			$fileURL = "";
			if($picone["name"])
			{
				// $picName = substr($picone["name"], 0, strrpos($picone["name"], '.'));
	            // 取四位随机数作为图片名避免中文问题      
	            $picName = saveImage::GetRandStr(4);

				$today=date('YmdHis'); //获取时间并赋值给变量
				$fileURL = $path.'/'.$picName.$today.$type; //图片的完整路径
				$img = $today.$type; //图片名称
				$flag=1;
			}
			// 将图片存入临时文件中，上传服务器后删除 (解决中文乱码)
			if($flag) $result = move_uploaded_file($picone["tmp_name"],iconv("UTF-8","gb2312",$fileURL));

			// 若缓存图片失败则退出
			if(!$result){ return  "error";}

			// 返回图片的存储路径
			return $fileURL;


	 	}


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

 	}
 	

 ?>