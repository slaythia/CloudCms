	<link rel="stylesheet" href="./static/css/home/login.css">
</head>
<body>
	<div class="warpper">
	</div>
	<div class="login">
		<div class="head-image">
			<img src="./static/image/admin/static/user.jpg" alt="">
		</div>
		<div class="login-main">
			<ul class="login-from">
				<form action="javascript:void" onsubmit="login()">
					<li><div class="label-input"><i class="fa fa-user"></i></div><input type="text" class="left_input" id="js-username" maxlength="16" placeholder="请输入您的账号"></li>
					<li><div class="label-input"><i class="fa fa-unlock-alt"></i></div><input type="password" class="left_input" id="js-password" maxlength="16"   placeholder="请输入您的密码"></li>
					<li class="verification"><input type="text" id="js-verification-input" placeholder="验证码"><img src="./verification/verification/code" id="js-verification" onclick="$(this).attr('src' , $(this).attr('src'))" class="verification-code" alt=""></li>
					<li><button type="submit" class="btn default" id="js-login">登录到后台</button></li>
					<li class="tishi"><a href="javascript:void(0)">忘记密码？</a></li>
				</form>
			</ul>
		</div>
	</div>
	<?php $this->load->view( $admin_template_name . '/template/footer')?>
	<script src="./static/js/page/login.js"></script>
</body>
</html>