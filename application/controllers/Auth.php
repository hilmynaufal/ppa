<?php
Class Auth extends CI_Controller{
    
    function index(){ 
        $this->load->view('auth/login');
    }
    
    function cheklogin()
    
    {
        //var_dump($_POST)or die();
        $username    = $this->input->post('username');
        //$password   = $this->input->post('password');
        $password = $this->input->post('password',TRUE);
        $hashPass = password_hash($password,PASSWORD_DEFAULT);
        $test     = password_verify($password, $hashPass);
        // query chek users
        $this->db->where('username',$username);

        $users       = $this->db->get('tbl_user');
        
          
        if($users->num_rows()>0){
            
            
            $user = $users->row_array();
            if(password_verify($password,$user['password'])){
                // retrive user data to session

                $this->session->set_userdata($user); 
                $query = $this->db->query("SELECT tbl_tahun.id,tbl_tahun.tahun,tbl_tahun.`status` FROM tbl_tahun WHERE tbl_tahun.`status` = 1");
                $row = $query->row();
                
                if($row!=''){               
                 $Tahun_Anggaran=$row->tahun;
                 $session_pprg = array(
                
                'Tahun_Anggaran'   =>$Tahun_Anggaran);
                 $this->session->set_userdata($session_pprg);
                }
                redirect('welcome');
            }else{
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('status_login','username atau password yang anda input salah');
            redirect('auth');
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
        redirect('Home');
    }
}
