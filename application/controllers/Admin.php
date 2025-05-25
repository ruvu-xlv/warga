<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    /**
     * Constructor - Loads required models and checks authentication
     */
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

    /* ==================== DASHBOARD METHODS ==================== */

    /**
     * Display admin dashboard with statistics
     */
    public function index()
    {
        $data['jumlah_kartukeluarga'] = $this->m_data->get_data('kk')->num_rows();
        $data['jumlah_warga'] = $this->m_data->get_data('warga')->num_rows();
        $data['akun_terdaftar'] = $this->db->query("SELECT * FROM user WHERE role = 'warga'")->num_rows();
        $data['jumlah_kegiatan'] = $this->m_data->get_data('kegiatan')->num_rows();

        $this->load->view('layout/header');
        $this->load->view('admin/index', $data);
        $this->load->view('layout/footer');
    }

    /**
     * Logout user and destroy session
     */
    public function keluar()
    {
        $this->session->sess_destroy();
        redirect('auth?alert=logout');
    }

    /* ==================== KARTU KELUARGA METHODS ==================== */

    /**
     * Display list of family cards (KK)
     */
    public function kartukeluarga()
    {
        $data['kartukeluarga'] = $this->m_data->get_data('kk')->result();
        $this->load->view('layout/header');
        $this->load->view('admin/kartukeluarga/index', $data);
        $this->load->view('layout/footer');
    }

    /**
     * Show form to add new family card
     */
    public function kartukeluarga_tambah()
    {
        $this->load->view('layout/header');
        $this->load->view('admin/kartukeluarga/tambah');
        $this->load->view('layout/footer');
    }

    /**
     * Store new family card data
     */
    public function kartukeluarga_store()
    {
        $this->form_validation->set_rules('nomor_kk', 'Nomor KK', 'required|numeric|exact_length[16]');

        if ($this->form_validation->run() == true) {
            $kk = $this->input->post('nomor_kk');
            $tanggal_masuk = date('Y-m-d');

            $data = [
                'nomor_kk' => $kk,
                'tanggal_masuk' => $tanggal_masuk
            ];

            $this->m_data->insert_data($data, 'kk');
            $this->session->set_flashdata('success', 'Data Kartu Keluarga berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }

        redirect(base_url('admin/kartukeluarga'));
    }

    /**
     * Show form to edit family card
     * 
     * @param string $id Family card number
     */
    public function kartukeluarga_edit($id)
    {
        $where = ['nomor_kk' => $id];
        $data['kartukeluarga'] = $this->m_data->edit_data($where, 'kk')->result();
        
        $this->load->view('layout/header');
        $this->load->view('admin/kartukeluarga/edit', $data);
        $this->load->view('layout/footer');
    }

    /**
     * Update family card data
     */
    public function kartukeluarga_update()
    {
        $this->form_validation->set_rules('nomor_kk', 'Nomor KK', 'required');

        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $nomor_kk = $this->input->post('nomor_kk');
            $tanggal_masuk = $this->input->post('tanggal_masuk');

            $where = ['nomor_kk' => $id];
            $data = [
                'nomor_kk' => $nomor_kk,
                'tanggal_masuk' => $tanggal_masuk
            ];

            $this->m_data->update_data($where, $data, 'kk');
            $this->session->set_flashdata('success', 'Data Kartu Keluarga berhasil diperbarui!');
            redirect(base_url('admin/kartukeluarga'));
        } else {
            $id = $this->input->post('id');
            $where = ['nomor_kk' => $id];
            $data['kartukeluarga'] = $this->m_data->edit_data($where, 'kk')->result();
            
            $this->load->view('layout/header');
            $this->load->view('admin/kartukeluarga/edit', $data);
            $this->load->view('layout/footer');
        }
    }

    /**
     * Delete family card
     * 
     * @param string $id Family card number
     */
    public function kartukeluarga_destroy($id)
    {
        $where = ['nomor_kk' => $id];
        $this->m_data->delete_data($where, 'kk');
        $this->session->set_flashdata('success', 'Data Kartu Keluarga berhasil dihapus!');
        redirect(base_url('admin/kartukeluarga'));
    }

    /* ==================== WARGA (RESIDENT) METHODS ==================== */

    /**
     * Display list of residents
     */
    public function warga()
    {
        $data['warga'] = $this->m_data->get_data('warga')->result();
        $this->load->view('layout/header');
        $this->load->view('admin/warga/index', $data);
        $this->load->view('layout/footer');
    }

    /**
     * Show form to add new resident
     */
    public function warga_tambah()
    {
        $data['kartukeluarga'] = $this->m_data->get_data('kk')->result();
        $this->load->view('layout/header');
        $this->load->view('admin/warga/tambah', $data);
        $this->load->view('layout/footer');
    }

    /**
     * Store new resident data
     */
    public function warga_store()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]|is_unique[warga.nik]');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|in_list[L,P]');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[5]');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('nomor_kk', 'Nomor KK', 'required|numeric|exact_length[16]');

        if ($this->form_validation->run() == true) {
            $data = [
                'nik' => $this->input->post('nik', true),
                'nama' => $this->input->post('nama', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'pekerjaan' => $this->input->post('pekerjaan', true),
                'pendidikan' => $this->input->post('pendidikan', true),
                'agama' => $this->input->post('agama', true),
                'alamat' => $this->input->post('alamat', true),
                'status' => $this->input->post('status', true),
                'nomor_kk' => $this->input->post('nomor_kk', true),
            ];

            $this->m_data->insert_data($data, 'warga');
            $this->session->set_flashdata('success', 'Data warga berhasil ditambahkan!');
            redirect(base_url('admin/warga'));
        } else {
            $data['kartukeluarga'] = $this->m_data->get_data('kk')->result();
            $this->load->view('layout/header');
            $this->load->view('admin/warga/tambah', $data);
            $this->load->view('layout/footer');
        }
    }

    /**
     * Show form to edit resident
     * 
     * @param string $id Resident NIK
     */
    public function warga_edit($id)
    {
        $where = ['nik' => $id];
        $data['warga'] = $this->m_data->edit_data($where, 'warga')->result();
        $data['kartukeluarga'] = $this->m_data->get_data('kk')->result();
        
        $this->load->view('layout/header');
        $this->load->view('admin/warga/edit', $data);
        $this->load->view('layout/footer');
    }

    /**
     * Update resident data
     */
    public function warga_update()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|in_list[L,P]');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[5]');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('nomor_kk', 'Nomor KK', 'required|numeric|exact_length[16]');

        if ($this->form_validation->run() == true) {
            $data = [
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
            ];

            $where = ['nik' => $this->input->post('nik')];
            $this->m_data->update_data($where, $data, 'warga');
            $this->session->set_flashdata('success', 'Data warga berhasil diperbarui!');
            redirect(base_url('admin/warga'));
        } else {
            $where = ['nik' => $this->input->post('nik')];
            $data['warga'] = $this->m_data->edit_data($where, 'warga')->result();
            $data['kartukeluarga'] = $this->m_data->get_data('kk')->result();
            
            $this->load->view('layout/header');
            $this->load->view('admin/warga/edit', $data);
            $this->load->view('layout/footer');
        }
    }

    /**
     * Show resident details
     * 
     * @param string $id Resident NIK
     */
    public function warga_show($id)
    {
        $where = ['nik' => $id];
        $data['warga'] = $this->m_data->edit_data($where, 'warga')->result();
        
        $this->load->view('layout/header');
        $this->load->view('admin/warga/show', $data);
        $this->load->view('layout/footer');
    }

    /**
     * Delete resident
     * 
     * @param string $id Resident NIK
     */
    public function warga_destroy($id)
    {
        $where = ['nik' => $id];
        $this->m_data->delete_data($where, 'warga');
        $this->session->set_flashdata('success', 'Data warga berhasil dihapus!');
        redirect(base_url('admin/warga'));
    }

	// User 
    public function user()
    {
        $data['users'] = $this->db->query("
            SELECT w.nama AS nama_lengkap, u.username, u.nik, u.role, u.id_user 
            FROM user u 
            JOIN warga w ON u.nik = w.nik
        ")->result();
        
        $this->load->view('layout/header');
        $this->load->view('admin/user/index', $data);
        $this->load->view('layout/footer');
    }

    /**
     * Show form to add new user
     */
    public function user_tambah()
    {
        $data['warga'] = $this->m_data->get_data('warga')->result();
        $this->load->view('layout/header');
        $this->load->view('admin/user/tambah', $data);
        $this->load->view('layout/footer');
    }

    public function user_store()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == true) {
            $data = [
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role' => $this->input->post('role'),
                'nik' => $this->input->post('nik'),
                'status' => 1
            ];

            $this->m_data->insert_data($data, 'user');
            $this->session->set_flashdata('success', 'Data user berhasil ditambahkan!');
            redirect(base_url('admin/user'));
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('admin/user_tambah'));
        }
    }

    public function user_edit($id)
    {
        $where = ['id_user' => $id];
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

        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id_user');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $role = $this->input->post('role');

            $data = ['username' => $username, 'role' => $role];
            if ($password != '') {
                $data['password'] = md5($password);
            }

            $where = ['id_user' => $id];
            $this->m_data->update_data($where, $data, 'user');
            $this->session->set_flashdata('success', 'Data user berhasil diperbarui!');
            redirect(base_url('admin/user'));
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('admin/user_edit/' . $this->input->post('id_user')));
        }
    }

    /**
     * Delete user
     * 
     * @param int $id User ID
     */
    public function user_destroy($id)
    {
        $where = ['id_user' => $id];
        $this->m_data->delete_data($where, 'user');
        $this->session->set_flashdata('success', 'Data user berhasil dihapus!');
        redirect(base_url('admin/user'));
    }

	// end User
    
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
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('tanggal_kegiatan', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('waktu_kegiatan', 'Waktu Kegiatan', 'required');
        $this->form_validation->set_rules('tempat_kegiatan', 'Tempat Kegiatan', 'required|min_length[5]');
        $this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'required|min_length[5]');

        if ($this->form_validation->run() == true) {
            $data = [
                'nama_kegiatan' => $this->input->post('nama_kegiatan', true),
                'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan', true),
                'waktu_kegiatan' => $this->input->post('waktu_kegiatan', true),
                'tempat_kegiatan' => $this->input->post('tempat_kegiatan', true),
                'deskripsi_kegiatan' => $this->input->post('deskripsi_kegiatan', true)
            ];

            $this->m_data->insert_data($data, 'kegiatan');
            $this->session->set_flashdata('success', 'Data kegiatan berhasil ditambahkan!');
            redirect(base_url('admin/kegiatan'));
        } else {
            $this->session->set_flashdata('error', validation_errors());
            $this->load->view('layout/header');
            $this->load->view('admin/kegiatan/tambah');
            $this->load->view('layout/footer');
        }
    }

    public function kegiatan_edit($id)
    {
        $where = ['id_kegiatan' => $id];
        $data['kegiatan'] = $this->m_data->edit_data($where, 'kegiatan')->result();

        $this->load->view('layout/header');
        $this->load->view('admin/kegiatan/edit', $data);
        $this->load->view('layout/footer');
    }

    public function kegiatan_update()
    {
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('tanggal_kegiatan', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('waktu_kegiatan', 'Waktu Kegiatan', 'required');
        $this->form_validation->set_rules('tempat_kegiatan', 'Tempat Kegiatan', 'required|min_length[5]');
        $this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'required|min_length[5]');

        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id_kegiatan');
            $data = [
                'nama_kegiatan' => $this->input->post('nama_kegiatan', true),
                'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan', true),
                'waktu_kegiatan' => $this->input->post('waktu_kegiatan', true),
                'tempat_kegiatan' => $this->input->post('tempat_kegiatan', true),
                'deskripsi_kegiatan' => $this->input->post('deskripsi_kegiatan', true)
            ];

            $where = ['id_kegiatan' => $id];
            $this->m_data->update_data($where, $data, 'kegiatan');
            $this->session->set_flashdata('success', 'Data kegiatan berhasil diperbarui!');
            redirect(base_url('admin/kegiatan'));
        } else {
            $id = $this->input->post('id_kegiatan');
            $where = ['id_kegiatan' => $id];
            $data['kegiatan'] = $this->m_data->edit_data($where, 'kegiatan')->result();

            $this->session->set_flashdata('error', validation_errors());
            $this->load->view('layout/header');
            $this->load->view('admin/kegiatan/edit', $data);
            $this->load->view('layout/footer');
        }
    }
}