<div id="window">
    <div class="information-title">
        <?php echo translate('site_review');?>
    </div>
    <div class="details-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="tabs-wrapper content-tabs">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">
                                <?php echo translate('review');?>
                            </a>
                        </li>
                        <?php if(empty($reviews)): ?>
                        <li>
                            <a href="#tab2" data-toggle="tab">
                                <?php echo translate('add_review');?>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">

                        <div class="details-wrap">
                               
                                <div class="details-box">
                                    <?php
                                        echo form_open(base_url() . 'home/review_update/', array(
                                            'class' => 'form-login',
                                            'method' => 'post',
                                            'enctype' => 'multipart/form-data'
                                        ));
                                    ?>    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <textarea maxlength="5000" rows="10" class="form-control" name="review" id="comment" style="height: 138px;" placeholder="<?php echo translate('review');?> *"><?php if(!empty($reviews)){ echo $reviews[0]['review']; } ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <span class="btn btn-theme pull-right signup_btn" data-unsuccessful='<?php echo translate('info_update_unsuccessful!'); ?>' data-success='<?php echo translate('info_updated_successfully!'); ?>' data-ing='<?php echo translate('updating..') ?>' >
                                                    <?php echo translate('update');?>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        <div class="tab-pane fade" id="tab2">
                            <div class="row">
								<?php
                                    echo form_open(base_url() . 'home/review_add/', array(
                                        'class' => 'form-login',
                                        'method' => 'post',
                                        'id' => 'add_review',
                                        'enctype' => 'multipart/form-data'
                                    ));
                                ?>

                                    <div class="col-md-12">
                                        <label class="sr-only">
											<?php echo translate('review');?> *
                                        </label>
                                        <textarea maxlength="5000" rows="10" class="form-control" name="review" id="comment" style="height: 138px;" placeholder="<?php echo translate('review');?> *"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="btn btn-theme-dark btn-icon-right pull-right submit_button enterer" onclick="form_submit('add_review');" data-ing="<?php echo translate('creating...'); ?>" data-success="<?php echo translate('review_added_successfully'); ?>!" data-unsuccessful="<?php echo translate('review_adding_unsuccessful'); ?>!" data-redirectclick="#ticket" >
                                        	<?php echo translate('add'); ?>
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	$('body').on('click','.message_view',function(){
        var id = $(this).data('id');
        alert(id);
		$("#window").load("<?php echo base_url()?>home/profile/message_view/"+id);
	});
								
</script>