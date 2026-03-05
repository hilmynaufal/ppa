<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_register extends CI_Model
{

    public $table = 'tbl_user';
    public $id = 'id_user';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    
      function get_kabupaten($id) {

        $hasil = $this->db->query(" SELECT reg_regencies.id as id_kab, reg_regencies.name as name_province, reg_regencies.province_id  FROM reg_regencies where reg_regencies.province_id=$id");
        return $hasil->result();
    }

    function get_kecamatan($id) {

        ///  var_dump($id)or die();
        $hasil = $this->db->query(" SELECT
	
	reg_districts.id as id_kec, 
	reg_districts.regency_id as id_kab, 
	reg_districts.`name` as nama_kec
        FROM  reg_districts where
	reg_districts.regency_id=$id");
        return $hasil->result();
    }
    
       function get_desa($id) {

        ///  var_dump($id)or die();
        $hasil = $this->db->query(" SELECT reg_villages.id as id_desa, reg_villages.district_id ,reg_villages.`name` as nama_desa FROM reg_villages 
        where reg_villages.district_id=$id");
        return $hasil->result();
    }
    
   

    // datatables
    function json() {
        $this->datatables->select('sid_user,create_time,update_time,visit_time,verified_time,code,fullname,gender,birth,phone,email,username,password,description,level,division,division_sub,image,ipaddress,active,status,token,province_id,regency_id,district_id,village_id,rt_id,rw_id,verified_email,google_id,google_image,nik,pekerjaan,penyandang_disabilitas,alamat_domisili,tgl_lahir,pihak_konfirmasi,email_pihak_konfirmasi,hp_konfirmasi');
        $this->datatables->from('tbl_user');
        //add this line for join
        //$this->datatables->join('table2', 'user.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('kelola_register/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('kelola_register/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('kelola_register/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_user');
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
        $this->db->like('id_user', $q);
	$this->db->or_like('create_time', $q);
	$this->db->or_like('update_time', $q);
	$this->db->or_like('visit_time', $q);
	$this->db->or_like('verified_time', $q);
	$this->db->or_like('code', $q);
	$this->db->or_like('fullname', $q);
	$this->db->or_like('gender', $q);
	$this->db->or_like('birth', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('level', $q);
	$this->db->or_like('division', $q);
	$this->db->or_like('division_sub', $q);
	$this->db->or_like('image', $q);
	$this->db->or_like('ipaddress', $q);
	$this->db->or_like('active', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('token', $q);
	$this->db->or_like('province_id', $q);
	$this->db->or_like('regency_id', $q);
	$this->db->or_like('district_id', $q);
	$this->db->or_like('village_id', $q);
	$this->db->or_like('rt_id', $q);
	$this->db->or_like('rw_id', $q);
	$this->db->or_like('verified_email', $q);
	$this->db->or_like('google_id', $q);
	$this->db->or_like('google_image', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->or_like('penyandang_disabilitas', $q);
	$this->db->or_like('alamat_domisili', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('pihak_konfirmasi', $q);
	$this->db->or_like('email_pihak_konfirmasi', $q);
	$this->db->or_like('hp_konfirmasi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_user', $q);
	$this->db->or_like('create_time', $q);
	$this->db->or_like('update_time', $q);
	$this->db->or_like('visit_time', $q);
	$this->db->or_like('verified_time', $q);
	$this->db->or_like('code', $q);
	$this->db->or_like('fullname', $q);
	$this->db->or_like('gender', $q);
	$this->db->or_like('birth', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('level', $q);
	$this->db->or_like('division', $q);
	$this->db->or_like('division_sub', $q);
	$this->db->or_like('image', $q);
	$this->db->or_like('ipaddress', $q);
	$this->db->or_like('active', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('token', $q);
	$this->db->or_like('province_id', $q);
	$this->db->or_like('regency_id', $q);
	$this->db->or_like('district_id', $q);
	$this->db->or_like('village_id', $q);
	$this->db->or_like('rt_id', $q);
	$this->db->or_like('rw_id', $q);
	$this->db->or_like('verified_email', $q);
	$this->db->or_like('google_id', $q);
	$this->db->or_like('google_image', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->or_like('penyandang_disabilitas', $q);
	$this->db->or_like('alamat_domisili', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('pihak_konfirmasi', $q);
	$this->db->or_like('email_pihak_konfirmasi', $q);
	$this->db->or_like('hp_konfirmasi', $q);
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

/* End of file Model_register.php */
/* Location: ./application/models/Model_register.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-02-09 07:05:44 */
/* http://harviacode.com */