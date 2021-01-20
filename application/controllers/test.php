<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class test extends CI_Controller {

   public function data(){
   	$this->db->select('AVG(review) as review');
   	$this->db->from('review');
   	$this->db->where('user_id',25);
   	$result=$this->db->get();
   	$res=$result->result();
   	echo($res[0]->review);
   }

   }
