<?php foreach ($products as $value): ?>
			<div class="col-6 col-sm-4">
			<div class="card top-product-card mb-3">
            <div class="card-body">
            
            <?php 
            $type =  $value->discount_type;
            $amount = $value->discount;
            $sale = $value->sale_price;
            if (!empty($amount))
            {
                if($type == "percent"){
                $price = $sale-(($sale*$amount)/100);
                    ?>
                    <span class="badge badge-success"> <?php echo $amount ?>%</span>
                <?php } else { 
            $price = $sale-$amount;?>
                <span class="badge badge-success"> <?php echo $amount ?>TK</span>
            <?php 
        } } ?>
            <a class='product-thumbnail d-block' href='single-product.html?id=<?php echo $value->product_id; ?>'>
            <img src='<?php echo base_url(); ?>uploads/product_image/product_<?php echo $value->product_id; ?>_1.jpg' alt=''>
			</a><a class='product-title d-block' href='single-product.html?id=<?php echo $value->product_id; ?>'><?php echo $value->title ?></a>
			<p class="sale-price">৳ <?php if (!empty($amount)){ echo $price; ?><span><?php echo $value->sale_price;}else{echo $value->sale_price;} ?></span></p>
			<div class="product-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
			<a href="#" data-name="<?php echo $value->title; ?>" data-price="<?php  if (!empty($amount)){echo $price;}else{ echo $value->sale_price;} ?>" class="add-to-cart btn btn-danger"><i class="fa fa-cart-plus"></i></a></div>
			</div>
			</div>
        <?php endforeach; ?>