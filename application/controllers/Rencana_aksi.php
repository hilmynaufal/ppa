<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rencana_aksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_Rencana_aksi');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
       // var_dump($_SESSION)or die();
        $this->template->load('template','rencana_aksi/rencana_aksi_list');
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
		'kak_id' => $row->kak_id,
		'tahun' => $row->tahun,
		'tujuan_pprg' => $row->tujuan_pprg,
		'biaya' => $row->biaya,
		'create' => $row->create,
		'update' => $row->update,
		'create_id' => $row->create_id,
		'update_id' => $row->update_id,
	    );
            $this->template->load('template','rencana_aksi/rencana_aksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rencana_aksi'));
        }
    }

    public function create() 
    {
//var_dump($_SESSION['id_kak']) or die();
         //$data['biaya'] = $this->Model_Rencana_aksi->get_by_id_addrow($id);
        $data = array(
 
            'button' => 'Create',
            'action' => site_url('rencana_aksi/create_action'),
	    'id' => set_value('id'),
	    'kak_id' => set_value($_SESSION['id_kak']),
	    'tahun' => set_value('tahun'),
	    'tujuan_pprg' => set_value('tujuan_pprg'),
	    'biaya' => set_value('biaya'),
	    'create' => set_value('create'),
	    'update' => set_value('update'),
	    'create_id' => set_value('create_id'),
	    'update_id' => set_value('update_id'),
	);
      //  var_dump($data)or die();
        $this->template->load('template','rencana_aksi/rencana_aksi_form_2', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
          
            
     foreach ($_POST['kak_id'] as $key => $val) {
         $result[] = array(             
            'kak_id' => $_POST['kak_id'][$key],
            'tahun' => $_POST['tahun'][$key],
             'skpd_id'=>$_POST['skpd_id'][$key],
            'tujuan_pprg' => $_POST['tujuan_pprg'][$key], 
            'biaya' => $_POST['biaya'][$key],
            'create_id' => $_SESSION['id_users'],
            'update_id' => $_SESSION['id_users'],
            'create' => date('Y-m-d H:i:s'),
            'update' => date('Y-m-d H:i:s')
         );      
      }   

      
      
                $this->db->insert_batch('rencana_aksi',$result);
           // $this->Model_Rencana_aksi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('rencana_aksi'));
        }
    }
    
    public function update($id) 
    {
       // $row = $this->Model_Rencana_aksi->get_by_id($id);
        $data['biaya'] = $this->Model_Rencana_aksi->get_by_id_addrow($id);
        $data['title']='Tambah Data Biaya';
      // var_dump($data)or die();

        if ($data) {
            $data['aksi'] = array(
                'button' => 'Update',
                'action' => site_url('rencana_aksi/update_action'),
	//	'id' => set_value('id', $id)
//		'kak_id' => set_value('kak_id', $row->kak_id),
//		'tahun' => set_value('tahun', $row->tahun),
//		'tujuan_pprg' => set_value('tujuan_pprg', $row->tujuan_pprg),
//		'biaya' => set_value('biaya', $row->biaya),
//		'create' => set_value('create', $row->create),
//		'update' => set_value('update', $row->update),
//		'create_id' => set_value('create_id', $row->create_id),
//		'update_id' => set_value('update_id', $row->update_id),
	    );
            $this->template->load('template','rencana_aksi/rencana_aksi_form',$data);
            
           //   $this->load->view('rencana_aksi/rencana_aksi_form',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rencana_aksi'));
        }
    }
    
    public function update_action() 
    {
//        $this->_rules();
//
//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('kak_id_', TRUE));
//        } else {
         $kak_id_=  $_POST['kak_id_'];
         $kode_skpd=$_SESSION['Kode_skpd'];
         
        // var_dump($kode_skpd)or die();
         $multiClause = array('kak_id' => $kak_id_, 'skpd_id' => $kode_skpd );
          $this->db->where($multiClause);
            $this->db->delete('rencana_aksi');
           
           foreach ($_POST['kak_id'] as $key => $val) {
         $result[] = array(             
            'kak_id' => $_POST['kak_id'][$key],
            'tahun' => $_POST['tahun'][$key],
             'skpd_id'=>$_POST['skpd_id'][$key],
            'tujuan_pprg' => $_POST['tujuan_pprg'][$key], 
            'biaya' => $_POST['biaya'][$key],
            'create_id' => $_SESSION['id_users'],
            'update_id' => $_SESSION['id_users'],
            'create' => date('Y-m-d H:i:s'),
            'update' => date('Y-m-d H:i:s')
         );      
      }   

      
      
                $this->db->insert_batch('rencana_aksi',$result);
      
      
           
          //  $this->db->insert_batch('rencana_aksi',$result);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rencana_aksi'));
     //   }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_Rencana_aksi->get_by_id($id);

        if ($row) {
            $this->Model_Rencana_aksi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rencana_aksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rencana_aksi'));
        }
    }

    public function _rules() 
    {
//	$this->form_validation->set_rules('kak_id', 'kak id', 'trim|required');
//	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
//	$this->form_validation->set_rules('tujuan_pprg', 'tujuan pprg', 'trim|required');
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
	    xlsWriteNumber($tablebody, $kolombody++, $data->kak_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tujuan_pprg);
	    xlsWriteLabel($tablebody, $kolombody++, $data->biaya);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Rencana_aksi.php */
/* Location: ./application/controllers/Rencana_aksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-24 16:55:28 */
/* http://harviacode.com */