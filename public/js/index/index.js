
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
})