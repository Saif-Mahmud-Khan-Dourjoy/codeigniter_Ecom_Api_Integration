<!-- PAGE -->
<section class="page-section featured-products sl-featured">
    <div class="container">
        <h2 class="section-title section-title-1">
            <span>
            	<?php echo translate('latest_products');?>
            </span>
        </h2>
        <div class="carousel-arrow-alt">
            <div class="owl-carousel carousel-arrow" id="featured-products-carousel">
                <?php
					$box_style = $this->db->get_where('ui_settings',array('ui_settings_id' => 29))->row()->value;
                    $this->db->order_by('product_id','desc');
                    $this->db->get_where('product',array('current_stock' < 1));
                    $products = $this->db->get('product',20)->result_array();
                    foreach($products as $row){
                    echo $this->html_model->product_box($row, 'grid', $box_style);
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- /PAGE -->