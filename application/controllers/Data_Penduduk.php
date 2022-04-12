<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Penduduk extends CI_Controller {

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
		//mengambil data dari tabel penduduk
		$data['penduduk']=$this->m_data->get_data('tbl_penduduk1')->result();
		$data['judul']="penduduk";
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_data_penduduk',$data);
		$this->load->view('admin/v_footer');
	}
	//menyimpan penduduk baru
	function penduduk_tambah() {
		$nama = $this->input->post('nama');
		$ttl = $this->input->post('ttl');
		$alamat = $this->input->post('alamat');
 
		$data=array(
		'nama'=>$nama,
		'ttl'=>$ttl,
		'alamat'=>$alamat
		);

	function tambah_penduduk(){
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_penduduk_tambah');
		$this->load->view('admin/v_footer');
	}
	function penduduk_hapus(){
		//mendapatkan parameter dari tombol klik
		$nik= $this->uri->segment(3);
		//echo $id_user;
		$where = array(   
		'nik' => $nik
		);   
		// menghapus data petugas dari database sesuai id
		$this->m_data->delete_data($where,'tbl_penduduk1');   
		// mengalihkan halaman ke halaman data petugas  
		redirect(base_url().'Data_Penduduk'); 
		} 
		function penduduk_edit(){ 
		$nik=$this->uri->segment(3);
		$where = array('nik' => $nik);
		// mengambil data dari database sesuai id
		$data['nik'] = $this->m_data->edit_data($where,'tbl_penduduk1')->row();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_penduduk_edit',$data);  
		$this->load->view('admin/v_footer');
		}
		function user_simpan_edit(){ 
		$nik = $this->input->post('ids');
		$username = $this->input->post('email');
		$password = $this->input->post('password'); 
		$level= $this->input->post('level');   
		$where = array('id_user'=>$id);		
		// cek apakah form password di isi atau tidak  
		if($ttl==""){  
		$data = array(    
		'nama' => $nama,
		'alamat'=>$alamat
		);  
		// update data ke database 
		$this->m_data->update_data($where,$data,'tbl_penduduk1'); 
		}else{   
		$data = array(   
		'nama' => $nama, 
		'ttl' => $ttl,
		'alamat'=> $alamat
		);
		
		// update data ke database
		$this->m_data->update_data($where,$data,'tbl_penduduk1'); 
		}  
		// mengalihkan halaman ke halaman data petugas 
		redirect(base_url().'Data_Penduduk'); 
		}  
		function logout(){ 
		$this->session->sess_destroy();
		redirect(base_url().'landing');
		} 
}

}