# popup-wdiget.js
### 描述：			整站的弹窗组件，他可以实现网站提示的浮动弹窗
### 依赖：			Jquery.js、dome/demo-config.js
### 方法：			sure()、alert()、toast()、show()、close()、then();
### 通用必须属性：	option.title、option.content


sure：设置当前窗口为sure窗口，拥有确认和取消按钮
alert：设置当前窗口为alert窗口，仅有确认按钮
toast：一个小型的提示窗，3秒后自动关闭
show：打开当前设置的窗口（只能弹出最后一个设置的窗口）
close：关闭所有已经打开的窗口

then(success (function) , error (function))
用户点击按钮后的反馈方法，使用时需要在自定义函数内填写event和context两个参数
组件默认用户点击按钮后自动关闭所有窗口，您可以使用return false阻止系统默认事件

## demo
	popup.sure({
		title : "欢迎来到这里",
		content : "Cms后台管理系统在这里您可以操作您前台页面中的任何数据",
	}).then(function(event , context){
		//succer
	} , function(event , context){
		//error
		popup.close();
		return false;
	}).show();



# button-widget.js
### 描述：			按钮组件
### 依赖：			Jquery.js、base.js
### 方法：			loading() 、reLoading();
