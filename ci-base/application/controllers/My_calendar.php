
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//class My_calendar extends CI_Controller {

	//	function index($year = null, $month = null){
	//		$this->showcal($year, $month);
	//	}

	//	function showcal($year = null, $month = null) {
			
	//		$this->load->model('Mycal_model');
	//		$data['title']= 'my calendar';
	//		$data['calendar'] = $this->Mycal_model->generate_calendar($year, $month);
			
			
	//	}
//	}
class My_calendar extends CI_Controller
{
function __construct() {
			parent::__construct();
			$this->load->model('Users_model');
			$this->load->model('Advisees_model');
			$this->load->model('Advisors_model');
			//$this->load->model('Staff_worker_model');
			$this->load->helper(array('form'));
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->load->helper('array');
			$this->load->library('breadcrumbs');
			if(!$this->session->userdata('id')) {
				$this->session->set_flashdata('error_msg', 'I can\'t remember u, Please login again! <br/><br/>');
				redirect('login');
			}
		}

	function index($year=null, $month=null){
		$this->showcal($year, $month);
	}

	function showcal ($year = null, $month = null){
		$this->load->helper('url');
		$this->load->model('calendar_model');
		$data=array(
			'view' => 'my_calender_view',
			'title'=>'My Calendar',
			'calendar'=> $this->calendar_model->generate_calendar($year, $month),
			'show_next_prev'=>'TRUE',
			'next_prev_url'=>base_url().'My_calendar/showcal'
			);
			$this->load->view('admin',$data);


		/*$this->load->helper('url');
		
		$prefs = array (
               'show_next_prev' => TRUE ,
               'next_prev_url' => 	'http://localhost/Pelican/ci-base/my_calendar/showcal'
             );
		$events = array(
			(int)'01'=>'fooooood',
			'12'=>'rent',
			'10'=>'die',
			'25'=>'fast',
			);
		$this->load->library('calendar', $prefs);
		
		$data = array('view' => 'my_calender_view',
						'title'=>'My Calendar',
						'calendar' => $this->calendar->generate($year, $month, $events));

		
			$this->load->view('admin', $data);*/
		
		


	}
}
?>
