<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_ligitasi extends CI_Model
{

    public $table = 'tbl_ligitasi';
    public $id = 'id_pelayanan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('ref_perkara.perkara,ref_sengketa.nama_sengketa,ref_pengadilan.nama_pengadilan as nama_pengadilan,ref_department.name,id_pelayanan,kode_layanan,skpd_id,nama_pejabat,review,tbl_ligitasi.status,status_sengketa,jenis_perkara,pengadilan,ref_jenis_pihak.jenis_pihak,file1,file2,file3,file4,nama_pic,hp_pic');
        $this->datatables->from('tbl_ligitasi');
        //add this line for join
     
        $this->datatables->join('ref_department', 'ref_department.id_department=tbl_ligitasi.skpd_id', 'left');
        $this->datatables->join('ref_jenis_pihak', 'ref_jenis_pihak.id_jenis=tbl_ligitasi.jenis_pihak', 'left');
        $this->datatables->join('ref_sengketa', 'ref_sengketa.id_sengketa=tbl_ligitasi.status_sengketa', 'left');
        $this->datatables->join('ref_perkara', 'ref_perkara.id_perkara=tbl_ligitasi.jenis_perkara ', 'left');
        $this->datatables->join('ref_pengadilan', 'ref_pengadilan.id_pengadilan=tbl_ligitasi.pengadilan', 'left');
        $this->datatables->where('delete_at is  NULL', NULL, FALSE);
        
        if ($_SESSION['id_user_level'] == 2) {
        $this->datatables->where('tbl_ligitasi.skpd_id', $_SESSION['id_skpd']);
       }
        
        $this->datatables->add_column('action', anchor(site_url('kelola_ligitasi/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('kelola_ligitasi/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('kelola_ligitasi/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pelayanan');
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
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pelayanan', $q);
	$this->db->or_like('kode_layanan', $q);
	$this->db->or_like('skpd_id', $q);
	$this->db->or_like('nama_pejabat', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('review', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('jenis_pengadilan', $q);
	$this->db->or_like('status_sengketa', $q);
	$this->db->or_like('jenis_perkara', $q);
	$this->db->or_like('pengadilan', $q);
	$this->db->or_like('jenis_pihak', $q);
	$this->db->or_like('file1', $q);
	$this->db->or_like('file2', $q);
	$this->db->or_like('file3', $q);
	$this->db->or_like('file4', $q);
	$this->db->or_like('nama_pic', $q);
	$this->db->or_like('hp_pic', $q);
	$this->db->or_like('create_at', $q);
	$this->db->or_like('update_at', $q);
	$this->db->or_like('delete_at', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pelayanan', $q);
	$this->db->or_like('kode_layanan', $q);
	$this->db->or_like('skpd_id', $q);
	$this->db->or_like('nama_pejabat', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('review', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('jenis_pengadilan', $q);
	$this->db->or_like('status_sengketa', $q);
	$this->db->or_like('jenis_perkara', $q);
	$this->db->or_like('pengadilan', $q);
	$this->db->or_like('jenis_pihak', $q);
	$this->db->or_like('file1', $q);
	$this->db->or_like('file2', $q);
	$this->db->or_like('file3', $q);
	$this->db->or_like('file4', $q);
	$this->db->or_like('nama_pic', $q);
	$this->db->or_like('hp_pic', $q);
	$this->db->or_like('create_at', $q);
	$this->db->or_like('update_at', $q);
	$this->db->or_like('delete_at', $q);
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

/* End of file Model_ligitasi.php */
/* Location: ./application/models/Model_ligitasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-25 22:28:28 */
/* http://harviacode.com */