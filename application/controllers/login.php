<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public $userid;
	public $username;
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin_model');
		$this->data['base_url']=$this->config->item('base_url');
		$this->data['bf_url']='index.php/zone';
	}
	public function index(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('passwd','passwd','required');
		//session_start();
		$this->data['loginpage']=TRUE;
		if($this->form_validation->run()===false){
			
			$this->load->view('header',$this->data);
			$this->load->view('admin/login',$this->data);
			$this->load->view('footer');
		}else{
			if($this->admin_model->login()){//to judge 
				$this->session->set_userdata('userid', '1');
				$this->session->set_userdata('username', 'admin');
				
				$this->data['bf_url']='index.php/zone';
				$this->data['item']='登录';
				$this->load->view('header',$this->data);
				$this->load->view('zone/success',$this->data);
				$this->load->view('footer');
			}else{
				
				$this->data['bf_url']='index.php/login';
				$this->data['item']='登录';
				$this->load->view('header',$this->data);
				$this->load->view('zone/failure',$this->data);
				$this->load->view('footer');
			}
		}
		
	}
}