<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('m_data');

		if ($this->session->userdata('status') != "telah_login") {
			redirect(base_url() . 'auth?alert=belum_login');
		}

		if ($this->session->userdata('role') != "admin") {
			redirect(base_url() . 'warga');
		}
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('auth?alert=logout');
	}

	public function index()
	{
		$data['jumlah_kartukeluarga'] = $this->m_data->get_data('kk')->num_rows();
		$data['jumlah_warga'] = $this->m_data->get_data('warga')->num_rows();
		$data['akun_terdaftar'] = $this->db->query("SELECT * FROM user WHERE role = 'warga'")->num_rows();
		// $data['tidak_terdaftar'] = $this->db->query("SELECT * FROM warga WHERE id_user IS NULL OR id_user = ''")->num_rows();
		$data['jumlah_kegiatan'] = $this->m_data->get_data('kegiatan')->num_rows();

		$this->load->view('layout/header');
		$this->load->view('admin/index', $data);
		$this->load->view('layout/footer');
	}

	// kartu keluarga
	public function kartukeluarga()
	{

		$data['kartukeluarga'] = $this->m_data->get_data('kk')->result();

		$this->load->view('layout/header');
		$this->load->view('admin/kartukeluarga/index', $data);
		$this->load->view('layout/footer');
	}

	public function kartukeluarga_tambah()
	{
		$this->load->view('layout/header');
		$this->load->view('admin/kartukeluarga/tambah');
		$this->load->view('layout/footer');
	}

	public function kartukeluarga_store()
	{

		$this->form_validation->set_rules('nomor_kk', 'Nomor KK', 'required|numeric|exact_length[16]');

		if ($this->form_validation->run() == TRUE) {

			$kk = $this->input->post('nomor_kk');
			$tanggal_masuk = date('Y-m-d');

			$data = array(
				'nomor_kk' => $kk,
				'tanggal_masuk' => $tanggal_masuk
			);

			$this->m_data->insert_data($data, 'kk');

			$this->session->set_flashdata('success', 'Data Kartu Keluarga berhasil ditambahkan!');
		} else {
			$this->session->set_flashdata('error', validation_errors());
		}

		redirect(base_url('admin/kartukeluarga'));
	}

	public function kartukeluarga_edit($id)
	{
		$where = array(
			'nomor_kk' => $id
		);
		$data['kartukeluarga'] = $this->m_data->edit_data($where, 'kk')->result();
		$this->load->view('layout/header');
		$this->load->view('admin/kartukeluarga/edit', $data);
		$this->load->view('layout/footer');
	}

	public function kartukeluarga_update()
	{
		$this->form_validation->set_rules('nomor_kk', 'Nomor KK', 'required');

		if ($this->form_validation->run() != false) {

			$id = $this->input->post('id');
			$nomor_kk = $this->input->post('nomor_kk');
			$tanggal_masuk = $this->input->post('tanggal_masuk');

			$where = array(
				'nomor_kk' => $id
			);

			$data = array(
				'nomor_kk' => $nomor_kk,
				'tanggal_masuk' => $tanggal_masuk
			);

			$this->m_data->update_data($where, $data, 'kk');

			redirect(base_url() . 'admin/kartukeluarga');
		} else {

			$id = $this->input->post('id');
			$where = array(
				'nomor_kk' => $id
			);
			$data['kartukeluarga'] = $this->m_data->edit_data($where, 'kk')->result();
			$this->load->view('layout/header');
			$this->load->view('admin/kartukeluarga/edit', $data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function kartukeluarga_destroy($id)
	{
		$where = array(
			'nomor_kk' => $id
		);

		$this->m_data->delete_data($where, 'kk');

		redirect(base_url() . 'admin/kartukeluarga');
	}
	// end kartu keluarga

	// warga
	public function warga()
	{
		$data['warga'] = $this->m_data->get_data('warga')->result();

		$this->load->view('layout/header');
		$this->load->view('admin/warga/index', $data);
		$this->load->view('layout/footer');
	}

	public function warga_tambah()
	{

		$data['kartukeluarga'] = $this->m_data->get_data('kk')->result();

		$this->load->view('layout/header');
		$this->load->view('admin/warga/tambah', $data);
		$this->load->view('layout/footer');
	}

	public function warga_store()
	{
		// Aturan validasi form
		$this->form_validation->set_rules('nik', 'NIK', 'required|numeric|min_length[16]|max_length[16]|is_unique[warga.nik]');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|in_list[L,P]');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[5]');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('nomor_kk', 'Nomor KK', 'required|numeric|min_length[16]|max_length[16]');

		// Jalankan validasi
		if ($this->form_validation->run() == TRUE) {
			// Ambil data dari form
			$data = array(
				'nik' => $this->input->post('nik', TRUE),
				'nama' => $this->input->post('nama', TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'pekerjaan' => $this->input->post('pekerjaan', TRUE),
				'pendidikan' => $this->input->post('pendidikan', TRUE),
				'agama' => $this->input->post('agama', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'status' => $this->input->post('status', TRUE),
				'nomor_kk' => $this->input->post('nomor_kk', TRUE),
			);

			// Simpan data ke database
			$this->m_data->insert_data($data, 'warga');

			// Set pesan sukses
			$this->session->set_flashdata('success', 'Data warga berhasil ditambahkan!');
			redirect(base_url('admin/warga'));
		} else {
			// Jika validasi gagal, tampilkan form kembali dengan pesan error
			$data['kartukeluarga'] = $this->m_data->get_data('kk')->result();

			$this->load->view('layout/header');
			$this->load->view('admin/warga/tambah', $data);
			$this->load->view('layout/footer');
		}
	}

	public function warga_edit($id)
	{
		$where = array(
			'nik' => $id
		);
		$data['warga'] = $this->m_data->edit_data($where, 'warga')->result();
		$data['kartukeluarga'] = $this->m_data->get_data('kk')->result();
		$this->load->view('layout/header');
		$this->load->view('admin/warga/edit', $data);
		$this->load->view('layout/footer');
	}
	public function warga_update()
	{
		// Aturan validasi form
		$this->form_validation->set_rules('nik', 'NIK', 'required|numeric|min_length[16]|max_length[16]');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|in_list[L,P]');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[5]');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('nomor_kk', 'Nomor KK', 'required|numeric|min_length[16]|max_length[16]');

		if ($this->form_validation->run() == TRUE) {
			// Ambil data dari form
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'pendidikan' => $this->input->post('pendidikan'),
				'agama' => $this->input->post('agama'),
				'alamat' => $this->input->post('alamat'),
				'status' => $this->input->post('status'),
				'nomor_kk' => $this->input->post('nomor_kk'),
			);
			// Ambil ID dari form
			$id = $this->input->post('nik');
			// Buat array untuk kondisi WHERE
			$where = array(
				'nik' => $id
			);
			// Update data di database
			$this->m_data->update_data($where, $data, 'warga');
			// Set pesan sukses
			$this->session->set_flashdata('success', 'Data warga berhasil diperbarui!');
			redirect(base_url('admin/warga'));
		} else {
			// Jika validasi gagal, tampilkan form kembali dengan pesan error
			$where = array(
				'nik' => $this->input->post('nik')
			);
			$data['warga'] = $this->m_data->edit_data($where, 'warga')->result();
			$data['kartukeluarga'] = $this->m_data->get_data('kk')->result();
			$this->load->view('layout/header');
			$this->load->view('admin/warga/edit', $data);
			$this->load->view('layout/footer');
		}
	}

	public function warga_show($id)
	{
		$where = array(
			'nik' => $id
		);
		$data['warga'] = $this->m_data->edit_data($where, 'warga')->result();
		$this->load->view('layout/header');
		$this->load->view('admin/warga/show', $data);
		$this->load->view('layout/footer');
	}

	public function warga_destroy($id)
	{
		$where = array(
			'nik' => $id
		);

		$this->m_data->delete_data($where, 'warga');
		$this->session->set_flashdata('success', 'Data warga berhasil dihapus!');
		redirect(base_url() . 'admin/warga');
	}

	// end Warga

	// manage user
	public function user()
	{
		// $data['users'] = $this->db->query("SELECT * FROM user WHERE role = 'warga'")->result();
		// $data['users'] = $this->m_data->get_data('user')->result();
		$data['users'] = $this->db->query("SELECT w.nama AS nama_lengkap, u.username, u.nik, u.role, u.id_user FROM user u JOIN warga w ON u.nik = w.nik
")->result();
		$this->load->view('layout/header');
		$this->load->view('admin/user/index', $data);
		$this->load->view('layout/footer');
	}
	public function user_tambah()
	{

		$data['warga'] = $this->m_data->get_data('warga')->result();

		$this->load->view('layout/header');
		$this->load->view('admin/user/tambah', $data);
		$this->load->view('layout/footer');
	}
	public function user_store()
	{

		// $this->form_validation->set_rules('id_user', 'ID User', 'required|numeric|min_length[16]|max_length[16]');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('nik', 'NIK', 'required|numeric|min_length[16]|max_length[16]');
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nik = $this->input->post('nik');
			$role = $this->input->post('role');

			$data = array(
				'username' => $username,
				'password' => md5($password),
				'role' => $role,
				'nik' => $nik,
				'status' => 1,
				// 'id_user' => $nik
			);

			$this->m_data->insert_data($data, 'user');

			redirect(base_url() . 'admin/user');
		} else {
			redirect(base_url() . 'admin/user_tambah');
		}
	}

	public function user_edit($id)
	{
		$where = array(
			'id_user' => $id
		);
		$data['user'] = $this->m_data->edit_data($where, 'user')->result();
		$this->load->view('layout/header');
		$this->load->view('admin/user/edit', $data);
		$this->load->view('layout/footer');
	}
	public function user_update()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('id_user');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$role = $this->input->post('level');

			if ($password != '') {
				$data = array(
					'username' => $username,
					'password' => md5($password),
					'role' => $role
				);
			} else {
				$data = array(
					'username' => $username,
					'role' => $role
				);
			}

			$where = array(
				'id_user' => $id
			);

			$this->m_data->update_data($where, $data, 'user');

			redirect(base_url() . 'admin/user');
		} else {
			redirect(base_url() . 'admin/user_edit/' . $id);
		}
	}
	public function user_destroy($id)
	{
		$where = array(
			'id_user' => $id
		);

		$this->m_data->delete_data($where, 'user');

		redirect(base_url() . 'admin/user');
	}
	// End manage user

	// public function website()
	// {
	// 	$data['website'] = $this->m_data->get_data('website', ['id' => 1])->row();
	// 	$this->load->view('layout/header');
	// 	$this->load->view('admin/website/index', $data);
	// 	$this->load->view('layout/footer');
	// }
	// public function website_update()
	// {
	// 	$id = $this->input->post('id');
	// 	$data = [
	// 		'title' => $this->input->post('title'),
	// 		'nama' => $this->input->post('nama'),
	// 		'deskripsi' => $this->input->post('deskripsi')
	// 	];

	// 	$this->m_data->update_data('website', $data, ['id' => $id]);

	// 	echo json_encode(['status' => 'success']);
	// }



























	// Kegiatan
	public function kegiatan()
	{
		$data['kegiatan'] = $this->m_data->get_data('kegiatan')->result();
		$this->load->view('layout/header');
		$this->load->view('admin/kegiatan/index', $data);
		$this->load->view('layout/footer');
	}

	public function kegiatan_tambah()
	{
		
		$this->load->view('layout/header');
		$this->load->view('admin/kegiatan/tambah');
		$this->load->view('layout/footer');
	}
	public function kegiatan_store()
	{
		// Set form validation rules
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('tanggal_kegiatan', 'Tanggal Kegiatan', 'required');
		$this->form_validation->set_rules('waktu_kegiatan', 'Waktu Kegiatan', 'required');
		$this->form_validation->set_rules('tempat_kegiatan', 'Tempat Kegiatan', 'required|min_length[5]');
		$this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'required|min_length[5]');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nama_kegiatan' => $this->input->post('nama_kegiatan', TRUE),
				'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan', TRUE),
				'waktu_kegiatan' => $this->input->post('waktu_kegiatan', TRUE),
				'tempat_kegiatan' => $this->input->post('tempat_kegiatan', TRUE),
				'deskripsi_kegiatan' => $this->input->post('deskripsi_kegiatan', TRUE)
			);

			$this->m_data->insert_data($data, 'kegiatan');
			$this->session->set_flashdata('success', 'Data kegiatan berhasil ditambahkan!');
			redirect(base_url('admin/kegiatan'));
		} else {
			$this->load->view('layout/header');
			$this->load->view('admin/kegiatan/tambah');
			$this->load->view('layout/footer');
		}
	}

	
	// end kegiatan
}
