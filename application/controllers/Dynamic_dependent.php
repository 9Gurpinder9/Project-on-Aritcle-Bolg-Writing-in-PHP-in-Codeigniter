<?php
if(!defined('BASEPATH')) exit('Not direct script access allowed');
class Dynamic_dependent extends MY_controller

{

public function __construct()
{

parent::__construct();
$this->load->model('dynamic_dependent_model');

}
public function index()
{
	$data['country']=$this->dynamic_dependent_model->fetch_country();

$this->load->view('Users/Dynamic_dependent',$data);
}
function fetch_state()
{

	if($this->input->post('ct_id'))
	{
  echo $this->dynamic_dependent_model->fetch_state($this->input->post('ct_id'));
	}
}


function fetch_city()
 {
  if($this->input->post('state_id'))
  {
   echo $this->dynamic_dependent_model->fetch_city($this->input->post('state_id'));
  }
 }
}

?>