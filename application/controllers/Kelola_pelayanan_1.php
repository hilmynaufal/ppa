<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelola_pelayanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_pelayanan');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','kelola_pelayanan/tbl_pelayanan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_pelayanan->json();
    }

    public function read($id) 
    {
        $row = $this->Model_pelayanan->get_by_id($id);
        
        
        
        if ($row) {
            
            
             $data['biaya_pprg'] = $this->Model_Rencana_aksi->get_by_id_addrow($id);
             $data['row'] = $this->Model_pprg->get_by_id($id);
            
            $data = array(
		'id_pelayanan' => $row->id_pelayanan,
		'skpd_id' => $row->skpd_id,
		'nama_pejabat' => $row->nama_pejabat,
		'keterangan' => $row->keterangan,
		'review' => $row->review,
		'status' => $row->status,
		'file' => $row->file,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
		'delete_at' => $row->delete_at,
	    );
            
            
            
            $this->template->load('template','kelola_pelayanan/tbl_pelayanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pelayanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelola_pelayanan/create_action'),
	    'id_pelayanan' => set_value('id_pelayanan'),
             'kode_layanan'=> set_value('kode_layanan'),
	    'skpd_id' => set_value('skpd_id'),
	    'nama_pejabat' => set_value('nama_pejabat'),
	    'keterangan' => set_value('keterangan'),
	    'review' => set_value('review'),
	    'status' => set_value('status'),
	    'file' => set_value('file'),
	    'create_at' => set_value('create_at'),
	    'update_at' => set_value('update_at'),
	    'delete_at' => set_value('delete_at'),
	);
        
       // var_dump($data)or die();
        $this->template->load('template','kelola_pelayanan/tbl_pelayanan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
            
            $new_name = time();
            $kode_layanan= $new_name.'-'.$_SESSION['id_skpd'];
            
           //upload
                $config['upload_path']          = './upload_pelayanan/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 100000;
		$config['max_width']            = 20480;
		$config['max_height']           = 10000;
		$config['encrypt_name'] 	= true;
		$this->load->library('upload',$config);
                $jumlah_berkas = count($_FILES['berkas']['name']);
                
                for($i = 0; $i < $jumlah_berkas;$i++)
		{
                  
            if(!empty($_FILES['berkas']['name'][$i])){
 
				$_FILES['file']['name'] = $_FILES['berkas']['name'][$i];
				$_FILES['file']['type'] = $_FILES['berkas']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['berkas']['error'][$i];
				$_FILES['file']['size'] = $_FILES['berkas']['size'][$i];
                                
                                

                                $new_name = time();
                                $config['file_name'] =$new_name;
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                
                      
                                $no=$i+1;
                                $path = $_FILES['file']['name'];
                                $ext = pathinfo($path, PATHINFO_EXTENSION);
                                $nama_image=$kode_layanan.'-'.$no.'.'.$ext;

                            
                if ($_FILES['file']['name']!='') {
                    
                      move_uploaded_file($_FILES['file']['tmp_name'],$config['upload_path'].$nama_image);
                  
                        $uploadData = $this->upload->data();
                        
                     
                        $data_img['kode_layanan'] = $kode_layanan;
                        $data_img['nama_file'] = $nama_image;
                        $data_img['create_at'] = date('Y-m-d H:i:s');
                        $data_img['update_at'] = date('Y-m-d H:i:s');
                        $data_img['user_id'] = $_SESSION['id_skpd'];
                        
				}
                                
                                  $this->db->insert('tbl_file_pelayanan',$data_img);
                          
			}
		}
                
             
                      $data = array(
                      
                        'skpd_id' => $_SESSION['id_skpd'],
                         'kode_layanan' => $kode_layanan,
                        'nama_pejabat' => $this->input->post('nama_pejabat',TRUE),
                        'keterangan' => $this->input->post('keterangan',TRUE),
                        'review' => $this->input->post('review',TRUE),
                        'status' => $this->input->post('status',TRUE),
                        'file' => $kode_layanan,
                        'create_at' => date('Y-m-d H:i:s'),
                        'update_at' => date('Y-m-d H:i:s'),
                        'delete_at' => null,
                        );
                      
                      
           
             $this->Model_pelayanan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kelola_pelayanan'));
                
                
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_pelayanan->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelola_pelayanan/update_action'),
		'id_pelayanan' => set_value('id_pelayanan', $row->id_pelayanan),
                'kode_layanan'=> set_value('kode_layanan',$row->kode_layanan),
		'skpd_id' => set_value('skpd_id', $row->skpd_id),
		'nama_pejabat' => set_value('nama_pejabat', $row->nama_pejabat),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'review' => set_value('review', $row->review),
		'status' => set_value('status', $row->status),
		'file' => set_value('file', $row->file),
		'create_at' => set_value('create_at', $row->create_at),
		'update_at' => set_value('update_at', $row->update_at),
		'delete_at' => set_value('delete_at', $row->delete_at),
	    );
            $this->template->load('template','kelola_pelayanan/tbl_pelayanan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pelayanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pelayanan', TRUE));
        } else 
//        {
//            $data = array(
//		'skpd_id' => $this->input->post('skpd_id',TRUE),
//		'nama_pejabat' => $this->input->post('nama_pejabat',TRUE),
//		'keterangan' => $this->input->post('keterangan',TRUE),
//		'review' => $this->input->post('review',TRUE),
//		'status' => $this->input->post('status',TRUE),
//		'file' => $this->input->post('file',TRUE),
//		'create_at' => $this->input->post('create_at',TRUE),
//		'update_at' => $this->input->post('update_at',TRUE),
//		'delete_at' => $this->input->post('delete_at',TRUE),
//	    );
//
//            $this->Model_pelayanan->update($this->input->post('id_pelayanan', TRUE), $data);
//            $this->session->set_flashdata('message', 'Update Record Success');
//            redirect(site_url('kelola_pelayanan'));
//            }
            {
            
           
         $kode_layanan=$_POST['kode_layanan'];
      
   // $data['data_file'] = $this->model_asset->hitungJumlahInventori();
    
   $data['data_file'] = $this->Model_pelayanan->hitungfile($kode_layanan);
       
         

            
           //upload
                $config['upload_path']          = './upload_pelayanan/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 100000;
		$config['max_width']            = 20480;
		$config['max_height']           = 10000;
		$config['encrypt_name'] 	= true;
		$this->load->library('upload',$config);
                $jumlah_berkas = count($_FILES['berkas']['name']);
                
                for($i = 0; $i < $jumlah_berkas;$i++)
		{
                  
            if(!empty($_FILES['berkas']['name'][$i])){
                
                
                 
				$_FILES['file']['name'] = $_FILES['berkas']['name'][$i];
				$_FILES['file']['type'] = $_FILES['berkas']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['berkas']['error'][$i];
				$_FILES['file']['size'] = $_FILES['berkas']['size'][$i];
                                
                                

                                $new_name = time();
                                $config['file_name'] =$new_name;
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                                      
                                $no=$i+ $data['data_file']+1;
                                $path = $_FILES['file']['name'];
                                $ext = pathinfo($path, PATHINFO_EXTENSION);
                                $nama_image=$kode_layanan.'-'.$no.'.'.$ext;
                                
                                
                                
                                
                if ($_FILES['file']['name']!='') {
                    
                      move_uploaded_file($_FILES['file']['tmp_name'],$config['upload_path'].$nama_image);
                  
                        $uploadData = $this->upload->data();
                        
                     
                        $data_img['kode_layanan'] = $kode_layanan;
                        $data_img['nama_file'] = $nama_image;
                        $data_img['create_at'] = date('Y-m-d H:i:s');
                        $data_img['update_at'] = date('Y-m-d H:i:s');
                        $data_img['user_id'] = $_SESSION['id_skpd'];
                        
				}
                                
                                  $this->db->insert('tbl_file_pelayanan',$data_img);
                          
			}
		}
                
             
                      $data = array(
                      
                        'skpd_id' => $_SESSION['id_skpd'],
                         'kode_layanan' => $kode_layanan,
                        'nama_pejabat' => $this->input->post('nama_pejabat',TRUE),
                        'keterangan' => $this->input->post('keterangan',TRUE),
                        'review' => $this->input->post('review',TRUE),
                        'status' => $this->input->post('status',TRUE),
                        'file' => $kode_layanan,
                        'create_at' => date('Y-m-d H:i:s'),
                        'update_at' => date('Y-m-d H:i:s'),
                        'delete_at' => null,
                        );
                      
                      
           
//             $this->Model_pelayanan->insert($data);
//            $this->session->set_flashdata('message', 'Create Record Success 2');
//            redirect(site_url('kelola_pelayanan'));
                      
            $this->Model_pelayanan->update($this->input->post('id_pelayanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelola_pelayanan'));
                
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_pelayanan->get_by_id($id);

        if ($row) {
            $this->Model_pelayanan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelola_pelayanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pelayanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Kode_skpd', 'skpd id', 'trim|required');
	$this->form_validation->set_rules('nama_pejabat', 'nama pejabat', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('review', 'review', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
//	$this->form_validation->set_rules('file', 'file', 'trim|required');
//	$this->form_validation->set_rules('create_at', 'create at', 'trim|required');
//	$this->form_validation->set_rules('update_at', 'update at', 'trim|required');
//	$this->form_validation->set_rules('delete_at', 'delete at', 'trim|required');

	$this->form_validation->set_rules('id_pelayanan', 'id_pelayanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_pelayanan.xls";
        $judul = "tbl_pelayanan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pejabat");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Review");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "File");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");
	xlsWriteLabel($tablehead, $kolomhead++, "Update At");
	xlsWriteLabel($tablehead, $kolomhead++, "Delete At");

	foreach ($this->Model_pelayanan->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->skpd_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pejabat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->review);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file);
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

/* End of file Kelola_pelayanan.php */
/* Location: ./application/controllers/Kelola_pelayanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-28 15:15:32 */
/* http://harviacode.com */