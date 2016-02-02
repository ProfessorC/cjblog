	$(function(){
			$("button").click(function(event){

					// 初始化用户名唯一性检查
					var cou = checkUserName();
					if("" == cou)
					{
						return false;
					}

					if(parseInt(cou) > 0)
					{
						layer.tips('用户名已经被使用！', '#signup_username');
						// 取消提交
						return false;
					}

			if($("#signup_email").val()==""||$("#signup_password").val()==""||$("#signup_confirm_password").val()==""||$("#signup_username").val()=="")
			{

				event.preventDefault();
			         layer.alert('请填写注册信息', {
		                  skin: 'layui-layer-lan'
		                  ,closeBtn: 0
		                  ,shift: 4 //动画类型
               		 });
				
			}
			else
			{
				if($("#signup_password").val()!=$("#signup_confirm_password").val())
				{

					event.preventDefault();
			         layer.alert('两次填写的密码不一致', {
		                  skin: 'layui-layer-lan'
		                  ,closeBtn: 0
		                  ,shift: 4 //动画类型
               		 });
						$("#signup_password").val("");
						$("#signup_confirm_password").val("");
				}
				else
				{
					$("#sign_form").submit();
				}
			}
		});


		

	});

	// 初始化用户名唯一性检查
	function checkUserName()
	{


			var userName = $("#signup_username").val();
			var params = {"username" : userName};
			var url = "checkUserName";

			var resu = "";

			   $.ajax({  
		        type: "post",  
		        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		        url: url, 
		        dataType: "text",  
		        async:false,
		        data:params,  
		        success: function(msg){  
		        	resu = msg;
		          
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown) {
		                        // alert(XMLHttpRequest.status);
		                        // alert(XMLHttpRequest.readyState);
		                        // alert(textStatus);
		                    }

   				});

		return resu;
	}



	 // 发送请求(请求参数，请求地址，请求执行后返回的方法名称,是否采取异步，返回的数据格式)
  function sendAjax(params,url,func,flag,dataType){
        
      $.ajax({  
        type: "post",  
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: url, 
        dataType: dataType,  
        async:flag,
        data:params,  
        success: function(msg){  
            func(msg);
          
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
                        // alert(XMLHttpRequest.status);
                        // alert(XMLHttpRequest.readyState);
                        // alert(textStatus);
                    }

    });
}