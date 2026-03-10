<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelola_pendampingan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_pendampingan');
        $this->load->model('Model_berita_acara');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','kelola_pendampingan/tbl_ppa_pendampingan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_pendampingan->json();
    }

    public function report($id)
    {
        $row = $this->Model_pendampingan->get_by_id($id);
        if ($row) {
            // Kita sudah punya $row yang berisi data tbl_ppa_pendampingan yang di-join dengan tbl_ppa_berita_acara
            // Dapatkan seluruh pendampingan untuk berita acara ini
            $this->db->where('kode_beritaacara', $row->kode_beritaacara);
            $this->db->order_by('layanan_tgl', 'ASC');
            $pendampingan_list = $this->db->get('tbl_ppa_pendampingan')->result();

            $data = array(
                'berita_acara_kode' => $row->kode_beritaacara,
                'korban_nama' => $row->korban_nama,
                'korban_usia' => $row->korban_usia,
                'korban_tempat' => $row->korban_tempat,
                'korban_tgl_lahir' => $row->korban_tgl_lahir,
                'korban_desa' => $this->get_region_name('reg_villages', $row->korban_desa),
                'korban_kec' => $this->get_region_name('reg_districts', $row->korban_kec),
                'korban_kab' => $this->get_region_name('reg_regencies', $row->korban_kab),
                'lapor_kategori' => $row->lapor_kategori,
                'pendampingan_list' => $pendampingan_list
            );
            $this->load->view('kelola_pendampingan/tbl_ppa_pendampingan_report', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pendampingan'));
        }
    }

    private function get_region_name($table, $id)
    {
        if (empty($id)) return '';
        $query = $this->db->get_where($table, array('id' => $id));
        $row = $query->row();
        return ($row) ? $row->name : '';
    }

    public function read($id) 
    {
        $row = $this->Model_pendampingan->get_by_id($id);
        if ($row) {
            $data = array(
		'layanan_id' => $row->layanan_id,
		'kode_beritaacara' => $row->kode_beritaacara,
		'layanan_tgl' => $row->layanan_tgl,
		'layanan_jenis' => $row->layanan_jenis,
		'layanan_keterangan' => $row->layanan_keterangan,
		'layanan_rtl' => $row->layanan_rtl,
		'layanan_progress' => $row->layanan_progress,
		'layanan_foto1' => $row->layanan_foto1,
		'layanan_foto2' => $row->layanan_foto2,
		'layanan_foto3' => $row->layanan_foto3,
		'tindak_lanjut1' => $row->tindak_lanjut1,
		'tindak_lanjut2' => $row->tindak_lanjut2,
		'tindak_lanjut3' => $row->tindak_lanjut3,
		'creat_at' => $row->creat_at,
		'update_at' => $row->update_at,
		'delete_at' => $row->delete_at,
		'id_users' => $row->id_users,
	    );
            $this->template->load('template','kelola_pendampingan/tbl_ppa_pendampingan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pendampingan'));
        }
    }

    public function create() 
    {
          $segment =$this->uri->segment(2);
         
       
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/kelola_pendampingan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/kelola_pendampingan/index/';
            $config['first_url'] = base_url() . 'index.php/kelola_pendampingan/index/';
        }
//
        $config['per_page'] = 1000000;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Model_berita_acara->total_rows($q);
        $kelola_pelapor = $this->Model_berita_acara->get_limit_data($config['per_page'], $start, $q);
        
       
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $this->data = array(
            
            'kelola_data_pelapor' => $kelola_pelapor,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'button' => 'simpan',
            'button_aktif' => '1',
            'segment' => $segment,
            'action' => site_url('kelola_pendampingan/create_action'),
	    'layanan_id' => set_value('layanan_id'),
	    'kode_beritaacara' => set_value('kode_beritaacara'),
	    'layanan_tgl' => set_value('layanan_tgl'),
	    'layanan_jenis' => set_value('layanan_jenis'),
	    'layanan_keterangan' => set_value('layanan_keterangan'),
	    'layanan_rtl' => set_value('layanan_rtl'),
	    'layanan_progress' => set_value('layanan_progress'),
	    'layanan_foto1' => set_value('layanan_foto1'),
	    'layanan_foto2' => set_value('layanan_foto2'),
	    'layanan_foto3' => set_value('layanan_foto3'),
	    'tindak_lanjut1' => set_value('tindak_lanjut1'),
	    'tindak_lanjut2' => set_value('tindak_lanjut2'),
	    'tindak_lanjut3' => set_value('tindak_lanjut3'),
//	    'creat_at' => date('Y-m-d H:i:s'),
//	    'update_at' => date('Y-m-d H:i:s'),
//	    'delete_at' => null,
	    'id_users' =>  $_SESSION['id_users'],
            
        
	);
        $this->template->load('template','kelola_pendampingan/tbl_ppa_pendampingan_form',$this->data);
    }
    
    public function create_action() 
    {
        
      // var_dump($button)or die();
        $str=$_POST['layanan_jenis'];
        $tes= implode(',',$str);
        $berita_acara=$_POST['kode_beritaacara'];
        
        
       
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
             $berita_acara=$_POST['kode_beritaacara'];
            
               $config['allowed_types'] = 'jpg,pdf';
            $config['encrypt_name'] = true;
            $new_name = time();
            $config['file_name'] =$new_name;
            $this->load->library('upload', $config);
            $this->upload->do_upload('layanan_foto1');
            $layanan_foto1 = $this->upload->data();
            
            
            $filename1 = $_FILES['layanan_foto1']['name'];
            $ext1 = pathinfo($filename1, PATHINFO_EXTENSION); 
            
     
            
            $this->upload->do_upload('layanan_foto2');
            $layanan_foto2= $this->upload->data();
            $filename2 = $_FILES['layanan_foto2']['name'];
            $ext2 = pathinfo($filename2, PATHINFO_EXTENSION); 
            
            
             $this->upload->do_upload('layanan_foto3');
            $layanan_foto3= $this->upload->data();
            $filename3 = $_FILES['layanan_foto3']['name'];
            $ext3 = pathinfo($filename3, PATHINFO_EXTENSION); 
            
            if (!empty($_FILES["layanan_foto1"]["name"])) {

                $temp = explode(".", $_FILES["layanan_foto1"]["name"]);
                $newfilename1 = $new_name . '-file1.'.$ext1;
                move_uploaded_file($_FILES["layanan_foto1"]["tmp_name"], "./upload_layanan/" . $newfilename1);
            } else {
                $newfilename1 = $_POST['layanan_foto11'];
            }
          
            
           

            if (!empty($_FILES["layanan_foto2"]["name"])) {
                
                $temp = explode(".", $_FILES["layanan_foto2"]["name"]);
                $newfilename2 = $new_name . '-file2.'.$ext2;
                move_uploaded_file($_FILES["layanan_foto2"]["tmp_name"], "./upload_layanan/" . $newfilename2);
           } else {
                $newfilename2 = $_POST['layanan_foto22'];
            }
            
            
            if (!empty($_FILES["layanan_foto3"]["name"])) {
                
                $temp = explode(".", $_FILES["layanan_foto3"]["name"]);
                $newfilename3 = $new_name . '-file3.'.$ext3;
                move_uploaded_file($_FILES["layanan_foto3"]["tmp_name"], "./upload_layanan/" . $newfilename3);
           } else {
                $newfilename3 = $_POST['layanan_foto33'];
            }
            
            
            
            $data = array(
		'kode_beritaacara' => $this->input->post('kode_beritaacara',TRUE),
		'layanan_tgl' => $this->input->post('layanan_tgl',TRUE),
		'layanan_jenis' => $tes,
                
                
		'layanan_keterangan' => $this->input->post('layanan_keterangan',TRUE),
		'layanan_rtl' => $this->input->post('layanan_rtl',TRUE),
		'layanan_progress' => $this->input->post('layanan_progress',TRUE),
		'layanan_foto1' =>$newfilename1,
		'layanan_foto2' => $newfilename2,
		'layanan_foto3' => $newfilename3,
		'tindak_lanjut1' => $this->input->post('tindak_lanjut1',TRUE),
//		'tindak_lanjut2' => $this->input->post('tindak_lanjut2',TRUE),
//		'tindak_lanjut3' => $this->input->post('tindak_lanjut3',TRUE),
		'creat_at' =>  date('Y-m-d H:i:s'),
		'update_at' => date('Y-m-d H:i:s'),
//		'delete_at' => $this->input->post('delete_at',TRUE),
		'id_users' =>  $_SESSION['id_users'],
                
                
                

	    );
    $this->db->set('layanan_id','UUID()',FALSE);
    

            $this->Model_pendampingan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kelola_pendampingan'));
        }
    }
    
    public function update($id) 
    {
         $segment =$this->uri->segment(2);

        $row = $this->Model_pendampingan->get_by_id($id);

        if ($row) {
            
           
            
            $data = array(
                'button' => 'Update',
                'button_aktif' => '2',
                'action' => site_url('kelola_pendampingan/update_action'),
		'layanan_id' => set_value('layanan_id', $row->layanan_id),
		'kode_beritaacara' => set_value('kode_beritaacara', $row->kode_beritaacara),
		'layanan_tgl' => set_value('layanan_tgl', $row->layanan_tgl),
		'layanan_jenis' => set_value('layanan_jenis', $row->layanan_jenis),
                
                
                'segment' => $segment,
		'layanan_keterangan' => set_value('layanan_keterangan', $row->layanan_keterangan),
		'layanan_rtl' => set_value('layanan_rtl', $row->layanan_rtl),
		'layanan_progress' => set_value('layanan_progress', $row->layanan_progress),
		'layanan_foto1' => set_value('layanan_foto1', $row->layanan_foto1),
		'layanan_foto2' => set_value('layanan_foto2', $row->layanan_foto2),
		'layanan_foto3' => set_value('layanan_foto3', $row->layanan_foto3),
		'tindak_lanjut1' => set_value('tindak_lanjut1', $row->tindak_lanjut1),
		'tindak_lanjut2' => set_value('tindak_lanjut2', $row->tindak_lanjut2),
		'tindak_lanjut3' => set_value('tindak_lanjut3', $row->tindak_lanjut3),
		'creat_at' => set_value('creat_at', $row->creat_at),
		'update_at' => set_value('update_at', $row->update_at),
		'delete_at' => set_value('delete_at', $row->delete_at),
		'id_users' => set_value('id_users', $row->id_users),
	    );
            
         
            $this->template->load('template','kelola_pendampingan/tbl_ppa_pendampingan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pendampingan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('layanan_id', TRUE));
        } else {
            
            
             $berita_acara=$_POST['kode_beritaacara'];
            
               $config['allowed_types'] = 'jpg,pdf';
            $config['encrypt_name'] = true;
            $new_name = time();
            $config['file_name'] =$new_name;
            $this->load->library('upload', $config);
            
            $this->upload->do_upload('layanan_foto1');
            $layanan_foto1 = $this->upload->data();
            $filename1 = $_FILES['layanan_foto1']['name'];
            $ext1 = pathinfo($filename1, PATHINFO_EXTENSION); 
           
            
         
            
//            $this->upload->do_upload('layanan_foto1');
//            $layanan_foto1 = $this->upload->data();
     
            
            $this->upload->do_upload('layanan_foto2');
            $layanan_foto2= $this->upload->data();
             $filename2 = $_FILES['layanan_foto2']['name'];
            $ext2 = pathinfo($filename2, PATHINFO_EXTENSION); 
            
            
             $this->upload->do_upload('layanan_foto3');
            $layanan_foto3= $this->upload->data();
             $filename3 = $_FILES['layanan_foto3']['name'];
            $ext3 = pathinfo($filename3, PATHINFO_EXTENSION); 
            
            if (!empty($_FILES["layanan_foto1"]["name"])) {

                $temp = explode(".", $_FILES["layanan_foto1"]["name"]);
                $newfilename1 = $new_name . '-file1.'.$ext1;
                move_uploaded_file($_FILES["layanan_foto1"]["tmp_name"], "./upload_layanan/" . $newfilename1);
            } else {
                $newfilename1 = $_POST['layanan_foto11'];
            }
          
            
           

            if (!empty($_FILES["layanan_foto2"]["name"])) {
                
                $temp = explode(".", $_FILES["layanan_foto2"]["name"]);
                $newfilename2 = $new_name . '-file2.'.$ext2;
                move_uploaded_file($_FILES["layanan_foto2"]["tmp_name"], "./upload_layanan/" . $newfilename2);
           } else {
                $newfilename2 = $_POST['layanan_foto22'];
            }
            
            
            if (!empty($_FILES["layanan_foto3"]["name"])) {
                
                $temp = explode(".", $_FILES["layanan_foto3"]["name"]);
                $newfilename3 = $new_name . '-file3.'.$ext3;
                move_uploaded_file($_FILES["layanan_foto3"]["tmp_name"], "./upload_layanan/" . $newfilename3);
           } else {
                $newfilename3 = $_POST['layanan_foto33'];
            }
            
            $data = array(
		'kode_beritaacara' => $this->input->post('kode_beritaacara',TRUE),
		'layanan_tgl' => $this->input->post('layanan_tgl',TRUE),
		'layanan_jenis' => $this->input->post('layanan_jenis',TRUE),
		'layanan_keterangan' => $this->input->post('layanan_keterangan',TRUE),
		'layanan_rtl' => $this->input->post('layanan_rtl',TRUE),
		'layanan_progress' => $this->input->post('layanan_progress',TRUE),
		'layanan_foto1' =>$newfilename1,
		'layanan_foto2' => $newfilename2,
		'layanan_foto3' => $newfilename3,
		'tindak_lanjut1' => $this->input->post('tindak_lanjut1',TRUE),
		'tindak_lanjut2' => $this->input->post('tindak_lanjut2',TRUE),
		'tindak_lanjut3' => $this->input->post('tindak_lanjut3',TRUE),
//		'creat_at' => $this->input->post('creat_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
//		'delete_at' => $this->input->post('delete_at',TRUE),
		'id_users' =>  $_SESSION['id_users'],
	    );

            $this->Model_pendampingan->update($this->input->post('layanan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelola_pendampingan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_pendampingan->get_by_id($id);

        if ($row) {
            $this->Model_pendampingan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelola_pendampingan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pendampingan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_beritaacara', 'kode beritaacara', 'trim|required');
	$this->form_validation->set_rules('layanan_tgl', 'layanan tgl', 'trim|required');
	$this->form_validation->set_rules('layanan_jenis[]', 'layanan jenis', 'trim|required');
//	$this->form_validation->set_rules('layanan_keterangan', 'layanan keterangan', 'trim|required');
//	$this->form_validation->set_rules('layanan_rtl', 'layanan rtl', 'trim|required');
	$this->form_validation->set_rules('layanan_progress', 'layanan progress', 'trim|required');
//	$this->form_validation->set_rules('layanan_foto1', 'layanan foto1', 'trim|required');
//	$this->form_validation->set_rules('layanan_foto2', 'layanan foto2', 'trim|required');
//	$this->form_validation->set_rules('layanan_foto3', 'layanan foto3', 'trim|required');
	$this->form_validation->set_rules('tindak_lanjut1', 'tindak lanjut1', 'trim|required');
//	$this->form_validation->set_rules('tindak_lanjut2', 'tindak lanjut2', 'trim|required');
//	$this->form_validation->set_rules('tindak_lanjut3', 'tindak lanjut3', 'trim|required');
//	$this->form_validation->set_rules('creat_at', 'creat at', 'trim|required');
//	$this->form_validation->set_rules('update_at', 'update at', 'trim|required');
//	$this->form_validation->set_rules('delete_at', 'delete at', 'trim|required');
//	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');

	$this->form_validation->set_rules('layanan_id', 'layanan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_ppa_pendampingan.xls";
        $judul = "tbl_ppa_pendampingan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Beritaacara");
	xlsWriteLabel($tablehead, $kolomhead++, "Layanan Tgl");
	xlsWriteLabel($tablehead, $kolomhead++, "Layanan Jenis");
	xlsWriteLabel($tablehead, $kolomhead++, "Layanan Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Layanan Rtl");
	xlsWriteLabel($tablehead, $kolomhead++, "Layanan Progress");
	xlsWriteLabel($tablehead, $kolomhead++, "Layanan Foto1");
	xlsWriteLabel($tablehead, $kolomhead++, "Layanan Foto2");
	xlsWriteLabel($tablehead, $kolomhead++, "Layanan Foto3");
	xlsWriteLabel($tablehead, $kolomhead++, "Tindak Lanjut1");
	xlsWriteLabel($tablehead, $kolomhead++, "Tindak Lanjut2");
	xlsWriteLabel($tablehead, $kolomhead++, "Tindak Lanjut3");
	xlsWriteLabel($tablehead, $kolomhead++, "Creat At");
	xlsWriteLabel($tablehead, $kolomhead++, "Update At");
	xlsWriteLabel($tablehead, $kolomhead++, "Delete At");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users");

	foreach ($this->Model_pendampingan->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_beritaacara);
	    xlsWriteLabel($tablebody, $kolombody++, $data->layanan_tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->layanan_jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->layanan_keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->layanan_rtl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->layanan_progress);
	    xlsWriteLabel($tablebody, $kolombody++, $data->layanan_foto1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->layanan_foto2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->layanan_foto3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tindak_lanjut1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tindak_lanjut2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tindak_lanjut3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->creat_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->delete_at);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kelola_pendampingan.php */
/* Location: ./application/controllers/Kelola_pendampingan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-07 03:23:55 */
/* http://harviacode.com */