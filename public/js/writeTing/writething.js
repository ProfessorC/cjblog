$(document).ready(function(){
	var um = UM.getEditor('myEditor');
	// 提交文章内容
	$("#tijiao").live('click', function(event) {
		sendArticle(this);
	});
})


// 发送帖子回复
function  sendArticle(obj){
	
	if("" != $("#title").val()){
		// 发送回复
		UM.getEditor('myEditor');
		  //自动切换提交地址
          // var doc=document,
          //     version=um.options.imageUrl||"php",
              form=document.getElementById("mydorm");

              form.action="article/addarticle";

			$.ajax({
			url: 'article/addarticle',
			data: $('#mydorm').serialize(),
			type: "POST",
			beforeSend: function()
			{
				//在异步提交前要做的操作
				
			},
			success: function(res)
			{

					if(res == "success"){
				    	layer.alert("回复成功，回到列表页",function(){
				    		window.location.href = "indexmain"
				    	});
				    	
				    }else if(res == "faild"){
				    	layer.alert("网络错误，请稍后再试！");
				    }else if(res == "unlogin"){
				    	layer.alert("请先登录",function(){
							window.location.href = "login"
						})
				    }

				

			}
			});
			return false;
		
	}else{
		layer.alert("请填写文章标题");
		return false;
	}
}

var c=0  
var t  
function timedCount()  
{  

   var temptextmin=document.getElementById('txt');  
    hour = parseInt(c / 3600);// 小时数  
    min = parseInt(c / 60);// 分钟数  
    if(min>=60){  
        minmin=min%60  
    }  
    lastsecs = c % 60;  
  
temptextmin.value = hour + "时" + min + "分" + lastsecs + "秒"  
  
c++ 
t=setTimeout("timedCount()",1000)  
document.getElementById('start').style.display = "none";     
document.getElementById('end').style.display = "";   
  
  
}  
  
function stopCount()  
{  
clearTimeout(t)  
document.getElementById('start').style.display = "";     
document.getElementById('end').style.display = "none";   
}  
function clearAll(){  
 c=0  
 document.getElementById('txt').value=  "0时" +  "0分" + "0秒"  
 clearTimeout(t)  
 document.getElementById('start').style.display ="";     
 document.getElementById('end').style.display = "none";   
}  