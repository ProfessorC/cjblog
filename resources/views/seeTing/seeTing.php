<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>picture wall</title>
		<link rel="stylesheet" href="css/picturewall/picLook.css" />
	</head>

	<body>
		<div class="bigone" id="picLook">
			<div class="picLookshow" id="picLookshow">
				<div class="plImg" data-info="{'username':'张三','description':'我是描述的内容','time':'2015-7-14'}" ><i></i><img src="images/01.jpg" /></div>
				<div class="plImg" data-info="{'username':'张三','description':'我是描述的内容','time':'2015-7-14'}" ><i></i><img src="images/01.jpg" /></div>
				<div class="plImg" data-info="{'username':'张三','description':'我是描述的内容','time':'2015-7-14'}" ><i></i><img src="images/01.jpg" /></div>
				<div class="plImg" data-info="{'username':'张三','description':'我是描述的内容','time':'2015-7-14'}" ><i></i><img src="images/01.jpg" /></div>
				<div class="plImg" data-info="{'username':'张三','description':'我是描述的内容','time':'2015-7-14'}" ><i></i><img src="images/01.jpg" /></div>
				<div class="plImg" data-info="{'username':'张三','description':'我是描述的内容','time':'2015-7-14'}" ><i></i><img src="images/01.jpg" /></div>
				<div class="plImg" data-info="{'username':'张三','description':'我是描述的内容','time':'2015-7-14'}" ><i></i><img src="images/01.jpg" /></div>
				<div class="plImg" data-info="{'username':'张三','description':'我是描述的内容','time':'2015-7-14'}" ><i></i><img src="images/01.jpg" /></div>
				<div class="plImg" data-info="{'username':'张三','description':'我是描述的内容','time':'2015-7-14'}" ><i></i><img src="images/01.jpg" /></div>
				<div class="plImg" data-info="{'username':'张三','description':'我是描述的内容','time':'2015-7-14'}" ><i></i><img src="images/01.jpg" /></div>
				<div class="plImg" data-info="{'username':'张三','description':'我是描述的内容','time':'2015-7-14'}" ><i></i><img src="images/01.jpg" /></div>
				<div class="plImg" data-info="{'username':'张三','description':'我是描述的内容','time':'2015-7-14'}" ><i></i><img src="images/01.jpg" /></div>
			
			
			
			
			
			
			
			
			
			
			
			

				
			</div>

			<div class="picLook" id="picLookhide">
				<div class="plClose">×</div>
				<div class="plNext">&darr;</div>
			</div>

		</div>
		<script src='js/jquery-1.8.0.min.js' type="text/javascript"></script>
		<script src="js/picturewall/picLook.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function() {
				$("#picLook").picLook({
					speed: 600 //此项为下滑速度
				});
			})
		</script>


		<div class="picinfo" id="picinfo">
			<!-- 图片相关： -->


		</div>

		<div class="uploadimg" id="uploadimg" >
			<!-- 上传图片出现箭头 -->

			<img src="css/picturewall/you.png" width="80px" height="80px">
		</div>

		<div class="imagedraw" id="imagedraw">
			<!-- 上传图片 -->
			<img src="css/picturewall/close.png" width="30px" height="30px" id="closenow">
			
			

		</div>
	</body>

</html>