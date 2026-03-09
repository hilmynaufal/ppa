<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_pendampingan extends CI_Model
{
    
 public $table2 = 'tbl_ppa_berita_acara';
    public $table = 'tbl_ppa_pendampingan';
    public $id = 'layanan_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('tbl_ppa_pendampingan.layanan_id,tbl_ppa_berita_acara.korban_nama, 
	tbl_ppa_berita_acara.korban_nik, 
	tbl_ppa_berita_acara.korban_kec, 
	tbl_ppa_pendampingan.kode_beritaacara, 
	tbl_ppa_pendampingan.layanan_tgl, 
	tbl_ppa_pendampingan.layanan_jenis, 
	tbl_ppa_pendampingan.tindak_lanjut1, 
	tbl_ppa_berita_acara.korban_telepon,ref_progres.progres_nama'
    );
        $this->datatables->from('tbl_ppa_pendampingan');
        //add this line for join
        $this->datatables->join('tbl_ppa_berita_acara', 'tbl_ppa_berita_acara.berita_acara_kode = tbl_ppa_pendampingan.kode_beritaacara','left');
        $this->datatables->join('ref_progres', 'ref_progres.progres_id=tbl_ppa_pendampingan.layanan_progress','left');
       
        $this->datatables->group_by('tbl_ppa_pendampingan.layanan_id');
        $this->datatables->add_column('action', anchor(site_url('kelola_pendampingan/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('kelola_pendampingan/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('kelola_pendampingan/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')")."
                ".anchor(site_url('kelola_pendampingan/report/$1'),'<i class="fa fa-file-pdf-o" aria-hidden="true"></i>', array('class' => 'btn btn-primary btn-sm', 'target' => '_blank')), 'layanan_id');
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
//        $this->db->where($this->id, $id);
//        return $this->db->get($this->table)->row();

        $this->db->select('*');
     
        $this->db->join('tbl_ppa_berita_acara','tbl_ppa_berita_acara.berita_acara_kode=tbl_ppa_pendampingan.kode_beritaacara','inner');
        $this->db->where('tbl_ppa_pendampingan.layanan_id', $id);
       return $this->db->get($this->table)->row();
       
       
       
//       $this->db->select('tbl_user.username,tbl_user.userid,tbl_usercategory.type');
//$this->db->from('tbl_user');
//$this->db->join('tbl_usercategory','tbl_usercategory.usercategoryid=tbl_user.usercategoryid','Left');
//$query=$this->db->get();
        

        
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('layanan_id', $q);
	$this->db->or_like('kode_beritaacara', $q);
	$this->db->or_like('layanan_tgl', $q);
	$this->db->or_like('layanan_jenis', $q);
	$this->db->or_like('layanan_keterangan', $q);
	$this->db->or_like('layanan_rtl', $q);
	$this->db->or_like('layanan_progress', $q);
	$this->db->or_like('layanan_foto1', $q);
	$this->db->or_like('layanan_foto2', $q);
	$this->db->or_like('layanan_foto3', $q);
	$this->db->or_like('tindak_lanjut1', $q);
	$this->db->or_like('tindak_lanjut2', $q);
	$this->db->or_like('tindak_lanjut3', $q);
        $this->db->or_like('korban_nik', $q);
	$this->db->or_like('korban_nama', $q);
	$this->db->or_like('korban_jeniskelamin', $q);
	$this->db->or_like('korban_agama', $q);
	$this->db->or_like('korban_tempat', $q);
	$this->db->or_like('korban_tgl_lahir', $q);
	$this->db->or_like('creat_at', $q);
	$this->db->or_like('update_at', $q);
	$this->db->or_like('delete_at', $q);
	$this->db->or_like('id_users', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('layanan_id', $q);
	$this->db->or_like('kode_beritaacara', $q);
	$this->db->or_like('layanan_tgl', $q);
	$this->db->or_like('layanan_jenis', $q);
	$this->db->or_like('layanan_keterangan', $q);
	$this->db->or_like('layanan_rtl', $q);
	$this->db->or_like('layanan_progress', $q);
	$this->db->or_like('layanan_foto1', $q);
	$this->db->or_like('layanan_foto2', $q);
	$this->db->or_like('layanan_foto3', $q);
	$this->db->or_like('tindak_lanjut1', $q);
	$this->db->or_like('tindak_lanjut2', $q);
	$this->db->or_like('tindak_lanjut3', $q);
        $this->db->or_like('korban_nik', $q);
	$this->db->or_like('korban_nama', $q);
	$this->db->or_like('korban_jeniskelamin', $q);
	$this->db->or_like('korban_agama', $q);
	$this->db->or_like('korban_tempat', $q);
	$this->db->or_like('korban_tgl_lahir', $q);
	$this->db->or_like('creat_at', $q);
	$this->db->or_like('update_at', $q);
	$this->db->or_like('delete_at', $q);
	$this->db->or_like('id_users', $q);
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

/* End of file Model_pendampingan.php */
/* Location: ./application/models/Model_pendampingan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-07 03:23:55 */
/* http://harviacode.com */