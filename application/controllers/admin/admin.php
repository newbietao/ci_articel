<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

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
	public function index()
	{	

		$this->load->view("admin/index.html");
	}
	public function copy()
	{	

		$this->load->view("admin/copy.html");
	}
	public function change(){
		$this->load->view('admin/change_passwd.html');
	}
	public function do_change(){
		$passwd = $this->input->post('passwd');
		$username = $this->session->userdata('username');
		$this->load->model('admin_model','admin');
		$data = $this->admin->check($username);
		if($data[0]['passwd'] != $passwd) error("原始密码错误");
		$passwdf = $this->input->post('passwdf');
		$passwds = $this->input->post('passwds');
		if($passwds != $passwdf) error("两次密码不一样");
		$uid = $this->session->userdata('uid');
		$data = array(
			'passwd'=>$passwdf
		);
		$bool = $this->admin->change($uid,$data);
		// var_dump($bool);die;
		success('admin/admin/copy','修改成功');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */