<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Category_model extends CI_Model{//继承模型类


	public function add($data)//为数据库增加数据
	{
		$bool = $this->db->insert("category",$data);//插入数据
		return $bool;
	}

	public function check(){//获取数据库数据
		$data_array = $this->db->get("category")->result_array();//返回值是一个数组
		// $data = $this->db->get("category")->result();//返回值是一个对象
		return $data_array;
	}
	public function check_cate($cid){//根据字段获取数据库数据
		//where条件的参数最好是一个数组，这样比较安全，参数对应数据库的字段。
		$data = $this->db->where(array("cid"=>$cid))->get("category")->result_array();
		return $data;
		// p($data);die;
		
	}
	public function update_cate($cid,$cname){
		$result = $this->db->update('category',$cname,array('cid'=>$cid));
		return $result;
	}
	public function del_cate($cid){
		$this->db->where('cid',$cid);
		$result = $this->db->delete('category');
		return $result;
	}
}