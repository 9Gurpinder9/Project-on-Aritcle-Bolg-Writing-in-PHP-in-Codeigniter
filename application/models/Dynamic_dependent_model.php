<?php
class Dynamic_dependent_model extends CI_Model
{

function fetch_country()
{

	$this->db->order_by('ct_name','ASC');
	$query=$this->db->get('country');
	// print_r($query->result());
	// exit;
	return $query->result();

}

function fetch_state($ct_id)
{

	$this->db->where('s_country_id',$ct_id);
	$this->db->order_by('s_name','ASC');
	$query=$this->db->get('state');
	$output='<option value="">Select State</option>';

	foreach($query->result() as $row)
	{
$output.='<option value="'.$row->s_id.'">'.$row->s_name.'</option>';

	}
	return $output;

}


function fetch_city($state_id)
{

	$this->db->where('c_state_id',$state_id);
	$this->db->order_by('c_name','ASC');
	$query=$this->db->get('city');
	$output='<option value="">Select State</option>';

	foreach($query->result() as $row)
	{
$output.='<option value="'.$row->c_id.'">'.$row->c_name.'</option>';

	}
	return $output;

}
}
?>