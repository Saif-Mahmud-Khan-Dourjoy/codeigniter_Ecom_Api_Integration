<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Businesssettings extends CI_Controller
{
    public function __construct() {
             parent::__construct();
             $this->load->model('businessmodel');
    }

    public function getBusinessType(){
    	header("Access-Control-Allow-Origin:*");
    	// $this->load->model('businessmodel');
    	$business=$this->businessmodel->businessType();

    	foreach ($business as $key => $value) {
    		$shippingValue = $value->value;
    	}

    	if($shippingValue){
    		echo $shippingValue;
    	}else{
    		echo "Something Went Wrong";
    	}
    }

    public function getShippingBill($newpro){

    	// echo $newpro;
    	header("Access-Control-Allow-Origin:*");
    	$pro_details=$this->businessmodel->getprodet($newpro);
    	if($pro_details){
    		echo json_encode($pro_details);
    	}else{
    		echo "Something Went Wrong";
    	}
    }



}    