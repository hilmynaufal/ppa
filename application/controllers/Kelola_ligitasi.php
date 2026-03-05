<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelola_ligitasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_ligitasi');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','kelola_ligitasi/tbl_ligitasi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_ligitasi->json();
    }

    public function read($id) 
    {
        $row = $this->Model_ligitasi->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pelayanan' => $row->id_pelayanan,
		'kode_layanan' => $row->kode_layanan,
		'skpd_id' => $row->skpd_id,
		'nama_pejabat' => $row->nama_pejabat,
		'keterangan' => $row->keterangan,
		'review' => $row->review,
		'status' => $row->status,
		'jenis_pengadilan' => $row->jenis_pengadilan,
		'status_sengketa' => $row->status_sengketa,
		'jenis_perkara' => $row->jenis_perkara,
		'pengadilan' => $row->pengadilan,
		'jenis_pihak' => $row->jenis_pihak,
		'file1' => $row->file1,
		'file2' => $row->file2,
		'file3' => $row->file3,
		'file4' => $row->file4,
		'nama_pic' => $row->nama_pic,
		'hp_pic' => $row->hp_pic,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
		'delete_at' => $row->delete_at,
	    );
            $this->template->load('template','kelola_ligitasi/tbl_ligitasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_ligitasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelola_ligitasi/create_action'),
	    'id_pelayanan' => set_value('id_pelayanan'),
	    'kode_layanan' => set_value('kode_layanan'),
	    'skpd_id' => set_value('skpd_id'),
	    'nama_pejabat' => set_value('nama_pejabat'),
	    'keterangan' => set_value('keterangan'),
	    'review' => set_value('review'),
	    'status' => set_value('status'),
	    'jenis_pengadilan' => set_value('jenis_pengadilan'),
	    'status_sengketa' => set_value('status_sengketa'),
	    'jenis_perkara' => set_value('jenis_perkara'),
	    'pengadilan' => set_value('pengadilan'),
	    'jenis_pihak' => set_value('jenis_pihak'),
	    'file1' => set_value('file1'),
	    'file2' => set_value('file2'),
	    'file3' => set_value('file3'),
	    'file4' => set_value('file4'),
	    'nama_pic' => set_value('nama_pic'),
	    'hp_pic' => set_value('hp_pic'),
	    'create_at' => set_value('create_at'),
	    'update_at' => set_value('update_at'),
	    'delete_at' => set_value('delete_at'),
	);
        $this->template->load('template','kelola_ligitasi/tbl_ligitasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
          //  var_dump($_POST)or die();
            $new_name = time();
            $kode_layanan = $new_name . '-' . $_SESSION['id_skpd'];

            $data = array(
		'kode_layanan' => $kode_layanan,
		'skpd_id' =>$this->input->post('skpd_id',TRUE),
		'nama_pejabat' => $this->input->post('nama_pejabat',TRUE),
//		'keterangan' => $this->input->post('keterangan',TRUE),
//		'review' => $this->input->post('review',TRUE),
//		'status' => $this->input->post('status',TRUE),
		'jenis_pengadilan' => $this->input->post('jenis_pengadilan',TRUE),
		'status_sengketa' => $this->input->post('status_sengketa',TRUE),
		'jenis_perkara' => $this->input->post('jenis_perkara',TRUE),
		'pengadilan' => $this->input->post('pengadilan',TRUE),
		'jenis_pihak' => $this->input->post('jenis_pihak',TRUE),
		'file1' => $this->input->post('file1',TRUE),
		'file2' => $this->input->post('file2',TRUE),
		'file3' => $this->input->post('file3',TRUE),
		'file4' => $this->input->post('file4',TRUE),
		'nama_pic' => $this->input->post('nama_pic',TRUE),
		'hp_pic' => $this->input->post('hp_pic',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
		'delete_at' => $this->input->post('delete_at',TRUE),
	    );

            $this->Model_ligitasi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kelola_ligitasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_ligitasi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelola_ligitasi/update_action'),
		'id_pelayanan' => set_value('id_pelayanan', $row->id_pelayanan),
		'kode_layanan' => set_value('kode_layanan', $row->kode_layanan),
		'skpd_id' => set_value('skpd_id', $row->skpd_id),
//		'nama_pejabat' => set_value('nama_pejabat', $row->nama_pejabat),
//		'keterangan' => set_value('keterangan', $row->keterangan),
//		'review' => set_value('review', $row->review),
//		'status' => set_value('status', $row->status),
		'jenis_pengadilan' => set_value('jenis_pengadilan', $row->jenis_pengadilan),
		'status_sengketa' => set_value('status_sengketa', $row->status_sengketa),
		'jenis_perkara' => set_value('jenis_perkara', $row->jenis_perkara),
		'pengadilan' => set_value('pengadilan', $row->pengadilan),
		'jenis_pihak' => set_value('jenis_pihak', $row->jenis_pihak),
		'file1' => set_value('file1', $row->file1),
		'file2' => set_value('file2', $row->file2),
		'file3' => set_value('file3', $row->file3),
		'file4' => set_value('file4', $row->file4),
		'nama_pic' => set_value('nama_pic', $row->nama_pic),
		'hp_pic' => set_value('hp_pic', $row->hp_pic),
		'create_at' => set_value('create_at', $row->create_at),
		'update_at' => set_value('update_at', $row->update_at),
		'delete_at' => set_value('delete_at', $row->delete_at),
	    );
            $this->template->load('template','kelola_ligitasi/tbl_ligitasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_ligitasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pelayanan', TRUE));
        } else {
            $data = array(
		'kode_layanan' => $this->input->post('kode_layanan',TRUE),
		'skpd_id' => $this->input->post('skpd_id',TRUE),
		'nama_pejabat' => $this->input->post('nama_pejabat',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'review' => $this->input->post('review',TRUE),
		'status' => $this->input->post('status',TRUE),
		'jenis_pengadilan' => $this->input->post('jenis_pengadilan',TRUE),
		'status_sengketa' => $this->input->post('status_sengketa',TRUE),
		'jenis_perkara' => $this->input->post('jenis_perkara',TRUE),
		'pengadilan' => $this->input->post('pengadilan',TRUE),
		'jenis_pihak' => $this->input->post('jenis_pihak',TRUE),
		'file1' => $this->input->post('file1',TRUE),
		'file2' => $this->input->post('file2',TRUE),
		'file3' => $this->input->post('file3',TRUE),
		'file4' => $this->input->post('file4',TRUE),
		'nama_pic' => $this->input->post('nama_pic',TRUE),
		'hp_pic' => $this->input->post('hp_pic',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
		'delete_at' => $this->input->post('delete_at',TRUE),
	    );

            $this->Model_ligitasi->update($this->input->post('id_pelayanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelola_ligitasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_ligitasi->get_by_id($id);

        if ($row) {
            $this->Model_ligitasi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelola_ligitasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_ligitasi'));
        }
    }

    public function _rules() 
    {
//	$this->form_validation->set_rules('kode_layanan', 'kode layanan', 'trim|required');
	$this->form_validation->set_rules('skpd_id', 'Perankat Daerah', 'trim|required');
//	$this->form_validation->set_rules('nama_pejabat', 'nama pejabat', 'trim|required');
//	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
//	$this->form_validation->set_rules('review', 'review', 'trim|required');
//	$this->form_validation->set_rules('status', 'status', 'trim|required');
//	$this->form_validation->set_rules('jenis_pengadilan', 'jenis pengadilan', 'trim|required');
	$this->form_validation->set_rules('status_sengketa', 'status sengketa', 'trim|required');
	$this->form_validation->set_rules('jenis_perkara', 'jenis perkara', 'trim|required');
//	$this->form_validation->set_rules('pengadilan', 'pengadilan', 'trim|required');
//	$this->form_validation->set_rules('jenis_pihak', 'jenis pihak', 'trim|required');
//	$this->form_validation->set_rules('file1', 'file1', 'trim|required');
//	$this->form_validation->set_rules('file2', 'file2', 'trim|required');
//	$this->form_validation->set_rules('file3', 'file3', 'trim|required');
//	$this->form_validation->set_rules('file4', 'file4', 'trim|required');
	$this->form_validation->set_rules('nama_pic', 'nama pic', 'trim|required');
	$this->form_validation->set_rules('hp_pic', 'hp pic', 'trim|required');
//	$this->form_validation->set_rules('create_at', 'create at', 'trim|required');
//	$this->form_validation->set_rules('update_at', 'update at', 'trim|required');
//	$this->form_validation->set_rules('delete_at', 'delete at', 'trim|required');

	$this->form_validation->set_rules('id_pelayanan', 'id_pelayanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_ligitasi.xls";
        $judul = "tbl_ligitasi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Layanan");
	xlsWriteLabel($tablehead, $kolomhead++, "Skpd Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pejabat");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Review");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Pengadilan");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Sengketa");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Perkara");
	xlsWriteLabel($tablehead, $kolomhead++, "Pengadilan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Pihak");
	xlsWriteLabel($tablehead, $kolomhead++, "File1");
	xlsWriteLabel($tablehead, $kolomhead++, "File2");
	xlsWriteLabel($tablehead, $kolomhead++, "File3");
	xlsWriteLabel($tablehead, $kolomhead++, "File4");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pic");
	xlsWriteLabel($tablehead, $kolomhead++, "Hp Pic");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");
	xlsWriteLabel($tablehead, $kolomhead++, "Update At");
	xlsWriteLabel($tablehead, $kolomhead++, "Delete At");

	foreach ($this->Model_ligitasi->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_layanan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->skpd_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pejabat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->review);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jenis_pengadilan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status_sengketa);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jenis_perkara);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pengadilan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jenis_pihak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file4);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pic);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hp_pic);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->delete_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kelola_ligitasi.php */
/* Location: ./application/controllers/Kelola_ligitasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-25 22:28:28 */
/* http://harviacode.com */