<div class="thumbnail box-style-2 no-padding">
    <div class="media">
    	<div class="cover"></div>
        <div class="media-link image_delay" data-src="<?php echo $this->crud_model->file_view('upcoming_product',$upcoming_product_id,'','','thumb','src','multi','one'); ?>" style="background-image:url('<?php echo img_loading(); ?>');background-size:cover;">
            
            <div class="quick-view-sm hidden-xs hidden-sm">
                <span onclick="quick_view('<?php echo $this->crud_model->product_link1($upcoming_product_id,'quick'); ?>')">
                    <span class="icon-view left" data-toggle="tooltip" data-original-title="<?php  echo translate('quick_view'); ?>">
                        <strong><i class="fa fa-eye"></i></strong>
                    </span>
                </span>

            </div>
        </div>
    </div>
    <div class="caption text-center">
        <div class="price">
            <a href="<?php echo $this->crud_model->product_link1($upcoming_product_id); ?>">
                <ins><?php echo $title; ?></ins> 
            </a>
        </div>
            
    </div>
</div>