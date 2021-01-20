<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Wishlist extends CI_Controller {

    public function __construct() {
             parent::__construct();
             $this->load->model('customerprofilemodel');
    }

// $current_names = $this->db->select( 'name' )->from( 'mytable' )-.where( 'id', $id )->get()->result();
// $new_names = $current_names.', '.$this->input->post( 'name' );

// function update_name($id) {
//     $data = array(                  
//                   'name' => $new_names
//                  );              
//     $this->db->where('id', $id);
//     $this->db->update('mytable', $data);
// }

  //   public function wish(){
  //   	 header("Access-Control-Allow-Origin:*");
  //   	$wish= $this->input->post('wishlist');
  //   	$userId = $this->input->post('user_id');
  //       // echo $userId;
  //       // exit();


  //   	$current_wishlist = $this->db->select('wishlist')->from('user')->where('user_id', $userId)->get()->result();

    	

  //   	$current_wishlist2 = json_encode($current_wishlist);
  //   	print_r($current_wishlist2->wishlist);
  //   	exit();
  

  //   	//var_dump(json_decode($current_wishlist));
  //   	// print_r($current_wishlist2);
  //   	// exit();
    	
    	
  //   	$wishListDataNewArray = array_merge($current_wishlist,$wish);
  //   	$new_wishlist= json_encode($wishListDataNewArray);
  //   	 // print_r($new_wishlist);
  //   	 // exit();
		// //$new_wishlist = $current_wishlist.', '.$wishList;


  //   	$data = [
  //   			'wishlist'=>$new_wishlist,
  //   	];
  //   	$this->db->where('user_id',$userId);
  //   	$msg = $this->db->update('user',$data);
  //   	if($msg){
  //   		echo "yes";
  //   	}else {
  //   		echo "No";
  //   	}
  //   	//$list=$this->wishlistmodel->postwishlist($wish,$user_id);




  //   }

	public function wish(){
		header("Access-Control-Allow-Origin:*");

         $userId = $this->input->post('user_id');
         $wish1= $this->input->post('wishlist');

        
         $wishlist=$this->customerprofilemodel->getWishList($userId);


         
     //     foreach ($wishlist as $value) {

     //     	if($value->wishlist){

     //     		 $wishlist= $value->wishlist;
     //     	 $wish=  json_decode($wishlist);

     //     	   $length = count($wish);

     //           for ($i = 0; $i < $length; $i++) {
     //           $wishli=$wish[$i];

     //            $arrwi1[]=$wishli;

     //            }
     //            if (in_array($wish1, $arrwi1))
					//   {
					//   echo "Match found";
					//   }
					// else
					//   {
					//         $arrwi2[]=$wish1;

     //            $newarray=array_merge($arrwi1,$arrwi2);

     //            $newlist= json_encode($newarray);

          

     //            	$data = [
			  //   	'wishlist'=>$newlist,
			  //   	];
			  //   	$this->db->where('user_id',$userId);
			  //   	$msg = $this->db->update('user',$data);
			  //   	if($msg){
			  //   		echo "yes";
			  //   	}else {
			  //   		echo "No";
			  //   	}

					//   }
            

         	
     //        } else{

     //        	 $arrwi2[]=$wish1;
     //        	 $newlist= json_encode($arrwi2);

     //        	 $data = [
			  //   	'wishlist'=>$newlist,
			  //   	];
			  //   	$this->db->where('user_id',$userId);
			  //   	$msg = $this->db->update('user',$data);
			  //   	if($msg){
			  //   		echo "yes";
			  //   	}else {
			  //   		echo "No";
			  //   	}

					//   }



         	 
     //     	         }  



         foreach ($wishlist as $value) {

         	if($value->wishlist){

         		 $wishlist= $value->wishlist;
         	 $wish=  json_decode($wishlist);

         	   // $length = count($wish);

             //   for ($i = 0; $i < $length; $i++) {
             //   $wishli=$wish[$i];

             //    $arrwi1[]=$wishli;

             //    }
                if (in_array($wish1, $wish))
					  {
					  echo "Match found";
					  }
					else
					  {
					        $arrwi2[]=$wish1;

                $newarray=array_merge($wish,$arrwi2);

                $newlist= json_encode($newarray);

          

                	$data = [
			    	'wishlist'=>$newlist,
			    	];
			    	$this->db->where('user_id',$userId);
			    	$msg = $this->db->update('user',$data);
			    	if($msg){
			    		echo "yes";
			    	}else {
			    		echo "No";
			    	}

					  }
            

         	
            } else{

            	 $arrwi2[]=$wish1;
            	 $newlist= json_encode($arrwi2);

            	 $data = [
			    	'wishlist'=>$newlist,
			    	];
			    	$this->db->where('user_id',$userId);
			    	$msg = $this->db->update('user',$data);
			    	if($msg){
			    		echo "yes";
			    	}else {
			    		echo "No";
			    	}

					  }



         	 
         	         }  



            }
         
	}

