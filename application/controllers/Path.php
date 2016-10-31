<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Path extends MY_Controller {

	function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function index()
	{
		$this->_head();
		$this->load->view('main');
		$this->_footer();
	}

	function contact_us() {
		$this->_head();
		$this->load->view('contact_us');
		$this->_footer();
	}

	function project() {
		$this->_head();
		$this->load->view('project');
		$this->_footer();
	}

	function about_us() {
		$this->_head();
		$this->load->view('about_us');
		$this->_footer();
	}

	function project_detail() {
		$this->load->database();
		$this->load->model('user_model');
		$result = $this->user_model->youtube();
		foreach($result as $entry){
			$youtube_url = $entry->youtube_url;
			$youtube_img = $entry->youtube_img;
		}
		$this->_head();
		$this->load->view('project_detail', array('youtube_url'=>$youtube_url, 'youtube_img'=>$youtube_img));
		$this->_footer();
	}
}
