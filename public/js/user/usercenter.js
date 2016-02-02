$(document).ready(function() {
	$("#sctx").on("click",function(){
		// 组织表单提交
		
		$("#change").click();
		return false;   
	})

	$("#xx").on('click', function(event) {
		event.preventDefault();

		$("#change").val("");
		$("#preview").attr("src","../images/ssss.jpg")
		$("#preview").css({
			height: '180px',
			width: '180px'
		});



	});


	 // $('#userInfo').ajaxForm(function() {  
  //      alert("Thank you for your comment!"); 
  //   }); 

	$("#submitform").on('click', function(event) {
	
       	 // 判断是否修改过头像
       	 if($("#preview").attr("src") == '../images/ssss.jpg')
       	 {
       	 	// 头像作为默认的
       	 	$("#imageFlag").val("1");
       	 }

         var tel = $("#telphone").val();
         var phone = /^1([38]\d|4[57]|5[0-35-9]|7[06-8]|8[89])\d{8}$/;
         if(tel != ""){
         	if(!phone.test(tel)){
			    layer.alert("请输入正确的手机号码！")

			    return false;

			}

         }


       
	    	// 提交表单
		 	$('#userInfo').ajaxSubmit(function(obj){
		 		var res = obj.toString();

		 	  if(res == "toobig")
			    {
			    	layer.alert("头像不要超过1m");
			    }else if(res == "success"){

			    	 layer.alert('修改成功', {
				        skin: 'layui-layer-lan'
				        ,closeBtn: 0
				        ,shift: 4 //动画类型
				    },function(){
				    	window.location.href = "../indexmain"
				    });
			    	
			    }else if(res == "faild"){
			    	layer.alert("网络错误，请稍后再试！");
			    }

		 	});


		    // 为了防止普通浏览器进行表单提交和产生页面导航（防止页面刷新？）返回false
		    return false;


         
   //       $.ajax({
			// url: '../user/updateuserinfo',
			// data: $('#userInfo').serialize(),
			// type: "POST",
			// beforeSend: function()
			// {
			// 	//在异步提交前要做的操作
				
			// },
			// success: function(res)
			// {
			    // if(res == "toobig")
			    // {
			    // 	layer.alert("头像不要超过1m");
			    // }else if(res == "success"){
			    // 	layer.msg("回复成功");
			    // 	window.location.reload();
			    // }else if(res == "faild"){
			    // 	layer.alert("网络错误，请稍后再试！");
			    // }
			// }
			// });


			

	});
});
