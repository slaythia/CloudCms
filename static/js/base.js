function isset(context){
	return typeof context !== undefined;
}
(function(){
	$('.fa-edit').on('click' , function(event) {
		var id = $(this).parent().parent().data('id');
		window.location.href = "." + base_url + '/edit/?id=' + id;
	});

	$('.fa-trash-o').on('click' , function(event) {
		var popup = new popupWidget();
		popup.sure({
			title : '您确定要删除吗',
			content : '<p>您确定要删除这篇文章吗？</p><p>删除后的文章将无法恢复</p>',
		}).show().then(function(){

		} , function(){
			
		});
	});
})()


var Rule = (function(){
	var test = function(){}
	test.prototype.limit = function(params , rule){
		for(var key in params) {
			var value = params[key];
			if(isset(rule[key])){
				var limitRult = rule[key] , 
					name = (isset(limitRult[2]) ? limitRult[2] : key) ;
				if( ! isNaN(limitRult[0])){
					console.log(value);
					if(value.length < limitRult[0]) return '您的' + name + '最短不能少于' + limitRult[0] + '个字符';
					if(value.length > limitRult[1]) return '您的' + name + '最大不能大于' + limitRult[1] + '个字符';
				}else{
					if(limitRult[0] && value == '') return '您的' + name + '不能为空';
				}
			}
		}
		return true;
	}
	console.log(test);
	return test;
})();


/* Log 私有组件 */
var _Log = (function(){
	var LogBin = function(){}
	LogBin.prototype.deBug = function(tag , value){
		if(typeof deBug !== 'undefined' && deBug){
			var date = new Date() , currentdate;
			currentdate = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
			console.debug( currentdate +" :: " +tag + "：" + value)
		}
	}
	return LogBin;
})();
var Log = new _Log();