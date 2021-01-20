<?php foreach ($wishlist as $value):?>
  <?php
  $wishlist= $value->wishlist;

  $wish=  json_decode($wishlist);

  // print_r($wish);
  // exit();
  
  $length = count($wish);



for ($i = 0; $i < $length; $i+=1) {
  $wishli=$wish[$i];


   $this->db->select("*");
   $this->db->from("product");
   $this->db->where('product_id',$wishli) ;
   $qu=$this->db->get();
   $wl=$qu->result();

   $output="";

  foreach($wl as $row)
  {
     
                  $output.= '<tr>';
                 
                  $output.= '<td><img style="height:50px; weight:50px;" src="'.base_url().'uploads/product_image/product_'.$row->product_id.'_1.jpg">';
                  $output.= '<td><a href="single-product.html?id='.$row->product_id.'">'.$row->title.'</a></td>';
                  $output.= ' <td>'.$row->sale_price.'</td>';
                  $output.= ' <td><a class="btn btn-info" href="single-product.html?id='.$row->product_id.'">Show</a></td>';
                  $output.= '</tr>';

                          
  }
  echo $output; 
}

 ?> 
 	
<?php endforeach;?>	