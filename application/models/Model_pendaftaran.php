<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


 //var_dump($_SESSION)or die();
class Model_pendaftaran extends CI_Model
{

    public $table = 'tbl_user';
    public $id = 'id_users';
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
      
      
        function checkUsername($username) {

        $this->db->where('username', $username);
        $this->db->from('tbl_user');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }
    
     function cek_Phone($phone) {
     //  var_dump($phone) or die();
        $this->db->where('phone', $phone);
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

    function get_propinsi()
	{
    	
        $query = $this->db->get('reg_provinces');
    return $query->result_array();
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

       
        $hasil = $this->db->query(" SELECT
	
	reg_villages.id as id_desa, 
	reg_villages.district_id , 
	reg_villages.`name` as nama_desa
FROM
	reg_villages 
        where
	reg_villages.district_id=$id");
        return $hasil->result();
    }

    // datatables
    function json() {
       
       
        $this->datatables->select('id_users,full_name,kota_lahir,birth,email,password,images,id_user_level,is_aktif,username,id_skpd,province_id,regency_id,district_id,village_id,rw_id,rt_id,verified_email,google_id,google_image,division_sub,nik,pekerjaan,penyandang_disabilitas,alamat_domisili,phone');
        $this->datatables->from('tbl_user');

        if ($_SESSION['id_user_level'] == 3) {
            $this->datatables->where('tbl_user.id_users', $_SESSION['id_users']);
 
              $this->datatables->add_column('action', anchor(site_url('kelola_pendaftaran/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('kelola_pendaftaran/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ", 'id_users');
                return $this->datatables->generate();
        
               
        }else
        {
          $this->datatables->where('1','1');   
             $this->datatables->add_column('action', anchor(site_url('kelola_pendaftaran/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('kelola_pendaftaran/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('kelola_pendaftaran/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_users');
                return $this->datatables->generate();
        }
                
                 
    }
    
    
     function json_pencarian() {
       
        $this->datatables->select('id_users,full_name,kota_lahir,nik,alamat_domisili');
        $this->datatables->from('tbl_user');

        if ($_SESSION['id_user_level'] == 3) {
            $this->datatables->where('tbl_user.id_users', $_SESSION['id_users']);
        }
        //add this line for join
//        $this->datatables->join('table2', 'tbl_user.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('kelola_pendaftaran/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('kelola_pendaftaran/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('kelola_pendaftaran/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_users');
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
        //var_dump($id) or die();
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_users', $q);
	$this->db->or_like('full_name', $q);
	$this->db->or_like('kota_lahir', $q);
	$this->db->or_like('birth', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('images', $q);
	$this->db->or_like('id_user_level', $q);
	$this->db->or_like('is_aktif', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('id_skpd', $q);
	$this->db->or_like('province_id', $q);
	$this->db->or_like('regency_id', $q);
	$this->db->or_like('district_id', $q);
	$this->db->or_like('village_id', $q);
	$this->db->or_like('rw_id', $q);
	$this->db->or_like('rt_id', $q);
	$this->db->or_like('verified_email', $q);
	$this->db->or_like('google_id', $q);
	$this->db->or_like('google_image', $q);
	$this->db->or_like('division_sub', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->or_like('penyandang_disabilitas', $q);
	$this->db->or_like('alamat_domisili', $q);
	$this->db->or_like('pihak_konfirmasi', $q);
	$this->db->or_like('email_konfirmasi', $q);
	$this->db->or_like('hp_konfirmasi', $q);
	$this->db->or_like('ket_laporan', $q);
	$this->db->or_like('create_time', $q);
	$this->db->or_like('update_time', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        
      $sql = "SELECT tbl_user.*,reg_districts.`name` AS kecamatan FROM tbl_user LEFT JOIN reg_districts ON reg_districts.id = tbl_user.district_id";

        $sql .= " where 1=1  ";

        if ($_SESSION['id_user_level']==2) {
            $sql .= " AND tbl_user.district_id = ".$_SESSION['district_id']." ORDER BY tbl_user.create_time DESC ";
       
         }
		$query = $this->db->query($sql);
	
        return $query->result();
    }

    // insert data
    function insert($data)
    {
          $this->db->set('id_users','UUID()',FALSE);
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

/* End of file Model_pendaftaran.php */
/* Location: ./application/models/Model_pendaftaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-02-15 03:45:14 */
/* http://harviacode.com */