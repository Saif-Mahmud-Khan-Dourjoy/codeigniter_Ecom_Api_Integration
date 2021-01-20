<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Productmodel extends CI_Model
{
     
    function get_categories()
    {
        return $this->db->get('category')->result();
    }

     function get_subcategory($id)
    {
        $this->db->where('category',$id);
        return $this->db->get('sub_category')->result();
    }

    function get_subcategory_products($id)
    {
        $this->db->where('sub_category',$id);
        return $this->db->get('product')->result();
    }

      function get_product_details($single_order_id)
    {
        $this->db->where('product_id',$single_order_id);
        return $this->db->get('product')->result();
    }
}    