<?php



function hitungUmur($tanggal_lahir) {
    $tanggal_sekarang = date("Y-m-d");
    $umur = date_diff(date_create($tanggal_lahir), date_create($tanggal_sekarang));
   // return $umur->format("%y tahun %m bulan %d hari");
    return $umur->format("%y");
}

/*
// Contoh pemanggilan fungsi hitungUmur
$tanggal_lahir = "1990-01-01";
$umur = hitungUmur($tanggal_lahir);
echo "Umur: " . $umur;
   */


	// MODAL
	function show_my_modal($content='', $id='', $data='', $size='md') {
		$_ci = &get_instance();

		if ($content != '') {
			$view_content = $_ci->load->view($content, $data, TRUE);

			return '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-' .$size .'" role="document">
					    <div class="modal-content">
					        ' .$view_content .'
					    </div>
					  </div>
					</div>';
		}
	}
        
        
    function tanggal_indonesia($tanggal){
        $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
        );
        
        $pecahkan = explode('-', $tanggal);
                
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }


function cmb_dinamis($name,$table,$field,$pk,$selected=null,$order=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    if($order){
        $ci->db->order_by($field,$order);
    }
    $data = $ci->db->get($table)->result();
   

    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function cmb_dinamis_cetak($name,$table,$field,$pk,$selected=null,$order=null){
    $ci = get_instance();
    $cmb = "<select name='$name'  class='form-control'>";
    if($order){
        $ci->db->order_by($field,$order);
    }

    if($_SESSION['id_user_level'] == 2){
     
        $data= $ci->db->where('ref_unit.id_unit',$_SESSION['id_unit']);
        
        $data = $ci->db->get($table)->result();
      
        }else{
          $data = $ci->db->get($table)->result();
    
        }

        $cmb .="<option value='0'> SEMUA </option>";
    foreach ($data as $d){
     
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";


    return $cmb;  
}


function cmb_dinamis_cetak_layanan($name,$table,$field,$pk,$selected=null,$order=null){
    $ci = get_instance();
    $cmb = "<select name='$name'  class='form-control'>";
    if($order){
        $ci->db->order_by($field,$order);
    }

          $data = $ci->db->get($table)->result();

        $cmb .="<option value='0'> SEMUA </option>";
    foreach ($data as $d){
     
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";


    return $cmb;  
}

function cmb_dinamis_rencana_aksi($name,$table,$field,$pk,$selected=null,$order=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control' id='rencana_skpd'>";
    if($order){
        $ci->db->order_by($field,$order);
    }

    if($_SESSION['id_user_level'] == 2){
     
        $data= $ci->db->where('ref_department.id_department',$_SESSION['id_skpd']);
        $data = $ci->db->get($table)->result();
        
        }else{
          $data = $ci->db->get($table)->result();
    
        }


    foreach ($data as $d){
         if ($_SESSION['id_user_level'] == 2) {
          $cmb .="<option value=''";
            $cmb .= "";
            $cmb .=">PILIH SKPD / DINAS ANDA</option>";
        }
              
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}


function cmb_dinamis_propinsi($name,$table,$field,$pk,$selected=null,$order=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control' id='pilih_kabupaten'>";
    if($order){
        $ci->db->order_by($field,$order);
    }

//    if($_SESSION['id_user_level'] == 2){
//     
//        var_dump('aaa')or die();
//        $data= $ci->db->where('ref_department.id_department',$_SESSION['id_skpd']);
//        $data = $ci->db->get($table)->result();
//        
//
//      
//        }else{
//            
//             var_dump('ccc')or die();
//          $data = $ci->db->get($table)->result();
//    
//        }

  $data = $ci->db->get($table)->result();
    foreach ($data as $d){
//         if ($_SESSION['id_user_level'] == 2) {
//          $cmb .="<option value=''";
//            $cmb .= "";
//            $cmb .=">Kabupaten</option>";
//        }
//     
              
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}



function cmb_dinamis_kecamatan($name,$table,$field,$pk,$selected=null,$order=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control' id='pilih_desa'>";
    if($order){
        $ci->db->order_by($field,$order);
    }

//    if($_SESSION['id_user_level'] == 2){
//     
//        var_dump('aaa')or die();
//        $data= $ci->db->where('ref_department.id_department',$_SESSION['id_skpd']);
//        $data = $ci->db->get($table)->result();
//        
//
//      
//        }else{
//            
//             var_dump('ccc')or die();
//          $data = $ci->db->get($table)->result();
//    
//        }
 $data= $ci->db->where('reg_districts.regency_id','3204');
 $data = $ci->db->get($table)->result();
  
    foreach ($data as $d){
//         if ($_SESSION['id_user_level'] == 2) {
//          $cmb .="<option value=''";
//            $cmb .= "";
//            $cmb .=">Kabupaten</option>";
//        }
//     
              
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}





function cmb_dinamis_propinsi2($name,$table,$field,$pk,$selected=null,$order=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control' id='pilih_kabupaten2'>";
    if($order){
        $ci->db->order_by($field,$order);
    }


  $data = $ci->db->get($table)->result();
    foreach ($data as $d){

              
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}



function cmb_dinamis_tahun($name,$table,$field,$pk,$selected=null,$order=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    if($order){
        $ci->db->order_by($field,$order);
    }
        $data= $ci->db->where('tbl_tahun.status',1);
        $data = $ci->db->get($table)->result();
      
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function cmb_dinamis_biaya($name,$table,$field,$pk,$selected=null,$order=null){
   // var_dump($pk)or die();
    
    $ci = get_instance();
    $cmb = "<select name='$name' id='subkategori' class='form-control'>";
    if($order){
        $ci->db->order_by($field,$order);
    }

        $data= $ci->db->where('tb_kak.Kode_skpd',$_SESSION['id_skpd']);
        $data = $ci->db->get($table)->result();

    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function select2_dinamis($name,$table,$field,$placeholder){
    $ci = get_instance();
    $select2 = '<select name="'.$name.'" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="'.$placeholder.'" style="width: 100%;" tabindex="-1" aria-hidden="true">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row){
        $select2.= ' <option>'.$row->$field.'</option>';
    }
    $select2 .='</select>';
    return $select2;
}

function datalist_dinamis($name,$table,$field,$value=null){
    $ci = get_instance();
    $string = '<input value="'.$value.'" name="'.$name.'" list="'.$name.'" class="form-control">
    <datalist id="'.$name.'">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row){
        $string.='<option value="'.$row->$field.'">';
    }
    $string .='</datalist>';
    return $string;
}


function datalist_dinamis_skpd($name,$table,$field,$value=null){
    $ci = get_instance();
    $string = '<input value="'.$value.'" name="'.$name.'" list="'.$name.'" class="form-control" size=100>
    <datalist id="'.$name.'">';

    if($_SESSION['id_user_level'] == 2){
     
      $data= $ci->db->where('ref_department.id_department',$_SESSION['id_skpd']);
      $data = $ci->db->get($table)->result();
    
      }else{
        $data = $ci->db->get($table)->result();
  
      }
   
     foreach ($data as $row) {
        $string .= '<option value="' . $row->$field . '">';
    }
    $string .= '</datalist>';
    return $string;
}

function datalist_dinamis_subkegiatan($name,$table,$field,$value=null){
    $ci = get_instance();

    $string = '<input value="'.$value.'" name="'.$name.'" list="'.$name.'" class="form-control" size=100>
    <datalist id="'.$name.'">';

    if($_SESSION['id_user_level'] == 2){
     
    
      $data = $ci->db->get($table)->result();
    
      }else{
        $data = $ci->db->get($table)->result();
  
      }
   
     foreach ($data as $row){
        $string.='<option value="'.$row->$field.'">';
    }
    $string .='</datalist>';
    return $string;
}




function rename_string_is_aktif($string){
        return $string=='y'?'Aktif':'Tidak Aktif';
    }
    

function is_login(){
    $ci = get_instance();
    if(!$ci->session->userdata('id_users')){
        redirect('auth');
    }else{
        $modul = $ci->uri->segment(1);
        
        $id_user_level = $ci->session->userdata('id_user_level');
        // dapatkan id menu berdasarkan nama controller
        $menu = $ci->db->get_where('tbl_menu',array('url'=>$modul))->row_array();
        $id_menu = $menu['id_menu'];
        // chek apakah user ini boleh mengakses modul ini
        $hak_akses = $ci->db->get_where('tbl_hak_akses',array('id_menu'=>$id_menu,'id_user_level'=>$id_user_level));
        if($hak_akses->num_rows()<1){
            redirect('blokir');
            exit;
        }
    }
}

function alert($class,$title,$description){
    return '<div class="alert '.$class.' alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> '.$title.'</h4>
                '.$description.'
              </div>';
}

// untuk chek akses level pada modul peberian akses
function checked_akses($id_user_level,$id_menu){
    $ci = get_instance();
    $ci->db->where('id_user_level',$id_user_level);
    $ci->db->where('id_menu',$id_menu);
    $data = $ci->db->get('tbl_hak_akses');
    if($data->num_rows()>0){
        return "checked='checked'";
    }
}


function autocomplate_json($table,$field){
    $ci = get_instance();
    $ci->db->like($field, $_GET['term']);
    $ci->db->select($field);
    $collections = $ci->db->get($table)->result();
    foreach ($collections as $collection) {
        $return_arr[] = $collection->$field;
    }
    echo json_encode($return_arr);
}


function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

 function hash_password($password){
   return password_hash($password, PASSWORD_BCRYPT);
}