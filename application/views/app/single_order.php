   <?php 
    
    if(!empty($product)):
        $title = $product[0]->title;
        //echo $title;
        $discountType = $product[0]->discount_type;
        $amount = $product[0]->discount;
        // echo $amount;
        // exit();
        $salePrice = $product[0]->sale_price;
        
        if(!is_null($amount)){
            if($discountType == "percent"){
                $price = $salePrice-(($salePrice*$amount)/100);
            }else {
                $price = $salePrice-$amount;
            }

            //echo $price;

            $tempArray =array(
                'title'=>$title,
                'price'=> $price,
            );
            print_r($tempArray);
        }

        

    ?>
<?php endif; ?> 
<?php exit(); ?>  
            




    


    <?php foreach ($product as $value): ?>
            <?php 
            $type =  $value->discount_type;
            $amount = $value->discount;
            $sale = $value->sale_price;
           


            if (!empty($amount))
            {
                if($type == "percent"){
                $price = $sale-(($sale*$amount)/100);
                echo $price;
                    ?>
                    
                <?php } else { 
            $price = $sale-$amount;
            echo $price;
            ?>
                
            <?php 
        } } ?>
           
  <?php endforeach; ?>     