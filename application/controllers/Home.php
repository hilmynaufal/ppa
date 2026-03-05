<?php

class Home extends CI_Controller {


    
    
   function __construct()
    {
        parent::__construct();

    
        $this->load->model('Model_home');
        $this->load->helper('security');
        $this->load->model('Model_pendaftaran');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }


    
    
        // Kabupaten
  function get_kabupaten(){
      
    
        $id=$this->input->post('id');
        $data=$this->Model_pendaftaran->get_kabupaten($id);
        echo json_encode($data);
    }
    
    
     function get_kecamatan(){
      
      //  var_dump($_POST)or die();
        $id=$this->input->post('id');
        $data=$this->Model_pendaftaran->get_kecamatan($id);
        echo json_encode($data);
    }
    
       function get_desa(){
      
       
        $id=$this->input->post('id');
        $data=$this->Model_pendaftaran->get_desa($id);
        echo json_encode($data);
    }
    

    public function index() {
        
         $data['title'] = 'Data PPA';
        $data['isi'] = 'home/index_home';
        $data['hsl'] = $this->Model_home->tampil_akta();
        $data['button'] = 'Create';
        $data['action'] = site_url('Home/register');
        $data['full_name'] = set_value('full_name');
        $data['kota_lahir'] = set_value('kota_lahir');
        $data['birth'] = set_value('birth');
        $data['email'] = set_value('email');
        $data['phone'] = set_value('phone');

        $data['password'] = set_value('password');
        $data['images'] = set_value('images');
        $data['id_user_level'] = set_value('id_user_level');
        $data['is_aktif'] = set_value('is_aktif');
        $data['username'] = set_value('email');

        $data['province_id'] = set_value('province_id');
        $data['regency_id'] = set_value('regency_id');
        $data['district_id'] = set_value('district_id');
        $data['village_id'] = set_value('village_id');

        $data['nik'] = set_value('nik');
        $data['pekerjaan'] = set_value('pekerjaan');
        $data['penyandang_disabilitas'] = set_value('penyandang_disabilitas');
        $data['alamat_domisili'] = set_value('alamat_domisili');
        $data['ket_laporan'] = set_value('ket_laporan');


        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");
          
        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $s = $this->db->query("SELECT * FROM visitor WHERE ip='".$ip."' AND date='".$date."'")->num_rows();
        $ss = isset($s)?($s):0;
          
         
        // Kalau belum ada, simpan data user tersebut ke database
        if($ss == 0){
        $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('".$ip."','".$date."','1','".$waktu."','".$timeinsert."')");
        }
         
        // Jika sudah ada, update
        else{
        $this->db->query("UPDATE visitor SET hits=hits+1, online='".$waktu."' WHERE ip='".$ip."' AND date='".$date."'");
        }


        $pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='".$date."' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
         
        $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row(); 
         
        $totalpengunjung = isset($dbpengunjung->hits)?($dbpengunjung->hits):0; // hitung total pengunjung
         
        $bataswaktu = time() - 300;
         
        $pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '".$bataswaktu."'")->num_rows(); // hitung pengunjung online

        $data['pengunjunghariini']=$pengunjunghariini;
        $data['totalpengunjung']=$totalpengunjung;
        $data['pengunjungonline']=$pengunjungonline;

        


        $this->load->view('Home', $data);
    }
    
  
        
   public function json() {
               
        header('Content-Type: application/json');
        echo $this->Model_home->json();
            }
            
            
       public function download() {
           
       $id = $this->uri->segment('3');
        $dir = "upload_relaas/";
        $filename = $id;
        $file_path = $dir . $filename;
        $ctype = "application/octet-stream";
        if (!empty($file_path) && file_exists($file_path)) { /* check keberadaan file */
            header("Pragma:public");
            header("Expired:0");
            header("Cache-Control:must-revalidate");
            header("Content-Control:public");
            header("Content-Description: File Transfer");
            header("Content-Type: $ctype");
            header("Content-Disposition:attachment; filename=\"" . basename($file_path) . "\"");
            header("Content-Transfer-Encoding:binary");
            header("Content-Length:" . filesize($file_path));
            flush();
            readfile($file_path);
            exit();
        } else {
            echo "The File does not exist.";
        }
    }
    
    
     public function create() 
    {

             $data = array(
            'button' => 'Create',
            'action' => site_url('Home/register'),
	    'id_users' => set_value('id_users'),
	    'full_name' => set_value('full_name'),
	    'kota_lahir' => set_value('kota_lahir'),
	    'birth' => set_value('birth'),
//	    'email' => set_value('email'),
	    'phone' => set_value('phone'),
            
	    'password' => set_value('password'),
	    'images' => set_value('images'),
	    'id_user_level' => set_value('id_user_level'),
	    'is_aktif' => set_value('is_aktif'),
	    'username' => set_value('phone'),
	    'id_skpd' => set_value('id_skpd'),
	    'province_id' => set_value('province_id'),
	    'regency_id' => set_value('regency_id'),
	    'district_id' => set_value('district_id'),
	    'village_id' => set_value('village_id'),
	    'rw_id' => set_value('rw_id'),
	    'rt_id' => set_value('rt_id'),
	    'verified_email' => set_value('verified_email'),
	    'google_id' => set_value('google_id'),
	    'google_image' => set_value('google_image'),
	    'division_sub' => set_value('division_sub'),
	    'nik' => set_value('nik'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'penyandang_disabilitas' => set_value('penyandang_disabilitas'),
	    'ket_laporan' => set_value('ket_laporan'),

	);
              $this->load->view('Home',$data);
    }
    
    public function register() 
    {
        
        
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
//                'nik' => $this->input->post('nik',TRUE),
		'full_name' => $this->input->post('full_name',TRUE),
		'kota_lahir' => $this->input->post('kota_lahir',TRUE),
		'birth' => $this->input->post('birth',TRUE),
//		'email' => $this->input->post('email',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'images' => $this->input->post('images',TRUE),
		'id_user_level' => '1',
		'is_aktif' => $this->input->post('is_aktif',TRUE),
		'username' => $this->input->post('phone',TRUE),
               'password' => hash_password($this->input->post('password',TRUE)),
		'id_skpd' => $this->input->post('id_skpd',TRUE),
		'province_id' => $this->input->post('province_id',TRUE),
		'regency_id' => $this->input->post('regency_id',TRUE),
		'district_id' => $this->input->post('district_id',TRUE),
//		'village_id' => $this->input->post('village_id',TRUE),
//		'rw_id' => $this->input->post('rw_id',TRUE),
//		'rt_id' => $this->input->post('rt_id',TRUE),
//		'verified_email' => $this->input->post('verified_email',TRUE),
		'google_id' => $this->input->post('google_id',TRUE),
		'google_image' => $this->input->post('google_image',TRUE),
		'division_sub' => $this->input->post('division_sub',TRUE),
		'id_user_level'=> $this->input->post('id_user_level',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'penyandang_disabilitas' => $this->input->post('penyandang_disabilitas',TRUE),
		'alamat_domisili' => $this->input->post('alamat_domisili',TRUE),
		'pihak_konfirmasi' => $this->input->post('pihak_konfirmasi',TRUE),
//		'email_konfirmasi' => $this->input->post('email_konfirmasi',TRUE),
		'hp_konfirmasi' => $this->input->post('hp_konfirmasi',TRUE),
		'ket_laporan' => $this->input->post('ket_laporan',TRUE),
		'create_time' => date("Y-m-d H:i:s"),
		'update_time' => date("Y-m-d H:i:s"),
	    );
            
            
             $this->Model_pendaftaran->insert($data);
    
            $phone      = $this->input->post('phone');
            $password = $this->input->post('password',TRUE);
            $hashPass = password_hash($password,PASSWORD_DEFAULT);
            $test     = password_verify($password, $hashPass);
        // query chek users
        $this->db->where('phone',$phone);
        $users       = $this->db->get('tbl_user');
       
        
          
        if($users->num_rows()>0){
            $user = $users->row_array();
         
            if(password_verify($password,$user['password'])){
                // retrive user data to session

                $this->session->set_userdata($user);
                
              
              
//                $query = $this->db->query("SELECT
//	                tbl_tahun.id, 
//                        tbl_tahun.tahun, 
//                        tbl_tahun.`status`
//                        FROM
//                        tbl_tahun
//                        WHERE
//                        tbl_tahun.`status` = 1 ");
//                $row = $query->row();
//                
//                if($row!=''){               
//                $id_users=$row->id_users;
//                $email=$row->email;
//                 $session_user = array(
//                 'email'=>email,
//                'id_users'   =>$id_users);
//                 $this->session->set_userdata($session_user);
//                }
           

                redirect('welcome');
            }else{
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('status_login','username atau password yang anda input salah');
            redirect('auth');
        }
            
            
            
            

           // $this->Model_pendaftaran->insert($data);
             redirect(site_url('Auth/cheklogin'));
            $this->session->set_flashdata('message', 'Create Record Success 2');
            
             
            //redirect(site_url('Welcome'));
            
            
        }
    }
    

   
    public function _rules() 
    {
        $this->form_validation->set_rules('phone', 'phone', 'trim|required|callback_CekPhone');
//       $this->form_validation->set_rules('nik', 'nik', 'trim|required|callback_checkUserNik');
	$this->form_validation->set_rules('full_name', 'full name', 'trim|required');
	$this->form_validation->set_rules('kota_lahir', 'kota lahir', 'trim|required');
	$this->form_validation->set_rules('birth', 'birth', 'trim|required');
//	$this->form_validation->set_rules('email', 'email', 'trim|required|callback_checkEmail|valid_email');
	
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
	$this->form_validation->set_rules('province_id', 'province id', 'trim|required');
	$this->form_validation->set_rules('regency_id', 'regency id', 'trim|required');
	$this->form_validation->set_rules('district_id', 'district id', 'trim|required');
//	$this->form_validation->set_rules('village_id', 'village id', 'trim|required');
        $this->form_validation->set_rules('alamat_domisili', 'alamat domisili', 'trim|required');
         $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
        $this->form_validation->set_rules('ket_laporan', 'ket laporan', 'trim|required');
     
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
    
    
    function checkUserNik($nik){
      
    if ($this->Model_pendaftaran->checkUserNik($nik) == false) {
	  return true;
	} else {
	  $this->form_validation->set_message('checkUserNik', 'Nik Sudah ada Di Database ');
	  return false;
       }
        
}
  
  
    function checkEmail($email){
	if ($this->Model_pendaftaran->checkEmail($email) == false) {
	  return true;
	} else {
	  $this->form_validation->set_message('checkEmail', 'Email Sudah ada Di Database Atau Kosong ');
	  return false;
	}
  }
  
  function CekPhone($phone){
      
	if ($this->Model_pendaftaran->cek_Phone($phone) == false) {
	  return true;
	} else {
	  $this->form_validation->set_message('CekPhone', 'No Hp Sudah ada Di Database ');
	  return false;
	}
  }

}

    
  