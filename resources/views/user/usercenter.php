<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    	<title>用户中心</title>
    <script src='../js/jquery-1.8.0.min.js' type="text/javascript"></script>
     <script src='../js/jquery-form.js' type="text/javascript"></script>
    <script src="../js/jquery.easyui.min.js"></script>
    <script src="../js/layer-v2.0/layer/layer.js"></script>
    <script src='../js/uploadPicShow.js' type="text/javascript"></script>
    <script src='../js/user/usercenter.js' type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="../css/user/usercenter.css" />

</head>

<body>

	<div class ="bg" style="background-image:url(../images/hebebac.jpg);"></div>
	
	<div class = "container">
		
		<div class="signup_forms_container">
		<form id="userInfo" action="../user/updateuserinfo" method="post" enctype="multipart/form-data">
		 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		 <span class="grjj">个人简介：</span>
		    <textarea class="mytrex" name="introduction"><?php 
				if(isset($usinfo[0]->introduction) && "" != $usinfo[0]->introduction)
				{
					echo $usinfo[0]->introduction;
				}else{
					echo "what kind guy of you are ?";
				}

			?>

		    </textarea>
		<div class="sexc">
		    <span>性别：</span>
			
			<?php if("1" == $usinfo[0]->sex){ ?>
			
				<input type="radio" name="sex" value="1" checked="checked" />男
				<input type="radio" name="sex" value="0" />女

			<?php } else if("0" == $usinfo[0]->sex) { ?>
				
				<input type="radio" name="sex" value="1"  />男
				<input type="radio" name="sex" value="0" checked="checked" />女

			<?php } else { ?>

				<input type="radio" name="sex" value="1" checked="checked" />男
				<input type="radio" name="sex" value="0" />女
				
			<?php } ?>
		   

		</div>

		<div class="tel">
		    <span>手机号：</span>
		    <input type="text" name="telphone" id="telphone"/ value="<?php echo $usinfo[0]->telphone; ?>">
		</div>
		
		<div class="ttt">
			<input type="file" name = "imagepic" onchange="localImagImage(this)" id="change" style="display: none">
			<button class="sctx" id="sctx">上传头像</button>

			<input type="hidden" value="0" name="imageFlag" id="imageFlag">
			<image src="../images/sc_tp.png" class="xx" id="xx"></image>
			<div id="localImag" class="lmg">
			<?php if("" == $usinfo[0]->headimg){ ?>
			    <img id="preview" border=0 src="../images/ssss.jpg" width="180" height="180" />
			<?php } else { ?>    
				
				<img id="preview" border=0 src="<?php echo "../".$usinfo[0]->headimg; ?>" width="180" height="180" />
							
			<?php } ?>

			    
			</div>

		</div>
			<button class="sub" id="submitform">确认提交</button>
		</form>
	</div>
	

	</div>

</body>


</html>