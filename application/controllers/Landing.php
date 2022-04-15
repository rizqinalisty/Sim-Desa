<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

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
		$this->load->view('landing/v_landing');
	}
	public function tampil_ktp()
	{
		$this->load->view('landing/v_ktp');
	}
	public function tampil_kk()
	{
		$this->load->view('landing/v_kk');
	}
	public function tampil_akta()
	{
		$this->load->view('landing/v_akta');
	}
	public function tampil_surat_pindah()
	{
		$this->load->view('landing/v_surat_pindah');
	}
	public function tampil_tambah_pengajuan()
	{
		$this->load->view('landing/v_landing');
	}
	
}