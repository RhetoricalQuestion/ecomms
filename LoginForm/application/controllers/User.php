<?php
 
    class User extends CI_Controller {
 
        public function __construct(){
 
        parent::__construct();
            $this->load->helper('url');
            $this->load->model('user_model');
            $this->load->library('session');
 
        }
        
        public function index(){
            $this->load->view('templates/headercom.php');
            $this->load->view('pages/home_admin.php');
            $this->load->view('templates/footercom.php');
        }
        
        public function register_view(){
            $this->load->view('pages/register.php');
        }
        
        public function register_user(){
            $user=array(
                'user_name'=>$this->input->post('user_name'),
                'user_email'=>$this->input->post('user_email'),
                'user_password'=>password_hash($this->input->post('user_password'), PASSWORD_DEFAULT),
                'user_age'=>$this->input->post('user_age')
            );
            print_r($user);
            
            $email_check=$this->user_model->email_check($user['user_email']);
            
            if($email_check){
                $this->user_model->register_user($user);
                $this->session->set_flashdata('success_msg', 'Registered successfully. You may log into your account.');
                redirect('index.php/user/login_view');
            }
            
            else{
                $this->session->set_flashdata('error_msg', 'Error occured, please try again.');
                redirect('index.php/user');
            }
        }
        
        public function login_view(){
            $this->load->view('pages/login.php');
        }
        
        function login_user(){
            $user_login=array(
 
                'user_email'=>$this->input->post('user_email'),
                'user_password'=>password_hash($this->input->post('user_password'), PASSWORD_DEFAULT)
 
            );
 
            $data=$this->user_model->login_user($user_login['user_email'],$user_login['user_password']);
            
            if($data){
                $this->session->set_userdata('user_id',$data['user_id']);
                $this->session->set_userdata('user_email',$data['user_email']);
                $this->session->set_userdata('user_name',$data['user_name']);
                $this->session->set_userdata('user_age',$data['user_age']);
                
                $this->load->view('index.php/pages/user_profile.php');
            }
            else{
                $this->session->set_flashdata('error_msg', 'Error occured, please try again.');
                $this->load->view("pages/login.php");
            }
        }
        
        function user_profile(){
            $this->load->view('index.php/pages/user_profile.php');
        }
        
        public function user_logout(){
            $this->session->sess_destroy();
            redirect('index.php/user/login_view', 'refresh');
        }
    }
?>