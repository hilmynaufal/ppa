<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelola_tor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_tor');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','kelola_tor/tb_tor_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_tor->json();
    }

    public function read($id) 
    {
        $row = $this->Model_tor->get_by_id($id);
        if ($row) {
            $data = array(
                'tor_id'=>$row->tor_id,
                'name' =>$row->name,
                  'leader'=> $row->leader,
                'nip_leader'=> $row->nip_leader,
                'pangkat'=> $row->pangkat,
                'jabatan'=> $row->jabatan,
                'tor_skpd' =>$row->tor_skpd,
                'tor_tahun'=>$row->tor_tahun,
                'tor_program' =>$row->tor_program,
                'tor_sasaran' =>$row->tor_sasaran,
                'tor_kegiatan' =>$row->tor_kegiatan,
		'tor_id' => $row->tor_id,
		'tor_kak_id' => $row->tor_kak_id,
		'tor_dasar_hukum' => $row->tor_dasar_hukum,
		'tor_gambaran_umum' => $row->tor_gambaran_umum,
		'tor_uraian_kerja' => $row->tor_uraian_kerja,
		'tor_indikator_kerja' => $row->tor_indikator_kerja,
		'tor_batasan_kegiatan' => $row->tor_batasan_kegiatan,
		'tor_maksud_tujuan' => $row->tor_maksud_tujuan,
		'tor_cara_pelaksanaan' => $row->tor_cara_pelaksanaan,
		'tor_tempat_pelaksanaan' => $row->tor_tempat_pelaksanaan,
		'tor_penanggung_jawab' => $row->tor_penanggung_jawab,
		'tor_jadwal' => $row->tor_jadwal,
		'tor_biaya' => $row->tor_biaya,
		'create_id' => $row->create_id,
		'update_id' => $row->update_id,
		'create' => $row->create,
		'update' => $row->update,
		'delete' => $row->delete,
	    );
            
            //var_dump($data)or die();
            $this->template->load('template','kelola_tor/tb_tor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_tor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelola_tor/create_action'),
	    'tor_id' => set_value('tor_id'),
              'tor_tahun'=>set_value('tor_tahun'),
	    'tor_kak_id' => set_value('tor_kak_id'),
             'tor_skpd' =>set_value('Kode_skpd'),
            'tor_program' =>set_value('tor_program'),
            'tor_sasaran' =>set_value('tor_sasaran'),
            'tor_kegiatan' =>set_value('tor_kegiatan'),
            'tor_dasar_hukum' => set_value('tor_dasar_hukum'),
	    'tor_gambaran_umum' => set_value('tor_gambaran_umum'),
	    'tor_uraian_kerja' => set_value('tor_uraian_kerja'),
	    'tor_indikator_kerja' => set_value('tor_indikator_kerja'),
	    'tor_batasan_kegiatan' => set_value('tor_batasan_kegiatan'),
	    'tor_maksud_tujuan' => set_value('tor_maksud_tujuan'),
	    'tor_cara_pelaksanaan' => set_value('tor_cara_pelaksanaan'),
	    'tor_tempat_pelaksanaan' => set_value('tor_tempat_pelaksanaan'),
	    'tor_penanggung_jawab' => set_value('tor_penanggung_jawab'),
	    'tor_jadwal' => set_value('tor_jadwal'),
	    'tor_biaya' => set_value('tor_biaya'),
	    'create_id' => set_value('create_id'),
	    'update_id' => set_value('update_id'),
	    'create' => set_value('create'),
	    'update' => set_value('update'),
	    'delete' => set_value('delete'),
	);
        $this->template->load('template','kelola_tor/tb_tor_form', $data);
    }
    
    public function create_action() 
    {
//        $d=strtotime(time, now);
//        $date=date("Y-m-d h:i:sa", $d);

      
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		
                'tor_skpd' =>$this->input->post('Kode_skpd',TRUE),
               
                'tor_program' => preg_replace("/[^a-zA-Z]/"," ", $this->input->post('Kode_Program',TRUE)),
                'tor_sasaran' =>$this->input->post('tor_sasaran',TRUE),
                
                'tor_kegiatan' =>preg_replace("/[^a-zA-Z]/"," ", $this->input->post('Kegiatan',TRUE)),
//                'tor_tahun'=>set_value('Tahun_Anggaran'),
                'tor_tahun' => $this->input->post('Tahun_Anggaran',TRUE),
                                 
		'tor_dasar_hukum' => $this->input->post('tor_dasar_hukum',TRUE),
		'tor_gambaran_umum' => $this->input->post('tor_gambaran_umum',TRUE),
		'tor_uraian_kerja' => $this->input->post('tor_uraian_kerja',TRUE),
		'tor_indikator_kerja' => $this->input->post('tor_indikator_kerja',TRUE),
		'tor_batasan_kegiatan' => $this->input->post('tor_batasan_kegiatan',TRUE),
		'tor_maksud_tujuan' => $this->input->post('tor_maksud_tujuan',TRUE),
		'tor_cara_pelaksanaan' => $this->input->post('tor_cara_pelaksanaan',TRUE),
		'tor_tempat_pelaksanaan' => $this->input->post('tor_tempat_pelaksanaan',TRUE),
		'tor_penanggung_jawab' => $this->input->post('tor_penanggung_jawab',TRUE),
		'tor_jadwal' => $this->input->post('tor_jadwal',TRUE),
		'tor_biaya' => $this->input->post('tor_biaya',TRUE),
		'create_id' =>  $_SESSION['id_users'],
		'update_id' =>  $_SESSION['id_users'],
		'create' => date('Y-m-d H:i:s')
		
                
                
          
	    );
          //    var_dump($_POST)or die();
            $this->Model_tor->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kelola_tor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_tor->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelola_tor/update_action'),
		'tor_id' => set_value('tor_id', $row->tor_id),
                
                
                      'tor_skpd' =>set_value('tor_id', $row->tor_skpd),
                'tor_program' =>set_value('tor_id', $row->tor_program),
                'tor_sasaran' =>set_value('tor_id', $row->tor_sasaran),
                'tor_kegiatan' =>set_value('tor_id', $row->tor_kegiatan),
                'tor_tahun'=>set_value('tor_id', $row->tor_tahun),
                
		'tor_kak_id' => set_value('tor_kak_id', $row->tor_kak_id),
		'tor_dasar_hukum' => set_value('tor_dasar_hukum', $row->tor_dasar_hukum),
		'tor_gambaran_umum' => set_value('tor_gambaran_umum', $row->tor_gambaran_umum),
		'tor_uraian_kerja' => set_value('tor_uraian_kerja', $row->tor_uraian_kerja),
		'tor_indikator_kerja' => set_value('tor_indikator_kerja', $row->tor_indikator_kerja),
		'tor_batasan_kegiatan' => set_value('tor_batasan_kegiatan', $row->tor_batasan_kegiatan),
		'tor_maksud_tujuan' => set_value('tor_maksud_tujuan', $row->tor_maksud_tujuan),
		'tor_cara_pelaksanaan' => set_value('tor_cara_pelaksanaan', $row->tor_cara_pelaksanaan),
		'tor_tempat_pelaksanaan' => set_value('tor_tempat_pelaksanaan', $row->tor_tempat_pelaksanaan),
		'tor_penanggung_jawab' => set_value('tor_penanggung_jawab', $row->tor_penanggung_jawab),
		'tor_jadwal' => set_value('tor_jadwal', $row->tor_jadwal),
		'tor_biaya' => set_value('tor_biaya', $row->tor_biaya),
		'create_id' => set_value('create_id', $row->create_id),
		'update_id' => set_value('update_id', $row->update_id),
		'create' => set_value('create', $row->create),
		'update' => set_value('update', $row->update),
		'delete' => set_value('delete', $row->delete),
	    );
            
            
            $this->template->load('template','kelola_tor/tb_tor_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_tor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
      //  var_dump($_POST)or die();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('tor_id', TRUE));
        } else {
            $data = array(
//		'tor_kak_id' => $this->input->post('tor_kak_id',TRUE),
                
                'tor_program' =>$this->input->post('Kode_Program',TRUE),
                'tor_sasaran' =>$this->input->post('tor_sasaran',TRUE),
                'tor_kegiatan' =>$this->input->post('Kegiatan',TRUE),
                
		'tor_dasar_hukum' => $this->input->post('tor_dasar_hukum',TRUE),
		'tor_gambaran_umum' => $this->input->post('tor_gambaran_umum',TRUE),
		'tor_uraian_kerja' => $this->input->post('tor_uraian_kerja',TRUE),
		'tor_indikator_kerja' => $this->input->post('tor_indikator_kerja',TRUE),
		'tor_batasan_kegiatan' => $this->input->post('tor_batasan_kegiatan',TRUE),
		'tor_maksud_tujuan' => $this->input->post('tor_maksud_tujuan',TRUE),
		'tor_cara_pelaksanaan' => $this->input->post('tor_cara_pelaksanaan',TRUE),
		'tor_tempat_pelaksanaan' => $this->input->post('tor_tempat_pelaksanaan',TRUE),
		'tor_penanggung_jawab' => $this->input->post('tor_penanggung_jawab',TRUE),
		'tor_jadwal' => $this->input->post('tor_jadwal',TRUE),
		'tor_biaya' => $this->input->post('tor_biaya',TRUE),
		
		'update_id' => $_SESSION['id_users'],
		
		'update' => date('Y-m-d H:i:s')
		
	    );

            $this->Model_tor->update($this->input->post('tor_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelola_tor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_tor->get_by_id($id);

        if ($row) {
            $this->Model_tor->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelola_tor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_tor'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('tahun', 'tor tahun', 'trim|required');
        $this->form_validation->set_rules('Kode_Program', 'kode program', 'trim|required');
//	$this->form_validation->set_rules('tor_dasar_hukum', 'tor dasar hukum', 'trim|required');
//	$this->form_validation->set_rules('tor_gambaran_umum', 'tor gambaran umum', 'trim|required');
//	$this->form_validation->set_rules('tor_uraian_kerja', 'tor uraian kerja', 'trim|required');
//	$this->form_validation->set_rules('tor_indikator_kerja', 'tor indikator kerja', 'trim|required');
//	$this->form_validation->set_rules('tor_batasan_kegiatan', 'tor batasan kegiatan', 'trim|required');
//	$this->form_validation->set_rules('tor_maksud_tujuan', 'tor maksud tujuan', 'trim|required');
//	$this->form_validation->set_rules('tor_cara_pelaksanaan', 'tor cara pelaksanaan', 'trim|required');
//	$this->form_validation->set_rules('tor_tempat_pelaksanaan', 'tor tempat pelaksanaan', 'trim|required');
//	$this->form_validation->set_rules('tor_penanggung_jawab', 'tor penanggung jawab', 'trim|required');
//	$this->form_validation->set_rules('tor_jadwal', 'tor jadwal', 'trim|required');
//	$this->form_validation->set_rules('tor_biaya', 'tor biaya', 'trim|required');
//	$this->form_validation->set_rules('create_id', 'create id', 'trim|required');
//	$this->form_validation->set_rules('update_id', 'update id', 'trim|required');
//	$this->form_validation->set_rules('create', 'create', 'trim|required');
//	$this->form_validation->set_rules('update', 'update', 'trim|required');
//	$this->form_validation->set_rules('delete', 'delete', 'trim|required');

	$this->form_validation->set_rules('tor_id', 'tor_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_tor.xls";
        $judul = "tb_tor";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tor Kak Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Tor Dasar Hukum");
	xlsWriteLabel($tablehead, $kolomhead++, "Tor Gambaran Umum");
	xlsWriteLabel($tablehead, $kolomhead++, "Tor Uraian Kerja");
	xlsWriteLabel($tablehead, $kolomhead++, "Tor Indikator Kerja");
	xlsWriteLabel($tablehead, $kolomhead++, "Tor Batasan Kegiatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tor Maksud Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tor Cara Pelaksanaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tor Tempat Pelaksanaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tor Penanggung Jawab");
	xlsWriteLabel($tablehead, $kolomhead++, "Tor Jadwal");
	xlsWriteLabel($tablehead, $kolomhead++, "Tor Biaya");
	xlsWriteLabel($tablehead, $kolomhead++, "Create Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Update Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Create");
	xlsWriteLabel($tablehead, $kolomhead++, "Update");
	xlsWriteLabel($tablehead, $kolomhead++, "Delete");

	foreach ($this->Model_tor->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tor_kak_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tor_dasar_hukum);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tor_gambaran_umum);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tor_uraian_kerja);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tor_indikator_kerja);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tor_batasan_kegiatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tor_maksud_tujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tor_cara_pelaksanaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tor_tempat_pelaksanaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tor_penanggung_jawab);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tor_jadwal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tor_biaya);
	    xlsWriteNumber($tablebody, $kolombody++, $data->create_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->update_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update);
	    xlsWriteLabel($tablebody, $kolombody++, $data->delete);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_tor.doc");

        $data = array(
            'tb_tor_data' => $this->Model_tor->get_all(),
            'start' => 0
        );
        
        $this->load->view('kelola_tor/tb_tor_doc',$data);
    }

}

/* End of file Kelola_tor.php */
/* Location: ./application/controllers/Kelola_tor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-31 15:50:09 */
/* http://harviacode.com */