
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class My_calendar extends CI_Controller {

		function index($year = null, $month = null){
			$this->showcal($year, $month);
		}

		function showcal($year = null, $month = null) {
			
			$this->load->model('Mycal_model');
			$data['title']= 'my calendar';
			$data['calendar'] = $this->Mycal_model->generate_calendar($year, $month);
			
			
		}
	}
?>
