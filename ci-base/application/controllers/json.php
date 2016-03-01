<?php
class Json extends Controller {
	function __construct() { #<-PHP5 - __construct(); PHP4 - class name()
		parent::Controller();
		$this->load->model('my_model');
	}
	function index(){
		header('Content-type: application/json');
		echo json_encode($this->my_model->get_people());
	}
}
 ?>