
$(document).ready(function(){
	$(".blogs").each(function(index, el) {

		var picheight = $(this).find("figure").find("img").height()
		var ulheight = $(this).find("ul").height()
		var maxheight = picheight>ulheight?picheight:ulheight
		// 将最大高度非div块
		var cdiv = $(this).find(".cdiv")
		cdiv.css("height",maxheight)
		var changeh = 6
		$(this).find(".readmore").css("margin-top",changeh);
	});

	// 查询帖子列表的回复数量
	queryArtilceAllReply()

	// 初始化下拉菜单列表
	// showMoreArticle()
})

function queryArtilceAllReply(){

	$(".pllist").each(function(){
		var _this = $(this)
		var articlekey = $(this).attr("data-articlekey")
		
		$.ajax({
			url: "article/queryArtilceAllReply",
			headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			type: 'POST',
			data: {"articlekey":articlekey},
			success: function(res){
			
				if(!isNaN(parseInt(res[0].countnum))) {
					// 塞评论
					_this.find('a').text(res[0].countnum)
					// 塞浏览量
					_this.prev().find('a').text(res[0].seecount)
				}
			}
		})
		
	})

}

// 分页跳转
function goPage(pageNow){
var nowurl = (window.location.href);
var canshu = (window.location.search);
var quchu = nowurl.substring(0,(nowurl.length-canshu.length))


	window.location.href=quchu+"?fr="+pageNow

}

// function showMoreArticle(){

// 	$(".getmore").live('click', function(event) {
// 		$("#getmore").fadeOut()
// 			$.ajax({
// 				url: 'showMoreArticle',
// 				type: 'POST',
// 				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
// 				data: {'frompage': "5" , 'topage': "5"},
// 				success : function(res){
// 					console.log(res)
// 					var html = ""
// 					for (var i = 0; i < res.length; i++) {
// 						var articleid = res[i].articleid
// 						var content = res[i].content
// 						var jointime = res[i].jointime
// 						var seecount = res[i].seecount
// 						var title = res[i].title
// 						var userkey = res[i].userkey
// 						var username = res[i].username

// 						// html += 
// 					};
// 				}
// 			})
// 	});

// }