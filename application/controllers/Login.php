<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('admin/v_login');
	}
	function login_aksi(){
$email = $this->input->post('email');
$password = $this->input->post('password');
$this->form_validation->set_rules('email','Email','required');
$this->form_validation->set_rules('password','Password','required');
if($this->form_validation->run() != false){
$where = array(
'email' => $email,
'password' => md5($password)
);
$cek = $this->sim_data->cek_login('tbl_user',$where)->num_rows();
$data = $this->sim_data->cek_login('tbl_user',$where)->row();
if($cek > 0){
$data_session = array(
'id' => $data->id_user,
'email' => $data->email,
'status' => 'admin_login'
);
$this->session->set_userdata($data_session);
redirect(base_url().'Home');
}else{
redirect(base_url().'login?alert=gagal');
}
}else{
$this->load->view('v_login');
}
}
}