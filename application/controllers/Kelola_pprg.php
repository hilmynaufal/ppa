<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelola_pprg extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Model_Rencana_aksi');
        $this->load->model('Model_pprg');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','kelola_pprg/tb_kak_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_pprg->json();
    }

    public function read($id) 
    {
        
        $row = $this->Model_pprg->get_by_id($id);
      
       // $data['biaya'] = $this->Model_Rencana_aksi->get_by_id_addrow($id);
       // var_dump( $data['biaya'])or die();
       if ($row) {
            
           $data['biaya_pprg'] = $this->Model_Rencana_aksi->get_by_id_addrow($id);
            $data['row'] = $this->Model_pprg->get_by_id($id);
            $total=0;
            $data['total']=$total;
  
            $this->template->load('template','kelola_pprg/tb_kak_read', $data);
            
            
          //   $this->template->load('template','rencana_aksi/rencana_aksi_form',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pprg'));
        }
    }
    
    public function read_gap($id) 
    {
        $row = $this->Model_pprg->get_by_id($id);
       
        if ($row) {
            $data = array(
                
                
		'Id_kak' => $row->Id_kak,
                'name' => $row->name,
                
                'leader'=> $row->leader,
                'nip_leader'=> $row->nip_leader,
                'pangkat'=> $row->pangkat,
                'jabatan'=> $row->jabatan,

		'Kode_skpd' => $row->Kode_skpd,
		'Wawasan' => $row->Wawasan,
		'Faktor_Kesenjangan_akses' => $row->Faktor_Kesenjangan_akses,
                'Isu_Gender' => $row->Isu_Gender,
                'Faktor_Kesenjangan_partisipasi' => $row->Faktor_Kesenjangan_partisipasi,
                'Faktor_kesenjangan_kontrol' => $row->Faktor_kesenjangan_kontrol,
                'Faktor_kesenjangan_manfaat' => $row->Faktor_kesenjangan_manfaat,
                'Sebab_Kesenjagan_Internal' => $row->Sebab_Kesenjagan_Internal,
		'Sebab_Kesenjagan_Eksternal' => $row->Sebab_Kesenjagan_Eksternal,
		'Reformasi_Tujuan' => $row->Reformasi_Tujuan,
		'Rencana_Aksi' => $row->Rencana_Aksi,
		'Data_Dasar' => $row->Data_Dasar,
		'Indikator_Gender' => $row->Indikator_Gender,
		'Tahun_Anggaran' => $row->Tahun_Anggaran,
		'Kode_Program' => $row->Kode_Program,
		'Sasaran_Program' => $row->Sasaran_Program,
		'Program' => strtolower($row->Program),
		'Kegiatan' => $row->Kegiatan,
		'Sub_Kegiatan' => $row->Sub_Kegiatan,
		'Uraian_Kegiatan' => $row->Uraian_Kegiatan,
		'Tujuan' => $row->Tujuan,
		'Maksud' => $row->Maksud,
		'Dasar_Hukum' => $row->Dasar_Hukum,
		'Gambaran_Umum' => $row->Gambaran_Umum,
		'Cara_Pelaksanan' => $row->Cara_Pelaksanan,
		'Tempat_Pelaksaan' => $row->Tempat_Pelaksaan,
		'Pelaksana_Penaggungjawab' => $row->Pelaksana_Penaggungjawab,
		'Analisis_Situasi' => $row->Analisis_Situasi,
		'Jadwal' => $row->Jadwal,
		'Biaya' => $row->Biaya,
		'Indikator_Kinerja' => $row->Indikator_Kinerja,
		'Batasan_Kegiatan' => $row->Batasan_Kegiatan,
		'Hasil' => $row->Hasil,
		'Belanja1_Tujuan' => $row->Belanja1_Tujuan,
		'Belanja1_Alokasianggaran' => $row->Belanja1_Alokasianggaran,
		'Belanja2_Tujuan' => $row->Belanja2_Tujuan,
		'Belanja2_Alokasianggaran' => $row->Belanja2_Alokasianggaran,
		'Capaian_Program' => $row->Capaian_Program,
		'Total_Anggaran' => $row->Total_Anggaran,
		'update_at' => $row->update_at,
		'create_at' => $row->create_at,
		'delete_at' => $row->delete_at,
		'user_id' => $row->user_id,
	    );
            $this->template->load('template','kelola_pprg/read_gap', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pprg'));
        }
    }
    
    
    public function read_tor($id) 
    {
        $row = $this->Model_pprg->get_by_id($id);
        if ($row) {
            $data = array(
		'Id_kak' => $row->Id_kak,
                'name' => $row->name,
		'Kode_skpd' => $row->Kode_skpd,
		'Wawasan' => $row->Wawasan,
		'Faktor_Kesenjangan_akses' => $row->Faktor_Kesenjangan_akses,
		'Sebab_Kesenjagan_Internal' => $row->Sebab_Kesenjagan_Internal,
		'Sebab_Kesenjagan_Eksternal' => $row->Sebab_Kesenjagan_Eksternal,
		'Reformasi_Tujuan' => $row->Reformasi_Tujuan,
		'Rencana_Aksi' => $row->Rencana_Aksi,
		'Data_Dasar' => $row->Data_Dasar,
		'Indikator_Gender' => $row->Indikator_Gender,
		'Tahun_Anggaran' => $row->Tahun_Anggaran,
		'Kode_Program' => $row->Kode_Program,
		'Sasaran_Program' => $row->Sasaran_Program,
		'Program' => strtolower($row->Program),
		'Kegiatan' => $row->Kegiatan,
		'Sub_Kegiatan' => $row->Sub_Kegiatan,
		'Uraian_Kegiatan' => $row->Uraian_Kegiatan,
		'Tujuan' => $row->Tujuan,
		'Maksud' => $row->Maksud,
		'Dasar_Hukum' => $row->Dasar_Hukum,
		'Gambaran_Umum' => $row->Gambaran_Umum,
		'Cara_Pelaksanan' => $row->Cara_Pelaksanan,
		'Tempat_Pelaksaan' => $row->Tempat_Pelaksaan,
		'Pelaksana_Penaggungjawab' => $row->Pelaksana_Penaggungjawab,
		'Analisis_Situasi' => $row->Analisis_Situasi,
		'Jadwal' => $row->Jadwal,
		'Biaya' => $row->Biaya,
		'Indikator_Kinerja' => $row->Indikator_Kinerja,
		'Batasan_Kegiatan' => $row->Batasan_Kegiatan,
		'Hasil' => $row->Hasil,
		'Belanja1_Tujuan' => $row->Belanja1_Tujuan,
		'Belanja1_Alokasianggaran' => $row->Belanja1_Alokasianggaran,
		'Belanja2_Tujuan' => $row->Belanja2_Tujuan,
		'Belanja2_Alokasianggaran' => $row->Belanja2_Alokasianggaran,
		'Capaian_Program' => $row->Capaian_Program,
		'Total_Anggaran' => $row->Total_Anggaran,
		'update_at' => $row->update_at,
		'create_at' => $row->create_at,
		'delete_at' => $row->delete_at,
		'user_id' => $row->user_id,
	    );
            $this->template->load('template','kelola_pprg/read_tor', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pprg'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelola_pprg/create_action'),
	    'Id_kak' => set_value('Id_kak'),
	    'Kode_skpd' => set_value('Kode_skpd'),
	    'Wawasan' => set_value('Wawasan'),
           
            'Isu_Gender' => set_value('Isu_Gender'),
            'Faktor_Kesenjangan_partisipasi' =>set_value('Faktor_Kesenjangan_partisipasi'),
            'Faktor_kesenjangan_kontrol' => set_value('Faktor_kesenjangan_kontrol'),
            'Faktor_Kesenjangan_akses' => set_value('Faktor_Kesenjangan_akses'),
            'Faktor_kesenjangan_manfaat' => set_value('Faktor_kesenjangan_manfaat'),  
            
	    'Sebab_Kesenjagan_Internal' => set_value('Sebab_Kesenjagan_Internal'),
	    'Sebab_Kesenjagan_Eksternal' => set_value('Sebab_Kesenjagan_Eksternal'),
	    'Reformasi_Tujuan' => set_value('Reformasi_Tujuan'),
	    'Rencana_Aksi' => set_value('Rencana_Aksi'),
	    'Data_Dasar' => set_value('Data_Dasar'),
	    'Indikator_Gender' => set_value('Indikator_Gender'),
	    'Tahun_Anggaran' => set_value('Tahun_Anggaran'),
	    'Kode_Program' => set_value('Kode_Program'),
	    'Sasaran_Program' => set_value('Sasaran_Program'),
	    'Program' => set_value('Program'),
	    'Kegiatan' => set_value('Kegiatan'),
	    'Sub_Kegiatan' => set_value('Sub_Kegiatan'),
	    'Uraian_Kegiatan' => set_value('Uraian_Kegiatan'),
	    'Tujuan' => set_value('Tujuan'),
	    'Maksud' => set_value('Maksud'),
	    'Dasar_Hukum' => set_value('Dasar_Hukum'),
	    'Gambaran_Umum' => set_value('Gambaran_Umum'),
	    'Cara_Pelaksanan' => set_value('Cara_Pelaksanan'),
	    'Tempat_Pelaksaan' => set_value('Tempat_Pelaksaan'),
	    'Pelaksana_Penaggungjawab' => set_value('Pelaksana_Penaggungjawab'),
//	    'Analisis_Situasi' => set_value('Analisis_Situasi'),
	    'Jadwal' => set_value('Jadwal'),
	    'Biaya' => set_value('Biaya'),
	    'Indikator_Kinerja' => set_value('Indikator_Kinerja'),
	    'Batasan_Kegiatan' => set_value('Batasan_Kegiatan'),
	    'Hasil' => set_value('Hasil'),
	    'Belanja1_Tujuan' => set_value('Belanja1_Tujuan'),
	    'Belanja1_Alokasianggaran' => set_value('Belanja1_Alokasianggaran'),
	    'Belanja2_Tujuan' => set_value('Belanja2_Tujuan'),
	    'Belanja2_Alokasianggaran' => set_value('Belanja2_Alokasianggaran'),
	    'Capaian_Program' => set_value('Capaian_Program'),
	    'Total_Anggaran' => set_value('Total_Anggaran'),
	    'update_at' => set_value('update_at'),
	    'create_at' => set_value('create_at'),
	    'delete_at' => set_value('delete_at'),
	    'user_id' => set_value('user_id'),
	);
        $this->template->load('template','kelola_pprg/tb_kak_form', $data);
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
                'Isu_Gender' => $this->input->post('Isu_Gender',TRUE),
                'Faktor_Kesenjangan_akses' => $this->input->post('Faktor_Kesenjangan_akses',TRUE),
                'Faktor_Kesenjangan_partisipasi' => $this->input->post('Faktor_Kesenjangan_partisipasi',TRUE),
                'Faktor_kesenjangan_kontrol' => $this->input->post('Faktor_kesenjangan_kontrol',TRUE),
                'Faktor_kesenjangan_manfaat' => $this->input->post('Faktor_kesenjangan_manfaat',TRUE),
                'Sebab_Kesenjagan_Internal' => $this->input->post('Sebab_Kesenjagan_Internal',TRUE),
		'Sebab_Kesenjagan_Eksternal' => $this->input->post('Sebab_Kesenjagan_Eksternal',TRUE),
		'Reformasi_Tujuan' => $this->input->post('Reformasi_Tujuan',TRUE),
		'Rencana_Aksi' => $this->input->post('Rencana_Aksi',TRUE),
		'Data_Dasar' => $this->input->post('Data_Dasar',TRUE),
		'Indikator_Gender' => $this->input->post('Indikator_Gender',TRUE),
		'Tahun_Anggaran' => $this->input->post('Tahun_Anggaran',TRUE),
		'Kode_Program' => $this->input->post('Kode_Program',TRUE),
		'Sasaran_Program' => $this->input->post('Sasaran_Program',TRUE),
		'Program' => preg_replace("/[^a-zA-Z]/"," ", $this->input->post('Program',TRUE)),
		'Kegiatan' => preg_replace("/[^a-zA-Z]/"," ",$this->input->post('Kegiatan',TRUE)),
		'Sub_Kegiatan' => $this->input->post('Sub_Kegiatan',TRUE),
		'Uraian_Kegiatan' => preg_replace("/[^a-zA-Z]/"," ", $this->input->post('Uraian_Kegiatan',TRUE)),
		'Tujuan' => $this->input->post('Tujuan',TRUE),
		'Maksud' => $this->input->post('Maksud',TRUE),
		'Dasar_Hukum' => $this->input->post('Dasar_Hukum',TRUE),
		'Gambaran_Umum' => $this->input->post('Gambaran_Umum',TRUE),
		'Cara_Pelaksanan' => $this->input->post('Cara_Pelaksanan',TRUE),
		'Tempat_Pelaksaan' => $this->input->post('Tempat_Pelaksaan',TRUE),
		'Pelaksana_Penaggungjawab' => $this->input->post('Pelaksana_Penaggungjawab',TRUE),
//		'Analisis_Situasi' => $this->input->post('Analisis_Situasi',TRUE),
		'Jadwal' => $this->input->post('Jadwal',TRUE),
		'Biaya' => $this->input->post('Biaya',TRUE),
		'Indikator_Kinerja' => $this->input->post('Indikator_Kinerja',TRUE),
		'Batasan_Kegiatan' => $this->input->post('Batasan_Kegiatan',TRUE),
		'Hasil' => $this->input->post('Hasil',TRUE),
		'Belanja1_Tujuan' => $this->input->post('Belanja1_Tujuan',TRUE),
		'Belanja1_Alokasianggaran' => $this->input->post('Belanja1_Alokasianggaran',TRUE),
		'Belanja2_Tujuan' => $this->input->post('Belanja2_Tujuan',TRUE),
		'Belanja2_Alokasianggaran' => $this->input->post('Belanja2_Alokasianggaran',TRUE),
		'Capaian_Program' => $this->input->post('Capaian_Program',TRUE),
		'Total_Anggaran' => $this->input->post('Total_Anggaran',TRUE),
		'update_at' => date('Y-m-d H:i:s'),
		'create_at' => date('Y-m-d H:i:s'),
		'delete_at' => NULL,
		'user_id' =>$_SESSION['id_users'],
                
        
                
	    );

            $this->Model_pprg->insert($data);
           
                
                
                
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kelola_pprg'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_pprg->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelola_pprg/update_action'),
		'Id_kak' => set_value('Id_kak', $row->Id_kak),
		'Kode_skpd' => set_value('Kode_skpd', $row->Kode_skpd),
		'Wawasan' => set_value('Wawasan', $row->Wawasan),
		'Isu_Gender' => set_value('Isu_Gender', $row->Isu_Gender),
                'Faktor_Kesenjangan_akses' => set_value('Faktor_Kesenjangan_akses', $row->Faktor_Kesenjangan_akses),
                'Faktor_Kesenjangan_partisipasi' => set_value('Faktor_Kesenjangan_partisipasi', $row->Faktor_Kesenjangan_partisipasi),
                'Faktor_kesenjangan_kontrol' => set_value('Faktor_kesenjangan_kontrol', $row->Faktor_kesenjangan_kontrol),
                 'Faktor_kesenjangan_manfaat' => set_value('Faktor_kesenjangan_manfaat', $row->Faktor_kesenjangan_manfaat),
                'Sebab_Kesenjagan_Internal' => set_value('Sebab_Kesenjagan_Internal', $row->Sebab_Kesenjagan_Internal),
		'Sebab_Kesenjagan_Eksternal' => set_value('Sebab_Kesenjagan_Eksternal', $row->Sebab_Kesenjagan_Eksternal),
		'Reformasi_Tujuan' => set_value('Reformasi_Tujuan', $row->Reformasi_Tujuan),
		'Rencana_Aksi' => set_value('Rencana_Aksi', $row->Rencana_Aksi),
		'Data_Dasar' => set_value('Data_Dasar', $row->Data_Dasar),
		'Indikator_Gender' => set_value('Indikator_Gender', $row->Indikator_Gender),
		'Tahun_Anggaran' => set_value('Tahun_Anggaran', $row->Tahun_Anggaran),
		'Kode_Program' => set_value('Kode_Program', $row->Kode_Program),
		'Sasaran_Program' => set_value('Sasaran_Program', $row->Sasaran_Program),
		'Program' => trim(set_value('Program', $row->Program)),
		'Kegiatan' => trim(set_value('Kegiatan', $row->Kegiatan)),
		'Sub_Kegiatan' => trim(set_value('Sub_Kegiatan', $row->Sub_Kegiatan)),
		'Uraian_Kegiatan' => set_value('Uraian_Kegiatan', $row->Uraian_Kegiatan),
		'Tujuan' => set_value('Tujuan', $row->Tujuan),
		'Maksud' => set_value('Maksud', $row->Maksud),
		'Dasar_Hukum' => set_value('Dasar_Hukum', $row->Dasar_Hukum),
		'Gambaran_Umum' => set_value('Gambaran_Umum', $row->Gambaran_Umum),
		'Cara_Pelaksanan' => set_value('Cara_Pelaksanan', $row->Cara_Pelaksanan),
		'Tempat_Pelaksaan' => set_value('Tempat_Pelaksaan', $row->Tempat_Pelaksaan),
		'Pelaksana_Penaggungjawab' => set_value('Pelaksana_Penaggungjawab', $row->Pelaksana_Penaggungjawab),
		'Analisis_Situasi' => set_value('Analisis_Situasi', $row->Analisis_Situasi),
		'Jadwal' => set_value('Jadwal', $row->Jadwal),
		'Biaya' => set_value('Biaya', $row->Biaya),
		'Indikator_Kinerja' => set_value('Indikator_Kinerja', $row->Indikator_Kinerja),
		'Batasan_Kegiatan' => set_value('Batasan_Kegiatan', $row->Batasan_Kegiatan),
		'Hasil' => set_value('Hasil', $row->Hasil),
		'Belanja1_Tujuan' => set_value('Belanja1_Tujuan', $row->Belanja1_Tujuan),
		'Belanja1_Alokasianggaran' => set_value('Belanja1_Alokasianggaran', $row->Belanja1_Alokasianggaran),
		'Belanja2_Tujuan' => set_value('Belanja2_Tujuan', $row->Belanja2_Tujuan),
		'Belanja2_Alokasianggaran' => set_value('Belanja2_Alokasianggaran', $row->Belanja2_Alokasianggaran),
		'Capaian_Program' => set_value('Capaian_Program', $row->Capaian_Program),
		'Total_Anggaran' => set_value('Total_Anggaran', $row->Total_Anggaran),
		'update_at' => set_value('update_at', date('Y-m-d H:i:s')),
		'create_at' => set_value('create_at',  date('Y-m-d H:i:s')),
		'delete_at' => set_value('delete_at', NULL),
		'user_id' => set_value('user_id', $_SESSION['id_users']),
                
              
	    );
            $this->template->load('template','kelola_pprg/tb_kak_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pprg'));
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
		'Isu_Gender' => $this->input->post('Isu_Gender',TRUE),
                'Faktor_Kesenjangan_akses' => $this->input->post('Faktor_Kesenjangan_akses',TRUE),
                'Faktor_Kesenjangan_partisipasi' => $this->input->post('Faktor_Kesenjangan_partisipasi',TRUE),
                'Faktor_kesenjangan_kontrol' => $this->input->post('Faktor_kesenjangan_kontrol',TRUE),
                 'Faktor_kesenjangan_manfaat' => $this->input->post('Faktor_kesenjangan_manfaat',TRUE),
                

                'Sebab_Kesenjagan_Internal' => $this->input->post('Sebab_Kesenjagan_Internal',TRUE),
		'Sebab_Kesenjagan_Eksternal' => $this->input->post('Sebab_Kesenjagan_Eksternal',TRUE),
		'Reformasi_Tujuan' => $this->input->post('Reformasi_Tujuan',TRUE),
		'Rencana_Aksi' => $this->input->post('Rencana_Aksi',TRUE),
		'Data_Dasar' => $this->input->post('Data_Dasar',TRUE),
		'Indikator_Gender' => $this->input->post('Indikator_Gender',TRUE),
		'Tahun_Anggaran' => $this->input->post('Tahun_Anggaran',TRUE),
		'Kode_Program' => $this->input->post('Kode_Program',TRUE),
		'Sasaran_Program' =>trim($this->input->post('Sasaran_Program',TRUE)),
		'Program' => trim($this->input->post('Program',TRUE)),
		'Kegiatan' =>trim($this->input->post('Kegiatan',TRUE)),
		'Sub_Kegiatan' => trim($this->input->post('Sub_Kegiatan',TRUE)),
		'Uraian_Kegiatan' => $this->input->post('Uraian_Kegiatan',TRUE),
		'Tujuan' => $this->input->post('Tujuan',TRUE),
		'Maksud' => $this->input->post('Maksud',TRUE),
		'Dasar_Hukum' => $this->input->post('Dasar_Hukum',TRUE),
		'Gambaran_Umum' => $this->input->post('Gambaran_Umum',TRUE),
		'Cara_Pelaksanan' => $this->input->post('Cara_Pelaksanan',TRUE),
		'Tempat_Pelaksaan' => $this->input->post('Tempat_Pelaksaan',TRUE),
		'Pelaksana_Penaggungjawab' => $this->input->post('Pelaksana_Penaggungjawab',TRUE),
		'Analisis_Situasi' => $this->input->post('Analisis_Situasi',TRUE),
		'Jadwal' => $this->input->post('Jadwal',TRUE),
		'Biaya' => $this->input->post('Biaya',TRUE),
		'Indikator_Kinerja' => $this->input->post('Indikator_Kinerja',TRUE),
		'Batasan_Kegiatan' => $this->input->post('Batasan_Kegiatan',TRUE),
		'Hasil' => $this->input->post('Hasil',TRUE),
		'Belanja1_Tujuan' => $this->input->post('Belanja1_Tujuan',TRUE),
		'Belanja1_Alokasianggaran' => $this->input->post('Belanja1_Alokasianggaran',TRUE),
		'Belanja2_Tujuan' => $this->input->post('Belanja2_Tujuan',TRUE),
		'Belanja2_Alokasianggaran' => $this->input->post('Belanja2_Alokasianggaran',TRUE),
		'Capaian_Program' => $this->input->post('Capaian_Program',TRUE),
		'Total_Anggaran' => $this->input->post('Total_Anggaran',TRUE),
		'update_at' => date('Y-m-d H:i:s'),
		'create_at' => date('Y-m-d H:i:s'),
		'delete_at' => NULL,
		'user_id' => $_SESSION['id_users'],
                
           
	    );

            $this->Model_pprg->update($this->input->post('Id_kak', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelola_pprg'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_pprg->get_by_id($id);

        if ($row) {
            $this->Model_pprg->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelola_pprg'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelola_pprg'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Kode_skpd', 'kode skpd', 'trim|required');
//	$this->form_validation->set_rules('Wawasan', 'wawasan', 'trim|required');
//	$this->form_validation->set_rules('Faktor_Kesenjangan_akses', 'faktor kesenjangan', 'trim|required');
//	$this->form_validation->set_rules('Sebab_Kesenjagan_Internal', 'sebab kesenjagan internal', 'trim|required');
//	$this->form_validation->set_rules('Sebab_Kesenjagan_Eksternal', 'sebab kesenjagan eksternal', 'trim|required');
//	$this->form_validation->set_rules('Reformasi_Tujuan', 'reformasi tujuan', 'trim|required');
////	$this->form_validation->set_rules('Rencana_Aksi', 'rencana aksi', 'trim|required');
////	$this->form_validation->set_rules('Data_Dasar', 'data dasar', 'trim|required');
////	$this->form_validation->set_rules('Indikator_Gender', 'indikator gender', 'trim|required');
////	$this->form_validation->set_rules('Tahun_Anggaran', 'tahun anggaran', 'trim|required');
	$this->form_validation->set_rules('Kode_Program', 'kode program', 'trim|required');
//	$this->form_validation->set_rules('Sasaran_Program', 'sasaran program', 'trim|required');
	$this->form_validation->set_rules('Program', 'program', 'trim|required');
	$this->form_validation->set_rules('Kegiatan', 'kegiatan', 'trim|required');
	$this->form_validation->set_rules('Sub_Kegiatan', 'sub kegiatan', 'trim|required');
////	$this->form_validation->set_rules('Uraian_Kegiatan', 'uraian kegiatan', 'trim|required');
	$this->form_validation->set_rules('Tujuan', 'tujuan', 'trim|required');
////	$this->form_validation->set_rules('Maksud', 'maksud', 'trim|required');
////	$this->form_validation->set_rules('Dasar_Hukum', 'dasar hukum', 'trim|required');
////	$this->form_validation->set_rules('Gambaran_Umum', 'gambaran umum', 'trim|required');
////	$this->form_validation->set_rules('Cara_Pelaksanan', 'cara pelaksanan', 'trim|required');
////	$this->form_validation->set_rules('Tempat_Pelaksaan', 'tempat pelaksaan', 'trim|required');
////	$this->form_validation->set_rules('Pelaksana_Penaggungjawab', 'pelaksana penaggungjawab', 'trim|required');
////	$this->form_validation->set_rules('Analisis_Situasi', 'analisis situasi', 'trim|required');
////	$this->form_validation->set_rules('Jadwal', 'jadwal', 'trim|required');
//	$this->form_validation->set_rules('Biaya', 'biaya', 'trim|required|integer');
////	$this->form_validation->set_rules('Indikator_Kinerja', 'indikator kinerja', 'trim|required');
////	$this->form_validation->set_rules('Batasan_Kegiatan', 'batasan kegiatan', 'trim|required');
////	$this->form_validation->set_rules('Hasil', 'hasil', 'trim|required');
////	$this->form_validation->set_rules('Belanja1_Tujuan', 'belanja1 tujuan', 'trim|required');
////	$this->form_validation->set_rules('Belanja1_Alokasianggaran', 'belanja1 alokasianggaran', 'trim|required');
////	$this->form_validation->set_rules('Belanja2_Tujuan', 'belanja2 tujuan', 'trim|required');
////	$this->form_validation->set_rules('Belanja2_Alokasianggaran', 'belanja2 alokasianggaran', 'trim|required');
////	$this->form_validation->set_rules('Capaian_Program', 'capaian program', 'trim|required');
////	$this->form_validation->set_rules('Total_Anggaran', 'total anggaran', 'trim|required');
////	$this->form_validation->set_rules('update_at', 'update at', 'trim|required');
////	$this->form_validation->set_rules('create_at', 'create at', 'trim|required');
////	$this->form_validation->set_rules('delete_at', 'delete at', 'trim|required');
////	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');

	$this->form_validation->set_rules('Id_kak', 'Id_kak', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

     public function excel()
    {
        
           $data['v_program']      = $this->Model_pprg->report_program();
           $data['v_rencana_aksi'] = $this->Model_pprg->report_rencana_aksi();
          $data['total_rencana_aksi'] = $this->Model_pprg->report_rencana_aksi_total();
           
        //  var_dump($data['total_rencana_aksi'])or die();
          $this->template->load('template','kelola_pprg/laporan', $data);
      
    }
    
    
     public function laporan_rencana_aksi()
    {
        
            $data['v_program']      = $this->Model_pprg->report_program();
            $data['v_rencana_aksi'] = $this->Model_pprg->report_rencana_aksi();
            $data['total_rencana_aksi'] = $this->Model_pprg->report_rencana_aksi_total();
           
        //  var_dump($data['total_rencana_aksi'])or die();
          $this->template->load('template','kelola_pprg/laporan_ra', $data);
      
    }
    
    
//      public function grafik_rencana_aksi()
//    {
//        
//       
//        //  var_dump($data['total_rencana_aksi'])or die();
//          $this->template->load('template','welcome', $data);
//      
//    }
    
    function get_program(){
		
		if (isset($_GET['term'])) {
		
		
		  	$result = $this->Model_pprg->search_program($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$data[] = array(
					 'label'   => $row->nama_program,
					 'kode_program'  => $row->kode_program,
                                          'nama_program'  => $row->nama_program,
				);
		     	echo json_encode($data);
		   	}
		}
	}


    function get_kegiatan(){
		
		if (isset($_GET['term'])) {
		
		
		  	$result = $this->Model_pprg->search_giat($_GET['term']);
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


}

/* End of file Kelola_pprg.php */
/* Location: ./application/controllers/Kelola_pprg.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-11 17:42:23 */
/* http://harviacode.com */