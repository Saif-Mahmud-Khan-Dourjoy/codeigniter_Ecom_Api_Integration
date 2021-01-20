<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Orderedproduct extends CI_Controller
{
    public function __construct() {
             parent::__construct();
             $this->load->model('orderedproductmodel');
    }

    public function getOrderHistory($userid){
        header("Access-Control-Allow-Origin:*");
        $orderedproduct=$this->orderedproductmodel->orderHistory($userid);
        if($orderedproduct){
        	echo json_encode($orderedproduct);
        }else{
        	echo "Something Went Wrong";
        }

    }

 }   
