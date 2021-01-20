<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Product extends CI_Controller
{
    public function __construct() {
             parent::__construct();
             $this->load->model('productmodel');
    }
    
    public function get_category(){
      header("Access-Control-Allow-Origin: *");
        $data=$this->productmodel->get_categories();
        $html  = '';
        foreach ($data as $value) {
            $html .= '<div class="col-4">';
            $html .= '<div class="card mb-3 catagory-card">';
            $html .= '<div class="card-body">';
            $html .= '<a href="product-subcategory.html?id='.$value->category_id.'">';
            $html .= "<img src='".base_url()."uploads/category_image/".$value->banner."' alt=''><span>".$value->category_name."</span></a>";
            $html .=  '</div>';
            $html .=  '</div>';
            $html .=  '</div>';
        }
        echo $html;

 }   

  public function get_sub_category($id){
     header("Access-Control-Allow-Origin: *");          
        $data=$this->productmodel->get_subcategory($id);
        $html  = '';
        foreach ($data as $value) {
            $html .= '<div class="col-4">';
            $html .= '<div class="card mb-3 subcatagory-card">';
            $html .= '<div class="card-body">';
            $html .= '<a href="sub-cat-wise-pro.html?id='.$value->sub_category_id.'">';
            $html .= "<img src='".base_url()."uploads/sub_category_image/".$value->banner."' alt=''><span>".$value->sub_category_name."</span></a>";
            $html .=  '</div>';
            $html .=  '</div>';
            $html .=  '</div>';
        }
        echo $html;
  }
  public function get_all_sub_category_product($id){
    header("Access-Control-Allow-Origin: *");
       $data['products']=$this->productmodel->get_subcategory_products($id);
        $html=$this->load->view('app/subcategory_products',$data,true);
        echo $html;
  }
  public function get_product_details($single_order_id){

     header("Access-Control-Allow-Origin: *");

     $product=$this->productmodel->get_product_details($single_order_id);

     if(!empty($product)){

       echo json_encode($product);

     }
     

      // $html=$this->load->view('app/single_order',$product,true);
      // echo $html; 

     

  }
}
