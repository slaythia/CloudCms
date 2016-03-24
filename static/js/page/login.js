(function(){
	var button = new buttonWidget();

	$("#js-login").on('click' , function(event) {
		var $this = $(this);
		button.loading($this);
		
		
		button.reLoading($this);
	});

	setTimeout(function(){
		$(".warpper").addClass('animate');
	} , 1000)
})()