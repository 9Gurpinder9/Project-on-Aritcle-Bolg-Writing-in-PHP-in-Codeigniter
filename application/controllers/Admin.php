<?php
class Admin extends MY_Controller
{

public function index()
{

	//$this->load->library('form_validation');
	$this->form_validation->set_rules('uname','User Name','trim|required|alpha');
	$this->form_validation->set_rules('pass','Password','trim|required|max_length[12]');
$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
if($this->form_validation->run())
{

//echo"Validation Successful";
/*$uname=$this->input->post('uname');

$pass= $this->input->post('pass');
 echo"Usernmae is: ".$uname."</br>"."Password is: ".$pass;*/

$uname=$this->input->post('uname');

$pass= $this->input->post('pass');

 $this->load->model('loginmodel');

 $login_id=$this->loginmodel->isvalidate($uname,$pass);
 //echo $login_id;
 
 if($login_id)
 {
 	
 	$this->session->set_userdata('id',$login_id);

 	//$this->load->view('admin/dashboard');

return redirect('admin/welcome');

 }
 else{

 	echo"Detailed Not Matched";
 }
}

else{

//echo validation_errors();

$this->load->view('admin/login');
}
}

public function welcome()
{
	
	$this->load->model('loginmodel','ar');

$this->load->library('pagination');

$config=[

        'base_url'=>base_url('admin/welcome'),
        'per_page'=>3,
        'total_rows'=>$this->ar->num_rows(),
        'full_tag_open'=>'<ul class="pagination">',
        'full_tag_close'=>'</ul>',
         'next_tag_open'=>'<li >',
         'next_tag_close'=>'</li>',
         'prev_tag_open'=>'<li>',
         'prev_tag_close'=>'</li>',
         'num_tag_open'=>'<li>',
         'num_tag_close'=>'</li>',
          'cur_tag_open'=>'<li class="active"><a>',
          'cur_tag_close'=>'</a></li>'
         ];

         $this->pagination->initialize($config);

	$articles=$this->ar-> articleList($config['per_page'],$this->uri->segment(3));

$this->load->view('admin/dashboard',['articles'=>$articles]);

}

public function adduser()
{
	$this->load->view('admin/add_article');
	
}

public function editArticles($id)
{
	$this->load->model('loginmodel','edit');
	$rt=$this->edit->findArticle($id);
// echo"<pre>";

// print_r($rt);
$this->load->view('admin/edit_article',['article'=>$rt]);
}

public function updateArticle($id)
{
// 	echo $articleid;
// exit;

// print_r($this->input->post());
if($this->form_validation->run('add_article_rules'))
 	{
 		//$title=$this->input->post('title');
 		$post=$this->input->post();
 		// $articleid=$post['articleid'];
   //      unset($articleid);
 		$this->load->model('loginmodel','editupdate');
 		if($this->editupdate->updateArticle($id,$post))
 		{
// echo"Added Successful";
 			$this->session->set_flashdata('msg','Articles Updated Successfull');
 			 $this->session->set_flashdata('msg_class','alert-success');
 		}
else{
// echo"Done";
     $this->session->set_flashdata('msg','Articles Not Updated, Please Try Again!!');

       $this->session->set_flashdata('msg_class','alert-error');
 	}
 	return redirect('admin/welcome');
 	}

 	else{

      $this->editArticles($id);

 	}
}
public function delArticles()
{
$id=$this->input->post('id');
$this->load->model('loginmodel','delarticles');
 		if($this->delarticles->del($id))
 		{
// echo"Added Successful";
 			$this->session->set_flashdata('msg','Articles Deleted Successful');
 			 $this->session->set_flashdata('msg_class','alert-success');
 		}
else{
// echo"Done";
     $this->session->set_flashdata('msg','Articles Not Deleted, Please Try Again!!');

       $this->session->set_flashdata('msg_class','alert-error');
 	}
 	return redirect('admin/welcome');

}
public function register()
{

$this->load->view('admin/register');

}

 // public function __construct()
 // {
 // 	parent::__construct();
 // 	if(!$this->session->userdata('id'))
 // 	return redirect('login');
 // }

 public function logout()
 {
$this->session->unset_userdata('id');
return redirect('login');

 }

 public function userValidation()
 {
  $config=['upload_path'=>'./upload/',
           'allowed_types'=>'gif|jpg|png|jpeg'
           ];
           $this->load->library('upload',$config);

 	if($this->form_validation->run('add_article_rules') && $this->upload->do_upload())
 	{
 		//$title=$this->input->post('title');
 		$post=$this->input->post();
    $data=$this->upload->data();
    // echo "<pre>";
    // print_r($data);
    // exit;
    $image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
    $post['image_path']=$image_path;
 		$this->load->model('loginmodel','useradd');
 		if($this->useradd->addArticles($post))
 		{
// echo"Added Successful";
 			$this->session->set_flashdata('msg','Articles Added Successful');
 			 $this->session->set_flashdata('msg_class','alert-success');
 		}
else{
// echo"Done";
     $this->session->set_flashdata('msg','Articles Not Added, Please Try Again!!');

       $this->session->set_flashdata('msg_class','alert-error');
 	}
 	return redirect('admin/welcome');
 	}

 	else{
$upload_error=$this->upload->display_errors();
      $this->load->view("admin/add_article",compact('upload_error'));

 	}
 }
 
public function sendmail()

{

	$this->form_validation->set_rules('uname','User Name','required|alpha');
	$this->form_validation->set_rules('pass','Password','required|max_length[12]');
	$this->form_validation->set_rules('fname','First Name','required|alpha');
	$this->form_validation->set_rules('lname','Last Name','required|alpha');
	$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

if($this->form_validation->run()){

$this->load->library('email');

$this->email->from(set_value('email'),set_value('fname'));
$this->email->to('gurpinderbrar495@gmail.com');
$this->email->subject('Registration Greeting.....');
$this->email->message("Thank you for Registration");
$this->email->set_newline("\r\n");
$this->email->send();

if(!$this->email->send()){

show_error($this->email->print_debugger());
}
else{

	echo"Your E-mail has been sent!";
}
}
else{

$this->load->view('Admin/register');
}
}

public function check_email()
  {

    $this->load->view('users/email_availibility');
  }
public function check_email_avalibility()
{

if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))  {
echo'<label class="text-danger">
<span class="glyphicon glyphicon-remove">
Invalid Email
</span>
</label>';
}
else{
$this->load->model("main_model");

if($this->main_model->is_email_available($_POST['email']))
{

echo'<label class="text-danger">
<span class="glyphicon glyphicon-remove"></span>Email Already Registered</label>';
}
else{
  echo'<label class="text-success"><span class="glyphicon glyphicon-ok"></span>Email Available</label>';
}

}
}
}
?>