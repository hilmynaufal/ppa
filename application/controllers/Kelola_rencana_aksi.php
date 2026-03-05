<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelola_rencana_aksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_Rencana_aksi');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }
    
    
      // Kabupaten
    function get_rencana_aksi(){
      
      //  var_dump($_POST)or die();
        $id=$this->input->post('id');
        $data=$this->Model_Rencana_aksi->get_subkategori($id);
        echo json_encode($data);
    }
    
    
         // cari sub kegiatan
    function get_subkegiatan(){
      
      //  var_dump($_POST)or die();
        $searchTerm = $this->input->post('searchTerm');
        $response   = $this->Model_Rencana_aksi->get_subkegiatan($searchTerm);
        echo json_encode($response);
        
        
    }
    
    

    public function index()
    {
        $this->template->load('template','kelola_rencana_aksi/rencana_aksi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_Rencana_aksi->json();
    }

    public function read($id) 
    {
        $row = $this->Model_Rencana_aksi->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'skpd_id' => $row->skpd_id,
		'kak_id' => $row->kak_id,
		'tahun' => $row->tahun,
		'tujuan_pprg' => $row->tujuan_pprg,
                'sub_kegiatan' => $row->sub_kegiatan,
                
		'biaya' => $row->biaya,
		'create' => $row->create,
		'update' => $row->update,
		'create_id' => $row->create_id,
		'update_id' => $row->update_id,
	    );
            $this->template->load('template','kelola_rencana_aksi/rencana_aksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_rencana_aksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelola_rencana_aksi/create_action'),
           
	    'id' => set_value('id'),
	    'skpd_id' => set_value('skpd_id'),
	    'kak_id' => set_value('kak_id'),
	    'tahun' => set_value('tahun'),
	    'tujuan_pprg' => set_value('tujuan_pprg'),
               'sub_kegiatan' => set_value('sub_kegiatan'),
            
	    'biaya' => set_value('biaya'),
	    'create' => set_value('create'),
	    'update' => set_value('update'),
	    'create_id' => set_value('create_id'),
	    'update_id' => set_value('update_id'),
	);
        $this->template->load('template','kelola_rencana_aksi/rencana_aksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
      //  var_dump($_POST)or die();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'skpd_id' => $this->input->post('Kode_skpd',TRUE),
		'kak_id' => $this->input->post('kak_id',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
                'sub_kegiatan' => $this->input->post('sub_kegiatan',TRUE),
                
		'tujuan_pprg' => $this->input->post('tujuan_pprg',TRUE),
		'biaya' => $this->input->post('biaya',TRUE),
	    'create_id' => $_SESSION['id_users'],
            'update_id' => $_SESSION['id_users'],
            'create' => date('Y-m-d H:i:s'),
            'update' => date('Y-m-d H:i:s')
	    );

            $this->Model_Rencana_aksi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kelola_rencana_aksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_Rencana_aksi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelola_rencana_aksi/update_action'),
		'id' => set_value('id', $row->id),
		'skpd_id' => set_value('skpd_id', $row->skpd_id),
		'kak_id' => set_value('kak_id', $row->kak_id),
                'sub_kegiatan' => set_value('sub_kegiatan', $row->sub_kegiatan),
                
		'tahun' => set_value('tahun', $row->tahun),
		'tujuan_pprg' => set_value('tujuan_pprg', $row->tujuan_pprg),
		'biaya' => set_value('biaya', $row->biaya),
		   'create_id' => $_SESSION['id_users'],
            'update_id' => $_SESSION['id_users'],
            'create' => date('Y-m-d H:i:s'),
            'update' => date('Y-m-d H:i:s')
	    );
            $this->template->load('template','kelola_rencana_aksi/rencana_aksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_rencana_aksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'skpd_id' => $this->input->post('Kode_skpd',TRUE),
		'kak_id' => $this->input->post('kak_id',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'tujuan_pprg' => $this->input->post('tujuan_pprg',TRUE),
                'sub_kegiatan' => $this->input->post('sub_kegiatan',TRUE),
                
		'biaya' => $this->input->post('biaya',TRUE),
		'create' => $this->input->post('create',TRUE),
		'update' => $this->input->post('update',TRUE),
		'create_id' => $this->input->post('create_id',TRUE),
		'update_id' => $this->input->post('update_id',TRUE),
	    );

            $this->Model_Rencana_aksi->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelola_rencana_aksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_Rencana_aksi->get_by_id($id);

        if ($row) {
            $this->Model_Rencana_aksi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelola_rencana_aksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_rencana_aksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Kode_skpd', 'skpd id', 'trim|required');
	$this->form_validation->set_rules('kak_id', 'kak id', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('tujuan_pprg', 'tujuan pprg', 'trim|required');
//	$this->form_validation->set_rules('biaya', 'biaya', 'trim|required');
//	$this->form_validation->set_rules('create', 'create', 'trim|required');
//	$this->form_validation->set_rules('update', 'update', 'trim|required');
//	$this->form_validation->set_rules('create_id', 'create id', 'trim|required');
//	$this->form_validation->set_rules('update_id', 'update id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rencana_aksi.xls";
        $judul = "rencana_aksi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Skpd Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Kak Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Tujuan Pprg");
	xlsWriteLabel($tablehead, $kolomhead++, "Biaya");
	xlsWriteLabel($tablehead, $kolomhead++, "Create");
	xlsWriteLabel($tablehead, $kolomhead++, "Update");
	xlsWriteLabel($tablehead, $kolomhead++, "Create Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Update Id");

	foreach ($this->Model_Rencana_aksi->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->skpd_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kak_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tujuan_pprg);
	    xlsWriteLabel($tablebody, $kolombody++, $data->biaya);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update);
	    xlsWriteNumber($tablebody, $kolombody++, $data->create_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->update_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kelola_rencana_aksi.php */
/* Location: ./application/controllers/Kelola_rencana_aksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-02 15:27:36 */
/* http://harviacode.com */