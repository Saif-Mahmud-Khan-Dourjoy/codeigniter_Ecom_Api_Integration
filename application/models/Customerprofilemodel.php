<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Customerprofilemodel extends CI_Model {

   public function getOrderHistory($user_id){
         $this->db->select("*");
           $this->db->from("sale");
           $this->db->where('buyer',$user_id) ;
		  $qu=$this->db->get();
		  return $qu->result();
   }

     public function getWishList($user_id){
         $this->db->select("*");
           $this->db->from("user");
           $this->db->where('user_id',$user_id) ;
		  $qu=$this->db->get();
		  return $qu->result();
   }
   

     public function get_status_review($user_id){
         $this->db->select("*");
           $this->db->from("user_rating");
           $this->db->join("product",'product.product_id=user_rating.product_id');
           $this->db->where('user_rating.user_id',$user_id) ;
		  $qu=$this->db->get();
		  return $qu->result();
   }


}