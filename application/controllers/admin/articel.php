<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articel extends CI_Controller {
// 	function __construct(){
// 		parent::__construct();
// 	}

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
	public function index(){
		$this->load->model('articel_model','articel');
		$data['articel'] = $this->articel->select();
		$this->load->view('admin/articel.html',$data);
	}
	public function send_articel()
	{	
		$this->load->model('articel_model','articel');
		$data['category'] = $this->articel->category();
		$this->load->helper("form");
		$this->load->view("admin/send_articel.html",$data);
		$this->load->library("form_validation");//载入表单验证类。
		$status = $this->form_validation->run("articel");//表单验证返回一个bool值。
	}
	public function send()
	{	

		$this->load->library("form_validation");//载入表单验证类。
		$status = $this->form_validation->run("articel");//表单验证返回一个bool值。
		if($status){
			$data = array(
				'aid'=>"",
				'title'=>$this->input->post('title'),
				'content'=>$this->input->post('contains'),
				'time'=>date('Y')."-".date('m')."-".date('d'),
				'thumb'=>"",
				'type'=>$this->input->post('type'),
				'info'=>$this->input->post('info'),
				'cid'=>$this->input->post('cid'),

			);
			$this->load->model('articel_model','articel');
			$bool = $this->articel->add($data);
			if($bool){
				// echo 123456;
				// die;
				 success("admin/articel/index","发布成功");
			}

		}else{
			$this->load->model('articel_model','articel');
			$data['category'] = $this->articel->category();
			$this->load->helper("form");
			$this->load->view("admin/send_articel.html",$data);
		}
	}
	public function edit_articel()
	{
		$aid = $this->uri->segment(4);
		// echo $aid;die;
		$this->load->model('articel_model','articel');
		$this->load->model('category_model','category');
		$data['content'] = $this->articel->select_id($aid);
		$data['content'] = $this->articel->select_id($aid);
		// p($data);die();
		$this->load->helper("form");
		$this->load->view("admin/edit_articel.html",$data);
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
	public function del_articel(){
		$aid = $this->uri->segment(4);
		$this->load->model('articel_model','articel');
		$bool = $this->articel->del($aid);
		if($bool){
			 success("admin/articel/index","删除成功");
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */