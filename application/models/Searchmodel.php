<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Searchmodel extends CI_Model {


     public function getProduct($query){

           $this->db->select("*");
           $this->db->from("product"); 
		   $this->db->like('title', $query);
		  $qu=$this->db->get();
		  return $qu->result();
}
  
   public function get_products_all($query){
            
           $this->db->select("*");
           $this->db->from("product"); 
		   $this->db->like('title', $query);
		  $qu=$this->db->get();
		  return $qu->result();

   }




}
