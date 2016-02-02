$(document).ready(function(){


	$("#signup_forms_submit").on('click', function(event) {
		
		// 提交前判断
		if("" == $("#signup_email").val())
		{
 					event.preventDefault();
			         layer.alert('请填写用户名', {
		                  skin: 'layui-layer-lan'
		                  ,closeBtn: 0
		                  ,shift: 4 //动画类型
               		 });

		}
		else if("" == $("#signup_password").val())
		{
 					event.preventDefault();
			         layer.alert('请填写密码', {
		                  skin: 'layui-layer-lan'
		                  ,closeBtn: 0
		                  ,shift: 4 //动画类型
               		 });

		}
		else
		{
			$("#sign_form").submit();
		}
	});


})




function loginError(){
	layer.msg('账号或密码错误');
}

function error()
{
	layer.msg("网络错误，稍后再试");
}


