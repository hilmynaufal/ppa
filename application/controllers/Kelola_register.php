<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelola_register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_register');
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
        $this->template->load('template','kelola_register/user_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_register->json();
    }

    public function read($id) 
    {
        $row = $this->Model_register->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'create_time' => $row->create_time,
		'update_time' => $row->update_time,
		'visit_time' => $row->visit_time,
		'verified_time' => $row->verified_time,
		'code' => $row->code,
		'fullname' => $row->fullname,
		'gender' => $row->gender,
		'birth' => $row->birth,
		'phone' => $row->phone,
		'email' => $row->email,
		'username' => $row->username,
		'password' => $row->password,
		'description' => $row->description,
		'level' => $row->level,
		'division' => $row->division,
		'division_sub' => $row->division_sub,
		'image' => $row->image,
		'ipaddress' => $row->ipaddress,
		'active' => $row->active,
		'status' => $row->status,
		'token' => $row->token,
		'province_id' => $row->province_id,
		'regency_id' => $row->regency_id,
		'district_id' => $row->district_id,
		'village_id' => $row->village_id,
		'rt_id' => $row->rt_id,
		'rw_id' => $row->rw_id,
		'verified_email' => $row->verified_email,
		'google_id' => $row->google_id,
		'google_image' => $row->google_image,
		'nik' => $row->nik,
		'pekerjaan' => $row->pekerjaan,
		'penyandang_disabilitas' => $row->penyandang_disabilitas,
		'alamat_domisili' => $row->alamat_domisili,
		'tgl_lahir' => $row->tgl_lahir,
		'pihak_konfirmasi' => $row->pihak_konfirmasi,
		'email_pihak_konfirmasi' => $row->email_pihak_konfirmasi,
		'hp_konfirmasi' => $row->hp_konfirmasi,
	    );
            $this->template->load('template','kelola_register/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_register'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelola_register/create_action'),
	    'id_user' => set_value('id_user'),
	    'create_time' => set_value('create_time'),
	    'update_time' => set_value('update_time'),
	    'visit_time' => set_value('visit_time'),
	    'verified_time' => set_value('verified_time'),
	    'code' => set_value('code'),
	    'fullname' => set_value('fullname'),
	    'gender' => set_value('gender'),
	    'birth' => set_value('birth'),
	    'phone' => set_value('phone'),
//	    'email' => set_value('email'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'description' => set_value('description'),
	    'level' => set_value('level'),
	    'division' => set_value('division'),
	    'division_sub' => set_value('division_sub'),
	    'image' => set_value('image'),
	    'ipaddress' => set_value('ipaddress'),
	    'active' => set_value('active'),
	    'status' => set_value('status'),
	    'token' => set_value('token'),
	    'province_id' => set_value('province_id'),
	    'regency_id' => set_value('regency_id'),
	    'district_id' => set_value('district_id'),
	    'village_id' => set_value('village_id'),
	    'rt_id' => set_value('rt_id'),
	    'rw_id' => set_value('rw_id'),
	    'verified_email' => set_value('verified_email'),
	    'google_id' => set_value('google_id'),
	    'google_image' => set_value('google_image'),
//	    'nik' => set_value('nik'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'penyandang_disabilitas' => set_value('penyandang_disabilitas'),
	    'alamat_domisili' => set_value('alamat_domisili'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'pihak_konfirmasi' => set_value('pihak_konfirmasi'),
	    'email_pihak_konfirmasi' => set_value('email_pihak_konfirmasi'),
	    'hp_konfirmasi' => set_value('hp_konfirmasi'),
	);
        $this->template->load('template','kelola_register/user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'create_time' =>  date('Y-m-d H:i:s'),
		'update_time' =>  date('Y-m-d H:i:s'),
		'visit_time' =>  date('Y-m-d H:i:s'),
		'verified_time' =>  date('Y-m-d H:i:s'),
//		'code' => $this->input->post('code',TRUE),
		'fullname' => $this->input->post('fullname',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'birth' => $this->input->post('birth',TRUE),
		'phone' => $this->input->post('phone',TRUE),
//		'email' => $this->input->post('email',TRUE),
		'username' => $this->input->post('username',TRUE),
//		'password' => $this->input->post('password',TRUE),
                
                   'password' => hash_password($this->input->post('password',TRUE)),
		'description' => $this->input->post('description',TRUE),
		'level' => $this->input->post('level',TRUE),
//		'division' => $this->input->post('division',TRUE),
//		'division_sub' => $this->input->post('division_sub',TRUE),
//		'image' => $this->input->post('image',TRUE),
//		'ipaddress' => $this->input->post('ipaddress',TRUE),
		'active' => $this->input->post('active',TRUE),
//		'status' => $this->input->post('status',TRUE),
//		'token' => $this->input->post('token',TRUE),
		'province_id' => $this->input->post('province_id',TRUE),
		'regency_id' => $this->input->post('regency_id',TRUE),
		'district_id' => $this->input->post('district_id',TRUE),
		'village_id' => $this->input->post('village_id',TRUE),
//		'rt_id' => $this->input->post('rt_id',TRUE),
//		'rw_id' => $this->input->post('rw_id',TRUE),
//		'verified_email' => $this->input->post('verified_email',TRUE),
//		'google_id' => $this->input->post('google_id',TRUE),
//		'google_image' => $this->input->post('google_image',TRUE),
//		'nik' => $this->input->post('nik',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'penyandang_disabilitas' => $this->input->post('penyandang_disabilitas',TRUE),
		'alamat_domisili' => $this->input->post('alamat_domisili',TRUE),
//		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'pihak_konfirmasi' => $this->input->post('pihak_konfirmasi',TRUE),
		'email_pihak_konfirmasi' => $this->input->post('email_pihak_konfirmasi',TRUE),
		'hp_konfirmasi' => $this->input->post('hp_konfirmasi',TRUE),
	    );

            $this->Model_register->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kelola_register'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_register->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelola_register/update_action'),
		'id_user' => set_value('id_user', $row->id_user),
		'create_time' => set_value('create_time', $row->create_time),
		'update_time' => set_value('update_time', $row->update_time),
		'visit_time' => set_value('visit_time', $row->visit_time),
		'verified_time' => set_value('verified_time', $row->verified_time),
		'code' => set_value('code', $row->code),
		'fullname' => set_value('fullname', $row->fullname),
		'gender' => set_value('gender', $row->gender),
		'birth' => set_value('birth', $row->birth),
		'phone' => set_value('phone', $row->phone),
//		'email' => set_value('email', $row->email),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'description' => set_value('description', $row->description),
		'level' => set_value('level', $row->level),
		'division' => set_value('division', $row->division),
		'division_sub' => set_value('division_sub', $row->division_sub),
		'image' => set_value('image', $row->image),
		'ipaddress' => set_value('ipaddress', $row->ipaddress),
		'active' => set_value('active', $row->active),
		'status' => set_value('status', $row->status),
		'token' => set_value('token', $row->token),
		'province_id' => set_value('province_id', $row->province_id),
		'regency_id' => set_value('regency_id', $row->regency_id),
		'district_id' => set_value('district_id', $row->district_id),
		'village_id' => set_value('village_id', $row->village_id),
		'rt_id' => set_value('rt_id', $row->rt_id),
		'rw_id' => set_value('rw_id', $row->rw_id),
		'verified_email' => set_value('verified_email', $row->verified_email),
		'google_id' => set_value('google_id', $row->google_id),
		'google_image' => set_value('google_image', $row->google_image),
//		'nik' => set_value('nik', $row->nik),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
		'penyandang_disabilitas' => set_value('penyandang_disabilitas', $row->penyandang_disabilitas),
		'alamat_domisili' => set_value('alamat_domisili', $row->alamat_domisili),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'pihak_konfirmasi' => set_value('pihak_konfirmasi', $row->pihak_konfirmasi),
		'email_pihak_konfirmasi' => set_value('email_pihak_konfirmasi', $row->email_pihak_konfirmasi),
		'hp_konfirmasi' => set_value('hp_konfirmasi', $row->hp_konfirmasi),
	    );
            $this->template->load('template','kelola_register/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_register'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
		
		'update_time' => date('Y-m-d H:i:s'),
		'visit_time' =>  date('Y-m-d H:i:s'),
		'verified_time' => date('Y-m-d H:i:s'),
		
		'fullname' => $this->input->post('fullname',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'birth' => $this->input->post('birth',TRUE),
		'phone' => $this->input->post('phone',TRUE),
//		'email' => $this->input->post('email',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'description' => $this->input->post('description',TRUE),
		'level' => $this->input->post('level',TRUE),
		'division' => $this->input->post('division',TRUE),
		'division_sub' => $this->input->post('division_sub',TRUE),
		'image' => $this->input->post('image',TRUE),
		'ipaddress' => $this->input->post('ipaddress',TRUE),
		'active' => $this->input->post('active',TRUE),
		'status' => $this->input->post('status',TRUE),
		'token' => $this->input->post('token',TRUE),
		'province_id' => $this->input->post('province_id',TRUE),
		'regency_id' => $this->input->post('regency_id',TRUE),
		'district_id' => $this->input->post('district_id',TRUE),
		'village_id' => $this->input->post('village_id',TRUE),
		'rt_id' => $this->input->post('rt_id',TRUE),
		'rw_id' => $this->input->post('rw_id',TRUE),
		'verified_email' => $this->input->post('verified_email',TRUE),
		'google_id' => $this->input->post('google_id',TRUE),
		'google_image' => $this->input->post('google_image',TRUE),
//		'nik' => $this->input->post('nik',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'penyandang_disabilitas' => $this->input->post('penyandang_disabilitas',TRUE),
		'alamat_domisili' => $this->input->post('alamat_domisili',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'pihak_konfirmasi' => $this->input->post('pihak_konfirmasi',TRUE),
		'email_pihak_konfirmasi' => $this->input->post('email_pihak_konfirmasi',TRUE),
		'hp_konfirmasi' => $this->input->post('hp_konfirmasi',TRUE),
	    );

            $this->Model_register->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelola_register'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_register->get_by_id($id);

        if ($row) {
            $this->Model_register->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelola_register'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_register'));
        }
    }

    public function _rules() 
    {
       // var_dump('aaaa') or die();
        
//	$this->form_validation->set_rules('create_time', 'create time', 'trim|required');
//	$this->form_validation->set_rules('update_time', 'update time', 'trim|required');
//	$this->form_validation->set_rules('visit_time', 'visit time', 'trim|required');
//	$this->form_validation->set_rules('verified_time', 'verified time', 'trim|required');
//	$this->form_validation->set_rules('code', 'code', 'trim|required');
	$this->form_validation->set_rules('fullname', 'fullname', 'trim|required');
	$this->form_validation->set_rules('gender', 'gender', 'trim|required');
	$this->form_validation->set_rules('birth', 'birth', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required|callback_Cek_Phone');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
//	$this->form_validation->set_rules('description', 'description', 'trim|required');
//	$this->form_validation->set_rules('level', 'level', 'trim|required');
//	$this->form_validation->set_rules('division', 'division', 'trim|required');
//	$this->form_validation->set_rules('division_sub', 'division sub', 'trim|required');
//	$this->form_validation->set_rules('image', 'image', 'trim|required');
//	$this->form_validation->set_rules('ipaddress', 'ipaddress', 'trim|required');
//	$this->form_validation->set_rules('active', 'active', 'trim|required');
//	$this->form_validation->set_rules('status', 'status', 'trim|required');
//	$this->form_validation->set_rules('token', 'token', 'trim|required');
	$this->form_validation->set_rules('province_id', 'province id', 'trim|required');
	$this->form_validation->set_rules('regency_id', 'regency id', 'trim|required');
	$this->form_validation->set_rules('district_id', 'district id', 'trim|required');
	$this->form_validation->set_rules('village_id', 'village id', 'trim|required');
//	$this->form_validation->set_rules('rt_id', 'rt id', 'trim|required');
//	$this->form_validation->set_rules('rw_id', 'rw id', 'trim|required');
//	$this->form_validation->set_rules('verified_email', 'verified email', 'trim|required');
//	$this->form_validation->set_rules('google_id', 'google id', 'trim|required');
//	$this->form_validation->set_rules('google_image', 'google image', 'trim|required');
//	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
//	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
//	$this->form_validation->set_rules('penyandang_disabilitas', 'penyandang disabilitas', 'trim|required');
//	$this->form_validation->set_rules('alamat_domisili', 'alamat domisili', 'trim|required');
//	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
//	$this->form_validation->set_rules('pihak_konfirmasi', 'pihak konfirmasi', 'trim|required');
//	$this->form_validation->set_rules('email_pihak_konfirmasi', 'email pihak konfirmasi', 'trim|required');
//	$this->form_validation->set_rules('hp_konfirmasi', 'hp konfirmasi', 'trim|required');
//	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
    
    		// call back validate function
function callback_Cek_Phone($phone){
	if ($this->Model_register->cek_Phone($phone) == false) {
	  return true;
	} else {
	  $this->form_validation->set_message('checkUserName', 'Phone Sudah ada Di Database ');
	  return false;
	}
  }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "user.xls";
        $judul = "user";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Create Time");
	xlsWriteLabel($tablehead, $kolomhead++, "Update Time");
	xlsWriteLabel($tablehead, $kolomhead++, "Visit Time");
	xlsWriteLabel($tablehead, $kolomhead++, "Verified Time");
	xlsWriteLabel($tablehead, $kolomhead++, "Code");
	xlsWriteLabel($tablehead, $kolomhead++, "Fullname");
	xlsWriteLabel($tablehead, $kolomhead++, "Gender");
	xlsWriteLabel($tablehead, $kolomhead++, "Birth");
	xlsWriteLabel($tablehead, $kolomhead++, "Phone");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Description");
	xlsWriteLabel($tablehead, $kolomhead++, "Level");
	xlsWriteLabel($tablehead, $kolomhead++, "Division");
	xlsWriteLabel($tablehead, $kolomhead++, "Division Sub");
	xlsWriteLabel($tablehead, $kolomhead++, "Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Ipaddress");
	xlsWriteLabel($tablehead, $kolomhead++, "Active");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Token");
	xlsWriteLabel($tablehead, $kolomhead++, "Province Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Regency Id");
	xlsWriteLabel($tablehead, $kolomhead++, "District Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Village Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Rt Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Rw Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Verified Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Google Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Google Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Nik");
	xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Penyandang Disabilitas");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Domisili");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Pihak Konfirmasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Email Pihak Konfirmasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Hp Konfirmasi");

	foreach ($this->Model_register->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_time);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_time);
	    xlsWriteLabel($tablebody, $kolombody++, $data->visit_time);
	    xlsWriteLabel($tablebody, $kolombody++, $data->verified_time);
	    xlsWriteLabel($tablebody, $kolombody++, $data->code);
	    xlsWriteLabel($tablebody, $kolombody++, $data->fullname);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gender);
	    xlsWriteLabel($tablebody, $kolombody++, $data->birth);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->description);
	    xlsWriteNumber($tablebody, $kolombody++, $data->level);
	    xlsWriteNumber($tablebody, $kolombody++, $data->division);
	    xlsWriteNumber($tablebody, $kolombody++, $data->division_sub);
	    xlsWriteLabel($tablebody, $kolombody++, $data->image);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ipaddress);
	    xlsWriteNumber($tablebody, $kolombody++, $data->active);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->token);
	    xlsWriteNumber($tablebody, $kolombody++, $data->province_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->regency_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->district_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->village_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rt_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rw_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->verified_email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->google_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->google_image);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penyandang_disabilitas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_domisili);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pihak_konfirmasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email_pihak_konfirmasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hp_konfirmasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kelola_register.php */
/* Location: ./application/controllers/Kelola_register.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-02-09 07:05:44 */
/* http://harviacode.com */