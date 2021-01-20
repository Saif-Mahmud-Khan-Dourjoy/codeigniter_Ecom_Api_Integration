<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class testmodel extends CI_Model
{
	public function getAllData($table,$where=null,$limit=null)
	{
		if($where !=''){
			$this->db->where($where);
		}

		if($limit !=''){
			$this->db->where($limit);
		}

		$result=$this->db->get($table);
        return $result->result();
	}

	public function Data()
	{
		$where = array('status',1); 
		$this->testmodel->getAllData('user',$where,10);
	}

}