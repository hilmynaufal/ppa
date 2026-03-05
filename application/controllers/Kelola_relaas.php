<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelola_relaas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_relaas');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','kelola_relaas/tbl_relaas_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_relaas->json();
    }

    public function read($id) 
    {
        $row = $this->Model_relaas->get_by_id($id);
        if ($row) {
            $data = array(
                'nama_pengadilan' => $row->nama_pengadilan,
		'id_relaas' => $row->id_relaas,
		'nama_pihak' => $row->nama_pihak,
		'jenis_pihak' => $row->jenis_pihak,
		'pengadilan' => $row->pengadilan,
		'no_perkara' => $row->no_perkara,
		'keterangan' => $row->keterangan,
		'tanggal_hadir_sidang' => $row->tanggal_hadir_sidang,
		'tgl_pengumuman' => $row->tgl_pengumuman,
		'tgl_pemberitahuan_putusan' => $row->tgl_pemberitahuan_putusan,
		'berkas' => $row->berkas,
		'status_persidangan' => $row->status_persidangan,
		'user_id' => $row->user_id,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
		'delete_at' => $row->delete_at,
	    );
             $this->session->set_flashdata('message', 'Sukses');
            $this->template->load('template','kelola_relaas/tbl_relaas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_relaas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelola_relaas/create_action'),
	    'id_relaas' => set_value('id_relaas'),
	    'nama_pihak' => set_value('nama_pihak'),
	    'jenis_pihak' => set_value('jenis_pihak'),
	    'pengadilan' => set_value('pengadilan'),
	    'no_perkara' => set_value('no_perkara'),
	    'keterangan' => set_value('keterangan'),
	    'tanggal_hadir_sidang' => set_value('tanggal_hadir_sidang'),
	    'tgl_pengumuman' => set_value('tgl_pengumuman'),
	    'tgl_pemberitahuan_putusan' => set_value('tgl_pemberitahuan_putusan'),
	    'berkas' => set_value('berkas'),
	    'status_persidangan' => set_value('status_persidangan'),
	    'user_id' => set_value('user_id'),
	    'create_at' => set_value('create_at'),
	    'update_at' => set_value('update_at'),
	    'delete_at' => set_value('delete_at'),
	);
        $this->template->load('template','kelola_relaas/tbl_relaas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
//            $data = array(
//		'nama_pihak' => $this->input->post('nama_pihak',TRUE),
//		'jenis_pihak' => $this->input->post('jenis_pihak',TRUE),
//		'pengadilan' => $this->input->post('pengadilan',TRUE),
//		'no_perkara' => $this->input->post('no_perkara',TRUE),
//		'keterangan' => $this->input->post('keterangan',TRUE),
//		'tanggal_hadir_sidang' => $this->input->post('tanggal_hadir_sidang',TRUE),
//		'tgl_pengumuman' => $this->input->post('tgl_pengumuman',TRUE),
//		'tgl_pemberitahuan_putusan' => $this->input->post('tgl_pemberitahuan_putusan',TRUE),
//		'berkas' => $this->input->post('berkas',TRUE),
//		'status_persidangan' => $this->input->post('status_persidangan',TRUE),
//		'user_id' => $this->input->post('user_id',TRUE),
//		'create_at' => $this->input->post('create_at',TRUE),
//		'update_at' => $this->input->post('update_at',TRUE),
//		'delete_at' => $this->input->post('delete_at',TRUE),
//	    );
//
//            $this->Model_relaas->insert($data);
//            $this->session->set_flashdata('message', 'Create Record Success 2');
//            redirect(site_url('kelola_relaas'));
            
            
            
            
            
    
                //upload
            $config['upload_path']          = './upload_relaas/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 100000;
		$config['max_width']            = 20480;
		$config['max_height']           = 10000;
		$config['encrypt_name'] 		= true;
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

                            
                            
                if ($this->upload->do_upload('file')) {
                        $data['error'] = $this->upload->display_errors();
                        $uploadData = $this->upload->data();
                        $data['files'] = $uploadData['file_name'];

                        $data = array(
                           'nama_pihak' => $this->input->post('nama_pihak',TRUE),
                            'jenis_pihak' => $this->input->post('jenis_pihak',TRUE),
                            'pengadilan' => $this->input->post('pengadilan',TRUE),
                            'no_perkara' => $this->input->post('no_perkara',TRUE),
                            'keterangan' => $this->input->post('keterangan',TRUE),
                            'tanggal_hadir_sidang' => $this->input->post('tanggal_hadir_sidang',TRUE),
                            'tgl_pengumuman' => $this->input->post('tgl_pengumuman',TRUE),
                            'tgl_pemberitahuan_putusan' => $this->input->post('tgl_pemberitahuan_putusan',TRUE),
                            'berkas' => $this->input->post('berkas',TRUE),
                            'status_persidangan' => $this->input->post('status_persidangan',TRUE),
                            'berkas' => $data['files'],
                            'user_id' => $_SESSION['id_users'],
                            'create_at' => date('Y-m-d H:i:s'),
                            'update_at' => date('Y-m-d H:i:s'),
                            'delete_at' => null,
                        );
                        $this->Model_relaas->insert($data);
				}
			}
		}

          
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kelola_relaas'));
        
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_relaas->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelola_relaas/update_action'),
		'id_relaas' => set_value('id_relaas', $row->id_relaas),
		'nama_pihak' => set_value('nama_pihak', $row->nama_pihak),
		'jenis_pihak' => set_value('jenis_pihak', $row->jenis_pihak),
		'pengadilan' => set_value('pengadilan', $row->pengadilan),
		'no_perkara' => set_value('no_perkara', $row->no_perkara),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'tanggal_hadir_sidang' => set_value('tanggal_hadir_sidang', $row->tanggal_hadir_sidang),
		'tgl_pengumuman' => set_value('tgl_pengumuman', $row->tgl_pengumuman),
		'tgl_pemberitahuan_putusan' => set_value('tgl_pemberitahuan_putusan', $row->tgl_pemberitahuan_putusan),
		'berkas' => set_value('berkas', $row->berkas),
		'status_persidangan' => set_value('status_persidangan', $row->status_persidangan),
	      'berkas_update' => set_value('berkas_update', $row->berkas),
	    );
            $this->template->load('template','kelola_relaas/tbl_relaas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_relaas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_relaas', TRUE));
       } else {
//            $data = array(
//		'nama_pihak' => $this->input->post('nama_pihak',TRUE),
//		'jenis_pihak' => $this->input->post('jenis_pihak',TRUE),
//		'pengadilan' => $this->input->post('pengadilan',TRUE),
//		'no_perkara' => $this->input->post('no_perkara',TRUE),
//		'keterangan' => $this->input->post('keterangan',TRUE),
//		'tanggal_hadir_sidang' => $this->input->post('tanggal_hadir_sidang',TRUE),
//		'tgl_pengumuman' => $this->input->post('tgl_pengumuman',TRUE),
//		'tgl_pemberitahuan_putusan' => $this->input->post('tgl_pemberitahuan_putusan',TRUE),
//		'berkas' => $this->input->post('berkas',TRUE),
//		'status_persidangan' => $this->input->post('status_persidangan',TRUE),
//		'user_id' => $this->input->post('user_id',TRUE),
//		'create_at' => $this->input->post('create_at',TRUE),
//		'update_at' => $this->input->post('update_at',TRUE),
//		'delete_at' => $this->input->post('delete_at',TRUE),
//	    );
//
//            $this->Model_relaas->update($this->input->post('id_relaas', TRUE), $data);
//            $this->session->set_flashdata('message', 'Update Record Success');
//            redirect(site_url('kelola_relaas'));
            
            
             //upload
            $config['upload_path']          = './upload_relaas/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 100000;
		$config['max_width']            = 20480;
		$config['max_height']           = 10000;
		$config['encrypt_name'] 		= true;
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

                                
                           //    if(file_exists('./upload_relaas/'.$_POST["berkas_update"])) unlink('./upload_relaas/'.$_POST["berkas_update"]);     
                          //  move_uploaded_file($fileTmpLoc,'./upload_relaas/'.$_POST["berkas_update"]);
                        
                if ($this->upload->do_upload('file')) {
                        $data['error'] = $this->upload->display_errors();
                        $uploadData = $this->upload->data();
                        $data['files'] = $uploadData['file_name'];

                        $data = array(
                         'nama_pihak' => $this->input->post('nama_pihak',TRUE),
                        'jenis_pihak' => $this->input->post('jenis_pihak',TRUE),
                        'pengadilan' => $this->input->post('pengadilan',TRUE),
                        'no_perkara' => $this->input->post('no_perkara',TRUE),
                        'keterangan' => $this->input->post('keterangan',TRUE),
                        'tanggal_hadir_sidang' => $this->input->post('tanggal_hadir_sidang',TRUE),
                        'tgl_pengumuman' => $this->input->post('tgl_pengumuman',TRUE),
                        'tgl_pemberitahuan_putusan' => $this->input->post('tgl_pemberitahuan_putusan',TRUE),
                        'berkas' => $this->input->post('berkas',TRUE),
                        'status_persidangan' => $this->input->post('status_persidangan',TRUE),
                            'berkas' => $data['files'],
                            'user_id' => $_SESSION['id_users'],
                            'create_at' => date('Y-m-d H:i:s'),
                            'update_at' => date('Y-m-d H:i:s'),
                            'delete_at' => null,
                        );
                        
                        
                    $image=$_POST['berkas_update'];
                     unlink("./upload_relaas/" . $image);
                        
                        $this->Model_relaas->update($this->input->post('id_relaas', TRUE), $data);
                        $this->session->set_flashdata('message', 'Update Record Success');
                        redirect(site_url('kelola_relaas'));
                    }
                } else {
                    
                   
                    
                    //var_dump($_POST) or die();

                    $data = array(
                       'nama_pihak' => $this->input->post('nama_pihak',TRUE),
                        'jenis_pihak' => $this->input->post('jenis_pihak',TRUE),
                        'pengadilan' => $this->input->post('pengadilan',TRUE),
                        'no_perkara' => $this->input->post('no_perkara',TRUE),
                        'keterangan' => $this->input->post('keterangan',TRUE),
                        'tanggal_hadir_sidang' => $this->input->post('tanggal_hadir_sidang',TRUE),
                        'tgl_pengumuman' => $this->input->post('tgl_pengumuman',TRUE),
                        'tgl_pemberitahuan_putusan' => $this->input->post('tgl_pemberitahuan_putusan',TRUE),
                        'status_persidangan' => $this->input->post('status_persidangan',TRUE),
                        'berkas' => $this->input->post('berkas_update', TRUE),
                        'user_id' => $_SESSION['id_users'],
                        'create_at' => date('Y-m-d H:i:s'),
                        'update_at' => date('Y-m-d H:i:s'),
                        'delete_at' => null,
                    );

                    $this->Model_relaas->update($this->input->post('id_relaas', TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('kelola_relaas'));

                            
                        }
		}

          
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kelola_relaas'));
            
            
            
        
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_relaas->get_by_id($id);

        if ($row) {
            $this->Model_relaas->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelola_relaas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_relaas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_pihak', 'nama pihak', 'trim|required');
	$this->form_validation->set_rules('jenis_pihak', 'jenis pihak', 'trim|required');
	$this->form_validation->set_rules('pengadilan', 'pengadilan', 'trim|required');
	$this->form_validation->set_rules('no_perkara', 'no perkara', 'trim|required');
//	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
//	$this->form_validation->set_rules('tanggal_hadir_sidang', 'tanggal hadir sidang', 'trim|required');
//	$this->form_validation->set_rules('tgl_pengumuman', 'tgl pengumuman', 'trim|required');
//	$this->form_validation->set_rules('tgl_pemberitahuan_putusan', 'tgl pemberitahuan putusan', 'trim|required');
//	$this->form_validation->set_rules('berkas', 'berkas', 'trim|required');
//	$this->form_validation->set_rules('status_persidangan', 'status persidangan', 'trim|required');


	$this->form_validation->set_rules('id_relaas', 'id_relaas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_relaas.xls";
        $judul = "tbl_relaas";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pihak");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Pihak");
	xlsWriteLabel($tablehead, $kolomhead++, "Pengadilan");
	xlsWriteLabel($tablehead, $kolomhead++, "No Perkara");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Hadir Sidang");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Pengumuman");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Pemberitahuan Putusan");
	xlsWriteLabel($tablehead, $kolomhead++, "Berkas");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Persidangan");
	xlsWriteLabel($tablehead, $kolomhead++, "User Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");
	xlsWriteLabel($tablehead, $kolomhead++, "Update At");
	xlsWriteLabel($tablehead, $kolomhead++, "Delete At");

	foreach ($this->Model_relaas->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pihak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_pihak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pengadilan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_perkara);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_hadir_sidang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_pengumuman);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_pemberitahuan_putusan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->berkas);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status_persidangan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->user_id);
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

/* End of file Kelola_relaas.php */
/* Location: ./application/controllers/Kelola_relaas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-10-18 04:48:15 */
/* http://harviacode.com */