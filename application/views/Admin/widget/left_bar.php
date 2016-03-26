<?php
	$left_bar_list_data = array(
		array(
			'icon' => 'fa-home' , 
			'name' => '后台首页' , 
			'link' => './' . $admin_template_name
		) , 
		array(
			'icon' => 'fa-file-text-o' , 
			'name' => '文章管理' , 
			'link' => './' . $admin_template_name . '/article'
		) , 
		array(
			'icon' => 'fa-tags' , 
			'name' => '标签管理' , 
			'link' => './'
		) , 
		array(
			'icon' => 'fa-list' , 
			'name' => '栏目管理' , 
			'link' => './'
		) , 
		array(
			'icon' => 'fa-user' , 
			'name' => '用户管理' , 
			'link' => './'
		) , 
		array(
			'icon' => 'fa-cogs' , 
			'name' => '其他设置' , 
			'link' => './'
		) , 
		array(
			'icon' => 'fa-question-circle' , 
			'name' => '关于系统' , 
			'link' => './'
		) , 
	);
?>


<div class="left-bar">
	<div class="left-bar-item left-bar-header">
		<img src="./static/image/admin/CloudCms.png" alt="">
	</div>
	<?php
		$left_bar_list_data[isset($active) ? $active : 0]['active'] = true;
		foreach ($left_bar_list_data as $key => $value) {
			echo '<a href="' . $value['link'] . '">
				<div class="left-bar-item ' . (isset($value['active']) && $value['active'] ? 'active' : '') . '">
					<i class="fa ' . $value['icon'] . '"></i>
					<span>' . $value['name'] . '</span>
				</div>
			</a>';
		}
	?>
</div>


