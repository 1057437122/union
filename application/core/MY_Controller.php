<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	public $userid;
	public $username;
	
	public function __construct(){
		parent::__construct();
		//$this->is_login=false;

		$this->data['base_url']=$this->config->item('base_url');
		
		$this->load->library('session');
		$this->checkAdmin();
		
	}
	public function index(){
		//$this->login();
	}
	public function checkAdmin(){
		$this->userid=$this->session->userdata('userid');
		$this->username=$this->session->userdata('username');
		// print_r($this->session->userdata);
		// if(!isset($_SESSION['userid']) || !isset($_SESSION['username']) ||!$_SESSION['userid'] ||!$_SESSION['username']){
		if(!isset($this->userid) || !isset($this->username) ||!$this->userid ||!$this->username){
			// echo 'no';
			header("Location:".$this->data['base_url']."index.php/login");
			// 
			exit;
		}else{
			return true;
		}
	}
	public function deleteUserData(){
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('username');
	}
	// public function init(){
		// $this->admin_model->ini();
	// }
}