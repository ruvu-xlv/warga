<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['kartukeluarga'] = $this->m_data->get_data('kk')->num_rows();
		$data['warga'] = $this->m_data->get_data('warga')->num_rows();
		$data['users'] = $this->db->query("SELECT w.nama AS nama_lengkap, u.username, u.nik, u.role, u.id_user FROM user u JOIN warga w ON u.nik = w.nik
")->num_rows();
		// $data['website'] = $this->m_data->get_data('website')->result();
		$data['website'] = $this->m_data->get_data('website', ['id' => 1])->row();
		$this->load->view('header', $data);
		$this->load->view('index', $data);
		$this->load->view('footer');
	}
}
