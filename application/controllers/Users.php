<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller {

    public function __construct() {
             parent::__construct();
             $this->load->model('usersmodel');
             $this->load->library('upload');
    }

     public function index()
    {
    	 header("Access-Control-Allow-Origin:*");
         $users=$this->usersmodel->getUsers();
         
         // echo "<pre>";
         // print_r($users);


    }

     public function regi(){
    	 
             header("Access-Control-Allow-Origin:*");

             $users['user'] = $this->usersmodel->saveUser();

             if($users){
             	echo 1;
             }
             else {
             	echo 0;
             }  
    }

      public function login(){

         header("Access-Control-Allow-Origin:*");

         $email=$this->input->post('email'); 
         $password=sha1($this->input->post('password'));        
         $userinfo=$this->usersmodel->user($email,$password);
         
         if(!empty($userinfo))
         {
          $new=array('valid' => "yes", 'dataes' => $userinfo);
          echo json_encode($new); 
         }
         else{
          $new=array('valid' => "no");
          echo json_encode($new); 
         }

         // json_encode($userinfo);
              
          
      }

       public function profile($user_id){
           
            header("Access-Control-Allow-Origin:*");

            $profile= $this->usersmodel->userProfile($user_id);


          if($profile)
         {
         
          echo json_encode($profile); 
         }


        } 

   //      public function forgetpass()
   // {
   //       header("Access-Control-Allow-Origin:*");
   //       $email = $this->input->post('email');  
   //       $findemail = $this->usersmodel->ForgotPassword($email);  
   //       if($findemail){
   //        $this->usersmodel->sendpassword($findemail);

   //         }else{
          
   //        echo "Wrong Email Address";
   //    }
   // } 
//     
          public function change_picture()
        {
          header("Access-Control-Allow-Origin:*");
          $image=$this->input->post('image');
          $id=$this->input->post('id');
          $bin = base64_decode($image);
          
          $im = imageCreateFromString($bin);
          $name='user_'.$id.'.jpg';
          $img_file = 'uploads/user_image/'.$name;
          imagejpeg($im, $img_file, 0);

          $name1='user_'.$id.'_thumb.jpg';
          $img_file1 = 'uploads/user_image/'.$name1;
          imagejpeg($im, $img_file1, 0);
        }

        public function show_picture(){
          //header("Access-Control-Allow-Origin: *");
    $this->load->model('usersmodel');
        $id=$this->uri->segment(3);

    $data=$this->usersmodel->get_user_image($id);
    $html  = '';
    foreach ($data as $value) {
            $html .= '<div class="single-hero-slide">';
            $html .= '<div class="slide-img">';
            $html .= "<img src='".base_url()."uploads/user_image/user_".$value->user_id.".jpg' alt=''>";  
      $html .= '</div>';
      $html .= '</div>';
    }
    echo $html;
        }

}