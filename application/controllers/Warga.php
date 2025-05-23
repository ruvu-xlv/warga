<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_data');

        if ($this->session->userdata('status') != "telah_login") {
            redirect(base_url() . '?alert=belum_login');
        }
    }

    public function keluar()
    {
        $this->session->sess_destroy();
        redirect('?alert=logout');
    }

    public function index()
    {

        $data['kartukeluarga'] = $this->m_data->get_data('kk')->num_rows();
		$data['warga'] = $this->m_data->get_data('warga')->num_rows();
		$data['users'] = $this->db->query("SELECT w.nama AS nama_lengkap, u.username, u.nik, u.role, u.id_user FROM user u JOIN warga w ON u.nik = w.nik
")->num_rows();
		// $data['website'] = $this->m_data->get_data('website')->result();
		$data['website'] = $this->m_data->get_data('website', ['id' => 1])->row();

        $this->load->view('warga/header', $data);
        $this->load->view('warga/index', $data);
        $this->load->view('warga/footer');
    }
}
