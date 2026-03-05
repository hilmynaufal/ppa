<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelola_ajb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_ajb');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','kelola_ajb/tbl_ajb_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_ajb->json();
    }

    public function read($id) 
    {
        $row = $this->Model_ajb->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ajb' => $row->id_ajb,
		'kode_akta' => $row->kode_akta,
		'penjual' => $row->penjual,
		'ktp_penjual' => $row->ktp_penjual,
		'pembeli' => $row->pembeli,
		'ktp_pembeli' => $row->ktp_pembeli,
		'jenis_akta' => $row->jenis_akta,
		'nomor_akta' => $row->nomor_akta,
		'tanggal_akta' => $row->tanggal_akta,
		'letter_kohir' => $row->letter_kohir,
		'letter_nopersil' => $row->letter_nopersil,
		'letter_blok' => $row->letter_blok,
		'luas' => $row->luas,
		'batas_utara' => $row->batas_utara,
		'batas_selatan' => $row->batas_selatan,
		'batas_timur' => $row->batas_timur,
		'batas_barat' => $row->batas_barat,
		'nilai_transaksi' => $row->nilai_transaksi,
		'status_berkas' => $row->status_berkas,
		'sppt_pbb' => $row->sppt_pbb,
		'resi' => $row->resi,
		'keterangan' => $row->keterangan,
		'keterangan_tercatat' => $row->keterangan_tercatat,
                'akta_selesai'=>$row->akta_selesai
	    );
            $this->template->load('template','kelola_ajb/tbl_ajb_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_ajb'));
        }
    }
    
    
    public function read_selesai($id) 
    {
        $row = $this->Model_ajb->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ajb' => $row->id_ajb,
		'kode_akta' => $row->kode_akta,
		'penjual' => $row->penjual,
		'ktp_penjual' => $row->ktp_penjual,
		'pembeli' => $row->pembeli,
		'ktp_pembeli' => $row->ktp_pembeli,
		'jenis_akta' => $row->jenis_akta,
		'nomor_akta' => $row->nomor_akta,
		'tanggal_akta' => $row->tanggal_akta,
		'letter_kohir' => $row->letter_kohir,
		'letter_nopersil' => $row->letter_nopersil,
		'letter_blok' => $row->letter_blok,
		'luas' => $row->luas,
		'batas_utara' => $row->batas_utara,
		'batas_selatan' => $row->batas_selatan,
		'batas_timur' => $row->batas_timur,
		'batas_barat' => $row->batas_barat,
		'nilai_transaksi' => $row->nilai_transaksi,
		'status_berkas' => $row->status_berkas,
		'sppt_pbb' => $row->sppt_pbb,
		'resi' => $row->resi,
		'keterangan' => $row->keterangan,
		'keterangan_tercatat' => $row->keterangan_tercatat,
                'akta_selesai'=>$row->akta_selesai
	    );
            $this->template->load('template','kelola_ajb/tbl_ajb_read_selesai', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_ajb'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelola_ajb/create_action'),
	    'id_ajb' => set_value('id_ajb'),
	    'kode_akta' => set_value('kode_akta'),
	    'penjual' => set_value('penjual'),
              'nik_penjual' => set_value('nik_penjual'),
              'nik_pembeli' => set_value('nik_pembeli'),
	    'ktp_penjual' => set_value('ktp_penjual'),
	    'pembeli' => set_value('pembeli'),
	    'ktp_pembeli' => set_value('ktp_pembeli'),
	    'jenis_akta' => set_value('jenis_akta'),
	    'nomor_akta' => set_value('nomor_akta'),
	    'tanggal_akta' => set_value('tanggal_akta'),
	    'letter_kohir' => set_value('letter_kohir'),
	    'letter_nopersil' => set_value('letter_nopersil'),
	    'letter_blok' => set_value('letter_blok'),
	    'luas' => set_value('luas'),
	    'batas_utara' => set_value('batas_utara'),
	    'batas_selatan' => set_value('batas_selatan'),
	    'batas_timur' => set_value('batas_timur'),
	    'batas_barat' => set_value('batas_barat'),
	    'nilai_transaksi' => set_value('nilai_transaksi'),
	    'status_berkas' => set_value('status_berkas'),
	    'sppt_pbb' => set_value('sppt_pbb'),
	    'resi' => set_value('resi'),
	    'keterangan' => set_value('keterangan'),
	    'keterangan_tercatat' => set_value('keterangan_tercatat'),
            'akta_selesai'=> set_value('akta_selesai'),
             'akta_sebelum'=> set_value('akta_sebelum'),
	    'create_at' => set_value('create_at'),
	    'update' => set_value('update'),
	    'delete' => set_value('delete'),
	);
        $this->template->load('template','kelola_ajb/tbl_ajb_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
              $new_name = time();
            $kode_layanan = $new_name.'-32.04.37';
            
            
              $config['allowed_types'] = 'pdf';
            $config['encrypt_name'] = true;
         
            $new_name = time();
            $config['file_name'] =$new_name;

            $this->load->library('upload', $config);
       
            $this->upload->do_upload('file1');
            $file1 = $this->upload->data();
         
          

            
         if(!empty($_FILES["ktp_penjual"]["name"])){
       
            $temp = explode(".", $_FILES["ktp_penjual"]["name"]);
            $newfilename1 = $kode_layanan.'-ktp_penjual.pdf';
            
           // var_dump($newfilename1)or die();
              move_uploaded_file($_FILES["ktp_penjual"]["tmp_name"], "./upload_akta/" . $newfilename1);
         }
        
       if(!empty($_FILES["ktp_pembeli"]["name"])){
        //file2
            $temp = explode(".", $_FILES["ktp_pembeli"]["name"]);
            $newfilename2 = $kode_layanan.'-ktp_pembeli.pdf';
        
            move_uploaded_file($_FILES["ktp_pembeli"]["tmp_name"], "./upload_akta/" . $newfilename2);
          }
        
         if(!empty($_FILES["akta_selesai"]["name"])){
        //akta_selesai
            $temp = explode(".", $_FILES["akta_selesai"]["name"]);
            $newfilename3 = $kode_layanan.'-akta_selesai.pdf';
            move_uploaded_file($_FILES["akta_selesai"]["tmp_name"], "./upload_akta/" . $newfilename3);
           }
        
           if (!empty($_FILES["sppt_pbb"]["name"])) {
                $temp = explode(".", $_FILES["sppt_pbb"]["name"]);
                $newfilename4 = $kode_layanan . '-sppt_pbb.pdf';
                move_uploaded_file($_FILES["sppt_pbb"]["tmp_name"], "./upload_akta/" . $newfilename4);
            }
            
            
               
              if(!empty($_FILES["akta_sebelum"]["name"])){
        //akta_selesai
            $temp = explode(".", $_FILES["akta_sebelum"]["name"]);
            $newfilename5 = $kode_layanan.'-akta_sebelum.pdf';
            move_uploaded_file($_FILES["akta_sebelum"]["tmp_name"], "./upload_akta/" . $newfilename5);
           }




            $data = array(
		'kode_akta' => $kode_layanan,
		'nik_penjual' => $this->input->post('nik_penjual',TRUE),
                'nik_pembeli' => $this->input->post('nik_pembeli',TRUE),
                'penjual' => $this->input->post('penjual',TRUE),
		'ktp_penjual' => $newfilename1,
		'pembeli' => $this->input->post('pembeli',TRUE),
		'ktp_pembeli' => $newfilename2,
		'jenis_akta' => $this->input->post('jenis_akta',TRUE),
		'nomor_akta' => $this->input->post('nomor_akta',TRUE),
		'tanggal_akta' => $this->input->post('tanggal_akta',TRUE),
		'letter_kohir' => $this->input->post('letter_kohir',TRUE),
		'letter_nopersil' => $this->input->post('letter_nopersil',TRUE),
		'letter_blok' => $this->input->post('letter_blok',TRUE),
		'luas' => $this->input->post('luas',TRUE),
		'batas_utara' => $this->input->post('batas_utara',TRUE),
		'batas_selatan' => $this->input->post('batas_selatan',TRUE),
		'batas_timur' => $this->input->post('batas_timur',TRUE),
		'batas_barat' => $this->input->post('batas_barat',TRUE),
		'nilai_transaksi' => $this->input->post('nilai_transaksi',TRUE),
		'status_berkas' =>'1',
		'sppt_pbb' => $newfilename4,
		'resi' => $this->input->post('resi',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'keterangan_tercatat' => $this->input->post('keterangan_tercatat',TRUE),
                'akta_selesai' => $newfilename3,
                 'akta_sebelum' => $newfilename5,
                'create_at' => date('Y-m-d H:i:s'),
		'update_at' => date('Y-m-d H:i:s'),
		'delete_at' => null
		
	
	    );

            $this->Model_ajb->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kelola_ajb'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_ajb->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelola_ajb/update_action'),
		'id_ajb' => set_value('id_ajb', $row->id_ajb),
		
		'penjual' => set_value('penjual', $row->penjual),
                'kode_akta' => set_value('kode_akta', $row->kode_akta),
                
                'nik_penjual' => set_value('nik_penjual', $row->nik_penjual),
                'nik_pembeli' => set_value('nik_pembeli', $row->nik_pembeli),
                
		'ktp_penjual' => set_value('ktp_penjual', $row->ktp_penjual),
		'pembeli' => set_value('pembeli', $row->pembeli),
		'ktp_pembeli' => set_value('ktp_pembeli', $row->ktp_pembeli),
		'jenis_akta' => set_value('jenis_akta', $row->jenis_akta),
		'nomor_akta' => set_value('nomor_akta', $row->nomor_akta),
		'tanggal_akta' => set_value('tanggal_akta', $row->tanggal_akta),
		'letter_kohir' => set_value('letter_kohir', $row->letter_kohir),
		'letter_nopersil' => set_value('letter_nopersil', $row->letter_nopersil),
		'letter_blok' => set_value('letter_blok', $row->letter_blok),
		'luas' => set_value('luas', $row->luas),
		'batas_utara' => set_value('batas_utara', $row->batas_utara),
		'batas_selatan' => set_value('batas_selatan', $row->batas_selatan),
		'batas_timur' => set_value('batas_timur', $row->batas_timur),
		'batas_barat' => set_value('batas_barat', $row->batas_barat),
		'nilai_transaksi' => set_value('nilai_transaksi', $row->nilai_transaksi),
		'status_berkas' => set_value('status_berkas', $row->status_berkas),
		'sppt_pbb' => set_value('sppt_pbb', $row->sppt_pbb),
		'resi' => set_value('resi', $row->resi),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'keterangan_tercatat' => set_value('keterangan_tercatat', $row->keterangan_tercatat),
                'akta_selesai' => set_value('akta_selesai', $row->akta_selesai),
                'akta_sebelum' => set_value('akta_sebelum', $row->akta_sebelum)
		
	    );
            $this->template->load('template','kelola_ajb/tbl_ajb_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_ajb'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ajb', TRUE));
        } else {
            
            $kode_layanan=$_POST['kode_akta'];
               
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name'] = true;
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            
            
             if(!empty($_FILES["ktp_penjual"]["name"])){
       
            $temp = explode(".", $_FILES["ktp_penjual"]["name"]);
            $newfilename1 = $kode_layanan.'-ktp_penjual.pdf';
            
           // var_dump($newfilename1)or die();
              move_uploaded_file($_FILES["ktp_penjual"]["tmp_name"], "./upload_akta/" . $newfilename1);
         }
         else {
                $newfilename1 = $_POST['ktp_penjual2'];
            }
        
       if(!empty($_FILES["ktp_pembeli"]["name"])){
        //file2
            $temp = explode(".", $_FILES["ktp_pembeli"]["name"]);
            $newfilename2 = $kode_layanan.'-ktp_pembeli.pdf';
        
            move_uploaded_file($_FILES["ktp_pembeli"]["tmp_name"], "./upload_akta/" . $newfilename2);
          }else {
                $newfilename2 = $_POST['ktp_pembeli2'];
            }
            
           // var_dump($newfilename2)or die();
          
        
         if (!empty($_FILES["akta_selesai"]["name"])) {
                //akta_selesai
                $temp = explode(".", $_FILES["akta_selesai"]["name"]);
                $newfilename3 = $kode_layanan . '-akta_selesai.pdf';
                move_uploaded_file($_FILES["akta_selesai"]["tmp_name"], "./upload_akta/" . $newfilename3);
            } else {
                $newfilename3 = $_POST['akta_selesai2'];
            }

            if (!empty($_FILES["sppt_pbb"]["name"])) {
                $temp = explode(".", $_FILES["sppt_pbb"]["name"]);
                $newfilename4 = $kode_layanan . '-sppt_pbb.pdf';
                move_uploaded_file($_FILES["sppt_pbb"]["tmp_name"], "./upload_akta/" . $newfilename4);
            } else {
                $newfilename4 = $_POST['sppt_pbb2'];
            }


            if (!empty($_FILES["akta_sebelum"]["name"])) {
                $temp = explode(".", $_FILES["akta_sebelum"]["name"]);
                $newfilename5 = $kode_layanan . '-akta_sebelum.pdf';
                move_uploaded_file($_FILES["akta_sebelum"]["tmp_name"], "./upload_akta/" . $newfilename5);
            } else {
                $newfilename5 = $_POST['akta_sebelum2'];
            }




            $data = array(
		
		'penjual' => $this->input->post('penjual',TRUE),
		'ktp_penjual' => $newfilename1,
		'pembeli' => $this->input->post('pembeli',TRUE),
		'ktp_pembeli' => $newfilename2,
		'jenis_akta' => $this->input->post('jenis_akta',TRUE),
		'nomor_akta' => $this->input->post('nomor_akta',TRUE),
		'tanggal_akta' => $this->input->post('tanggal_akta',TRUE),
		'letter_kohir' => $this->input->post('letter_kohir',TRUE),
		'letter_nopersil' => $this->input->post('letter_nopersil',TRUE),
		'letter_blok' => $this->input->post('letter_blok',TRUE),
		'luas' => $this->input->post('luas',TRUE),
		'batas_utara' => $this->input->post('batas_utara',TRUE),
		'batas_selatan' => $this->input->post('batas_selatan',TRUE),
		'batas_timur' => $this->input->post('batas_timur',TRUE),
		'batas_barat' => $this->input->post('batas_barat',TRUE),
		'nilai_transaksi' => $this->input->post('nilai_transaksi',TRUE),
		'status_berkas' => $this->input->post('status_berkas',TRUE),
		'sppt_pbb' => $newfilename4,
		'resi' => $this->input->post('resi',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'keterangan_tercatat' => $this->input->post('keterangan_tercatat',TRUE),
                'akta_selesai' => $newfilename3,
                'akta_sebelum' => $newfilename5,
		'update_at' => null,
		'update_at' => date('Y-m-d H:i:s')
                
                	
		
	    );

            $this->Model_ajb->update($this->input->post('id_ajb', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelola_ajb'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_ajb->get_by_id($id);

        if ($row) {
            $this->Model_ajb->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelola_ajb'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_ajb'));
        }
    }

    public function _rules() 
    {
//	$this->form_validation->set_rules('kode_akta', 'kode akta', 'trim|required');
	$this->form_validation->set_rules('nik_penjual', 'nik penjual', 'trim|required');
        $this->form_validation->set_rules('nik_pembeli', 'nik pembeli', 'trim|required');
        $this->form_validation->set_rules('penjual', 'penjual', 'trim|required');
	//$this->form_validation->set_rules('ktp_penjual', 'ktp penjual', 'trim|required');
	$this->form_validation->set_rules('pembeli', 'pembeli', 'trim|required');
	//$this->form_validation->set_rules('ktp_pembeli', 'ktp pembeli', 'trim|required');
	$this->form_validation->set_rules('jenis_akta', 'jenis akta', 'trim|required');
	$this->form_validation->set_rules('nomor_akta', 'nomor akta', 'trim|required');
	$this->form_validation->set_rules('tanggal_akta', 'tanggal akta', 'trim|required');
	$this->form_validation->set_rules('letter_kohir', 'letter kohir', 'trim|required');
	$this->form_validation->set_rules('letter_nopersil', 'letter nopersil', 'trim|required');
	$this->form_validation->set_rules('letter_blok', 'letter blok', 'trim|required');
	$this->form_validation->set_rules('luas', 'luas', 'trim|required');
	$this->form_validation->set_rules('batas_utara', 'batas utara', 'trim|required');
	$this->form_validation->set_rules('batas_selatan', 'batas selatan', 'trim|required');
	$this->form_validation->set_rules('batas_timur', 'batas timur', 'trim|required');
	$this->form_validation->set_rules('batas_barat', 'batas barat', 'trim|required');
//	$this->form_validation->set_rules('nilai_transaksi', 'nilai transaksi', 'trim|required');
//	$this->form_validation->set_rules('status_berkas', 'status berkas', 'trim|required');
//	$this->form_validation->set_rules('sppt_pbb', 'sppt pbb', 'trim|required');
//	$this->form_validation->set_rules('resi', 'resi', 'trim|required');
//	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
//	$this->form_validation->set_rules('keterangan_tercatat', 'keterangan tercatat', 'trim|required');
//	$this->form_validation->set_rules('create_at', 'create at', 'trim|required');
//	$this->form_validation->set_rules('update', 'update', 'trim|required');
//	$this->form_validation->set_rules('delete', 'delete', 'trim|required');

	$this->form_validation->set_rules('id_ajb', 'id_ajb', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_ajb.xls";
        $judul = "tbl_ajb";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Akta");
	xlsWriteLabel($tablehead, $kolomhead++, "Penjual");
	xlsWriteLabel($tablehead, $kolomhead++, "Ktp Penjual");
	xlsWriteLabel($tablehead, $kolomhead++, "Pembeli");
	xlsWriteLabel($tablehead, $kolomhead++, "Ktp Pembeli");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Akta");
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Akta");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Akta");
	xlsWriteLabel($tablehead, $kolomhead++, "Letter Kohir");
	xlsWriteLabel($tablehead, $kolomhead++, "Letter Nopersil");
	xlsWriteLabel($tablehead, $kolomhead++, "Letter Blok");
	xlsWriteLabel($tablehead, $kolomhead++, "Luas");
	xlsWriteLabel($tablehead, $kolomhead++, "Batas Utara");
	xlsWriteLabel($tablehead, $kolomhead++, "Batas Selatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Batas Timur");
	xlsWriteLabel($tablehead, $kolomhead++, "Batas Barat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nilai Transaksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Berkas");
	xlsWriteLabel($tablehead, $kolomhead++, "Sppt Pbb");
	xlsWriteLabel($tablehead, $kolomhead++, "Resi");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan Tercatat");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");
	xlsWriteLabel($tablehead, $kolomhead++, "Update");
	xlsWriteLabel($tablehead, $kolomhead++, "Delete");

	foreach ($this->Model_ajb->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_akta);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penjual);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ktp_penjual);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pembeli);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ktp_pembeli);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jenis_akta);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_akta);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_akta);
	    xlsWriteLabel($tablebody, $kolombody++, $data->letter_kohir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->letter_nopersil);
	    xlsWriteLabel($tablebody, $kolombody++, $data->letter_blok);
	    xlsWriteLabel($tablebody, $kolombody++, $data->luas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->batas_utara);
	    xlsWriteLabel($tablebody, $kolombody++, $data->batas_selatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->batas_timur);
	    xlsWriteLabel($tablebody, $kolombody++, $data->batas_barat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nilai_transaksi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status_berkas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sppt_pbb);
	    xlsWriteLabel($tablebody, $kolombody++, $data->resi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan_tercatat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update);
	    xlsWriteLabel($tablebody, $kolombody++, $data->delete);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kelola_ajb.php */
/* Location: ./application/controllers/Kelola_ajb.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-31 04:37:50 */
/* http://harviacode.com */