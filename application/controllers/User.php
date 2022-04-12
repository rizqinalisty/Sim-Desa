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
	//menyimpan user baru
	function user_tambah() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
 
		$data=array(
		'username'=>$email,
		'password'=>md5($password),
		'level'=>$level
		);

		
	//insert data ke database
	$this->m_data->insert_data($data,'tbl_user');
	//mengalihkan halaman ke halaman data user
	redirect(base_url().'user');
	}
	function tambah_user(){
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_user_tambah');
		$this->load->view('admin/v_footer');
	}
	function user_hapus(){
		//mendapatkan parameter dari tombol klik
		$id_user= $this->uri->segment(3);
		//echo $id_user;
		$where = array(   
		'id_user' => $id_user
		);   
		// menghapus data petugas dari database sesuai id
		$this->m_data->delete_data($where,'tbl_user');   
		// mengalihkan halaman ke halaman data petugas  
		redirect(base_url().'user'); 
		} 
	
	}	 

