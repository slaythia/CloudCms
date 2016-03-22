
var popupWidget = (function(){
	var $popup = $("#js-popup") , selfBin = {};


	selfBin.init = function(){
		if(typeof $popup[0] === "undefined"){
			$(popupDemo).appendTo('body');
			$popup = $("#js-popup");
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
		$popup.find(".popup-box").css({top : "-20%" , opacity : 0})
		setTimeout(function(){
			$popup.fadeOut(200);
		} , 100)
	}


	// 只有单独提示框并只有确认按钮的提示窗口
	popup.prototype.alert = function(option){
		option.buttonData = alertButton;
		selfBin.setData(option);
		this.context_type = "alert";
		return this;
	}
	popup.prototype.sure = function(option){
		option.buttonData = sureButton;
		selfBin.setData(option);
		this.context_type = "sure";
		return this;
	}

	popup.prototype.then = function(fun1 , fun2){
		$popup.find(".bottom").one('click', ' #js-success', function() {
			if(isset(fun1)) {
				var type = fun1();
				type == true || typeof type == "undefined" ? close() : ""
			}
		});
		$popup.find(".bottom").one('click', ' #js-danger', function() {
			if(isset(fun2)) {
				var type = fun2();
				type == true || typeof type == "undefined" ? close() : ""
			}else{
				close()
			}
		});
		return this;
	}


	popup.prototype.show = function(option){
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
var popup = new popupWidget();
	