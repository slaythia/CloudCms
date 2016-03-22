	<link rel="stylesheet" href="./static/css/home/login.css">
</head>
<body>
	<div class="background"></div>


	<script src="./static/bin/jquery/jquery.js"></script>
	<script src="./static/js/base.js"></script>
	<script src="./static/js/demo/demo-config.js"></script>
	<script src="./static/js/widget/button-widget.js"></script>
	<script src="./static/js/widget/popup-widget.js"></script>
	<script>
		var popup = new popupWidget();
		popup.alert({
			title : "Cloud Cms 2.0 beta 全面升级！",
			content : "<p>作者发现曾经写的代码实在是太LOW了所以，将所有的代码推翻后重新构架，写出了全新的Cloud cms 2.0 beat版本。在该版本中作者加入了很多的css3元素和html5代码致使页面动画变得更加绚丽多彩，每个按钮都有不同往常的体验。感谢您对作者的支持</p><br><p>Cloud cms 2.0Bate</p>",
		}).show().then(function(event , context){

		});
	</script>
</body>
</html>