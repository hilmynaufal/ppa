<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_kak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_kak');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

	function get_program(){
		
		if (isset($_GET['term'])) {
		
		
		  	$result = $this->Model_kak->search_program($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
					 'label'   => $row->nama_program,
					 'kode_program'  => $row->kode_program,
                     'nama_program'  => $row->nama_program,
				);
		     	echo json_encode($arr_result);
		   	}
		}
	}


    function get_kegiatan(){
		
		if (isset($_GET['term'])) {
		
		
		  	$result = $this->Model_kak->search_giat($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
					 'label'   => $row->nama_giat,
					 'kode_giat'  => $row->kode_giat,
                     'nama_giat'  => $row->nama_giat,
					 'nama_sub_giat' =>$row->nama_sub_giat,
				);
		     	echo json_encode($arr_result);
		   	}
		}
	}

    public function index()
    {
        $this->template->load('template','data_kak/tb_kak_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_kak->json();
    }

    public function read($id) 
    {
        $row = $this->Model_kak->get_by_id($id);

		//var_dump($row)or die();
        if ($row) {
            $data = array(
			
		'Id_kak' => $row->Id_kak,
		'Kode_skpd' => $row->Kode_skpd,
		'Tahun_Anggaran' => $row->Tahun_Anggaran,
		'Kode_Program' => $row->Kode_Program,
		'Program' => $row->Program,
		'Kegiatan' => $row->Kegiatan,
		'Sub_Kegiatan' => $row->Sub_Kegiatan,
		'Tujuan' => $row->Tujuan,
		'Analisis_Situasi' => $row->Analisis_Situasi,
		'Hasil' => $row->Hasil,
		'Belanja1_Tujuan' => $row->Belanja1_Tujuan,
		'Belanja1_Alokasianggaran' => ($row->Belanja1_Alokasianggaran),
		'Belanja2_Tujuan' => $row->Belanja2_Tujuan,
		'Belanja2_Alokasianggaran' => ($row->Belanja2_Alokasianggaran),
		'Capaian_Program' => $row->Capaian_Program,
	    );
            $this->template->load('template','data_kak/tb_kak_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_kak'));
        }
    }

    public function create() 
    {
		//$this->data['tampil_unit']	 = $this->unit_model->tampil_unit();

        $data = array(
            'button' => 'Create',
            'action' => site_url('data_kak/create_action'),
	    'Id_kak' => set_value('Id_kak'),
	    'Kode_skpd' => set_value('Kode_skpd'),
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
	//var_dump($data) or die();
        $this->template->load('template','data_kak/tb_kak_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
		
            $data = array(
		'Kode_skpd' => $this->input->post('Kode_skpd',TRUE),
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

            $this->Model_kak->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('data_kak'));
        }
    }


	public function upload() {

		//var_dump($_POST) or die();

		$string=$_POST['base64'];
		$str_arr = explode (",", $string); 

		//print_r($str_arr);
		//var_dump($str_arr[1]) or die();

		$pdf_base64 = $str_arr[1];
		//Get File content from txt file
		//$pdf_base64_handler = fopen($pdf_base64,'r');

		//var_dump($pdf_base64_handler) or die();
		// $pdf_content = fread ($pdf_base64_handler,filesize($pdf_base64));
		// fclose ($pdf_base64_handler);
		//Decode pdf content
		$pdf_decoded = base64_decode($pdf_base64);
		//Write data back to pdf file
		$pdf = fopen ('./upload/test.pdf','w');
		fwrite ($pdf,$pdf_decoded);
		//close output file
		fclose ($pdf);
		echo 'Done';

	}
    
    public function update($id) 
    {
        $row = $this->Model_kak->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_kak/update_action'),
		'Id_kak' => set_value('Id_kak', $row->Id_kak),
		'Kode_skpd' => set_value('Kode_skpd', $row->Kode_skpd),
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
		//var_dump($data)or die();
            $this->template->load('template','data_kak/tb_kak_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_kak'));
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

            $this->Model_kak->update($this->input->post('Id_kak', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_kak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_kak->get_by_id($id);

        if ($row) {
            $this->Model_kak->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_kak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_kak'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Kode_skpd', 'kode skpd', 'trim|required');
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

	foreach ($this->Model_kak->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kode_skpd);
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

}

/* End of file Data_kak.php */
/* Location: ./application/controllers/Data_kak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-04-13 09:18:16 */
/* http://harviacode.com */