<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Customerprofile extends CI_Controller {

    public function __construct() {
             parent::__construct();
             $this->load->model('customerprofilemodel');
    }
    public function order_history($user_id){
         header("Access-Control-Allow-Origin:*");

    	$order_history['order_history']=$this->customerprofilemodel->getOrderHistory($user_id);

        $html=$this->load->view('app/order_history',$order_history,true);
         echo($html);
    }
     public function wishlist($user_id){
         header("Access-Control-Allow-Origin:*");

        $wishlist['wishlist']=$this->customerprofilemodel->getWishList($user_id);

        $html=$this->load->view('app/wishlist',$wishlist,true);
         echo($html);
   
    }

    public function statusreview($user_id){
        header("Access-Control-Allow-Origin:*");

        $status_review['status_review']=$this->customerprofilemodel->get_status_review($user_id);

        $html=$this->load->view('app/status_review',$status_review,true);
         echo($html);
    }


}