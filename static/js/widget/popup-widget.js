var popupWidget = (function(){
	Log.deBug('popup-widget' , "弹窗组件被创建")	

	var $popup = $("#js-popup") , selfBin = {} , $toast = $("#js-toast");
	selfBin.toast_init = function(){
		if(typeof $toast[0] === "undefined"){
			$(toastDemo).appendTo('body');
			$toast = $("#js-toast");
			Log.deBug('popup-widget' , "toast 已加载窗口载体")	
			$toast.on('click' , '.close' , function(){
				close();
			});
		}
	} , selfBin.init = function(){
		if(typeof $popup[0] === "undefined"){
			$(popupDemo).appendTo('body');
			$popup = $("#js-popup");
			Log.deBug('popup-widget' , "toast 已加载窗口载体")	
			$popup.on('click' , '.close' , function(){
				close();
			});
		}
	} , selfBin.setContent = function(content){
		$popup.find(".popup-box .content").html("").append(content);
	} , selfBin.setTitle = function(title){
		$popup.find(".popup-box .title").html("").append("<h2>" + title + "</h2>");
	} , selfBin.setBottom = function(buttonData){
		$popup.find(".popup-box .bottom").html("").html(buttonData);
	} , selfBin.setIcon = function(button_data){
		$popup.find(".popup-box .content").html("").append("<div class='left'></div>");
	} , selfBin.setData = function(option){
		selfBin.setTitle(isset(option.title) ? option.title : "");
		selfBin.setContent(isset(option.content) ? option.content : "");
		selfBin.setBottom(isset(option.buttonData) ? option.buttonData : alertButton);
	}


	var popup = function(){
		selfBin.init();
	} , close = function(){
		Log.deBug('popup-widget' , "Close popup window");	
		$popup.find(".popup-box").css({top : "-20%" , opacity : 0})
		setTimeout(function(){
			$popup.fadeOut(200);
		} , 100)
	}


	// 只有单独提示框并只有确认按钮的提示窗口
	popup.prototype.alert = function(option){
		Log.deBug('popup-widget' , "alert create")	
		option.buttonData = alertButton;
		selfBin.setData(option);
		return this;
	}
	popup.prototype.sure = function(option){
		Log.deBug('popup-widget' , "sure create")	
		option.buttonData = sureButton;
		selfBin.setData(option);
		return this;
	}
	popup.prototype.toast = function(content){
		Log.deBug('popup-widget' , "toast create");
		selfBin.toast_init();
		$toast.find('p').text(content);
		$toast.show().css({top : "10%"});
		setTimeout(function(){
			$toast.css({top : "-10%"});
		} , 3000)
		return this;
	}

	popup.prototype.then = function(fun1 , fun2){
		$popup.find(".bottom").one('click', ' #js-success', function(event) {
			if(isset(fun1)) {
				var type = fun1(event , this);
				type == true || typeof type == "undefined" ? close() : ""
			}else{
				close();
			}
		});
		$popup.find(".bottom").one('click', ' #js-danger', function(event) {
			if(isset(fun2)) {
				var type = fun2(event , this);
				type == true || typeof type == "undefined" ? close() : ""
			}else{
				close()
			}
		});
		return this;
	}


	popup.prototype.show = function(option){
		Log.deBug('popup-widget' , "Show window popup");	
		$popup.fadeIn(200 , function(){
			$popup.find(".popup-box").css({top : "20%" , opacity : 1})
		});
		return this;
	}
	popup.prototype.close = function(){
		close();
		return this;
	}


	return popup;	
})();
	