 <?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Usersmodel extends CI_Model {

     public function getUsers(){

           $query=$this->db->get('users');
            return $query->result();
     }



public function saveUser(){
    	$data=array(
				'email' 	       => $this->input->post('email'), 
        'username'            => $this->input->post('username'), 
                
        'address1'            => $this->input->post('address'), 
				'password' 	       => sha1($this->input->post('password')), 
               
			);
		$this->db->insert('user',$data);
        $result=$this->db->insert_id();
		    return $result;
    }

     public function user($email,$password){  
            
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $qu=$this->db->get('user');
        if($qu->num_rows()>0){   
        return $qu->result();
        }
     }
     
    public function userProfile($user_id){

           $this->db->select("*");
           $this->db->from("user");
           $this->db->where('user_id',$user_id); 
          $qu=$this->db->get();
          return $qu->result();
}

    public function ForgotPassword($email)
 {
        $this->db->select('email');
        $this->db->from('user'); 
        $this->db->where('email', $email); 
        $query=$this->db->get();
        return $query->row_array();
 }

     public function sendpassword($data)
{
        $email = $data['email'];
         $this->db->select("*");
         $this->db->from("user");
         $this->db->where('email',$email);
        $query1=$this->db->get();
        // $query1=$this->db->query("SELECT *  from user where email = '".$email."' ");
        $row=$query1->result_array();

        if ($query1->num_rows()>0)
      
{
        // $passwordplain = "";
        // $passwordplain  = rand(999999999,9999999999);
        // $newpass['password'] = sha1($passwordplain);
        // $this->db->where('email', $email);
        // $this->db->update('user', $newpass); 
        // $mail_message='Dear '.$row[0]['username'].','. "\r\n";
        // $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
        // $mail_message.='<br>Please Update your password.';
        // $mail_message.='<br>Thanks & Regards';
        // $mail_message.='<br>DevsZone';        
        // date_default_timezone_set('Etc/UTC');
        // require FCPATH.'assets/PHPMailer/PHPMailerAutoload.php';
        // $mail = new PHPMailer;
        // $mail->isSMTP();
        // $mail->SMTPSecure = "tls"; 
        // $mail->Debugoutput = 'html';
        // $mail->Host = "yooursmtp";
        // $mail->Port = "587";
        // $mail->SMTPAuth = true;   
        // $mail->Username = "dourjoykhan@email.com";    
        // $mail->Password = "01675332900dourjoy";
        // $mail->setFrom('admin@site', 'admin');
        // $mail->IsHTML(true);
        // $mail->addAddress($email);
        // $mail->Subject = 'OTP from company';
        // $mail->Body    = $mail_message;
        // $mail->AltBody = $mail_message;
        // if (!$mail->send()) {
        //      echo ('Failed to send password, please try again!');
        // } else {
        //    echo ('Password sent to your email!');
        // }
          // redirect(base_url().'user/Login','refresh');     
         


   //   $subject = "Please verify email for login";
   //  $message = "
   //  <p>Hi ".$row[0]['username']."</p>
   //  <p>This is email verification mail from Codeigniter Login Register system. For complete registration process and login into system. First you want to verify you email by click this <a href='resetpass.html?email=".$row[0]['email']."'>link</a>.</p>
   //  <p>Once you click this link your email will be verified and you can login into system.</p>
   //  <p>Thanks,</p>
   //  ";
   //  $config = array(
   //   'protocol'  => 'smtp',
   //   'smtp_host' => 'smtpout.secureserver.net',
   //   'smtp_port' => 80,
   //   'smtp_user'  => 'xxxxxxx', 
   //                'smtp_pass'  => 'xxxxxxx', 
   //   'mailtype'  => 'html',
   //   'charset'    => 'iso-8859-1',
   //                 'wordwrap'   => TRUE
   //  );
   //  $this->load->library('email', $config);
   //  $this->email->set_newline("\r\n");
   //  $this->email->from('dourjoykhan@gmail.com');
   //  $this->email->to($row[0]['email']);
   //  $this->email->subject($subject);
   //  $this->email->message($message);
   //  if($this->email->send())
   //  {
   //   echo 'Check in your email for email verification mail');
   //   // redirect('register');
   //  }
   // } 

    $to =  $row[0]['email']; // User email pass here
    $subject = 'Reset Password';

    $from = 'dourjoykhan@gmail.com';              // Pass here your mail id

    $emailContent = 'Hello';
    // $emailContent .='<tr><td style="height:20px"></td></tr>';


    // $emailContent .= $this->input->post('message');  //   Post message available here


    // $emailContent .='<tr><td style="height:20px"></td></tr>';
    // $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://codingmantra.co.in/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.codingmantra.co.in</a></p></td></tr></table></body></html>";
                


    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '60';

    $config['smtp_user']    = 'dourjoykhan@gmail.com';    //Important
    $config['smtp_pass']    = '01675332900dourjoy';  //Important

    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not 

     

    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);
   if($this->email->send()){
    echo ("Mail has been sent successfully");
   }
   else{
    echo "srry";
   }

   
    // $this->session->set_flashdata('msg_class','alert-success');
    // return redirect('email_send');
 

        }
        else
        {  
         echo ('Email not found try again!');
         // redirect(base_url().'user/Login','refresh');
        }
        }

     function get_user_image($id)
    {
        $this->db->where('user_id',$id);
        return $this->db->get('user')->result();
    }   

}