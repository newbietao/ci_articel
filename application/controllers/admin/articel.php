<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articel extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function send_articel()
	{	
		$this->load->helper("form");
		$this->load->view("admin/articel.html");
	}
	public function send()
	{	

		$this->load->library("form_validation");//载入表单验证类。
		$status = $this->form_validation->run("articel");//表单验证返回一个bool值。
		if($status){
			echo "数据库操作";
		}else{
			$this->load->helper("form");
			$this->load->view("admin/articel.html");
		}
	}
	public function edit_articel()
	{
		$this->load->helper("form");
		$this->load->view("admin/edit_articel.html");
	}
	public function edit()
	{
		$this->load->library("form_validation");//载入表单验证类。
		$status = $this->form_validation->run("articel");//表单验证返回一个bool值。
		if($status){
			echo "数据库操作";
		}else{
			$this->load->helper("form");
			$this->load->view("admin/edit_articel.html");
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */