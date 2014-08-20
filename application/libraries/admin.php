<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->islogin=false;

		$this->data['base_url']=$this->config->item('base_url');
		$this->load->model('admin_model');
	}
	public function index(){
		$this->login();
	}
	public function login(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('passwd','passwd','required');
		
		if($this->form_validation->run()===false){
			$this->load->view('header',$this->data);
			$this->load->view('admin/login',$this->data);
			$this->load->view('footer');
		}else{
			if($this->admin_model->login()){//to judge 
				$this->data['bf_url']='index.php/zone';
				$this->data['item']='登录';
				$this->load->view('header',$this->data);
				$this->load->view('zone/success',$this->data);
				$this->load->view('footer');
			}else{
				$this->data['bf_url']='index.php/admin/login';
				$this->data['item']='登录';
				$this->load->view('header',$this->data);
				$this->load->view('zone/failure',$this->data);
				$this->load->view('footer');
			}
		}
		
	}
	// public function init(){
		// $this->admin_model->ini();
	// }
}