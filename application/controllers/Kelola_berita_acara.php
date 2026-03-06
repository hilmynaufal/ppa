<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Kelola_berita_acara extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Model_berita_acara');
		$this->load->model('Model_pendaftaran');
		$this->load->library('form_validation');
		$this->load->library('datatables');
	}

	public function index()
	{
		$this->template->load('template', 'kelola_berita_acara/tbl_ppa_berita_acara_list');
	}

	public function json()
	{
		header('Content-Type: application/json');
		echo $this->Model_berita_acara->json();
	}

	public function read($id)
	{
		$row = $this->Model_berita_acara->get_by_id($id);
		if ($row) {
			$data = array(
				'berita_acara_id' => $row->berita_acara_id,
				'berita_acara_status' => $row->berita_acara_status,
				'berita_acara_dihentikan' => $row->berita_acara_dihentikan,
				'berita_acara_kode' => $row->berita_acara_kode,
				'berita_acara_keterangan' => $row->berita_acara_keterangan,
				'berita_acara_tgl' => $row->berita_acara_tgl,
				'berita_acara_hari' => $row->berita_acara_hari,
				'berita_acara_kronologi' => $row->berita_acara_kronologi,
				'berita_acara_harapan' => $row->berita_acara_harapan,

				'berita_acara_penerima_laporan' => $row->berita_acara_penerima_laporan,
				'berita_acara_kepala_uptd' => $row->berita_acara_kepala_uptd,
				'pelapor_nama' => $row->pelapor_nama,
				'pelapor_tgl' => $row->pelapor_tgl,
				'pelapor_tempat' => $row->pelapor_tempat,
				'pelapor_idusers' => $row->pelapor_idusers,
				'pelapor_nik' => $row->pelapor_nik,
				'pelapor_pekerjaan' => $row->pelapor_pekerjaan,
				'pelapor_kab' => $this->get_region_name('reg_regencies', $row->pelapor_kab),
				'pelapor_kec' => $this->get_region_name('reg_districts', $row->pelapor_kec),
				'pelapor_desa' => $this->get_region_name('reg_villages', $row->pelapor_desa),
				'korban_nik' => $row->korban_nik,
				'korban_nama' => $row->korban_nama,
				'korban_jeniskelamin' => $row->korban_jeniskelamin,
				'korban_agama' => $row->korban_agama,
				'korban_tempat' => $row->korban_tempat,
				'korban_tgl_lahir' => $row->korban_tgl_lahir,
				'korban_prop' => $row->korban_prop,
				'korban_kab' => $this->get_region_name('reg_regencies', $row->korban_kab),
				'korban_kec' => $this->get_region_name('reg_districts', $row->korban_kec),
				'korban_desa' => $this->get_region_name('reg_villages', $row->korban_desa),
				'korban_foto1' => $row->korban_foto1,
				'korban_foto2' => $row->korban_foto2,
				'korban_email' => $row->korban_email,
				'korban_telepon' => $row->korban_telepon,
				'korban_tglkejadian' => $row->korban_tglkejadian,
				'korban_usia' => $row->korban_usia,
				'pelaku_nama' => $row->pelaku_nama,
				'pelaku_jenis_kelamin' => $row->pelaku_jenis_kelamin,
				'pelaku_usia' => $row->pelaku_usia,
				'pelaku_hubungan' => $row->pelaku_hubungan,
				'pelaku_pendidikan' => $row->pelaku_pendidikan,
				'pelaku_alamat' => $row->pelaku_alamat,
				'pelaku_prop' => $row->pelaku_prop,
				'pelaku_kab' => $this->get_region_name('reg_regencies', $row->pelaku_kab),
				'pelaku_kec' => $this->get_region_name('reg_districts', $row->pelaku_kec),
				'pelaku_desa' => $this->get_region_name('reg_villages', $row->pelaku_desa),
				'pelaku_nik' => $row->pelaku_nik,
				'lapor_anonim' => $row->lapor_anonim,
				'lapor_rahasia' => $row->lapor_rahasia,
				'lapor_status' => $row->lapor_status,
				'lapor_kategori' => $row->lapor_kategori,
				'lapor_disposisi' => $row->lapor_disposisi,
				'lapor_klarifikasi' => $row->lapor_klarifikasi,
				//		'create_at' => $row->create_at,
//		'update_at' => $row->update_at,
//		'delete_at' => $row->delete_at,
//		'user_id' => $row->user_id,
			);
			$this->template->load('template', 'kelola_berita_acara/tbl_ppa_berita_acara_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kelola_berita_acara'));
		}
	}

	public function create()
	{

		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->uri->segment(3));

		if ($q <> '') {
			$config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'index.php/welcome/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'index.php/welcome/index/';
			$config['first_url'] = base_url() . 'index.php/welcome/index/';
		}
		//
		$config['per_page'] = 10;
		$config['page_query_string'] = FALSE;
		$config['total_rows'] = $this->Model_pendaftaran->total_rows($q);
		$kelola_pelapor = $this->Model_pendaftaran->get_limit_data($config['per_page'], $start, $q);


		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul>';
		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$this->data = array(
			'kelola_data_pelapor' => $kelola_pelapor,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
			'button_create' => 'Simpan',
			'action' => site_url('kelola_berita_acara/create_action'),
			'berita_acara_id' => set_value('berita_acara_id'),
			'berita_acara_keterangan' => set_value('berita_acara_keterangan'),
			'berita_acara_status' => set_value('berita_acara_status'),
			'berita_acara_dihentikan' => set_value('berita_acara_dihentikan'),
			'berita_acara_kode' => set_value('berita_acara_kode'),
			'berita_acara_tgl' => set_value('berita_acara_tgl'),
			'berita_acara_hari' => set_value('berita_acara_hari'),
			'berita_acara_kronologi' => set_value('berita_acara_kronologi'),
			'berita_acara_harapan' => set_value('berita_acara_harapan'),
			'berita_acara_penerima_laporan' => set_value('berita_acara_penerima_laporan'),
			'berita_acara_kepala_uptd' => set_value('berita_acara_kepala_uptd'),
			'pelapor_nama' => set_value('pelapor_nama'),
			'pelapor_tgl' => set_value('pelapor_tgl'),
			'pelapor_tempat' => set_value('pelapor_tempat'),
			'pelapor_idusers' => set_value('pelapor_idusers'),
			'pelapor_nik' => set_value('pelapor_nik'),
			'pelapor_pekerjaan' => set_value('pelapor_pekerjaan'),
			'pelapor_telepon' => set_value('pelapor_telepon'),
			'pelapor_kab' => set_value('pelapor_kab'),
			'pelapor_kec' => set_value('pelapor_kec'),
			'pelapor_desa' => set_value('pelapor_desa'),
			'korban_nik' => set_value('korban_nik'),
			'korban_nama' => set_value('korban_nama'),
			'korban_jeniskelamin' => set_value('korban_jeniskelamin'),
			'korban_agama' => set_value('korban_agama'),
			'korban_tempat' => set_value('korban_tempat'),
			'korban_tgl_lahir' => set_value('korban_tgl_lahir'),
			'korban_prop' => set_value('korban_prop'),
			'korban_kab' => set_value('korban_kab'),
			'korban_kec' => set_value('korban_kec'),
			'korban_desa' => set_value('korban_desa'),
			'korban_foto1' => set_value('korban_foto1'),
			'korban_foto2' => set_value('korban_foto2'),
			'korban_email' => set_value('korban_email'),
			'korban_telepon' => set_value('korban_telepon'),
			'korban_tglkejadian' => set_value('korban_tglkejadian'),
			'korban_usia' => set_value('korban_usia'),
			'pelaku_nama' => set_value('pelaku_nama'),
			'pelaku_jenis_kelamin' => set_value('pelaku_jenis_kelamin'),
			'pelaku_usia' => set_value('pelaku_usia'),
			'pelaku_hubungan' => set_value('pelaku_hubungan'),
			'pelaku_pendidikan' => set_value('pelaku_pendidikan'),
			'pelaku_alamat' => set_value('pelaku_alamat'),
			'pelaku_prop' => set_value('pelaku_prop'),
			'pelaku_kab' => set_value('pelaku_kab'),
			'pelaku_kec' => set_value('pelaku_kec'),
			'pelaku_desa' => set_value('pelaku_desa'),
			'pelaku_nik' => set_value('pelaku_nik'),
			'lapor_anonim' => set_value('lapor_anonim'),
			'lapor_rahasia' => set_value('lapor_rahasia'),
			'lapor_status' => set_value('lapor_status'),
			'lapor_kategori' => set_value('lapor_kategori'),
			'lapor_disposisi' => set_value('lapor_disposisi'),
			'lapor_klarifikasi' => set_value('lapor_klarifikasi'),
			'create_at' => set_value('create_at'),
			'update_at' => set_value('update_at'),
			'delete_at' => set_value('delete_at'),
			'user_id' => set_value('user_id'),
		);
		$this->template->load('template', 'kelola_berita_acara/tbl_ppa_berita_acara_form', $this->data);
	}

	public function create_action()
	{


		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {

			//            // var_dump($this->input->post('korban_tgl_lahir',TRUE))or die();
//          // $xx= $this->input->post('korban_tgl_lahir');
//          $umur = hitungUmur($this->input->post('korban_tgl_lahir',TRUE));
//          var_dump($umur)or die();


			$new_name = time();
			$kode_layanan = $new_name . '-' . $this->input->post('korban_nik', TRUE);



			$config['allowed_types'] = 'jpg,pdf';
			$config['encrypt_name'] = true;
			$new_name = time();
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->do_upload('korban_foto1');
			$korban_foto1 = $this->upload->data();


			$this->upload->do_upload('korban_foto2');
			$korban_foto2 = $this->upload->data();

			if (!empty($_FILES["korban_foto1"]["name"])) {

				$temp = explode(".", $_FILES["korban_foto1"]["name"]);
				$newfilename1 = $kode_layanan . '-file1.jpg';
				move_uploaded_file($_FILES["korban_foto1"]["tmp_name"], "./upload_foto/" . $newfilename1);
			} else {
				$newfilename1 = $_POST['korban_foto11'];
			}

			if (!empty($_FILES["korban_foto2"]["name"])) {

				$temp = explode(".", $_FILES["korban_foto2"]["name"]);
				$newfilename2 = $kode_layanan . '-file2.jpg';
				move_uploaded_file($_FILES["korban_foto2"]["tmp_name"], "./upload_foto/" . $newfilename2);
			} else {
				$newfilename2 = $_POST['korban_foto22'];
			}

			$data = array(
				'berita_acara_status' => 1,
				'berita_acara_dihentikan' => $this->input->post('berita_acara_dihentikan', TRUE),
				'berita_acara_kode' => $kode_layanan,
				'berita_acara_tgl' => $this->input->post('berita_acara_tgl', TRUE),
				'berita_acara_hari' => $this->input->post('berita_acara_hari', TRUE),
				'berita_acara_kronologi' => $this->input->post('berita_acara_kronologi', TRUE),
				'berita_acara_harapan' => $this->input->post('berita_acara_harapan', TRUE),
				'berita_acara_penerima_laporan' => $this->input->post('berita_acara_penerima_laporan', TRUE),
				'berita_acara_kepala_uptd' => $this->input->post('berita_acara_kepala_uptd', TRUE),
				'pelapor_nama' => $this->input->post('pelapor_nama', TRUE),
				'pelapor_tgl' => $this->input->post('pelapor_tgl', TRUE),
				'pelapor_tempat' => $this->input->post('pelapor_tempat', TRUE),
				'pelapor_idusers' => $this->input->post('pelapor_idusers', TRUE),
				'pelapor_nik' => $this->input->post('pelapor_nik', TRUE),
				'pelapor_pekerjaan' => $this->input->post('pelapor_pekerjaan', TRUE),
				'pelapor_telepon' => $this->input->post('pelapor_telepon', TRUE),
				'pelapor_kab' => $this->input->post('pelapor_kab', TRUE),
				'pelapor_kec' => $this->input->post('pelapor_kec', TRUE),
				'pelapor_desa' => $this->input->post('pelapor_desa', TRUE),
				'korban_nik' => $this->input->post('korban_nik', TRUE),
				'korban_nama' => $this->input->post('korban_nama', TRUE),
				'korban_jeniskelamin' => $this->input->post('korban_jeniskelamin', TRUE),
				'korban_agama' => $this->input->post('korban_agama', TRUE),
				'korban_tempat' => $this->input->post('korban_tempat', TRUE),
				'korban_tgl_lahir' => $this->input->post('korban_tgl_lahir', TRUE),
				'korban_prop' => $this->input->post('korban_prop', TRUE),
				'korban_kab' => $this->input->post('korban_kab', TRUE),
				'korban_kec' => $this->input->post('korban_kec', TRUE),
				'korban_desa' => $this->input->post('korban_desa', TRUE),
				'korban_foto1' => $newfilename1,
				'korban_foto2' => $newfilename2,

				'korban_email' => $this->input->post('korban_email', TRUE),
				'korban_telepon' => $this->input->post('korban_telepon', TRUE),
				'korban_tglkejadian' => $this->input->post('korban_tglkejadian', TRUE),

				'korban_usia' => hitungUmur($this->input->post('korban_tgl_lahir', TRUE)),
				'korban_tglkejadian' => $this->input->post('korban_tglkejadian', TRUE),
				'pelaku_nama' => $this->input->post('pelaku_nama', TRUE),
				'pelaku_jenis_kelamin' => $this->input->post('pelaku_jenis_kelamin', TRUE),
				'pelaku_usia' => $this->input->post('pelaku_usia', TRUE),
				'pelaku_hubungan' => $this->input->post('pelaku_hubungan', TRUE),
				'pelaku_pendidikan' => $this->input->post('pelaku_pendidikan', TRUE),
				'pelaku_alamat' => $this->input->post('pelaku_alamat', TRUE),
				'pelaku_prop' => $this->input->post('pelaku_prop', TRUE),
				'pelaku_kab' => $this->input->post('pelaku_kab', TRUE),
				'pelaku_kec' => $this->input->post('pelaku_kec', TRUE),
				'pelaku_desa' => $this->input->post('pelaku_desa', TRUE),
				'pelaku_nik' => $this->input->post('pelaku_nik', TRUE),
				'lapor_anonim' => $this->input->post('lapor_anonim', TRUE),
				'lapor_rahasia' => $this->input->post('lapor_rahasia', TRUE),
				'lapor_status' => $this->input->post('lapor_status', TRUE),
				'lapor_kategori' => $this->input->post('lapor_kategori', TRUE),
				'lapor_disposisi' => $this->input->post('lapor_disposisi', TRUE),
				'lapor_klarifikasi' => $this->input->post('lapor_klarifikasi', TRUE),
				'create_at' => date('Y-m-d H:i:s'),
				'update_at' => date('Y-m-d H:i:s'),
				'user_id' => $_SESSION['id_users'],
			);
			$this->db->set('berita_acara_id', 'UUID()', FALSE);

			$this->Model_berita_acara->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success 2');
			redirect(site_url('kelola_berita_acara'));
		}
	}

	public function update($id)
	{

		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->uri->segment(4));


		if ($q <> '') {
			$config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'index.php/welcome/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'index.php/welcome/index/';
			$config['first_url'] = base_url() . 'index.php/welcome/index/';
		}

		//
		$config['per_page'] = 10;
		$config['page_query_string'] = FALSE;
		$config['total_rows'] = $this->Model_pendaftaran->total_rows($q);
		$kelola_pelapor = $this->Model_pendaftaran->get_limit_data($config['per_page'], $start, $q);
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul>';
		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$row = $this->Model_berita_acara->get_by_id($id);

		if ($row) {
			$this->data = array(
				'start' => $start,
				'kelola_data_pelapor' => $kelola_pelapor,
				'button_create' => 'Update',
				'action' => site_url('kelola_berita_acara/update_action'),
				'berita_acara_id' => set_value('berita_acara_id', $row->berita_acara_id),
				'berita_acara_status' => set_value('berita_acara_status', $row->berita_acara_status),
				'berita_acara_dihentikan' => set_value('berita_acara_dihentikan', $row->berita_acara_dihentikan),
				'berita_acara_kode' => set_value('berita_acara_kode', $row->berita_acara_kode),
				'berita_acara_tgl' => set_value('berita_acara_tgl', $row->berita_acara_tgl),
				'berita_acara_hari' => set_value('berita_acara_hari', $row->berita_acara_hari),
				'berita_acara_kronologi' => set_value('berita_acara_kronologi', $row->berita_acara_kronologi),
				'berita_acara_harapan' => set_value('berita_acara_harapan', $row->berita_acara_harapan),
				'berita_acara_penerima_laporan' => set_value('berita_acara_penerima_laporan', $row->berita_acara_penerima_laporan),
				'berita_acara_kepala_uptd' => set_value('berita_acara_kepala_uptd', $row->berita_acara_kepala_uptd),

				'berita_acara_keterangan' => set_value('berita_acara_keterangan', $row->berita_acara_keterangan),
				'pelapor_nama' => set_value('pelapor_nama', $row->pelapor_nama),
				'pelapor_tgl' => set_value('pelapor_tgl', $row->pelapor_tgl),
				'pelapor_tempat' => set_value('pelapor_tempat', $row->pelapor_tempat),
				'pelapor_idusers' => set_value('pelapor_idusers', $row->pelapor_idusers),
				'pelapor_nik' => set_value('pelapor_nik', $row->pelapor_nik),
				'pelapor_pekerjaan' => set_value('pelapor_pekerjaan', $row->pelapor_pekerjaan),
				'pelapor_telepon' => set_value('pelapor_telepon', $row->pelapor_telepon),
				'pelapor_kab' => set_value('pelapor_kab', $row->pelapor_kab),
				'pelapor_kec' => set_value('pelapor_kec', $row->pelapor_kec),
				'pelapor_desa' => set_value('pelapor_desa', $row->pelapor_desa),
				'korban_nik' => set_value('korban_nik', $row->korban_nik),
				'korban_nama' => set_value('korban_nama', $row->korban_nama),
				'korban_jeniskelamin' => set_value('korban_jeniskelamin', $row->korban_jeniskelamin),
				'korban_agama' => set_value('korban_agama', $row->korban_agama),
				'korban_tempat' => set_value('korban_tempat', $row->korban_tempat),
				'korban_tgl_lahir' => set_value('korban_tgl_lahir', $row->korban_tgl_lahir),
				'korban_prop' => set_value('korban_prop', $row->korban_prop),
				'korban_kab' => set_value('korban_kab', $row->korban_kab),
				'korban_kec' => set_value('korban_kec', $row->korban_kec),
				'korban_desa' => set_value('korban_desa', $row->korban_desa),
				'korban_foto1' => set_value('korban_foto1', $row->korban_foto1),
				'korban_foto2' => set_value('korban_foto2', $row->korban_foto2),
				'korban_email' => set_value('korban_email', $row->korban_email),
				'korban_telepon' => set_value('korban_telepon', $row->korban_telepon),
				'korban_tglkejadian' => set_value('korban_tglkejadian', $row->korban_tglkejadian),
				'pelaku_nama' => set_value('pelaku_nama', $row->pelaku_nama),
				'pelaku_jenis_kelamin' => set_value('pelaku_jenis_kelamin', $row->pelaku_jenis_kelamin),
				'pelaku_usia' => set_value('pelaku_usia', $row->pelaku_usia),
				'pelaku_hubungan' => set_value('pelaku_hubungan', $row->pelaku_hubungan),
				'pelaku_pendidikan' => set_value('pelaku_pendidikan', $row->pelaku_pendidikan),
				'pelaku_alamat' => set_value('pelaku_alamat', $row->pelaku_alamat),
				'pelaku_prop' => set_value('pelaku_prop', $row->pelaku_prop),
				'pelaku_kab' => set_value('pelaku_kab', $row->pelaku_kab),
				'pelaku_kec' => set_value('pelaku_kec', $row->pelaku_kec),
				'pelaku_desa' => set_value('pelaku_desa', $row->pelaku_desa),
				'pelaku_nik' => set_value('pelaku_nik', $row->pelaku_nik),
				'lapor_anonim' => set_value('lapor_anonim', $row->lapor_anonim),
				'lapor_rahasia' => set_value('lapor_rahasia', $row->lapor_rahasia),
				'lapor_status' => set_value('lapor_status', $row->lapor_status),
				'lapor_kategori' => set_value('lapor_kategori', $row->lapor_kategori),
				'lapor_disposisi' => set_value('lapor_disposisi', $row->lapor_disposisi),
				'lapor_klarifikasi' => set_value('lapor_klarifikasi', $row->lapor_klarifikasi),
				'create_at' => date('Y-m-d H:i:s'),
				'update_at' => date('Y-m-d H:i:s'),
				'user_id' => $_SESSION['id_users'],
			);



			$this->template->load('template', 'kelola_berita_acara/tbl_ppa_berita_acara_form', $this->data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kelola_berita_acara'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('berita_acara_id', TRUE));
		} else {

			$kode_layanan = $this->input->post('berita_acara_kode', TRUE);
			$config['allowed_types'] = 'jpg';
			$config['encrypt_name'] = true;
			$new_name = time();
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->do_upload('korban_foto1');
			$korban_foto1 = $this->upload->data();


			$this->upload->do_upload('korban_foto2');
			$korban_foto2 = $this->upload->data();

			if (!empty($_FILES["korban_foto1"]["name"])) {

				$temp = explode(".", $_FILES["korban_foto1"]["name"]);
				$newfilename1 = $kode_layanan . '-file1.jpg';
				move_uploaded_file($_FILES["korban_foto1"]["tmp_name"], "./upload_foto/" . $newfilename1);
			} else {
				$newfilename1 = $_POST['korban_foto11'];
			}

			if (!empty($_FILES["korban_foto2"]["name"])) {

				$temp = explode(".", $_FILES["korban_foto2"]["name"]);
				$newfilename2 = $kode_layanan . '-file2.jpg';
				move_uploaded_file($_FILES["korban_foto2"]["tmp_name"], "./upload_foto/" . $newfilename2);
			} else {
				$newfilename2 = $_POST['korban_foto22'];
			}

			$data = array(
				'berita_acara_status' => $this->input->post('berita_acara_status', TRUE),
				'berita_acara_dihentikan' => $this->input->post('berita_acara_dihentikan', TRUE),
				//	'berita_acara_kode' => $this->input->post('berita_acara_kode',TRUE),
				'berita_acara_tgl' => $this->input->post('berita_acara_tgl', TRUE),
				'berita_acara_hari' => $this->input->post('berita_acara_hari', TRUE),
				'berita_acara_kronologi' => $this->input->post('berita_acara_kronologi', TRUE),
				'berita_acara_harapan' => $this->input->post('berita_acara_harapan', TRUE),
				'berita_acara_penerima_laporan' => $this->input->post('berita_acara_penerima_laporan', TRUE),
				'berita_acara_kepala_uptd' => $this->input->post('berita_acara_kepala_uptd', TRUE),
				'pelapor_nama' => $this->input->post('pelapor_nama', TRUE),
				'pelapor_tgl' => $this->input->post('pelapor_tgl', TRUE),
				'pelapor_tempat' => $this->input->post('pelapor_tempat', TRUE),
				'pelapor_idusers' => $this->input->post('pelapor_idusers', TRUE),
				'pelapor_nik' => $this->input->post('pelapor_nik', TRUE),
				'pelapor_pekerjaan' => $this->input->post('pelapor_pekerjaan', TRUE),
				'pelapor_telepon' => $this->input->post('pelapor_telepon', TRUE),
				'pelapor_kab' => $this->input->post('pelapor_kab', TRUE),
				'pelapor_kec' => $this->input->post('pelapor_kec', TRUE),
				'pelapor_desa' => $this->input->post('pelapor_desa', TRUE),
				'korban_nik' => $this->input->post('korban_nik', TRUE),
				'korban_nama' => $this->input->post('korban_nama', TRUE),
				'korban_jeniskelamin' => $this->input->post('korban_jeniskelamin', TRUE),
				'korban_agama' => $this->input->post('korban_agama', TRUE),
				'korban_tempat' => $this->input->post('korban_tempat', TRUE),
				'korban_tgl_lahir' => $this->input->post('korban_tgl_lahir', TRUE),
				'korban_prop' => $this->input->post('korban_prop', TRUE),
				'korban_kab' => $this->input->post('korban_kab', TRUE),
				'korban_kec' => $this->input->post('korban_kec', TRUE),
				'korban_desa' => $this->input->post('korban_desa', TRUE),
				'korban_foto1' => $newfilename1,
				'korban_foto2' => $newfilename2,
				'korban_email' => $this->input->post('korban_email', TRUE),
				'korban_telepon' => $this->input->post('korban_telepon', TRUE),
				'korban_tglkejadian' => $this->input->post('korban_tglkejadian', TRUE),
				'pelaku_nama' => $this->input->post('pelaku_nama', TRUE),
				'pelaku_jenis_kelamin' => $this->input->post('pelaku_jenis_kelamin', TRUE),
				'pelaku_usia' => $this->input->post('pelaku_usia', TRUE),
				'pelaku_hubungan' => $this->input->post('pelaku_hubungan', TRUE),
				'pelaku_pendidikan' => $this->input->post('pelaku_pendidikan', TRUE),
				'pelaku_alamat' => $this->input->post('pelaku_alamat', TRUE),
				'pelaku_prop' => $this->input->post('pelaku_prop', TRUE),
				'pelaku_kab' => $this->input->post('pelaku_kab', TRUE),
				'pelaku_kec' => $this->input->post('pelaku_kec', TRUE),
				'pelaku_desa' => $this->input->post('pelaku_desa', TRUE),
				'pelaku_nik' => $this->input->post('pelaku_nik', TRUE),
				'lapor_anonim' => $this->input->post('lapor_anonim', TRUE),
				'lapor_rahasia' => $this->input->post('lapor_rahasia', TRUE),
				'lapor_status' => $this->input->post('lapor_status', TRUE),
				'lapor_kategori' => $this->input->post('lapor_kategori', TRUE),
				'lapor_disposisi' => $this->input->post('lapor_disposisi', TRUE),
				'lapor_klarifikasi' => $this->input->post('lapor_klarifikasi', TRUE),
				//		'create_at' => $this->input->post('create_at',TRUE),
				'update_at' => date('Y-m-d H:i:s'),
				//		'delete_at' => $this->input->post('delete_at',TRUE),
//		'user_id' => $this->input->post('user_id',TRUE),

			);

			$this->Model_berita_acara->update($this->input->post('berita_acara_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('kelola_berita_acara'));
		}
	}

	public function delete($id)
	{
		$row = $this->Model_berita_acara->get_by_id($id);

		if ($row) {
			$this->Model_berita_acara->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('kelola_berita_acara'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kelola_berita_acara'));
		}
	}

	public function _rules()
	{
		//        $this->form_validation->set_rules('button_aktif', 'simpan', 'trim|required');
//	$this->form_validation->set_rules('berita_acara_status', 'berita acara status', 'trim|required');
//	$this->form_validation->set_rules('berita_acara_dihentikan', 'berita acara dihentikan', 'trim|required');
//	$this->form_validation->set_rules('berita_acara_kode', 'berita acara kode', 'trim|required');
		$this->form_validation->set_rules('berita_acara_tgl', 'berita acara tgl', 'trim|required');
		//	$this->form_validation->set_rules('berita_acara_hari', 'berita acara hari', 'trim|required');
		$this->form_validation->set_rules('berita_acara_kronologi', 'berita acara kronologi', 'trim|required');
		//	$this->form_validation->set_rules('berita_acara_penerima_laporan', 'berita acara penerima laporan', 'trim|required');
//	$this->form_validation->set_rules('berita_acara_kepala_uptd', 'berita acara kepala uptd', 'trim|required');
//	$this->form_validation->set_rules('pelapor_nama', 'pelapor nama', 'trim|required');
//	$this->form_validation->set_rules('pelapor_tgl', 'pelapor tgl', 'trim|required');
//	$this->form_validation->set_rules('pelapor_tempat', 'pelapor tempat', 'trim|required');
//	$this->form_validation->set_rules('pelapor_idusers', 'pelapor idusers', 'trim|required');
//	$this->form_validation->set_rules('pelapor_nik', 'pelapor nik', 'trim|required');
//	$this->form_validation->set_rules('pelapor_pekerjaan', 'pelapor pekerjaan', 'trim|required');
//	$this->form_validation->set_rules('pelapor_telepon', 'pelapor telepon', 'trim|required');
//	$this->form_validation->set_rules('pelapor_kab', 'pelapor kab', 'trim|required');
//	$this->form_validation->set_rules('pelapor_kec', 'pelapor kec', 'trim|required');
//	$this->form_validation->set_rules('pelapor_desa', 'pelapor desa', 'trim|required');
//	$this->form_validation->set_rules('korban_nik', 'korban nik', 'trim|required');
		$this->form_validation->set_rules('korban_nama', 'korban nama', 'trim|required');
		$this->form_validation->set_rules('korban_jeniskelamin', 'korban jeniskelamin', 'trim|required');
		$this->form_validation->set_rules('korban_agama', 'korban agama', 'trim|required');
		$this->form_validation->set_rules('korban_tempat', 'korban tempat', 'trim|required');
		$this->form_validation->set_rules('korban_tgl_lahir', 'korban tgl lahir', 'trim|required');

		$this->form_validation->set_rules('korban_prop', 'korban prop', 'trim|required');
		$this->form_validation->set_rules('korban_kab', 'korban kab', 'trim|required');
		$this->form_validation->set_rules('korban_kec', 'korban kec', 'trim|required');
		//	$this->form_validation->set_rules('korban_desa', 'korban desa', 'trim|required');
//	$this->form_validation->set_rules('korban_foto1', 'korban foto1', 'trim|required');
//	$this->form_validation->set_rules('korban_foto2', 'korban foto2', 'trim|required');
//	$this->form_validation->set_rules('korban_email', 'korban email', 'trim|required');
//	$this->form_validation->set_rules('korban_telepon', 'korban telepon', 'trim|required');
//	$this->form_validation->set_rules('korban_tglkejadian', 'korban tglkejadian', 'trim|required');
//	$this->form_validation->set_rules('pelaku_nama', 'pelaku nama', 'trim|required');
//	$this->form_validation->set_rules('pelaku_jenis_kelamin', 'pelaku jenis kelamin', 'trim|required');
//	$this->form_validation->set_rules('pelaku_usia', 'pelaku usia', 'trim|required');
//	$this->form_validation->set_rules('pelaku_hubungan', 'pelaku hubungan', 'trim|required');
//	$this->form_validation->set_rules('pelaku_pendidikan', 'pelaku pendidikan', 'trim|required');
//	$this->form_validation->set_rules('pelaku_alamat', 'pelaku alamat', 'trim|required');
//	$this->form_validation->set_rules('pelaku_prop', 'pelaku prop', 'trim|required');
//	$this->form_validation->set_rules('pelaku_kab', 'pelaku kab', 'trim|required');
//	$this->form_validation->set_rules('pelaku_kec', 'pelaku kec', 'trim|required');
//	$this->form_validation->set_rules('pelaku_desa', 'pelaku desa', 'trim|required');
//	$this->form_validation->set_rules('pelaku_nik', 'pelaku nik', 'trim|required');
//	$this->form_validation->set_rules('lapor_anonim', 'lapor anonim', 'trim|required');
//	$this->form_validation->set_rules('lapor_rahasia', 'lapor rahasia', 'trim|required');
//	$this->form_validation->set_rules('lapor_status', 'lapor status', 'trim|required');
//	$this->form_validation->set_rules('lapor_kategori', 'lapor kategori', 'trim|required');
//	$this->form_validation->set_rules('lapor_disposisi', 'lapor disposisi', 'trim|required');
//	$this->form_validation->set_rules('lapor_klarifikasi', 'lapor klarifikasi', 'trim|required');
//	$this->form_validation->set_rules('create_at', 'create at', 'trim|required');
//	$this->form_validation->set_rules('update_at', 'update at', 'trim|required');
//	$this->form_validation->set_rules('delete_at', 'delete at', 'trim|required');
//	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');

		$this->form_validation->set_rules('berita_acara_id', 'berita_acara_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "tbl_ppa_berita_acara.xls";
		$judul = "tbl_ppa_berita_acara";
		$tablehead = 0;
		$tablebody = 1;
		$nourut = 1;
		//penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=" . $namaFile . "");
		header("Content-Transfer-Encoding: binary ");

		xlsBOF();

		$kolomhead = 0;
		xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Berita Acara Status");
		xlsWriteLabel($tablehead, $kolomhead++, "Berita Acara Dihentikan");
		xlsWriteLabel($tablehead, $kolomhead++, "Berita Acara Kode");
		xlsWriteLabel($tablehead, $kolomhead++, "Berita Acara Tgl");
		xlsWriteLabel($tablehead, $kolomhead++, "Berita Acara Hari");
		xlsWriteLabel($tablehead, $kolomhead++, "Berita Acara Kronologi");
		xlsWriteLabel($tablehead, $kolomhead++, "Berita Acara Penerima Laporan");
		xlsWriteLabel($tablehead, $kolomhead++, "Berita Acara Kepala Uptd");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelapor Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelapor Tgl");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelapor Tempat");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelapor Idusers");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelapor Nik");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelapor Pekerjaan");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelapor Telepon");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelapor Kab");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelapor Kec");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelapor Desa");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Nik");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Jeniskelamin");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Agama");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Tempat");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Tgl Lahir");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Prop");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Kab");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Kec");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Desa");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Foto1");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Foto2");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Email");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Telepon");
		xlsWriteLabel($tablehead, $kolomhead++, "Korban Tglkejadian");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelaku Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelaku Jenis Kelamin");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelaku Usia");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelaku Hubungan");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelaku Pendidikan");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelaku Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelaku Prop");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelaku Kab");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelaku Kec");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelaku Desa");
		xlsWriteLabel($tablehead, $kolomhead++, "Pelaku Nik");
		xlsWriteLabel($tablehead, $kolomhead++, "Lapor Anonim");
		xlsWriteLabel($tablehead, $kolomhead++, "Lapor Rahasia");
		xlsWriteLabel($tablehead, $kolomhead++, "Lapor Status");
		xlsWriteLabel($tablehead, $kolomhead++, "Lapor Kategori");
		xlsWriteLabel($tablehead, $kolomhead++, "Lapor Disposisi");
		xlsWriteLabel($tablehead, $kolomhead++, "Lapor Klarifikasi");
		xlsWriteLabel($tablehead, $kolomhead++, "Create At");
		xlsWriteLabel($tablehead, $kolomhead++, "Update At");
		xlsWriteLabel($tablehead, $kolomhead++, "Delete At");
		xlsWriteLabel($tablehead, $kolomhead++, "User Id");

		$tahun = $this->input->get('tahun', TRUE);
		$bulan = $this->input->get('bulan', TRUE);
		$tanggal = $this->input->get('tanggal', TRUE);
		foreach ($this->Model_berita_acara->get_all($tahun, $bulan, $tanggal) as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->berita_acara_status);
			xlsWriteLabel($tablebody, $kolombody++, $data->berita_acara_dihentikan);
			xlsWriteLabel($tablebody, $kolombody++, $data->berita_acara_kode);
			xlsWriteLabel($tablebody, $kolombody++, $data->berita_acara_tgl);
			xlsWriteLabel($tablebody, $kolombody++, $data->berita_acara_hari);
			xlsWriteLabel($tablebody, $kolombody++, $data->berita_acara_kronologi);
			xlsWriteLabel($tablebody, $kolombody++, $data->berita_acara_penerima_laporan);
			xlsWriteLabel($tablebody, $kolombody++, $data->berita_acara_kepala_uptd);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelapor_nama);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelapor_tgl);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelapor_tempat);
			xlsWriteNumber($tablebody, $kolombody++, $data->pelapor_idusers);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelapor_nik);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelapor_pekerjaan);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelapor_telepon);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelapor_kab);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelapor_kec);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelapor_desa);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_nik);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_nama);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_jeniskelamin);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_agama);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_tempat);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_tgl_lahir);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_prop);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_kab);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_kec);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_desa);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_foto1);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_foto2);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_email);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_telepon);
			xlsWriteLabel($tablebody, $kolombody++, $data->korban_tglkejadian);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelaku_nama);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelaku_jenis_kelamin);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelaku_usia);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelaku_hubungan);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelaku_pendidikan);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelaku_alamat);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelaku_prop);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelaku_kab);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelaku_kec);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelaku_desa);
			xlsWriteLabel($tablebody, $kolombody++, $data->pelaku_nik);
			xlsWriteLabel($tablebody, $kolombody++, $data->lapor_anonim);
			xlsWriteLabel($tablebody, $kolombody++, $data->lapor_rahasia);
			xlsWriteLabel($tablebody, $kolombody++, $data->lapor_status);
			xlsWriteLabel($tablebody, $kolombody++, $data->lapor_kategori);
			xlsWriteLabel($tablebody, $kolombody++, $data->lapor_disposisi);
			xlsWriteLabel($tablebody, $kolombody++, $data->lapor_klarifikasi);
			xlsWriteLabel($tablebody, $kolombody++, $data->create_at);
			xlsWriteLabel($tablebody, $kolombody++, $data->update_at);
			xlsWriteLabel($tablebody, $kolombody++, $data->delete_at);
			xlsWriteNumber($tablebody, $kolombody++, $data->user_id);

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}

	public function report($id)
	{
		$row = $this->Model_berita_acara->get_by_id($id);
		if ($row) {
			$data = array(
				'berita_acara_id' => $row->berita_acara_id,
				'berita_acara_status' => $row->berita_acara_status,
				'berita_acara_dihentikan' => $row->berita_acara_dihentikan,
				'berita_acara_kode' => $row->berita_acara_kode,
				'berita_acara_tgl' => $row->berita_acara_tgl,
				'berita_acara_hari' => $row->berita_acara_hari,
				'berita_acara_kronologi' => $row->berita_acara_kronologi,
				'berita_acara_penerima_laporan' => $row->berita_acara_penerima_laporan,
				'berita_acara_kepala_uptd' => $row->berita_acara_kepala_uptd,
				'pelapor_nama' => $row->pelapor_nama,
				'pelapor_tgl' => $row->pelapor_tgl,
				'pelapor_tempat' => $row->pelapor_tempat,
				'pelapor_idusers' => $row->pelapor_idusers,
				'pelapor_nik' => $row->pelapor_nik,
				'pelapor_pekerjaan' => $row->pelapor_pekerjaan,
				'pelapor_kab' => $this->get_region_name('reg_regencies', $row->pelapor_kab),
				'pelapor_kec' => $this->get_region_name('reg_districts', $row->pelapor_kec),
				'pelapor_desa' => $this->get_region_name('reg_villages', $row->pelapor_desa),
				'korban_nik' => $row->korban_nik,
				'korban_nama' => $row->korban_nama,
				'korban_jeniskelamin' => $row->korban_jeniskelamin,
				'korban_agama' => $row->korban_agama,
				'korban_tempat' => $row->korban_tempat,
				'korban_tgl_lahir' => $row->korban_tgl_lahir,
				'korban_prop' => $row->korban_prop,
				'korban_kab' => $this->get_region_name('reg_regencies', $row->korban_kab),
				'korban_kec' => $this->get_region_name('reg_districts', $row->korban_kec),
				'korban_desa' => $this->get_region_name('reg_villages', $row->korban_desa),
				'korban_foto1' => $row->korban_foto1,
				'korban_foto2' => $row->korban_foto2,
				'korban_email' => $row->korban_email,
				'korban_telepon' => $row->korban_telepon,
				'korban_tglkejadian' => $row->korban_tglkejadian,
				'pelaku_nama' => $row->pelaku_nama,
				'pelaku_jenis_kelamin' => $row->pelaku_jenis_kelamin,
				'pelaku_usia' => $row->pelaku_usia,
				'pelaku_hubungan' => $row->pelaku_hubungan,
				'pelaku_pendidikan' => $row->pelaku_pendidikan,
				'pelaku_alamat' => $row->pelaku_alamat,
				'pelaku_prop' => $row->pelaku_prop,
				'pelaku_kab' => $this->get_region_name('reg_regencies', $row->pelaku_kab),
				'pelaku_kec' => $this->get_region_name('reg_districts', $row->pelaku_kec),
				'pelaku_desa' => $this->get_region_name('reg_villages', $row->pelaku_desa),
				'pelaku_nik' => $row->pelaku_nik,
				'lapor_anonim' => $row->lapor_anonim,
				'lapor_rahasia' => $row->lapor_rahasia,
				'lapor_status' => $row->lapor_status,
				'lapor_kategori' => $row->lapor_kategori,
				'lapor_disposisi' => $row->lapor_disposisi,
				'lapor_klarifikasi' => $row->lapor_klarifikasi,
				'berita_acara_harapan' => $row->berita_acara_harapan,
				'korban_usia' => $row->korban_usia,
			);
			$this->load->view('kelola_berita_acara/tbl_ppa_berita_acara_report', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kelola_berita_acara'));
		}
	}

	private function get_region_name($table, $id)
	{
		if (empty($id))
			return '';
		$query = $this->db->get_where($table, array('id' => $id));
		$row = $query->row();
		return ($row) ? $row->name : '';
	}

}

/* End of file Kelola_berita_acara.php */
/* Location: ./application/controllers/Kelola_berita_acara.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-02 06:40:14 */
/* http://harviacode.com */