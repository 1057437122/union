<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->islogin=false;

		$this->data['base_url']=$this->config->item('base_url');
		$this->load->model('admin_model');
	}
	
	public function init(){
		$this->admin_model->ini();
	}
}