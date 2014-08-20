<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Zone_model extends CI_Model{
	public function __construct(){
		$this->load->database();
		$this->records_table='dns_records';
		$this->user_table="users";
		// $this->zone_table='zones';
	}
	
	public function get_zone_nu(){
		$sql='select count(distinct(zone)) as nu from '.$this->records_table;
		$query=$this->db->query($sql);
		$retarr=$query->result_array();
		
		return $retarr[0]['nu'];
	}
	public function lists($begin=0,$limits=30){//list all the domains
		
		// $sql='select distinct(zone) from '.$this->records_table.' limit '.$startnu.', '.$endnu;
		$down_level=$begin*$limits;
		
		$sql='select distinct(zone) from '.$this->records_table.' order by zone limit '.$down_level.','.$limits;
		// echo $sql;
		// $sql='select * from '.$this->zone_table;
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	public function addZone(){//add zone
		$zone=$this->input->post('name');
		$zond=$zone.'.';
		$rcddata=array(
			'zone'=>$zone,
			'host'=>$zond,
			'type'=>'SOA',
			'data'=>$zone,
			'refresh'=>'3H',
			'retry'=>'3600',
			'expire'=>'604800',
			'serial'=>'0',
			'minimum'=>'86400',
			'resp_person'=>'0',
			'primary_ns'=>'0','refresh'=>'0',
			// 'retry'=>'0',
			// 'expire'=>'0',
			// 'serial'=>'0',
			// 'minimum'=>'0',
			// 'resp_person'=>'0',
			// 'primary_ns'=>'0',
			'c_chg'=>'0',
			'ttl'=>'9600'
		);
		$data=array(
			'name'=>$zone
		);
		// if($this->db->get_where($this->zone_table,array('name'=>$data['name']))->result_array()){//if exists
		if($this->db->get_where($this->records_table,array('zone'=>$data['name']))->result_array()){//if exists
			return FALSE;
		}
		// if($this->db->insert($this->zone_table,$data)){
		return $this->db->insert($this->records_table,$rcddata);
		
	}
	public function delZone($zone){
		// $sql1='delete from '.$this->zone_table.' where name=\''.$zone.'\'';
		$sql2='delete from '.$this->records_table.' where zone=\''.$zone.'\'';
		return $this->db->query($sql2);
	}
	public function listrecrd($zone){//list all the records of this zone
		$query=$this->db->get_where($this->records_table,array('zone'=>$zone));
		return $query->result_array();
	}
	public function addrecord($zone){
		$data=array(
			'zone'=>$zone,
			'host'=>$this->input->post('host'),
			'type'=>$this->input->post('type'),
			'data'=>$this->input->post('data'),
			'ttl'=>$this->input->post('ttl'),
			'mx_priority'=>$this->input->post('mx_priority'),
			'refresh'=>$this->input->post('refresh'),
			'retry'=>$this->input->post('retry'),
			'expire'=>$this->input->post('expire'),
			'minimum'=>$this->input->post('minimum'),
			'serial'=>$this->input->post('serial'),
			'resp_person'=>$this->input->post('resp_person'),
			'primary_ns'=>$this->input->post('primary_ns')
		);
		// if($this->db->get_where($this->records_table,array('host'=>$data['host'],'zone'=>$zone))->result_array()){//if exists
			// return FALSE;
		// }
		return $this->db->insert($this->records_table,$data);
	}
	public function search(){
		// $data=array(
			// 'host'=>$this->input->post('host'),
			// 'zone'=>$this->input->post('zone'),
		// );
		// $host=$this->input->post('host');
		$zone=$this->input->post('zone');
		$data=$this->input->post('data');
		
		$sql='select * from '.$this->records_table.' where  zone like \'%'.$zone.'%\' or data=\''.$data.'\' and data!=\'\'';
		// return $sql;
		$query=$this->db->query($sql);
		//$query=$this->db->get_where($this->records_table,$data);
		return $query->result_array();
	}
	public function updaterecord($id,$zone){
		$data=array(
			'zone'=>$zone,
			'host'=>$this->input->post('host'),
			'type'=>$this->input->post('type'),
			'data'=>$this->input->post('data'),
			'ttl'=>$this->input->post('ttl'),
			'mx_priority'=>$this->input->post('mx_priority'),
			'refresh'=>$this->input->post('refresh'),
			'retry'=>$this->input->post('retry'),
			'expire'=>$this->input->post('expire'),
			'minimum'=>$this->input->post('minimum'),
			'serial'=>$this->input->post('serial'),
			'resp_person'=>$this->input->post('resp_person'),
			'primary_ns'=>$this->input->post('primary_ns')
		);
		$this->db->where('id', $id);
		return $this->db->update($this->records_table,$data);
	}
	public function updatepswd(){
		$odpswd=$this->input->post('odpasswd');
		if($this->verify($odpswd)){
			$passwd=$this->input->post('passwd');
			$repasswd=$this->input->post('repasswd');
			if($passwd===$repasswd){
				//update db
				$pswd=md5($passwd);
				$sql='update '.$this->user_table.' set passwd=\''.$pswd.'\' where id=1';
				return $this->db->query($sql);
			}
			return FALSE;
		}
		return FALSE;
	}
	public function verify($passwd){
		$cpasswd=md5($passwd);
		$sql='select passwd from '.$this->user_table.' where id=1';
		$query=$this->db->query($sql);
		$odpswdarr=$query->result_array();

		$odpswd=$odpswdarr[0]['passwd'];
		// echo $odpswd;
		if($odpswd===$cpasswd){
			return TRUE;
		}
		return FALSE;
	}
	public function delrecord($zone,$recrdID){
		$sql='delete from '.$this->records_table.' where id=\''.$recrdID.'\'';
		return $this->db->query($sql);
	}
	
	public function paurecord($zone,$recrdID,$or_data){
		if($or_data==1){ $setnu=0;}else{$setnu=1;}

		$sql='update '.$this->records_table.' set is_active='.$setnu.' where id=\''.$recrdID.'\'';
		return $this->db->query($sql);
	}
	public function getinfo($zone,$record){
		$sql='select * from '.$this->records_table.' where zone=\''.$zone.'\' and data=\''.$record.'\'';
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	public function getinfo_by_id($id){
		$sql='select * from '.$this->records_table.' where id=\''.$id.'\'';
		$query=$this->db->query($sql);
		return $query->result_array();
	}
}
?>
