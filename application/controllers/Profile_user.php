<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_profile');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','profile_user/tbl_user_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_profile->json();
    }

    public function read($id) 
    {
        $row = $this->Model_profile->get_by_id($id);
        if ($row) {
            $data = array(
		'id_users' => $row->id_users,
		'full_name' => $row->full_name,
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
	    );
            $this->template->load('template','profile_user/tbl_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profile_user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('profile_user/create_action'),
	    'id_users' => set_value('id_users'),
	    'full_name' => set_value('full_name'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	    'images' => set_value('images'),
	    'id_user_level' => set_value('id_user_level'),
	    'is_aktif' => set_value('is_aktif'),
	    'username' => set_value('username'),
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
	);
        $this->template->load('template','profile_user/tbl_user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'full_name' => $this->input->post('full_name',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
		'images' => $this->input->post('images',TRUE),
		'id_user_level' => $this->input->post('id_user_level',TRUE),
		'is_aktif' => $this->input->post('is_aktif',TRUE),
		'username' => $this->input->post('username',TRUE),
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
	    );

            $this->Model_profile->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('profile_user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_profile->get_by_id($id);
        
 

        if ($row) {
                 
           
            $data = array(
                'button' => 'Update',
                'action' => site_url('profile_user/update_action'),
		'id_users' => set_value('id_users', $row->id_users),
		'full_name' => set_value('full_name', $row->full_name),
	//	'email' => set_value('email', $row->email),
//		'old_pass' => set_value('old_pass', $row->password),
                'newpass' => set_value('newpass', $row->password),
                'passconf' => set_value('passconf', $row->password),
//		'images' => set_value('images', $row->images),
//		'id_user_level' => set_value('id_user_level', $row->id_user_level),
//		'is_aktif' => set_value('is_aktif', $row->is_aktif),
//		'username' => set_value('username', $row->username),
//		'id_skpd' => set_value('id_skpd', $row->id_skpd),
//		'province_id' => set_value('province_id', $row->province_id),
//		'regency_id' => set_value('regency_id', $row->regency_id),
//		'district_id' => set_value('district_id', $row->district_id),
//		'village_id' => set_value('village_id', $row->village_id),
//		'rw_id' => set_value('rw_id', $row->rw_id),
//		'rt_id' => set_value('rt_id', $row->rt_id),
//		'verified_email' => set_value('verified_email', $row->verified_email),
//		'google_id' => set_value('google_id', $row->google_id),
//		'google_image' => set_value('google_image', $row->google_image),
//		'division_sub' => set_value('division_sub', $row->division_sub),
	    );
            $this->template->load('template','profile_user/tbl_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profile_user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        
        if ($this->form_validation->run() == FALSE) {
            // var_dump('aaa')or die();
            $this->update($this->input->post('id_users', TRUE));
        } else {
              
          // var_dump($_POST)or die();
            
            
            $data = array(
		'full_name' => $this->input->post('full_name',TRUE),
	//	'email' => $this->input->post('email',TRUE),
		//'old_pass' => $this->input->post('old_pass',TRUE),
                //  'password' => $this->hash_password( $this->input->post('newpass',TRUE)),
               // password_hash("secret password", PASSWORD_DEFAULT, $options);
                'password' => hash_password($this->input->post('newpass',TRUE)),

	    );

            $this->Model_profile->update($this->input->post('id_users', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('profile_user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_profile->get_by_id($id);

        if ($row) {
            $this->Model_profile->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('profile_user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profile_user'));
        }
    }
    
     public function password_check($oldpass)
    {
        $id = $_SESSION['id_users'];
        $user = $this->Model_profile->get_by_id($id);
        if(password_verify($_POST['old_pass'], $user->password))   {
             return true;
           
        }

        $this->form_validation->set_message('password_check', 'The {field} does not match');
             
            return false;
    }

    public function _rules() 
    {
        
         $this->form_validation->set_rules('oldpass', 'old password', 'callback_password_check');
        $this->form_validation->set_rules('newpass', 'new password', 'required');
       $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]');
//	$this->form_validation->set_rules('full_name', 'full name', 'trim|required');
//	$this->form_validation->set_rules('email', 'email', 'trim|required');
//	$this->form_validation->set_rules('password', 'password', 'trim|required');
//	$this->form_validation->set_rules('images', 'images', 'trim|required');
//	$this->form_validation->set_rules('id_user_level', 'id user level', 'trim|required');
//	$this->form_validation->set_rules('is_aktif', 'is aktif', 'trim|required');
//	$this->form_validation->set_rules('username', 'username', 'trim|required');
//	$this->form_validation->set_rules('id_skpd', 'id skpd', 'trim|required');
//	$this->form_validation->set_rules('province_id', 'province id', 'trim|required');
//	$this->form_validation->set_rules('regency_id', 'regency id', 'trim|required');
//	$this->form_validation->set_rules('district_id', 'district id', 'trim|required');
//	$this->form_validation->set_rules('village_id', 'village id', 'trim|required');
//	$this->form_validation->set_rules('rw_id', 'rw id', 'trim|required');
//	$this->form_validation->set_rules('rt_id', 'rt id', 'trim|required');
//	$this->form_validation->set_rules('verified_email', 'verified email', 'trim|required');
//	$this->form_validation->set_rules('google_id', 'google id', 'trim|required');
//	$this->form_validation->set_rules('google_image', 'google image', 'trim|required');
//	$this->form_validation->set_rules('division_sub', 'division sub', 'trim|required');

	$this->form_validation->set_rules('id_users', 'id_users', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
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
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
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

	foreach ($this->Model_profile->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->full_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
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

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Profile_user.php */
/* Location: ./application/controllers/Profile_user.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-11 04:36:10 */
/* http://harviacode.com */