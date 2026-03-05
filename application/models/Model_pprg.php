<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_pprg extends CI_Model
{

    public $table = 'tb_kak';
     public $table_unit = 'ref_department';
    public $id = 'Id_kak';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    
     
    function search_program($title){
 
        $this->db->like('nama_program', $title , 'both');
        $this->db->order_by('nama_program', 'ASC');
        $this->db->limit(20);
        return $this->db->get('ref_program')->result();
    }

    function search_giat($title){
 
        $this->db->like('nama_giat', $title , 'both');
        $this->db->order_by('nama_giat', 'ASC');
        $this->db->limit(20);
        return $this->db->get('ref_program')->result();
    }

    // datatables
    function json() {
        $this->datatables->select('ref_department.name,Program as Nama_Program,Id_kak,Kode_skpd,Wawasan,Sebab_Kesenjagan_Internal,Sebab_Kesenjagan_Eksternal,Reformasi_Tujuan,Rencana_Aksi,Data_Dasar,Indikator_Gender,Tahun_Anggaran,Kode_Program,Sasaran_Program,Kegiatan,Sub_Kegiatan,Uraian_Kegiatan,Tujuan,Maksud,Dasar_Hukum,Gambaran_Umum,Cara_Pelaksanan,Tempat_Pelaksaan,Pelaksana_Penaggungjawab,Jadwal,Biaya,Indikator_Kinerja,Batasan_Kegiatan,Hasil,Belanja1_Tujuan,Belanja1_Alokasianggaran,Belanja2_Tujuan,Belanja2_Alokasianggaran,Capaian_Program,Total_Anggaran,update_at,create_at,delete_at,user_id');
        $this->datatables->from('tb_kak');
        $this->datatables->join('ref_department', 'ref_department.id_department=tb_kak.Kode_skpd', 'left');

        if ($_SESSION['id_user_level'] == 2) {
        $this->datatables->where('tb_kak.kode_skpd', $_SESSION['id_skpd']);
        }
        //add this line for join
        //$this->datatables->join('table2', 'tb_kak.field = table2.field');
        $this->datatables->add_column('action',anchor(site_url('kelola_pprg/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm data-toggle="tooltip" data-placement="top" title="GBS"'))." 
        ".anchor(site_url('kelola_pprg/read_gap/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm btn-sm data-toggle="tooltip" data-placement="top" title="GAP"'))." 
        ".anchor(site_url('kelola_pprg/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
        ".anchor(site_url('kelola_pprg/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'Id_kak');
        return $this->datatables->generate();
        
    }

    // get all
    function get_all()
    {

                $data = $this->db->query("SELECT
                ref_department.name,
                tb_kak.Tahun_Anggaran,
                tb_kak.Kode_Program,
                tb_kak.Program,
                tb_kak.Kegiatan,
                rencana_aksi.sub_kegiatan,
                rencana_aksi.Biaya 
                FROM
                tb_kak
                LEFT JOIN rencana_aksi  ON Rencana_Aksi.kak_id = tb_kak.Id_kak 
                LEFT JOIN ref_department  ON ref_department.id_department = tb_kak.Kode_skpd 
                where Tahun_Anggaran='".$_SESSION['Tahun_Anggaran']."'");
                return $data->result();
    }

    function report_program(){
                            $data = $this->db->query("select ref_department.`name`, 
                                               ref_department.jabatan, 
                                               ref_department.leader, 
                                               ref_department.pangkat, 
                                               ref_department.nip_leader, 
                                               tb_kak.Tahun_Anggaran, 
                                               tb_kak.Kode_Program, 
                                               tb_kak.Program, 
                                               tb_kak.Id_kak,
                                               tb_kak.Kegiatan, 
                                               rencana_aksi.sub_kegiatan,
                                               rencana_aksi.sub_kegiatan,
                                               rencana_aksi.id,
                                               SUM(rencana_aksi.Biaya) AS Biaya
                                               FROM tb_kak
                                               LEFT JOIN rencana_aksi on rencana_aksi.kak_id=tb_kak.Id_kak
                                               LEFT JOIN ref_department ON  ref_department.id_department = tb_kak.Kode_skpd
                                               WHERE
                                               Tahun_Anggaran='" . $_SESSION['Tahun_Anggaran'] . "' GROUP BY rencana_aksi.id ORDER BY  ref_department.`name` asc");
                               return $data->result();
    }  
    
    
    
    
    
    function report_rencana_aksi ()
    {
        
                                    $data = $this->db->query("SELECT
                                    rencana_aksi.kak_id,
                                    rencana_aksi.sub_kegiatan,
                                    rencana_aksi.tujuan_pprg,
                                    rencana_aksi.biaya 
                                    FROM
                                    rencana_aksi
                                    INNER JOIN tb_kak ON tb_kak.Id_kak = rencana_aksi.kak_id WHERE 1=1");
                                      return $data->result();
    }
    
    
    
      function report_rencana_aksi_total (){
      $data = $this->db->query("SELECT
                                    rencana_aksi.kak_id,
                                    rencana_aksi.sub_kegiatan,
                                    rencana_aksi.tujuan_pprg,
                                    SUM(rencana_aksi.biaya) as total 
                                    FROM
                                    rencana_aksi
                                    INNER JOIN tb_kak ON tb_kak.Id_kak = rencana_aksi.kak_id 
                                    WHERE
                                    1 =1 GROUP BY tb_kak.Tahun_Anggaran");
     //   ambil satu data
           $ret = $data->row();
            return $ret->total;
    }
    
    
       function grafik_biaya_pprg (){
                        $data = $this->db->query("SELECT
                                                ref_department.`name`,
                                               SUM( IFNULL(rencana_aksi.Biaya,0))AS biaya 
                                                FROM tb_kak
                                                LEFT JOIN rencana_aksi ON rencana_aksi.kak_id = tb_kak.Id_kak
                                                LEFT JOIN ref_department ON ref_department.id_department = tb_kak.Kode_skpd 
                                                WHERE Tahun_Anggaran =  '" . $_SESSION['Tahun_Anggaran'] . "'
                                                GROUP BY tb_kak.Kode_skpd ORDER BY biaya DESC");
        return $data->result();
        
     
    }


    // get data by id
    function get_by_id($id)
    {
        
         $this->db->select('*');
        $this->db->join('ref_department', 'ref_department.id_department=tb_kak.Kode_skpd', 'left');
        $this->db->where($this->table . '.Id_kak', $id);

        //  return $this->db->get();
        
//        $this->db->select('ref_department.name,Program as Nama_Program,Id_kak,Kode_skpd,Wawasan,Faktor_Kesenjangan_akses,Sebab_Kesenjagan_Internal,Sebab_Kesenjagan_Eksternal,Reformasi_Tujuan,Rencana_Aksi,Data_Dasar,Indikator_Gender,Tahun_Anggaran,Kode_Program,Sasaran_Program,Kegiatan,Sub_Kegiatan,Uraian_Kegiatan,Tujuan,Maksud,Dasar_Hukum,Gambaran_Umum,Cara_Pelaksanan,Tempat_Pelaksaan,Pelaksana_Penaggungjawab,Jadwal,Biaya,Indikator_Kinerja,Batasan_Kegiatan,Hasil,Belanja1_Tujuan,Belanja1_Alokasianggaran,Belanja2_Tujuan,Belanja2_Alokasianggaran,Capaian_Program,Total_Anggaran,update_at,create_at,delete_at,user_id');
//        $this->db->join('ref_department', 'ref_department.id_department=tb_kak.Kode_skpd', 'left');
//        $this->db->where($this->table.'.Id_kak', $id);

        return $this->db->get($this->table)->row();
           
//        $this->db->where($this->id, $id);
//        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('Id_kak', $q);
	$this->db->or_like('Kode_skpd', $q);
	$this->db->or_like('Wawasan', $q);
	$this->db->or_like('Faktor_Kesenjangan_akses', $q);
	$this->db->or_like('Sebab_Kesenjagan_Internal', $q);
	$this->db->or_like('Sebab_Kesenjagan_Eksternal', $q);
	$this->db->or_like('Reformasi_Tujuan', $q);
	$this->db->or_like('Rencana_Aksi', $q);
	$this->db->or_like('Data_Dasar', $q);
	$this->db->or_like('Indikator_Gender', $q);
	$this->db->or_like('Tahun_Anggaran', $q);
	$this->db->or_like('Kode_Program', $q);
	$this->db->or_like('Sasaran_Program', $q);
	$this->db->or_like('Program', $q);
	$this->db->or_like('Kegiatan', $q);
	$this->db->or_like('Sub_Kegiatan', $q);
	$this->db->or_like('Uraian_Kegiatan', $q);
	$this->db->or_like('Tujuan', $q);
	$this->db->or_like('Maksud', $q);
	$this->db->or_like('Dasar_Hukum', $q);
	$this->db->or_like('Gambaran_Umum', $q);
	$this->db->or_like('Cara_Pelaksanan', $q);
	$this->db->or_like('Tempat_Pelaksaan', $q);
	$this->db->or_like('Pelaksana_Penaggungjawab', $q);
	
	$this->db->or_like('Jadwal', $q);
	$this->db->or_like('Biaya', $q);
	$this->db->or_like('Indikator_Kinerja', $q);
	$this->db->or_like('Batasan_Kegiatan', $q);
	$this->db->or_like('Hasil', $q);
	$this->db->or_like('Belanja1_Tujuan', $q);
	$this->db->or_like('Belanja1_Alokasianggaran', $q);
	$this->db->or_like('Belanja2_Tujuan', $q);
	$this->db->or_like('Belanja2_Alokasianggaran', $q);
	$this->db->or_like('Capaian_Program', $q);
	$this->db->or_like('Total_Anggaran', $q);
	$this->db->or_like('update_at', $q);
	$this->db->or_like('create_at', $q);
	$this->db->or_like('delete_at', $q);
	$this->db->or_like('user_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('Id_kak', $q);
	$this->db->or_like('Kode_skpd', $q);
	$this->db->or_like('Wawasan', $q);
	$this->db->or_like('Faktor_Kesenjangan_akses', $q);
	$this->db->or_like('Sebab_Kesenjagan_Internal', $q);
	$this->db->or_like('Sebab_Kesenjagan_Eksternal', $q);
	$this->db->or_like('Reformasi_Tujuan', $q);
	$this->db->or_like('Rencana_Aksi', $q);
	$this->db->or_like('Data_Dasar', $q);
	$this->db->or_like('Indikator_Gender', $q);
	$this->db->or_like('Tahun_Anggaran', $q);
	$this->db->or_like('Kode_Program', $q);
	$this->db->or_like('Sasaran_Program', $q);
	$this->db->or_like('Program', $q);
	$this->db->or_like('Kegiatan', $q);
	$this->db->or_like('Sub_Kegiatan', $q);
	$this->db->or_like('Uraian_Kegiatan', $q);
	$this->db->or_like('Tujuan', $q);
	$this->db->or_like('Maksud', $q);
	$this->db->or_like('Dasar_Hukum', $q);
	$this->db->or_like('Gambaran_Umum', $q);
	$this->db->or_like('Cara_Pelaksanan', $q);
	$this->db->or_like('Tempat_Pelaksaan', $q);
	$this->db->or_like('Pelaksana_Penaggungjawab', $q);
	
	$this->db->or_like('Jadwal', $q);
	$this->db->or_like('Biaya', $q);
	$this->db->or_like('Indikator_Kinerja', $q);
	$this->db->or_like('Batasan_Kegiatan', $q);
	$this->db->or_like('Hasil', $q);
	$this->db->or_like('Belanja1_Tujuan', $q);
	$this->db->or_like('Belanja1_Alokasianggaran', $q);
	$this->db->or_like('Belanja2_Tujuan', $q);
	$this->db->or_like('Belanja2_Alokasianggaran', $q);
	$this->db->or_like('Capaian_Program', $q);
	$this->db->or_like('Total_Anggaran', $q);
	$this->db->or_like('update_at', $q);
	$this->db->or_like('create_at', $q);
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

/* End of file Model_pprg.php */
/* Location: ./application/models/Model_pprg.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-11 17:42:23 */
/* http://harviacode.com */