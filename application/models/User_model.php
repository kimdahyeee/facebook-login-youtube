<?php
class User_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_user_num($user_id) {
		return $this->db->get_where('user', array('id'=>$user_id))->num_rows();
	}

	function add($option) {
		$this->db->set('email', $option['email']);
		$this->db->set('password', $option['password']);
		$this->db->set('name', $option['name']);
		$this->db->set('nickname', $option['nickname']);
		$this->db->set('created', 'NOW()', false);
		$this->db->insert('user');

		$result = $this->db->insert_id();

		return $result;
	}

	function getByEmail($option) {
		$result = $this->db->get_where('user', array('email'=>$option['email']))->row();
		return $result;
	}

	public function gets($data){
		$result = $this->db->query("SELECT * FROM user WHERE email='".$data."'");
		return $result->num_rows();
	}

	public function add_facebook($nickName, $email, $name){
		$this->db->insert('user',array(
			'nickname'=>$nickName,
			'email'=>$email,
			'name'=>$name
		));
	}

	public function youtube(){
		$result = $this->db->query("SELECT youtube_url, youtube_img FROM projects_ko WHERE projects_id=1")->result();
		return $result;
	}
}
?>