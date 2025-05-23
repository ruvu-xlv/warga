<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$this->load->view('auth'); // tampilan form login
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() != false) {

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$hashed_password = md5($password); // Disarankan ganti pakai password_hash di proyek nyata

			$where = array(
				'username' => $username,
				'password' => $hashed_password,
				'status' => 1
			);

			$this->load->model('m_data');
			$cek = $this->m_data->cek_login('user', $where);

			if ($cek->num_rows() > 0) {
				$data = $cek->row();

				$data_session = array(
					'id_user'  => $data->user_id,
					'username' => $data->username,
					'role'     => $data->role,
					'status'   => 'telah_login'
				);

				$this->session->set_userdata($data_session);

				// Role-based redirect
				if ($data->role == 'admin') {
					redirect(base_url('admin'));
				} else if ($data->role == 'warga') {
					redirect(base_url('warga'));
				} else {
					redirect(base_url('auth?alert=role_invalid'));
				}
			} else {
				redirect(base_url('auth?alert=gagal'));
			}
		} else {
			$this->load->view('auth');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]|is_unique[user.nik]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth');
			return;
		}

		// Input Data
		$post = $this->input->post();
		$username = $post['username'];
		$password = md5($post['password']);
		$nik = $post['nik'];

		// Cek NIK di table warga
		$check_nik = $this->db->get_where('warga', ['nik' => $nik])->row();
		if (!$check_nik) {
			$this->session->set_flashdata('error', 'NIK tidak terdaftar sebagai warga');
			redirect('auth/register');
			return;
		}

		$data = [
			'username' => $username,
			'password' => $password,
			'nik' => $nik,
			'role' => 'warga',
			'status' => 1,
		];

		$this->db->insert('user', $data);

		// Dapatkan ID user yang baru saja diinsert
		$id_user = $this->db->insert_id();

		// Update tabel warga dengan id_user yang baru
		$this->db->where('nik', $nik);
		$this->db->update('warga', ['id_user' => $id_user]);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login');
			redirect('auth/login');
		} else {
			$error = $this->db->error();
			$this->session->set_flashdata('error', 'Gagal registrasi: ' . $error['message']);
			redirect('auth/register');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}
}
