
<?php 
	if($this->crud_model->get_type_name_by_id('general_settings','62','value') == 'ok'){
		include 'category_menu.php';
	}
?>
<?php 
	include 'top_banner.php';
?>
<?php
	if($this->crud_model->get_type_name_by_id('ui_settings','59','value') == 'ok'){
		include 'todays_deal.php';
	}
?>
<?php
	if($this->crud_model->get_type_name_by_id('ui_settings','24','value') == 'ok'){
		include 'latest_products.php';
	}
?>
<?php
	if($this->crud_model->get_type_name_by_id('ui_settings','59','value') == 'ok'){
		include 'popular_products.php';
	}
?>
<?php
	if($this->crud_model->get_type_name_by_id('ui_settings','24','value') == 'ok'){
		include 'featured_products.php';
	}
?>

<?php 
	include 'upcomming_products.php';
?>
<?php 
	if ($this->crud_model->get_type_name_by_id('general_settings','68','value') == 'ok') {
		if($this->crud_model->get_type_name_by_id('ui_settings','23','value') == 'ok'){
			include 'brands.php';
		}
	}
?>
<?php 
	include 'testimonial.php';
?>
<?php 
	if($this->crud_model->get_type_name_by_id('ui_settings','26','value') == 'ok'){
		include 'blog.php';
	}
?>

