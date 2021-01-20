
<?php $i=1; ?>
<?php foreach ($status_review as $value):?>
  <?php
  $output="";
                  $output .= '
                    <tr>
                    <td>'.$i.' </td>
                    <td>'.$value->title.' </td>
                     <td>'.$value->product_type.'</td>
                     <td>'.$value->rating.'</td>
                     <td>'.$value->comment.'</td> </tr>
                  ';
                     $i++;
                 
  
  echo $output; 

 ?> 
 	
<?php endforeach;?>	
