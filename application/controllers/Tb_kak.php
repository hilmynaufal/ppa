<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_kak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tb_kak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tb_kak/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tb_kak/index/';
            $config['first_url'] = base_url() . 'index.php/tb_kak/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tb_kak_model->total_rows($q);
        $tb_kak = $this->Tb_kak_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tb_kak_data' => $tb_kak,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tb_kak/tb_kak_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_kak_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Id_kak' => $row->Id_kak,
		'Kode_skpd' => $row->Kode_skpd,
		'Wawasan' => $row->Wawasan,
		'Faktor_Kesenjangan' => $row->Faktor_Kesenjangan,
		'Sebab_Kesenjagan_Internal' => $row->Sebab_Kesenjagan_Internal,
		'Sebab_Kesenjagan_Eksternal' => $row->Sebab_Kesenjagan_Eksternal,
		'Reformasi_Tujuan' => $row->Reformasi_Tujuan,
		'Rencana_Aksi' => $row->Rencana_Aksi,
		'Data_Dasar' => $row->Data_Dasar,
		'Tahun_Anggaran' => $row->Tahun_Anggaran,
		'Kode_Program' => $row->Kode_Program,
		'Program' => $row->Program,
		'Kegiatan' => $row->Kegiatan,
		'Sub_Kegiatan' => $row->Sub_Kegiatan,
		'Tujuan' => $row->Tujuan,
		'Analisis_Situasi' => $row->Analisis_Situasi,
		'Hasil' => $row->Hasil,
		'Belanja1_Tujuan' => $row->Belanja1_Tujuan,
		'Belanja1_Alokasianggaran' => $row->Belanja1_Alokasianggaran,
		'Belanja2_Tujuan' => $row->Belanja2_Tujuan,
		'Belanja2_Alokasianggaran' => $row->Belanja2_Alokasianggaran,
		'Capaian_Program' => $row->Capaian_Program,
	    );
            $this->template->load('template','tb_kak/tb_kak_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_kak'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_kak/create_action'),
	    'Id_kak' => set_value('Id_kak'),
	    'Kode_skpd' => set_value('Kode_skpd'),
	    'Wawasan' => set_value('Wawasan'),
	    'Faktor_Kesenjangan' => set_value('Faktor_Kesenjangan'),
	    'Sebab_Kesenjagan_Internal' => set_value('Sebab_Kesenjagan_Internal'),
	    'Sebab_Kesenjagan_Eksternal' => set_value('Sebab_Kesenjagan_Eksternal'),
	    'Reformasi_Tujuan' => set_value('Reformasi_Tujuan'),
	    'Rencana_Aksi' => set_value('Rencana_Aksi'),
	    'Data_Dasar' => set_value('Data_Dasar'),
	    'Tahun_Anggaran' => set_value('Tahun_Anggaran'),
	    'Kode_Program' => set_value('Kode_Program'),
	    'Program' => set_value('Program'),
	    'Kegiatan' => set_value('Kegiatan'),
	    'Sub_Kegiatan' => set_value('Sub_Kegiatan'),
	    'Tujuan' => set_value('Tujuan'),
	    'Analisis_Situasi' => set_value('Analisis_Situasi'),
	    'Hasil' => set_value('Hasil'),
	    'Belanja1_Tujuan' => set_value('Belanja1_Tujuan'),
	    'Belanja1_Alokasianggaran' => set_value('Belanja1_Alokasianggaran'),
	    'Belanja2_Tujuan' => set_value('Belanja2_Tujuan'),
	    'Belanja2_Alokasianggaran' => set_value('Belanja2_Alokasianggaran'),
	    'Capaian_Program' => set_value('Capaian_Program'),
	);
        $this->template->load('template','tb_kak/tb_kak_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Kode_skpd' => $this->input->post('Kode_skpd',TRUE),
		'Wawasan' => $this->input->post('Wawasan',TRUE),
		'Faktor_Kesenjangan' => $this->input->post('Faktor_Kesenjangan',TRUE),
		'Sebab_Kesenjagan_Internal' => $this->input->post('Sebab_Kesenjagan_Internal',TRUE),
		'Sebab_Kesenjagan_Eksternal' => $this->input->post('Sebab_Kesenjagan_Eksternal',TRUE),
		'Reformasi_Tujuan' => $this->input->post('Reformasi_Tujuan',TRUE),
		'Rencana_Aksi' => $this->input->post('Rencana_Aksi',TRUE),
		'Data_Dasar' => $this->input->post('Data_Dasar',TRUE),
		'Tahun_Anggaran' => $this->input->post('Tahun_Anggaran',TRUE),
		'Kode_Program' => $this->input->post('Kode_Program',TRUE),
		'Program' => $this->input->post('Program',TRUE),
		'Kegiatan' => $this->input->post('Kegiatan',TRUE),
		'Sub_Kegiatan' => $this->input->post('Sub_Kegiatan',TRUE),
		'Tujuan' => $this->input->post('Tujuan',TRUE),
		'Analisis_Situasi' => $this->input->post('Analisis_Situasi',TRUE),
		'Hasil' => $this->input->post('Hasil',TRUE),
		'Belanja1_Tujuan' => $this->input->post('Belanja1_Tujuan',TRUE),
		'Belanja1_Alokasianggaran' => $this->input->post('Belanja1_Alokasianggaran',TRUE),
		'Belanja2_Tujuan' => $this->input->post('Belanja2_Tujuan',TRUE),
		'Belanja2_Alokasianggaran' => $this->input->post('Belanja2_Alokasianggaran',TRUE),
		'Capaian_Program' => $this->input->post('Capaian_Program',TRUE),
	    );

            $this->Tb_kak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tb_kak'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_kak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_kak/update_action'),
		'Id_kak' => set_value('Id_kak', $row->Id_kak),
		'Kode_skpd' => set_value('Kode_skpd', $row->Kode_skpd),
		'Wawasan' => set_value('Wawasan', $row->Wawasan),
		'Faktor_Kesenjangan' => set_value('Faktor_Kesenjangan', $row->Faktor_Kesenjangan),
		'Sebab_Kesenjagan_Internal' => set_value('Sebab_Kesenjagan_Internal', $row->Sebab_Kesenjagan_Internal),
		'Sebab_Kesenjagan_Eksternal' => set_value('Sebab_Kesenjagan_Eksternal', $row->Sebab_Kesenjagan_Eksternal),
		'Reformasi_Tujuan' => set_value('Reformasi_Tujuan', $row->Reformasi_Tujuan),
		'Rencana_Aksi' => set_value('Rencana_Aksi', $row->Rencana_Aksi),
		'Data_Dasar' => set_value('Data_Dasar', $row->Data_Dasar),
		'Tahun_Anggaran' => set_value('Tahun_Anggaran', $row->Tahun_Anggaran),
		'Kode_Program' => set_value('Kode_Program', $row->Kode_Program),
		'Program' => set_value('Program', $row->Program),
		'Kegiatan' => set_value('Kegiatan', $row->Kegiatan),
		'Sub_Kegiatan' => set_value('Sub_Kegiatan', $row->Sub_Kegiatan),
		'Tujuan' => set_value('Tujuan', $row->Tujuan),
		'Analisis_Situasi' => set_value('Analisis_Situasi', $row->Analisis_Situasi),
		'Hasil' => set_value('Hasil', $row->Hasil),
		'Belanja1_Tujuan' => set_value('Belanja1_Tujuan', $row->Belanja1_Tujuan),
		'Belanja1_Alokasianggaran' => set_value('Belanja1_Alokasianggaran', $row->Belanja1_Alokasianggaran),
		'Belanja2_Tujuan' => set_value('Belanja2_Tujuan', $row->Belanja2_Tujuan),
		'Belanja2_Alokasianggaran' => set_value('Belanja2_Alokasianggaran', $row->Belanja2_Alokasianggaran),
		'Capaian_Program' => set_value('Capaian_Program', $row->Capaian_Program),
	    );
            $this->template->load('template','tb_kak/tb_kak_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_kak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Id_kak', TRUE));
        } else {
            $data = array(
		'Kode_skpd' => $this->input->post('Kode_skpd',TRUE),
		'Wawasan' => $this->input->post('Wawasan',TRUE),
		'Faktor_Kesenjangan' => $this->input->post('Faktor_Kesenjangan',TRUE),
		'Sebab_Kesenjagan_Internal' => $this->input->post('Sebab_Kesenjagan_Internal',TRUE),
		'Sebab_Kesenjagan_Eksternal' => $this->input->post('Sebab_Kesenjagan_Eksternal',TRUE),
		'Reformasi_Tujuan' => $this->input->post('Reformasi_Tujuan',TRUE),
		'Rencana_Aksi' => $this->input->post('Rencana_Aksi',TRUE),
		'Data_Dasar' => $this->input->post('Data_Dasar',TRUE),
		'Tahun_Anggaran' => $this->input->post('Tahun_Anggaran',TRUE),
		'Kode_Program' => $this->input->post('Kode_Program',TRUE),
		'Program' => $this->input->post('Program',TRUE),
		'Kegiatan' => $this->input->post('Kegiatan',TRUE),
		'Sub_Kegiatan' => $this->input->post('Sub_Kegiatan',TRUE),
		'Tujuan' => $this->input->post('Tujuan',TRUE),
		'Analisis_Situasi' => $this->input->post('Analisis_Situasi',TRUE),
		'Hasil' => $this->input->post('Hasil',TRUE),
		'Belanja1_Tujuan' => $this->input->post('Belanja1_Tujuan',TRUE),
		'Belanja1_Alokasianggaran' => $this->input->post('Belanja1_Alokasianggaran',TRUE),
		'Belanja2_Tujuan' => $this->input->post('Belanja2_Tujuan',TRUE),
		'Belanja2_Alokasianggaran' => $this->input->post('Belanja2_Alokasianggaran',TRUE),
		'Capaian_Program' => $this->input->post('Capaian_Program',TRUE),
	    );

            $this->Tb_kak_model->update($this->input->post('Id_kak', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_kak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_kak_model->get_by_id($id);

        if ($row) {
            $this->Tb_kak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_kak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_kak'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Kode_skpd', 'kode skpd', 'trim|required');
	$this->form_validation->set_rules('Wawasan', 'wawasan', 'trim|required');
	$this->form_validation->set_rules('Faktor_Kesenjangan', 'faktor kesenjangan', 'trim|required');
	$this->form_validation->set_rules('Sebab_Kesenjagan_Internal', 'sebab kesenjagan internal', 'trim|required');
	$this->form_validation->set_rules('Sebab_Kesenjagan_Eksternal', 'sebab kesenjagan eksternal', 'trim|required');
	$this->form_validation->set_rules('Reformasi_Tujuan', 'reformasi tujuan', 'trim|required');
	$this->form_validation->set_rules('Rencana_Aksi', 'rencana aksi', 'trim|required');
	$this->form_validation->set_rules('Data_Dasar', 'data dasar', 'trim|required');
	$this->form_validation->set_rules('Tahun_Anggaran', 'tahun anggaran', 'trim|required');
	$this->form_validation->set_rules('Kode_Program', 'kode program', 'trim|required');
	$this->form_validation->set_rules('Program', 'program', 'trim|required');
	$this->form_validation->set_rules('Kegiatan', 'kegiatan', 'trim|required');
	$this->form_validation->set_rules('Sub_Kegiatan', 'sub kegiatan', 'trim|required');
	$this->form_validation->set_rules('Tujuan', 'tujuan', 'trim|required');
	$this->form_validation->set_rules('Analisis_Situasi', 'analisis situasi', 'trim|required');
	$this->form_validation->set_rules('Hasil', 'hasil', 'trim|required');
	$this->form_validation->set_rules('Belanja1_Tujuan', 'belanja1 tujuan', 'trim|required');
	$this->form_validation->set_rules('Belanja1_Alokasianggaran', 'belanja1 alokasianggaran', 'trim|required');
	$this->form_validation->set_rules('Belanja2_Tujuan', 'belanja2 tujuan', 'trim|required');
	$this->form_validation->set_rules('Belanja2_Alokasianggaran', 'belanja2 alokasianggaran', 'trim|required');
	$this->form_validation->set_rules('Capaian_Program', 'capaian program', 'trim|required');

	$this->form_validation->set_rules('Id_kak', 'Id_kak', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_kak.xls";
        $judul = "tb_kak";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Skpd");
	xlsWriteLabel($tablehead, $kolomhead++, "Wawasan");
	xlsWriteLabel($tablehead, $kolomhead++, "Faktor Kesenjangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Sebab Kesenjagan Internal");
	xlsWriteLabel($tablehead, $kolomhead++, "Sebab Kesenjagan Eksternal");
	xlsWriteLabel($tablehead, $kolomhead++, "Reformasi Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Rencana Aksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Data Dasar");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Anggaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Program");
	xlsWriteLabel($tablehead, $kolomhead++, "Program");
	xlsWriteLabel($tablehead, $kolomhead++, "Kegiatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Sub Kegiatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Analisis Situasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Hasil");
	xlsWriteLabel($tablehead, $kolomhead++, "Belanja1 Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Belanja1 Alokasianggaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Belanja2 Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Belanja2 Alokasianggaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Capaian Program");

	foreach ($this->Tb_kak_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kode_skpd);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Wawasan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Faktor_Kesenjangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Sebab_Kesenjagan_Internal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Sebab_Kesenjagan_Eksternal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Reformasi_Tujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Rencana_Aksi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Data_Dasar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Tahun_Anggaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kode_Program);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Program);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kegiatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Sub_Kegiatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Tujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Analisis_Situasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Hasil);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Belanja1_Tujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Belanja1_Alokasianggaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Belanja2_Tujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Belanja2_Alokasianggaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Capaian_Program);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_kak.doc");

        $data = array(
            'tb_kak_data' => $this->Tb_kak_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_kak/tb_kak_doc',$data);
    }

}

/* End of file Tb_kak.php */
/* Location: ./application/controllers/Tb_kak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-28 03:23:50 */
/* http://harviacode.com */