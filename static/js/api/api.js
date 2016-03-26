
var _api = {} , isRequest = true;
var doAjax = function(options){
	if(isRequest){
		isRequest = false;
		$.ajax({
			url : options.url , 
			data : options.data , 
			cache: false,
			type: "POST",
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			dataType: "JSON",
			timeOut : 6000 , 
			content : window,
			success : function(data){
				if(data.STATE){
					Log.deBug('success' , data)
					options.promise.resolve(data.DATA);
				}else{
					Log.deBug('success false' , data)
					options.promise.reject(data.ERROR);
				}
			},
			error : function(data){
				Log.deBug('error' , "请求出现异常，服务器繁忙无法处理")
				options.promise.reject("请求出现异常，服务器繁忙无法处理您的请求，请稍候再试！");
			},
			complete : function(){
				isRequest = true;
			}
		});
	}else{
		Log.deBug('ajax' , "频率过高已拒绝请求");
		options.promise.reject("请求正在处理中，请勿重复提交请求。");
	}
}

function promise (data , url){
	Log.deBug('ajax' , "=============START=============");
	var promise = $.Deferred();
	Log.deBug('url' , url);
	Log.deBug('params' , JSON.stringify(data));
	 doAjax({
		url : url,
		data : data , 
      		promise: promise,
	});
	return promise;
}


_api.adminUser = {
	apiUrl : "admin/api/admin_user/" , 
	login : function(data){return promise(data , this.apiUrl + "login" )} , 
	outLogin : function(){

	}
}