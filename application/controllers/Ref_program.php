<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ref_program extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Ref_program_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/ref_program/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/ref_program/index/';
            $config['first_url'] = base_url() . 'index.php/ref_program/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Ref_program_model->total_rows($q);
        $ref_program = $this->Ref_program_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ref_program_data' => $ref_program,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','ref_program/ref_program_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Ref_program_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_sipd' => $row->id_sipd,
		'id_urusan' => $row->id_urusan,
		'kode_urusan' => $row->kode_urusan,
		'nama_urusan' => $row->nama_urusan,
		'id_bidang_urusan' => $row->id_bidang_urusan,
		'kode_bidang_urusan' => $row->kode_bidang_urusan,
		'nama_bidang_urusan' => $row->nama_bidang_urusan,
		'id_program' => $row->id_program,
		'kode_program' => $row->kode_program,
		'nama_program' => $row->nama_program,
		'id_giat' => $row->id_giat,
		'kode_giat' => $row->kode_giat,
		'nama_giat' => $row->nama_giat,
		'id_sub_giat' => $row->id_sub_giat,
		'kode_sub_giat' => $row->kode_sub_giat,
		'nama_sub_giat' => $row->nama_sub_giat,
		'is_locked' => $row->is_locked,
		'vol_staf' => $row->vol_staf,
		'status' => $row->status,
		'action' => $row->action,
	    );
            $this->template->load('template','ref_program/ref_program_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ref_program'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ref_program/create_action'),
	    'id_sipd' => set_value('id_sipd'),
	    'id_urusan' => set_value('id_urusan'),
	    'kode_urusan' => set_value('kode_urusan'),
	    'nama_urusan' => set_value('nama_urusan'),
	    'id_bidang_urusan' => set_value('id_bidang_urusan'),
	    'kode_bidang_urusan' => set_value('kode_bidang_urusan'),
	    'nama_bidang_urusan' => set_value('nama_bidang_urusan'),
	    'id_program' => set_value('id_program'),
	    'kode_program' => set_value('kode_program'),
	    'nama_program' => set_value('nama_program'),
	    'id_giat' => set_value('id_giat'),
	    'kode_giat' => set_value('kode_giat'),
	    'nama_giat' => set_value('nama_giat'),
	    'id_sub_giat' => set_value('id_sub_giat'),
	    'kode_sub_giat' => set_value('kode_sub_giat'),
	    'nama_sub_giat' => set_value('nama_sub_giat'),
	    'is_locked' => set_value('is_locked'),
	    'vol_staf' => set_value('vol_staf'),
	    'status' => set_value('status'),
	    'action' => set_value('action'),
	);
        $this->template->load('template','ref_program/ref_program_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_urusan' => $this->input->post('id_urusan',TRUE),
		'kode_urusan' => $this->input->post('kode_urusan',TRUE),
		'nama_urusan' => $this->input->post('nama_urusan',TRUE),
		'id_bidang_urusan' => $this->input->post('id_bidang_urusan',TRUE),
		'kode_bidang_urusan' => $this->input->post('kode_bidang_urusan',TRUE),
		'nama_bidang_urusan' => $this->input->post('nama_bidang_urusan',TRUE),
		'id_program' => $this->input->post('id_program',TRUE),
		'kode_program' => $this->input->post('kode_program',TRUE),
		'nama_program' => $this->input->post('nama_program',TRUE),
		'id_giat' => $this->input->post('id_giat',TRUE),
		'kode_giat' => $this->input->post('kode_giat',TRUE),
		'nama_giat' => $this->input->post('nama_giat',TRUE),
		'id_sub_giat' => $this->input->post('id_sub_giat',TRUE),
		'kode_sub_giat' => $this->input->post('kode_sub_giat',TRUE),
		'nama_sub_giat' => $this->input->post('nama_sub_giat',TRUE),
		'is_locked' => $this->input->post('is_locked',TRUE),
		'vol_staf' => $this->input->post('vol_staf',TRUE),
		'status' => $this->input->post('status',TRUE),
		'action' => $this->input->post('action',TRUE),
	    );

            $this->Ref_program_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('ref_program'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ref_program_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ref_program/update_action'),
		'id_sipd' => set_value('id_sipd', $row->id_sipd),
		'id_urusan' => set_value('id_urusan', $row->id_urusan),
		'kode_urusan' => set_value('kode_urusan', $row->kode_urusan),
		'nama_urusan' => set_value('nama_urusan', $row->nama_urusan),
		'id_bidang_urusan' => set_value('id_bidang_urusan', $row->id_bidang_urusan),
		'kode_bidang_urusan' => set_value('kode_bidang_urusan', $row->kode_bidang_urusan),
		'nama_bidang_urusan' => set_value('nama_bidang_urusan', $row->nama_bidang_urusan),
		'id_program' => set_value('id_program', $row->id_program),
		'kode_program' => set_value('kode_program', $row->kode_program),
		'nama_program' => set_value('nama_program', $row->nama_program),
		'id_giat' => set_value('id_giat', $row->id_giat),
		'kode_giat' => set_value('kode_giat', $row->kode_giat),
		'nama_giat' => set_value('nama_giat', $row->nama_giat),
		'id_sub_giat' => set_value('id_sub_giat', $row->id_sub_giat),
		'kode_sub_giat' => set_value('kode_sub_giat', $row->kode_sub_giat),
		'nama_sub_giat' => set_value('nama_sub_giat', $row->nama_sub_giat),
		'is_locked' => set_value('is_locked', $row->is_locked),
		'vol_staf' => set_value('vol_staf', $row->vol_staf),
		'status' => set_value('status', $row->status),
		'action' => set_value('action', $row->action),
	    );
            $this->template->load('template','ref_program/ref_program_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ref_program'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sipd', TRUE));
        } else {
            $data = array(
		'id_urusan' => $this->input->post('id_urusan',TRUE),
		'kode_urusan' => $this->input->post('kode_urusan',TRUE),
		'nama_urusan' => $this->input->post('nama_urusan',TRUE),
		'id_bidang_urusan' => $this->input->post('id_bidang_urusan',TRUE),
		'kode_bidang_urusan' => $this->input->post('kode_bidang_urusan',TRUE),
		'nama_bidang_urusan' => $this->input->post('nama_bidang_urusan',TRUE),
		'id_program' => $this->input->post('id_program',TRUE),
		'kode_program' => $this->input->post('kode_program',TRUE),
		'nama_program' => $this->input->post('nama_program',TRUE),
		'id_giat' => $this->input->post('id_giat',TRUE),
		'kode_giat' => $this->input->post('kode_giat',TRUE),
		'nama_giat' => $this->input->post('nama_giat',TRUE),
		'id_sub_giat' => $this->input->post('id_sub_giat',TRUE),
		'kode_sub_giat' => $this->input->post('kode_sub_giat',TRUE),
		'nama_sub_giat' => $this->input->post('nama_sub_giat',TRUE),
		'is_locked' => $this->input->post('is_locked',TRUE),
		'vol_staf' => $this->input->post('vol_staf',TRUE),
		'status' => $this->input->post('status',TRUE),
		'action' => $this->input->post('action',TRUE),
	    );

            $this->Ref_program_model->update($this->input->post('id_sipd', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ref_program'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ref_program_model->get_by_id($id);

        if ($row) {
            $this->Ref_program_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ref_program'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ref_program'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_urusan', 'id urusan', 'trim|required');
	$this->form_validation->set_rules('kode_urusan', 'kode urusan', 'trim|required');
	$this->form_validation->set_rules('nama_urusan', 'nama urusan', 'trim|required');
	$this->form_validation->set_rules('id_bidang_urusan', 'id bidang urusan', 'trim|required');
	$this->form_validation->set_rules('kode_bidang_urusan', 'kode bidang urusan', 'trim|required');
	$this->form_validation->set_rules('nama_bidang_urusan', 'nama bidang urusan', 'trim|required');
	$this->form_validation->set_rules('id_program', 'id program', 'trim|required');
	$this->form_validation->set_rules('kode_program', 'kode program', 'trim|required');
	$this->form_validation->set_rules('nama_program', 'nama program', 'trim|required');
	$this->form_validation->set_rules('id_giat', 'id giat', 'trim|required');
	$this->form_validation->set_rules('kode_giat', 'kode giat', 'trim|required');
	$this->form_validation->set_rules('nama_giat', 'nama giat', 'trim|required');
	$this->form_validation->set_rules('id_sub_giat', 'id sub giat', 'trim|required');
	$this->form_validation->set_rules('kode_sub_giat', 'kode sub giat', 'trim|required');
	$this->form_validation->set_rules('nama_sub_giat', 'nama sub giat', 'trim|required');
	$this->form_validation->set_rules('is_locked', 'is locked', 'trim|required');
	$this->form_validation->set_rules('vol_staf', 'vol staf', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('action', 'action', 'trim|required');

	$this->form_validation->set_rules('id_sipd', 'id_sipd', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ref_program.xls";
        $judul = "ref_program";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Urusan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Urusan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Urusan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Bidang Urusan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Bidang Urusan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Bidang Urusan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Program");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Program");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Program");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Giat");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Giat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Giat");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Sub Giat");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Sub Giat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Sub Giat");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Locked");
	xlsWriteLabel($tablehead, $kolomhead++, "Vol Staf");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Action");

	foreach ($this->Ref_program_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_urusan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_urusan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_urusan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_bidang_urusan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_bidang_urusan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_bidang_urusan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_program);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_program);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_program);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_giat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_giat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_giat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_sub_giat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_sub_giat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_sub_giat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->is_locked);
	    xlsWriteNumber($tablebody, $kolombody++, $data->vol_staf);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->action);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=ref_program.doc");

        $data = array(
            'ref_program_data' => $this->Ref_program_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('ref_program/ref_program_doc',$data);
    }

}

/* End of file Ref_program.php */
/* Location: ./application/controllers/Ref_program.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-28 03:23:50 */
/* http://harviacode.com */