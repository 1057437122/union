<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model{
	public function __construct(){
		$this->load->database();
		$this->admin_table='users';
	}
	public function login(){
		$data=array(
			'username'=>$this->input->post('username'),
			'passwd'=>md5($this->input->post('passwd')),
		);
		// $query=$this->db->get_where($this->admin_table,array('username'=>$data['username']));
		
		//$query_arr=$query->results();
		// $orpasswd=$query_arr['passwd'];
		// if($passwd==$orpasswd){
			// return TRUE;
		// }else{
			// return FALSE;
		// }
		
		// $query=$this->db->get_where($this->admin_table,array('username'=>$data['username'],'passwd'=>$data['passwd']))->result_array();
		
		if($this->db->get_where($this->admin_table,array('username'=>$data['username'],'passwd'=>$data['passwd']))->result_array()){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function ini(){
		$sql='insert into users(`username`,`passwd`) values(\'admin\',\''.md5('cnits123!').'\')';
		return $this->db->query($sql);
	}
}/*class*/