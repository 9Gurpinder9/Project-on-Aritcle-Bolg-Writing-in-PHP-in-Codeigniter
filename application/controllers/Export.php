<?php 
if(!defined('BASEPATH'))
	exit('No direct script access allowed');
class export extends CI_Controller{
//construct
public function __construct()
{
parent::__construct();
// load model
$this->load->model('Export_model','export');
}
// export xlsx|xls file
public function index()
{

	$data['title']='Display Feedback Data';
	$data['feedbackInfo']=$this->export->employeeList();
	// load view file for output
	$this->load->view('users/feedbacklist',$data);
}

//create xlsx sheet
public function createXLS()
{
//create file name
$this->load->library('excel');
$object= new PHPExcel();
//record reflect on first sheet of excel file
$object->setActiveSheetIndex(0);
$table_columns= array('Name','Email','Feedback');
$column=0;
foreach($table_columns as $field)
{

$object->getActiveSheet()->setCellValueByColumnAndRow($column,1,$field);

$column++;
}
$feedbackInfo = $this->export->employeeList();
$excel_row = 2;
foreach($feedbackInfo as $row)
{
$object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row->name);
$object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row->email);
$object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row->feedback1);
$excel_row++;
}
$object_writer= PHPExcel_IOFactory::createWriter($object,'Excel5');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="feedbackData.xls"');
$object_writer->save('php://output');
}
}

?>