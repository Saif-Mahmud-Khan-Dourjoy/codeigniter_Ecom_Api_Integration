<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_sliders()
    {
        // $this->db->limit();
        return $this->db->get('slides')->result();
    }

    function get_categories()
    {
        return $this->db->get('category')->result();
    }

    function get_deal_product()
    {
        return $this->db->get_where('product',array('deal' => "ok"))->result();
    }

    function get_deal_product_front()
    {
        return $this->db->get_where('product',array('deal' => "ok"))->result();
    }

    function get_products()
    {
    $this->db->limit(9);
    $this->db->order_by('product_id','DESC');
    return $this->db->get('product')->result();
    }

    function get_all_products()
    {
    $this->db->order_by('product_id','DESC');
    return $this->db->get('product')->result();
    }

    function get_uc_product()
    {
    $this->db->limit(9);
    $this->db->order_by('upcoming_product_id','DESC');
    return $this->db->get('upcoming_product')->result();
    }

    function get_uc_allproduct()
    {
    $this->db->order_by('upcoming_product_id','DESC');
    return $this->db->get('upcoming_product')->result();
    }

    function get_category_products($id)
    {
        $this->db->where('category',$id);
        return $this->db->get('product')->result();
    }

    function get_subcategory_products($id)
    {
        $this->db->where('sub_category',$id);
        return $this->db->get('product')->result();
    }
    
    function get_subcategory($id)
    {
        $this->db->where('category',$id);
        return $this->db->get('sub_category')->result();
    }
    
    function get_product_details($id)
    {
        $this->db->where('product_id',$id);
        return $this->db->get('product')->result();
    }
    
    function get_uc_details($id)
    {
        $this->db->where('upcoming_product_id',$id);
        return $this->db->get('upcoming_product')->result();
    }

    function check_login($email,$password)
    {
        $this->db->where('email',$email);
        $this->db->where('password',sha1($password));
        return $this->db->get('user')->result();
    }

    function get_user_data($id)
    {
        $this->db->where('user_id',$id);
        return $this->db->get('user')->result();
    }
    function product_id($name)
    {
        $this->db->where('title',$name);
        return $this->db->get('product')->result();
    }

    function get_user($email)
    {
        $this->db->where('email',$email);
        return $this->db->get('user')->result();
    }
	
}






