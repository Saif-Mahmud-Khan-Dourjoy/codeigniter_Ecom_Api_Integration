<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('paypal');
        $this->load->library('twoCheckout_Lib');
        $this->load->library('vouguepay');
        $this->load->library('pum');
    }

    public function index()
    {


    }

  //   function get_sliders(){
  //       //header("Access-Control-Allow-Origin: *");
		// $this->load->model('api_model');
		// $data=$this->api_model->get_sliders();
		// $html  = '';
		// foreach ($data as $value) {
		// 	$html .= '<div class="single-hero-slide">';
		// 	$html .= '<div class="slide-img">';
		// 	$html .= "<img src='".base_url()."uploads/slides_image/slides_".$value->slides_id.".jpg' alt=''></div>";
		// 	$html .=  '</div>';
		// 	$html .=  '</div>';
		// }
		// echo $html;
  //   }

   
   
    function get_categories(){
        //header("Access-Control-Allow-Origin: *");
		$this->load->model('api_model');
		$data=$this->api_model->get_categories();
		$html  = '';
		foreach ($data as $value) {
			$html .= '<div class="col-4">';
			$html .= '<div class="card mb-3 catagory-card">';
			$html .= '<div class="card-body">';
			$html .= '<a href="catagory.html?id='.$value->category_id.'">';
			$html .= "<img src='".base_url()."uploads/category_image/".$value->banner."' alt=''><span>".$value->category_name."</span></a>";
			$html .=  '</div>';
			$html .=  '</div>';
			$html .=  '</div>';
		}
		echo $html;
    }
    function get_uc_list(){
        //header("Access-Control-Allow-Origin: *");
		$this->load->model('api_model');
		$data['products']=$this->api_model->get_uc_product();
        $html=$this->load->view('app/uc_products',$data,true);
		echo $html;
    }
    function get_uc_alllist(){
        //header("Access-Control-Allow-Origin: *");
		$this->load->model('api_model');
		$data['products']=$this->api_model->get_uc_allproduct();
        $html=$this->load->view('app/uc_products',$data,true);
		echo $html;
    }

    function get_deal_slide(){
        //header("Access-Control-Allow-Origin: *");
		$this->load->model('api_model');
		$data['products']=$this->api_model->get_deal_product_front();
        $html=$this->load->view('app/deal_products',$data,true);
		echo $html;
	}

    function get_deal_product(){
        //header("Access-Control-Allow-Origin: *");
		$this->load->model('api_model');
		$data['products']=$this->api_model->get_deal_product();
        $html=$this->load->view('app/deal_products',$data,true);
		echo $html;
	}

    function get_subcategory(){
        //header("Access-Control-Allow-Origin: *");
        $this->load->model('api_model');
        $id=$this->uri->segment(3);
		$data=$this->api_model->get_subcategory($id);
		$html  = '';
		foreach ($data as $value) {
			$html .= '<div class="col-4">';
			$html .= '<div class="card mb-3 subcatagory-card">';
			$html .= '<div class="card-body">';
			$html .= '<a href="sub-catagory.html?id='.$value->sub_category_id.'">';
			$html .= "<img src='".base_url()."uploads/category_image/".$value->banner."' alt=''><span>".$value->sub_category_name."</span></a>";
			$html .=  '</div>';
			$html .=  '</div>';
			$html .=  '</div>';
		}
		echo $html;
    }
	
    function get_category_products(){
        //header("Access-Control-Allow-Origin: *");
        $this->load->model('api_model');
        $id=$this->uri->segment(3);
        $data['products']=$this->api_model->get_category_products($id);
        $html=$this->load->view('app/category_products',$data,true);
		echo $html;
    }
	
    function get_subcategory_products(){
        //header("Access-Control-Allow-Origin: *");
        $this->load->model('api_model');
        $id=$this->uri->segment(3);
        $data['products']=$this->api_model->get_subcategory_products($id);
        $html=$this->load->view('app/subcategory_products',$data,true);
		echo $html;
    }

    function get_products(){
        //header("Access-Control-Allow-Origin: *");
        $this->load->model('api_model');
        $id=$this->uri->segment(3);
        $data['products']=$this->api_model->get_products();
        $html=$this->load->view('app/all_products',$data,true);
		echo $html;
    }
     
     // function get_allproduct(){

     //     $this->load->model('api_model');
     //    $id=$this->uri->segment(3);
     //    $data=$this->api_model->get_products();
     //       if(!empty($data)){
     //        echo json_encode($data);
     //      }

     //      else{
     //        echo "Something Wrong";
     //      }


     //  }


    function get_all_products(){
       header("Access-Control-Allow-Origin: *");
        $this->load->model('api_model');
        $id=$this->uri->segment(3);
        $data['products']=$this->api_model->get_all_products();
        $html=$this->load->view('app/all_products',$data,true);
		echo $html;
    }

    function get_product_details(){
        //header("Access-Control-Allow-Origin: *");
        $this->load->model('api_model');
        $id=$this->uri->segment(3);
        $data['products']=$this->api_model->get_product_details($id);
        $html=$this->load->view('app/product_details',$data,true);
		echo $html;
    } 
     
    function get_single_product($id){
          $this->load->model('api_model');
          $data=$this->api_model->get_product_details($id);

          if(!empty($data)){
            echo json_encode($data);
          }

          else{
            echo "Something Wrong";
          }


    }


    function get_product_image(){
        //header("Access-Control-Allow-Origin: *");
		$this->load->model('api_model');
        $id=$this->uri->segment(3);
		$data=$this->api_model->get_product_details($id);
		$html  = '';
		foreach ($data as $value) {
            $html .= '<div class="single-hero-slide">';
            $html .= '<div class="slide-img">';
            $html .= "<img src='".base_url()."uploads/product_image/product_".$value->product_id."_1.jpg' alt=''>";  
			$html .= '</div>';
			$html .= '</div>';
		}
		echo $html;
    }

    function get_uc_details(){
        //header("Access-Control-Allow-Origin: *");
        $this->load->model('api_model');
        $id=$this->uri->segment(3);
        $data['products']=$this->api_model->get_uc_details($id);
        $html=$this->load->view('app/uc_details',$data,true);
		echo $html;
    } 


    function get_uc_image(){
        //header("Access-Control-Allow-Origin: *");
		$this->load->model('api_model');
        $id=$this->uri->segment(3);
		$data=$this->api_model->get_uc_details($id);
		$html  = '';
		foreach ($data as $value) {
            $html .= '<div class="single-hero-slide">';
            $html .= '<div class="slide-img">';
            $html .= "<img src='".base_url()."uploads/upcoming_product_image/upcoming_product_".$value->upcoming_product_id."_1.jpg' alt=''>";  
			$html .= '</div>';
			$html .= '</div>';
		}
		echo $html;
    }
    function check_login()
    {
        //header("Access-Control-Allow-Origin: *");
        $this->load->model('api_model');
        $name=$this->input->post('email');
        $password=$this->input->post('password');
        $data=$this->api_model->check_login($name,$password);
        //print_r($data);
        
		echo $data[0]->user_id;
    }
    

    function get_user_data(){
        //header("Access-Control-Allow-Origin: *");
        $this->load->model('api_model');
        $id=$this->uri->segment(3);
        $data=$this->api_model->get_user_data($id);
        //print_r($data);
        foreach($data as $row)
        {
            $result=array('username' => $row->username,'email' => $row->email,'phone'=> $row->phone,'address' => $row->address1);
        }
        //header('Content-Type: application/json');
        echo json_encode($result);
		
    } 
    

    function get_user_info(){
        //header("Access-Control-Allow-Origin: *");
        $this->load->model('api_model');
        $id=$this->uri->segment(3);
        $data=$this->api_model->get_user_data($id);
        //print_r($data);
        foreach($data as $row)
        {
            $result=array('username' => $row->username, 'surname' => $row->surname, 'email' => $row->email, 'phone'=> $row->phone, 'address' => $row->address1, 'city' => $row->city, 'country' => $row->country);
        }
        //header('Content-Type: application/json');
        echo json_encode($result);
		
    }

    function complete_order(){
        header("Access-Control-Allow-Origin: *");
        $this->load->model('api_model');
        $products=$this->input->post('products');

        $products=json_decode($products);
        $userid=$this->input->post('userId');
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $phone=$this->input->post('phone');
        $address=$this->input->post('address');
        $shping=$this->input->post('shping');

        $shipping=array('first_name' => $name, 'last_name' => ' ', 'address1' => $address, 'email' => $email);
        // $data['shipping_address'] = json_encode($shipping);
        $grand_total=0;
        $i=0;
        foreach($products as $product)
        {
            // $pro_id=$this->api_model->product_id($product->name);
            // $id=$pro_id[0]->product_id;
            $id=$product->id;
            $product_details[$i]=array('id' => $id, 'qty' => $product->count, 'price' => $product->price,'name' => $product->name,'subtotal' => $product->total);
            $grand_total=$grand_total+$product->total;
            $i++;
            
        }
        if($userid){
        $data['shipping_address'] = json_encode($shipping);
        $data['product_details']=json_encode($product_details);
        $data['sale_datetime']     = time();
        $data['grand_total']       = $grand_total;
        $data['delivery_status']   = '[]';
        $data['payment_status']    = '[]';
        $data['payment_details']   = 'none';
        $data['delivary_datetime'] = '';
        $data['shipping']=$shping;
        $user=$this->api_model->get_user($email);
        $data['buyer'] =$user[0]->user_id;
        $this->db->insert('sale',$data)->insert_id;
        $sale_id=$this->db->insert_id();
        $data['sale_code'] = date('Ym').$sale_id;
        $this->db->where('sale_id', $sale_id);
        $this->db->update('sale', $data);
        }
        else{
           
                //   if ($this->session->userdata('user_login') == 'yes') {
                //     $data['buyer']             = $this->session->userdata('user_id');
                // }
                // else {
                    
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < 10; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    
                    $data['shipping_address'] = json_encode($shipping);
                    $data['product_details']=json_encode($product_details);
                    $data['sale_datetime']     = time();
                    $data['grand_total']       = $grand_total;
                    $data['delivery_status']   = '[]';
                    $data['payment_status']    = '[]';
                    $data['payment_details']   = 'none';
                    $data['delivary_datetime'] = '';
                    $data['shipping']=$shping;
                    $user=$this->api_model->get_user($email);
                    $data['buyer'] =$user[0]->user_id;
                    $this->db->insert('sale',$data)->insert_id;
                    $sale_id=$this->db->insert_id();
                    $data['sale_code'] = date('Ym').$sale_id;
                    $data['guest_id'] = $sale_id.'-'.$randomString;
                    $data['buyer']= "guest";
                    $this->db->where('sale_id', $sale_id);
                    $this->db->update('sale', $data);

                // }



        }
       
    } 
}



