<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		//mengambil data dari tabel user
		$data['user']=$this->m_data->get_data('tbl_user')->result();
		$data['judul']="testing";
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_user',$data);
		$this->load->view('admin/v_footer');
	}
	function User_Edit ($username){
		$where = array('username' => $username);
		// mengambil data dari database sesuai id
		$data['User'] = $this->m_data->edit_data($where,'User')->result();
		$this->load->view('user/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('user/v_anggota_edit',$data);
		$this->load->view('user/v_footer');
		}
	function anggota_update(){
		$username = $this->input->post('username');
		$level = $this->input->post('level');
		$where = array(
		'username' => $username
		);
		$data = array(
		'username' => $username,
		'level' => $level,
		);
		// update data ke database
		$this->m_data->update_data($where,$data,'User');
		// mengalihkan halaman ke halaman data anggota
		redirect(base_url().'admin/User');
		}
}
