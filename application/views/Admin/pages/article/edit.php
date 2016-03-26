	<link rel="stylesheet" href="./static/css/admin/article.css">
	</head>
<body>
	<?php $this->load->view( $admin_template_name . '/widget/left_bar' , array("active" => 1))?>
	<div class="warpper">
		<?php $this->load->view( $admin_template_name . '/widget/top_bar')?>
		<!-- <div class="position">
			<span><i class="fa fa-home"></i>首页</span>
			<span>文章管理</span>
			<span>文章列表</span>
		</div> -->
		<div class="warpper-content">
		</div>
	</div>
	

	<?php $this->load->view( $admin_template_name . '/template/footer')?>
</body>
</html>