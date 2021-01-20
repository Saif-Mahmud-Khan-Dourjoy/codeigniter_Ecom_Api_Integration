<!-- CSS Global -->
<link type="text/css" href="<?php echo base_url(); ?>front/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/plugins/animate/animate.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/modal/css/sm.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/rateit/rateit.css" rel="stylesheet">
<!-- Theme CSS -->
<link href="<?php echo base_url(); ?>template/front/css/theme.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/css/theme-red-1.css" rel="stylesheet" id="theme-config-link">
<link href="<?php echo base_url(); ?>template/front/plugins/smedia/custom-1.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/plugins/owl-carousel2/assets/owl.carousel.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>template/front/plugins/owl-carousel2/assets/owl.theme.default.min.css" rel="stylesheet">
<!-- PAGE -->
<section class="page-section category_menu">
    <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-lr-0-md">
                        <div class="main-slider">
                            <div class="owl-carousel" id="main-slider">
                                <?php
                                $this->db->order_by("slides_id", "desc");
                                $this->db->where("uploaded_by", "admin");
                                $this->db->where("status", "ok");
                                $slides=$this->db->get('slides')->result_array();
                                $i=1;
                                foreach($slides as $row){
                                ?>
                                <div class="item slide<?php echo $i; ?> alt">
                                    <img class="slide-img image_delay" src="<?php echo $this->crud_model->file_view('slides',$row['slides_id'],'100','','no','src','','','.jpg'); ?>" data-src="<?php echo $this->crud_model->file_view('slides',$row['slides_id'],'100','','no','src','','','.jpg') ?>" alt="" />
                                    <div class="caption">
                                        <div class="div-table">
                                            <div class="div-cell">
                                                <div class="caption-content">
                                                    <p class="caption-text">
                                                        <?php if($row['button_text']!=NULL){ ?>
                                                        <a class="btn pull-right" style="background:<?php echo $row['button_color']; ?>; color:<?php echo $row['text_color']; ?>" href="<?php echo $row['button_link']; ?>">
                                                            <?php echo $row['button_text']; ?>
                                                        </a>
                                                        <?php } ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $i++;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>  
</section>
<!-- /PAGE -->
<script src="<?php echo base_url(); ?>template/front/plugins/jquery/jquery-1.11.1.min.js"></script>
<script>
  var base_url = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url(); ?>template/front/js/ajax_method.js"></script>
<script src="<?php echo base_url(); ?>template/front/js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<!-- JS Global -->
<script src="<?php echo base_url(); ?>template/front/plugins/superfish/js/superfish.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/plugins/jquery.sticky.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/plugins/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/plugins/jquery.smoothscroll.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/plugins/smooth-scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/plugins/jquery.cookie.js"></script>
<script src="<?php echo base_url(); ?>template/front/plugins/modernizr.custom.js"></script>
<script src="<?php echo base_url(); ?>template/front/modal/js/jquery.active-modals.js"></script>
<script src="<?php echo base_url(); ?>template/front/js/theme.js"></script>
<script src="<?php echo base_url(); ?>template/front/rateit/jquery.rateit.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/plugins/owl-carousel2/owl.carousel.min.js"></script>