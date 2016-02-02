<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Sign up|CjBlog</title>
    
    <script src='js/jquery-1.8.0.min.js' type="text/javascript"></script>
    <script src="js/jquery.easyui.min.js"></script>
    <script src="js/layer-v2.0/layer/layer.js"></script>
    <script src='js/register/register.js' type="text/javascript"></script>
	<link rel="stylesheet" href="css/register/register.css" />

    
</head>
<body>
    <div id="login_bg" class ="login_bg" style="background-image:url(css/login/images/blog_bg.jpg);"></div>
    <div class="login_header">
    	<span></span>
    </div>
    
    <div class="container">
    	<div class="form_header">
        	<h1 id="logo">Blog.</h1>
			<h2 id="subheading">请按步骤完成注册</h2>
        </div>
        	<div class="signup_forms" class="signup_forms">
            	<div id="signup_forms_container" class="signup_forms_container">


                    	<form class="signup_form_form" id="sign_form" method="post" action="checkregister">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        	<div class="signup_account" id="signup_account">
                            	<div class="form_user">	
        							<input type="text" name="email" placeholder="Email" id="signup_email">
                                </div>
                                <div class="form_username">
           							<input type="text" name="username" placeholder="Username" id="signup_username">
        						</div>
                                <div class="form_password">
           							<input type="password" name="password" placeholder="Password" id="signup_password">
        						</div>
        						<div class="form_confirm_password">
           							<input type="password"  placeholder="Confirm the password" id="signup_confirm_password">
        						</div>
                            </div>
                             </div>
                				<button type="button" id="signup_forms_submit" ><span style="font-size:16px;"><strong>注 册</strong></span></button>
           	   				 </div>
                        </form> 
               
    </div>
    
    <div class="footer">
    	<div class="footer_signup_link">
        	<a class="signup_link" href="login">登 录</a>
            <a href="#" target="_blank" class="link unnamed_2">About</a>
        </div>
        <div class="design_show">
        	<div class="designer_info">
            	<a href="#">制作人： <strong>CJ</strong></a>
                <a href="#" target="_blank" class="face"><img id="face" src="css/login/images/face.jpg" alt="designed by CJ"/></a>
            </div>
        </div>
    </div>
</body>
</html>
