<?php foreach ($wishlist as $value):?>
  <?php
  $wishlist= $value->wishlist;


  $wish=  json_decode($wishlist);
   $length = count($wish);

  for ($i = 0; $i < $length; $i++) {
  $wishli=$wish[$i];

}
 



 

  ?>

  
 <?php endforeach;?>	