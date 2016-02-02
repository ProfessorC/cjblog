$(document).ready(function() {


	// dafenye()


	$("#replyOne").on('click',function(){
		// 检测是否填写了回复内容
		var tst = $("#replyform").find("textarea").val()
		if("" == tst) {
			layer.alert("请输入回复内容")
			return false 
		}else{

			// 提交表单
			var userkeybei = $("#nowuserkey").val()
			var content = $("#replyform").find("textarea").val()
			var articlekey = $("#nowaticlekey").val()
			var preurl = window.location.href

			$.ajax({
				url: '../article/addReply',
				type: 'POST',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				data: {'userkeybei': userkeybei , 'content':content , 'articlekey':articlekey , 'preurl':preurl},
				success : function(res){
					if(res == "success"){
				    	layer.msg("回复成功");
				    	window.location.reload();
				    }else if(res == "unlogin")
				    {
				    	layer.alert("请先登录！",function(){
				    		window.location.href = "../login"
				    	})
				    }
				    else if(res == "faild"){
				    	layer.alert("网络错误，请稍后再试！");
				    }
				}
			})
		
		}
	})
});

// function dafenye(){
	
//  $(".tcdPageCode").createPage({
//         pageCount:20,
//         current:1,
//         backFn:function(p){
//             console.log(p);
//         }
//     });

// }

// 点击分页
function goPage(pageNow){
	var articlekey = $("#articlekey").val()
	var whtml = ""
	// 查询
	$.ajax({
		url: '../article/fenyeReply',
		type: 'POST',
		dataType: 'json',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
		data: {"pageNow": pageNow , "articlekey":articlekey},
		success : function(res){
			for (var i = 0; i < res.length; i++) {
				var content = res[i].content
				var headimg = "../"+res[i].headimg
				var addtime = res[i].addtime
				var replykey = res[i].replykey
				var username = res[i].username
				var userkeypin = res[i].userkeypin
				var userkeybei = res[i].userkeybei

				whtml += '<div class="comment">' 
				         + '<div class="avatars">' 
				         +   '<img src="'+headimg+'" alt="" width="80" height="80" /><br />' 
				         +  '<span>'+username+'</span><br /><br />' 
				         +   addtime
				         + '</div>' 
				         + '<p>'+content+'</p>' 
				         +'</div>'

			};

			$("#needwrite").html(whtml)
			// 页面滑动
			$("html,body").animate({scrollTop:$("#comments").offset().top},1000);
		}
	})
	
}