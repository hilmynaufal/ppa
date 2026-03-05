<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_tahun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_tahun_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_tahun/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_tahun/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_tahun/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_tahun_model->total_rows($q);
        $tbl_tahun = $this->Tbl_tahun_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_tahun_data' => $tbl_tahun,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_tahun/tbl_tahun_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_tahun_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tahun' => $row->tahun,
		'status' => $row->status,
	    );
            $this->template->load('template','tbl_tahun/tbl_tahun_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_tahun'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_tahun/create_action'),
	    'id' => set_value('id'),
	    'tahun' => set_value('tahun'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','tbl_tahun/tbl_tahun_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tahun' => $this->input->post('tahun',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Tbl_tahun_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_tahun'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_tahun_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_tahun/update_action'),
		'id' => set_value('id', $row->id),
		'tahun' => set_value('tahun', $row->tahun),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','tbl_tahun/tbl_tahun_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_tahun'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'tahun' => $this->input->post('tahun',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Tbl_tahun_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_tahun'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_tahun_model->get_by_id($id);

        if ($row) {
            $this->Tbl_tahun_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_tahun'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_tahun'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_tahun.xls";
        $judul = "tbl_tahun";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Tbl_tahun_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_tahun.doc");

        $data = array(
            'tbl_tahun_data' => $this->Tbl_tahun_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_tahun/tbl_tahun_doc',$data);
    }

}

/* End of file Tbl_tahun.php */
/* Location: ./application/controllers/Tbl_tahun.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-28 03:23:50 */
/* http://harviacode.com */