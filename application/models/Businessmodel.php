<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Businessmodel extends CI_Model
{
  public function businessType(){

           $this->db->select("*");
           $this->db->from("business_settings");
           $this->db->where('type','shipping_cost_type'); 
          $qu=$this->db->get();
          return $qu->result();
  }

  public function getprodet($newpro){

  	       $this->db->select("*");
           $this->db->from("product");
           $this->db->where('product_id',$newpro); 
           $qu=$this->db->get();
           return $qu->result();

  }

}  