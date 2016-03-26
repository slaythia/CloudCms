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
			
			<table class="list-view-table">
				<tr>
					<th width="30"></th>
					<th width="35%"></th>
					<th width="12%"></th>
					<th width="8%"></th>
					<th width="100px"></th>
					<th width="50px"></th>
					<th width="140px"></th>
					<th width="90px"></th>
				</tr>
				{article_list}
				<tr>
					<td><input type="checkbox"></td>
					<td>{title}</td>
					<td><a href="">{article_byid}.html</a></td>
					<td>pcyisheng</td>
					<td><div class="tag">电脑常见问题</div></td>
					<td>正常</td>
					<td>2016年3月26日 21:42:18</td>
					<td><i class="fa fa-edit"></i><i class="fa fa-trash-o"></i><i class="fa fa-wrench"></i></td>
				</tr>
				{/article_list}
			</table>
			<?php
				$this->load->view($admin_template_name . '/widget/page');
			?>
		</div>
	</div>

	<?php $this->load->view( $admin_template_name . '/template/footer')?>
</body>
</html>