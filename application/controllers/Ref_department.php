<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ref_department extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Ref_department_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/ref_department/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/ref_department/index/';
            $config['first_url'] = base_url() . 'index.php/ref_department/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Ref_department_model->total_rows($q);
        $ref_department = $this->Ref_department_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ref_department_data' => $ref_department,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','ref_department/ref_department_list', $data);
    }

    public function read($id) 
    {
      //  $row = $this->Ref_department_model->get_by_id($id);
         $this->db->select('*');
      $this->db->from('Ref_department');
      
      $this->db->join('tbl_user','id_department = ref_department.id_department');   
      
        if ($_SESSION['id_user_level'] == 2) {
        $this->db->where('ref_department.id_department', $_SESSION['id_skpd']);
        }
      
      $row = $this->db->get();
      return $row->num_rows();
      
      
     //   $this->datatables->join('ref_department', 'ref_department.id_department=tb_kak.Kode_skpd', 'left');

      
        
        
        if ($row) {
            $data = array(
		'id_department' => $row->id_department,
		'name' => $row->name,
		'leader' => $row->leader,
		'address' => $row->address,
		'email' => $row->email,
		'image' => $row->image,
		'website' => $row->website,
		'views' => $row->views,
		'status' => $row->status,
		'type' => $row->type,
		'created_id' => $row->created_id,
		'created_date' => $row->created_date,
		'update_id' => $row->update_id,
		'update_date' => $row->update_date,
	    );
            $this->template->load('template','ref_department/ref_department_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ref_department'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ref_department/create_action'),
	    'id_department' => set_value('id_department'),
	    'name' => set_value('name'),
	    'leader' => set_value('leader'),
	    'address' => set_value('address'),
              'jabatan' => set_value('jabatan'),
              'phone' => set_value('phone'),
             'nip_leader' => set_value('nip_leader'),
            
	    'email' => set_value('email'),
	    'image' => set_value('image'),
	    'website' => set_value('website'),
	    'views' => set_value('views'),
	    'status' => set_value('status'),
	    'type' => set_value('type'),
	    'created_id' => set_value('created_id'),
	    'created_date' => set_value('created_date'),
	    'update_id' => set_value('update_id'),
	    'update_date' => set_value('update_date'),
	);
        $this->template->load('template','ref_department/ref_department_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'leader' => $this->input->post('leader',TRUE),
		'address' => $this->input->post('address',TRUE),
                  'jabatan' => $this->input->post('jabatan',TRUE),
                  'phone' => $this->input->post('phone',TRUE),
                 'nip_leader' => $this->input->post('nip_leader',TRUE),
                
                
		'email' => $this->input->post('email',TRUE),
		'image' => $this->input->post('image',TRUE),
		'website' => $this->input->post('website',TRUE),
		'views' => $this->input->post('views',TRUE),
		'status' => $this->input->post('status',TRUE),
		'type' => $this->input->post('type',TRUE),
		'created_id' => $this->input->post('created_id',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'update_id' => $this->input->post('update_id',TRUE),
		'update_date' => $this->input->post('update_date',TRUE),
	    );

            $this->Ref_department_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('ref_department'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ref_department_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ref_department/update_action'),
		'id_department' => set_value('id_department', $row->id_department),
		'name' => set_value('name', $row->name),
		'leader' => set_value('leader', $row->leader),
		'jabatan' => set_value('jabatan', $row->jabatan),
                'nip_leader' => set_value('nip_leader', $row->nip_leader),
                'phone' => set_value('phone', $row->phone),
		'email' => set_value('email', $row->email),
		'image' => set_value('image', $row->image),
		'website' => set_value('website', $row->website),
		'views' => set_value('views', $row->views),
		'status' => set_value('status', $row->status),
		'type' => set_value('type', $row->type),
		'created_id' => set_value('created_id', $row->created_id),
		'created_date' => set_value('created_date', $row->created_date),
		'update_id' => set_value('update_id', $row->update_id),
		'update_date' => set_value('update_date', $row->update_date),
	    );
            $this->template->load('template','ref_department/ref_department_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ref_department'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_department', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'leader' => $this->input->post('leader',TRUE),
                'jabatan' => $this->input->post('jabatan',TRUE),
                  'phone' => $this->input->post('phone',TRUE),
		'address' => $this->input->post('address',TRUE),
		'email' => $this->input->post('email',TRUE),
		'image' => $this->input->post('image',TRUE),
		'website' => $this->input->post('website',TRUE),
		'views' => $this->input->post('views',TRUE),
		'status' => $this->input->post('status',TRUE),
		'type' => $this->input->post('type',TRUE),
		'created_id' => $this->input->post('created_id',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'update_id' => $this->input->post('update_id',TRUE),
		'update_date' => $this->input->post('update_date',TRUE),
	    );

            $this->Ref_department_model->update($this->input->post('id_department', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ref_department'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ref_department_model->get_by_id($id);

        if ($row) {
            $this->Ref_department_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ref_department'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ref_department'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('leader', 'leader', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('nip_leader', 'nip Kepala', 'trim|required');


	$this->form_validation->set_rules('id_department', 'id_department', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ref_department.xls";
        $judul = "ref_department";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Leader");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Website");
	xlsWriteLabel($tablehead, $kolomhead++, "Views");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Update Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Update Date");

	foreach ($this->Ref_department_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->leader);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->image);
	    xlsWriteLabel($tablebody, $kolombody++, $data->website);
	    xlsWriteNumber($tablebody, $kolombody++, $data->views);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);
	    xlsWriteNumber($tablebody, $kolombody++, $data->type);
	    xlsWriteNumber($tablebody, $kolombody++, $data->created_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
	    xlsWriteNumber($tablebody, $kolombody++, $data->update_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=ref_department.doc");

        $data = array(
            'ref_department_data' => $this->Ref_department_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('ref_department/ref_department_doc',$data);
    }

}

/* End of file Ref_department.php */
/* Location: ./application/controllers/Ref_department.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-28 03:23:50 */
/* http://harviacode.com */