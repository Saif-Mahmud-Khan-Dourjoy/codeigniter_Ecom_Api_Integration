<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Search extends CI_Controller {

    public function __construct() {
             parent::__construct();
             $this->load->model('searchmodel');
    }

    public function product_search(){

       header("Access-Control-Allow-Origin:*");
       
        $query = '';
          if($this->input->get('search_text'))
            {
             $query = $this->input->get('search_text');
            }
        $product= $this->searchmodel->getProduct($query);

         if(!empty($product))
         {
          // $new=array('valid' => "yes", 'dataes' => $userinfo);
          echo json_encode( $product); 
         }
         else{
          $new=array('valid' => "no");
          // echo json_encode($new); 
         } 
        
             


    }

     public function get_products_all(){ 

       header("Access-Control-Allow-Origin:*");
       
        $query = '';
          if($this->input->get('search_text'))
            {
             $query = $this->input->get('search_text');
            }
        $product['products']= $this->searchmodel->get_products_all($query);

        $html=$this->load->view('app/all_products',$product,true);
         echo $html;
     }

    }


