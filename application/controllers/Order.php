<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Order extends CI_Controller
{
    public function __construct() {
             parent::__construct();
             $this->load->model('ordermodel');
    }

    public function confirmorder(){
    	$a = ['name'=>$this->input->post('name'),
    	'email'=>$this->input->post('email'),
    	'phone'=>$this->input->post('phone'),
    	'address'=>$this->input->post('address')];
    	//$shipping_address = implode(",",$a);
    	$shipping_address =json_encode($a);
    	

// $array=['apple','orange','banana','strawberry'];
// echo json_encode($array, JSON_FORCE_OBJECT);
// // {"0":"apple","1":"orange","2":"banana","3":"strawberry"} 

    	$b=['name'=>$this->input->post('pro_title'),
			'price'=>$this->input->post('pro_price'),
			'id'=>$this->input->post('pro_id'),
			'qty'=>$this->input->post('qty')];
		//$product_details=	implode(",",$b);
		// echo $y; 
			$product_details=json_encode($b);

    	$order=array(
               'shipping_address'=> $shipping_address,
               'product_details'=> $product_details,
               'buyer'=> $this->input->post('buyer'),
    	);

    	 $ord = $this->db->insert('sale', $order);
    	// print_r($order);
    	// exit();

    	// $ord=$this->ordermodel->order($order);

    	if($ord){
    		echo 1;
    	}
    	else{
    		echo 0;
    	}



      
    }

  

}