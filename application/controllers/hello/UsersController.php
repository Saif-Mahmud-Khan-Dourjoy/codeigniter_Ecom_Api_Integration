<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require APPPATH . '/libraries/REST_Controller.php';

class UsersController extends CI_Controller {

    public function __construct() {
             parent::__construct();
             $this->load->model('UsersModel');
    }

     // public function index_get(){

     //     header("Access-Control-Allow-Origin:*");
     //     $users=$this->UsersModel->getUsers();
     //            if($users>0){
     //         $this->response(array(
           
     //       'status'=>1,
     //       'message'=>'User Found',
     //       'data'=>$users  
     //     ),REST_Controller::HTTP_OK);

     //       }else{
     //        $this->response(array(
           
     //       'status'=>0,
     //       'message'=>'No User Found',
     //       'data'=>$users  
     //     ),REST_Controller::HTTP_NOT_FOUND);

     //       }

     // }
    
    public function regi_post(){
    	 {
            header("Access-Control-Allow-Origin:*");

             $users['user'] = $this->UsersModel->saveUser();

             // if($users){
             // 	echo 1;
             // }
             // else {
             // 	echo 0;
             // }
             json_encode(value);
            
           }   
    }
 
}