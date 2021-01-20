 <?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Wishlistmodel extends CI_Model {

	public function postwishlist($wish,$user_id){

			$data=array(
				'email' 	       => $this->input->post('email'), 
                'username'            => $this->input->post('username'), 
                'address1'            => $this->input->post('address'), 
				'password' 	       => sha1($this->input->post('password')), 
               
			);

	}


}