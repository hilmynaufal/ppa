<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_department extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_department');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','master_department/ref_department_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_department->json();
    }

    public function read($id) 
    {
        $row = $this->Model_department->get_by_id($id);
        if ($row) {
            $data = array(
		'id_department' => $row->id_department,
		'name' => $row->name,
		'leader' => $row->leader,
		'nip_leader' => $row->nip_leader,
		'jabatan' => $row->jabatan,
                'pangkat' => $row->pangkat,
		'address' => $row->address,
		'phone' => $row->phone,
		'email' => $row->email,
		'image' => $row->image,
		'website' => $row->website,
		'views' => $row->views,
		'status' => $row->status,
		'type' => $row->type,
		'created_id' => $row->created_id,
		'created_date' => $row->created_date,
		'update_id' => $row->update_id,
		'update_date' => $row->update_date,
	    );
            $this->template->load('template','master_department/ref_department_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_department'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('master_department/create_action'),
	    'id_department' => set_value('id_department'),
	    'name' => set_value('name'),
	    'leader' => set_value('leader'),
	    'nip_leader' => set_value('nip_leader'),
	    'jabatan' => set_value('jabatan'),
             'pangkat' => set_value('pangkat'),
	    'address' => set_value('address'),
	    'phone' => set_value('phone'),
	    'email' => set_value('email'),
	    'image' => set_value('image'),
	    'website' => set_value('website'),
	    'views' => set_value('views'),
	    'status' => set_value('status'),
	    'type' => set_value('type'),
	    'created_id' => set_value('created_id'),
	    'created_date' => set_value('created_date'),
	    'update_id' => set_value('update_id'),
	    'update_date' => set_value('update_date'),
	);
        $this->template->load('template','master_department/ref_department_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'leader' => $this->input->post('leader',TRUE),
		'nip_leader' => $this->input->post('nip_leader',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
                'pangkat' => $this->input->post('pangkat',TRUE),
		'address' => $this->input->post('address',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'email' => $this->input->post('email',TRUE),
		'image' => $this->input->post('image',TRUE),
		'website' => $this->input->post('website',TRUE),
		'views' => $this->input->post('views',TRUE),
		'status' => $this->input->post('status',TRUE),
		'type' => $this->input->post('type',TRUE),
		'created_id' => $this->input->post('created_id',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'update_id' => $this->input->post('update_id',TRUE),
		'update_date' => $this->input->post('update_date',TRUE),
	    );

            $this->Model_department->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('master_department'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_department->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('master_department/update_action'),
		'id_department' => set_value('id_department', $row->id_department),
		'name' => set_value('name', $row->name),
		'leader' => set_value('leader', $row->leader),
                  'pangkat' => set_value('leader', $row->pangkat),
		'nip_leader' => set_value('nip_leader', $row->nip_leader),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'address' => set_value('address', $row->address),
		'phone' => set_value('phone', $row->phone),
		'email' => set_value('email', $row->email),
		'image' => set_value('image', $row->image),
		'website' => set_value('website', $row->website),
		'views' => set_value('views', $row->views),
		'status' => set_value('status', $row->status),
		'type' => set_value('type', $row->type),
		'created_id' => set_value('created_id', $row->created_id),
		'created_date' => set_value('created_date', $row->created_date),
		'update_id' => set_value('update_id', $row->update_id),
		'update_date' => set_value('update_date', $row->update_date),
	    );
            $this->template->load('template','master_department/ref_department_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_department'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_department', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'leader' => $this->input->post('leader',TRUE),
		'nip_leader' => $this->input->post('nip_leader',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'address' => $this->input->post('address',TRUE),
                'pangkat' => $this->input->post('pangkat',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'email' => $this->input->post('email',TRUE),
		'image' => $this->input->post('image',TRUE),
		'website' => $this->input->post('website',TRUE),
		'views' => $this->input->post('views',TRUE),
		'status' => $this->input->post('status',TRUE),
		'type' => $this->input->post('type',TRUE),
		'created_id' => $this->input->post('created_id',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'update_id' => $this->input->post('update_id',TRUE),
		'update_date' => $this->input->post('update_date',TRUE),
	    );

            $this->Model_department->update($this->input->post('id_department', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('master_department'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_department->get_by_id($id);

        if ($row) {
            $this->Model_department->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('master_department'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('master_department'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('leader', 'leader', 'trim|required');
	$this->form_validation->set_rules('nip_leader', 'nip leader', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');


	$this->form_validation->set_rules('id_department', 'id_department', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ref_department.xls";
        $judul = "ref_department";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Leader");
	xlsWriteLabel($tablehead, $kolomhead++, "Nip Leader");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Phone");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Website");
	xlsWriteLabel($tablehead, $kolomhead++, "Views");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Update Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Update Date");

	foreach ($this->Model_department->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->leader);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nip_leader);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->image);
	    xlsWriteLabel($tablebody, $kolombody++, $data->website);
	    xlsWriteNumber($tablebody, $kolombody++, $data->views);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);
	    xlsWriteNumber($tablebody, $kolombody++, $data->type);
	    xlsWriteNumber($tablebody, $kolombody++, $data->created_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
	    xlsWriteNumber($tablebody, $kolombody++, $data->update_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Master_department.php */
/* Location: ./application/controllers/Master_department.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-01 17:31:21 */
/* http://harviacode.com */