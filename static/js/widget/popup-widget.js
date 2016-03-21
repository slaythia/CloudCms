var popupWidget = (function(){
	var $popup = $("#js-popup");

	/* 用来检测页面中是否存在弹窗组件，没有则创建 */
	var _init = function(){
		if(typeof $popup[0] === "undefined"){

		}
	}
	

	var popup = function(){
		_init();
	}
	popup.prototype.test = function(){
		alert("");
	}
	return popup;	
})();
