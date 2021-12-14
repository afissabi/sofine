<?php
// defined('BASEPATH ') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_global');
        $this->load->library('PHPCalendar');

	}

	public function index()
	{	
		$obj_date = new DateTime();
		$timestamp = $obj_date->format('Y-m-d H:i:s');
		$tanggal = $obj_date->format('Y-m-d');
		
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";
		// exit;

		$data['content'] = 'v_calendar';

		$this->load->view('v_template', $data, FALSE);
	}

    public function load_view()
    {
        $phpCalendar = new PHPCalendar ();

        $calendarHTML = $phpCalendar->getCalendarHTML();
        echo $calendarHTML;
    }
}