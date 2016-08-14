<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mycon extends CI_Controller {

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
		$this->load->model("category_model",'category');
		$data['arr'] = $this->category->limit_check(4);
		// var_dump($data);die;
		$this->load->model("articel_model",'articel');
		$data['arr1'] = $this->articel->check();
		// echo "<pre>";
		//  var_dump($data);
		//  echo "</pre>";die;
		$this->load->view("index/index.html",$data);
	}
	public function category()
	{	
		$this->load->view("index/category.html");
	}
	public function details()
	{	
		$this->load->view("index/details.html");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */