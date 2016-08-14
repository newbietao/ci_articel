<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model{
	public function check($username){
		//$this->db->where(array('username'=>$username))->get('admin')->result_array();
		$data = $this->db->get_where('admin',array('username'=>$username))->result_array();
		return $data;
	}
	public function change($uid,$arr){
		$rusult = $this->db->update('admin', $arr, array('uid'=>$uid));
		return $rusult;
	}
}
