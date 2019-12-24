<?php
class login extends MY_Controller
{
public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('id'))
    return redirect('admin/welcome');
    
  }

public function index()
 {
  $this->form_validation->set_rules('uname','User Name','required|alpha');
  $this->form_validation->set_rules('pass','Password','required|max_length[12]');
$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  if($this->form_validation->run())
  {
   $uname=$this->input->post('uname');
   $pass=$this->input->post('pass');
   $this->load->model('loginmodel');
   $login_id=$this->loginmodel->isvalidate($uname,$pass);
   if($login_id)
   {
       $this->session->set_userdata('id',$login_id);
       return redirect('admin/welcome');
  }
   else
   {
      $this->session->set_flashdata('Login_failed','Invalid Username/Password');
      return redirect('login');
   }


  }
  else
  {
   $this->load->view('Admin/Login');
  }

 }
public function sendemail()
 {
  
  $this->form_validation->set_rules('username','User Name','required|alpha');
  $this->form_validation->set_rules('password','Password','required|max_length[12]');
  $this->form_validation->set_rules('fristname','First Name','required|alpha');
  $this->form_validation->set_rules('lastname','last Name','required|alpha');
  $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  if($this->form_validation->run())
  {
     $post=$this->input->post();
     $this->load->model('loginmodel','user');

if($this->user->addUser($post))
{
//echo"User Added";
  $this->session->set_flashdata('user','User Added Sucessfull');
$this->session->set_flashdata('user_class','alert-success');
}

else
{
  $this->session->set_flashdata('user','User Not Added, Please Try Again!!');
  $this->session->set_flashdata('user_class','alert-danger');
}
       return redirect('admin/register');
    }
  else
  {
   $this->load->view('Admin/register');
  }
 }
}