<!-- PAGE -->
<?php if ($this->db->get_where('general_settings', array('general_settings_id' => '58'))->row()->value == 'ok'and $this->db->get_where('general_settings', array('general_settings_id' => '81'))->row()->value == 'ok'){ ?>
<section class="page-section image testimonials vendors image_delay" data-src="<?php echo base_url(); ?>uploads/others/parralax_vendor.jpg"  style="background: url(<?php echo img_loading(); ?>) center top no-repeat; background-attachment:fixed; background-size:cover;">
    <div class="container" style="margin-bottom:40px !important;">
    <h2 class="section-title section-title-1">
            <span><?php echo translate('brands');?></span>
        </h2>
        <div class="partners-carousel">
            <div class="brand-carousel carousel-arrow">
                <?php
					$limit =  $this->db->get_where('ui_settings',array('ui_settings_id' => 22))->row()->value;
                    $this->db->limit($limit);
                    $this->db->order_by("brand_id", "desc");
                    $brands=$this->db->get('brand')->result_array();
                    foreach($brands as $row){
                ?>
                <div class="p-item">
                    <a href="<?php echo base_url(); ?>home/category/0/0-<?php echo $row['brand_id']; ?>">
                        <?php
                        if(file_exists('uploads/brand_image/'.$row['logo'])){
                        ?>
                        <img class="image_delay" src="<?php echo img_loading(); ?>" data-src="<?php echo base_url();?>uploads/brand_image/<?php echo $row['logo']; ?>" alt=""/> 
                        <?php
                            } else {
                        ?>
                        <img  class="image_delay" src="<?php echo img_loading(); ?>" data-src="<?php echo base_url(); ?>uploads/brand_image/default.jpg" />
                        <?php
                            }
                        ?>
                    </a>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function(){
    $(".brand-carousel").owlCarousel({
        autoplay: false,
        autoplayHoverPause: true,
        loop: true,
        margin: 0,
        dots: false,
        nav: true,
        navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
        responsive: {
            0: {items: 3},
            479: {items: 3},
            768: {items: 5},
            991: {items: 6},
            1024: {items: 6},
            1280: {items: 8}
        }
    });
});
</script>
<!-- /PAGE -->
<?php } ?>