<?php 
class Export_model extends CI_Model{

//get employee list
	public function employeeList(){
$query=$this->db->select(['name','email','feedback1'])
->from('feedback')
->get();
return $query->result();
	}
}
?>