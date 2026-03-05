<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelola_pendaftaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_pendaftaran');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }
        // Kabupaten
  function get_kabupaten(){
      
      //  var_dump($_POST)or die();
        $id=$this->input->post('id');
        $data=$this->Model_pendaftaran->get_kabupaten($id);
        echo json_encode($data);
    }
    
    
     function get_kecamatan(){
      
      //  var_dump($_POST)or die();
        $id=$this->input->post('id');
        $data=$this->Model_pendaftaran->get_kecamatan($id);
        echo json_encode($data);
    }
    
       function get_desa(){
      
       
        $id=$this->input->post('id');
        $data=$this->Model_pendaftaran->get_desa($id);
        echo json_encode($data);
    }
    
    

    public function index()
    {
        $this->template->load('template','kelola_pendaftaran/tbl_user_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_pendaftaran->json();
    }
    
    
    
    
    public function json_pencarian() {
        header('Content-Type: application/json');
        echo $this->Model_pendaftaran->json_pencarian();
    }
    
    
    
    

    public function read($id) 
    {
        $row = $this->Model_pendaftaran->get_by_id($id);
        if ($row) {
            $data = array(
		'id_users' => $row->id_users,
		'full_name' => $row->full_name,
		'kota_lahir' => $row->kota_lahir,
		'birth' => $row->birth,
		'phone' => $row->phone,
		'email' => $row->email,
		'password' => $row->password,
		'images' => $row->images,
		'id_user_level' => $row->id_user_level,
		'is_aktif' => $row->is_aktif,
		'username' => $row->username,
		'id_skpd' => $row->id_skpd,
		'province_id' => $row->province_id,
		'regency_id' => $row->regency_id,
		'district_id' => $row->district_id,
		'village_id' => $row->village_id,
		'rw_id' => $row->rw_id,
		'rt_id' => $row->rt_id,
		'verified_email' => $row->verified_email,
		'google_id' => $row->google_id,
		'google_image' => $row->google_image,
		'division_sub' => $row->division_sub,
		'nik' => $row->nik,
		'pekerjaan' => $row->pekerjaan,
		'penyandang_disabilitas' => $row->penyandang_disabilitas,
		'alamat_domisili' => $row->alamat_domisili,
		'pihak_konfirmasi' => $row->pihak_konfirmasi,
		'email_konfirmasi' => $row->email_konfirmasi,
		'hp_konfirmasi' => $row->hp_konfirmasi,
		'ket_laporan' => $row->ket_laporan,
		'create_time' => $row->create_time,
		'update_time' => $row->update_time,
	    );
            $this->template->load('template','kelola_pendaftaran/tbl_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pendaftaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelola_pendaftaran/create_action'),
	    'id_users' => set_value('id_users'),
	    'full_name' => set_value('full_name'),
	    'kota_lahir' => set_value('kota_lahir'),
	    'birth' => set_value('birth'),
	    'email' => set_value('email'),
	    'phone' => set_value('phone'),
            
	    'password' => set_value('password'),
	    'images' => set_value('images'),
	    'id_user_level' => set_value('id_user_level'),
	    'is_aktif' => set_value('is_aktif'),
	   
	    'id_skpd' => set_value('id_skpd'),
	    'province_id' => set_value('province_id'),
	    'regency_id' => set_value('regency_id'),
	    'district_id' => set_value('district_id'),
	    'village_id' => set_value('village_id'),
	    'rw_id' => set_value('rw_id'),
	    'rt_id' => set_value('rt_id'),
	    'verified_email' => set_value('verified_email'),
	    'google_id' => set_value('google_id'),
	    'google_image' => set_value('google_image'),
	    'division_sub' => set_value('division_sub'),
	    'nik' => set_value('nik'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'penyandang_disabilitas' => set_value('penyandang_disabilitas'),
	    'alamat_domisili' => set_value('alamat_domisili'),
	    'pihak_konfirmasi' => set_value('pihak_konfirmasi'),
	    'email_konfirmasi' => set_value('email_konfirmasi'),
	    'hp_konfirmasi' => set_value('hp_konfirmasi'),
	    'ket_laporan' => set_value('ket_laporan'),
	    'create_time' => set_value('create_time'),
	    'update_time' => set_value('update_time'),
	);
        $this->template->load('template','kelola_pendaftaran/tbl_user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'full_name' => $this->input->post('full_name',TRUE),
		'kota_lahir' => $this->input->post('kota_lahir',TRUE),
		'birth' => $this->input->post('birth',TRUE),
		'email' => $this->input->post('email',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'images' => $this->input->post('images',TRUE),
		'id_user_level' => $this->input->post('id_user_level',TRUE),
		'is_aktif' => $this->input->post('is_aktif',TRUE),
		'username' => $this->input->post('phone',TRUE),
               'password' => hash_password($this->input->post('password',TRUE)),
		'id_skpd' => $this->input->post('id_skpd',TRUE),
		'province_id' => $this->input->post('province_id',TRUE),
		'regency_id' => $this->input->post('regency_id',TRUE),
		'district_id' => $this->input->post('district_id',TRUE),
		'village_id' => $this->input->post('village_id',TRUE),
		'rw_id' => $this->input->post('rw_id',TRUE),
		'rt_id' => $this->input->post('rt_id',TRUE),
		'verified_email' => $this->input->post('verified_email',TRUE),
		'google_id' => $this->input->post('google_id',TRUE),
		'google_image' => $this->input->post('google_image',TRUE),
		'division_sub' => $this->input->post('division_sub',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'penyandang_disabilitas' => $this->input->post('penyandang_disabilitas',TRUE),
		'alamat_domisili' => $this->input->post('alamat_domisili',TRUE),
		'pihak_konfirmasi' => $this->input->post('pihak_konfirmasi',TRUE),
		'email_konfirmasi' => $this->input->post('email_konfirmasi',TRUE),
		'hp_konfirmasi' => $this->input->post('hp_konfirmasi',TRUE),
		'ket_laporan' => $this->input->post('ket_laporan',TRUE),
		'create_time' => $this->input->post('create_time',TRUE),
		'update_time' => $this->input->post('update_time',TRUE),
	    );

            $this->Model_pendaftaran->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kelola_pendaftaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_pendaftaran->get_by_id($id);
     //     $data['id']  = $this->Model_pendaftaran->get_by_id($id);
        $data['propinsi'] = $this->Model_pendaftaran->get_propinsi();
 
//        $data['perbup_data'] = $this->kepbup_model->get_by_id($id);
//        $data['perbup_upload'] = $this->kepbup_model->get_id_upload($id);
        
        
//   $this->data['pasien_data']=  $this->pasien_model->get_by_id($id);
//     
//        $this->data['breadcumb']='Pendaftaran Hewan';
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelola_pendaftaran/update_action'),
		'id_users' => set_value('id_users', $row->id_users),
		'full_name' => set_value('full_name', $row->full_name),
		'kota_lahir' => set_value('kota_lahir', $row->kota_lahir),
		'birth' => set_value('birth', $row->birth),
		'email' => set_value('email', $row->email),
		'phone' => set_value('phone', $row->phone),
		'password' => set_value('password', $row->password),
		'images' => set_value('images', $row->images),
		'id_user_level' => set_value('id_user_level', $row->id_user_level),
		'is_aktif' => set_value('is_aktif', $row->is_aktif),
		'username' => set_value('username', $row->username),
		'id_skpd' => set_value('id_skpd', $row->id_skpd),
		'province_id' => set_value('province_id', $row->province_id),
		'regency_id' => set_value('regency_id', $row->regency_id),
		'district_id' => set_value('district_id', $row->district_id),
		'village_id' => set_value('village_id', $row->village_id),
		'rw_id' => set_value('rw_id', $row->rw_id),
		'rt_id' => set_value('rt_id', $row->rt_id),
		'verified_email' => set_value('verified_email', $row->verified_email),
		'google_id' => set_value('google_id', $row->google_id),
		'google_image' => set_value('google_image', $row->google_image),
		'division_sub' => set_value('division_sub', $row->division_sub),
		'nik' => set_value('nik', $row->nik),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
		'penyandang_disabilitas' => set_value('penyandang_disabilitas', $row->penyandang_disabilitas),
		'alamat_domisili' => set_value('alamat_domisili', $row->alamat_domisili),
		'pihak_konfirmasi' => set_value('pihak_konfirmasi', $row->pihak_konfirmasi),
		'email_konfirmasi' => set_value('email_konfirmasi', $row->email_konfirmasi),
		'hp_konfirmasi' => set_value('hp_konfirmasi', $row->hp_konfirmasi),
		'ket_laporan' => set_value('ket_laporan', $row->ket_laporan),
		'create_time' => set_value('create_time', $row->create_time),
		'update_time' => set_value('update_time', $row->update_time),
                'propinsi' => $this->Model_pendaftaran->get_propinsi()
	    );
        
            $this->template->load('template','kelola_pendaftaran/tbl_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pendaftaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_users', TRUE));
        } else {
            $data = array(
		'full_name' => $this->input->post('full_name',TRUE),
		'kota_lahir' => $this->input->post('kota_lahir',TRUE),
		'birth' => $this->input->post('birth',TRUE),
		'email' => $this->input->post('email',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'images' => $this->input->post('images',TRUE),
		'id_user_level' => $this->input->post('id_user_level',TRUE),
		'is_aktif' => $this->input->post('is_aktif',TRUE),
		
		'id_skpd' => $this->input->post('id_skpd',TRUE),
		'province_id' => $this->input->post('province_id',TRUE),
		'regency_id' => $this->input->post('regency_id',TRUE),
		'district_id' => $this->input->post('district_id',TRUE),
		'village_id' => $this->input->post('village_id',TRUE),
		'rw_id' => $this->input->post('rw_id',TRUE),
		'rt_id' => $this->input->post('rt_id',TRUE),
		'verified_email' => $this->input->post('verified_email',TRUE),
		'google_id' => $this->input->post('google_id',TRUE),
		'google_image' => $this->input->post('google_image',TRUE),
		'division_sub' => $this->input->post('division_sub',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'penyandang_disabilitas' => $this->input->post('penyandang_disabilitas',TRUE),
		'alamat_domisili' => $this->input->post('alamat_domisili',TRUE),
		'pihak_konfirmasi' => $this->input->post('pihak_konfirmasi',TRUE),
		'email_konfirmasi' => $this->input->post('email_konfirmasi',TRUE),
		'hp_konfirmasi' => $this->input->post('hp_konfirmasi',TRUE),
		'ket_laporan' => $this->input->post('ket_laporan',TRUE),
		'create_time' => $this->input->post('create_time',TRUE),
		'update_time' => $this->input->post('update_time',TRUE),
	    );

            $this->Model_pendaftaran->update($this->input->post('id_users', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelola_pendaftaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_pendaftaran->get_by_id($id);

        if ($row) {
            $this->Model_pendaftaran->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelola_pendaftaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pendaftaran'));
        }
    }

    public function _rules() 
    {
//       $this->form_validation->set_rules('nik', 'nik', 'required|callback_checkUserNik');
	$this->form_validation->set_rules('full_name', 'full name', 'trim|required');
	$this->form_validation->set_rules('kota_lahir', 'kota lahir', 'trim|required');
	$this->form_validation->set_rules('birth', 'birth', 'trim|required');
//	$this->form_validation->set_rules('email', 'email', 'trim|required|callback_checkEmail|valid_email');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
//	$this->form_validation->set_rules('id_user_level', 'id user level', 'trim|required');
//	$this->form_validation->set_rules('is_aktif', 'is aktif', 'trim|required');
//	$this->form_validation->set_rules('username', 'username', 'trim|required');
        
//        $this->form_validation->set_rules('username', 'username', 'required|callback_checkUserName');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
//	$this->form_validation->set_rules('id_skpd', 'id skpd', 'trim|required');
	$this->form_validation->set_rules('province_id', 'province id', 'trim|required');
	$this->form_validation->set_rules('regency_id', 'regency id', 'trim|required');
	$this->form_validation->set_rules('district_id', 'district id', 'trim|required');
//	$this->form_validation->set_rules('village_id', 'village id', 'trim|required');
//	$this->form_validation->set_rules('rw_id', 'rw id', 'trim|required');
//	$this->form_validation->set_rules('rt_id', 'rt id', 'trim|required');
//	$this->form_validation->set_rules('verified_email', 'verified email', 'trim|required');
//	$this->form_validation->set_rules('google_id', 'google id', 'trim|required');
//	$this->form_validation->set_rules('google_image', 'google image', 'trim|required');
//	$this->form_validation->set_rules('division_sub', 'division sub', 'trim|required');
//	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
//	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
//	$this->form_validation->set_rules('penyandang_disabilitas', 'penyandang disabilitas', 'trim|required');
//	$this->form_validation->set_rules('alamat_domisili', 'alamat domisili', 'trim|required');
//	$this->form_validation->set_rules('pihak_konfirmasi', 'pihak konfirmasi', 'trim|required');
//	$this->form_validation->set_rules('email_konfirmasi', 'email konfirmasi', 'trim|required');
//	$this->form_validation->set_rules('hp_konfirmasi', 'hp konfirmasi', 'trim|required');
//	$this->form_validation->set_rules('ket_laporan', 'ket laporan', 'trim|required');
//	$this->form_validation->set_rules('create_time', 'create time', 'trim|required');
//	$this->form_validation->set_rules('update_time', 'update time', 'trim|required');

	$this->form_validation->set_rules('id_users', 'id_users', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
    
    
    		// call back validate function
function checkUserName($username){
	if ($this->Model_pendaftaran->checkUsername($username) == false) {
	  return true;
	} else {
	  $this->form_validation->set_message('checkUserName', 'Username Sudah ada Di Database ');
	  return false;
	}
  }
  
  
  function checkUserNik($nik){
	if ($this->Model_pendaftaran->checkUserNik($nik) == false) {
	  return true;
	} else {
	  $this->form_validation->set_message('checkUserNik', 'Nik Sudah ada Di Database ');
	  return false;
	}
  }
  
  
    function checkEmail($email){
	if ($this->Model_pendaftaran->checkEmail($email) == false) {
	  return true;
	} else {
	  $this->form_validation->set_message('checkEmail', 'Email Sudah ada Di Database Atau Kosong ');
	  return false;
	}
  }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_user.xls";
        $judul = "tbl_user";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Full Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Birth");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Images");
	xlsWriteLabel($tablehead, $kolomhead++, "Id User Level");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Aktif");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Skpd");
	xlsWriteLabel($tablehead, $kolomhead++, "Province Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Regency Id");
	xlsWriteLabel($tablehead, $kolomhead++, "District Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Village Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Rw Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Rt Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Verified Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Google Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Google Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Division Sub");
	xlsWriteLabel($tablehead, $kolomhead++, "Nik");
	xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Penyandang Disabilitas");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Domisili");
	xlsWriteLabel($tablehead, $kolomhead++, "Pihak Konfirmasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Email Konfirmasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Hp Konfirmasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket Laporan");
	xlsWriteLabel($tablehead, $kolomhead++, "Create Time");
	xlsWriteLabel($tablehead, $kolomhead++, "Update Time");

	foreach ($this->Model_pendaftaran->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->full_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->birth);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->images);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user_level);
	    xlsWriteLabel($tablebody, $kolombody++, $data->is_aktif);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_skpd);
	    xlsWriteNumber($tablebody, $kolombody++, $data->province_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->regency_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->district_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->village_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rw_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rt_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->verified_email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->google_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->google_image);
	    xlsWriteLabel($tablebody, $kolombody++, $data->division_sub);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penyandang_disabilitas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_domisili);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pihak_konfirmasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email_konfirmasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hp_konfirmasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket_laporan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_time);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_time);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kelola_pendaftaran.php */
/* Location: ./application/controllers/Kelola_pendaftaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-02-15 03:45:14 */
/* http://harviacode.com */