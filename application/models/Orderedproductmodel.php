<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Orderedproductmodel extends CI_Model
{
 public function orderHistory($userid){
 	       $this->db->select("*");
           $this->db->from("sale");
           $this->db->where('buyer',$userid); 
          $qu=$this->db->get();
          return $qu->result();
 }

}