<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller {
    
    public function __construct() {
    parent::__construct();
    $this->load->helper('form','html','url');
    $this->load->library('form_validation');
     
    }
  public function index(){
      $config=array(
            'protocol'=>'smtp',
            'smtp_host'=>'ssl://smtp.gmail.com',
            'smtp_port'=>465,
            'mailtype'=>'html',
            'smtp_user'=>'tuzoengelbert@gmail.com',
            'smtp_pass'=>'ngelageze',
            'charset'=>'iso-8859-1'
            
        );
      $this->form_validation->set_rules('userid','username','trim|required|min_length[6]|max_length[12]|is_unique[tb_user.userid]');
      $this->form_validation->set_rules('fname','first name','trim|required');
      $this->form_validation->set_rules('mname','middle name','trim|required');
      $this->form_validation->set_rules('email','E-mail','trim|required|valid_email|is_unique[tb_user.email]');
      $this->form_validation->set_rules('password','password','trim|required|matches[passconf]');
      $this->form_validation->set_rules('passconf','password confirmation','trim|required');
      
      if($this->form_validation->run()==FALSE){
       $this->load->view('register_form');
      }
 else {
      $this->load->model('model_form');
      $username=$this->input->post('userid');
      $fname=$this->input->post('fname');
      $mname=$this->input->post('mname');
      $password=md5($this->input->post('password'));
      $email=$this->input->post('email');
      
      $this->load->library('email',$config);
      $this->email->set_newline("\r\n");
      $this->email->from('pgis@gmail.com','PGIS TEAM');
      $this->email->to($email);
      $this->email->subject('Activate your account');
      $message='<html>
                 . <head><title></title></head>
                    <body>';
      $message .='<p> Dear'.' <b>'.$username.'<b></p>';
      $message .='<p> Thanks for registaring and please <strong><a href="http://localhost/pgis/index.php/register/email_validation/'.$email.'/'.random_string('unique').'">click here</a></strong> to activate yoour account';
      $message .='<p> PGIS TEAM</p>';
      $message .='</body>';
      $message .='</html>';
      $this->email->message($message);
      if(@$this->email->send()){
      $data['smg']=$username;
      $this->load->view('registration_confirmation',$data);
      $this->model_form->model_form_db($username,$fname,$mname,$password,$email);
      }else{
      $this->load->view('network_error1');
      }
      }
  }
  function email_validation() {
      $this->load->model('model_form');
      $email= $this->session->userdata('email');
      $validated=  $this->model_form->activate_account($email);
      if($validated){
       
      }  else {
      $data['error_message']='<font class=alert-success style=margin-left:80px;>Successify registered,You can login now.!</font>';
      $this->load->view('clogin',$data);
      }
  }
  function passconfig(){
       $config=array(
            'protocol'=>'smtp',
            'smtp_host'=>'ssl://smtp.gmail.com',
            'smtp_port'=>465,
            'mailtype'=>'html',
            'smtp_user'=>'tuzoengelbert@gmail.com',
            'smtp_pass'=>'ngelageze',
            'charset'=>'iso-8859-1'
            
        );
        $this->form_validation->set_rules('email','E-mail','trim|required|valid_email|xss_clean');
        if($this->form_validation->run()===FALSE){
         $this->load->view('forgot_pass');
          }  else{
           $this->load->model('model_form');
           $email=  $this->input->post('email');
           $this->session->set_userdata('email');
           $result=$this->model_form->password_recovery($email);
           if($result){
           $this->load->library('email',$config);
           $this->email->set_newline("\r\n");
           $this->email->from('pgisteam@gmail.com','PGIS TEAM');
           $this->email->to($email);
           $this->email->subject('PASSWORD RECOVERY');
           $message='<html>
                    <head><title></title></head>
                    <body>';
           $message.='<p>Dear'.' '.$email.'</p>';
           $message.='<p>To recover your password please <strong><a href="http://localhost/pgis/index.php/register/password_lost/'.$email.'">click here</a></strong> to retrive lost password</p>';
           $message.='<p>Thanks !!!!</p>';
           $message.='<p>PGIS TEAM</p>';
           $message.='</body>';
           $message.='</html>';
           $this->email->message($message);
           if(@$this->email->send()){
           $data['error_message']='<font color=blue>E-mail sent !!,Visit your Email account to retrive lost password</font>';
           $this->load->view('forgot_pass',$data);
           }  else {
               $this->load->view('network_error');   
           }
          }
          else{
           $data['error_mess']='<font color=red>Invalid email</font>';
           $this->load->view('forgot_pass',$data);
         }
        
          }
         }
         function password_lost(){
             $this->form_validation->set_rules('email','E-mail','required|valid_email|xss_clean');
             $this->form_validation->set_rules('npassword','New password','trim|required|matches[passwordconf]|xss_clean');
             $this->form_validation->set_rules('passwordconf','Confirmation password','trim|required|xss_clean');
               if($this->form_validation->run()===FALSE){
                   $this->load->view('password_retrival'); 
               } else {
                   $email=  $this->input->post('email');
                   $npassword=  md5($this->input->post('npassword'));
                   $query="select email,userid from tb_user where email='{$email}' limit 1";
                   $result=$this->db->query($query);
                   $row=$result->row();
                   if($result->num_rows()===1&& $row->userid){
                       $data=array(
                       'userid'=>$row->userid,
                       'email'=>$email
                   );
                   $this->session->set_userdata($data);
                    $this->load->model('model_form'); 
                    $this->model_form->update_password($email,$npassword);
                    $data['smg']='<font color=blue><p align=center>Hey'.' '.ucfirst(strtolower(addslashes($this->session->userdata('userid')))).' '. 'you have successify updated your lost password:</font>';
                    $this->load->view('password_retrival',$data);
                   }  else {
                     $data['error_mess1']='<font color=red><p align=center>Email-adress does not exist.!,please register agaion.!</p></font>';

                    $this->load->view('password_retrival',$data);  
                   }
               }
             }
             
        function retrieve_actv(){
           $query = $this->db->query('SELECT activation_code FROM tb_user'); 
            
        }
}
  

         

         
  
  


