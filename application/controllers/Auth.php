<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public $user = null;
	public $user_profile = null;

	function __construct() {
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper('alert');
		parse_str($_SERVER['QUERY_STRING'], $_REQUEST);
		$this->load->library('facebook', array('appId'=>'826591484141725','secret'=>'defe9856ff38c76d9ca4165cfc0528d6', 'xfbml'=> true));
		$this->user = $this->facebook->getUser();
	}

	function login() {

		if($this->user){
			//페이스북 로그인이 되었다면..
			try {
				$this->user_profile = $this->facebook->api('/me', array('fields' => 'name,email'));
			} catch(FacebookApiException $e) {
				print_r($e->getresult());
				$this->user = null;
			}

			if(count($this->user_profile) == '2'){
				$this->session->sess_destroy();
				alert('이 계정은 이메일이 존재하지 않습니다. 회원가입을 해주세요','http://localhost/index.php/auth/register');
			}
			$this->load->database();
			$this->load->model('user_model');
			$data = $this->user_model->gets($this->user_profile['email']);

			if($data == '1'){
				//가입된 경우
				$this->session->set_userdata('is_login', true);
				redirect('/');
			}
			$this->load->view('head');

			$this->load->library('form_validation');

			$this->form_validation->set_rules('nickName', 'Nick name', 'required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.email]');

			if ($this->form_validation->run() == false)
	        {
	             $this->load->view('nick', array('email'=>$this->user_profile['email'], 'name'=>$this->user_profile['name']));
	        }
	        else
	        {
	        	$this->load->model('user_model');
				$this->user_model->add_facebook($this->input->post('nickName'), $this->input->post('email'), $this->input->post('name'));
				$this->session->set_flashdata('message_success', 'Success To Register');
				$this->session->set_userdata('is_login', true);
				redirect('/');
	        }
			$this->load->view('footer');
		} else {
			$login = $this->facebook->getLoginUrl(array('scope'=>'email', 'display'=>'popup', 'cookie' => true, 'next'=>'http://localhost/index.php', 'cancel_url'=>'http://localhost/index.php', 'redirect_uri'=>'http://localhost/index.php'));
			$this->_head();

			$this->load->view('login', array('address'=>$login));

			$this->_footer();
			
		}
	}

	function logout() {
		$this->session->sess_destroy();
		redirect('/');
	}

	function register() {
		$this->_head();

		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[30]|matches[re_password]');
		$this->form_validation->set_rules('re_password', 'Password', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('nickname', 'Nick name', 'required|min_length[3]|max_length[20]');

		if($this->form_validation->run() === false) {
			$this->load->view('register');
		} else {
			if(!function_exists('password_hash')) {
				$this->load->helper('password');
			}

			$hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

			$this->load->model('User_model');
			$new_id = $this->User_model->add(array(
				'email'=>$this->input->post('email'),
				'password'=>$hash,
				'username'=>$this->input->post('name'),
				'nickname'=>$this->input->post('nickname')
				)
			);

			if($this->User_model->get_user_num($new_id) > 0) {
				$this->session->set_flashdata('message_success', 'Success To Register');
				redirect('/');
			} else {
				$this->session->set_flashdata('message_error', 'Server Error');
				redirect('http://www.fandle.net/index.php/auth/register');
			}
		}

		$this->_footer();
	}

	function authentication() {
		$this->load->model('User_model');
		$user = $this->User_model->getByEmail(array('email'=>$this->input->post('email')));
		if(
			$this->input->post('email') == $user->email &&
			password_verify($this->input->post('password'), $user->password)
		) {
			$this->session->set_userdata('is_login', true);
			redirect('http://www.fandle.net/index.php');
		} else {
			$this->session->set_flashdata('message_error', 'Fail To Login!');
			redirect('http://www.fandle.net/index.php/auth/login');
		}
	}
}