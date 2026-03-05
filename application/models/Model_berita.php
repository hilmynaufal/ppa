<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_berita extends CI_Model
{
 
    public $table = 'tbl_ppa_berita_acara';
    public $id = 'berita_acara_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    
    
//       // datatables
//    function json() {
//       
//        $this->datatables->select('berita_acara_id,berita_acara_status,berita_acara_dihentikan,berita_acara_kode,berita_acara_tgl,berita_acara_hari,berita_acara_kronologi,berita_acara_penerima_laporan,berita_acara_kepala_uptd,pelapor_nama,pelapor_tgl,pelapor_tempat,pelapor_idusers,pelapor_nik,pelapor_pekerjaan,pelapor_telepon,pelapor_kab,pelapor_kec,pelapor_desa,korban_nik,korban_nama,korban_jeniskelamin,korban_agama,korban_tempat,korban_tgl_lahir,korban_prop,korban_kab,korban_kec,korban_desa,korban_foto1,korban_foto2,korban_email,korban_telepon,korban_tglkejadian,pelaku_nama,pelaku_jenis_kelamin,pelaku_usia,pelaku_hubungan,pelaku_pendidikan,pelaku_alamat,pelaku_prop,pelaku_kab,pelaku_kec,pelaku_desa,pelaku_nik,lapor_anonim,lapor_rahasia,lapor_status,lapor_kategori,lapor_disposisi,lapor_klarifikasi,create_at,update_at,delete_at,user_id');
//        $this->datatables->from('tbl_ppa_berita_acara');
//       if ($_SESSION['id_user_level'] == 3) {
//            $this->datatables->where('tbl_ppa_berita_acara.id_users', $_SESSION['id_users']);
//        }
//        $this->datatables->add_column('action', anchor(site_url('kelola_berita_acara/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
//            ".anchor(site_url('kelola_berita_acara/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
//                ".anchor(site_url('kelola_berita_acara/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'berita_acara_id');
//        return $this->datatables->generate();
//    }
    
    // datatables
    function json() {
      
        $this->datatables->select('berita_acara_id,berita_acara_status,berita_acara_dihentikan,berita_acara_kode,berita_acara_tgl,berita_acara_hari,berita_acara_kronologi,berita_acara_penerima_laporan,berita_acara_kepala_uptd,pelapor_nama,pelapor_tgl,pelapor_tempat,pelapor_idusers,pelapor_nik,pelapor_pekerjaan,pelapor_telepon,pelapor_kab,pelapor_kec,pelapor_desa,korban_nik,korban_nama,korban_jeniskelamin,korban_agama,korban_tempat,korban_tgl_lahir,korban_prop,korban_kab,korban_kec,korban_desa,korban_foto1,korban_foto2,korban_email,korban_telepon,korban_tglkejadian,pelaku_nama,pelaku_jenis_kelamin,pelaku_usia,pelaku_hubungan,pelaku_pendidikan,pelaku_alamat,pelaku_prop,pelaku_kab,pelaku_kec,pelaku_desa,pelaku_nik,lapor_anonim,lapor_rahasia,lapor_status,lapor_kategori,lapor_disposisi,lapor_klarifikasi,create_at,update_at,delete_at,user_id');
        $this->datatables->from('tbl_ppa_berita_acara');
        
        //add this line for join
        //$this->datatables->join('table2', 'tbl_ppa_berita_acara.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('kelola_berita_acara/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('kelola_berita_acara/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('kelola_berita_acara/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'berita_acara_id');
        return $this->datatables->generate();
    }
    
    

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('tbl_user', 'tbl_user.id_users = tbl_ppa_berita_acara.pelapor_idusers','left');
    
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('berita_acara_id', $q);
	$this->db->or_like('berita_acara_status', $q);
	$this->db->or_like('berita_acara_dihentikan', $q);
	$this->db->or_like('berita_acara_kode', $q);
	$this->db->or_like('berita_acara_tgl', $q);
	$this->db->or_like('berita_acara_hari', $q);
	$this->db->or_like('berita_acara_kronologi', $q);
	$this->db->or_like('berita_acara_penerima_laporan', $q);
	$this->db->or_like('berita_acara_kepala_uptd', $q);
	$this->db->or_like('pelapor_nama', $q);
	$this->db->or_like('pelapor_tgl', $q);
	$this->db->or_like('pelapor_tempat', $q);
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
	$this->db->or_like('korban_desa', $q);
	$this->db->or_like('korban_kec', $q);
	$this->db->or_like('pelaku_nama', $q);
	$this->db->or_like('pelaku_jenis_kelamin', $q);
	$this->db->or_like('pelaku_usia', $q);
	$this->db->or_like('pelaku_hubungan', $q);
	$this->db->or_like('pelaku_pendidikan', $q);
	$this->db->or_like('pelaku_alamat', $q);
	$this->db->or_like('pelaku_desa', $q);
	$this->db->or_like('pelaku_kec', $q);
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
    function get_limit_data($limit, $start = 0, $q = NULL) {
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
	$this->db->or_like('pelapor_nama', $q);
	$this->db->or_like('pelapor_tgl', $q);
	$this->db->or_like('pelapor_tempat', $q);
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
	$this->db->or_like('korban_desa', $q);
	$this->db->or_like('korban_kec', $q);
	$this->db->or_like('pelaku_nama', $q);
	$this->db->or_like('pelaku_jenis_kelamin', $q);
	$this->db->or_like('pelaku_usia', $q);
	$this->db->or_like('pelaku_hubungan', $q);
	$this->db->or_like('pelaku_pendidikan', $q);
	$this->db->or_like('pelaku_alamat', $q);
	$this->db->or_like('pelaku_desa', $q);
	$this->db->or_like('pelaku_kec', $q);
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

/* End of file Model_berita.php */
/* Location: ./application/models/Model_berita.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-02-17 07:53:37 */
/* http://harviacode.com */