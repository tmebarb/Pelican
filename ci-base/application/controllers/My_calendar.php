
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
		//print_r($this->session->userdata('advisor_id'));
		//return;
		$this->load->helper('url');
		$this->load->model('calendar_model');
		$prefs['template'] = '
{table_open}<table cellpadding="1" cellspacing="2">{/table_open}

{heading_row_start}<tr>{/heading_row_start}

{heading_previous_cell}<th class="prev_sign"><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
{heading_next_cell}<th class="next_sign"><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

{heading_row_end}</tr>{/heading_row_end}

//Deciding where to week row start
{week_row_start}<tr class="week_name" >{/week_row_start}
//Deciding  week day cell and  week days
{week_day_cell}<td >{week_day}</td>{/week_day_cell}
//week row end
{week_row_end}</tr>{/week_row_end}

{cal_row_start}<tr>{/cal_row_start}
{cal_cell_start}<td>{/cal_cell_start}

{cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
{cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

{cal_cell_no_content}{day}{/cal_cell_no_content}
{cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

{cal_cell_blank}&nbsp;{/cal_cell_blank}

{cal_cell_end}</td>{/cal_cell_end}
{cal_row_end}</tr>{/cal_row_end}

{table_close}</table>{/table_close}
';
$prefs['day_type'] = 'long';
$prefs['show_next_prev'] = true;
$prefs['next_prev_url'] = base_url().'My_calendar/showcal';



// Loading calendar library and configuring table template
$this->load->library('calendar', $prefs);
		$data=array(
			'view' => 'my_calender_view',
			'title'=>'My Calendar',
			'calendar'=> $this->calendar_model->generate_calendar($year, $month),
			//'show_next_prev'=>'TRUE',
			//'next_prev_url'=>base_url().'My_calendar/showcal'
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
