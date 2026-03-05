<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/user/index/';
            $config['first_url'] = base_url() . 'index.php/user/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','user/user_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
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
	    );
            $this->template->load('template','user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
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
	    'email' => set_value('email'),
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
	);
        $this->template->load('template','user/user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'create_time' => $this->input->post('create_time',TRUE),
		'update_time' => $this->input->post('update_time',TRUE),
		'visit_time' => $this->input->post('visit_time',TRUE),
		'verified_time' => $this->input->post('verified_time',TRUE),
		'code' => $this->input->post('code',TRUE),
		'fullname' => $this->input->post('fullname',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'birth' => $this->input->post('birth',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'email' => $this->input->post('email',TRUE),
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
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
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
		'email' => set_value('email', $row->email),
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
	    );
            $this->template->load('template','user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
		'create_time' => $this->input->post('create_time',TRUE),
		'update_time' => $this->input->post('update_time',TRUE),
		'visit_time' => $this->input->post('visit_time',TRUE),
		'verified_time' => $this->input->post('verified_time',TRUE),
		'code' => $this->input->post('code',TRUE),
		'fullname' => $this->input->post('fullname',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'birth' => $this->input->post('birth',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'email' => $this->input->post('email',TRUE),
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
	    );

            $this->User_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('create_time', 'create time', 'trim|required');
	$this->form_validation->set_rules('update_time', 'update time', 'trim|required');
	$this->form_validation->set_rules('visit_time', 'visit time', 'trim|required');
	$this->form_validation->set_rules('verified_time', 'verified time', 'trim|required');
	$this->form_validation->set_rules('code', 'code', 'trim|required');
	$this->form_validation->set_rules('fullname', 'fullname', 'trim|required');
	$this->form_validation->set_rules('gender', 'gender', 'trim|required');
	$this->form_validation->set_rules('birth', 'birth', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('division', 'division', 'trim|required');
	$this->form_validation->set_rules('division_sub', 'division sub', 'trim|required');
	$this->form_validation->set_rules('image', 'image', 'trim|required');
	$this->form_validation->set_rules('ipaddress', 'ipaddress', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('token', 'token', 'trim|required');
	$this->form_validation->set_rules('province_id', 'province id', 'trim|required');
	$this->form_validation->set_rules('regency_id', 'regency id', 'trim|required');
	$this->form_validation->set_rules('district_id', 'district id', 'trim|required');
	$this->form_validation->set_rules('village_id', 'village id', 'trim|required');
	$this->form_validation->set_rules('rt_id', 'rt id', 'trim|required');
	$this->form_validation->set_rules('rw_id', 'rw id', 'trim|required');
	$this->form_validation->set_rules('verified_email', 'verified email', 'trim|required');
	$this->form_validation->set_rules('google_id', 'google id', 'trim|required');
	$this->form_validation->set_rules('google_image', 'google image', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
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

	foreach ($this->User_model->get_all() as $data) {
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

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=user.doc");

        $data = array(
            'user_data' => $this->User_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('user/user_doc',$data);
    }
    
    public function profile()
    {
        //var_dump('aa')or die();
       
        
        $this->load->view('user/profile','');
    }
    
    
    

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-28 03:23:50 */
/* http://harviacode.com */