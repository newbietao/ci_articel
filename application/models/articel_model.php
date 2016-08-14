<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Articel_model extends CI_Model{
	public function add($data){
		$bool = $this->db->insert('articel',$data);
		return $bool;
	}
	public function update($id,$data){
		$bool = $this->db->update('articel',$data,array('aid'=>$id));
		return $bool;
	}
	public function select(){
		$data = $this->db->select('aid,title,cname,info,time')->from('articel')->join('category','articel.cid=category.cid')->order_by('aid','asc')->get()->result_array();
		return $data;
	}
	public function select_id($aid){
		$arr = array(
			"aid"=>$aid
		);
		$data = $this->db->where($arr)->get('articel')->result_array();
		return $data;
	}
	public function category(){
		$data = $this->db->get('category')->result_array();
		return $data;
	}
	public function del($aid){
		$arr = array(
			'aid'=>$aid
		);
		$data = $this->db->where($arr)->delete('articel');
		// $this->db->delete()
		return $data;
	}
	public function check(){
		$arr1 = array(
			"type"=>0
		);
		$arr2 = array(
			"type"=>1
		);
		$data['arr'] = $this->db->where($arr1)->get('articel')->result_array();
		$data['hot'] = $this->db->where($arr2)->get('articel')->result_array();
		return $data;
	}
}











?>