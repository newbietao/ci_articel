<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends CI_Controller{
	public function index(){
		$this->load->model("category_model","cate");
		$data["category"] = $this->cate->check();
		$this->load->view("admin/cate.html",$data);
	}
	public function add_cate()
	{
		// $this->output->enable_profiler(TRUE);
		$this->load->helper("form");
		$this->load->view("admin/add_cate.html");
	}
	public function add()
	{

		$this->load->library("form_validation");//载入表单验证类。
		$status = $this->form_validation->run("cate");//表单验证返回一个bool值。
		if($status){
			$data = array(//创建一个数组，存放$_POST["cname"]
				"cname" => $this->input->post("cname")
			);
			// $this->input->post("cname");
			// $this->input->get("cname");
			// $a = $this->input->server("MIBDIRS");
			// // echo $a;
			// p($_SERVER);die;
			$this->load->model("category_model","cate");
			$bool = $this->cate->add($data);
			if($bool){
				success("admin/category/index","添加成功");
			}
			// error("添加失败");
			// echo "数据库操作";
		}else{
			// error("添加失败");
			$this->load->helper("form");
			$this->load->view("admin/add_cate.html");
		}
	}
	public function edit_cate()
	{
		$cid = $this->uri->segment(4);
		$this->load->model("category_model","cate");
		$data["category"] = $this->cate->check_cate($cid);
		$this->load->view("admin/edit_cate.html",$data);
		// $this->load->library("form_validation");//载入表单验证类。
		// $status = $this->form_validation->run("cate");//表单验证返回一个bool值。
		// if($status){
			
		// }else{
		// 	$this->load->helper("form");
		// 	$this->load->view("admin/edit_cate.html");
		// }
	}
	public function edit_category()
	{
		$this->load->helper("form");
		$this->load->view("admin/edit_cate.html");
	}
}