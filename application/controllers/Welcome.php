<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    function __construct()
    {
        parent::__construct();


        $this->load->model(array('model_welcome', 'model_pprg'));
        $this->load->model('model_welcome');
        $this->load->model('Model_berita');
        $this->load->model('Model_pendaftaran');
        $this->load->model('Model_berita_acara');
        $this->load->database();
        $this->load->helper(array('url', 'html', 'form'));




    }

    public function json()
    {

        header('Content-Type: application/json');
        echo $this->Model_welcome->json_berita();
    }

    public function index()
    {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/welcome/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/welcome/index/';
            $config['first_url'] = base_url() . 'index.php/welcome/index/';
        }
        //
        $config['per_page'] = 5;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Model_berita_acara->total_rows($q);
        $kelola_berita = $this->Model_berita_acara->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        // Get statistics data
        $statistics = $this->Model_berita_acara->get_statistics();

        $this->data = array(
            'kelola_berita_data' => $kelola_berita,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'statistics' => $statistics,
        );

        $this->template->load('template', 'welcome', $this->data);
        // $this->template->load('template','kelola_berita/tbl_ppa_berita_acara_list', $data);
    }



    public function grafik_anggaran_pprg()
    {
        //$this->load->view('table');

        //            $result = $this->model_pprg->grafik_biaya_pprg();
//            if (count($result) > 0) {
//		    foreach ($result as $row)
//		     	$data[] = array(
//					 'name'   => $row->name,
//					 'biaya'  => $row->biaya,
//                                         
//				);
//		     	echo json_encode($data);
//		   	}

        $query = $this->db->query("SELECT
                                ref_department.`name`,
                                SUM( IFNULL(rencana_aksi.Biaya,0) ) AS biaya 
                                FROM tb_kak
                                LEFT JOIN rencana_aksi ON rencana_aksi.kak_id = tb_kak.Id_kak
                                LEFT JOIN ref_department ON ref_department.id_department = tb_kak.Kode_skpd 
                                WHERE Tahun_Anggaran = '" . $_SESSION['Tahun_Anggaran'] . "'
                                GROUP BY tb_kak.Kode_skpd ORDER BY ref_department.`name` ASC");

        $record = $query->result();
        $data = [];

        foreach ($record as $row) {
            $data['label'][] = $row->name;
            $data['data'][] = (int) $row->biaya;
        }
        $data['chart_data'] = json_encode($data);
        // $this->load->view('welcome',$data);



        //  $this->template->load('template', 'welcome',$data);
    }



    public function form()
    {
        //$this->load->view('table');
        $this->template->load('template', 'form');
    }

    function autocomplate()
    {
        autocomplate_json('tbl_user', 'full_name');
    }

    function __autocomplate()
    {
        $this->db->like('nama_lengkap', $_GET['term']);
        $this->db->select('nama_lengkap');
        $products = $this->db->get('pegawai')->result();
        foreach ($products as $product) {
            $return_arr[] = $product->nama_lengkap;
        }

        echo json_encode($return_arr);
    }

    function pdf()
    {
        $this->load->library('pdf');
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 7, 'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK', 0, 1, 'C');
        $pdf->Output();
    }

}
