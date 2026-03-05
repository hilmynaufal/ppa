<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_home extends CI_Model
{

    public $table = 'tbl_relaas';
    public $id = 'id_relaas';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

     function checkUserNik($nik) {
      
        $this->db->where('nik', $nik);
        $this->db->from('tbl_user');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          return true;
        }
        return false; 
      }
      
       function checkEmail($email) {

        $this->db->where('email', $email);
        $this->db->from('tbl_user');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }
    // datatables
    function json() {
               
        $this->datatables->select('id_relaas,nama_undangan,keterangan,tgl_pengumuman,berkas,user_id,create_at,update_at,delete_at');
        $this->datatables->from('tbl_relaas');
        $this->datatables->where('delete_at is  NULL', NULL, FALSE);
        //add this line for join
        //$this->datatables->join('table2', 'tbl_relaas.field = table2.field');
        $this->datatables->add_column('action', anchor(('http://localhost/bandungkab/relaas/upload_relaas/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-primary')), 'id_relaas');
       
        return $this->datatables->generate();
        }
    
    public function tampil_akta() {
          $this->db->select('ref_status_berkas.keterangan_proses,
	ref_jenis_akta.nama_jenis, 
	tbl_ajb.id_ajb, 
	tbl_ajb.kode_akta, 
	tbl_ajb.penjual, 
	tbl_ajb.nik_penjual, 
	tbl_ajb.ktp_penjual, 
	tbl_ajb.pembeli, 
	tbl_ajb.nik_pembeli, 
	tbl_ajb.ktp_pembeli, 
	tbl_ajb.jenis_akta, 
	tbl_ajb.nomor_akta, 
	tbl_ajb.tanggal_akta, 
	tbl_ajb.letter_kohir, 
	tbl_ajb.letter_nopersil, 
	tbl_ajb.letter_blok, 
	tbl_ajb.luas, 
	tbl_ajb.batas_utara, 
	tbl_ajb.batas_selatan, 
	tbl_ajb.batas_timur, 
	tbl_ajb.batas_barat, 
	tbl_ajb.nilai_transaksi, 
	tbl_ajb.status_berkas, 
	tbl_ajb.sppt_pbb, 
	tbl_ajb.resi, 
	tbl_ajb.keterangan, 
	tbl_ajb.keterangan_tercatat');
        $this->db->from('tbl_ajb');
        $this->db->join('ref_jenis_akta', 'ref_jenis_akta.id_jenis = tbl_ajb.jenis_akta', 'left');
          $this->db->join('ref_status_berkas', 'ref_status_berkas.id=tbl_ajb.status_berkas', 'left');
      //  $this->db->where('delete_at is  NULL', NULL, FALSE);
        $this->db->order_by('update_at', 'desc');
      //  $this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
    }
    
//    public function show_ticker(){
//        
//        $this->db->select('nama_pengadilan,nama_pihak,jenis_pihak,pengadilan,no_perkara,keterangan,tanggal_hadir_sidang,tgl_pengumuman,id_relaas');
//        $this->db->from('tbl_relaas');
//        $this->db->join('ref_pengadilan', 'ref_pengadilan.id_pengadilan=tbl_relaas.pengadilan', 'left');
////        $this->db->where('delete_at is  NULL', NULL, FALSE);
//        $this->db->order_by('kode_akta', 'desc');
//        $this->db->limit(10);
//        $query = $this->db->get();
//        return $query->result();
//                 
//    }
    
    
    

}

