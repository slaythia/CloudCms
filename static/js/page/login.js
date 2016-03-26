var login = function(){
	$("#js-login").click();
};
(function(){
	var Button = new buttonWidget();
	var Popup = new popupWidget();
	var RuleLimit = new Rule();

	
	$("#js-login").on('click' , function(event) {
		var $this = $(this) , 
			params = {
				username : $('#js-username').val() , 
				password : $('#js-password').val() , 
				verification : $('#js-verification-input').val()
			} ,
			RuleLimitReslut = RuleLimit.limit(params , {
				username : [6 , 16 , '用户名'] ,	 
				password : [6 , 16 , '密码'] , 
				verification : [4 , 4 , '验证码'] , 
			});
		 if(RuleLimitReslut != true){
			Popup.toast(RuleLimitReslut + '，请检查后重新输入' , false);
			return false;
		}
		Button.loading($this);
		_api.adminUser.login({
			'username' : params.username,
			'password' : params.password,
			'verification' : params.verification,
		}).then(function(data){
			Button.reLoading($this);
			$(".login-main").html("<p class='success'>登录成功，正在跳转...</p>");
			setTimeout(function(){
				window.location.reload();
			} , 400)
		} , function(data){
			Button.reLoading($this);
			Popup.toast(data , false);
			$("#js-verification").click();
			$("#js-password").val("");
			$("#js-verification-input").val("");
		})
	});	

	setTimeout(function(){
		$(".warpper").addClass('animate');
	} , 1000)
})()