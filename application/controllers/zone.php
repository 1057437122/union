<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zone extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('zone_model');
		$this->data['base_url']=$this->config->item('base_url');
		$this->data['bf_url']='index.php/zone';

	}
	public function index($index_page=0)//lists all the zones ;0 means the first page
	{	
		$zone_nu=$this->zone_model->get_zone_nu();
		$this->data['max_page']=ceil($zone_nu/30);
		if($index_page>$this->data['max_page']){
			$index_page=$this->data['max_page'];
		}
		$this->data['zones']=$this->zone_model->lists($index_page);
		$this->data['cur_page']=$index_page;
		$this->load->view('header',$this->data);
		$this->load->view('zone/lists',$this->data);
		$this->load->view('footer');
	}
	public function logout(){
		$this->deleteUserData();
		$this->data['bf_url']='index.php/zone';
		$this->data['item']='退出';
		$this->load->view('header',$this->data);
				
		$this->load->view('zone/success',$this->data);
		$this->load->view('footer');
	}
	public function add(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name','name','required');
		if($this->form_validation->run()===false){//zone name is empty
			$this->load->view('header',$this->data);
			$this->load->view('zone/addzone',$this->data);
			$this->load->view('footer');
		}else{//add zone to db
			$this->data['bf_url']='index.php/zone';
			$this->data['item']='添加域名';
			if($this->zone_model->addZone()){
				$this->load->view('header',$this->data);
				
				$this->load->view('zone/success',$this->data);
				$this->load->view('footer');
			}else{
				$this->load->view('header',$this->data);
				$this->data['reason']='已存在';
				$this->load->view('zone/failure',$this->data);
				$this->load->view('footer');
			}
		}
	}
	public function tst(){
		$this->zone_model->verify('cnits123!');
	}
	public function chpasswd(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('odpasswd','odpasswd','required');
		$this->form_validation->set_rules('passwd','passwd','required');
		$this->form_validation->set_rules('repasswd','repasswd','required');
		
		if($this->form_validation->run()===false){//zone name is empty
			$this->load->view('header',$this->data);
			$this->load->view('admin/chpswd',$this->data);
			$this->load->view('footer');
		}else{//add zone to db
			$this->data['bf_url']='index.php/zone';
			$this->data['item']='更改密码';
			if($this->zone_model->updatepswd()){
				$this->load->view('header',$this->data);
				
				$this->load->view('zone/success',$this->data);
				$this->load->view('footer');
			}else{
				$this->load->view('header',$this->data);
				
				$this->load->view('zone/failure',$this->data);
				$this->load->view('footer');
			}
		}
	}
	public function del($zone){
		$this->data['item']='删除域名';
		if($this->zone_model->delZone($zone)){
			$this->load->view('header',$this->data);
			
			$this->load->view('zone/success',$this->data);
			$this->load->view('footer');
		}else{
			$this->load->view('header',$this->data);
			$this->load->view('zone/failure',$this->data);
			$this->load->view('footer');
		}
	}
	public function search(){
		// $this->load->helper('form');
		// $this->load->library('form_validation');
		// $this->form_validation->set_rules('zone','zone','required');
		// $this->data['noshowsearch']=1;
		// if($this->form_validation->run()===false){
			// $this->load->view('header',$this->data);
			// $this->load->view('zone/search',$this->data);
			// $this->load->view('footer');
		// }else{
		$cont=addslashes($_GET['q']);

		$res=$this->zone_model->search($cont);
			// echo $res;
			// print_r($res);
		if(!empty($res)){
			
			$this->data['recrds']=$res;
			$this->load->view('header',$this->data);
			$this->load->view('zone/result',$this->data);
			$this->load->view('footer');
		}else{
			$this->data['bf_url']='index.php/zone';
			$this->data['item']='没有搜索到任何内容';
			$this->load->view('header',$this->data);
			$this->load->view('zone/nores',$this->data);
			$this->load->view('footer');
		}
			//search db and print result
		// }
		
	}
	public function manage($zone='',$op='',$recrdID='',$or_data='0'){//dns recorder operation
		if($zone==''){
			header('Location: ');
		}
		$this->data['zonepage']=TRUE;
		$this->data['recrds']=$this->zone_model->listrecrd($zone);
		$this->data['zone']=$zone;
		switch($op){
			case 'add'://add record
				$this->load->helper('form');
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('host','host','required');
				$this->form_validation->set_rules('type','type','required');
				$this->form_validation->set_rules('data','data','required');
				$this->form_validation->set_rules('ttl','ttl','required');
				
				if($this->form_validation->run()===false){//invalidad
					$this->load->view('header',$this->data);
					$this->load->view('records/addrecrd',$this->data);
					$this->load->view('footer');
				}else{//add to db
					if($this->zone_model->addrecord($zone)){//success add
						$this->load->view('header',$this->data);
						$this->data['bf_url']='index.php/zone/manage/'.$zone;
						$this->data['item']='添加记录';
						$this->load->view('zone/success',$this->data);
						$this->load->view('footer');
					}else{//
						$this->load->view('header',$this->data);
						$this->data['bf_url']='index.php/zone/manage/'.$zone;
						$this->data['item']='添加记录';
						$this->load->view('zone/failure',$this->data);
						$this->load->view('footer');
					}
				}
				break;
			case 'del':
				// echo 'del'.$zone;
				if($this->zone_model->delrecord($zone,$recrdID)){//success delete
					$this->load->view('header',$this->data);
					$this->data['bf_url']='index.php/zone/manage/'.$zone;
					$this->data['item']='删除记录';
					$this->load->view('zone/success',$this->data);
					$this->load->view('footer');
				}else{//
					$this->load->view('header',$this->data);
					$this->data['bf_url']='index.php/zone/manage/'.$zone;
					$this->data['item']='删除记录';
					$this->load->view('zone/failure',$this->data);
					$this->load->view('footer');
				}
				break;
			case 'pause':
				if($or_data==1 ){$this->data['item']='暂停记录';}else{ $this->data['item']='启用记录';}
				//exit($or_data.$this->data['item']);
				if($this->zone_model->paurecord($zone,$recrdID,$or_data)){
					$this->load->view('header',$this->data);
					$this->data['bf_url']='index.php/zone/manage/'.$zone;
					
					$this->load->view('zone/success',$this->data);
					$this->load->view('footer');
				}else{
					$this->load->view('header',$this->data);
					$this->data['bf_url']='index.php/zone/manage/'.$zone;
					
					$this->load->view('zone/failure',$this->data);
					$this->load->view('footer');
				}
				
				break;
			case 'edit':
				$this->load->helper('form');
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('host','host','required');
				$this->form_validation->set_rules('type','type','required');
				$this->form_validation->set_rules('data','data','required');
				$this->form_validation->set_rules('ttl','ttl','required');
				
				$info=$this->zone_model->getinfo_by_id($recrdID);
				$this->data['id']=$info[0]['id'];
				// exit;
				if($this->form_validation->run()===false){//invalidad
					
				// print_r($info[0]);
				
					$this->data['info']=$info[0];
					$this->load->view('header',$this->data);
					$this->load->view('records/editrecrd',$this->data);
					$this->load->view('footer');
				}else{//update in db
					$this->data['item']='修改';
					
					
					if($this->zone_model->updaterecord($this->data['id'],$zone)){
						$this->load->view('header',$this->data);
						$this->data['bf_url']='index.php/zone/manage/'.$zone;
						
						$this->load->view('zone/success',$this->data);
						$this->load->view('footer');
					}else{
						$this->load->view('header',$this->data);
						$this->data['bf_url']='index.php/zone/manage/'.$zone;
						
						$this->load->view('zone/failure',$this->data);
						$this->load->view('footer');
					}
				}
				break;
			default:
				$this->load->view('header',$this->data);
				$this->load->view('zone/recrdop',$this->data);
				$this->load->view('footer');
		}
		
		//print_r($recrds);
	}
	public function zone($op='aa'){
		echo "test";
		echo $op;
	}
}

/* End of file zone.php */
/* Location: ./application/controllers/zone.php */
