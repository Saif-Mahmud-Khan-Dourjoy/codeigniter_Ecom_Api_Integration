<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ordermodel extends CI_Model
{
    public function order($order){

    	$this->db->insert('sale',$order);
        $result=$this->db->insert_id();
		return $result;
    }
}