<?php
	class M_login extends CI_Model{
		public function __construct(){
			parent:: __construct();
		}
		
		public function getUser($akun){
			//query datanya cari ada ato tidak di DB.
			$dd = $this->db->query("SELECT * FROM T_USER WHERE username= '$akun' ");
			$dds = $dd->row_array();
			//kalo datanya > 0 maka proses kalo tidak redirect
			if(count($dds) > 0){
				$this->session->set_userdata('username',$dds['username']);
				$this->session->set_userdata('level', $dds['leanandtier_admin']);
				
				
			}else{
				redirect('C_kaizen_admin/');
			}

			return $dd;
			// echo $dd->num_rows();
		}
		

	}

?>