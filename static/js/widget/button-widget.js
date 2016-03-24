var buttonWidget = (function(){
	Log.deBug('button-widget' , "按钮组件被创建")	
	var button = function(){}
	button.prototype.loading = function($this){
		Log.deBug('button-widget' , 'loading start');
		var buttonValue = $this.text();
		$this.data('defaultValue' , buttonValue);
		$this.html('<i class="fa fa-spinner fa-spin"></i>' + buttonValue);
		$this.attr("disabled" , "disabled").addClass('disable');
		return this;
	}

	button.prototype.reLoading = function($this){
		Log.deBug('button-widget' , 'loading end');
		var buttonValue = $this.data('defaultValue');
		$this.html(buttonValue);
		$this.attr("disabled" , false).removeClass('disable');
		return this;
	}

	return button;
})();