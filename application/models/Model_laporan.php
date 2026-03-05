<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Model_laporan extends CI_Model
{

	public $table = 'tbl_ppa_berita_acara';
	public $id = 'berita_acara_id';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// get all
	function get_all($tahun = NULL)
	{
		$this->db->order_by($this->id, $this->order);
		if ($tahun) {
			$this->db->where("YEAR(berita_acara_tgl)", $tahun);
		}
		return $this->db->get($this->table)->result();
	}

	// get data by id
	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	// get total rows
	function total_rows($q = NULL)
	{
		$this->db->like('berita_acara_id', $q);
		$this->db->or_like('berita_acara_status', $q);
		$this->db->or_like('berita_acara_dihentikan', $q);
		$this->db->or_like('berita_acara_kode', $q);
		$this->db->or_like('berita_acara_tgl', $q);
		$this->db->or_like('berita_acara_hari', $q);
		$this->db->or_like('berita_acara_kronologi', $q);
		$this->db->or_like('berita_acara_penerima_laporan', $q);
		$this->db->or_like('berita_acara_kepala_uptd', $q);
		$this->db->or_like('berita_acara_keterangan', $q);
		$this->db->or_like('pelapor_nama', $q);
		$this->db->or_like('pelapor_tgl', $q);
		$this->db->or_like('pelapor_tempat', $q);
		$this->db->or_like('pelapor_idusers', $q);
		$this->db->or_like('pelapor_nik', $q);
		$this->db->or_like('pelapor_pekerjaan', $q);
		$this->db->or_like('pelapor_telepon', $q);
		$this->db->or_like('pelapor_kab', $q);
		$this->db->or_like('pelapor_kec', $q);
		$this->db->or_like('pelapor_desa', $q);
		$this->db->or_like('korban_nik', $q);
		$this->db->or_like('korban_nama', $q);
		$this->db->or_like('korban_jeniskelamin', $q);
		$this->db->or_like('korban_agama', $q);
		$this->db->or_like('korban_tempat', $q);
		$this->db->or_like('korban_tgl_lahir', $q);
		$this->db->or_like('korban_prop', $q);
		$this->db->or_like('korban_kab', $q);
		$this->db->or_like('korban_kec', $q);
		$this->db->or_like('korban_desa', $q);
		$this->db->or_like('korban_foto1', $q);
		$this->db->or_like('korban_foto2', $q);
		$this->db->or_like('korban_email', $q);
		$this->db->or_like('korban_telepon', $q);
		$this->db->or_like('korban_tglkejadian', $q);
		$this->db->or_like('pelaku_nama', $q);
		$this->db->or_like('pelaku_jenis_kelamin', $q);
		$this->db->or_like('pelaku_usia', $q);
		$this->db->or_like('pelaku_hubungan', $q);
		$this->db->or_like('pelaku_pendidikan', $q);
		$this->db->or_like('pelaku_alamat', $q);
		$this->db->or_like('pelaku_prop', $q);
		$this->db->or_like('pelaku_kab', $q);
		$this->db->or_like('pelaku_kec', $q);
		$this->db->or_like('pelaku_desa', $q);
		$this->db->or_like('pelaku_nik', $q);
		$this->db->or_like('lapor_anonim', $q);
		$this->db->or_like('lapor_rahasia', $q);
		$this->db->or_like('lapor_status', $q);
		$this->db->or_like('lapor_kategori', $q);
		$this->db->or_like('lapor_disposisi', $q);
		$this->db->or_like('lapor_klarifikasi', $q);
		$this->db->or_like('create_at', $q);
		$this->db->or_like('update_at', $q);
		$this->db->or_like('delete_at', $q);
		$this->db->or_like('user_id', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// get data with limit and search
	function get_limit_data($limit, $start = 0, $q = NULL)
	{
		$this->db->order_by($this->id, $this->order);
		$this->db->like('berita_acara_id', $q);
		$this->db->or_like('berita_acara_status', $q);
		$this->db->or_like('berita_acara_dihentikan', $q);
		$this->db->or_like('berita_acara_kode', $q);
		$this->db->or_like('berita_acara_tgl', $q);
		$this->db->or_like('berita_acara_hari', $q);
		$this->db->or_like('berita_acara_kronologi', $q);
		$this->db->or_like('berita_acara_penerima_laporan', $q);
		$this->db->or_like('berita_acara_kepala_uptd', $q);
		$this->db->or_like('berita_acara_keterangan', $q);
		$this->db->or_like('pelapor_nama', $q);
		$this->db->or_like('pelapor_tgl', $q);
		$this->db->or_like('pelapor_tempat', $q);
		$this->db->or_like('pelapor_idusers', $q);
		$this->db->or_like('pelapor_nik', $q);
		$this->db->or_like('pelapor_pekerjaan', $q);
		$this->db->or_like('pelapor_telepon', $q);
		$this->db->or_like('pelapor_kab', $q);
		$this->db->or_like('pelapor_kec', $q);
		$this->db->or_like('pelapor_desa', $q);
		$this->db->or_like('korban_nik', $q);
		$this->db->or_like('korban_nama', $q);
		$this->db->or_like('korban_jeniskelamin', $q);
		$this->db->or_like('korban_agama', $q);
		$this->db->or_like('korban_tempat', $q);
		$this->db->or_like('korban_tgl_lahir', $q);
		$this->db->or_like('korban_prop', $q);
		$this->db->or_like('korban_kab', $q);
		$this->db->or_like('korban_kec', $q);
		$this->db->or_like('korban_desa', $q);
		$this->db->or_like('korban_foto1', $q);
		$this->db->or_like('korban_foto2', $q);
		$this->db->or_like('korban_email', $q);
		$this->db->or_like('korban_telepon', $q);
		$this->db->or_like('korban_tglkejadian', $q);
		$this->db->or_like('pelaku_nama', $q);
		$this->db->or_like('pelaku_jenis_kelamin', $q);
		$this->db->or_like('pelaku_usia', $q);
		$this->db->or_like('pelaku_hubungan', $q);
		$this->db->or_like('pelaku_pendidikan', $q);
		$this->db->or_like('pelaku_alamat', $q);
		$this->db->or_like('pelaku_prop', $q);
		$this->db->or_like('pelaku_kab', $q);
		$this->db->or_like('pelaku_kec', $q);
		$this->db->or_like('pelaku_desa', $q);
		$this->db->or_like('pelaku_nik', $q);
		$this->db->or_like('lapor_anonim', $q);
		$this->db->or_like('lapor_rahasia', $q);
		$this->db->or_like('lapor_status', $q);
		$this->db->or_like('lapor_kategori', $q);
		$this->db->or_like('lapor_disposisi', $q);
		$this->db->or_like('lapor_klarifikasi', $q);
		$this->db->or_like('create_at', $q);
		$this->db->or_like('update_at', $q);
		$this->db->or_like('delete_at', $q);
		$this->db->or_like('user_id', $q);
		$this->db->limit($limit, $start);
		return $this->db->get($this->table)->result();
	}


	// insert data
	function rekap_data($data)
	{
		$id_kecamatan = isset($data['id_kecamatan']) ? $data['id_kecamatan'] : '';
		$id_desa = isset($data['id_desa']) ? $data['id_desa'] : '';
		$tgl1 = isset($data['tgl1']) ? $data['tgl1'] : '';
		$tgl2 = isset($data['tgl2']) ? $data['tgl2'] : '';
		$tahun = isset($data['tahun']) ? $data['tahun'] : '';

		$where = "WHERE 1=1 ";
		if ($tahun != '') {
			$where .= " AND YEAR(tbl_ppa_berita_acara.berita_acara_tgl) = '$tahun' ";
		}

		$data = $this->db->query("SELECT UPPER(B.`name`) as kecamatan,SUM(B.perempuan)as perempuan,SUM(B.pria)as pria,SUM(B.dewasa)as dewasa,SUM(B.anak)as anak,SUM(B.pria+B.perempuan) total FROM 
		(SELECT A.`name`,tbl_ppa_berita_acara.berita_acara_id,tbl_ppa_berita_acara.korban_jeniskelamin,
		tbl_ppa_berita_acara.korban_usia,tbl_ppa_berita_acara.berita_acara_tgl,
		IF(tbl_ppa_berita_acara.korban_jeniskelamin='Perempuan', '1', '0') perempuan,
		IF(tbl_ppa_berita_acara.korban_jeniskelamin='Laki-Laki', '1', '0') pria,
		IF(tbl_ppa_berita_acara.korban_usia>='18', '1', '0') dewasa,
		IF(tbl_ppa_berita_acara.korban_usia<='17', '1', '0') anak
		 FROM (SELECT reg_districts.id,`name` FROM reg_districts
		WHERE regency_id ='3204')A 
		LEFT JOIN tbl_ppa_berita_acara ON tbl_ppa_berita_acara.korban_kec=A.id $where)B
		GROUP BY B.name ");
		return $data->result();
	}

	// insert data
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	// update data
	function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	// delete data
	function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

}

/* End of file Model_laporan.php */
/* Location: ./application/models/Model_laporan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-17 02:53:07 */
/* http://harviacode.com */