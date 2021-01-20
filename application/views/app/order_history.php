
<?php foreach ($order_history as $value):?>
  <?php
  $product= $value->product_details;
  $pro =  json_decode($product);
  $output="";
   $i=1;
  foreach($pro as $row)
  {
     
                  $output .= '
                    <tr>
                   
                    <td>'.$row->name.' </td>
                     <td>'.$row->price.'</td>
                     <td>'.$row->qty.'</td>
                     <td>'.$row->subtotal.'</td></tr>
                  ';
                     $i++;
                 
  }
  echo $output; 

 ?> 
 	
<?php endforeach;?>	


