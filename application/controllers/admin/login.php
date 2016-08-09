<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('captcha');
	}
	public function index()
	{	
		// ci原代的验证码类
		
		// $word = '';
		// $str = 'axcavdbfvscfbngdscvbvgbdvgcndrxv';
		// for($i=0; $i<4; $i++){
		// 	$word .= $str[mt_rand(0,strlen($str)-1)];
		// }
		// $vals = array(
		// 	'word'=>$word,//种子
		// 	'img_path'=>'./captcha/',//设置图片相对路径
		// 	'img_url'=>base_url().'captcha/',//设置图片绝对路径
		// 	'img_width'=>80,
		// 	'img_height'=>25,
		// 	'expiration'=>60//过期时间

		// );


		// //p($vals['img_url']);die;
		// $cap = create_captcha($vals);
		// // $cap = create_captcha($vals);
		//  // p($cap);die;
		//  if(isset($_SESSION)){
		//  	session_start();
		//  }
		//  $_SESSION['code']=$cap['word'];
	 // 	$data['captcha'] = $cap['image'];
		$this->load->view("admin/login.html");
		// 自己扩展的验证码类
		
	}
	/**
	 *
	 * 自己扩展的验证码
	 */
	public function code(){
		$config = array(
			'width'=>80,
			'height'=>30

		);
		$this->load->library('code',$config);
		$this->code->show();
		// $this->load->view("admin/login.html");

	}
	public function login_in(){
		$code = $this->input->post('captcha');
		if(!isset($_SESSION)){
		 	session_start();
		 }
		 // p($_SESSION['code']);die;
		 // if(strtoupper($code) != $_SESSION['code']){
		 // 	error('验证码错误');
		 // }
		 // echo 1;die;
	}
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */